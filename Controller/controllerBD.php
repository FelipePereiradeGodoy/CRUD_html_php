<?php
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    require($path.'/CRUD_html_php/Model/ConexaoMysql.php');

    class ControllerBD{
        private $pdo ;
        private $stmt ;
        private $conexao;

        public function __construct(){
            $this->conexao = new ConexaoMysql;
            $this->pdo = $this->conexao->retornaPDO();
        }

        public function inserirCliente($c){
            $this->stmt = $this->pdo->prepare(" INSERT INTO 
                                                Cliente 
                                                ( 
                                                  nome, cpf, rg, 
                                                  email, endereco,
                                                  telefone1, telefone2, 
                                                  dataNasc
                                                )
                                                VALUES
                                                (
                                                  ?, ?, ?,
                                                  ?, ?,
                                                  ?, ?,
                                                  ?
                                                )
                                                ");

            $c->dataNasc = date('Y-m-d H:i:s');
            $this->stmt->execute([ $c->nome, $c->cpf, $c->rg, $c->email, $c->endereco, $c->telefone1, $c->telefone2, $c->dataNasc ]);
        }

        public function retornaClientes(){
            foreach($this->pdo->query("SELECT * FROM Cliente") as $row){
                echo $row['nome'];
                echo $row['cpf'];
                echo $row['rg'];
                echo $row['email'];
                echo $row['endereco'];
                echo $row['telefone1'];
                echo $row['telefone2'];
                echo $row['dataNasc'];    
            }
        }

        public function verificaLoginSenha($login, $senha){
            foreach($this->pdo->query(" SELECT senha from LoginSenha
                                        WHERE login IN ('$login');") as $row){
                 $verifica = $row['senha'];
            }
            if(password_verify($senha, $verifica)){
                echo 'Senha Correta';
            }else {
                echo 'Senha Incorreta';
            }
        }
    }
?>
<?php
    require '/opt/lampp/htdocs/CRUD_html_php/Model/ConexaoMysql.php';

    class ControllerBD{
        private $pdo ;
        private $stmt ;

        public function __construct(){
            $conexao = new ConexaoMysql;
            $this->pdo = $conexao->retornaPDO();
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
            
            $this->stmt->execute([ $c->nome, $c->cpf, $c->rg, $c->email, $c->endereco, $c->telefone1, $c->telefone2, $c->dataNasc ]);
        }

        public function retornaClientes(){
            foreach($this->pdo->query("SELECT * FROM Cliente") as $row){
                print $row['nome'] . "\t";
                print $row['cpf'] . "\t";
                print $row['rg'] . "\t";
                print $row['email'] . "\t";
                print $row['endereco'] . "\t";
                print $row['telefone1'] . "\t";
                print $row['telefone2'] . "\t";
                print $row['dataNasc'] . "\t";    
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
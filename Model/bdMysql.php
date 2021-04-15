<?php
    
    class bdMysql {
        private $dsn ;
        private $user ;
        private $password ;
        private $pdo ;
        private $stmt ;

        function __construct() {
            $this->dsn = "mysql:host=localhost;dbname=Crud";
            $this->user = "root";
            $this->password = "";
            $this->pdo = new PDO($this->dsn ,$this->user, $this->password);
        }

        function inserirCliente($c){
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
                                                  '$c->nome', '$c->cpf', '$c->rg', 
                                                  '$c->email', '$c->endereco'
                                                  '$c->telefone1', '$c->telefone2',
                                                  '$c->dataNasc'  
                                                )
                                                ");
            $this->execute();
            echo "REALIZADO INSERÇÃO!";
        }

        function retornaClientes(){
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

        function verificaLoginSenha($login, $senha){
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
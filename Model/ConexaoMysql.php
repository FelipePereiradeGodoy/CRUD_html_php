<?php
    
    class ClConexaoMysql {
        private $dsn ;
        private $user ;
        private $password ;
        private $pdo ;

        function __construct() {
            $this->dsn = "mysql:host=localhost;dbname=Crud";
            $this->user = "root";
            $this->password = "";
            $this->pdo = new PDO($this->dsn ,$this->user, $this->password);
        }

        function retornaPDO() {
            return $this->pdo;
        }
    }

?>
<?php
    
    class ConexaoMysql {
        private $dsn ;
        private $user ;
        private $password ;
        private $pdo ;

        public function __construct() {
            $this->dsn = "mysql:host=localhost;dbname=CRUD";
            $this->user = "root";
            $this->password = "";
            $this->pdo = new PDO($this->dsn ,$this->user, $this->password);
        }

        public function retornaPDO() {
            return $this->pdo;
        }
    }

?>
<?php
    namespace Model;

    use \PDO;

    class ConexaoMysql {
        const dsn = "mysql:host=localhost;dbname=CRUD";
        private user = "root";
        private password = "";
        private $pdo ;

        public function __construct() {
            $this->pdo = new PDO($this->dsn ,$this->user, $this->password);
        }

        public function retornaPDO() {
            return $this->pdo;
        }
    }

?>
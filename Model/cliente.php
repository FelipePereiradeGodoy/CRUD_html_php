<?php
    class Cliente {
        private $nome;
        private $cpf;
        private $rg;
        private $email;
        private $endereco;
        private $telefone1;
        private $telefone2;
        private $dataNasc;

        function __construct($nome, $cpf, $rg, $email, $endereco, $telefone1, $telefone2, $dataNasc){
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->rg = $rg;
            $this->email = $email;
            $this->endereco = $endereco;
            $this->telefone1 = $telefone1;
            $this->telefone2 = $telefone2;
            $this->dataNasc = $dataNasc;
        }
    }
?>
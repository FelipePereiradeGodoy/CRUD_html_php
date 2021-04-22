<?php

$path = $_SERVER['DOCUMENT_ROOT']; //UBUNTU
require($path . '/CRUD_html_php/Model/ConexaoMysql.php'); //UBUNTU


//$_DIR = $_SERVER['DOCUMENT_ROOT'];//WINDOWS
//require($_DIR . "/GitHub_ProjetoWeb/CRUD_html_php/Model/ConexaoMysql.php"); //WINDOWS

class ControllerBD
{
    private $pdo;
    private $stmt;
    private $conexao;


    public function __construct()
    {
        $this->conexao = new ConexaoMysql;
        $this->pdo = $this->conexao->retornaPDO();
    }


    public function inserirCliente($c)
    {
        try {

            $this->stmt = $this->pdo->prepare(" INSERT INTO 
                                                Cliente 
                                                ( 
                                                  nome, cpf, rg, 
                                                  email, endereco,
                                                  telefone1, telefone2, 
                                                  dataNasc, isAtivo
                                                )
                                                VALUES
                                                (
                                                  ?, ?, ?,
                                                  ?, ?,
                                                  ?, ?,
                                                  ?, ?
                                                )
                                                ");

            $c->dataNasc = date('Y-m-d H:i:s');
            $this->stmt->execute([$c->nome, $c->cpf, $c->rg, $c->email, $c->endereco, $c->telefone1, $c->telefone2, $c->dataNasc, $c->isAtivo]);
        } catch (Exception $Exception) {
            echo $Exception->getMessage();
        }
    }

    public function alterarCliente($c)
    {
        try {
            $this->stmt = $this->pdo->prepare(" UPDATE Cliente 
                                                 set   
                                                 nome = ?, 
                                                 cpf = ?,
                                                 rg = ?,
                                                 email = ?,
                                                 endereco = ?,
                                                 telefone1 = ?,
                                                 telefone2 = ?,
                                                 dataNasc = ?,
                                                 isAtivo = ?

                                             WHERE idCliente = ?
                                          ");
            $this->stmt->execute([$c->nome, $c->cpf, $c->rg, $c->email, $c->endereco, $c->telefone1, $c->telefone2, $c->dataNasc, $c->isAtivo, $c->idCliente]);
        } catch (PDOException $erro) {
            echo $erro;
        }
    }

    public function retornaClientes($where)
    {
        foreach ($this->pdo->query("SELECT * FROM Cliente " . $where) as $row) {
            echo "<tr class='tr-lista-clientes'>";
            echo "<td style='display:none;' id='idCliente' >" . $row['idCliente'] . "</th>";
            $id = $row['idCliente'];
            echo "<td class='td-lista-clientes'>" . $row['nome'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['cpf'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['rg'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['email'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['endereco'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['telefone1'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['telefone2'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['dataNasc'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['isAtivo'] . "</th>";
            echo "<td class='td-lista-clientes'><button class='btn btn-warning' id='btnAmarelo' type='button' onclick='editarCliente($id)'>Editar</button></th>";
            echo "<td class='td-lista-clientes'><button class='btn btn-danger' id='btnVermelho' type='button' >Excluir</button></th>";
            echo "</tr>";
        }
    }

    public function retornaUmCliente($where)
    {
        $cliente = new Cliente;

        foreach ($this->pdo->query("SELECT * FROM Cliente " . $where) as $row) {
            $cliente->nome = $row['nome'];
            $cliente->cpf = $row['cpf'];
            $cliente->rg = $row['rg'];
            $cliente->email = $row['email'];
            $cliente->endereco = $row['endereco'];
            $cliente->telefone1 = $row['telefone1'];
            $cliente->telefone2 = $row['telefone2'];
            $cliente->dataNasc = $row['dataNasc'];
            $cliente->isAtivo = $row['isAtivo'];
        }

        return $cliente;
    }


    public function verificaLoginSenha($login, $senha)
    {
        foreach ($this->pdo->query(" SELECT senha from LoginSenha
                                        WHERE login IN ('$login');") as $row) {
            $verifica = $row['senha'];
        }
        if (password_verify($senha, $verifica)) {
            echo 'Senha Correta';
        } else {
            echo 'Senha Incorreta';
        }
    }
}

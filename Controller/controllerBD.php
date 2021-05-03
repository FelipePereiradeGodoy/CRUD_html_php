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
                                                  email, 
                                                  telefone1, telefone2, 
                                                  dataNasc, isAtivo, idFuncionario
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
            $this->stmt->execute([$c->nome, $c->cpf, $c->rg, $c->email, $c->telefone1, $c->telefone2, $c->dataNasc, $c->isAtivo, $c->idFuncionario]);
        } catch (PDOException $erro) {
            echo $erro;
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
                                                 telefone1 = ?,
                                                 telefone2 = ?,
                                                 dataNasc = ?,
                                                 isAtivo = ?

                                             WHERE idCliente = ?
                                          ");
            $this->stmt->execute([$c->nome, $c->cpf, $c->rg, $c->email, $c->telefone1, $c->telefone2, $c->dataNasc, $c->isAtivo, $c->idCliente]);
        } catch (PDOException $erro) {
            echo $erro;
        }
    }

    public function retornaClientes($where, $adm)
    {
        foreach ($this->pdo->query("SELECT * FROM Cliente " . $where) as $row) {
            echo "<tr class='tr-lista-clientes'>";
            echo "<td style='display:none;' id='idCliente' >" . $row['idCliente'] . "</th>";
            $id = $row['idCliente'];
            echo "<td class='td-lista-clientes'>" . $row['nome'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['cpf'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['rg'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['email'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['telefone1'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['telefone2'] . "</th>";
            echo "<td class='td-lista-clientes'>" . $row['dataNasc'] . "</th>";
            echo "<td class='td-lista-clientes'>" . ($row['isAtivo'] == 1 ? 'Ativo' : 'Não Ativo') . "</th>";
            echo "<td class='td-lista-clientes'>
                    <button class='btn-img' type='button' onclick='pageEndereco($id)'> 
                        <img id='img-place' src='../../img/place.svg' alt='simbolo de localização'> 
                    </button>
                  </th>";
            echo "<td class='td-lista-clientes'>
                    <button class='btn-img' type='button' onclick='editarCliente($id)'> 
                        <img id='img-edit' src='../../img/edit.svg' alt='Icone de editar cliente'> 
                    </button>
                  </th>";
            if ($adm) {
                echo "<td class='td-lista-clientes'>
                        <button class='btn-img' type='button' onclick='excluirCliente($id)'> 
                            <img id='img-delete' src='../../img/delete.svg' alt='Icone para excluir cliente'> 
                        </button>
                      </th>";
            }
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
            $cliente->telefone1 = $row['telefone1'];
            $cliente->telefone2 = $row['telefone2'];
            $cliente->dataNasc = $row['dataNasc'];
            $cliente->isAtivo = $row['isAtivo'];
        }

        return $cliente;
    }

    public function excluirCliente($idCliente)
    {
        try {
            $this->stmt = $this->pdo->prepare(" DELETE
                                                FROM Cliente
                                                WHERE idCliente = ?
                                             ");
            $this->stmt->execute([$idCliente]);
        } catch (PDOException $erro) {
            echo $erro;
        }
    }

    public function inserirEndereco($end)
    {
        try {
            $this->stmt = $this->pdo->prepare(" INSERT INTO 
                                                Endereco 
                                                ( 
                                                  cep, rua, bairro, numero, idCliente
                                                )
                                                VALUES
                                                (
                                                  ?, ?, ?, ?, ?
                                                )
                                            ");

            $this->stmt->execute([$end->cep, $end->rua, $end->bairro, $end->numero, $end->idCliente]);
        } catch (PDOException $erro) {
            echo $erro;
        }
    }

    public function printEnderecos($where)
    {
        try {
            foreach ($this->pdo->query("SELECT 
                                            Cliente.nome, Endereco.idEndereco,
                                            Endereco.cep, Endereco.rua,
                                            Endereco.bairro, Endereco.numero,
                                            Endereco.idCliente
                                        FROM Endereco 
                                        INNER JOIN 
                                            Cliente ON Cliente.idCliente = Endereco.idCliente
                                        $where    
                                       ") as $row) {

                echo "<tr class='tr-lista-enderecos'>";
                echo "<td style='display:none;' id='idEndereco' >" . $row['idEndereco'] . "</th>";
                $idEndereco = $row['idEndereco'];
                echo "<td class='td-lista-enderecos'>" . $row['nome'] .        "</th>";
                echo "<td class='td-lista-enderecos'>" . $row['cep'] .        "</th>";
                echo "<td class='td-lista-enderecos'>" . $row['rua'] .        "</th>";
                echo "<td class='td-lista-enderecos'>" . $row['bairro'] .     "</th>";
                echo "<td class='td-lista-enderecos'>" . $row['numero'] .     "</th>";
                $idCliente = $row['idCliente'];
                echo "<td class='td-lista-clientes'>
                        <button class='btn-img' type='button' onclick='editarEndereco($idEndereco, $idCliente)'> 
                            <img id='img-edit' src='../../img/edit.svg' alt='Icone de editar cliente'> 
                        </button>
                      </th>";

                echo "<td class='td-lista-clientes'>
                        <button class='btn-img' type='button' onclick='excluirEndereco($idEndereco, $idCliente)'> 
                            <img id='img-delete' src='../../img/delete.svg' alt='Icone para excluir cliente'> 
                        </button>
                      </th>";

                echo "</tr>";
            }
        } catch (PDOException $erro) {
            echo $erro . "<br>";
        }
    }

    public function retornaUmEndereco($where)
    {
        $end = new Endereco;

        foreach ($this->pdo->query("SELECT * FROM Endereco " . $where) as $row) {
            $end->idEndereco = $row['idEndereco'];
            $end->cep = $row['cep'];
            $end->rua = $row['rua'];
            $end->bairro = $row['bairro'];
            $end->numero = $row['numero'];
            $end->idCliente = $row['idCliente'];
        }

        return $end;
    }

    public function alterarEndereco($end)
    {
        try {
            $this->stmt = $this->pdo->prepare(" UPDATE Endereco 
                                                 set   
                                                 cep = ?, 
                                                 rua = ?,
                                                 bairro = ?,
                                                 numero = ?
                                                WHERE idCliente = ? AND idEndereco = ?
                                          ");
            $this->stmt->execute([$end->cep, $end->rua, $end->bairro, $end->numero, $end->idCliente, $end->idEndereco]);
        } catch (PDOException $erro) {
            echo $erro;
        }
    }

    public function excluirEndereco($idEndereco)
    {
        try {
            $this->stmt = $this->pdo->prepare(" DELETE 
                                                FROM Endereco
                                                WHERE idEndereco = ?
                                             ");
            $this->stmt->execute([$idEndereco]);
        } catch (PDOException $erro) {
            echo $erro;
        }
    }

    public function cadastrarFuncionario($func)
    {
        try {
            $this->stmt = $this->pdo->prepare(" INSERT INTO Funcionario
                                                 (
                                                   nome, cpf,
                                                   usuario, senha,
                                                   isAdm
                                                 )
                                                 VALUES
                                                 (
                                                   ?, ?,
                                                   ?, ?,
                                                   ?
                                                 )          
                                             ");
            $this->stmt->execute([$func->nome, $func->cpf, $func->usuario, $func->senha, $func->isAdm]);
        } catch (PDOException $erro) {
            echo $erro;
        }
    }


    public function verificaLoginSenha($usuario, $senha)
    {
        foreach ($this->pdo->query(" SELECT senha, isAdm, idFuncionario FROM Funcionario
                                        WHERE usuario IN ('$usuario')") as $row) {
            $verifica = $row['senha'];
            $isAdm = $row['isAdm'];
            $idFuncionario = $row['idFuncionario'];
        }
        if (password_verify($senha, $verifica)) {
            return [1, $isAdm, $idFuncionario];
        } else {
            return [0, 0, 0];
        }
    }
}

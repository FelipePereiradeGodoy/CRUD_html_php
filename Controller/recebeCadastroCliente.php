<?php
session_start();

if ($_SESSION['usuarioValido'] !== 1) {
    unset($_SESSION['usuarioValido']);
    unset($_SESSION['isAdm']);
    unset($_SESSION['idFuncionario']);

    header("Location: https://localhost/CRUD_html_php/View/page-login/login.html");
}


$path = $_SERVER['DOCUMENT_ROOT']; //UBUNTU
require($path . '/CRUD_html_php/Model/Cliente.php'); //UBUNTU
require($path . '/CRUD_html_php/Controller/controllerBD.php');  //UBUNTU


//$_DIR = $_SERVER['DOCUMENT_ROOT'];//WINDOWS
//require($_DIR . "/GitHub_ProjetoWeb/CRUD_html_php/Model/Cliente.php"); //WINDOWS
//require($_DIR . "/GitHub_ProjetoWeb/CRUD_html_php/Controller/controllerBD.php"); //WINDOWS

if (isset($_POST['isAtivo']))
    $ativo = 1;
else
    $ativo = 0;


$c = new Cliente;

$c->idCliente = $_POST['idCliente'];
$c->nome = $_POST['nome'];
$c->cpf = $_POST['cpf'];
$c->rg = $_POST['rg'];
$c->email = $_POST['email'];
$c->endereco = $_POST['endereco'];
$c->telefone1 = $_POST['telefone1'];
$c->telefone2 = $_POST['telefone2'];
$c->dataNasc = $_POST['dataNasc'];
$c->isAtivo = $ativo;
$c->idFuncionario = intval($_SESSION['idFuncionario']);

$control = new controllerBD;

if ($c->idCliente == null ||  $c->idCliente = "")
    $control->inserirCliente($c);
else
    $control->alterarCliente($c);



header("Location: https://localhost/CRUD_html_php/View/page-lista-clientes/listaClientes.php");//UBUNTU
//header("Location: http://localhost/GitHub_ProjetoWeb/CRUD_html_php/View/listaClientes.php"); //Windows

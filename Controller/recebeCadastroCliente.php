<?php

//$path = $_SERVER['DOCUMENT_ROOT']; //UBUNTU
//require($path . '/CRUD_html_php/Model/Cliente.php'); //UBUNTU
//require($path . '/CRUD_html_php/Controller/controllerBD.php');  //UBUNTU

$_DIR = $_SERVER['DOCUMENT_ROOT'];//WINDOWS
require($_DIR . "/GitHub_ProjetoWeb/CRUD_html_php/Model/Cliente.php"); //WINDOWS
require($_DIR . "/GitHub_ProjetoWeb/CRUD_html_php/Controller/controllerBD.php"); //WINDOWS

if(isset($_POST['isAtivo'])) 
    $ativo = 1;
else
    $ativo = 0;

$c = new Cliente;

$idCliente = $_POST['idCliente'];
$c->nome = $_POST['nome'];
$c->cpf = $_POST['cpf'];
$c->rg = $_POST['rg'];
$c->email = $_POST['email'];
$c->endereco = $_POST['endereco'];
$c->telefone1 = $_POST['telefone1'];
$c->telefone2 = $_POST['telefone2'];
$c->dataNasc = $_POST['dataNasc'];
$c->isAtivo = $ativo;

$control = new controllerBD;

//if ($idCliente !== null && "")
//    $control->alterarCliente($c);
//else
    $control->inserirCliente($c);


//header("Location: https://localhost/CRUD_html_php/View/listaClientes.php");//UBUNTU
header("Location: http://localhost/GitHub_ProjetoWeb/CRUD_html_php/View/listaClientes.php"); //Windows

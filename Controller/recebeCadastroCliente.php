<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require($path . '/CRUD_html_php/Model/Cliente.php');
require($path . '/CRUD_html_php/Controller/controllerBD.php');

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

$control = new controllerBD;

if ($idCliente !== null && "")
    $control->alterarCliente($c);
else
    $control->inserirCliente($c);


header("Location: https://localhost/CRUD_html_php/View/listaClientes.php");

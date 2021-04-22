<?php

include('../Model/Endereco.php');
include('../Controller/controllerBD.php');

$end = new Endereco;

$end->cep = $_POST['cep'];
$end->rua = $_POST['rua'];
$end->bairro = $_POST['bairro'];
$end->numero = $_POST['numero'];
$end->idCliente = $_POST['idCliente'];

$control = new ControllerBD;

$control->inserirEndereco($end);

header("Location: https://localhost/CRUD_html_php/View/listaEndereco.php");//UBUNTU

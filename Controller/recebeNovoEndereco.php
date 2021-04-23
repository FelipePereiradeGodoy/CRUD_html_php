<?php

include('../Model/Endereco.php');
include('../Controller/controllerBD.php');


$end = new Endereco;

$end->idEndereco = $_POST['idEndereco'];
$end->cep = $_POST['cep'];
$end->rua = $_POST['rua'];
$end->bairro = $_POST['bairro'];
$end->numero = $_POST['numero'];
$end->idCliente = $_POST['idCliente'];
$control = new ControllerBD;

if ($end->idEndereco == null ||  $end->idEndereco == "")
    $control->inserirEndereco($end);
else
    $control->alterarEndereco($end);


header("Location: https://localhost/CRUD_html_php/View/page-lista-endereco/listaEndereco.php" . "?id=" . $end->idCliente);//UBUNTU

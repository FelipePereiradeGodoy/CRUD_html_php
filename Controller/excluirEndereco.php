<?php
session_start();

if ($_SESSION['usuarioValido'] !== 1) {
    unset($_SESSION['usuarioValido']);
    unset($_SESSION['isAdm']);
    header("Location: https://localhost/CRUD_html_php/View/page-login/login.html");
}

include('./controllerBD.php');

$idCliente = $_GET['idCliente'];
$idEndereco = $_GET['idEndereco'];

$control = new controllerBD;

$control->excluirEndereco($idEndereco);

header("Location: https://localhost/CRUD_html_php/View/page-lista-endereco/listaEndereco.php?id=$idCliente");

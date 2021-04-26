<?php
session_start();

if ($_SESSION['usuarioValido'] !== 1) {
    unset($_SESSION['usuarioValido']);
    unset($_SESSION['isAdm']);
    header("Location: https://localhost/CRUD_html_php/View/page-login/login.html");
}

include('./controllerBD.php');

$idCliente = $_GET['idCliente'];

$control = new controllerBD;

$control->excluirCliente($idCliente);


header("Location: https://localhost/CRUD_html_php/View/page-lista-clientes/listaClientes.php");

<?php
include('./controllerBD.php');

$idCliente = $_GET['idCliente'];

$control = new controllerBD;

$control->excluirCliente($idCliente);


header("Location: https://localhost/CRUD_html_php/View/page-lista-clientes/listaClientes.php");

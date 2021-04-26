<?php
include('../Model/Funcionario.php');
include('../Controller/controllerBD.php');


if (isset($_POST['isAdm']))
    $isAdm = 1;
else
    $isAdm = 0;


$func = new Funcionario;

$func->nome = $_POST['nome'];
$func->cpf = $_POST['cpf'];
$func->usuario = $_POST['usuario'];
$func->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$func->isAdm = $isAdm;


$control = new ControllerBD;

$control->cadastrarFuncionario($func);

header("Location: https://localhost/CRUD_html_php/View/page-login/login.html");

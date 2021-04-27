<?php
include('../Controller/controllerBD.php');
session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$control = new ControllerBD;
$array_UsuarioValido_isAdm_idFuncionario = $control->verificaLoginSenha($usuario, $senha);

$usuarioValido = $array_UsuarioValido_isAdm_idFuncionario[0];
$isAdm = $array_UsuarioValido_isAdm_idFuncionario[1];
$idFuncionario = $array_UsuarioValido_isAdm_idFuncionario[2];


if ($usuarioValido) {
    $_SESSION['usuarioValido'] = $usuarioValido;
    $_SESSION['isAdm'] = $isAdm;
    $_SESSION['idFuncionario'] = $idFuncionario;

    header("Location: https://localhost/CRUD_html_php/View/page-lista-clientes/listaClientes.php"); //Ubuntu    
} else {
    unset($_SESSION['usuarioValido']);
    unset($_SESSION['isAdm']);
    unset($_SESSION['idFuncionario']);

    header("Location: https://localhost/CRUD_html_php/View/page-login/login.html"); //Ubuntu    
}
    



    //header("Location: http://localhost/GitHub_ProjetoWeb/CRUD_html_php/View/listaClientes.php"); //Windows

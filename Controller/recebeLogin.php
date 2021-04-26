<?php
include('../Controller/controllerBD.php');


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


$control = new ControllerBD;
$usuarioValido = $control->verificaLoginSenha($usuario, $senha);

if ($usuarioValido)
    header("Location: https://localhost/CRUD_html_php/View/page-lista-clientes/listaClientes.php"); //Ubuntu    
else
    header("Location: https://localhost/CRUD_html_php/View/page-login/login.html"); //Ubuntu    


    //header("Location: http://localhost/GitHub_ProjetoWeb/CRUD_html_php/View/listaClientes.php"); //Windows

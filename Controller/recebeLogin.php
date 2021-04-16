<?php
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $entrar = $_POST['entrar'];
   
    //if(isset($entrar)) {
    //    ClControllerBD $control = new ClControllerBD(); 
    //    $control->verificaLoginSenha($login, $senha);
    //}

    header("Location: ../View/cadastroCliente.html");
?>
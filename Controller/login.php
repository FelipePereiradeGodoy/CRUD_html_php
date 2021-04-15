<?php
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $entrar = $_POST['entrar'];

    if(isset($entrar)) {
        $bancoMysql->verificaLoginSenha($login, $senha);
    }
?>
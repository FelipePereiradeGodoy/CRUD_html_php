<?php
    require_once("../Model/Cliente.php");
    require_once("./ControllerBD.php");
    
    ClCliente $c = ClCliente();
    
    $c->nome = POST['nome'];
    $c->cpf = POST['cpf'];
    $c->rg =  POST['rg'];
    $c->email = POST['email'];
    $c->endereco = POST['endereco'];
    $c->telefone1 = POST['telefone1'];
    $c->telefone2 = POST['telefone2'];
    $c-> dataNasc = POST['dataNasc'];

    ClControllerBD $control = ClControllerBD();
    $control.insereCliente($c);
    
?>
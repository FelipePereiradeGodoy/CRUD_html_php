<?php 
    namespace Controller;

    use \Model\Cliente;
    use \Controller\controllerBD;

    $c = new Cliente;

    $c->nome = $_POST['nome'];
    $c->cpf = $_POST['cpf'];
    $c->rg = $_POST['rg'];
    $c->email = $_POST['email'];
    $c->endereco = $_POST['endereco'];
    $c->telefone1 = $_POST['telefone1'];
    $c->telefone2 = $_POST['telefone2'];
    $c->dataNasc = $_POST['dataNasc'];


    $control = new controllerBD;
    $control->inserirCliente($c);
?>
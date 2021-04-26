<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    session_start();

    if ($_SESSION['usuarioValido'] !== 1) {
        unset($_SESSION['usuarioValido']);
        unset($_SESSION['isAdm']);
        header("Location: https://localhost/CRUD_html_php/View/page-login/login.html");
    }

    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editarEndereco.css">

    <title>Alterar Endereço</title>

    <?php

    require '../../Controller/controllerBD.php'; //UBUNTU
    include('../../Model/Endereco.php');

    $idCliente = $_GET['idCliente'];
    $idEndereco = $_GET['idEndereco'];

    $control = new ControllerBD;
    $end = new Endereco;

    $where = " WHERE idEndereco = $idEndereco";
    $end = $control->retornaUmEndereco($where);

    ?>

</head>

<body id="body-form">

    <form action="../../Controller/recebeNovoEndereco.php" method="POST" id="form-block">

        <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $end->idCliente; ?>">
        <input type="hidden" name="idEndereco" id="idEndereco" value="<?php echo $end->idEndereco; ?>">

        <label for="cep" class="label-input">CEP:</label>
        <input type="text" name="cep" id="cep" class="input-label" value="<?php echo $end->cep; ?>">

        <label for="rua" class="label-input">Rua:</label>
        <input type="text" name="rua" id="rua" class="input-label" value="<?php echo $end->rua; ?>">

        <label for="bairro" class="label-input">Bairro</label>
        <input type="text" name="bairro" id="bairro" class="input-label" value="<?php echo $end->bairro; ?>">

        <label for="numero" class="label-input">Número:</label>
        <input type="number" name="numero" id="numero" class="input-label" value="<?php echo $end->numero; ?>">

        <button type="submit" id="btn-salvar">Salvar</button>

    </form>

</body>

</html>
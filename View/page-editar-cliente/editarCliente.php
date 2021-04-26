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
    <link rel="stylesheet" href="../page-cadastro-clientes/cadastroCliente.css">

    <title>Cadastro Cliente</title>

    <?php

    require '../../Controller/controllerBD.php'; //UBUNTU
    include('../../Model/Cliente.php');

    $id = $_GET['id'];
    $control = new ControllerBD;
    $cliente = new Cliente;

    $where = "WHERE idCliente = " . $id;
    $cliente = $control->retornaUmCliente($where);

    ?>

</head>

<body>

    <form id="form-block" action="../../Controller/recebeCadastroCliente.php" method="POST">
        <div id="form-center">
            <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $id; ?>">

            <div class="row mb-3" id="div-row-mb-3">

                <label for="nome">Nome Completo:</label>

                <div class="col-sm-10">
                    <input type="text" name="nome" id="nome" class="inputText" value="<?php echo $cliente->nome; ?>">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="cpf">CPF:</label>

                <div class="col-sm-10">
                    <input type="text" name="cpf" id="cpf" class="inputText" value="<?php echo $cliente->cpf; ?>">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="rg">RG:</label>

                <div class="col-sm-10">
                    <input type="text" name="rg" id="rg" class="inputText" value=" <?php echo $cliente->rg; ?>">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="email">Email:</label>

                <div class="col-sm-10">
                    <input type="text" name="email" id="email" class="inputText" value="<?php echo $cliente->email; ?>">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="endereco">Endereço:</label>

                <div class="col-sm-10">
                    <input type="text" name="endereco" id="endereco" class="inputText" value="<?php echo $cliente->endereco; ?>">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="telefone1">Telefone 1:</label>

                <div class="col-sm-10">
                    <input type="text" name="telefone1" id="telefone1" class="inputText" value="<?php echo $cliente->telefone1; ?>">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="telefone2">Telefone 2:</label>

                <div class="col-sm-10">
                    <input type="text" name="telefone2" id="telefone2" class="inputText" value="<?php echo $cliente->telefone2; ?>">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="dataNasc">Data Nascimento:</label>

                <div class="col-sm-10">
                    <input type="date" name="dataNasc" id="dataNasc" value="<?php echo $cliente->dataNasc; ?>">
                </div>

            </div>

            <div class="col-sm-10 offset-sm-2" id="div-row-mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="isAtivo" id="isAtivo" <?php echo $cliente->isAtivo == 1 ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="gridCheck1">
                        Cliente Ativo
                    </label>
                </div>
            </div>

            <div class="row mb-3" id="div-row-mb-3">
                <button type="submit" class="btn btn-primary" id="btn-Salvar">Salvar</button>
            </div>
        </div>
    </form>

</body>

</html>
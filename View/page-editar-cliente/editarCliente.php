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
    <script type="text/javascript" src="../../JS/buscaCliente.js"></script>

    <title>Cadastro Cliente</title>

    <?php

    require '../../Controller/controllerBD.php'; //UBUNTU
    include('../../Model/Cliente.php');

    $id = $_GET['id'];
    $control = new ControllerBD;
    $cliente = new Cliente;
    $urlVoltar = $_SESSION['urlRetorno'];


    $where = "WHERE idCliente = " . $id;
    $cliente = $control->retornaUmCliente($where);

    ?>

</head>

<body>

    <div class="page-cadastro-cliente">
        <form id="form-block" action="../../Controller/recebeCadastroCliente.php" method="POST">

            <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $id; ?>">

            <div class="input-btnVoltar-block">
                <a href="<?php echo $urlVoltar ?>">
                    <img id='imgSetaEsquerda' src="../../img/arrow-left-square.svg" alt="Seta indicando para voltar">
                </a>
            </div>

            <div class="input-block">

                <label for="nome">Nome Completo:</label>
                <input type="text" name="nome" id="nome" class="inputText" value="<?php echo $cliente->nome; ?>" pattern="[a-zA-Z\s]+$">

            </div>

            <div class="input-block">

                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" class="inputText" value="<?php echo $cliente->cpf; ?>" required="required" pattern="(\d{3})\.(\d{3})\.(\d{3}).(\d{2})">

            </div>

            <div class="input-block">

                <label for="rg">RG:</label>
                <input type="text" name="rg" id="rg" class="inputText" value=" <?php echo $cliente->rg; ?>" pattern="(\d{2})\.(\d{3})\.(\d{3}).(\d{1})">

            </div>

            <div class="input-block">

                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="inputText" value="<?php echo $cliente->email; ?>" required="required" pattern="^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$">

            </div>


            <div class="input-block">

                <label for="telefone1">Telefone 1:</label>
                <input type="text" name="telefone1" id="telefone1" class="inputText" value="<?php echo $cliente->telefone1; ?>" required="required" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4}">

            </div>

            <div class="input-block">

                <label for="telefone2">Telefone 2:</label>
                <input type="text" name="telefone2" id="telefone2" class="inputText" value="<?php echo $cliente->telefone2; ?>" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4}">

            </div>

            <div class="input-block">

                <label for="dataNasc">Data Nascimento:</label>
                <input type="date" name="dataNasc" id="dataNasc" value="<?php echo $cliente->dataNasc; ?>" required="required">

            </div>

            <div class="input-checkbox-block"">
                <input class=" form-check-input" type="checkbox" name="isAtivo" id="isAtivo" <?php echo $cliente->isAtivo == 1 ? 'checked' : ''; ?>>
                <label class="form-check-label" for="gridCheck1">
                    Cliente Ativo
                </label>
            </div>

            <div class="input-button-block">
                <button type="submit">
                    <img id="imgCheck" src="../../img/check.svg" alt="imagem de check para salvar novo funcionario" />
                </button>
            </div>

        </form>
    </div>
</body>

</html>
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

    $urlVoltar = $_SESSION['urlRetorno'];
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="cadastroCliente.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


    <script type="text/javascript" src="../../JS/buscaCliente.js"></script>
    <script type="text/javascript" src="../../JS/validacao.js"></script>


    <title>Cadastro Cliente</title>
</head>

<body>
    <div class="page-cadastro-cliente">
        <form id="formCadastroCliente" action="../../Controller/recebeCadastroCliente.php" method="POST">

            <div class="input-btnVoltar-block">
                <a href="<?php echo $urlVoltar ?>">
                    <img id='imgSetaEsquerda' src="../../img/arrow-left-square.svg" alt="Seta indicando para voltar">
                </a>
            </div>

            <input type="hidden" name="idCliente" id="idCliente" value="">

            <div class="input-block">

                <label for="nome">Nome Completo:</label>
                <input type="text" name="nome" id="nome" class="inputText" required="required" pattern="[a-zA-Z\s]+$">

            </div>

            <div class="input-block">

                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" class="inputText" required="required" pattern="(\d{3})\.(\d{3})\.(\d{3}).(\d{2})">

            </div>

            <div class="input-block">

                <label for="rg">RG:</label>
                <input type="text" name="rg" id="rg" class="inputText" pattern="(\d{2})\.(\d{3})\.(\d{3}).(\d{1})">

            </div>

            <div class="input-block">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="inputText" required="required" pattern="^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$">

            </div>


            <div class="input-block">

                <label for="telefone1">Telefone 1:</label>
                <input type="text" name="telefone1" id="telefone1" class="inputText" required="required" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4}">

            </div>

            <div class="input-block">

                <label for="telefone2">Telefone 2:</label>
                <input type="text" name="telefone2" id="telefone2" class="inputText" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4}">

            </div>

            <div class="input-block">

                <label for="dataNasc">Data Nascimento:</label>
                <input type="date" name="dataNasc" id="dataNasc" required="required">

            </div>

            <div class="input-checkbox-block">
                <input type="checkbox" name="isAtivo" id="isAtivo" checked>
                <label for="gridCheck1">
                    Cliente Ativo
                </label>
            </div>

            <div class="input-button-block">
                <button type="submit" id="btn-submit">
                    <img id="imgCheck" src="../../img/check.svg" alt="imagem de check para salvar novo funcionario" />
                </button>
            </div>
    </div>
    </form>

</body>

</html>
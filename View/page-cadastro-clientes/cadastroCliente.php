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
    <link rel="stylesheet" href="cadastroCliente.css">

    <title>Cadastro Cliente</title>
</head>

<body>

    <form id="form-block" action="../../Controller/recebeCadastroCliente.php" method="POST">
        <div id="form-center">
            <input type="hidden" name="idCliente" id="idCliente" value="">

            <div class="row mb-3" id="div-row-mb-3">

                <label for="nome">Nome Completo:</label>

                <div class="col-sm-10">
                    <input type="text" name="nome" id="nome" class="inputText">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="cpf">CPF:</label>

                <div class="col-sm-10">
                    <input type="text" name="cpf" id="cpf" class="inputText">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="rg">RG:</label>

                <div class="col-sm-10">
                    <input type="text" name="rg" id="rg" class="inputText">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="email">Email:</label>

                <div class="col-sm-10">
                    <input type="text" name="email" id="email" class="inputText">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="endereco">Endereço:</label>

                <div class="col-sm-10">
                    <input type="text" name="endereco" id="endereco" class="inputText">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="telefone1">Telefone 1:</label>

                <div class="col-sm-10">
                    <input type="text" name="telefone1" id="telefone1" class="inputText">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="telefone2">Telefone 2:</label>

                <div class="col-sm-10">
                    <input type="text" name="telefone2" id="telefone2" class="inputText">
                </div>

            </div>

            <div class="row mb-3" id="div-row-mb-3">

                <label for="dataNasc">Data Nascimento:</label>

                <div class="col-sm-10">
                    <input type="date" name="dataNasc" id="dataNasc">
                </div>

            </div>

            <div class="col-sm-10 offset-sm-2" id="div-row-mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="isAtivo" id="isAtivo" checked>
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
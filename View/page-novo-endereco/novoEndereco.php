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
    <link rel="stylesheet" href="novoEndereco.css">
    <script type="text/javascript" src="../../JS/endereco.js"></script>

    <title>Novo Endereço</title>

    <?php
    $id = $_GET['id'];

    ?>

</head>

<body>

    <div class="page-novo-endereco">
        <form action="../../Controller/recebeNovoEndereco.php" method="POST" id="form-block">

            <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $id; ?>">
            <input type="hidden" name="idEndereco" id="idEndereco" value="">

            <div class="input-btnVoltar-block">
                <a href="https://localhost/CRUD_html_php/View/page-lista-endereco/listaEndereco.php?id=<?php echo $id; ?>">
                    <img id='imgSetaEsquerda' src="../../img/arrow-left-square.svg" alt="Seta indicando para voltar">
                </a>
            </div>

            <div class="input-block">
                <label for="cep" class="label-input">CEP:</label>
                <input type="text" name="cep" id="cep" class="input-label">
            </div>

            <div class="input-block">
                <label for="rua" class="label-input">Rua:</label>
                <input type="text" name="rua" id="rua" class="input-label">
            </div>

            <div class="input-block">
                <label for="bairro" class="label-input">Bairro</label>
                <input type="text" name="bairro" id="bairro" class="input-label">
            </div>

            <div class="input-block">
                <label for="numero" class="label-input">Número:</label>
                <input type="number" name="numero" id="numero" class="input-label">
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
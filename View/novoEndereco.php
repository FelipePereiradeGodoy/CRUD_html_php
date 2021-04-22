<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="novoEndereco.css">

    <title>Novo Endereço</title>

    <?php
    $id = $_GET['id'];
    ?>

</head>

<body id="body-form">

    <form action="../Controller/recebeNovoEndereco.php" method="POST" id="form-block">

        <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $id ?>">

        <label for="cliente" class="label-input">Cliente:</label>
        <input type="text" name="cliente" class="input-label">

        <label for="cep" class="label-input">CEP:</label>
        <input type="text" name="cep" id="cep" class="input-label">

        <label for="rua" class="label-input">Rua:</label>
        <input type="text" name="rua" id="rua" class="input-label">

        <label for="bairro" class="label-input">Bairro</label>
        <input type="text" name="bairro" id="bairro" class="input-label">

        <label for="numero" class="label-input">Número:</label>
        <input type="number" name="numero" id="numero" class="input-label">

        <button type="submit" id="btn-salvar">Salvar</button>

    </form>

</body>

</html>
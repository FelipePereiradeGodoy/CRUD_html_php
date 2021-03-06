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

    <title>Endereço</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="listaEndereco.css">
    <script type="text/javascript" src="../../JS/endereco.js"></script>

    <?php
    $id = $_GET['id'];
    $urlVoltar = $_SESSION['urlRetorno'];

    ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-orange">
        <div class="container-fluid">

            <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $id; ?>">

            <a id="seta-block" class="navbar-brand" href="<?php echo $urlVoltar ?>">

                <img id='imgSetaEsquerda' src="../../img/arrow-left-square.svg" alt="Seta indicando para voltar">
            </a>

            <a id="plus-block" class="navbar-brand" href="#" onclick="novoEndereco()">
                <img id="imgPlus" src="../../img/plus-square.svg" alt="imagem de um MAIS para o botão de adiconar novo endereço">
            </a>

        </div>
    </nav>

    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>CEP</th>
                <th>Rua</th>
                <th>Bairro</th>
                <th>Número</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../../Controller/controllerBD.php'; //UBUNTU

            $control = new ControllerBD;
            $where = "WHERE Endereco.idCliente = " . $id;

            $control->printEnderecos($where);
            ?>
        </tbody>
    </table>
</body>

</html>
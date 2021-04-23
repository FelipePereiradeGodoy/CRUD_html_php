<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="View.css">

    <title>Endereço</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="listaEndereco.css">
    <script type="text/javascript" src="../../JS/endereco.js"></script>

    <?php
    $id = $_GET['id'];
    ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-orange">
        <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $id ?>">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" onclick="novoEndereco()">Novo Endereço</a>
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

            $where = $id;
            $control->retornaEnderecos($where);
            ?>
        </tbody>
    </table>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="View.css">

    <title>Busca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="busca.css">
    <script type="text/javascript" src="../JS/buscaCliente.js"></script>

    <?php
    $nome = $_POST['inputBuscar'];
    $where = "WHERE nome LIKE '" . $nome . "%'";
    ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-orange">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" onclick="voltarListaCliente()">
                <img id='imgSetaEsquerda' src="../img/arrow-left-square.svg" alt="Seta indicando para voltar">
            </a>
        </div>
    </nav>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Telefone 1</th>
                <th>Telefone 2</th>
                <th>Data Nascimento</th>
                <th>Editar</th>
                <th>Desativar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../Controller/controllerBD.php'; //UBUNTU

            //$_DIR = $_SERVER['DOCUMENT_ROOT'];//WINDOWS
            //require($_DIR . "/GitHub_ProjetoWeb/CRUD_html_php/Controller/controllerBD.php"); //WINDOWS

            $control = new ControllerBD;
            $control->retornaClientes($where);
            ?>
        </tbody>
    </table>
</body>

</html>
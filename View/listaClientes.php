<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="View.css">

    <title>Lista Clientes</title>

    <script type="text/javascript" src="../JS/listaClientes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="lista.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-orange">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" onclick="novoCliente()">Novo Cliente</a>

            <form class="d-flex" action="busca.php" method="POST">
                <input class="form-control me-2" id='inputBuscar' name='inputBuscar' type="search" placeholder="Nome do Cliente" aria-label="Search">
                <button class="btn btn-outline-success" id='btnBuscar' name='btnBuscar' type="submit" onclick="buscarCliente()">Buscar</button>
            </form>
        </div>
        </div>
    </nav>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Email</th>
                <th>Telefone 1</th>
                <th>Telefone 2</th>
                <th>Data Nascimento</th>
                <th>Ativo</th>
                <th>Endereço</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../Controller/controllerBD.php'; //UBUNTU

            //$_DIR = $_SERVER['DOCUMENT_ROOT'];//WINDOWS
            //require($_DIR . "/GitHub_ProjetoWeb/CRUD_html_php/Controller/controllerBD.php"); //WINDOWS

            $control = new ControllerBD;

            $where = '';
            $control->retornaClientes($where);
            ?>
        </tbody>
    </table>
</body>

</html>
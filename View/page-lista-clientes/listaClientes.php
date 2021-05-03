<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php
    session_start();
    $adm = 0;


    if ($_SESSION['usuarioValido'] !== 1) {
        unset($_SESSION['usuarioValido']);
        unset($_SESSION['isAdm']);
        header("Location: https://localhost/CRUD_html_php/View/page-login/login.html");
    } else {
        if ($_SESSION['isAdm'] == 1)
            $adm = 1;

        $idFuncionario = $_SESSION['idFuncionario'];
        $_SESSION['urlRetorno'] = "https://localhost/CRUD_html_php/View/page-lista-clientes/listaClientes.php";
    }

    ?>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="View.css">

    <title>Lista Clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="lista.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script type="text/javascript" src="../../JS/listaClientes.js"></script>
</head>

<body>
    <input type="hidden" name="flagPag" id="flagPag" value="listaClientes">

    <nav class="navbar navbar-expand-lg navbar-dark bg-orange">
        <div class="container-fluid">
            <a id="power-block" class="navbar-brand" href="#" onclick="sairDoSistema()">
                <img id='imgPower' src="../../img/power.svg" alt="imagem de power para botão de sair do sistema">
            </a>

            <a id="plus-block" class="navbar-brand" href="#" onclick="novoCliente()">
                <img id="imgPlus" src="../../img/plus-square.svg" alt="imagem de um MAIS para o botão de adiconar novo cliente">
            </a>

            <select id="select-filtro" class="form-select" aria-label="Default select example">
                <option id="filtroNome" name="filtroNome" value="0" selected>Nome</option>
                <option id="filtroCpf" name="filtroCpf" value="1">CPF</option>
                <option id="filtroAtivo" name="filtroAtivo" value="2">Ativo</option>
            </select>

            <form class="d-flex" action="../page-busca/busca.php" method="POST">
                <input type="hidden" name="filtro" id="filtro" value="0">
                <input type="hidden" name="flagPag" id="flagPag" value="listaClientes">

                <input class="form-control me-2" id='inputBuscar' name='inputBuscar' type="text" placeholder="Fulano de tal">

                <button class="btn btn-outline-success" id='btnBuscar' name='btnBuscar' type="submit">Buscar</button>
            </form>
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
                <th>Status</th>
                <th>Endereço</th>
                <th>Editar</th>
                <?php if ($adm) echo "<th>Excluir</th>" ?>
            </tr>
        </thead>
        <tbody>
            <?php
            require '../../Controller/controllerBD.php'; //UBUNTU

            //$_DIR = $_SERVER['DOCUMENT_ROOT'];//WINDOWS
            //require($_DIR . "/GitHub_ProjetoWeb/CRUD_html_php/Controller/controllerBD.php"); //WINDOWS

            $control = new ControllerBD;

            if ($adm == 1)
                $where = '';
            else
                $where = 'WHERE idFuncionario = ' . $idFuncionario;


            $control->retornaClientes($where, $adm);
            ?>
        </tbody>
    </table>
</body>

</html>
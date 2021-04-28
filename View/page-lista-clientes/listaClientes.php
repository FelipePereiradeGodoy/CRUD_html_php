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
    }

    $urlAtual = $_SERVER["REQUEST_URI"];

    ?>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="View.css">

    <title>Lista Clientes</title>

    <script type="text/javascript" src="../../JS/listaClientes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="lista.css">
</head>

<body>
    <input type="hidden" name="urlAtual" id="urlAtual" value="<?php echo $urlAtual; ?>">

    <nav class="navbar navbar-expand-lg navbar-dark bg-orange">
        <div class="container-fluid">
            <a id="power-block" class="navbar-brand" href="#" onclick="sairDoSistema()">
                <img id='imgPower' src="../../img/power.svg" alt="imagem de power para botão de sair do sistema">
            </a>

            <a id="plus-block" class="navbar-brand" href="#" onclick="novoCliente()">
                <img id="imgPlus" src="../../img/plus-square.svg" alt="imagem de um MAIS para o botão de adiconar novo cliente">
            </a>

            <form class="d-flex" action="../page-busca/busca.php" method="POST">
                <input type="hidden" name="flagPag" id="flagPag" value="listaClientes">
                <input class="form-control me-2" id='inputBuscar' name='inputBuscar' type="search" placeholder="Nome do Cliente" aria-label="Search">
                <button class="btn btn-outline-success" id='btnBuscar' name='btnBuscar' type="submit">Buscar</button>
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
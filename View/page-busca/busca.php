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
        $_SESSION['urlRetorno'] = "https://localhost/CRUD_html_php/View/page-busca/busca.php";
    }

    ?>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="View.css">

    <title>Busca</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="busca.css">
    <script type="text/javascript" src="../../JS/buscaCliente.js"></script>

    <?php
    $valueFiltro = $_POST['filtro'];
    $valueInput = $_POST['inputBuscar'];
    $campo = "";

    switch ($valueFiltro) {
        case 0:
            $campo = "nome";
            break;
        case 1:
            $campo = "cpf";
            break;
        case 2:
            $campo = "isAtivo";
            break;
    }
    //realizar um where para cada CASE!

    if ($adm == 1)
        $where = "WHERE nome LIKE '" . $nome . "%'";
    else
        $where = "WHERE nome LIKE '" . $nome . "%' AND idFuncionario = " . $idFuncionario;
    ?>
</head>

<body>
    <input type="hidden" name="flagPag" id="flagPag" value="listaBusca">

    <nav class="navbar navbar-expand-lg navbar-dark bg-orange">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://localhost/CRUD_html_php/View/page-lista-clientes/listaClientes.php">
                <img id='imgSetaEsquerda' src="../../img/arrow-left-square.svg" alt="Seta indicando para voltar">
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
            $control->retornaClientes($where, $adm);

            ?>
        </tbody>
    </table>
</body>

</html>
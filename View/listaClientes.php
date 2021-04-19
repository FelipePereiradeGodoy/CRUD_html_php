<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="View.css">

    <title>Lista Clientes</title>

    <link rel="stylesheet" href="listaCliente.css">
    <link rel="stylesheet" href="listaClienteCss.php" media="screen">
</head>

<body>
    <div class="menu">

    </div>

    <table>
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
                <th>Excluir</th>
            </tr>
        </thead>

        <tbody>
            <?php
            require '../Controller/controllerBD.php';

            $control = new ControllerBD;
            $control->retornaClientes();
            ?>
        </tbody>

    </table>
</body>

</html>
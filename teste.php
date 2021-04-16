<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>Teste</title>
    <link rel="stylesheet" href="teste.css">
</head>
<body>

<div class="menu">

</div> 

<table>
        <thead>
            <tr>
                <th>Identificador</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Telefone 1</th>
                <th>Telefone 2</th>
                <th>Data Nascimento</th>
            </tr>
        </thead>
            
        <?php 
            require 'Controller/controllerBD.php';
            $control = new ControllerBD;
            
            foreach($control->pdo->query("SELECT * FROM Cliente") as $row){
        ?>

        <tbody>
            <tr>
                <td><?php echo $row['nome']; ?></th>
                <td><?php echo $row['cpf']; ?></th>
                <td><?php echo $row['rg']; ?></th>
                <td><?php echo $row['email']; ?></th>
                <td><?php echo $row['endereco']; ?></th>
                <td><?php echo $row['telefone1']; ?></th>
                <td><?php echo $row['telefone2']; ?></th>
                <td><?php echo $row['dataNasc']; ?></th>
            </tr>
        </tbody>

        <?php 
            }
        ?>

    </table>
</body>
</html>
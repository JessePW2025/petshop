<?php
include "conexao.php";
$result = mysqli_query($conn, "SELECT * FROM clientes");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Imobiliária</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Clientes Cadastrados</h2>

<table>
    <tr>        
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Imóvel</th>
        <th>Valor</th>
        <th>Ações</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>        
        <td><?= $row['nome'] ?></td>
        <td><?= $row['telefone'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['tipo_imovel'] ?></td>
        <td><?= $row['valor_max'] ?></td>
        <td>
            <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
            <a href="excluir.php?id=<?= $row['id'] ?>">Excluir</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>

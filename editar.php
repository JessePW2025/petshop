<?php
include "conexao.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM clientes WHERE id=$id");
$cliente = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Editar Cliente</h2>

<form action="atualizar.php" method="POST">
    <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

    <input type="text" name="nome" value="<?= $cliente['nome'] ?>" required>
    <input type="text" name="telefone" value="<?= $cliente['telefone'] ?>" required>
    <input type="email" name="email" value="<?= $cliente['email'] ?>" required>

    <select name="tipo_imovel" required>
        <option><?= $cliente['tipo_imovel'] ?></option>
        <option>Casa</option>
        <option>Apartamento</option>
        <option>Terreno</option>
    </select>

    <input type="number" name="valor_max" value="<?= $cliente['valor_max'] ?>" required>

    <button>Atualizar</button>
</form>

</body>
</html>

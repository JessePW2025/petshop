<?php
include "conexao.php";

/* Consulta base */
$sql = "SELECT * FROM clientes WHERE 1=1"; //1=1 para listar tudo
//$sql = "SELECT * FROM clientes WHERE ";

/* Filtro por tipo de imóvel */
if (!empty($_GET['tipo_imovel'])) {
    $tipo = $_GET['tipo_imovel'];
    $sql .= " AND tipo_imovel = '$tipo'";
}

/* Filtro por valor máximo */
if (!empty($_GET['valor_max'])) {
    $valor = $_GET['valor_max'];
    $sql .= " AND valor_max <= '$valor'";
}

/* Executa a consulta */
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Filtro de Clientes - Imobiliária</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Filtro de Clientes</h2>

<!-- FORMULÁRIO DE FILTRO -->
<form method="GET">
    <select name="tipo_imovel">
        <option value="">Tipo de Imóvel</option>
        <option value="Casa" <?= ($_GET['tipo_imovel'] ?? '') == 'Casa' ? 'selected' : '' ?>>Casa</option>
        <option value="Apartamento" <?= ($_GET['tipo_imovel'] ?? '') == 'Apartamento' ? 'selected' : '' ?>>Apartamento</option>
        <option value="Terreno" <?= ($_GET['tipo_imovel'] ?? '') == 'Terreno' ? 'selected' : '' ?>>Terreno</option>
    </select>

    <input type="number" name="valor_max" placeholder="Valor máximo"
           value="<?= $_GET['valor_max'] ?? '' ?>">

    <button type="submit">Filtrar</button>
    <a href="index.php">Limpar</a>
</form>

<!-- TABELA DE RESULTADOS -->
<table>
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Imóvel</th>
        <th>Valor Máx.</th>
    </tr>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['nome']}</td>
                    <td>{$row['telefone']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['tipo_imovel']}</td>
                    <td>R$ {$row['valor_max']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nenhum cliente encontrado</td></tr>";
    }
    ?>
</table>

</body>
</html>

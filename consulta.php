<?php
include "conexao.php";
/*consulta padrão*/
$sqlconsulta = "SELECT * FROM cadastro WHERE 1=1";

/*filtro por tipo de servico utilizando o metodo get*/
if(!empty($_GET['tiposervico'])){
    $tipo = $_GET['tiposervico'];
    $sqlconsulta .= " AND servicodopet = '$tipo'";
}

/*Executar o SQL*/
$resultado = mysqli_query($conn, $sqlconsulta);
?>

<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop Amigo Fiel</title>
</head>
<body>
    <h2>Filtro de serviços</h2>
    <form method="get">
        <select name="tiposervico">
            <option value="banho"<?=($_GET['tiposervico']??'') == 'banho'?'selected':''?>>Banho</option>
            <option value="tosa"<?=($_GET['tiposervico']??'') == 'tosa'?'selected':''?>>Tosa</option>
            <option value="consulta"<?=($_GET['tiposervico']??'') == 'consulta'?'selected':''?>>Consulta</option>
        </select>
        <button type="submit">Consultar</button>
    </form>
    <!-- Tabela de resultados -->
     <table border="1">
        <tr>
            <td>Nome do Proprietário</td>
            <td>Telefone</td>
            <td>Email</td>
            <td>Nome do Pet</td>
            <td>Tipo do Pet</td>
        </tr>
        <?php
        if(mysqli_num_rows($resultado)>0){
            while($row = mysqli_fetch_assoc($resultado)){
                echo "<tr>
                        <td>{$row['nomeResponsavel']}</td>
                        <td>{$row['telefone']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['nomedopet']}</td>
                        <td>{$row['tipodopet']}</td>
                      </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='5'> Esse serviço não foi contratado </td>
                  </tr>";
        }
        ?>
     </table>
</body>
</html>

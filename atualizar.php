<?php
include "conexao.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$tipo = $_POST['tipo_imovel'];
$valor = $_POST['valor_max'];

$sql = "UPDATE clientes 
        SET nome='$nome',
            telefone='$telefone',
            email='$email',
            tipo_imovel='$tipo',
            valor_max='$valor'
        WHERE id=$id";

mysqli_query($conn, $sql);

echo "<script> alert('Usuário alterado com sucesso!'); window.location='index.html'; </script>";
?>

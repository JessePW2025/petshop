<?php
include "conexao.php";

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$tipo = $_POST['tipo_imovel'];
$valor = $_POST['valor_max'];

$sql = "INSERT INTO clientes (nome, telefone, email, tipo_imovel, valor_max)
        VALUES ('$nome','$telefone','$email','$tipo','$valor')";

mysqli_query($conn, $sql);

echo "<script> alert('Usuário cadastrado com sucesso!'); window.location='index.html'; </script>";
?>

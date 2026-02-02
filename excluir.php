<?php
include "conexao.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM clientes WHERE id=$id");

echo "<script> alert('Usuário excluído com sucesso!'); window.location='index.html'; </script>";
?>

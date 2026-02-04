<?php
include "conexao.php";

//armazenar os valors nas minhas variaveis
$nomeproprietario = $_POST['nomeresponsavel'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$nomepet = $_POST['nomepet'];
$tipopet = $_POST['tipopet'];
$tiposervico = $_POST['tiposervico'];
$valorservico = $_POST['valorservico'];

$sql = "INSERT INTO cadastro (nomeresponsavel, telefone, email, nomedopet, tipodopet, servicodopet, valorservico) VALUES ('$nomeproprietario','$telefone','$email','$nomepet','$tipopet','$tiposervico','$valorservico')";

mysqli_query($conn, $sql);

echo "<script> alert('usuário cadastrado com sucesso.'); window.location='index.html';</script>";
?>
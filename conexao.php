<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "petshop";

$conn = mysqli_connect($servidor,$usuario,$senha,$banco);

if(!$conn) {
    die("Erro de conexão.");
}
?>
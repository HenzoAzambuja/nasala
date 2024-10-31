<?php
include("conexao.php");
include("validacoes.php");

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];
$nome = $_POST["nome"];
$cpfAnterior = $_POST["cpfAnterior"];

if (!validarCPF($cpf)){
    die("CPF inválido!");
}

if (!validarSenha($senha)){
    die("SENHA inválida!");
}

$sql = "update usuários set CPF = '$cpf', SENHA = '$senha', NOME = '$nome' where CPF = '$cpfAnterior'";

if(!$resultado = $conn->query($sql)){
    die("erro");
}

header("Location: index2.php");
?>
<?php
include("conexao.php");

include("validacoes.php");

if (!validarCPF($cpf)){
    die("CPF inválido!");
}

if (!validarSenha($senha)){
    die("SENHA inválida!");
}

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];
$nome = $_POST["nome"];

$sql = "INSERT INTO `usuários`(`CPF`, `NOME`, `SENHA`) VALUES ('$cpf','$nome','$senha')";
$resultado = $conn->query($sql);

header("Location: principal.php");
?>
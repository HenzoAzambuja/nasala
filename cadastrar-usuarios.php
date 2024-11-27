<?php
include("conexao.php");
include("validacoes.php");

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];
$nome = $_POST["nome"];

if (!validarcpf($cpf)){
    die("cpf inválido!");
}

if (!validarsenha($senha)){
    die("senha inválida!");
}

$stmt = $conn->prepare("INSERT INTO `usuarios`(`cpf`, `nome`, `senha`) VALUES (?,?,?)");
$stmt->bind_param("sss", $cpf, $nome, $senha);

if(!$stmt->execute()){
    die("erro");
}


header("Location: principal.php");
?>
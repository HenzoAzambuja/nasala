<?php
include("conexao.php");
include("validacoes.php");

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];
$nome = $_POST["nome"];
$cpfAnterior = $_POST["cpfAnterior"];

if (!validarcpf($cpf)){
    die("cpf inválido!");
}

if (!validarsenha($senha)){
    die("senha inválida!");
}

$stmt = $conn->prepare("update usuarios set cpf = ?, senha = ?, nome = ? where cpf = ?");
$stmt->bind_param("ssss", $cpf, $senha, $nome, $cpfAnterior);
    
if(!$stmt->execute()){
    die("erro");
}

header("Location: index2.php");
?>
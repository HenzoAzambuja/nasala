<?php
include("conexao.php");

session_start();

$cpf = $_POST["cpf"];
$senha222 = $_POST["senha"];

include("validacoes.php");

if (!validarCPF($cpf)){
    die("CPF inválido!");
}


if (!validarSenha($senha222)){
    die("SENHA inválida!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    $stmt = $conn->prepare("select nome from usuários where cpf = ? and senha = ?");
    $stmt->bind_param("ss", $cpf, $senha222);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $row = $resultado->fetch_assoc();

    if ($row && !empty($row["nome"])) {
        session_regenerate_id(true);    
        $_SESSION['cpf'] = $cpf;
        $_SESSION['nome'] = $row["nome"];

        header("Location: principal.php");
        exit();
    } else {
        die("Senha incorreta");
    }

    $stmt->close();
}

$conn->close();
?>
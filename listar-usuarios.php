<?php
include("conexao.php");

$sql = "select * from usuários";

while(isset($row) && $row["nome"] !=''){
    session_start();
    $_SESSION['cpf'] = $cpf;
    $_SESSION['senha'] = $senha;
    $_SESSION['nome'] = $row["nome"];
} else {
    die("Senha incorreta");
}
?>


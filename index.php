<?php
include("valida.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Cadastrar usuário</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <span>Olá, <?=$_SESSION['nome'];?></span>
            <div>
                <span class="span">
                    <a href="sair.php" class="logout">Sair</a>
                </span>
            </div>
        </div>

        <div class="flex">
            <div class="aside">
                <h2>Menu</h2>
                <a href="index.php">
                    <button class="button">Cadastrar usuários</button>
                </a>
                <a href="index2.php">
                    <button class="button">Listar usuários</button>
                </a>
                <a href="">
                    <button class="button">Alterar Usuários</button>
                </a>
                <a href="principal.php">
                    <button class="button">Sair</button>
                </a>
            </div>

            <div class="main">
                <h2>Formulário de Cadastro</h2>
                <form method="post" action="cadastrar-usuarios.php">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" required><br>

                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required><br>

                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required><br>

                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

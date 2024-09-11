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
                        <button>Listar usuários</button>
                    </a>
                    <p>item 3</p>
                    <a href="principal.php">
                        
                    <button>Sair</button>
                    </a>
                </div>
                <div class="main">
                    <h2>Main</h2>
                    <form method="post" action="cadastrar-usuarios.php">
                    CPF: <input type="text" name="cpf" id="cpf"><br>
                    SENHA: <input type="password" name="senha" id="senha"><br>
                    NOME: <input type="text" name="nome" id="nome"><br>
                    <input type="submit" value="enviar">
                </form>
                </div>
            </div>
        </div>
</body>
</html>

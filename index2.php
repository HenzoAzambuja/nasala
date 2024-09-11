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
                    <table>
                        <thead>
                            <tr>Nome </tr>
                            <tr>CPF </tr>
                            <tr>Senha</tr>
                        </thead>
                        <?php    
                        include("conexao.php");
                        $sql = "select * from usuários";
                        $resultado = $conn->query($sql);

                        while($row = $resultado->fetch_assoc()){
                        ?>
                        <tbody>
                            <tr><?=$row['CPF'];?></tr>
                            <tr><?=$row['NOME'];?></tr>
                            <tr><?=$row['SENHA'];?></tr>
                        </tbody>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
</body>
</html>

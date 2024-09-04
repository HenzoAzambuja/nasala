<?php
include("valida.php");
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
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
                    <p>item 1</p>
                    <p>item 2</p>
                    <p>item 3</p>
                </div>
                <div class="main">
                    <h2>Main</h2>
                </div>
            </div>
        </div>
</body>
</html>
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
                <h2>Main</h2>
                <table class="tabela-usuarios">
                    <thead>
                        <tr>
                            <th>CPF</th>
                            <th>NOME</th>
                            <th>SENHA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("conexao.php");
                        $sql = "select * from usuários";
                        $resultado = $conn->query($sql);

                        while($row = $resultado->fetch_assoc()){
                        ?>
                        <tr>
                            <form method="post" action="alterarUsuario.php">
                                <input type="hidden" name="cpfAnterior" value="<?=$row['CPF'];?>">
                                <td><input type="text" name="cpf" value="<?=$row['CPF'];?>"></td>
                                <td><input type="text" name="nome" value="<?=$row['NOME'];?>"></td>
                                <td><input type="text" name="senha" value="<?=$row['SENHA'];?>"></td>
                                <td><button type="submit" class="button" value="alterar">ALTERAR</button></td>
                            </form>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

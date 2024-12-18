<?php
include("valida.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<script>

function validarcpf(cpf) {
    // Remove caracteres não numéricos
    
    cpf = String(cpf);//.replace(/\D/g, '');

    // Verifica se o cpf tem 11 dígitos
    if (cpf.length !== 11) return false;
   
    // Validação básica do cpf (dígitos repetidos)
    if (/^(\d)\1{10}$/.test(cpf)) return false;

    // Cálculo dos dígitos verificadores
    const calcularDigito = (cpf, peso) => {
        let soma = 0;
        for (let i = 0; i < peso.length; i++) {
            soma += Number(cpf[i]) * peso[i];
        }
        const resto = soma % 11;
        return resto < 2 ? '0' : String(11 - resto);
    };

    const primeiroDigito = calcularDigito(cpf.slice(0, 9), [10, 9, 8, 7, 6, 5, 4, 3, 2]);
    const segundoDigito = calcularDigito(cpf.slice(0, 10), [11, 10, 9, 8, 7, 6, 5, 4, 3, 2]);

    // Verifica se os dígitos verificadores estão corretos
    if (cpf.slice(-2) !== primeiroDigito + segundoDigito) return false;

    // Se todas as verificações passarem, retorna true
    return true;
}

function validarsenha(senha) {
    
    if (senha.length < 6) return false;

    const temLetraMinuscula = /[a-z]/.test(senha);
    const temLetraMaiuscula = /[A-Z]/.test(senha);
    const temNumero = /\d/.test(senha);
    const temCaractereEspecial = /[@$!%*?&]/.test(senha);

    if (!temLetraMinuscula) return false;
    if (!temLetraMaiuscula) return false;
    if (!temNumero) return false;
    if (!temCaractereEspecial) return false;

    return true;
}

function validaFormulario(cpf) {
  
    const cpf_form = document.getElementById("cpf"+cpf).value;
    const senha = document.getElementById("senha"+cpf).value;
    
    if (cpf_form === "" || !validarcpf(cpf_form)){
        alert("Por favor, insira um cpf válido.");
        
        return false;
    }          
   
    if (senha === "" || !validarsenha(senha)) {
        alert("Por favor, insira uma senha válida.");
    
        return false;
    }
    return true;
}

        </script>
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
                    <button class="button">Cadastrar usuarios</button>
                </a>
                <a href="index2.php">
                    <button class="button">Listar usuarios</button>
                </a>
                <a href="">
                    <button class="button">Alterar usuarios</button>
                </a>
                <a href="principal.php">
                    <button class="button">Voltar</button>
                </a>
            </div>

            <div class="main">
                <h2>Main</h2>
                <table class="tabela-usuarios">
                    <thead>
                        <tr>
                            <th>cpf</th>
                            <th>nome</th>
                            <th>senha</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("conexao.php");
                        $sql = "select * from usuarios";
                        $resultado = $conn->query($sql);

                        while($row = $resultado->fetch_assoc()){
                        ?>
                        <tr>
                            <form method="post" action="alterarUsuario.php"  onsubmit="return validaFormulario(<?=$row['cpf'];?>)">
                                <input type="hidden" name="cpfAnterior" value="<?=$row['cpf'];?>">
                                <td><input type="text" name="cpf" id="cpf<?=$row['cpf'];?>" value="<?=$row['cpf'];?>"></td>
                                <td><input type="text" name="nome" id="nome<?=$row['cpf'];?>" value="<?=$row['nome'];?>"></td>
                                <td><input type="text" name="senha" id="senha<?=$row['cpf'];?>" value="<?=$row['senha'];?>"></td>
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

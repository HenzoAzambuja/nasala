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

            function validaFormulario(event) {

                const cpf = document.getElementById("cpf").value;
                const senha = document.getElementById("senha").value;

                if (cpf === "" || !validarcpf(cpf)){
                    alert("Por favor, insira um cpf válido.");
                    event.preventDefault();
                    return false;
                }          

                if (senha === "" || !validarsenha(senha)) {
                    alert("Por favor, insira uma senha válida.");
                    event.preventDefault();
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
                <a href="index3.php">
                    <button class="button">Alterar usuarios</button>
                </a>
                <a href="principal.php">
                    <button class="button">Voltar</button>
                </a>
            </div>

            <div class="main">
                <h2>Formulário de Cadastro</h2>
                <form method="post" action="cadastrar-usuarios.php" onsubmit="return validaFormulario(event)">
                    <label for="cpf">cpf:</label>
                    <input type="text" name="cpf" id="cpf" placeholder="Digite seu cpf" required><br>

                    <label for="senha">senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required><br>

                    <label for="nome">nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required><br>

                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

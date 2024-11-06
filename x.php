<html>
    <title>Login</title>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .login-container {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 300px;
            }
            .login-container h2 {
                text-align: center;
                color: #333;
            }
            .login-container input[type="text"], .login-container input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            .login-container input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .login-container input[type="submit"]:hover {
                background-color: #45a049;
            }
        </style>
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
    </head>
    <body>
        <div class="login-container">
            <h2>Login</h2>
            <form name="loginForm" method="post" action="login.php" onsubmit="return validaFormulario(event)">
                cpf: <input type="text" name="cpf" id="cpf" placeholder="Digite seu cpf"><br>
                senha: <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>

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
    </head>
    <body>
        <div class="login-container">
            <h2>Login</h2>
            <form method="post" action="login.php">
                CPF: <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF"><br>
                SENHA: <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                <input type="submit" value="Enviar">
            </form>
        </div>
    </body>
</html>

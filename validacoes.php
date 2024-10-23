<?php   
include("conexao.php");

function validarCPF($cpf) {
    // Remove caracteres não numéricos
    $cpf = preg_replace('/\D/', '', $cpf);

    // Verifica se o CPF tem 11 dígitos
    if (strlen($cpf) !== 11) return false;

    // Validação básica do CPF (dígitos repetidos)
    if (preg_match('/^(\d)\1{10}$/', $cpf)) return false;

    // Cálculo dos dígitos verificadores
    $calcularDigito = function($cpf, $peso) {
        $soma = 0;
        for ($i = 0; $i < count($peso); $i++) {
            $soma += $cpf[$i] * $peso[$i];
        }
        $resto = $soma % 11;
        return $resto < 2 ? '0' : (11 - $resto);
    };

    $primeiroDigito = $calcularDigito(substr($cpf, 0, 9), [10, 9, 8, 7, 6, 5, 4, 3, 2]);
    $segundoDigito = $calcularDigito(substr($cpf, 0, 10), [11, 10, 9, 8, 7, 6, 5, 4, 3, 2]);

    // Verifica se os dígitos verificadores estão corretos
    if (substr($cpf, -2) !== $primeiroDigito . $segundoDigito) return false;

    return true;
}

function validarSenha($senha2) {
    if (strlen($senha2) < 6) return false;

    $temLetraMinuscula = preg_match('/[a-z]/', $senha2);
    $temLetraMaiuscula = preg_match('/[A-Z]/', $senha2);
    $temNumero = preg_match('/\d/', $senha2);
    $temCaractereEspecial = preg_match('/[@$!%*?&]/', $senha2);

    if (!$temLetraMinuscula || !$temLetraMaiuscula || !$temNumero || !$temCaractereEspecial) {
        return false;
    }

    return true;
}


?>
<?php

function validarCPF($cpf)
{
    // Remove pontos, traços e outros caracteres
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verifica se possui 11 números
    if (strlen($cpf) != 11) {
        return false;
    }

    // Impede CPFs como 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Primeiro dígito verificador
    $soma = 0;

    for ($i = 0; $i < 9; $i++) {
        $soma += $cpf[$i] * (10 - $i);
    }

    $resto = ($soma * 10) % 11;

    if ($resto == 10) {
        $resto = 0;
    }

    if ($resto != $cpf[9]) {
        return false;
    }

    // Segundo dígito verificador
    $soma = 0;

    for ($i = 0; $i < 10; $i++) {
        $soma += $cpf[$i] * (11 - $i);
    }

    $resto = ($soma * 10) % 11;

    if ($resto == 10) {
        $resto = 0;
    }

    if ($resto != $cpf[10]) {
        return false;
    }

    return true;
}

?>
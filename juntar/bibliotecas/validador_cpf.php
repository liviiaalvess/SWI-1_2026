<?php

class ValidadorCPF
{
    public function validar($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

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

        $soma = 0;

        for ($i = 0; $i < 10; $i++) {
            $soma += $cpf[$i] * (11 - $i);
        }

        $resto = ($soma * 10) % 11;

        if ($resto == 10) {
            $resto = 0;
        }

        return $resto == $cpf[10];
    }
}
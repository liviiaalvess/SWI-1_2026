<?php

class CalculadoraIMC
{
    public function calcular($peso, $altura)
    {
        $peso = floatval($peso);
        $altura = floatval($altura);

        if ($peso <= 0 || $altura <= 0) {
            throw new Exception("Digite valores válidos.");
        }

        $imc = $peso / ($altura * $altura);

        if ($imc < 18.5) {
            $classificacao = "Abaixo do peso";
        } elseif ($imc < 25) {
            $classificacao = "Peso normal";
        } elseif ($imc < 30) {
            $classificacao = "Sobrepeso";
        } elseif ($imc < 35) {
            $classificacao = "Obesidade grau I";
        } elseif ($imc < 40) {
            $classificacao = "Obesidade grau II";
        } else {
            $classificacao = "Obesidade grau III";
        }

        return [
            "imc" => $imc,
            "classificacao" => $classificacao
        ];
    }
}
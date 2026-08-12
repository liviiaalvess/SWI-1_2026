<?php

spl_autoload_register(function ($classe) {

    if ($classe == "CalculadoraIMC") {
        require_once __DIR__ . "/bibliotecas/calculadora_imc.php";
    }

    if ($classe == "ValidadorCPF") {
        require_once __DIR__ . "/bibliotecas/validador_cpf.php";
    }

});
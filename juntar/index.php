<?php

require_once "bibliotecas/calculadora_imc.php";
require_once "bibliotecas/validador_cpf.php";

$resultadoIMC = "";
$resultadoCPF = "";

// CALCULADORA DE IMC
if (isset($_POST["calcular_imc"])) {

    $peso = $_POST["peso"];
    $altura = $_POST["altura"];

    try {

        $dados = calcularIMC($peso, $altura);

        $resultadoIMC =
            "IMC: " . number_format($dados["imc"], 2, ",", ".") .
            "<br>Classificação: " . $dados["classificacao"];

    } catch (Exception $e) {

        $resultadoIMC = $e->getMessage();
    }
}


// VALIDADOR DE CPF
if (isset($_POST["validar_cpf"])) {

    $cpf = $_POST["cpf"];

    if (validarCPF($cpf)) {

        $resultadoCPF = " CPF válido!";

    } else {

        $resultadoCPF = " CPF inválido!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bibliotecas Locais</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

    <h1>Bibliotecas Locais</h1>

    <p>Calculadora de IMC e Validador de CPF</p>


    <div class="cards">

        <!-- CALCULADORA DE IMC -->

        <div class="card">

            <h2>Calculadora de IMC</h2>

            <form method="POST">

                <label>Peso (kg):</label>

                <input
                    type="number"
                    name="peso"
                    step="0.1"
                    placeholder="Ex: 70"
                    required
                >

                <label>Altura (m):</label>

                <input
                    type="number"
                    name="altura"
                    step="0.01"
                    placeholder="Ex: 1.75"
                    required
                >

                <button type="submit" name="calcular_imc">
                    Calcular IMC
                </button>

            </form>

            <?php if ($resultadoIMC != ""): ?>

                <div class="resultado">
                    <?php echo $resultadoIMC; ?>
                </div>

            <?php endif; ?>

        </div>


        <!-- VALIDADOR DE CPF -->

        <div class="card">

            <h2>Validador de CPF</h2>

            <form method="POST">

                <label>CPF:</label>

                <input
                    type="text"
                    name="cpf"
                    maxlength="14"
                    placeholder="000.000.000-00"
                    required
                >

                <button type="submit" name="validar_cpf">
                    Validar CPF
                </button>

            </form>

            <?php if ($resultadoCPF != ""): ?>

                <div class="resultado">
                    <?php echo $resultadoCPF; ?>
                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

</body>

</html>
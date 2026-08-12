<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "autoload.php";

$calculadora = new CalculadoraIMC();
$validador = new ValidadorCPF();

$resultadoIMC = "";
$resultadoCPF = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // CALCULAR IMC
    if (isset($_POST["calcular_imc"])) {

        $peso = $_POST["peso"];
        $altura = $_POST["altura"];

        try {

            $dados = $calculadora->calcular($peso, $altura);

            $resultadoIMC =
                "Seu IMC é: " .
                number_format($dados["imc"], 2, ",", ".") .
                "<br>Classificação: " .
                $dados["classificacao"];

        } catch (Exception $e) {

            $resultadoIMC = $e->getMessage();
        }
    }

    // VALIDAR CPF
    if (isset($_POST["validar_cpf"])) {

        $cpf = $_POST["cpf"];

        if ($validador->validar($cpf)) {

            $resultadoCPF = "CPF válido!";

        } else {

            $resultadoCPF = "CPF inválido!";
        }
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

    <p class="subtitulo">
        Calculadora de IMC e Validador de CPF
    </p>


    <div class="cards">


        <!-- CALCULADORA DE IMC -->

        <div class="card">

            <h2>Calculadora de IMC</h2>

            <form method="POST">

                <label for="peso">
                    Peso (kg):
                </label>

                <input
                    type="number"
                    id="peso"
                    name="peso"
                    step="0.1"
                    placeholder="Ex: 70"
                    required
                >


                <label for="altura">
                    Altura (m):
                </label>

                <input
                    type="number"
                    id="altura"
                    name="altura"
                    step="0.01"
                    placeholder="Ex: 1.75"
                    required
                >


                <button
                    type="submit"
                    name="calcular_imc"
                >
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

                <label for="cpf">
                    CPF:
                </label>

                <input
                    type="text"
                    id="cpf"
                    name="cpf"
                    maxlength="14"
                    placeholder="000.000.000-00"
                    required
                >


                <button
                    type="submit"
                    name="validar_cpf"
                >
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
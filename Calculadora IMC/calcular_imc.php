<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Buscando e salvando as variáveis do form
        $peso = filter_var($_POST['peso'], FILTER_VALIDATE_FLOAT);
        $altura = filter_var($_POST['altura'], FILTER_VALIDATE_FLOAT);

        // Validando os valores para evitar divisão por zero
        if ($peso && $altura && $altura > 0) {
            $imc = number_format($peso / ($altura ** 2), 2, ',', '.');
            
            // Definindo a resposta com base no valor do IMC
            if ($imc < 18.5) {
                $resposta = "Baixo Peso";
            } else if ($imc <= 24.9) {
                $resposta = "Peso Saudável";
            } else if ($imc <= 29.9) {
                $resposta = "Sobrepeso";
            } else if ($imc <= 34.9) {
                $resposta = "Obesidade Grau 1";
            } else if ($imc <= 39.9) {
                $resposta = "Obesidade Grau 2";
            } else {
                $resposta = "Obesidade Grau 3";
            }
        } else {
            // Caso peso ou altura não sejam válidos
            $resposta = "Valores inválidos. Por favor, insira peso e altura corretos.";
            $imc = null; // Não exibe o IMC neste caso
        }

        // Inclui o index.php, passando as variáveis $imc e $resposta
        include 'index.php';
    }

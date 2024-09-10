<?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tamanho = intval($_POST['tamanho']);

        // Verifica se os campos seguintes foram marcados ou não (True/False)
        $maiusculas = isset($_POST['maiusculas']);
        $minusculas = isset($_POST['minusculas']);
        $numeros = isset($_POST['numeros']);
        $simbolos = isset($_POST['simbolos']);

        // Define o conjunto de caracteres
        $letrasMaiusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $letrasMinusculas = 'abcdefghijklmnopqrstuvwxyz';
        $digitos = '0123456789';
        $caracteresEspeciais = '!@#$%¨&*()_-+=<>?';

        // Montando a Lista de caracteres
        $caracteresDisponiveis = '';
        if ($maiusculas) $caracteresDisponiveis .= $letrasMaiusculas;
        if ($minusculas) $caracteresDisponiveis .= $letrasMinusculas;
        if ($numeros) $caracteresDisponiveis .= $digitos;
        if ($simbolos) $caracteresDisponiveis .= $caracteresEspeciais;

        // Gerando senha
        $senha = '';
        if ($caracteresDisponiveis !== '') {
            for ($i = 0; $i < $tamanho; $i++) {
                $senha .= $caracteresDisponiveis[mt_rand(0, strlen($caracteresDisponiveis) - 1)];
            } 
        } else {
            echo "<p>Selecione pelo menos uma opção!</p>";
            exit;
        }

        echo "<h3>Senha gerada: $senha</h3>";
    }
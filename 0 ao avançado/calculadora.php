<?php 
    // Funções PHP para as operações
    function soma($a, $b) {
        return $a + $b;
    }

    function subtracao($a, $b) {
        return $a - $b;
    }

    function divisao($a, $b) {
        if ($b == 0) {
            return "Erro: divisão por zero!";
        }
        return $a / $b;
    }

    function multiplicacao($a, $b) {
        return $a * $b;
    }
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora em PHP</title>
    <link rel="stylesheet" href="calc.css">

    <script>
        let operacao = ''; // Variável para armazenar a operação
        let num1 = ''; // Primeiro número
        let num2 = ''; // Segundo número

        // Função para atualizar o display
        function atualizarDisplay(valor) {
            const display = document.getElementById('display');
            display.value += valor;
        }

        // Função para limpar o display
        function limparDisplay() {
            document.getElementById('display').value = '';
            num1 = '';
            num2 = '';
            operacao = '';
        }

        // Função para capturar a operação e números
        function capturarOperacao(op) {
            const display = document.getElementById('display');
            if (num1 === '') {
                num1 = display.value;
            }
            operacao = op;
            display.value = ''; // Limpa o display para o segundo número
        }

        // Função para calcular o resultado
        function calcular() {
            num2 = document.getElementById('display').value;
            if (num1 && num2 && operacao) {
                document.getElementById('calculadoraForm').submit(); // Submete o formulário
            }
        }

        // Captura de eventos de teclado
        document.addEventListener('keydown', function(event) {
            const key = event.key;
            if (!isNaN(key)) {
                // Se for um número, atualiza o display
                atualizarDisplay(key);
            } else if (key === '+' || key === '-' || key === '*' || key === '/') {
                // Captura as operações
                capturarOperacao(key);
            } else if (key === 'Enter') {
                // Calcula quando "Enter" é pressionado
                calcular();
            } else if (key === 'Escape' || key === 'Backspace') {
                // Limpa o display com ESC ou Backspace
                limparDisplay();
            }
        });
    </script>
</head>
<body>

    <form id="calculadoraForm" action="<?=$_SERVER['PHP_SELF']?>" method="get">
        <div class="calculadora">
            <input type="text" id="display" name="display" disabled>
            <button type="button" onclick="limparDisplay()" class="clear">C</button>
            <button type="button" onclick="capturarOperacao('/')" class="operacao">/</button>
            <button type="button" onclick="capturarOperacao('*')" class="operacao">*</button>
            
            <button type="button" onclick="atualizarDisplay('7')">7</button>
            <button type="button" onclick="atualizarDisplay('8')">8</button>
            <button type="button" onclick="atualizarDisplay('9')">9</button>
            <button type="button" onclick="capturarOperacao('-')" class="operacao">-</button>
            
            <button type="button" onclick="atualizarDisplay('4')">4</button>
            <button type="button" onclick="atualizarDisplay('5')">5</button>
            <button type="button" onclick="atualizarDisplay('6')">6</button>
            <button type="button" onclick="capturarOperacao('+')" class="operacao">+</button>
            
            <button type="button" onclick="atualizarDisplay('1')">1</button>
            <button type="button" onclick="atualizarDisplay('2')">2</button>
            <button type="button" onclick="atualizarDisplay('3')">3</button>
            <button type="button" onclick="calcular()" class="igual">=</button>
            
            <button type="button" onclick="atualizarDisplay('0')" style="grid-column: span 2;">0</button>
            <button type="button" onclick="atualizarDisplay('.')">.</button>
        </div>

        <!-- Inputs escondidos para enviar os valores ao PHP -->
        <input type="hidden" name="num1" id="num1Hidden">
        <input type="hidden" name="operacao" id="operacaoHidden">
        <input type="hidden" name="num2" id="num2Hidden">
    </form>

    <div>
        <p id="resultado">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['num1'], $_GET['operacao'], $_GET['num2'])) {
                $num1 = floatval($_GET['num1']);
                $num2 = floatval($_GET['num2']);
                $operacao = $_GET['operacao'];

                // Processar o cálculo com base na operação
                $resultado = match ($operacao) {
                    "+" => soma($num1, $num2),
                    "-" => subtracao($num1, $num2),
                    "*" => multiplicacao($num1, $num2),
                    "/" => divisao($num1, $num2),
                    default => "Operação inválida",
                };

                echo "Resultado: " . $resultado;
            }
            ?>
        </p>
    </div>

    <script>
        // Submete o formulário com os valores armazenados
        document.getElementById('calculadoraForm').addEventListener('submit', function() {
            document.getElementById('num1Hidden').value = num1;
            document.getElementById('num2Hidden').value = document.getElementById('display').value;
            document.getElementById('operacaoHidden').value = operacao;
        });
    </script>

</body>
</html>

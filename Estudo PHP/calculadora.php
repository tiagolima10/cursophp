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

        function calcular() {
            const display = document.getElementById('display').value;

            if (display !== '' && num1 !== '' && operacao !== '') {
                num2 = display;  // Pega o número atual no display como num2

                // Faz o cálculo via JavaScript em vez de submeter o formulário
                let resultado;
                switch (operacao) {
                    case '+':
                        resultado = parseFloat(num1) + parseFloat(num2);
                        break;
                    case '-':
                        resultado = parseFloat(num1) - parseFloat(num2);
                        break;
                    case '*':
                        resultado = parseFloat(num1) * parseFloat(num2);
                        break;
                    case '/':
                        if (num2 == 0) {
                            resultado = "Erro";
                        } else {
                            resultado = parseFloat(num1) / parseFloat(num2);
                        }
                        break;
                    default:
                        resultado = "Erro";
                }

                // Atualiza o display com o resultado
                document.getElementById('display').value = resultado;

                // Reseta as variáveis para a próxima operação
                num1 = resultado;
                num2 = '';
                operacao = '';
            } else {
                alert("Operação incompleta!");
            }
        }

        // Função para capturar a operação e números
        function capturarOperacao(op) {
            const display = document.getElementById('display').value;
            if (display !== '') {
                num1 = display;  // Armazena o número atual do display como num1
                operacao = op;    // Armazena a operação
                document.getElementById('display').value = '';  // Limpa o display para o segundo número
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

    <form id="calculadoraForm" action="javascript:void(0);">
        <div class="calculadora">
            <input type="text" id="display" name="display" disabled>
            <button type="button" onclick="limparDisplay()" class="clear">C</button>
            <button type="button" onclick="capturarOperacao('/')" class="operacao" id="div">/</button>
            <button type="button" onclick="capturarOperacao('*')" class="operacao" id="mul">*</button>
            
            <button type="button" onclick="atualizarDisplay('7')" id="seven">7</button>
            <button type="button" onclick="atualizarDisplay('8')" id="eight">8</button>
            <button type="button" onclick="atualizarDisplay('9')" id="nine">9</button>
            <button type="button" onclick="capturarOperacao('-')" class="operacao" id="sub">-</button>
            
            <button type="button" onclick="atualizarDisplay('4')" id="four">4</button>
            <button type="button" onclick="atualizarDisplay('5')" id="five">5</button>
            <button type="button" onclick="atualizarDisplay('6')" id="six">6</button>
            <button type="button" onclick="capturarOperacao('+')" class="operacao" id="add">+</button>
            
            <button type="button" onclick="atualizarDisplay('1')" id="one">1</button>
            <button type="button" onclick="atualizarDisplay('2')" id="two">2</button>
            <button type="button" onclick="atualizarDisplay('3')" id="three">3</button>
            <button type="button" onclick="calcular()" class="igual" id="equal">=</button>
            
            <button type="button" onclick="atualizarDisplay('0')" id="zero" style="grid-column: span 2;">0</button>
            <button type="button" onclick="atualizarDisplay('.')" id="dot">.</button>
        </div>
    </form>


    <div>
        <p id="resultado">
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['num1'], $_GET['operacao'], $_GET['num2'])) {
                $num1 = floatval($_GET['num1']);
                $num2 = floatval($_GET['num2']);
                $operacao = $_GET['operacao'];

                // Operações disponíveis
                $resultado = match ($operacao) {
                    "+" => soma($num1, $num2),
                    "-" => subtracao($num1, $num2),
                    "*" => multiplicacao($num1, $num2),
                    "/" => divisao($num1, $num2),
                    default => "Operação inválida",
                };
            }
        ?>
        </p>
    </div>

    <script>
        // Submit Form
        document.getElementById('calculadoraForm').addEventListener('submit', function(event) {
            if (!num1 || !operacao || !num2) {
                event.preventDefault();  // Impede o envio
                alert("Operação incompleta!");
                return;
            }
            document.getElementById('num1Hidden').value = num1;
            document.getElementById('num2Hidden').value = num2;
            document.getElementById('operacaoHidden').value = operacao;
        });
    </script>

</body>
</html>

<?php 
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="calculadora.css">
    <script>
        // Função para limpar os campos do formulário
        function limparCampos(event) {
            event.preventDefault(); // Evita o envio do formulário

            // Obtém os campos do formulário e define seus valores como vazios
            document.getElementById('num1').value = '';
            document.getElementById('operacao').value = '';
            document.getElementById('num2').value = '';

            document.getElementById('resultado').innerHTML = '0';
        }
    </script>
</head>
<body>
    <main>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <input type="number" name="num1" id="num1" placeholder="Número 1" step="any" required>
            <input type="text" name="operacao" id="operacao" placeholder="+, -, *, /" required>
            <input type="number" name="num2" id="num2" placeholder="Número 2" step="any" required>
            <input type="submit" name="calcular" value="Calcular">
            <input type="submit" name="limpar" value="Limpar" onclick="limparCampos(event)">
        </form>
    </main>
    <div>
        <p id="resultado">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                // Verifica se o botão de "Calcular" foi pressionado
                if (isset($_GET['calcular'])) {
                    // Convertendo os valores para números flutuantes
                    $num1 = floatval($_GET['num1']);
                    $num2 = floatval($_GET['num2']);
                    $operacao = $_GET['operacao'];

                    // Utilizando match para validar e calcular
                    $resultado = match ($operacao) {
                        "+" => soma($num1, $num2),
                        "-" => subtracao($num1, $num2),
                        "*" => multiplicacao($num1, $num2),
                        "/" => ($num2 == 0 ? "Erro: divisão por zero!" : divisao($num1, $num2)),
                        default => "Operação inválida! Use +, -, * ou /",
                    };

                    echo "Resultado: " . $resultado;
                }
            }
            ?>

            
            <?php
            // switch ($_GET['operacao']):
            //     case "+":
            //         $resultado = soma($_GET['num1'], $_GET['num2']);
            //         echo "Resultado: $resultado";
            //         break;
            //     case "-":
            //         $resultado = subtracao($_GET['num1'], $_GET['num2']);
            //         echo "Resultado: $resultado";
            //         break;
            //     case "/":
            //         $resultado = divisao($_GET['num1'], $_GET['num2']);
            //         echo "Resultado: $resultado";
            //         break;
            //     case "*":
            //         $resultado = multiplicacao($_GET['num1'], $_GET['num2']);
            //         echo "Resultado: $resultado";
            //         break;
            //     default:
            //         echo "Operação Indisponível";
            //         break;

            // if ($_GET["operacao"] == "+") {
            //     $resultado = soma($_GET['num1'], $_GET['num2']);
            //     echo "Resultado: $resultado";
            // } else if ($_GET[""] == "") 
            ?>
        </p>
    </div>
</body>
</html>
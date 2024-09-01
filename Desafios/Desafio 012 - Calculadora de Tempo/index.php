<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raízes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
        $total = $_GET['total'] ?? 0;
        $sobra = $total;

        // Total de Semanas
        $semanas = (int)($total / 604800);
        $sobra = $sobra % 604800;
        // Total de Dias
        $dias = (int)($sobra / 86400);
        $sobra = $sobra % 86400;
        // Total de Horas
        $horas = (int)($sobra / 3600);
        $sobra = $sobra % 3600;
        // Total de Minutos
        $minutos = (int)($sobra / 60);
        $sobra = $sobra % 60;
        // Total de Segundos
        $segundos = $sobra;
    ?>

    <main>
        <h1>Calculadora do tempo</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="total">Digite o valor em segundos:</label>
            <input type="number" name="total" id="total" value="<?=$total?>" min="0">
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Resultado do Reajuste</h2>
        <?php
            print"<p>Analisando o valor que você digitou, " . number_format($total, "0", ",", ".") . " segundos equivalem a:</p>";
            echo "<ul> 
                <li>$semanas semanas</li>
                <li>$dias dias</li>
                <li>$horas horas</li>
                <li>$minutos minutos</li>
                <li>$segundos segundos</li>
            </ul>";
        ?>
    </section>

    <script>
        function mostrarValor(valor) {
            document.getElementById('valorPercentual').textContent = valor + '%';
        }
    </script>
</body>
</html>
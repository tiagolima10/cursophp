<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $salario = $_GET['salario'] ?? 0;
        $salario_min = 1412;

        $inteiro = intdiv($salario,$salario_min);
        $resto_salario = $salario - $salario_min * $inteiro;

        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    ?>

    <main>
        <h1>Informe seu Salário:</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="salario">Salario (R$)</label>
            <input type="number" name="salario" id="salario" value="<?=$salario?>">
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Resultado Final</h2>
        <?php 
            echo "<p>Quem recebe um salário de " . numfmt_format_currency($padrao, $salario, "BRL") . " ganha <strong>$inteiro salários mínimos</strong> + " . numfmt_format_currency($padrao, $resto_salario, "BRL") . " </p>";
        ?>
    </section>
</body>
</html>
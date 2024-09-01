<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônico</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        img.nota {
            height: 60px;
            margin: 3px;
        }
    </style>
</head>
<body>
    <?php 
        $saque = $_GET['saque'] ?? 0;
        $sobra = $saque;

        // Notas de 100
        $not_100 = floor($saque / 100);
        $sobra %= 100;
        // Notas de 50
        $not_50 = floor($sobra / 50);
        $sobra %= 50;
        // Notas de 10
        $not_10 = floor($sobra / 10);
        $sobra %=10;
        // Notas de 5
        $not_5 = floor($sobra / 5);
        $sobra %= 5;
    ?>

    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="saque">Digite o valor a ser sacado:</label>
            <input type="number" name="saque" id="saque" value="<?=$saque?>" min="0" step="5">
            <input type="submit" value="Sacar">
        </form>
    </main>

    <section>
        <h2>Saque de Notas</h2>
        <p>Seu saque de <?= number_format($saque, "2", ",", ".")?> reais equivalem a:</p>
        <ul> 
            <li><img src="imagens/100-reais.jpg" alt="Nota de 100 reais" class="nota"> <?=$not_100?> x 100</li>
            <li><img src="imagens/50-reais.jpg" alt="Nota de 50 reais" class="nota"> <?=$not_50?> x 50</li>
            <li><img src="imagens/10-reais.jpg" alt="Nota de 10 reais" class="nota"> <?=$not_10?> x 10</li>
            <li><img src="imagens/5-reais.jpg" alt="Nota de 5 reais" class="nota"> <?=$not_5?> x 5</li>
        </ul>
    </section>

</body>
</html>
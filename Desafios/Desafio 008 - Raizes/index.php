<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raízes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $numero = $_GET['numero'] ?? 0;

        $quadrada = $numero ** (1/2);
        $cubica = $numero ** (1/3);
    ?>

    <main>
        <h1>Informe um número:</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="numero">Número:</label>
            <input type="number" name="numero" id="numero" value="<?=$numero?>">
            <input type="submit" value="Calcular Raízes">
        </form>
    </main>

    <section>
        <h2>Resultado Final</h2>
        <?php 
            echo "<p>Analisando o <strong>número $numero</strong> temos:</p>";
            echo "<ul>
                <li> Quadrada: " . number_format($quadrada, 2, ",", '.') . "</li>
                <li> Cubica: " . number_format($cubica, 2, ",", '.') . " </li>
            <ul>";
        ?>
    </section>
</body>
</html>
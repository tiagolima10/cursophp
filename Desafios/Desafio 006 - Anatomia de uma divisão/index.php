<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anatomia da Divisão</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $dividendo = $_GET['dividendo'] ?? 1;
        $divisor = $_GET['divisor'] ?? 1;

        $resto = $dividendo % $divisor;
        $resultado = intdiv($dividendo,$divisor);  
    ?>

    <main>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="dividendo">Dividendo</label>
            <input type="number" name="dividendo" id="dividendo" value="<?=$dividendo?>">
            <label for="divisor">Divisor</label>
            <input type="number" name="divisor" id="divisor" value="<?=$divisor?>">
            <input type="submit" value="Analisar">
        </form>
    </main>

    <section>
        <h2>Estrutura da divisão:</h2>
        <?php 
            echo "<p>Dividendo: $dividendo</p>";
            echo "<p>Divisor: $divisor</p>";
            echo "<p>Resto: $resto</p>";
            echo "<p>Resultado: $resultado</p>";
        ?>
    </section>
</body>
</html>
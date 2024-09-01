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
        $nota1 = $_GET['nota1'] ?? 1;
        $nota2 = $_GET['nota2'] ?? 1;
        $peso1 = $_GET['peso1'] ?? 1;
        $peso2 = $_GET['peso2'] ?? 1;

        $soma_pesos = $peso1 + $peso2;
        $media_simples = ($nota1 + $nota2) / 2 ;
        $media_ponderada = (($nota1 * $peso1) + ($nota2 * $peso2)) / $soma_pesos;
    ?>

    <main>
        <h1>Informe um número:</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="nota1">Nota 1:</label>
            <input type="number" name="nota1" id="nota1" value="<?=$nota1?>" step="0.01" min="0" max="10">
            <label for="peso1">Peso 1:</label>
            <input type="number" name="peso1" id="peso1" value="<?=$peso1?>" step="0" min="0" max="5">
            <label for="nota2">Nota 2:</label>
            <input type="number" name="nota2" id="nota2" value="<?=$nota2?>" step="0.01" min="0" max="10">
            <label for="peso2">Peso 2:</label>
            <input type="number" name="peso2" id="peso2" value="<?=$peso2?>" step="0" min="0" max="5">
            <input type="submit" value="Calcular Médias">
        </form>
    </main>

    <section>
        <h2>Cálculo das Médias</h2>
        <?php 
            echo "<p><ul>
                <li> Média Simples: " . number_format($media_simples, 2, ",", '.') . "</li>
                <li> Média Ponderada: " . number_format($media_ponderada, 2, ",", '.') . " </li>
            <ul>";
        ?>
    </section>
</body>
</html>
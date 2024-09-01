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
        $nascimento = $_GET['nascimento'] ?? 0;
        $ano = $_GET['ano'] ?? 0;
        $idade_buscada = $ano - $nascimento;
    ?>

    <main>
        <h1>Calculadora de Idades:</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="nascimento">Em que ano nasceu?</label>
            <input type="number" name="nascimento" id="nascimento" value="<?=$nascimento?>" min="1900" max="<?php date('Y') ?>">
            <label for="ano">Quer saber sua idade em que ano?</label>
            <input type="number" name="ano" id="ano" value="<?=$ano?>" min="1900">
            <input type="submit" value="Qual será minha idade?">
        </form>
    </main>

    <section>
        <h2>Resultado</h2>
        <?php 
            echo "<p>Quem nasceu em <strong>$nascimento</strong> terá <strong>$idade_buscada anos</strong> em $ano!</p>";
        ?>
    </section>
</body>
</html>
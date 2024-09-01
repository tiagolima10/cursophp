<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Resultado final</h1>
    </header>
    <main>
        <?php 
            // var_dump($_REQUEST); // Junção de $_GET $_POST $_COOKIES
            $numero = $_GET["numero"] ?? 0;
            $antecessor = $numero - 1;
            $sucessor = $numero + 1;

            echo "<p>O número escolhido foi <strong>$numero</strong>.</p>";
            echo "<p>O seu <i>antecessor</i> é <strong>$antecessor</strong>.</p>";
            echo "<p>O seu <i>sucessor</i> é <strong>$sucessor</strong>.</p>";

        ?>
        <p style="text-align: center;"><a href="index.html"> &#x2B05; Voltar</a></p>
    </main>
</body>
</html>
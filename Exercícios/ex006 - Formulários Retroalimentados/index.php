<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        // Capturando os dados do Formulário Retroalimentado
        $valor1 = $_GET['v1'] ?? 0;
        $valor2 = $_GET['v2'] ?? 0;

        function somar( $valor_1, $valor_2 ) {
            return $valor_1 + $valor_2;
        }
    ?>
    <main>
        <h1>Soma entre 2 números:</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="v1">Valor 1</label>
            <input type="number" name="v1" id="v1" value="<?=$valor1?>">
            <!-- O value permite que o valor ao atualizar seja o mesmo do enviado no form -->
            <label for="v2">Valor 2</label>
            <input type="number" name="v2" id="v2" value="<?=$valor2?>">
            <input type="submit" value="Somar">
        </form>
    </main>

    <section>
        <h2>Resultado da soma:</h2>
        <?php 
            $soma = somar( $valor1, $valor2 );
            echo "<p>$soma</p>"
        ?>
    </section>
</body>
</html>
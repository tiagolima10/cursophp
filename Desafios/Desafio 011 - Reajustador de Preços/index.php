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
        $preco = $_GET['preco'] ?? 0;
        $percent = $_GET['percent'] ?? 0;

        $preco_ajustado = $preco * (1 + $percent/100);
        
        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    ?>

    <main>
        <h1>Reajustador de Preços:</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="nascimento">Preço do Produto:</label>
            <input type="number" name="preco" id="preco" value="<?=$preco?>" min="0" step="0.01">
            <label for="ano">Qual o percentual de reajuste?</label>
            <input type="range" id="percent" name="percent" min="0" max="100" value="50" oninput="mostrarValor(this.value)">
            <span id="valorPercentual">50%</span>
            <input type="submit" value="Reajustar">
        </form>
    </main>

    <section>
        <h2>Resultado do Reajuste</h2>
        <?php 
            echo "<p>O produto que custava " . numfmt_format_currency($padrao, $preco, "BRL") . ", com <strong>$percent% de aumento</strong> vai passar a custar " . numfmt_format_currency($padrao, $preco_ajustado, "BRL") . ", a partir de agora.</p>";
        ?>
    </section>

    <script>
        function mostrarValor(valor) {
            document.getElementById('valorPercentual').textContent = valor + '%';
        }
    </script>
</body>
</html>
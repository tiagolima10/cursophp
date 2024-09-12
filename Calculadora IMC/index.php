<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Calculadora de IMC</h1>

    <form action="calcular_imc.php" method="POST" onsubmit="return validarFormulario()">
        <label for="peso">Informe seu peso:</label>
        <input type="number" name="peso" id="peso" step="0.01" min="0" max="500" value="<?= isset($_POST['peso']) ? $_POST['peso'] : 0 ?>">

        <label for="altura">Informe sua altura:</label>
        <input type="number" name="altura" id="altura" step="0.01" min="0" max="3" value="<?= isset($_POST['altura']) ? $_POST['altura'] : 0 ?>">

        <button type="submit">Calcular</button>
    </form>


    <?php
        function removeAcentos($string) {
            return preg_replace(
                array("/(á|à|ã|â|ä)/", "/(é|è|ê|ë)/", "/(í|ì|î|ï)/", "/(ó|ò|õ|ô|ö)/", "/(ú|ù|û|ü)/", "/(ç)/"),
                array("a", "e", "i", "o", "u", "c"),
                $string
            );
        }
    ?>

    <?php if (isset($imc) && isset($resposta)): ?>
        <div class="result">
            <h2>Seu IMC é: <?= $imc ?></h2>
            <p class="<?= strtolower(removeAcentos(str_replace(' ', '', $resposta))) ?>"><?= $resposta ?></p>
        </div>
    <?php endif; ?>

    <script>
        // Função Validar Formulário
        function validarFormulario() {
            const peso = document.getElementById('peso');
            const altura = document.getElementById('altura');
            let valido = true;

            // Peso válido
            if (peso.value <= 0 || peso.value > 500) {
                peso.style.borderColor = "red";
                valido = false;
            } else {
                peso.style.borderColor = "";
            }

            // Altura válida
            if (altura.value <= 0 || altura.value > 3) {
                altura.style.borderColor = "red";
                valido = false;
            } else {
                altura.style.borderColor = "";
            }

            return valido;
        }
    </script>

</body>
</html>
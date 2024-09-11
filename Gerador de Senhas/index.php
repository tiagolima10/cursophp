<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senhas</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h1>Gerador de Senhas</h1>

        <form action="gerar_senha.php" method="POST">
            <label for="tamanho">Tamanho da Senha:</label>
            <input type="number" name="tamanho" id="tamanho" min="6" max="20" value="<?= isset($_POST['tamanho']) ? $_POST['tamanho'] : 8 ?>" required>

            <div class="checkboxes">
            <label>
            <input type="checkbox" name="maiusculas" <?= isset($_POST['maiusculas']) ? 'checked' : '' ?>> Incluir Letras Maiúsculas
            </label>

            <label>
                <input type="checkbox" name="minusculas" <?= isset($_POST['minusculas']) ? 'checked' : '' ?>> Incluir Letras Minúsculas
            </label>

            <label>
                <input type="checkbox" name="numeros" <?= isset($_POST['numeros']) ? 'checked' : '' ?>> Incluir Números
            </label>

            <label>
                <input type="checkbox" name="simbolos" <?= isset($_POST['simbolos']) ? 'checked' : '' ?>> Incluir Símbolos
            </label>

            </div>

            <button type="submit" class="btn">Gerar Senha</button>
        </form>

        <?php if (isset($senha)): ?>
        <div class="result">
            <h2>Senha Gerada:</h2>
            <p><?= $senha ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const senha = "<?= isset($senha) ? $senha : '' ?>";
        if (senha) {
            const força = validarForcaSenha(senha);
            exibirForcaSenha(força);
        }

        function validarForcaSenha(senha) {
            let força = 0;
            if (senha.length >= 8) força++;
            if (/[a-z]/.test(senha)) força++;
            if (/[A-Z]/.test(senha)) força++;
            if (/[0-9]/.test(senha)) força++;
            if (/[\W]/.test(senha)) força++; // Verifica por símbolos
            return força;
        }

        function exibirForcaSenha(forca) {
            const resultDiv = document.querySelector('.result');
            const strengthText = document.createElement('p');
            switch (forca) {
                case 5:
                    strengthText.textContent = 'Força: Muito Forte';
                    strengthText.style.color = 'green';
                    break;
                case 4:
                    strengthText.textContent = 'Força: Forte';
                    strengthText.style.color = 'limegreen';
                    break;
                case 3:
                    strengthText.textContent = 'Força: Média';
                    strengthText.style.color = 'orange';
                    break;
                case 2:
                    strengthText.textContent = 'Força: Fraca';
                    strengthText.style.color = 'red';
                    break;
                default:
                    strengthText.textContent = 'Força: Muito Fraca';
                    strengthText.style.color = 'darkred';
            }
            resultDiv.appendChild(strengthText);
        }
    });
</script>

</html>

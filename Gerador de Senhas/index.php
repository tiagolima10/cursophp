<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senhas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gerador de Senhas</h1>

    <form action="gerar_senha.php" method="POST">
        <label for="tamanho">Tamanho da Senha:</label>
        <input type="number" name="tamanho" id="tamanho" min="6" max="20" value="8" required>

        <div>
            <input type="checkbox" name="maiusculas" id="maiusculas">
            <label for="maiusculas">Incluir letras maiúsculas</label>
        </div>

        <div>
            <input type="checkbox" name="minusculas" id="minusculas">
            <label for="minusculas">Incluir letras minúsculas</label>
        </div>

        <div>
            <input type="checkbox" name="numeros" id="numeros">
            <label for="numeros">Incluir números</label>
        </div>

        <div>
            <input type="checkbox" name="simbolos" id="simbolos">
            <label for="simbolos">Incluir Símbolos</label>
        </div>

        <button type="submit">Gerar Senha</button>
    </form>
</body>
</html>
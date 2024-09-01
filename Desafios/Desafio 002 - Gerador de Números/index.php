<?php 
    function gerarAleatorio() {
        return mt_rand(0, 100);
    }
    // Função aleatório mt_rand()

    // Se quiser números gerados com criptografia e segurança:
    // random_int()

    $aleatorio = 0;

    // Verifica se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['gerar'])) {
        $aleatorio = gerarAleatorio();
    }
    // Esse $_GET gerar tem que estar no input submit
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números aleatórios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Trabalhando com números aleatórios</h1>
    </header>
    <section>
        <form method="get">
            <label for="numero">Gerando um número aleatório entre 0 e 100:</label>
            <label for="aleatorio">O valor gerado foi 
                <?php 
                    if ($aleatorio !== null) {
                        echo $aleatorio;
                    } else {
                        echo "Nenhum número gerado ainda";
                    }
                ?> 
            </label>
            <input type="submit" name="gerar" value="Gerar outro">
            <!-- Comando com JS para recarregar a página
                 onclick="javascript:document.location.reload()"
            -->
        </form>
    </section>

</body>
</html>

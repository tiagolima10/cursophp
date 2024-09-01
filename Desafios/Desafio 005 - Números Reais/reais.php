<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Conversor de moedas v1.0:</h1>
    </header>
    <main>
        <?php 
            // var_dump($_REQUEST); // Junção de $_GET $_POST $_COOKIES
            $real = $_POST["reais"] ?? 0;
            $inteiro = floor($real);
            $fracionario = $real - $inteiro;
            $fracionario_format = number_format($fracionario,3, ",",".");


            echo "<p> Analisando o número <strong>" . number_format($real,3, ",",".") . "</strong> informado pelo usuário:</p>";
            echo "
                <ul>
                    <li>A parte inteira do número é <strong>" . number_format($inteiro,0, ",",".") . "</strong></li>
                    <li>A parte fracionária do número é <strong>$fracionario_format</strong></li>
                </ul>";

        ?>
        <p style="text-align: center;"><a href="javascript:history.go(-1)"> &#x2B05; Voltar</a></p>
    </main>
</body>
</html>
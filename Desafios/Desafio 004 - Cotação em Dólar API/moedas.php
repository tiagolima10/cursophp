<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Conversor de moedas v2.0:</h1>
    </header>
    <main>
        <?php
            // Cotação vinda da API do Banco Central
            $data_7_dias = date("m-d-Y", strtotime("-7 days"));
            $data_hoje = date("m-d-Y");

            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''. $data_7_dias .'\'&@dataFinalCotacao=\''. $data_hoje . '\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

            $dados = json_decode(file_get_contents($url), true);

            //var_dump($dados);

            $cotacao = $dados["value"][0]["cotacaoCompra"];

            $real = $_GET["real"] ?? 0;
            $cotacao = 5.61;
            $dolar = $real / $cotacao;
            // $dolar_formatado = number_format($dolar,2, ",",".");
            // number format pede o número de casas decimais e o que colocar na casa do milhar
            // e depois o que colocar na casa decimal

            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

            echo "<p> Seus " . numfmt_format_currency($padrao, $real, "BRL") ." equivalem a <strong> " . numfmt_format_currency($padrao, $dolar, "USD") . "</strong></p>";

            echo "<p><strong>* Cotação atual de R$ $cotacao.</strong> informada diretamente no site do Banco Central do Brasil.</p>";

        ?>
        <p style="text-align: center;"><button onclick="javascript:history.go(-1)"> &#x2B05; Voltar</button></p>
    </main>
</body>
</html>
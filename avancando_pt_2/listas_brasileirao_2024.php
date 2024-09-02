<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Teste com Listas:</h1>
    <main>
        <?php
            // $filmes = ['Avengers: Endgame', 'Captain Marvel', 'Homem-Formiga e a Vespa'];


            // $filmes[] = 'Avengers 5';
            // //echo $filmes[1];

            // for ($i = 0; $i <= 3; $i++) {
            //     echo "<p> $filmes[$i] </p>";
            // }

            $teams = [
                [
                    'posicao' => 1, 
                    'nome' => 'Botafogo',
                    'pontos' => 50,
                    'partidas'=> 25
                ], 
                [
                    'posicao' => 2,
                    'nome' => 'Fortaleza',
                    'pontos' => 48,
                    'partidas'=> 24
                ]
                , 'Palmeiras', 'Flamengo', 'Cruzeiro', 'São Paulo', 'Bahia', 'Vasco', 'Atlético-MG', 'Internacional', 'Bragantino', 'Athletico-PR', 'Criciúma', 'Juventude', 'Grêmio', 'Fluminense', 'Corinthians', 'Vitória', 'Cuiabá', 'Atlético-GO'
            ];
        ?>
        <section>
            <h2>Tabela do Brasileirão <?= date('Y')?></h2>
                <?php
                    $teamslist = '';
                    foreach ($teams as $team) {
                        echo "<p> {$team['posicao']}º {$team['nome']} {$team['pontos']} </p>";
                        echo "<hr>";
                    }
                ?>
        </section>
    </main>
</body>
</html>



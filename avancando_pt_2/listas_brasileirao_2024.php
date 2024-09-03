<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas PHP</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <main>
        <?php
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
                ],
                [
                    'posicao' => 3,
                    'nome' => 'Palmeiras',
                    'pontos' => 47,
                    'partidas'=> 25
                ],
                [
                    'posicao' => 4,
                    'nome' => 'Flamengo',
                    'pontos' => 44,
                    'partidas'=> 24
                ],
                [
                    'posicao' => 5,
                    'nome' => 'Cruzeiro',
                    'pontos' => 41,
                    'partidas'=> 25
                ],
                [
                    'posicao' => 6,
                    'nome' => 'São Paulo',
                    'pontos' => 41,
                    'partidas'=> 25
                ],
                [
                    'posicao' => 7,
                    'nome' => 'Bahia',
                    'pontos' => 39,
                    'partidas'=> 25
                ],
                [
                    'posicao' => 8,
                    'nome' => 'Vasco',
                    'pontos' => 34,
                    'partidas'=> 24
                ],
                [
                    'posicao' => 9,
                    'nome' => 'Atlético-MG',
                    'pontos' => 33,
                    'partidas'=> 23
                ],
                [
                    'posicao' => 10,
                    'nome' => 'Internacional',
                    'pontos' => 32,
                    'partidas'=> 22
                ],
                [
                    'posicao' => 11,
                    'nome' => 'Bragantino',
                    'pontos' => 30,
                    'partidas'=> 24
                ],
                [
                    'posicao' => 12,
                    'nome' => 'Athletico-PR',
                    'pontos' => 29,
                    'partidas'=> 23
                ],
                [
                    'posicao' => 13,
                    'nome' => 'Criciúma',
                    'pontos' => 28,
                    'partidas'=> 24
                ],
                [
                    'posicao' => 14,
                    'nome' => 'Juventude',
                    'pontos' => 28,
                    'partidas'=> 24
                ],
                [
                    'posicao' => 15,
                    'nome' => 'Grêmio',
                    'pontos' => 27,
                    'partidas'=> 23
                ],
                [
                    'posicao' => 16,
                    'nome' => 'Fluminense',
                    'pontos' => 27,
                    'partidas'=> 24
                ],
                [
                    'posicao' => 17,
                    'nome' => 'Corinthians',
                    'pontos' => 25,
                    'partidas'=> 25
                ],
                [
                    'posicao' => 18,
                    'nome' => 'Vitória',
                    'pontos' => 22,
                    'partidas'=> 25
                ],
                [
                    'posicao' => 19,
                    'nome' => 'Cuiabá',
                    'pontos' => 21,
                    'partidas'=> 23
                ],
                [
                    'posicao' => 20,
                    'nome' => 'Atlético-GO',
                    'pontos' => 18,
                    'partidas'=> 25
                ]
            ];
        ?>
            <h2>Tabela do Brasileirão <?= date('Y')?></h2>
            <table>
        <tr>
            <th>Posição</th>
            <th>Clube</th>
            <th>Pontos</th>
            <th>Jogos</th>
        </tr>
        <?php
            foreach ($teams as $team) {
                echo "<tr>";
                echo "<td>{$team['posicao']}º</td>";
                echo "<td>{$team['nome']}</td>";
                echo "<td>{$team['pontos']}</td>";
                echo "<td>{$team['partidas']}</td>";
                echo "</tr>";
            }
        ?>
    </table>
        <!-- <section>
            <p>Col. | Clube | Pontos | Jogos</p>
                <?php
                    // $teamslist = '';
                    // foreach ($teams as $team) {
                    //     echo "<p> {$team['posicao']}º {$team['nome']} {$team['pontos']} {$team['partidas']}</p>";
                    //     echo "<hr>";
                    // }
                ?>
        </section> -->
    </main>
</body>
</html>



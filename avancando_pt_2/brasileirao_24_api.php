<?php
    // URL da API para os standings do Brasileirão Série A 2024
    $apiUrl = 'https://api.football-data.org/v4/competitions/2013/standings?season=2024';
    
    // Sua chave de API
    $apiKey = 'cc0c0d93397244dfa8c46b46f28a8f73';
    
    // Configuração do contexto para a requisição HTTP
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => [
                'X-Auth-Token: ' . $apiKey,
                'Content-Type: application/json'
            ]
        ]
    ]);
    
    // Fazendo a requisição à API
    $response = file_get_contents($apiUrl, false, $context);
    
    // Decodificando a resposta JSON para um array PHP
    $data = json_decode($response, true);
    
    // Verificação para evitar erro se a API retornar nulo ou erro
    if ($data && isset($data['standings'][0]['table'])) {
        $teams = $data['standings'][0]['table'];
    } else {
        $teams = [];
    }

    // var_dump($data);
?>
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
        <h2>Tabela do Brasileirão <?= date('Y') ?></h2>
        <table>
            <tr>
                <th>Posição</th>
                <th>Clube</th>
                <th>Pontos</th>
                <th>Jogos</th>
                <th>Vitórias</th>
                <th>Empates</th>
                <th>Derrotas</th>
                <th>GP</th>
                <th>GC</th>
                <th>SG</th>
            </tr>
            <?php
                // Verifica se há times na tabela antes de renderizar
                if (!empty($teams)) {
                    foreach ($teams as $team) {
                        echo "<tr>";
                        echo "<td>{$team['position']}º</td>";
                        echo "<td><img src='{$team['team']['crest']}' alt='{$team['team']['shortName']}' style='height: 28px;'> {$team['team']['shortName']}</td>";
                        echo "<td>{$team['points']}</td>";
                        echo "<td>{$team['playedGames']}</td>";
                        echo "<td>{$team['won']}</td>";
                        echo "<td>{$team['draw']}</td>";
                        echo "<td>{$team['lost']}</td>";
                        echo "<td>{$team['goalsFor']}</td>";
                        echo "<td>{$team['goalsAgainst']}</td>";
                        echo "<td>{$team['goalDifference']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhuma informação disponível.</td></tr>";
                }
            ?>
        </table>
    </main>
</body>
</html>
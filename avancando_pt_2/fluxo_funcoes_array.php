<?php 
    function vitoria(&$time) {
        $time['pontos'] += 3;
        return $time;
    }

    function empate(&$time){
        $time['pontos'] += 1;
        return $time;
    }

    function derrota(&$time) {
        $time['pontos'] += 0;
        return $time;
    }

    $times = [
                ['nome' => 'São paulo', 'pontos' => 0, 'gols' => 1], 
                ['nome' => 'Botafogo', 'pontos' => 0, 'gols'=> 1],
            ];

    $agregado_mandante = 1;
    $agregado_visitante = 1;    

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $gols_mandante = filter_input(INPUT_POST, 'mandante', FILTER_VALIDATE_INT);
        $gols_visitante = filter_input(INPUT_POST, 'visitante', FILTER_VALIDATE_INT);

        if ($gols_mandante > $gols_visitante) {
            $times[0] = vitoria($times[0]);
            $times[1] = derrota($times[1]);
        } else if ($gols_visitante > $gols_mandante) {
            $times[0] = derrota($times[0]);
            $times[1] = vitoria($times[1]);
        } else {
            $times[0] = empate($times[0]);
            $times[1] = empate($times[1]);
        }

        $agregado_mandante = $times[0]['gols'] + (int)$_POST['mandante'];
        $agregado_visitante = $times[1]['gols'] + (int)$_POST['visitante'];
    }
    // print_r($times);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudo PHP 8</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <h1>Quartas Libertadores 2024 (Jogo de Volta)</h1>
    <h2 class="agregado">Placar agregado ( <?=$agregado_mandante;?> x <?=$agregado_visitante?> )</h2>
    <main>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="mandante">São Paulo</label>
            <input type="number" name="mandante" id="mandante" min="0" max="10" value="<?= isset($_POST['mandante']) ? htmlspecialchars($_POST['mandante']) : '' ?>">
            <label for="visitante">Botafogo</label>
            <input type="number" name="visitante" id="visitante" min="0" max="10" value="<?= isset($_POST['visitante']) ? htmlspecialchars($_POST['visitante']) : '' ?>">
            <input type="submit" value="Salvar">
        </form>
    </main>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <section class="liberta">
            <h2 class="final">Placar final: São Paulo <?= $agregado_mandante ?> x <?= $agregado_visitante ?> Botafogo</h2>
            <?php 
                if ($agregado_mandante > $agregado_visitante) {
                    echo "<p class=\"saopaulo\">São Paulo Classificado!!!</p>";
                    echo "<img src=\"img/spfc.png\" alt=\"São Paulo FC\">";
                } else if ($agregado_visitante > $agregado_mandante) {
                    echo "<p class = \"botafogo\">Botafogo Classificado!</p>";
                } else {
                    echo "<p class=\"penaltis\">PÊNALTISSSSSSSSSSSSSSSSSSSSSSSS! HAJA CORAÇÃO! </p>";
                }
            ?>
            
        </section>
    <?php endif; ?>
</body>
</html>
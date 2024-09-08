<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fluxo</title>
</head>
<?php 
    $x = 5;
    $y = 3;

    if ($x > $y) {
        echo "<p>$x é maior que $y</p>";
    } else if ($x < $y) {
        echo "<p>$y maior que $x </p>";
    } else {
        echo "<p>$x é igual a $y</p>";
    }
?>
<?php 
    for ($i = 0; $i < 3; $i++) {
        echo "<p>$i<p>";
    }

    $frutas = ['Maçã', 'Pera', 'Uva', 'Banana', 'Salada Mista'];
    foreach ($frutas as $fruta) {
        echo "<p>$fruta<p>";
    }
?>
</body>
</html>


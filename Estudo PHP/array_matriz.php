<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    $frutas = ['maçã', 'pera', 'uva'];
    $frutas[] = 'melão'; // adiciona um novo elemento ao final do array
    echo $frutas[1] . "<br>";
    echo $frutas[2] . "<br>";
    echo $frutas[3] . "<br>";

    $pessoa = ['nome' => 'João', 'idade' => 25, 'cidade' => 'São Paulo'];
    echo $pessoa['nome'] . "<br>";

    $matriz = [
        ['a', 'b', 'c'],
        ['d', 'e', 'f'],
        ['g', 'h', 'i']
    ];

    for ($x=0; $x<3; $x++) {
        for ($y=0; $y<3; $y++) {
            echo $matriz[$x][$y] . " ";
        }
        print "<br>";
    }
?>
</body>
</html>

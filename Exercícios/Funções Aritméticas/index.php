<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções Aritméticas</title>
</head>
<body>
    <?php 
        $r = abs(-200); // Valor absoluto 
        echo $r;

        $b = base_convert(254, 10, 8); // Conversão da base decimal para octal 
        echo $b;

        $a = ceil(10.8); // Arredonda pra cima 
        echo $a;

        $d = floor(15.6); // Arredondamento pra baixo
        echo $d;

        $e = round(15); // Arredondamento aritmético
        echo $e; 

        $f = hypot(15, 13); // Mostra a hipotenusa
        echo $f;
        
        $g = intdiv(5, 2); // Divisão por inteiros
        echo $g;

        $h = min(5, 2); // Valor min
        echo $h;

        $i = max(5, 2); // Valor max
        echo $i;

        $j = pow(5, 2); // Criando uma potência
        echo $j;

        $k = sqrt(64); // Raiz quadrada
        echo $k;

        // sin() cos() tan()
    ?>
</body>
</html>
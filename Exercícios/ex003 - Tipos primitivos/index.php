<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos Primitivos em PHP</title>
</head>
<body>
    <h1>Testes de tipos primitivos</h1>
    <?php 
        // 0x = Hexadecimal 0b = binário 0 = Octal
        // $num = 0x1A;
        // echo"O valor da variável é $num";

        // $v = "Sxo";
        // var_dump($v);
    
        // $casado = false;
        // print("O valor para casado é $casado");

        // Tipos compostos: Array - Object
        // Tipos Especiais: null - resource - callabe - mixed

        // $array = [6, 5, 3, 3];
        // foreach ($array as $key => $value) {
        //     echo " Posição: " . $key . " Valor: " . $value . "<br>";
        // }

        // $array = [1, 2, 3, 1];
        // for ($i = 0; $i < count($array); $i++) {
        //     echo $array[ $i ] ." ";
        // }

        class Pessoa {
            private string $nome;
        }
        $p = new Pessoa;
        var_dump($p);

    ?>
</body>
</html>
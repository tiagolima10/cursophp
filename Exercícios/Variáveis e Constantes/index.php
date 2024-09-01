<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variáveis e Constantes</title>
</head>
<body>
    <?php 
        $nome = "Tiago";
        $sobrenome = "Lima";
        $idade = 24;
        $peso = 74.0;
        $casado = false; 
        const PAIS = "Brasil";

        $nomeCompletoCliente = "Camel Case";
        $nome_completo_cliente = "Snake Case";
        // PAIS = "Uruguai";

        $nome = "Tico";

        echo"Muito Prazer $nome $sobrenome, você mora no " . PAIS;

        // Regras para nomes de Identificadores
        // 1- Variáveis sempre começam com o $
        // 2- Segundo símbolo pode ser Letra ou _ underline
        // 3- Aceita caracteres [a-z], [A-Z], [0-9], [-]
        // 4- Aceita caracteres da tabela ASCII a partir de 128
        // 5- Aceita caracteres acentuados
        // 6- Linguagem é case sensitive em relação aos nomes
        // 7- Nomes especiais não podem ser usados ($this)        


        // Recomendações para nomes de Identificadores
        // 1- Tente dar nomes claros e fáceis
        // 2- Evite nomes curtos ou longos
        // 3- Defina um padrão e siga em todo o projeto
        // 4- Pra variáveis, dê preferência a letras minúsculas
        // 5- Pra constantes, dê preferência a letras maiúsculas
        // 6- Use camelCase para métodos e atributos
        // 7- Use SNAKE_CASE para nomear constantes

    ?>
</body>
</html>
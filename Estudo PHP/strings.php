<?php 
    $nome = 'João';
    echo strlen($nome); // imprime 4 (tamanho da string)
    echo strtoupper($nome); // imprime "JOÃO" (converte para maiúsculas)
    echo substr($nome, 0, 2); // imprime "Jo" (extrai uma substring)
    echo trim($nome); //remove espaços em branco do início e do fim da string
    echo str_replace($nome, "o", "O"); //substitui uma substring por outra
    // echo explode($nome, 1); //divide uma string em um array de substrings
    // implode($nome); //junta um array de substrings em uma string
?>
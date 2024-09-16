<?php 

// $array_associativo = [
//     'nome' => 'PHP',
//     'versao' => 8.1
// ];

// var_dump($array_associativo);
// var_dump($array_associativo['nome']);
// var_dump($array_associativo['versao']);

$array = [
    0 => [
        "nome"=> "PHP",
        "versao"=> "8.1"
    ],
    1 => [
        "nome"=> "Python",
        "versao"=> "3.2"
    ]
];

// var_dump($array);

foreach ($array as $curso => $valor) {
    echo $valor['nome'] . ' ';
    echo $valor['versao'] . PHP_EOL;
}
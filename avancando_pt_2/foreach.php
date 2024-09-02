<?php

$contasCorrentes = [
    '123' => [
        'titular' => 'Tiago',
        'saldo' => 1000
    ], 
    '456' => [
        'titular' => 'Maria',
        'saldo' => 5000.10
    ], 
    '789' => [
        'titular' => 'Ju',
        'saldo' => 9999.12
    ]
];

$contasCorrentes['159'] = [
    'titular' => 'Talia',
    'saldo' => '1598'
];

foreach ($contasCorrentes as $cpf => $conta) {
    echo $cpf . " " . $conta['titular'] . PHP_EOL;
}

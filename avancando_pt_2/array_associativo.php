<?php

$conta1 = [
    'titular' => 'Tiago',
    'saldo' => 1000
];
$conta2 = [
    'titular' => 'Maria',
    'saldo' => 5000.10
];
$conta3 = [
    'titular' => 'Ju',
    'saldo' => 9999.12
];

echo $conta1['titular'] . PHP_EOL;
$contasCorrentes = [$conta1, $conta2, $conta3];

for ($i=0; $i < count($contasCorrentes); $i++){
    echo $contasCorrentes[$i]['titular'] . PHP_EOL;
}
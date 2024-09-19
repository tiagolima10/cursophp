<?php

require_once 'funcoes_geral.php';

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

$contasCorrentes['123'] = sacar($contasCorrentes['123'], 500);
$contasCorrentes['456'] = sacar($contasCorrentes['456'], 1500);
$contasCorrentes['789'] = depositar($contasCorrentes['789'], 1500);

letrasMaiusculas($contasCorrentes['123']);

//apagar item da lista
unset($contasCorrentes['456']);

/*
echo "<ul>";
foreach ($contasCorrentes as $cpf => $conta) {
    exibeConta($conta);
}
echo "</ul>";
*/
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP e HTML</title>
</head>
<body>
    <h1>Contas Correntes</h1>

    <?php foreach($contasCorrentes as $cpf => $conta) : ?>
    <dl>
        <dt>
            <?= $conta['titular']; ?> - <?= $cpf; ?>
        </dt>
        <dd>
            Saldo: <?= $conta['saldo']; ?>
        </dd>
    </dl>
    <?php endforeach; ?>
</body>
</html>
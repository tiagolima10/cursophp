<?php

require_once './src/Conta.php';
require_once './src/Titular.php';
require_once './src/Cpf.php';


$tiago = new Titular(new CPF('123.456.789-10'), 'Tiago Lima da Anunciação');
$primeiraConta = new Conta($tiago);
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);

echo $primeiraConta->recuperarNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperarCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperarSaldo() . PHP_EOL;

$mauricia = new Titular(new CPF('987.654.321-01'), 'Mauricia Loba');
$segundaConta = new Conta($mauricia);
var_dump($segundaConta);

$ex = new Titular(new CPF('123.456.987-11'), 'Abcdefg');
$outra = new Conta($ex);
unset($segundaConta);
echo Conta::recuperarNumeroDeContas();
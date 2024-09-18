<?php 

function carregarArquivos($nomedaClasse)
{
    require_once($nomedaClasse . '.php');
}

spl_autoload_register('carregarArquivos');

$maria = new Diarista;
$pag = new Pagamento;

var_dump($maria, $pag);
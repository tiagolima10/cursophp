<?php 

require_once('vendor/autoload.php');

use App\Controlador\Diarista;
use App\Modelo\Diarista as DiaristaModelo;
use App\Modelo\Cliente;
use App\Modelo\Diaria;

$d1 = new Diarista;

$diarista = new DiaristaModelo;
$diarista->nome = 'Joana';

$cliente = new Cliente;
$cliente->nomeCompleto = 'Maria';

$diaria = new Diaria('18/09/2024', 8, $diarista, $cliente);

var_dump($diaria);
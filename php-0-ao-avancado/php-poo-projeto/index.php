<?php 

require_once('vendor/autoload.php');

use App\Controlador\Diarista;
use App\Modelo\Diarista as DiaristaModelo;

$d1 = new Diarista;
$mod1 = new DiaristaModelo;

var_dump($d1, $mod1);
<?php 

require_once("Diarista.php");
require_once("src/Diarista.php");

use Raiz\Diarista;
use Src\Level1\Level2\Diarista as DiaristaSrc;

$maria = new Diarista;

$joao = new DiaristaSRC;

var_dump($maria);
var_dump($joao);
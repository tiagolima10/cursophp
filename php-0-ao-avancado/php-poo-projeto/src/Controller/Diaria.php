<?php 

namespace App\Controller;

use App\Model\Diaria as ModelDiaria;

class Diaria
{
    public function listar()
    {
        // Chama o método obterDiarias() sem ter que criar um objeto. (Com static function)
        // Primeiro chama a Classe :: Método
        $diarias = ModelDiaria::obterDiarias();

        require_once(__DIR__ ."/../../view/listar_diarias.php");
    }
}
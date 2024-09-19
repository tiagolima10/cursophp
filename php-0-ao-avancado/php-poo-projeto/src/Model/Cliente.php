<?php 

namespace App\Model;

class Cliente
{
    public $nomeCompleto;

    public function __construct($nomeCompleto)
    {
        $this->nomeCompleto = $nomeCompleto;
    }
}
<?php 

namespace App\Model;

class Diarista
{
    public $nome; 

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }
}
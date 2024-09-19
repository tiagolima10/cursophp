<?php 

declare(strict_types= 1);

namespace App\Model;

class Cliente
{
    // Enxuga o tamanho das Classes (SOMENTE NO PHP 8)
    public function __construct(
        public string $nomeCompleto
    ){}
}
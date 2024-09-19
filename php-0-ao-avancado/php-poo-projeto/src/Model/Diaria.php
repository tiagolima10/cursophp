<?php 

declare(strict_types= 1);

namespace App\Model;

class Diaria
{
    // Enxuga o tamanho das Classes (SOMENTE NO PHP 8)
    public function __construct(
        public string $data, 
        public int $tempo, 
        public Diarista $diarista, 
        public Cliente $cliente
    ){}

    /**
     * Retorna a lista das Diárias
     * 
     * @return void
     */
    static public function obterDiarias()
    {
        return [
            // new self é o mesmo que utilizar new Diaria, neste caso
            new self (
                '18/09/2024',
                8,
                new Diarista('João'),
                new Cliente('Lucão')
            ),
            new self (
                '17/08/2024',
                10,
                new Diarista('Joana'),
                new Cliente('Lucia')
            ),
            new self (
                '18/09/2023',
                6,
                new Diarista('John'),
                new Cliente('Luke')
            )
        ];
    }
}
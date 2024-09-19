<?php 

namespace App\Model;

class Diaria
{
    public $data;

    public $tempo;

    public Diarista $diarista;

    public Cliente $cliente;

    public function __construct($data, $tempo, Diarista $diarista, Cliente $cliente)
    {
        $this->data = $data;
        $this->tempo = $tempo;
        $this->diarista = $diarista;
        $this->cliente = $cliente;
    }

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
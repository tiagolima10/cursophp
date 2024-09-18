<?php 

namespace App\Modelo;

class Diaria
{
    private $data;

    private $tempo;

    private Diarista $diarista;

    private Cliente $cliente;

    public function __construct($data, $tempo, Diarista $diarista, Cliente $cliente)
    {
        $this->data = $data;
        $this->tempo = $tempo;
        $this->diarista = $diarista;
        $this->cliente = $cliente;
    }
}
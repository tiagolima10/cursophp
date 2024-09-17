<?php 

class Atendimento
{
    public $data; // PUBLIC pode acessar em quakquer local
    private $tempo; // PRIVATE: Só posso acessar na mesma classe
    protected $valor; // PROTECTED: Só posso acessar na mesma classe ou filhas

    public function definirTempo($tempo)
    {
        if ($tempo < 1) {
            echo "Não pode adicionar um tempo menor que 1";
            return;
        }

        $this->tempo = $tempo;
    }
}

class Diaria extends Atendimento
{
    public function definirValor($valor)
    {
        $this->valor = $valor;
    }
}

$d1 = new Diaria();
$d1->definirValor(100.00);
$d1->data = '01/05/2000';
echo $d1->data;

var_dump($d1);
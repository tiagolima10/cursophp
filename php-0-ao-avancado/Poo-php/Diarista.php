<?php 

class Diarista 
{
    public $nome;
    public $telefone;
    public $endereco;

    /**
     * Atende ao cliente
     * 
     * @param string $nomeCliente
     * @return void
     */
    public function atenderCliente($nomeCliente) {
        echo "A diarista $this->nome atendeu ao cliente $nomeCliente" . PHP_EOL;
    }

    /**
     * Avalia o Cliente
     * @param string $nomeCliente
     * @param int $nota
     * @return void
     */
    public function avaliarCliente($nomeCliente, $nota) {
        $this->atenderCliente($nomeCliente);
        echo "Avaliou o cliente com a nota $nota";
    }
}

$maria = new Diarista();
$maria->nome = "Maria da Silva";
$maria->telefone = "(75)0000-0000";
$maria->endereco = "Rua da xinxa";
// $maria->atenderCliente("Jonas");
$maria->avaliarCliente("Tiago", 10);
echo PHP_EOL;

var_dump($maria);
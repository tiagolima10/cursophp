<?php

class Conta
{
    private Titular $titular;
    private float $saldo;
    private static $numeroDeContas = 0;
    //Atributo estático, da própria classe

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        Conta::$numeroDeContas++;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }

    public function sacar(float $valorASacar): void
    {
        if ($valorASacar > $this->saldo){
            echo "Saldo Indisponível";
            return;
        }
        //Regrinha para não usar else
        $this->saldo -= $valorASacar;
    }

    public function depositar(float $valorADepositar): void
    {
        if ($valorADepositar <= 0){
            echo "Impossível realizar depósito";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    public function transferir(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo Indisponível";
            return;
        }

        $this->sacar($valorATransferir);
        $contaDestino -> depositar($valorATransferir);
    }

    public function recuperarSaldo(): float
    {
        //get saldo
        return $this->saldo;
    }
    
    public function recuperarNomeTitular(): string
    {
        return $this->titular->recuperarNome();
    }

    public function recuperarCpfTitular(): string
    {
        return $this->titular->recuperarCpf();
    }

    public static function recuperarNumeroDeContas():int
    {
        return self::$numeroDeContas;
    }

}

/*
$Conta1 = new Conta;
$Conta1 -> nomeTitular = 'Mano Lima';
$Conta1 -> cpfTitular = '987.654.321-01';
$Conta1 -> saldo = 1000;
*/

/*
$umaConta = new Conta;
$umaConta -> saldo = 300;
$umaConta -> sacar(30);
var_dump ($umaConta);
*/
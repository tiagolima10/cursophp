<?php

class Titular 
{
    private CPF $cpf;
    private string $nome;

    public function __construct(CPF $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->validarNomeTitular($nome);
        $this->nome = $nome;
    }
    
    public function recuperarCpf(): string
    {
        //get CPF do titular
        return $this->cpf->recuperarNumero();
    }

    public function recuperarNome(): string
    {
        //get nome do Titular
        return $this->nome;
    }

    private function validarNomeTitular(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 5) {
            echo "Nome precisa de pelo menos 5 caracteres.";
            exit();
        }
    }
}
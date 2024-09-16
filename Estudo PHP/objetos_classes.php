<?php
  class Humano {
    public $nome;
    public $idade;
    public $cpf;

    function __construct($nome, $idade, $cpf) {
      $this->nome = $nome;
      $this->idade = $idade;
      $this->cpf = $cpf;
    }

    function apresentacao() {
      echo "Olá, eu sou $this->nome e tenho $this->idade anos. Meu cpf é: $this->cpf ";
    }
  }

  $joao = new Humano('João', 25, 12345678910);
  $joao->apresentacao(); // imprime "Olá, eu sou João e tenho 25 anos."
?>
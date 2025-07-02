<?php

namespace App;

class Desenvolvedor extends Funcionario
{
    private string $linguagemPrincipal;

    public function __construct(string $nome, float $salario, float $linguagemPrincipal) {
        $this ->nome = $nome;
        $this ->salario = $salario;
        $this ->$linguagemPrincipal = $linguagemPrincipal;
    }

    public function getLinguagemPrincipal(): string
    {
        return $this->linguagemPrincipal;
    }
}

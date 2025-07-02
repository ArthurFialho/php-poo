<?php

namespace App;

class Desenvolvedor extends Funcionario
{
    private string $linguagemPrincipal;

    public function __construct(string $nome, float $salario, string $linguagemPrincipal)
    {
        parent::__construct($nome, $salario);
        $this->linguagemPrincipal = $linguagemPrincipal;
    }

    public function getLinguagemPrincipal(): string
    {
        return $this->linguagemPrincipal;
    }
}

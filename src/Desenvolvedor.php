<?php

namespace App;

use InvalidArgumentException;

class Desenvolvedor extends Funcionario
{
    private string $linguagemPrincipal;

    public function __construct(string $nome, float $salario, string $linguagemPrincipal)
    {
        parent::__construct($nome, $salario);

        if (trim($linguagemPrincipal) === '') {
            throw new InvalidArgumentException("A linguagem principal não pode estar vazia.");
        }

        $this->linguagemPrincipal = $linguagemPrincipal;
    }

    public function getLinguagemPrincipal(): string
    {
        return $this->linguagemPrincipal;
    }

    public function setLinguagemPrincipal(string $linguagemPrincipal): void
    {
        if (trim($linguagemPrincipal) === '') {
            throw new InvalidArgumentException("A linguagem principal não pode estar vazia.");
        }

        $this->linguagemPrincipal = $linguagemPrincipal;
    }

    public function __toString(): string
    {
        return "Desenvolvedor: {$this->getNome()}, Salário: {$this->getSalario()}, Linguagem: {$this->linguagemPrincipal}";
    }
}

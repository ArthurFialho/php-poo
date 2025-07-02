<?php

namespace App;

class Funcionario
{
    protected string $nome;
    protected float $salario;

    public function __construct(string $nome, float $salario) {
        $this ->nome = $nome;
        $this ->salario = $salario;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSalario(): float
    {
        return $this->salario;
    }

    public function  calcularSalarioAnual() : float {
        return $this->getSalario() * 12;
    }
}

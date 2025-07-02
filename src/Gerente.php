<?php

namespace App;

class Gerente extends Funcionario
{
    private float $bonusAnual;

    public function __construct(string $nome, float $salario, float $bonusAnual)
    {
        parent::__construct($nome, $salario);
        $this->bonusAnual = $bonusAnual;
    }

    public function getBonusAnual(): float
    {
        return $this->bonusAnual;
    }

    public function calcularSalarioAnual(): float
    {
        return parent::calcularSalarioAnual() + $this->bonusAnual;
    }
}

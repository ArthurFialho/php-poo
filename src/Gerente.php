<?php

namespace App;

class Gerente extends Funcionario
{
    private float $bonusAnual;

    public function __construct(string $nome, float $salario, float $bonusAnual) {
        $this ->nome = $nome;
        $this ->salario = $salario;
        $this ->bonusAnual = $bonusAnual;
    }

    /**
     * @return float
     */
    public function getBonusAnual(): float
    {
        return $this->bonusAnual;
    }

    public function calcularSalarioAnual() : float {

        return $this->getSalario() * 12 + $this->getBonusAnual();
    }
}
<?php
use PHPUnit\Framework\TestCase;
use App\Funcionario;
use App\Gerente;
use App\Desenvolvedor;


class FuncionarioTest extends TestCase
{
    private static $testReport = [];

    protected function addTestResult($name, $result, $message = '')
    {
        self::$testReport[] = [
            'test' => $name,
            'result' => $result,
            'message' => $message
        ];
    }

    public static function tearDownAfterClass(): void
    {
        file_put_contents(
            __DIR__ . '/funcionario_test_report.json',
            json_encode(self::$testReport, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );
    }

    public function testCriaInstanciaFuncionario()
    {
        try {
            $funcionario = new Funcionario('João Silva', 3000);
            $this->assertInstanceOf(Funcionario::class, $funcionario);
            $this->assertEquals('João Silva', $funcionario->getNome());
            $this->assertEquals(3000, $funcionario->getSalario());
            $this->addTestResult(__FUNCTION__, 'pass');
        } catch (\Throwable $e) {
            $this->addTestResult(__FUNCTION__, 'fail', $e->getMessage());
            throw $e;
        }
    }

    public function testCalculoSalarioAnualFuncionario()
    {
        try {
            $funcionario = new Funcionario('João Silva', 3000);
            $this->assertEquals(36000, $funcionario->calcularSalarioAnual());
            $this->addTestResult(__FUNCTION__, 'pass');
        } catch (\Throwable $e) {
            $this->addTestResult(__FUNCTION__, 'fail', $e->getMessage());
            throw $e;
        }
    }

    public function testCriaInstanciaGerenteComHeranca()
    {
        try {
            $gerente = new Gerente('Ana Costa', 8000, 5000);
            $this->assertInstanceOf(Funcionario::class, $gerente);
            $this->assertInstanceOf(Gerente::class, $gerente);
            $this->assertEquals('Ana Costa', $gerente->getNome());
            $this->assertEquals(8000, $gerente->getSalario());
            $this->assertEquals(5000, $gerente->getBonusAnual());
            $this->addTestResult(__FUNCTION__, 'pass');
        } catch (\Throwable $e) {
            $this->addTestResult(__FUNCTION__, 'fail', $e->getMessage());
            throw $e;
        }
    }

    public function testPolimorfismoSalarioAnualGerente()
    {
        try {
            $gerente = new Gerente('Ana Costa', 8000, 5000);
            $this->assertEquals(101000, $gerente->calcularSalarioAnual());
            $this->addTestResult(__FUNCTION__, 'pass');
        } catch (\Throwable $e) {
            $this->addTestResult(__FUNCTION__, 'fail', $e->getMessage());
            throw $e;
        }
    }

    public function testCriaInstanciaDesenvolvedorComHeranca()
    {
        try {
            $dev = new Desenvolvedor('Carlos Pereira', 4500, 'PHP');
            $this->assertInstanceOf(Funcionario::class, $dev);
            $this->assertInstanceOf(Desenvolvedor::class, $dev);
            $this->assertEquals('Carlos Pereira', $dev->getNome());
            $this->assertEquals('PHP', $dev->getLinguagemPrincipal());
            $this->addTestResult(__FUNCTION__, 'pass');
        } catch (\Throwable $e) {
            $this->addTestResult(__FUNCTION__, 'fail', $e->getMessage());
            throw $e;
        }
    }

    public function testSalarioAnualDesenvolvedorUsaMetodoPai()
    {
        try {
            $dev = new Desenvolvedor('Carlos Pereira', 4500, 'PHP');
            $this->assertEquals(54000, $dev->calcularSalarioAnual());
            $this->addTestResult(__FUNCTION__, 'pass');
        } catch (\Throwable $e) {
            $this->addTestResult(__FUNCTION__, 'fail', $e->getMessage());
            throw $e;
        }
    }

    public function testEncapsulamentoDosAtributos()
    {
        try {
            $this->assertFalse((new ReflectionClass(Funcionario::class))->getProperty('nome')->isPublic());
            $this->assertFalse((new ReflectionClass(Funcionario::class))->getProperty('salario')->isPublic());
            $this->assertTrue((new ReflectionClass(Gerente::class))->getProperty('bonusAnual')->isPrivate());
            $this->assertTrue((new ReflectionClass(Desenvolvedor::class))->getProperty('linguagemPrincipal')->isPrivate());
            $this->addTestResult(__FUNCTION__, 'pass');
        } catch (\Throwable $e) {
            $this->addTestResult(__FUNCTION__, 'fail', $e->getMessage());
            throw $e;
        }
    }

    // EXTRAS

    public function testFuncionarioNomeNaoVazio()
    {
        try {
            $funcionario = new Funcionario('Maria', 2000);
            $this->assertNotEmpty($funcionario->getNome());
            $this->addTestResult(__FUNCTION__, 'pass');
        } catch (\Throwable $e) {
            $this->addTestResult(__FUNCTION__, 'fail', $e->getMessage());
            throw $e;
        }
    }

    public function testFuncionarioSalarioPositivo()
    {
        try {
            $funcionario = new Funcionario('Pedro', 2500);
            $this->assertGreaterThan(0, $funcionario->getSalario());
            $this->addTestResult(__FUNCTION__, 'pass');
        } catch (\Throwable $e) {
            $this->addTestResult(__FUNCTION__, 'fail', $e->getMessage());
            throw $e;
        }
    }

    public function testGerenteBonusAnualPositivo()
    {
        try {
            $gerente = new Gerente('Julia', 9000, 10000);
            $this->assertGreaterThanOrEqual(0, $gerente->getBonusAnual());
            $this->addTestResult(__FUNCTION__, 'pass');
        } catch (\Throwable $e) {
            $this->addTestResult(__FUNCTION__, 'fail', $e->getMessage());
            throw $e;
        }
    }

    public function testDesenvolvedorLinguagemPrincipalNaoVazia()
    {
        try {
            $dev = new Desenvolvedor('Lucas', 5000, 'JavaScript');
            $this->assertNotEmpty($dev->getLinguagemPrincipal());
            $this->addTestResult(__FUNCTION__, 'pass');
        } catch (\Throwable $e) {
            $this->addTestResult(__FUNCTION__, 'fail', $e->getMessage());
            throw $e;
        }
    }
}
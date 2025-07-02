# Avaliação Prática: Sistema de Gerenciamento de Funcionários

## Sumário
- [O Desafio 🎯](#o-desafio-)
- [Requisitos Técnicos 💻](#requisitos-técnicos-)
  - [1. Classe Funcionario (Classe Base)](#1-classe-funcionario-classe-base)
  - [2. Classe Gerente (Herança)](#2-classe-gerente-herança)
  - [3. Classe Desenvolvedor (Herança)](#3-classe-desenvolvedor-herança)
- [Como Testar seu Código (Automação com PHPUnit) 🤖](#como-testar-seu-código-automação-com-phpunit-)
  - [Passo 1: Configurar o Ambiente](#passo-1-configurar-o-ambiente)
  - [Passo 2: Criar o Arquivo de Teste](#passo-2-criar-o-arquivo-de-teste)
  - [Passo 3: Configurar o PHPUnit](#passo-3-configurar-o-phpunit)
  - [Passo 4: Rodar os Testes!](#passo-4-rodar-os-testes)
- [Critérios de Avaliação 📝](#critérios-de-avaliação-)
- [Instalação do Composer e PHP no Windows](#instalação-do-composer-e-php-no-windows)

## O Desafio 🎯
Você foi contratado para desenvolver um pequeno sistema de RH para gerenciar os funcionários de uma empresa de tecnologia. A empresa possui diferentes tipos de funcionários (Gerentes e Desenvolvedores), cada um com suas particularidades.

Seu trabalho é modelar e implementar a estrutura de classes necessária para representar esses funcionários, aplicando os conceitos de POO.

---

> **Importante:** Ao finalizar, compacte (zip) toda a pasta do projeto e envie o arquivo `.zip` na atividade do Classroom.

---

## Requisitos Técnicos 💻

Você deverá criar três classes em arquivos separados: `Funcionario.php`, `Gerente.php` e `Desenvolvedor.php`. A estrutura de arquivos do seu projeto deverá seguir o padrão abaixo, com as suas classes dentro da pasta `src/`:

```
seu-projeto/
├── src/
│   ├── Funcionario.php
│   ├── Gerente.php
│   └── Desenvolvedor.php
├── tests/
│   └── FuncionarioTest.php
├── composer.json
└── phpunit.xml
```

---

### 1. Classe Funcionario (Classe Base)

- **Atributos (Encapsulamento):**
  - `$nome` (string): `protected`
  - `$salario` (float): `protected`
- **Construtor:**
  - `__construct(string $nome, float $salario)`
- **Métodos:**
  - `getNome(): string`
  - `getSalario(): float`
  - `calcularSalarioAnual(): float` (salário mensal * 12)

---

### 2. Classe Gerente (Herança)

- **Herança:** Deve herdar de `Funcionario`
- **Atributo (Encapsulamento):**
  - `$bonusAnual` (float): `private`
- **Construtor:**
  - `__construct(string $nome, float $salario, float $bonusAnual)` (chama o construtor da classe pai)
- **Métodos:**
  - `calcularSalarioAnual(): float` (sobrescreve o método da classe pai: `(salário mensal * 12) + bonusAnual`)
  - `getBonusAnual(): float`

---

### 3. Classe Desenvolvedor (Herança)

- **Herança:** Deve herdar de `Funcionario`
- **Atributo (Encapsulamento):**
  - `$linguagemPrincipal` (string): `private`
- **Construtor:**
  - `__construct(string $nome, float $salario, string $linguagemPrincipal)` (chama o construtor da classe pai)
- **Método:**
  - `getLinguagemPrincipal(): string`

---

## Como Testar seu Código (Automação com PHPUnit) 🤖

### Passo 1: Configurar o Ambiente

Crie o arquivo `composer.json`:

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    },
    "require-dev": {
        "phpunit/phpunit": "^9.5"
    }
}
```

Instale o PHPUnit:

```sh
composer install
```

> **Observação:** Caso você ainda não tenha o PHP e/ou o Composer instalados em sua máquina, consulte a seção [Instalação do Composer e PHP no Windows](#instalação-do-composer-e-php-no-windows) ao final deste documento.

---

### Passo 2: Criar o Arquivo de Teste

O código de teste já está pronto! Crie o arquivo `tests/FuncionarioTest.php` e **não altere este arquivo**.

---

### Passo 3: Configurar o PHPUnit

Crie o arquivo `phpunit.xml` na raiz do projeto:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit bootstrap="vendor/autoload.php"
         colors="true"
         verbose="true"
         stopOnFailure="false">
    <testsuites>
        <testsuite name="Avaliacao POO">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

---

### Passo 4: Rodar os Testes!

Com tudo configurado e após ter criado suas classes na pasta `src/`, execute:

```sh
./vendor/bin/phpunit
```

- **Se tudo estiver correto ✅:** Todos os 8 testes passarão.
- **Se algo estiver errado ❌:** Leia a mensagem de erro para entender o que precisa ser corrigido.

---

## Critérios de Avaliação 📝

- **Classe e Instância:** Criação correta das classes e seus objetos.
- **Atributos e Métodos:** Definição correta dos atributos e implementação dos métodos solicitados.
- **Construtor:** Uso do `__construct` para inicializar os objetos.
- **Encapsulamento:** Proteção correta dos atributos com `protected` e `private`.
- **Herança:** Uso correto de `extends`.
- **Polimorfismo:** Sobrescrita do método `calcularSalarioAnual()` na classe `Gerente`.

---

## Instalação do Composer e PHP no Windows

### Instalando o PHP

1. Baixe o PHP para Windows em: https://windows.php.net/download/
2. Extraia o conteúdo em uma pasta, por exemplo: `C:\php`
3. Adicione o caminho do PHP à variável de ambiente `PATH`:
   - Painel de Controle > Sistema > Configurações Avançadas > Variáveis de Ambiente
   - Em "Path", adicione: `C:\php`
4. Verifique a instalação abrindo o Prompt de Comando e digitando:
   ```sh
   php -v
   ```

### Instalando o Composer

1. Baixe o instalador do Composer em: https://getcomposer.org/Composer-Setup.exe
2. Execute o instalador e siga as instruções (ele detecta o PHP automaticamente)
3. Após a instalação, verifique no Prompt de Comando:
   ```sh
   composer -V
   ```

Pronto! Agora você pode rodar os comandos do Composer normalmente no Windows.

---

Qualquer dúvida, estou à disposição. Boa sorte!

<?php

namespace Kauevictor30\Exercicio1\Dominio\Modulos;

use DateTimeImmutable;

class Paciente {
    public function __construct(
        private string $cpf,
        private string $nome,
        private array $telefones = [],
        private DateTimeImmutable $dataNasc,
    ){}
}
<?php

namespace Kauevictor30\Exercicio1\Dominio\Modulos;

use DateTimeImmutable;

class Paciente
{
    public function __construct(
        private ?int $id,
        private string $cpf,
        private string $nome,
        private DateTimeImmutable $dataNascimento,
    ) {}

    public function recuperarId(): ?int
    {
        return $this->id;
    }

    public function definirId(int $id): void
    {
        $this->id = $id;
    }

    public function recuperarCPF(): string
    {
        return $this->cpf;
    }

    public function recuperarNome(): string
    {
        return $this->nome;
    }

    public function recuperarDataNascimento(): string
    {
        return $this->dataNascimento->format('Y-m-d H:i:s');
    }
}
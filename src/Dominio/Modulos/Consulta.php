<?php

namespace Kauevictor30\Exercicio1\Dominio\Modulos;

use Kauevictor30\Exercicio1\Dominio\Modulos\Medico;
use Kauevictor30\Exercicio1\Dominio\Modulos\Paciente;
use DateTimeImmutable;

class Consulta {

    private ?int $id = null;

    public function __construct(
        private Medico $medico,
        private Paciente $paciente,
        private DateTimeImmutable $data,
        private float $valor
    ) {}

    public function definirId(int $id): void
    {
        $this->id = $id;
    }

    public function recuperarId(): ?int
    {
        return $this->id;
    }

    public function recuperarMedico(): Medico
    {
        return $this->medico;
    }

    public function recuperarPaciente(): Paciente
    {
        return $this->paciente;
    }

    public function recuperarData(): DateTimeImmutable
    {
        return $this->data;
    }

    public function recuperarValor(): float
    {
        return $this->valor;
    }
}
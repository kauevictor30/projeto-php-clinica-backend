<?php

namespace Kauevictor30\Exercicio1\Dominio\Modulos;

use Kauevictor30\Exercicio1\Dominio\Modulos\Medico;
use Kauevictor30\Exercicio1\Dominio\Modulos\Paciente;
use DateTimeImmutable;

class Consulta {

    function __construct(
        private Medico $medico,
        private Paciente $paciente,
        private DateTimeImmutable $data,
        private float $valor
    ) {}

}
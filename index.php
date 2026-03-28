<?php

use Kauevictor30\Exercicio1\Dominio\Modulos\Medico;
use Kauevictor30\Exercicio1\Dominio\Modulos\Paciente;
use Kauevictor30\Exercicio1\Dominio\Modulos\Consulta;
use Kauevictor30\Exercicio1\Infraestrutura\Configuracoes\Telefone;

require_once __DIR__ . "/vendor/autoload.php";

$medico = new Medico(
    null,
    "CRM/PI 25412",
    "Kauê Victor",
    "Oftomologista"
);

$telefone = new Telefone("86995781666");

$dataNasci = new DateTimeImmutable("2026-03-25 18:00");
$paciente = new Paciente(
    null,
    "027 295 463 14",
    "Kaio Pietro",
    $dataNasci
);

$dataConsulta = new DateTimeImmutable("2026-03-01 13:00"); 
$consulta = new Consulta(
    $medico,
    $paciente,
    $dataConsulta,
    400.00
);

print_r($consulta);
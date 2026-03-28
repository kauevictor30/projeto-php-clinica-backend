<?php

use Kauevictor30\Exercicio1\Dominio\Modulos\Paciente;
use Kauevictor30\Exercicio1\Infraestrutura\Repositorios\RepositorioPaciente;
use Vtiful\Kernel\Format;

require_once __DIR__ . "/vendor/autoload.php";

$paciente = new Paciente(
    null,
    cpf: "12345678900",
    nome: "Maria Silva",
    dataNascimento: new DateTimeImmutable("1990-05-15")
);

$pdoPaciente = new RepositorioPaciente();
$resposta = $pdoPaciente->inserir($paciente);
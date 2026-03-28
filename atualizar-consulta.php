<?php

use Kauevictor30\Exercicio1\Dominio\Modulos\Consulta;
use Kauevictor30\Exercicio1\Dominio\Modulos\Medico;
use Kauevictor30\Exercicio1\Dominio\Modulos\Paciente;
use Kauevictor30\Exercicio1\Infraestrutura\Repositorios\RepositorioConsulta;

require_once __DIR__ . "/vendor/autoload.php";

$medico = new Medico(1, "123456", "Dr. João Silva", "Cardiologia");
$paciente = new Paciente(1, "12345678900", "Maria Silva", new DateTimeImmutable("1990-05-15"));
$dataConsulta = new DateTimeImmutable("2026-03-29 15:30");

$consulta = new Consulta($medico, $paciente, $dataConsulta, 450.00);
$consulta->definirId(1);

$repositorio = new RepositorioConsulta();
$resposta = $repositorio->atualizar($consulta);

var_dump($resposta);
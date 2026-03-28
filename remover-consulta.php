<?php

use DateTimeImmutable;
use Kauevictor30\Exercicio1\Dominio\Modulos\Consulta;
use Kauevictor30\Exercicio1\Dominio\Modulos\Medico;
use Kauevictor30\Exercicio1\Dominio\Modulos\Paciente;
use Kauevictor30\Exercicio1\Infraestrutura\Repositorios\RepositorioConsulta;

require_once __DIR__ . "/vendor/autoload.php";

$medico = new Medico(1, "", "", "");
$paciente = new Paciente(1, "", "", new DateTimeImmutable());
$consulta = new Consulta($medico, $paciente, new DateTimeImmutable(), 0.0);
$consulta->definirId(1);

$repositorio = new RepositorioConsulta();
$resposta = $repositorio->deletar($consulta);

var_dump($resposta);
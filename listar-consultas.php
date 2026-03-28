<?php

use Kauevictor30\Exercicio1\Infraestrutura\Repositorios\RepositorioConsulta;

require_once __DIR__ . "/vendor/autoload.php";

$repositorio = new RepositorioConsulta();
$consultas = $repositorio->listar();

var_dump($consultas);
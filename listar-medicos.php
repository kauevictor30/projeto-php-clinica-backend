<?php

use Kauevictor30\Exercicio1\Infraestrutura\Repositorios\RepositorioMedico;

require_once __DIR__ . "/vendor/autoload.php";

$stmtMedico = new RepositorioMedico();
$resposta = $stmtMedico->listar();

var_dump($resposta);
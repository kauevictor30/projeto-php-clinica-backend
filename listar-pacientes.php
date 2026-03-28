<?php 

use Kauevictor30\Exercicio1\Dominio\Modulos\Paciente;
use Kauevictor30\Exercicio1\Infraestrutura\Repositorios\RepositorioPaciente;

require_once __DIR__ . "/vendor/autoload.php";

$pdoPaciente = new RepositorioPaciente();
$resposta = $pdoPaciente->listar();

var_dump($resposta);
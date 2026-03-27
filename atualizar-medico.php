<?php

use Kauevictor30\Exercicio1\Dominio\Modulos\Medico;
use Kauevictor30\Exercicio1\Infraestrutura\Repositorios\RepositorioMedico;

require_once __DIR__ . "/vendor/autoload.php";

$medico = new Medico(
    1,
    crm: "123456",
    nome: "Dr. João Paulo",
    especialidade: "Cardiologia"
);

$pdoMedico = new RepositorioMedico();
$resposta = $pdoMedico->atualizar($medico);

var_dump($resposta);
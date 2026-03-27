<?php

use Kauevictor30\Exercicio1\Dominio\Modulos\Medico;
use Kauevictor30\Exercicio1\Infraestrutura\Repositorios\RepositorioMedico;

require_once __DIR__ . "/vendor/autoload.php";

$medico = new Medico(
    null,
    crm: "123456",
    nome: "Dr. João Silva",
    especialidade: "Cardiologia"
);

$pdoMedico = new RepositorioMedico();
$resposta = $pdoMedico->inserir($medico);

var_dump($resposta);
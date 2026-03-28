<?php

namespace Kauevictor30\Exercicio1\Dominio\Repositorios;

use Kauevictor30\Exercicio1\Dominio\Modulos\Paciente;

interface RepositorioPacienteInterface
{

    public function listar(): array;
    public function inserir(Paciente $paciente): bool;
    public function deletar(Paciente $paciente);
    public function atualizar(Paciente $paciente);
    public function recuperar(Paciente $paciente);

}
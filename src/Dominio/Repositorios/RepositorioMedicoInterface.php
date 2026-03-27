<?php

namespace Kauevictor30\Exercicio1\Dominio\Repositorios;

use Kauevictor30\Exercicio1\Dominio\Modulos\Medico;

interface RepositorioMedicoInterface
{

    public function listar(): array;
    public function inserir(Medico $medico): bool;
    public function deletar(Medico $medico);
    public function atualizar(Medico $medico);
    public function recuperar(Medico $medico);

}
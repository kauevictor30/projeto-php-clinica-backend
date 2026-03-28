<?php

namespace Kauevictor30\Exercicio1\Dominio\Repositorios;

use Kauevictor30\Exercicio1\Dominio\Modulos\Consulta;

interface RepositorioConsultaInterface
{

    public function listar(): array;
    public function inserir(Consulta $consulta): bool;
    public function deletar(Consulta $consulta);
    public function atualizar(Consulta $consulta);
    public function recuperar(Consulta $consulta);

}

<?php

namespace Kauevictor30\Exercicio1\Infraestrutura\Persistencia;

use PDO;

class FabricaConexao {

    public static function criarConexao()
    {
        $caminhoBanco = __DIR__ . "./../../../banco.sqlite";
        return new PDO("sqlite:$caminhoBanco");
    }

}
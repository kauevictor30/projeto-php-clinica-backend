<?php

namespace Kauevictor30\Exercicio1\Infraestrutura\Repositorios;

use DateTimeImmutable;
use Kauevictor30\Exercicio1\Dominio\Modulos\Consulta;
use Kauevictor30\Exercicio1\Dominio\Modulos\Medico;
use Kauevictor30\Exercicio1\Dominio\Modulos\Paciente;
use Kauevictor30\Exercicio1\Dominio\Repositorios\RepositorioConsultaInterface;
use Kauevictor30\Exercicio1\Infraestrutura\Persistencia\FabricaConexao;
use PDO;
use PDOStatement;

class RepositorioConsulta implements RepositorioConsultaInterface
{
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = FabricaConexao::criarConexao();
    }

    public function listar(): array
    {
        $sqlQuery = "SELECT * FROM consultas;";
        $stmt = $this->conexao->query($sqlQuery);

        return $this->hidratacao($stmt);
    }

    public function inserir(Consulta $consulta): bool
    {
        $inserirQuery = "INSERT INTO consultas (
            medico_id,
            paciente_id,
            data_hora,
            valor
        ) VALUES (
            :medico_id,
            :paciente_id,
            :data_hora,
            :valor
        );";

        $stmt = $this->conexao->prepare($inserirQuery);

        $sucesso = $stmt->execute([
            ':medico_id' => $consulta->recuperarMedico()->recuperarId(),
            ':paciente_id' => $consulta->recuperarPaciente()->recuperarId(),
            ':data_hora' => $consulta->recuperarData()->format('Y-m-d H:i:s'),
            ':valor' => $consulta->recuperarValor(),
        ]);

        if ($sucesso) {
            $consulta->definirId((int) $this->conexao->lastInsertId());
        }

        return $sucesso;
    }

    public function atualizar(Consulta $consulta): bool
    {
        $atualizarQuery = "UPDATE consultas
                           SET
                               medico_id = :medico_id,
                               paciente_id = :paciente_id,
                               data_hora = :data_hora,
                               valor = :valor
                           WHERE
                               id = :id;";

        $stmt = $this->conexao->prepare($atualizarQuery);
        
        $stmt->bindValue(':medico_id', $consulta->recuperarMedico()->recuperarId());
        $stmt->bindValue(':paciente_id', $consulta->recuperarPaciente()->recuperarId());
        $stmt->bindValue(':data_hora', $consulta->recuperarData()->format('Y-m-d H:i:s'));
        $stmt->bindValue(':valor', $consulta->recuperarValor());
        $stmt->bindValue(':id', $consulta->recuperarId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deletar(Consulta $consulta): bool
    {
        $stmt = $this->conexao->prepare("DELETE FROM consultas WHERE id = ?;");
        $stmt->bindValue(1, $consulta->recuperarId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function recuperar(Consulta $consulta): bool
    {
        $stmt = $this->conexao->prepare("SELECT * FROM consultas WHERE id = ?;");
        $stmt->bindValue(1, $consulta->recuperarId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    private function hidratacao(PDOStatement $stmt): array
    {
        $listaDadosConsultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $listaConsultas = [];

        foreach ($listaDadosConsultas as $linha) {
            
            $medico = new Medico((int) $linha['medico_id'], '', '', '');
            $paciente = new Paciente((int) $linha['paciente_id'], '', '', new DateTimeImmutable());

            $consulta = new Consulta(
                $medico,
                $paciente,
                new DateTimeImmutable($linha['data_hora']),
                (float) $linha['valor']
            );
            
            $consulta->definirId((int) $linha['id']);
            $listaConsultas[] = $consulta;
        }

        return $listaConsultas;
    }
}
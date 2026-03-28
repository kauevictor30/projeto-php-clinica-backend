<?php

namespace Kauevictor30\Exercicio1\Infraestrutura\Repositorios;

use DateTimeImmutable;
use Kauevictor30\Exercicio1\Dominio\Modulos\Paciente;
use Kauevictor30\Exercicio1\Dominio\Repositorios\RepositorioPacienteInterface;
use Kauevictor30\Exercicio1\Infraestrutura\Persistencia\FabricaConexao;
use PDO;
use PDOStatement;

class RepositorioPaciente implements RepositorioPacienteInterface
{
    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = FabricaConexao::criarConexao();
    }

    public function listar(): array
    {
        $sqlQuery = "SELECT * FROM pacientes;";
        $stmt = $this->conexao->query($sqlQuery);

        return $this->hidratacao($stmt);
    }

    public function inserir(Paciente $paciente): bool
    {
        $inserirQuery = "INSERT INTO pacientes (
            cpf,
            nome,
            data_nascimento
        ) VALUES (
            :cpf,
            :nome,
            :data_nascimento
        );";

        $stmt = $this->conexao->prepare($inserirQuery);

        $sucesso = $stmt->execute([
            ':cpf' => $paciente->recuperarCPF(),
            ':nome' => $paciente->recuperarNome(),
            ':data_nascimento' => $paciente->recuperarDataNascimento(),
        ]);

        if ($sucesso) {
            $paciente->definirId((int) $this->conexao->lastInsertId());
        }

        return $sucesso;
    }

    public function deletar(Paciente $paciente): bool
    {
        $stmt = $this->conexao->prepare("DELETE FROM pacientes WHERE id = ?;");
        $stmt->bindValue(1, $paciente->recuperarId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function atualizar(Paciente $paciente): bool
    {
        $atualizarQuery = "UPDATE pacientes
                           SET
                               cpf = :cpf,
                               nome = :nome,
                               data_nascimento = :data_nascimento
                           WHERE
                               id = :id;";

        $stmt = $this->conexao->prepare($atualizarQuery);
        $stmt->bindValue(':cpf', $paciente->recuperarCPF());
        $stmt->bindValue(':nome', $paciente->recuperarNome());
        $stmt->bindValue(':data_nascimento', $paciente->recuperarDataNascimento());
        $stmt->bindValue(':id', $paciente->recuperarId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function recuperar(Paciente $paciente): bool
    {
        $stmt = $this->conexao->prepare("SELECT * FROM pacientes WHERE id = ?;");
        $stmt->bindValue(1, $paciente->recuperarId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    private function hidratacao(PDOStatement $stmt): array
    {
        $listaDadosPacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $listaPacientes = [];

        foreach ($listaDadosPacientes as $paciente) {
            $listaPacientes[] = new Paciente(
                (int) $paciente['id'],
                $paciente['cpf'],
                $paciente['nome'],
                new DateTimeImmutable($paciente['data_nascimento']),
            );
        }

        return $listaPacientes;
    }
}
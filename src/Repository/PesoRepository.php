<?php

namespace App\Repository;

use App\Database\Connection;
use App\Model\Peso;
use PDO;

class PesoRepository
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = Connection::getInstance();
    }

    public function create(Peso $peso): bool
    {
        // Aqui você deve ter a lógica para salvar o objeto Peso no banco de dados.
        // Este é um exemplo genérico, você precisará adaptá-lo ao seu contexto e banco de dados.
        $usuarioId = $_SESSION['usuario_id'];
        // Exemplo usando PDO:
        $sql = "INSERT INTO peso (user_id, diaCiclo, data, status, pesoAtual, imcAtual, visceralAtual, gorduraAtual, musculoAtual, obs)
                VALUES (:user_id, :diaCiclo, :data, :status, :pesoAtual, :imcAtual, :visceralAtual, :gorduraAtual, :musculoAtual, :obs)";

        // Preparar a declaração (assumindo que você tem uma conexão PDO)
        $stmt = $this->conn->prepare($sql);

        // Bind os parâmetros
        $stmt->bindValue(':user_id', $usuarioId, PDO::PARAM_INT);
        $stmt->bindValue(':diaCiclo', $peso->getDiaCiclo());
        $stmt->bindValue(':data', $peso->getData());
        $stmt->bindValue(':status', $peso->getStatus());
        $stmt->bindValue(':pesoAtual', $peso->getPesoAtual());
        $stmt->bindValue(':imcAtual', $peso->getImcAtual());
        $stmt->bindValue(':visceralAtual', $peso->getVisceralAtual());
        $stmt->bindValue(':gorduraAtual', $peso->getGorduraAtual());
        $stmt->bindValue(':musculoAtual', $peso->getMusculoAtual());
        $stmt->bindValue(':obs', $peso->getObs());

        // Executar a declaração e retornar o resultado
        return $stmt->execute();
    }

    public function findAll($usuarioId): array
    {
        $sql = "SELECT * FROM peso where user_id = $usuarioId";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(fn($item) => Peso::fromArray($item), $result);
    }

    public function buscarEvolucao($usuarioId)
    {
        $stmt = $this->conn->prepare('SELECT data, pesoAtual, imcAtual, visceralAtual, gorduraAtual, musculoAtual FROM peso WHERE user_id = :usuario_id ORDER BY data ASC');
        $stmt->bindParam(':usuario_id', $usuarioId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os dados como array associativo
    }

    public function buscarPrimeiraData($usuarioId)
    {
        $stmt = $this->conn->prepare('SELECT MIN(data) as primeira_data FROM peso WHERE user_id = :usuario_id');
        $stmt->bindParam(':usuario_id', $usuarioId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['primeira_data'];
    }

    // Outros métodos para update, delete, findById, etc.
}
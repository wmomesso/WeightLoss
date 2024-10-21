<?php

namespace App\Repository;

use App\Database\Connection;
use App\Model\Usuario;
use PDO;

class UsuarioRepository
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = Connection::getInstance();
    }

    public function findByEmail(string $email): ?Usuario
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $usuarioData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuarioData) {
            // Instanciando o objeto manualmente
            return new Usuario(
                $usuarioData['id'],
                $usuarioData['nome'],
                $usuarioData['email'],
                $usuarioData['senha']
            );
        }

        return null;
    }
}
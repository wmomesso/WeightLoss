<?php

namespace App\Service;

use App\Repository\UsuarioRepository;

class AuthService
{
    private UsuarioRepository $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function login(string $email, string $senha): bool
    {
        $usuario = $this->usuarioRepository->findByEmail($email);

        if ($usuario && password_verify($senha, $usuario->getSenha())) {
            $_SESSION['usuario_id'] = $usuario->getId();
            $_SESSION['usuario_nome'] = $usuario->getNome();
            return true;
        }

        return false;
    }

    public function logout(): void
    {
        session_destroy();
    }

    public function usuarioLogado(): bool
    {
        return isset($_SESSION['usuario_id']);
    }
}
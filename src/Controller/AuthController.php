<?php

namespace App\Controller;

use App\Service\AuthService;
use App\Service\PesoService;
use App\Controller\PesoController; // Importar PesoController

class AuthController
{
    private AuthService $authService;
    private PesoService $pesoService; // Adicionar PesoService

    public function __construct(AuthService $authService, PesoService $pesoService)
    {
        $this->authService = $authService;
        $this->pesoService = $pesoService; // Inicializar PesoService
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if ($this->authService->login($email, $senha)) {
                // Redirecionar para a página inicial
                $pesoController = new PesoController($this->pesoService); // Supondo que você tenha um construtor padrão
                $pesoController->list(); // Chama o método list() do PesoController
                exit;
            } else {
                // Exibir mensagem de erro
                print_r($email, $senha);
                echo "Email ou senha inválidos.";
            }
        }

        // Exibir formulário de login
        include __DIR__ . '/../view/login.php';
    }

    public function logout(): void
    {
        $this->authService->logout();
        header('Location: /?acao=login');
        exit;
    }
}
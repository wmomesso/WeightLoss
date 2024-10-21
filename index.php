<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\AuthController;
use App\Controller\PesoController;
use App\Repository\PesoRepository;
use App\Repository\UsuarioRepository;
use App\Service\AuthService;
use App\Service\PesoService;

session_start();

// Criar instâncias do repositório e serviço
$usuarioRepository = new UsuarioRepository();
$authService = new AuthService($usuarioRepository);
$pesoRepository = new PesoRepository();
$pesoService = new PesoService($pesoRepository);
$authController = new AuthController($authService, $pesoService); // Passar PesoService aqui

// Roteamento
if (isset($_GET['acao'])) {
    if ($_GET['acao'] === 'login') {
        $authController->login();
    } elseif ($_GET['acao'] === 'logout') {
        $authController->logout();
    } elseif ($_GET['acao'] === 'newPeso') {
        // Verifica se o usuário está logado antes de acessar a página de cadastro de peso
        if ($authService->usuarioLogado()) {
            $pesoController = new PesoController($pesoService); // Cria a instância do PesoController
            $pesoController->criar(); // Chama o método que exibe o formulário de criação de peso
        } else {
            header('Location: /?acao=login'); // Redireciona para o login se não estiver logado
            exit;
        }
    }elseif($_GET['acao'] === 'list'){
        header('Location: /'); // Redireciona para o login se não estiver logado
        exit;
    }elseif(isset($_GET['acao'])) {
        if ($_GET['acao'] === 'relatorios') {
            $pesoController = new PesoController($pesoService); // Cria a instância do PesoController
            $pesoController->relatorio(); // Chama o método relatorio para exibir os dados
        }
    }
} else {
    if ($authService->usuarioLogado()) {
        // Verificar se o usuário está logado antes de acessar as funcionalidades do sistema
        $pesoController = new PesoController($pesoService); // Criar a instância do PesoController aqui

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pesoController->criar(); // Método que processa a criação de peso
        } else {
            // Exibir a lista de registros chamando o método list do PesoController
            $pesoController->list(); // Aqui, chama o método list do PesoController
        }
    } else {
        header('Location: /?acao=login');
        exit;
    }
}

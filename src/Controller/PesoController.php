<?php

namespace App\Controller;

use App\Model\Peso;
use App\Service\PesoService;

class PesoController
{
    private PesoService $pesoService;

    public function __construct(PesoService $pesoService)
    {
        $this->pesoService = $pesoService;
    }

    public function criar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Captura os dados do formulário
            $diaCiclo = $_POST['diaCiclo'];
            $pesoAtual = $_POST['peso_atual'];
            $altura = $_POST['altura'];
            $visceralAtual = $_POST['visceralAtual'];
            $gorduraAtual = $_POST['gorduraAtual'];
            $musculoAtual = $_POST['musculoAtual'];
            $obs = $_POST['obs'];

            // Calcular IMC
            $imc = number_format(($pesoAtual / ($altura * $altura)), 2, '.');
            $status = $this->classificarIMC($imc);

            // Criar um novo objeto Peso
            $peso = new Peso(
                0,                // ID padrão para novos registros
                $diaCiclo,       // diaCiclo
                date('Y-m-d'),   // data atual
                $status,         // status
                $pesoAtual,      // pesoAtual
                $imc,            // imcAtual
                $visceralAtual,  // visceralAtual
                $gorduraAtual,   // gorduraAtual
                $musculoAtual,
                $obs             // observações
            );

            // Salvar no repositório
            $result = $this->pesoService->criar($peso); // Assegure-se de que isso retorne um resultado

            // Verifique se a operação foi bem-sucedida
            if ($result) {
                // Redirecionar após salvar
                header('Location: /?acao=list');
                exit;
            } else {
                echo "Erro ao salvar os dados."; // Mensagem de erro se não conseguiu salvar
                // Você pode considerar redirecionar ou exibir uma mensagem na mesma página.
            }
        }

        // Se não for um POST, exibir o formulário
        $usuarioId = $_SESSION['usuario_id'];
        $primeiraData = $this->pesoService->buscarPrimeiraData($usuarioId);

        // Calcular a diferença em dias
        if ($primeiraData) {
            $dataPrimeira = new \DateTime($primeiraData);
            $dataAtual = new \DateTime();
            $diferenca = $dataAtual->diff($dataPrimeira)->days;

            // Passar a diferença para a view
            $diaCiclo = $diferenca; // Armazena a diferença
        } else {
            $diaCiclo = 0; // Se não houver registros
        }

        // Exibir o formulário com a diferença
        $view = __DIR__ . '/../view/newPeso.php'; // Definindo a view a ser usada
        include __DIR__ . '/../view/layout.php'; // Incluir o layout com a view
    }


    // Outros métodos para exibir, editar e deletar registros
    public function list(): void
    {
        $usuarioId = $_SESSION['usuario_id'];
        $pesos = $this->pesoService->findAll($usuarioId); // Certifique-se de que o método 'findAll' esteja presente em PesoService.
        $view = __DIR__ . '/../view/list.php'; // Definir a view que deseja carregar

        include __DIR__ . '/../view/layout.php'; // Incluir o layout com a view
    }

    private function classificarIMC(float $imc): string
    {
        if ($imc < 18.5) {
            return 'Magreza';
        } elseif ($imc >= 18.5 && $imc <= 24.9) {
            return 'Normal';
        } elseif ($imc >= 25.0 && $imc <= 29.9) {
            return 'Sobrepeso I';
        } elseif ($imc >= 30.0 && $imc <= 39.9) {
            return 'Obesidade II';
        } else {
            return 'Obesidade Grave III';
        }
    }

    public function relatorio(): void
    {
        // Supondo que você tenha a ID do usuário na sessão
        $usuarioId = $_SESSION['usuario_id'];

        // Busca os dados de evolução de peso do usuário
        $evolucao = $this->pesoService->buscarEvolucao($usuarioId);

        // Prepara os dados em arrays separados para o gráfico
        $dias = [];
        $pesos = [];
        $imcs = [];
        $viscerais = [];
        $gorduras = [];
        $musculos = [];

        foreach ($evolucao as $registro) {
            $dias[] = $registro['data'];
            $pesos[] = $registro['pesoAtual'];
            $imcs[] = $registro['imcAtual'];
            $viscerais[] = $registro['visceralAtual'];
            $gorduras[] = $registro['gorduraAtual'];
            $musculos[] = $registro['musculoAtual'];
        }

        // Passa os dados para a view
        $view = __DIR__ . '/../view/relatorios.php'; // Definir a view que deseja carregar

        include __DIR__ . '/../view/layout.php'; // Incluir o layout com a view
    }
}
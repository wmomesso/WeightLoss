<?php

namespace App\Service;

use App\Model\Peso;
use App\Repository\PesoRepository;

class PesoService
{
    private PesoRepository $pesoRepository;

    public function __construct(PesoRepository $pesoRepository)
    {
        $this->pesoRepository = $pesoRepository;
    }

    public function criarRegistro(array $dados): void
    {
        // Validar os dados
        $peso = new Peso();
        // Preencher o objeto $peso com os dados validados
        $this->pesoRepository->create($peso);
    }

    // Outros métodos para buscar, atualizar e deletar registros

    public function findAll($usuarioId): array
    {
        return $this->pesoRepository->findAll($usuarioId); // Chamando o método findAll do repositório.
    }

    public function criar(Peso $peso): bool
    {
        // Chame o método do repositório para salvar o objeto Peso
        return $this->pesoRepository->create($peso);
    }

    public function buscarEvolucao($usuarioId)
    {
        // Chama o método do repositório para buscar os dados de evolução
        return $this->pesoRepository->buscarEvolucao($usuarioId);
    }

    public function buscarPrimeiraData($usuarioId)
    {
        return $this->pesoRepository->buscarPrimeiraData($usuarioId);
    }
}
<?php

namespace App\Model;

class Peso
{
    private int $id;
    private int $diaCiclo;
    private string $data;
    private string $status;
    private float $pesoAtual;
    private float $imcAtual;
    private float $visceralAtual;
    private float $gorduraAtual;
    private float $musculoAtual;
    private string $obs;

    // Construtor
    public function __construct(
        int $id,
        int $diaCiclo,
        string $data,
        string $status,
        float $pesoAtual,
        float $imcAtual,
        float $visceralAtual,
        float $gorduraAtual,
        float $musculoAtual,
        string $obs
    ) {
        $this->id = $id;
        $this->diaCiclo = $diaCiclo;
        $this->data = $data;
        $this->status = $status;
        $this->pesoAtual = $pesoAtual;
        $this->imcAtual = $imcAtual;
        $this->visceralAtual = $visceralAtual;
        $this->gorduraAtual = $gorduraAtual;
        $this->musculoAtual = $musculoAtual;
        $this->obs = $obs;
    }

    // Método estático para criar um objeto Peso a partir de um array
    public static function fromArray(array $data): Peso
    {
        return new self(
            $data['id'],
            $data['diaCiclo'],
            $data['data'],
            $data['status'],
            $data['pesoAtual'],
            $data['imcAtual'],
            $data['visceralAtual'],
            $data['gorduraAtual'],
            $data['musculoAtual'],
            $data['obs']
        );
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getDiaCiclo(): int
    {
        return $this->diaCiclo;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getPesoAtual(): float
    {
        return $this->pesoAtual;
    }

    public function getImcAtual(): float
    {
        return $this->imcAtual;
    }

    public function getVisceralAtual(): float
    {
        return $this->visceralAtual;
    }

    public function getGorduraAtual(): float
    {
        return $this->gorduraAtual;
    }

    public function getMusculoAtual(): float
    {
        return $this->musculoAtual;
    }

    public function getObs(): string
    {
        return $this->obs;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setDiaCiclo(int $diaCiclo): void
    {
        $this->diaCiclo = $diaCiclo;
    }

    public function setData(string $data): void
    {
        $this->data = $data;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setPesoAtual(float $pesoAtual): void
    {
        $this->pesoAtual = $pesoAtual;
    }

    public function setImcAtual(float $imcAtual): void
    {
        $this->imcAtual = $imcAtual;
    }

    public function setVisceralAtual(float $visceralAtual): void
    {
        $this->visceralAtual = $visceralAtual;
    }

    public function setGorduraAtual(float $gorduraAtual): void
    {
        $this->gorduraAtual = $gorduraAtual;
    }

    public function setMusculoAtual(float $musculoAtual): void
    {
        $this->musculoAtual = $musculoAtual;
    }

    public function setObs(string $obs): void
    {
        $this->obs = $obs;
    }
}

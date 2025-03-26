<?php

namespace BO;

class Realisation2
{

    private int $idUti;
    private int $idBil2;

    public function __construct(int $idUti, int $idBil2)
    {
        $this->idUti = $idUti;
        $this->idBil2 = $idBil2;
    }

    public function getIdUti(): int
    {
        return $this->idUti;
    }

    public function getIdBil2(): int
    {
        return $this->idBil2;
    }

    public function setIdUti(int $idUti): void
    {
        $this->idUti = $idUti;
    }

    public function setIdBil2(int $idBil2): void
    {
        $this->idBil2 = $idBil2;
    }
}
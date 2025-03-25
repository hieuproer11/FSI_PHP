<?php

namespace BO;

class Realisation1
{
    private int $idUti;
    private int $idBil1;

    public function __construct(int $idUti, int $idBil1)
    {
        $this->idUti = $idUti;
        $this->idBil1 = $idBil1;
    }

    public function getIdUti(): int
    {
        return $this->idUti;
    }

    public function getIdBil1(): int
    {
        return $this->idBil1;
    }

    public function setIdUti(int $idUti): void
    {
        $this->idUti = $idUti;
    }

    public function setIdBil1(int $idBil1): void
    {
        $this->idBil1 = $idBil1;
    }

}
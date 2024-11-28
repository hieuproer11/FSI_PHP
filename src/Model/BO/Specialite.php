<?php

namespace Model\BO;
class Specialite
{
    private int $idSpe;
    private string $nomSpe;

    public function __construct(int $idSpe, string $nomSpe)
    {
        $this->idSpe = $idSpe;
        $this->nomSpe = $nomSpe;
    }

    public function getIdSpe(): int
    {
        return $this->idSpe;
    }

    public function getNomSpe(): string
    {
        return $this->nomSpe;
    }
}

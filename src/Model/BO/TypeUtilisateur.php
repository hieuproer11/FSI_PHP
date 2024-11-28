<?php

namespace Model\BO;
class TypeUtilisateur
{
    private int $idTypeUti;
    private string $typeUti;

    public function __construct(int $idTypeUti, string $typeUti)
    {
        $this->idTypeUti = $idTypeUti;
        $this->typeUti = $typeUti;
    }

    public function getIdTypeUti(): int
    {
        return $this->idTypeUti;
    }

    public function getTypeUti(): string
    {
        return $this->typeUti;
    }
}

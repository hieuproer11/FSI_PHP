<?php
namespace BO;
class Classe {
    private int $idCla;
    private string $nomCla;
    private int $nbMaxCla;

    public function __construct(int $idCla, string $nomCla, int $nbMaxCla) {
        $this->idCla = $idCla;
        $this->nomCla = $nomCla;
        $this->nbMaxCla = $nbMaxCla;
    }

    public function getIdCla(): int {
        return $this->idCla;
    }

    public function getNomCla(): string {
        return $this->nomCla;
    }

    public function getNbMaxCla(): int {
        return $this->nbMaxCla;
    }
}

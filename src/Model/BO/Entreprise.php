<?php

class Entreprise {
    private int $idEnt;
    private string $nomEnt;
    private string $villeEnt;
    private string $cpEnt;

    public function __construct(int $idEnt, string $nomEnt, string $villeEnt, string $cpEnt) {
        $this->idEnt = $idEnt;
        $this->nomEnt = $nomEnt;
        $this->villeEnt = $villeEnt;
        $this->cpEnt = $cpEnt;
    }

    public function getIdEnt(): int {
        return $this->idEnt;
    }

    public function getNomEnt(): string {
        return $this->nomEnt;
    }

    public function getVilleEnt(): string {
        return $this->villeEnt;
    }

    public function getCpEnt(): string {
        return $this->cpEnt;
    }
}

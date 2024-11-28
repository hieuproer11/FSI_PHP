<?php
namespace BO;

class Entreprise {
    private int $idEnt;
    private string $nomEnt;
    private string $adrEnt;
    private string $vilEnt;
    private string $cpEnt;

    public function __construct($idEnt, $nomEnt, $adrEnt, $vilEnt, $cpEnt) {
        $this->idEnt = $idEnt;
        $this->nomEnt = $nomEnt;
        $this->adrEnt = $adrEnt;
        $this->vilEnt = $vilEnt;
        $this->cpEnt = $cpEnt;
    }

    // Getters et setters pour chaque propriété
    public function getIdEnt() { return $this->idEnt; }
    public function setIdEnt($idEnt) { $this->idEnt = $idEnt; }

    public function getNomEnt() { return $this->nomEnt; }
    public function setNomEnt($nomEnt) { $this->nomEnt = $nomEnt; }

    public function getAdrEnt() { return $this->adrEnt; }
    public function setAdrEnt($adrEnt) { $this->adrEnt = $adrEnt; }

    public function getVilEnt() { return $this->vilEnt; }
    public function setVilEnt($vilEnt) { $this->vilEnt = $vilEnt; }

    public function getCpEnt() { return $this->cpEnt; }
    public function setCpEnt($cpEnt) { $this->cpEnt = $cpEnt; }
}


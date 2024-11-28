<?php

class Utilisateur {
    private int $idUti;
    private string $nomUti;
    private string $prenomUti;
    private bool $altUti;
    private string $mailUti;
    private string $telUti;
    private string $adrUti;
    private string $cpUti;
    private string $villeUti;
    private string $logUti;
    private string $mdpUti;
 
    // Constructeur
    public function __construct(
        int $idUti,
        string $nomUti,
        string $prenomUti,
        string $mailUti,
        string $telUti,
        string $adrUti,
        string $cpUti,
        string $villeUti,
        string $logUti,
        bool $altUti,
        string $mdpUti
    ) {
        $this->idUti = $idUti;
        $this->nomUti = $nomUti;
        $this->prenomUti = $prenomUti;
        $this->mailUti = $mailUti;
        $this->telUti = $telUti;
        $this->adrUti = $adrUti;
        $this->cpUti = $cpUti;
        $this->villeUti = $villeUti;
        $this->mdpUti = $mdpUti;
        $this->logUti = $logUti;
        $this->altUti = $altUti;
    }

    // Getters et setters
    public function getIdUti(): int {
        return $this->idUti;
    }
    public function setIdUti(int $idUti): void {
        $this->idUti = $idUti;
    }

    public function getNomUti(): string {
        return $this->nomUti;
    }
    public function setNomUti(string $nomUti): void {
        $this->nomUti = $nomUti;
    }

   public function isAltUti(): bool
    {
        return $this->altUti;
    }

    public function setAltUti(bool $altUti): void
    {
        $this->altUti = $altUti;
    }

    public function getLogUti(): string
    {
        return $this->logUti;
    }

    public function setLogUti(string $logUti): void
    {
        $this->logUti = $logUti;
    }
}

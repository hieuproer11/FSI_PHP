<?php
namespace BO;
class Utilisateur {
    private int $idUti;
    private string $nomUti;
    private string $prenomUti;
    private string $mailUti;
    private string $telUti;
    private string $adrUti;
    private string $cpUti;
    private string $villeUti;
    private String $logUti;
    private Bool $altUti;
    private string $mdpUti;
 
    // Constructeur
    public function __construct(
        int $idUti,
        string $nomUti,
        string $prenomUti,
        string $mailUti,
        string $altUti,
        string $telUti,
        string $adrUti,
        string $cpUti,
        string $villeUti,
        string $logUti,
        string $mdpUti
    ) {
        $this->idUti = $idUti;
        $this->nomUti = $nomUti;
        $this->prenomUti = $prenomUti;
        $this->mailUti = $mailUti;
        $this->altUti = $altUti;
        $this->telUti = $telUti;
        $this->adrUti = $adrUti;
        $this->cpUti = $cpUti;
        $this->villeUti = $villeUti;
        $this->logUti =$logUti;
        $this->mdpUti = $mdpUti;
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

    // (Ajoute les autres getters et setters pour les autres attributs)/**
public function getLogUti(): string
{
    return $this->logUti;
}


    public function setLogUti(string $logUti): void
    {
        $this->logUti = $logUti;
    }

    /**
     * @return bool
     */
    public function isAltUti(): bool
    {
        return $this->altUti;
    }

    /**
     * @param bool $altUti
     */
    public function setAltUti(bool $altUti): void
    {
        $this->altUti = $altUti;
    }
}



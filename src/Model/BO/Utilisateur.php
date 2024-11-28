<?php
namespace BO;
<<<<<<< Updated upstream
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
=======

class Utilisateur {
    private int $idUti;
    private string $nomUti;
    private string $preUti;
    private string $mailUti;
    private bool $altUti;
    private string $telUti;
    private string $adrUti;
    private string $cpUti;
    private string $vilUti;
    private string $logUti;
    private string $mdpUti;
    private int $idTut;
    private int $idSpe;
    private int $idTypeuti;
    private int $idMaitapp;
    private int $idEnt;
    private int $idCla;

    public function __construct($idUti, $nomUti, $preUti, $mailUti, $altUti, $telUti, $adrUti, $cpUti, $vilUti, $logUti, $mdpUti, $idTut, $idSpe, $idTypeuti, $idMaitapp, $idEnt, $idCla) {
        $this->idUti = $idUti;
        $this->nomUti = $nomUti;
        $this->preUti = $preUti;
>>>>>>> Stashed changes
        $this->mailUti = $mailUti;
        $this->altUti = $altUti;
        $this->telUti = $telUti;
        $this->adrUti = $adrUti;
        $this->cpUti = $cpUti;
<<<<<<< Updated upstream
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
=======
        $this->vilUti = $vilUti;
        $this->logUti = $logUti;
        $this->mdpUti = $mdpUti;
        $this->idTut = $idTut;
        $this->idSpe = $idSpe;
        $this->idTypeuti = $idTypeuti;
        $this->idMaitapp = $idMaitapp;
        $this->idEnt = $idEnt;
        $this->idCla = $idCla;
    }

    // Getters et setters

    /**
     * @return mixed
     */
    public function getIdUti()
    {
        return $this->idUti;
    }

    /**
     * @param mixed $idUti
     */
    public function setIdUti($idUti): void
    {
        $this->idUti = $idUti;
    }

    /**
     * @return mixed
     */
    public function getNomUti()
    {
        return $this->nomUti;
    }

    /**
     * @param mixed $nomUti
     */
    public function setNomUti($nomUti): void
    {
        $this->nomUti = $nomUti;
    }

    /**
     * @return mixed
     */
    public function getPreUti()
    {
        return $this->preUti;
    }

    /**
     * @param mixed $preUti
     */
    public function setPreUti($preUti): void
    {
        $this->preUti = $preUti;
    }

    /**
     * @return mixed
     */
    public function getMailUti()
    {
        return $this->mailUti;
    }

    /**
     * @param mixed $mailUti
     */
    public function setMailUti($mailUti): void
    {
        $this->mailUti = $mailUti;
    }

    /**
     * @return mixed
     */
    public function getAltUti()
>>>>>>> Stashed changes
    {
        return $this->altUti;
    }

    /**
<<<<<<< Updated upstream
     * @param bool $altUti
     */
    public function setAltUti(bool $altUti): void
    {
        $this->altUti = $altUti;
    }
}


=======
     * @param mixed $altUti
     */
    public function setAltUti($altUti): void
    {
        $this->altUti = $altUti;
    }

    /**
     * @return mixed
     */
    public function getTelUti()
    {
        return $this->telUti;
    }

    /**
     * @param mixed $telUti
     */
    public function setTelUti($telUti): void
    {
        $this->telUti = $telUti;
    }

    /**
     * @return mixed
     */
    public function getAdrUti()
    {
        return $this->adrUti;
    }

    /**
     * @param mixed $adrUti
     */
    public function setAdrUti($adrUti): void
    {
        $this->adrUti = $adrUti;
    }

    /**
     * @return mixed
     */
    public function getCpUti()
    {
        return $this->cpUti;
    }

    /**
     * @param mixed $cpUti
     */
    public function setCpUti($cpUti): void
    {
        $this->cpUti = $cpUti;
    }

    /**
     * @return mixed
     */
    public function getVilUti()
    {
        return $this->vilUti;
    }

    /**
     * @param mixed $vilUti
     */
    public function setVilUti($vilUti): void
    {
        $this->vilUti = $vilUti;
    }

    /**
     * @return mixed
     */
    public function getLogUti()
    {
        return $this->logUti;
    }

    /**
     * @param mixed $logUti
     */
    public function setLogUti($logUti): void
    {
        $this->logUti = $logUti;
    }

    /**
     * @return mixed
     */
    public function getMdpUti()
    {
        return $this->mdpUti;
    }

    /**
     * @param mixed $mdpUti
     */
    public function setMdpUti($mdpUti): void
    {
        $this->mdpUti = $mdpUti;
    }

    /**
     * @return mixed
     */
    public function getIdTut()
    {
        return $this->idTut;
    }

    /**
     * @param mixed $idTut
     */
    public function setIdTut($idTut): void
    {
        $this->idTut = $idTut;
    }

    /**
     * @return mixed
     */
    public function getIdSpe()
    {
        return $this->idSpe;
    }

    /**
     * @param mixed $idSpe
     */
    public function setIdSpe($idSpe): void
    {
        $this->idSpe = $idSpe;
    }

    /**
     * @return mixed
     */
    public function getIdTypeuti()
    {
        return $this->idTypeuti;
    }

    /**
     * @param mixed $idTypeuti
     */
    public function setIdTypeuti($idTypeuti): void
    {
        $this->idTypeuti = $idTypeuti;
    }

    /**
     * @return mixed
     */
    public function getIdMaitapp()
    {
        return $this->idMaitapp;
    }

    /**
     * @param mixed $idMaitapp
     */
    public function setIdMaitapp($idMaitapp): void
    {
        $this->idMaitapp = $idMaitapp;
    }

    /**
     * @return mixed
     */
    public function getIdEnt()
    {
        return $this->idEnt;
    }

    /**
     * @param mixed $idEnt
     */
    public function setIdEnt($idEnt): void
    {
        $this->idEnt = $idEnt;
    }

    /**
     * @return mixed
     */
    public function getIdCla()
    {
        return $this->idCla;
    }

    /**
     * @param mixed $idCla
     */
    public function setIdCla($idCla): void
    {
        $this->idCla = $idCla;
    }
}

>>>>>>> Stashed changes

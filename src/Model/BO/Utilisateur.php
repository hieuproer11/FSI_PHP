<?php
namespace BO;

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
    private Tuteur $idTut;
    private Specialite $idSpe;
    private TypeUtilisateur $idTypeuti;
    private MaitreApprentissage $idMaitapp;
    private Entreprise $idEnt;
    private int $idCla;

    public function __construct($idUti, $nomUti, $preUti, $mailUti, $altUti, $telUti, $adrUti, $cpUti, $vilUti, $logUti, $mdpUti, $idTut, $idSpe, $idTypeuti, $idMaitapp, $idEnt, $idCla) {
        $this->idUti = $idUti;
        $this->nomUti = $nomUti;
        $this->preUti = $preUti;
        $this->mailUti = $mailUti;
        $this->altUti = $altUti;
        $this->telUti = $telUti;
        $this->adrUti = $adrUti;
        $this->cpUti = $cpUti;
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
    {
        return $this->altUti;
    }

    /**
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
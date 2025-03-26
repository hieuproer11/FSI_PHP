<?php

namespace BO;

class Utilisateur {
    private int $idUti;
    private ?string $nomUti = null;
    private ?string $preUti = null;
    private ?string $mailUti = null;
    private ?bool $altUti = null;
    private ?string $telUti = null;
    private ?string $adrUti = null;
    private ?string $cpUti = null;
    private ?string $vilUti = null;
    private ?string $logUti = null;
    private ?string $mdpUti = null;
    private ?int $idTut = null;
    private ?int $idSpe = null;
    private ?int $idTypeuti = null;
    private ?int $idMaitapp = null;
    private ?int $idEnt = null;
    private ?int $idCla = null;


    public function __construct($idUti, $preUti, $nomUti, $adrUti, $mailUti, $telUti, $altUti, $cpUti, $vilUti, $logUti, $mdpUti, $idTut, $idSpe, $idTypeuti, $idMaitapp, $idEnt, $idCla) {
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
    public function setIdUti($idUti)
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
    public function setNomUti($nomUti)
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
    public function setPreUti($preUti)
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
    public function setMailUti($mailUti)
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
    public function setAltUti($altUti)
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
    public function setTelUti($telUti)
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
    public function setAdrUti($adrUti)
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
    public function setCpUti($cpUti)
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
    public function setVilUti($vilUti)
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
    public function setLogUti($logUti)
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
    public function setMdpUti($mdpUti)
    {
        $this->mdpUti = $mdpUti;
    }

    /**
     * @return mixed
     */
    public function getITutd()
    {
        return $this->idTut;
    }

    /**
     * @param mixed $idTut
     */
    public function setIdTut($idTut)
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
    public function setIdSpe($idSpe)
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
    public function setIdTypeuti($idTypeuti)
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
    public function setIdMaitapp($idMaitapp)
    {
        $this->idMaitapp = $idMaitapp;
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
    public function setIdCla($idCla)
    {
        $this->idCla = $idCla;
    }

    /**
     * @return Entreprise|null
     */
    public function getIdEnt()
    {
        return $this->idEnt;
    }

    /**
     * @param Entreprise|null $idEnt
     */
    public function setIdEnt(?Entreprise $idEnt)
    {
        $this->idEnt = $idEnt;
    }

    /**
     * @return Entreprise
     */
}

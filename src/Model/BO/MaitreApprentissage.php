<?php
<<<<<<< Updated upstream
namespace BO;
=======

namespace BO;

>>>>>>> Stashed changes
class MaitreApprentissage {
    private int $idMaitapp;
    private string $nomMaitapp;
    private string $preMaitapp;
    private string $mailMaitapp;
    private string $telMaitapp;
<<<<<<< Updated upstream

    public function __construct(
        int $idMaitapp,
        string $nomMaitapp,
        string $preMaitapp,
        string $mailMaitapp,
        string $telMaitapp
    ) {
=======
    private int $idEnt;

    public function __construct($idMaitapp, $nomMaitapp, $preMaitapp, $mailMaitapp, $telMaitapp, $idEnt) {
>>>>>>> Stashed changes
        $this->idMaitapp = $idMaitapp;
        $this->nomMaitapp = $nomMaitapp;
        $this->preMaitapp = $preMaitapp;
        $this->mailMaitapp = $mailMaitapp;
        $this->telMaitapp = $telMaitapp;
<<<<<<< Updated upstream
    }

    public function getIdMaitapp(): int {
        return $this->idMaitapp;
    }

    public function getNomMaitapp(): string {
        return $this->nomMaitapp;
    }

    public function getPreMaitapp(): string {
        return $this->preMaitapp;
    }

    public function getMailMaitapp(): string {
        return $this->mailMaitapp;
    }

    public function getTelMaitapp(): string {
        return $this->telMaitapp;
    }

    public function afficherDetails(): string {
        return "Nom : {$this->nomMaitapp}, Prénom : {$this->preMaitapp}, Email : {$this->mailMaitapp}, Téléphone : {$this->telMaitapp}";
    }
}
=======
        $this->idEnt = $idEnt;
    }

    public function afficherDetails(): string
    {
        return "Nom : {$this->nomMaitapp}, Prénom : {$this->preMaitapp}, Email : {$this->mailMaitapp}, Téléphone : {$this->telMaitapp}";
    }

    // Getters et setters

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
    public function getNomMaitapp()
    {
        return $this->nomMaitapp;
    }

    /**
     * @param mixed $nomMaitapp
     */
    public function setNomMaitapp($nomMaitapp): void
    {
        $this->nomMaitapp = $nomMaitapp;
    }

    /**
     * @return mixed
     */
    public function getPreMaitapp()
    {
        return $this->preMaitapp;
    }

    /**
     * @param mixed $preMaitapp
     */
    public function setPreMaitapp($preMaitapp): void
    {
        $this->preMaitapp = $preMaitapp;
    }

    /**
     * @return mixed
     */
    public function getMailMaitapp()
    {
        return $this->mailMaitapp;
    }

    /**
     * @param mixed $mailMaitapp
     */
    public function setMailMaitapp($mailMaitapp): void
    {
        $this->mailMaitapp = $mailMaitapp;
    }

    /**
     * @return mixed
     */
    public function getTelMaitapp()
    {
        return $this->telMaitapp;
    }

    /**
     * @param mixed $telMaitapp
     */
    public function setTelMaitapp($telMaitapp): void
    {
        $this->telMaitapp = $telMaitapp;
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
}

>>>>>>> Stashed changes

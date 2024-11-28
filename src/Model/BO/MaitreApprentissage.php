<?php

class MaitreApprentissage {
    private int $idMaitapp;
    private string $nomMaitapp;
    private string $preMaitapp;
    private string $mailMaitapp;
    private string $telMaitapp;

    public function __construct(
        int $idMaitapp,
        string $nomMaitapp,
        string $preMaitapp,
        string $mailMaitapp,
        string $telMaitapp
    ) {
        $this->idMaitapp = $idMaitapp;
        $this->nomMaitapp = $nomMaitapp;
        $this->preMaitapp = $preMaitapp;
        $this->mailMaitapp = $mailMaitapp;
        $this->telMaitapp = $telMaitapp;
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

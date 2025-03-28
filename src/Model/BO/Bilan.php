<?php

namespace BO;

class Bilan {
    protected int $idBil;
    protected ?float $notentBil = null;  // Peut être null
    protected ?float $notdossBil = null; // Peut être null
    protected ?float $notorBil = null;   // Peut être null
    protected ?float $moyBil = null;     // Peut être null
    protected string $remarqueBil;
    protected string $datevisiteBil;

    public function __construct($idBil, $notentBil, $notdossBil, $notorBil, $moyBil, $remarqueBil, $datevisiteBil) {
        $this->idBil = $idBil;
        $this->notentBil = $notentBil;
        $this->notdossBil = $notdossBil;
        $this->notorBil = $notorBil;
        $this->moyBil = $moyBil;
        $this->remarqueBil = $remarqueBil;
        $this->datevisiteBil = $datevisiteBil;
    }

    public function getIdBil() { return $this->idBil; }
    public function setIdBil($idBil) { $this->idBil = $idBil; }

    public function getNotentBil() { return $this->notentBil; }
    public function setNotentBil($notentBil) { $this->notentBil = $notentBil; }

    public function getNotdossBil() { return $this->notdossBil; }
    public function setNotdossBil($notdossBil) { $this->notdossBil = $notdossBil; }

    public function getNotorBil() { return $this->notorBil; }
    public function setNotorBil($notorBil) { $this->notorBil = $notorBil; }

    public function getMoyBil() { return $this->moyBil; }
    public function setMoyBil($moyBil) { $this->moyBil = $moyBil; }

    public function getRemarqueBil() { return $this->remarqueBil; }
    public function setRemarqueBil($remarqueBil) { $this->remarqueBil = $remarqueBil; }

    public function getDatevisiteBil() { return $this->datevisiteBil; }
    public function setDatevisiteBil($datevisiteBil) { $this->datevisiteBil = $datevisiteBil; }
}

<?php
<<<<<<< Updated upstream
namespace BO;
class Bilan {
    protected int $idBil;
    protected string $notorBil;
    protected string $moyBil;
    protected string $remarqueBil;
    protected string $sujMenBil;
    protected DateTime $datBil;
    protected DateTime $datLimBil;

    public function __construct(
        int $idBil,
        string $notorBil,
        string $moyBil,
        string $remarqueBil,
        string $sujMenBil,
        DateTime $datBil,
        DateTime $datLimBil
    ) {
        $this->idBil = $idBil;
        $this->notorBil = $notorBil;
        $this->moyBil = $moyBil;
        $this->remarqueBil = $remarqueBil;
        $this->sujMenBil = $sujMenBil;
        $this->datBil = $datBil;
        $this->datLimBil = $datLimBil;
    }

    public function getIdBil(): int {
        return $this->idBil;
    }

    public function getNotorBil(): string {
        return $this->notorBil;
    }

    public function getMoyBil(): string {
        return $this->moyBil;
    }

    public function getRemarqueBil(): string {
        return $this->remarqueBil;
    }

    public function getSujMenBil(): string {
        return $this->sujMenBil;
    }

    public function getDatBil(): DateTime {
        return $this->datBil;
    }

    public function getDatLimBil(): DateTime {
        return $this->datLimBil;
    }
=======

namespace BO;

class Bilan {
    protected int $idBil;
    protected float $notentBil;
    protected float $notdossBil;
    protected float $notorBil;
    protected float $moyBil;
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

    // Getters et setters
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
>>>>>>> Stashed changes
}

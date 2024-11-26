<?php

class Alerte {
    private int $idAl;
    private DateTime $dateVisiteBilan1Al;
    private DateTime $dateVisiteBilan2Al;

    public function __construct(int $idAl, DateTime $dateVisiteBilan1Al, DateTime $dateVisiteBilan2Al) {
        $this->idAl = $idAl;
        $this->dateVisiteBilan1Al = $dateVisiteBilan1Al;
        $this->dateVisiteBilan2Al = $dateVisiteBilan2Al;
    }

    public function getIdAl(): int {
        return $this->idAl;
    }

    public function getDateVisiteBilan1Al(): DateTime {
        return $this->dateVisiteBilan1Al;
    }

    public function getDateVisiteBilan2Al(): DateTime {
        return $this->dateVisiteBilan2Al;
    }
}

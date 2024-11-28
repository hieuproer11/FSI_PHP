<?php

class Alerte {
    private int $idAl;
    private DateTime $dateVisiteBilan1Al;
    private DateTime $dateVisiteBilan2Al;
    private DateTime $datelim1_Al;
    private DateTime $datelim2_Al;


    public function __construct(int $idAl, DateTime $dateVisiteBilan1Al, DateTime $dateVisiteBilan2Al, DateTime $datelim1_Al, DateTime $datelim2_Al) {
        $this->idAl = $idAl;
        $this->dateVisiteBilan1Al = $dateVisiteBilan1Al;
        $this->dateVisiteBilan2Al = $dateVisiteBilan2Al;
        $this->datelim1_Al = $datelim1_Al;
        $this->datelim2_Al = $datelim2_Al;
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

    public function getDatelim1Al(): DateTime
    {
        return $this->datelim1_Al;
    }

    public function setDatelim1Al(DateTime $datelim1_Al): void
    {
        $this->datelim1_Al = $datelim1_Al;
    }

    public function getDatelim2Al(): DateTime
    {
        return $this->datelim2_Al;
    }

    public function setDatelim2Al(DateTime $datelim2_Al): void
    {
        $this->datelim2_Al = $datelim2_Al;
    }
}

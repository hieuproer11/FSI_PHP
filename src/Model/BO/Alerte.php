<?php
namespace BO;

class Alerte {
    private int $idAl;
    private \DateTime $datelimbil1Al;
    private \DateTime $datelimbil2Al;

    // Le constructeur qui nécessite des arguments
    public function __construct($idAl, $datelimbil1Al, $datelimbil2Al) {
        $this->idAl = $idAl;
        $this->datelimbil1Al = $datelimbil1Al;
        $this->datelimbil2Al = $datelimbil2Al;
    }


    // Getters et setters

    /**
     * @return mixed
     */
    public function getIdAl()
    {
        return $this->idAl;
    }

    /**
     * @param mixed $idAl
     */
    public function setIdAl($idAl): void
    {
        $this->idAl = $idAl;
    }

    /**
     * @return mixed
     */
    public function getDatelimbil1Al()
    {
        return $this->datelimbil1Al;
    }

    /**
     * @param mixed $datelimbil1Al
     */
    public function setDatelimbil1Al($datelimbil1Al): void
    {
        $this->datelimbil1Al = $datelimbil1Al;
    }

    /**
     * @return mixed
     */
    public function getDatelimbil2Al()
    {
        return $this->datelimbil2Al;
    }

    /**
     * @param mixed $datelimbil2Al
     */
    public function setDatelimbil2Al($datelimbil2Al): void
    {
        $this->datelimbil2Al = $datelimbil2Al;
    }
}


<?php

namespace BO;

class Gerer {
    private int $idCla;
    private int $idTut;
    private int $nbmaxetuTut;

    public function __construct($idCla, $idTut, $nbmaxetuTut) {
        $this->idCla = $idCla;
        $this->idTut = $idTut;
        $this->nbmaxetuTut = $nbmaxetuTut;
    }

    // Getters et setters

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
    public function getNbmaxetuTut()
    {
        return $this->nbmaxetuTut;
    }

    /**
     * @param mixed $nbmaxetuTut
     */
    public function setNbmaxetuTut($nbmaxetuTut): void
    {
        $this->nbmaxetuTut = $nbmaxetuTut;
    }
}

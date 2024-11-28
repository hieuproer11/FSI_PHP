<?php

namespace BO;

class Realiser1
{
    private $idUti;
    private $idBil1;

    public function __construct($idUti, $idBil1)
    {
        $this->idUti = $idUti;
        $this->idBil1 = $idBil1;
    }

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
    public function getIdBil1()
    {
        return $this->idBil1;
    }

    /**
     * @param mixed $idBil1
     */
    public function setIdBil1($idBil1): void
    {
        $this->idBil1 = $idBil1;
    }
}
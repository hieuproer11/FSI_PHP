<?php

namespace BO;


class Realiser2
{
    private int $idUti;
    private int $idBil2;

    public function __construct($idUti, $idBil2)
    {
        $this->idUti = $idUti;
        $this->idBil2 = $idBil2;
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
    public function getIdBil2()
    {
        return $this->idBil2;
    }

    /**
     * @param mixed $idBil2
     */
    public function setIdBil2($idBil2): void
    {
        $this->idBil2 = $idBil2;
    }
}
<?php

namespace BO;
class Classe {
    private $idCla;
    private $nomCla;

    public function __construct($idCla, $nomCla) {
        $this->idCla = $idCla;
        $this->nomCla = $nomCla;
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
    public function getNomCla()
    {
        return $this->nomCla;
    }

    /**
     * @param mixed $nomCla
     */
    public function setNomCla($nomCla): void
    {
        $this->nomCla = $nomCla;
    }
}


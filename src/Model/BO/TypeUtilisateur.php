<?php

namespace BO;

class TypeUtilisateur {
    private int $idTypeuti;
    private string $typeutiTypeuti;

    public function __construct($idTypeuti, $typeutiTypeuti) {
        $this->idTypeuti = $idTypeuti;
        $this->typeutiTypeuti = $typeutiTypeuti;
    }

    // Getters et setters

    /**
     * @return mixed
     */
    public function getIdTypeuti()
    {
        return $this->idTypeuti;
    }

    /**
     * @param mixed $idTypeuti
     */
    public function setIdTypeuti($idTypeuti): void
    {
        $this->idTypeuti = $idTypeuti;
    }

    /**
     * @return mixed
     */
    public function getTypeutiTypeuti()
    {
        return $this->typeutiTypeuti;
    }

    /**
     * @param mixed $typeutiTypeuti
     */
    public function setTypeutiTypeuti($typeutiTypeuti): void
    {
        $this->typeutiTypeuti = $typeutiTypeuti;
    }
}


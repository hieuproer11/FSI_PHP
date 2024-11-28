<?php

namespace BO;
class Specialite {
    private int $idSpe;
    private string $nomSpe;

    public function __construct($idSpe, $nomSpe) {
        $this->idSpe = $idSpe;
        $this->nomSpe = $nomSpe;
    }

    // Getters et setters

    /**
     * @return mixed
     */
    public function getIdSpe()
    {
        return $this->idSpe;
    }

    /**
     * @param mixed $idSpe
     */
    public function setIdSpe($idSpe): void
    {
        $this->idSpe = $idSpe;
    }

    /**
     * @return mixed
     */
    public function getNomSpe()
    {
        return $this->nomSpe;
    }

    /**
     * @param mixed $nomSpe
     */
    public function setNomSpe($nomSpe): void
    {
        $this->nomSpe = $nomSpe;
    }
}


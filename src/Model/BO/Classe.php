<?php
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
namespace BO;
class Classe {
    private int $idCla;
    private string $nomCla;
<<<<<<< Updated upstream
    private int $nbMaxCla;

    public function __construct(int $idCla, string $nomCla, int $nbMaxCla) {
        $this->idCla = $idCla;
        $this->nomCla = $nomCla;
        $this->nbMaxCla = $nbMaxCla;
    }

    public function getIdCla(): int {
        return $this->idCla;
    }

    public function getNomCla(): string {
        return $this->nomCla;
    }

    public function getNbMaxCla(): int {
        return $this->nbMaxCla;
    }
}
=======

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

>>>>>>> Stashed changes

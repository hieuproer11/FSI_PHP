<?php
<<<<<<< Updated upstream
namespace BO;
class TypeUtilisateur {
    private int $idTypeUti;
    private string $typeUti;

    public function __construct(int $idTypeUti, string $typeUti) {
        $this->idTypeUti = $idTypeUti;
        $this->typeUti = $typeUti;
    }

    public function getIdTypeUti(): int {
        return $this->idTypeUti;
    }

    public function getTypeUti(): string {
        return $this->typeUti;
    }
}
=======

namespace BO;

class Type_d_utilisateur {
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

>>>>>>> Stashed changes

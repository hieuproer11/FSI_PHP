<?php
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
namespace BO;
class Specialite {
    private int $idSpe;
    private string $nomSpe;

<<<<<<< Updated upstream
    public function __construct(int $idSpe, string $nomSpe) {
=======
    public function __construct($idSpe, $nomSpe) {
>>>>>>> Stashed changes
        $this->idSpe = $idSpe;
        $this->nomSpe = $nomSpe;
    }

<<<<<<< Updated upstream
    public function getIdSpe(): int {
        return $this->idSpe;
    }

    public function getNomSpe(): string {
        return $this->nomSpe;
    }
}
=======
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

>>>>>>> Stashed changes

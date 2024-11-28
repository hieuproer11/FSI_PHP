<?php

namespace BO;
<<<<<<< Updated upstream
use Bilan;
class Bilan1 extends Bilan {
    public function __construct(
        int $idBil,
        string $notorBil,
        string $moyBil,
        string $remarqueBil,
        string $sujMenBil,
        DateTime $datBil,
        DateTime $datLimBil
    ) {
        parent::__construct($idBil, $notorBil, $moyBil, $remarqueBil, $sujMenBil, $datBil, $datLimBil);
    }

}
=======

class Bilan1 extends Bilan {
    // Ajoute des propriétés spécifiques à Bilan1, si nécessaire
    public function __construct($idBil1, $notentBil1, $notdossBil1, $notorBil1, $moyBil1, $remarqueBil1, $datevisiteBil1) {
        // Appel du constructeur parent
        parent::__construct($idBil1, $notentBil1, $notdossBil1, $notorBil1, $moyBil1, $remarqueBil1, $datevisiteBil1);
    }

    // Vous pouvez ajouter des méthodes spécifiques à Bilan1 ici
}

>>>>>>> Stashed changes

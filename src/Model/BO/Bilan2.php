<?php
<<<<<<< Updated upstream
namespace BO;
use Bilan;

class Bilan2 extends Bilan {
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

=======

namespace BO;

class Bilan2 extends Bilan {

    public function __construct($idBil2, $notdossBil2, $notorBil2, $moyBil2, $remarqueBil2, $sujmemBil2, $datevisiteBil2) {
        // Appel du constructeur parent
        parent::__construct($idBil2, $notdossBil2, $notdossBil2, $notorBil2, $moyBil2, $remarqueBil2, $datevisiteBil2);
        $this->sujmemBil2 = $sujmemBil2;
    }

    // Getter et setter pour $sujmemBil2
    public function getSujmemBil2() { return $this->sujmemBil2; }
    public function setSujmemBil2($sujmemBil2) { $this->sujmemBil2 = $sujmemBil2; }
>>>>>>> Stashed changes
}

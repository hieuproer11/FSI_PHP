<?php

namespace BO;

include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan.php';

class Bilan2 extends Bilan {
    private ?string $sujmemBil2;

    public function __construct($idBil2,$notentBil2, $notdossBil2, $notorBil2, $moyBil2, $remarqueBil2, $sujmemBil2, $datevisiteBil2) {
        parent::__construct($idBil2, $notentBil2, $notdossBil2, $notorBil2, $moyBil2, $remarqueBil2, $datevisiteBil2);
        $this->sujmemBil2 = $sujmemBil2;
    }

    public function getSujmemBil2() { return $this->sujmemBil2; }
    public function setSujmemBil2($sujmemBil2) { $this->sujmemBil2 = $sujmemBil2; }
}

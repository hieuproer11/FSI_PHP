<?php

namespace BO;

require_once __DIR__ . '/Bilan.php';

class Bilan2 extends Bilan {
    private ?string $sujmemBil2;

    public function __construct($idBil2, $notdossBil2, $notorBil2, $moyBil2, $remarqueBil2, $datevisiteBil2) {
        parent::__construct($idBil2, $notdossBil2, $notdossBil2, $notorBil2, $moyBil2, $remarqueBil2, $datevisiteBil2);
    }

    public function getSujmemBil2() { return $this->sujmemBil2; }
    public function setSujmemBil2($sujmemBil2) { $this->sujmemBil2 = $sujmemBil2; }
}

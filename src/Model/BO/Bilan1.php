<?php

namespace BO;

require_once __DIR__ . '/Bilan.php';

class Bilan1 extends Bilan {
    private ?string $dateLimiteBil = null;

    public function __construct($idBil1, $notentBil1, $notdossBil1, $notorBil1, $moyBil1, $remarqueBil1, $datevisiteBil1, $dateLimiteBil1 = null) {
        parent::__construct($idBil1, $notentBil1, $notdossBil1, $notorBil1, $moyBil1, $remarqueBil1, $datevisiteBil1);
        $this->dateLimiteBil = $dateLimiteBil1;
    }

    public function getDatelimiteBil() { return $this->dateLimiteBil; }
    public function setDatelimiteBil($dateLimiteBil) { $this->dateLimiteBil = $dateLimiteBil; }
}

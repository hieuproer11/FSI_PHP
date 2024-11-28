<?php

require_once 'Bilan.php';

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

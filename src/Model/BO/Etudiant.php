<?php

namespace BO;

class Etudiant extends Utilisateur
{

    private Entreprise $entreprise;
    public function __construct(
        int $idUti,
        string $preUti,
        string $nomUti,
        string $adrUti,
        string $mailUti,
        string $telUti,
        bool $altUti,
        Entreprise $entreprise
    ) {
        // Appeler le constructeur parent pour initialiser les propriétés héritées
        parent::__construct($idUti, $preUti, $nomUti, $adrUti, $mailUti, $telUti, $altUti,
            null,null,null,null,null,null,null,
            null,null,null,$entreprise);
        $this->entreprise = $entreprise;
    }



    /**
     * @return Entreprise
     */
    public function getEntreprise(): Entreprise
    {
        return $this->entreprise;
    }

    /**
     * @param Entreprise $entreprise
     */
    public function setEntreprise(Entreprise $entreprise): void
    {
        $this->entreprise = $entreprise;
    }


}

<?php

namespace BO;
require_once __DIR__ . '/Utilisateur.php';
use BO\Utilisateur;
class Etudiant extends Utilisateur
{

    private ?Entreprise $entreprise = null;
    private ?Specialite $specialite = null;
    private ?CLasse $classe = null;
    private ?Bilan1 $bilan1 = null;
    private ?Bilan2 $bilan2 = null;
    public function __construct(
        int $idUti,
        string $preUti,
        string $nomUti,
        string $adrUti,
        string $mailUti,
        string $telUti,
        bool $altUti,
        string $cpUti,
        string $vilUti,
        Entreprise $entreprise,
        Specialite $specialite,
        Classe $classe,
        Bilan1 $bilan1,
        Bilan2 $bilan2

    ) {
        // Appeler le constructeur parent pour initialiser les propriétés héritées
        parent::__construct($idUti, $preUti, $nomUti, $adrUti, $mailUti, $telUti, $altUti,
            $cpUti,$vilUti,null,null,null,null,null,
            null,null,null,$entreprise,$specialite, $classe, $bilan1, $bilan2);
        $this->entreprise = $entreprise;
        $this->specialite = $specialite;
        $this->classe = $classe;
        $this->bilan1 = $bilan1;
        $this->bilan2 = $bilan2;
    }


    /**
     * @return Specialite
     */
    public function getSpecialite(): Specialite
    {
        return $this->specialite;
    }
    /**param
     * @param Specialite $specialite
     */
    public function setSpecialite(Specialite $specialite): void
    {
        $this->specialite = $specialite;
    }

    /**
     * @return Classe
     */
    public function getClasse(): Classe
    {
        return $this->classe;
    }
    /**param
     * @param Classe $classe
     */
    public function setClasse(Classe $classe): void
    {
        $this->classe = $classe;
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

    /**
     * @return Bilan1|null
     */
    public function getBilan1(): ?Bilan1
    {
        return $this->bilan1;
    }

    /**
     * @param Bilan1|null $bilan1
     */
    public function setBilan1(?Bilan1 $bilan1): void
    {
        $this->bilan1 = $bilan1;
    }

    /**
     * @return Bilan2|null
     */
    public function getBilan2(): ?Bilan2
    {
        return $this->bilan2;
    }

    /**
     * @param Bilan2|null $bilan2
     */
    public function setBilan2(?Bilan2 $bilan2): void
    {
        $this->bilan2 = $bilan2;
    }


}

<?php

namespace BO;

class Etudiant extends Utilisateur
{

    private ?Entreprise $entreprise = null;
    private ?Specialite $specialite = null;
    private ?CLasse $classe = null;
    public function __construct(
        int $idUti,
        string $preUti,
        string $nomUti,
        string $adrUti,
        string $mailUti,
        string $telUti,
        bool $altUti,
        Entreprise $entreprise,
        Specialite $specialite,
        Classe $classe
    ) {
        // Appeler le constructeur parent pour initialiser les propriétés héritées
        parent::__construct($idUti, $preUti, $nomUti, $adrUti, $mailUti, $telUti, $altUti,
            null,null,null,null,null,null,null,
            null,null,null,$entreprise,$specialite,$classe);
        $this->entreprise = $entreprise;
        $this->specialite = $specialite;
        $this->classe = $classe;
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


}

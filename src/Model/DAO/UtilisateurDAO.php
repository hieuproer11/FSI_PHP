<?php

namespace DAO;
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Entreprise.php';
use BO\Utilisateur;
use PDO;
use BO\Entreprise;

class UtilisateurDAO {

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Méthode pour créer un utilisateur
    public function create(Utilisateur $utilisateur): void {
        $sql = "INSERT INTO Utilisateur 
                (idUti, nomUti, preUti, mailUti, altUti, telUti, adrUti, cpUti, vilUti, logUti, mdpUti, idTut, idSpe, idTypeuti, idMaitapp, idEnt, idCla)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $utilisateur->getIdUti(),
            $utilisateur->getNomUti(),
            $utilisateur->getPreUti(),
            $utilisateur->getMailUti(),
            $utilisateur->getAltUti(),
            $utilisateur->getTelUti(),
            $utilisateur->getAdrUti(),
            $utilisateur->getCpUti(),
            $utilisateur->getVilUti(),
            $utilisateur->getLogUti(),
            $utilisateur->getMdpUti(),
            $utilisateur->getIdTut(),
            $utilisateur->getIdSpe(),
            $utilisateur->getIdTypeuti(),
            $utilisateur->getIdMaitapp(),
            $utilisateur->getIdEnt(),
            $utilisateur->getIdCla()
        ]);
    }

    public function findByLogin(String $login, String $mdp ){

        $sql = "SELECT U.*, B1.*,B2.*,C.*,E.*,M.*,Tu.*, Re1.*, Re2.*, S.*, T.typeutiTypeuti 
                FROM utilisateur U inner join type_d_utilisateur T ON U.idTypeuti = T.idTypeuti
                		   		   inner join classe C On U.idCla = C.idCla
                                   inner join specialite s on S.idSpe = U.idSpe
                                   inner join entreprise E On U.idEnt = E.idEnt
                                   inner join maitre_d_apprentissage M On U.idMaitapp = M.idMaitapp
                                   inner join tuteur Tu On U.idTut = Tu.idTut
                                   inner join realiser1 Re1 on U.idUti = Re1.idUti
                                   inner join realiser2 Re2 on U.idUti = Re2.idUti
                                   inner join bilan1 B1 on Re1.idBil1 = B1.idBil1
                                   inner join bilan2 B2 on Re2.idBil2 = B2.idBil2
                WHERE U.logUti Like ? AND U.mdpUti Like ?  AND U.idTypeuti = 1";
        $login1 = "%{$login}%";
        $mdp1 = "%{$mdp}%";
        $params = array($login, $mdp);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if(!$row){
            return null;
        }
        return $row;
    }

    // Méthode pour récupérer un utilisateur par son ID
    //method getById pour etudiant

    public function getById(int $id): ?Utilisateur {
        $sql = "SELECT * FROM Utilisateur WHERE idUti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Utilisateur(
            $row['idUti'],
            $row['nomUti'],
            $row['preUti'],
            $row['mailUti'],
            $row['altUti'],
            $row['telUti'],
            $row['adrUti'],
            $row['cpUti'],
            $row['vilUti'],
            $row['logUti'],
            $row['mdpUti'],
            $row['idTut'],
            $row['idSpe'],
            $row['idTypeuti'],
            $row['idMaitapp'],
            $row['idEnt'],
            $row['idCla']
        );
    }



    // Méthode pour mettre à jour un utilisateur
    public function update(Utilisateur $utilisateur): void {
        $sql = "UPDATE Utilisateur SET 
                nomUti = ?, preUti = ?, mailUti = ?, altUti = ?, telUti = ?, adrUti = ?, cpUti = ?, vilUti = ?, 
                logUti = ?, mdpUti = ?, idTut = ?, idSpe = ?, idTypeuti = ?, idMaitapp = ?, idEnt = ?, idCla = ?
                WHERE idUti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $utilisateur->getNomUti(),
            $utilisateur->getPreUti(),
            $utilisateur->getMailUti(),
            $utilisateur->getAltUti(),
            $utilisateur->getTelUti(),
            $utilisateur->getAdrUti(),
            $utilisateur->getCpUti(),
            $utilisateur->getVilUti(),
            $utilisateur->getLogUti(),
            $utilisateur->getMdpUti(),
            $utilisateur->getIdTut(),
            $utilisateur->getIdSpe(),
            $utilisateur->getIdTypeuti(),
            $utilisateur->getIdMaitapp(),
            $utilisateur->getIdEnt(),
            $utilisateur->getIdCla(),
            $utilisateur->getIdUti()
        ]);
    }

    // Méthode pour supprimer un utilisateur par son ID
    public function delete(int $id): void {
        $sql = "DELETE FROM Utilisateur WHERE idUti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }

    // Méthode pour récupérer tous les utilisateurs
    public function getAll(): array {
        $sql = "SELECT * FROM Utilisateur";
        $result = $this->db->query($sql);
        $utilisateursData = $result->fetchAll(PDO::FETCH_ASSOC);

        $utilisateurs = [];
        foreach ($utilisateursData as $row) {
            $utilisateurs[] = new Utilisateur(
                $row['idUti'],
                $row['nomUti'],
                $row['preUti'],
                $row['mailUti'],
                $row['altUti'],
                $row['telUti'],
                $row['adrUti'],
                $row['cpUti'],
                $row['vilUti'],
                $row['logUti'],
                $row['mdpUti'],
                $row['idTut'],
                $row['idSpe'],
                $row['idTypeuti'],
                $row['idMaitapp'],
                $row['idEnt'],
                $row['idCla']
            );
        }

        return $utilisateurs;
    }
}

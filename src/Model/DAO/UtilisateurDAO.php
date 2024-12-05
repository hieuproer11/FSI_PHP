<?php

namespace DAO;

use BO\Utilisateur;
use PDO;

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

    // Méthode pour récupérer un utilisateur par son ID
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

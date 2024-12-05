<?php

namespace DAO;

use BO\MaitreApprentissage;
use PDO;

class MaitreApprentissageDAO {

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Méthode pour créer un maître d'apprentissage
    public function create(MaitreApprentissage $maitreApprentissage): void {
        $sql = "INSERT INTO Maitre_d_apprentissage (idMaitapp, nomMaitapp, preMaitapp, mailMaitapp, telMaitapp, idEnt) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $maitreApprentissage->getIdMaitapp(),
            $maitreApprentissage->getNomMaitapp(),
            $maitreApprentissage->getPreMaitapp(),
            $maitreApprentissage->getMailMaitapp(),
            $maitreApprentissage->getTelMaitapp(),
            $maitreApprentissage->getIdEnt()
        ]);
    }

    // Méthode pour récupérer un maître d'apprentissage par ID
    public function getById(int $idMaitapp): ?MaitreApprentissage {
        $sql = "SELECT * FROM Maitre_d_apprentissage WHERE idMaitapp = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idMaitapp]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new MaitreApprentissage(
            $row['idMaitapp'],
            $row['nomMaitapp'],
            $row['preMaitapp'],
            $row['mailMaitapp'],
            $row['telMaitapp'],
            $row['idEnt']
        );
    }

    // Méthode pour mettre à jour un maître d'apprentissage existant
    public function update(MaitreApprentissage $maitreApprentissage): void {
        $sql = "UPDATE Maitre_d_apprentissage SET 
                nomMaitapp = ?, preMaitapp = ?, mailMaitapp = ?, telMaitapp = ?, idEnt = ? 
                WHERE idMaitapp = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $maitreApprentissage->getNomMaitapp(),
            $maitreApprentissage->getPreMaitapp(),
            $maitreApprentissage->getMailMaitapp(),
            $maitreApprentissage->getTelMaitapp(),
            $maitreApprentissage->getIdEnt(),
            $maitreApprentissage->getIdMaitapp()
        ]);
    }

    // Méthode pour supprimer un maître d'apprentissage par ID
    public function delete(int $idMaitapp): void {
        $sql = "DELETE FROM Maitre_d_apprentissage WHERE idMaitapp = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idMaitapp]);
    }

    // Méthode pour récupérer tous les maîtres d'apprentissage
    public function getAll(): array {
        $sql = "SELECT * FROM Maitre_d_apprentissage";
        $result = $this->db->query($sql);
        $maitresApprentissageData = $result->fetchAll(PDO::FETCH_ASSOC);

        $maitresApprentissage = [];
        foreach ($maitresApprentissageData as $row) {
            $maitresApprentissage[] = new MaitreApprentissage(
                $row['idMaitapp'],
                $row['nomMaitapp'],
                $row['preMaitapp'],
                $row['mailMaitapp'],
                $row['telMaitapp'],
                $row['idEnt']
            );
        }

        return $maitresApprentissage;
    }
}

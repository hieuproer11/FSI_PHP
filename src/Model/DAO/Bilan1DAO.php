<?php

namespace DAO;
include_once "C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan1.php";
use BO\Bilan1;
use PDO;

class Bilan1DAO {

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Méthode pour créer un Bilan1
    public function create(Bilan1 $bilan): void {
        $sql = "INSERT INTO Bilan1 (notentBil1, notdossBil1, notorBil1, moyBil1, remarqueBil1, datevisiteBil1) 
                VALUES ( ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $bilan->getNotentBil(),
            $bilan->getNotdossBil(),
            $bilan->getNotorBil(),
            $bilan->getMoyBil(),
            $bilan->getRemarqueBil(),
            $bilan->getDatevisiteBil()
        ]);
    }

    // Méthode pour récupérer un Bilan1 par ID
    public function getById(int $idBil): ?Bilan1 {
        $sql = "SELECT * FROM Bilan1 WHERE idBil1 = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idBil]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Bilan1(
            $row['idBil1'],
            $row['notentBil1'],
            $row['notdossBil1'],
            $row['notorBil1'],
            $row['moyBil1'],
            $row['remarqueBil1'],
            $row['datevisiteBil1']
        );
    }

    // Méthode pour mettre à jour un Bilan1 existant
    public function update(Bilan1 $bilan): void {
        $sql = "UPDATE Bilan1 
                SET notentBil1 = ?, notdossBil1 = ?, notorBil1 = ?, moyBil1 = ?, remarqueBil1 = ?, datevisiteBil1 = ? 
                WHERE idBil1 = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $bilan->getNotentBil(),
            $bilan->getNotdossBil(),
            $bilan->getNotorBil(),
            $bilan->getMoyBil(),
            $bilan->getRemarqueBil(),
            $bilan->getDatevisiteBil(),
            $bilan->getIdBil()
        ]);
    }

    // Méthode pour supprimer un Bilan1 par ID
    public function delete(int $idBil): void {
        $sql = "DELETE FROM Bilan1 WHERE idBil1 = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idBil]);
    }

    // Méthode pour récupérer tous les Bilan1
    public function getAll(): array {
        $sql = "SELECT * FROM Bilan1";
        $result = $this->db->query($sql);
        $bilansData = $result->fetchAll(PDO::FETCH_ASSOC);

        $bilans = [];
        foreach ($bilansData as $row) {
            $bilans[] = new Bilan1(
                $row['idBil1'],
                $row['notentBil1'],
                $row['notdossBil1'],
                $row['notorBil1'],
                $row['moyBil1'],
                $row['remarqueBil1'],
                $row['datevisiteBil1']
            );
        }

        return $bilans;
    }
}


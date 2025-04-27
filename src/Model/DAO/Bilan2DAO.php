<?php

namespace DAO;
require_once __DIR__ . "/../BO/Bilan2.php";

use BO\Bilan2;
use PDO;

class Bilan2DAO {

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Méthode pour créer un Bilan2
    public function create(Bilan2 $bilan): void {
        $sql = "INSERT INTO Bilan2 (idBil2, notdossBil2, notorBil2, moyBil2, remarqueBil2, sujmemBil2, datevisiteBil2) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $bilan->getIdBil(),
            $bilan->getNotdossBil(),
            $bilan->getNotorBil(),
            $bilan->getMoyBil(),
            $bilan->getRemarqueBil(),
            $bilan->getSujmemBil2(),
            $bilan->getDatevisiteBil()
        ]);
    }

    // Méthode pour récupérer un Bilan2 par ID
    public function getById(int $idBil): ?Bilan2 {
        $sql = "SELECT * FROM Bilan2 WHERE idBil2 = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idBil]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Bilan2(
            $row['idBil2'],
            $row['notdossBil2'],
            $row['notorBil2'],
            $row['moyBil2'],
            $row['remarqueBil2'],
            $row['sujmemBil2'],
            $row['datevisiteBil2']
        );
    }

    // Méthode pour mettre à jour un Bilan2 existant
    public function update(Bilan2 $bilan): void {
        $sql = "UPDATE Bilan2 
                SET notdossBil2 = ?, notorBil2 = ?, moyBil2 = ?, remarqueBil2 = ?, sujmemBil2 = ?, datevisiteBil2 = ? 
                WHERE idBil2 = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $bilan->getNotdossBil(),
            $bilan->getNotorBil(),
            $bilan->getMoyBil(),
            $bilan->getRemarqueBil(),
            $bilan->getSujmemBil2(),
            $bilan->getDatevisiteBil(),
            $bilan->getIdBil()
        ]);
    }

    // Méthode pour supprimer un Bilan2 par ID
    public function delete(int $idBil): void {
        $sql = "DELETE FROM Bilan2 WHERE idBil2 = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idBil]);
    }

    // Méthode pour récupérer tous les Bilan2
    public function getAll(): array {
        $sql = "SELECT * FROM Bilan2";
        $result = $this->db->query($sql);
        $bilansData = $result->fetchAll(PDO::FETCH_ASSOC);

        $bilans = [];
        foreach ($bilansData as $row) {
            $bilans[] = new Bilan2(
                $row['idBil2'],
                $row['notdossBil2'],
                $row['notorBil2'],
                $row['moyBil2'],
                $row['remarqueBil2'],
                $row['sujmemBil2'],
                $row['datevisiteBil2']
            );
        }

        return $bilans;
    }
}

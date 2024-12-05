<?php

namespace DAO;

use BO\Alerte;
use PDO;

class AlerteDAO {

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Méthode pour créer une alerte
    public function create(Alerte $alerte): void {
        $sql = "INSERT INTO Alerte (idAl, datelimbil1Al, datelimbil2Al) VALUES (?,?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $alerte->getIdAl(),
            $alerte->getDatelimbil1Al(),
            $alerte->getDatelimbil2Al()
        ]);
    }

    // Méthode pour récupérer une alerte par ID
    public function getById(int $idAl): ?Alerte {
        $sql = "SELECT * FROM Alerte WHERE idAl = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idAl]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Alerte(
            $row['idAl'],
            $row['datelimbil1Al'],
            $row['datelimbil2Al']
        );
    }

    // Méthode pour mettre à jour une alerte existante
    public function update(Alerte $alerte): void {
        $sql = "UPDATE Alerte SET datelimbil1Al = ?, datelimbil2Al = ? WHERE idAl = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $alerte->getDatelimbil1Al(),
            $alerte->getDatelimbil2Al(),
            $alerte->getIdAl()
        ]);
    }

    // Méthode pour supprimer une alerte par ID
    public function delete(int $idAl): void {
        $sql = "DELETE FROM Alerte WHERE idAl = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idAl]);
    }

    // Méthode pour récupérer toutes les alertes
    public function getAll(): array {
        $sql = "SELECT * FROM Alerte";
        $result = $this->db->query($sql);
        $alertesData = $result->fetchAll(PDO::FETCH_ASSOC);

        $alertes = [];
        foreach ($alertesData as $row) {
            $alertes[] = new Alerte(
                $row['idAl'],
                $row['datelimbil1Al'],
                $row['datelimbil2Al']
            );
        }

        return $alertes;
    }
}

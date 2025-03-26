<?php

namespace DAO;

use BO\Specialite;
use PDO;

class SpecialiteDAO {

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Méthode pour créer une spécialité
    public function create(Specialite $specialite): void {
        $sql = "INSERT INTO Specialite (nomSpe) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$specialite->getNomSpe()]);
    }

    // Méthode pour récupérer une spécialité par ID
    public function getById(int $idSpe): ?Specialite {
        $sql = "SELECT * FROM Specialite WHERE idSpe = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idSpe]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Specialite(
            $row['idSpe'],
            $row['nomSpe']
        );
    }

    // Méthode pour mettre à jour une spécialité existante
    public function update(Specialite $specialite): void {
        $sql = "UPDATE Specialite SET nomSpe = ? WHERE idSpe = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $specialite->getNomSpe(),
            $specialite->getIdSpe()
        ]);
    }

    // Méthode pour supprimer une spécialité par ID
    public function delete(int $idSpe): void {
        $sql = "DELETE FROM Specialite WHERE idSpe = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idSpe]);
    }

    // Méthode pour récupérer toutes les spécialités
    public function getAll(): array {
        $sql = "SELECT * FROM Specialite";
        $result = $this->db->query($sql);
        $specialitesData = $result->fetchAll(PDO::FETCH_ASSOC);

        $specialites = [];
        foreach ($specialitesData as $row) {
            $specialites[] = new Specialite(
                $row['idSpe'],
                $row['nomSpe']
            );
        }

        return $specialites;
    }
}

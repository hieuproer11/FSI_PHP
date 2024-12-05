<?php

namespace DAO;

use BO\Entreprise;
use PDO;

class EntrepriseDAO {

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Méthode pour créer une entreprise
    public function create(Entreprise $entreprise): void {
        $sql = "INSERT INTO Entreprise (idEnt, nomEnt, adrEnt, vilEnt, cpEnt) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $entreprise->getIdEnt(),
            $entreprise->getNomEnt(),
            $entreprise->getAdrEnt(),
            $entreprise->getVilEnt(),
            $entreprise->getCpEnt()
        ]);
    }

    // Méthode pour récupérer une entreprise par ID
    public function getById(int $idEnt): ?Entreprise {
        $sql = "SELECT * FROM Entreprise WHERE idEnt = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idEnt]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Entreprise(
            $row['idEnt'],
            $row['nomEnt'],
            $row['adrEnt'],
            $row['vilEnt'],
            $row['cpEnt']
        );
    }

    // Méthode pour mettre à jour une entreprise existante
    public function update(Entreprise $entreprise): void {
        $sql = "UPDATE Entreprise SET nomEnt = ?, adrEnt = ?, vilEnt = ?, cpEnt = ? WHERE idEnt = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $entreprise->getNomEnt(),
            $entreprise->getAdrEnt(),
            $entreprise->getVilEnt(),
            $entreprise->getCpEnt(),
            $entreprise->getIdEnt()
        ]);
    }

    // Méthode pour supprimer une entreprise par ID
    public function delete(int $idEnt): void {
        $sql = "DELETE FROM Entreprise WHERE idEnt = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idEnt]);
    }

    // Méthode pour récupérer toutes les entreprises
    public function getAll(): array {
        $sql = "SELECT * FROM Entreprise";
        $result = $this->db->query($sql);
        $entreprisesData = $result->fetchAll(PDO::FETCH_ASSOC);

        $entreprises = [];
        foreach ($entreprisesData as $row) {
            $entreprises[] = new Entreprise(
                $row['idEnt'],
                $row['nomEnt'],
                $row['adrEnt'],
                $row['vilEnt'],
                $row['cpEnt']
            );
        }

        return $entreprises;
    }
}

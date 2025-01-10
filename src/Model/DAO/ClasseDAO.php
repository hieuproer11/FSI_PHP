<?php

namespace DAO;

use BO\Classe;
use PDO;

class ClasseDAO {

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Méthode pour créer une classe
    public function create(Classe $classe): void {
        $sql = "INSERT INTO Classe (idCla, nomCla) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $classe->getIdCla(),
            $classe->getNomCla()
        ]);
    }

    // Méthode pour récupérer une classe par ID
    public function getById(int $idCla): ?Classe {
        $sql = "SELECT * FROM Classe WHERE idCla = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idCla]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Classe(
            $row['idCla'],
            $row['nomCla']
        );
    }

    // Méthode pour mettre à jour une classe existante
    public function update(Classe $classe): void {
        $sql = "UPDATE Classe SET nomCla = ? WHERE idCla = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $classe->getNomCla(),
            $classe->getIdCla()
        ]);
    }

    // Méthode pour supprimer une classe par ID
    public function delete(int $idCla): void {
        $sql = "DELETE FROM Classe WHERE idCla = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idCla]);
    }

    // Méthode pour récupérer toutes les classes
    public function getAll(): array {
        $sql = "SELECT * FROM Classe";
        $result = $this->db->query($sql);
        $classesData = $result->fetchAll(PDO::FETCH_ASSOC);

        $classes = [];
        foreach ($classesData as $row) {
            $classes[] = new Classe(
                $row['idCla'],
                $row['nomCla']
            );
        }

        return $classes;
    }
}

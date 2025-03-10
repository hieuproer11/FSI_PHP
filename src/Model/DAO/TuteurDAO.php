<?php

namespace DAO;

use BO\Tuteur;
use PDO;

class TuteurDAO {

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Méthode pour créer un tuteur
    public function create(Tuteur $tuteur): void {
        $sql = "INSERT INTO Tuteur (preTut, nomTut, telTut, mailTut) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $tuteur->getPreTut(),
            $tuteur->getNomTut(),
            $tuteur->getTelTut(),
            $tuteur->getMailTut()
        ]);
    }

    // Méthode pour récupérer un tuteur par ID
    public function getById(int $idTut): ?Tuteur {
        $sql = "SELECT * FROM Tuteur WHERE idTut = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idTut]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Tuteur(
            $row['idTut'],
            $row['preTut'],
            $row['nomTut'],
            $row['telTut'],
            $row['mailTut']
        );
    }

    // Méthode pour mettre à jour un tuteur existant
    public function update(Tuteur $tuteur): void {
        $sql = "UPDATE Tuteur SET preTut = ?, nomTut = ?, telTut = ?, mailTut = ? WHERE idTut = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $tuteur->getPreTut(),
            $tuteur->getNomTut(),
            $tuteur->getTelTut(),
            $tuteur->getMailTut(),
            $tuteur->getIdTut()
        ]);
    }

    // Méthode pour supprimer un tuteur par ID
    public function delete(int $idTut): void {
        $sql = "DELETE FROM Tuteur WHERE idTut = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idTut]);
    }

    // Méthode pour récupérer tous les tuteurs
    public function getAll(): array {
        $sql = "SELECT * FROM Tuteur";
        $result = $this->db->query($sql);
        $tuteursData = $result->fetchAll(PDO::FETCH_ASSOC);

        $tuteurs = [];
        foreach ($tuteursData as $row) {
            $tuteurs[] = new Tuteur(
                $row['idTut'],
                $row['preTut'],
                $row['nomTut'],
                $row['telTut'],
                $row['mailTut']
            );
        }

        return $tuteurs;
    }
}

<?php

namespace DAO;

use BO\Realisation1;
use PDO;

class Realisation1DAO {

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function create(Realisation1 $realisation1): void {
        try {
            $sql = "INSERT INTO Realiser1 (idUti, idBil1)
                    VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $realisation1->getIdUti(),
                $realisation1->getIdBil1()
            ]);
        } catch (\PDOException $e) {
            die("Erreur lors de l'insertion de la réalisation : " . $e->getMessage());
        }
    }
}
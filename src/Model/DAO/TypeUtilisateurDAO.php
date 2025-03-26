<?php

namespace DAO;

use BO\TypeUtilisateur;
use PDO;

class TypeUtilisateurDAO {

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Méthode pour créer un type d'utilisateur
    public function create(TypeUtilisateur $typeUtilisateur): void {
        $sql = "INSERT INTO Type_d_utilisateur (typeutiTypeuti) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$typeUtilisateur->getTypeutiTypeuti()]);
    }

    // Méthode pour récupérer un type d'utilisateur par ID
    public function getById(int $idTypeuti): ?TypeUtilisateur {
        $sql = "SELECT * FROM Type_d_utilisateur WHERE idTypeuti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idTypeuti]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new TypeUtilisateur(
            $row['idTypeuti'],
            $row['typeutiTypeuti']
        );
    }

    // Méthode pour mettre à jour un type d'utilisateur existant
    public function update(TypeUtilisateur $typeUtilisateur): void {
        $sql = "UPDATE Type_d_utilisateur SET typeutiTypeuti = ? WHERE idTypeuti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $typeUtilisateur->getTypeutiTypeuti(),
            $typeUtilisateur->getIdTypeuti()
        ]);
    }

    // Méthode pour supprimer un type d'utilisateur par ID
    public function delete(int $idTypeuti): void {
        $sql = "DELETE FROM Type_d_utilisateur WHERE idTypeuti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idTypeuti]);
    }

    // Méthode pour récupérer tous les types d'utilisateur
    public function getAll(): array {
        $sql = "SELECT * FROM Type_d_utilisateur";
        $result = $this->db->query($sql);
        $typeUtilisateursData = $result->fetchAll(PDO::FETCH_ASSOC);

        $typeUtilisateurs = [];
        foreach ($typeUtilisateursData as $row) {
            $typeUtilisateurs[] = new TypeUtilisateur(
                $row['idTypeuti'],
                $row['typeutiTypeuti']
            );
        }

        return $typeUtilisateurs;
    }
}

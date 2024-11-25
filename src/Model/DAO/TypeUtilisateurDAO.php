<?php

require_once 'TypeUtilisateur.php';

class TypeUtilisateurDAO {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function addTypeUtilisateur(TypeUtilisateur $type): void {
        $sql = "INSERT INTO TypeUtilisateur (typeuti_typeuti) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$type->getTypeutiTypeuti()]);
    }

    public function getTypeUtilisateur(int $idtypeuti): ?TypeUtilisateur {
        $sql = "SELECT * FROM TypeUtilisateur WHERE idtypeuti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idtypeuti]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new TypeUtilisateur($row['idtypeuti'], $row['typeuti_typeuti']);
    }

    public function updateTypeUtilisateur(TypeUtilisateur $type): void {
        $sql = "UPDATE TypeUtilisateur SET typeuti_typeuti = ? WHERE idtypeuti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$type->getTypeutiTypeuti(), $type->getIdtypeuti()]);
    }

    public function deleteTypeUtilisateur(int $idtypeuti): void {
        $sql = "DELETE FROM TypeUtilisateur WHERE idtypeuti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idtypeuti]);
    }

    public function getAllTypesUtilisateur(): array {
        $sql = "SELECT * FROM TypeUtilisateur";
        $resultat = $this->db->query($sql);
        $rows = $resultat->fetchAll(PDO::FETCH_ASSOC);

        $types = [];
        foreach ($rows as $row) {
            $types[] = new TypeUtilisateur($row['idtypeuti'], $row['typeuti_typeuti']);
        }

        return $types;
    }
}

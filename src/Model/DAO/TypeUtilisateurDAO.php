<?php
<<<<<<< Updated upstream
namespace DAO;
use TypeUtilisateur;

class TypeUtilisateurDAO {
    private \PDO $db;

    public function __construct(\PDO $db) {
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
        $rows = $resultat->fetchAll(\PDO::FETCH_ASSOC);

        $types = [];
        foreach ($rows as $row) {
            $types[] = new TypeUtilisateur($row['idtypeuti'], $row['typeuti_typeuti']);
        }

        return $types;
=======

namespace DAO;

class TypeUtilisateurDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($typeUtilisateur) {
        $query = "INSERT INTO Type_d_utilisateur (typeutiTypeuti) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $typeUtilisateur->getTypeutiTypeuti());
        return $stmt->execute();
    }

    public function read($idTypeuti) {
        $query = "SELECT * FROM Type_d_utilisateur WHERE idTypeuti = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idTypeuti);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new TypeUtilisateur($row['idTypeuti'], $row['typeutiTypeuti']);
        }
        return null;
    }

    public function update($typeUtilisateur) {
        $query = "UPDATE Type_d_utilisateur SET typeutiTypeuti = ? WHERE idTypeuti = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $typeUtilisateur->getTypeutiTypeuti(), $typeUtilisateur->getIdTypeuti());
        return $stmt->execute();
    }

    public function delete($idTypeuti) {
        $query = "DELETE FROM Type_d_utilisateur WHERE idTypeuti = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idTypeuti);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Type_d_utilisateur";
        $result = $this->conn->query($query);
        $typeUtilisateurList = [];
        while ($row = $result->fetch_assoc()) {
            $typeUtilisateurList[] = new TypeUtilisateur($row['idTypeuti'], $row['typeutiTypeuti']);
        }
        return $typeUtilisateurList;
>>>>>>> Stashed changes
    }
}

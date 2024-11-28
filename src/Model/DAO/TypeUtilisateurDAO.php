<?php

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
    }
}

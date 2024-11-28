<?php

namespace DAO;

class SpecialiteDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($specialite) {
        $query = "INSERT INTO Specialite (nomSpe) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $specialite->getNomSpe());
        return $stmt->execute();
    }

    public function read($idSpe) {
        $query = "SELECT * FROM Specialite WHERE idSpe = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idSpe);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Specialite($row['idSpe'], $row['nomSpe']);
        }
        return null;
    }

    public function update($specialite) {
        $query = "UPDATE Specialite SET nomSpe = ? WHERE idSpe = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $specialite->getNomSpe(), $specialite->getIdSpe());
        return $stmt->execute();
    }

    public function delete($idSpe) {
        $query = "DELETE FROM Specialite WHERE idSpe = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idSpe);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Specialite";
        $result = $this->conn->query($query);
        $specialiteList = [];
        while ($row = $result->fetch_assoc()) {
            $specialiteList[] = new Specialite($row['idSpe'], $row['nomSpe']);
        }
        return $specialiteList;
    }
}
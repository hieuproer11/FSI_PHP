<?php

namespace DAO;

class Realiser2DAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($realiser2) {
        $query = "INSERT INTO Realiser2 (idUti, idBil2) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $realiser2->getIdUti(), $realiser2->getIdBil2());
        return $stmt->execute();
    }

    public function read($idUti, $idBil2) {
        $query = "SELECT * FROM Realiser2 WHERE idUti = ? AND idBil2 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $idUti, $idBil2);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Realiser2($row['idUti'], $row['idBil2']);
        }
        return null;
    }

    public function update($realiser2) {
        $query = "UPDATE Realiser2 SET idBil2 = ? WHERE idUti = ? AND idBil2 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iii", $realiser2->getIdBil2(), $realiser2->getIdUti(), $realiser2->getIdBil2());
        return $stmt->execute();
    }

    public function delete($idUti, $idBil2) {
        $query = "DELETE FROM Realiser2 WHERE idUti = ? AND idBil2 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $idUti, $idBil2);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Realiser2";
        $result = $this->conn->query($query);
        $realiser2List = [];
        while ($row = $result->fetch_assoc()) {
            $realiser2List[] = new Realiser2($row['idUti'], $row['idBil2']);
        }
        return $realiser2List;
    }
}

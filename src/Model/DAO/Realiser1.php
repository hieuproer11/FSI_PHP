<?php

namespace DAO;

class Realiser1DAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($realiser1) {
        $query = "INSERT INTO Realiser1 (idUti, idBil1) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $realiser1->getIdUti(), $realiser1->getIdBil1());
        return $stmt->execute();
    }

    public function read($idUti, $idBil1) {
        $query = "SELECT * FROM Realiser1 WHERE idUti = ? AND idBil1 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $idUti, $idBil1);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Realiser1($row['idUti'], $row['idBil1']);
        }
        return null;
    }

    public function update($realiser1) {
        $query = "UPDATE Realiser1 SET idBil1 = ? WHERE idUti = ? AND idBil1 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iii", $realiser1->getIdBil1(), $realiser1->getIdUti(), $realiser1->getIdBil1());
        return $stmt->execute();
    }

    public function delete($idUti, $idBil1) {
        $query = "DELETE FROM Realiser1 WHERE idUti = ? AND idBil1 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $idUti, $idBil1);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Realiser1";
        $result = $this->conn->query($query);
        $realiser1List = [];
        while ($row = $result->fetch_assoc()) {
            $realiser1List[] = new Realiser1($row['idUti'], $row['idBil1']);
        }
        return $realiser1List;
    }
}

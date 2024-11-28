<?php

namespace DAO;

class GererDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($gerer) {
        $query = "INSERT INTO Gerer (idCla, idTut, nbmaxetuTut) 
                  VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "iii",
            $gerer->getIdCla(),
            $gerer->getIdTut(),
            $gerer->getNbmaxetuTut()
        );
        return $stmt->execute();
    }

    public function read($idCla, $idTut) {
        $query = "SELECT * FROM Gerer WHERE idCla = ? AND idTut = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $idCla, $idTut);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Gerer(
                $row['idCla'],
                $row['idTut'],
                $row['nbmaxetuTut']
            );
        }
        return null;
    }

    public function update($gerer) {
        $query = "UPDATE Gerer SET nbmaxetuTut = ? WHERE idCla = ? AND idTut = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "iii",
            $gerer->getNbmaxetuTut(),
            $gerer->getIdCla(),
            $gerer->getIdTut()
        );
        return $stmt->execute();
    }

    public function delete($idCla, $idTut) {
        $query = "DELETE FROM Gerer WHERE idCla = ? AND idTut = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $idCla, $idTut);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Gerer";
        $result = $this->conn->query($query);
        $gererRecords = [];
        while ($row = $result->fetch_assoc()) {
            $gererRecords[] = new Gerer(
                $row['idCla'],
                $row['idTut'],
                $row['nbmaxetuTut']
            );
        }
        return $gererRecords;
    }
}

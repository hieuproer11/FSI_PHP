<?php

namespace DAO;

class Bilan2DAO implements BilanDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($bilan) {
        $query = "INSERT INTO Bilan2 (idBil2, notdossBil2, notorBil2, moyBil2, remarqueBil2, sujmemBil2, datevisiteBil2) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "iddddsss",
            $bilan->getIdBil(),
            $bilan->getNotdossBil(),
            $bilan->getNotorBil(),
            $bilan->getMoyBil(),
            $bilan->getRemarqueBil(),
            $bilan->getSujmemBil2(),
            $bilan->getDatevisiteBil()
        );
        return $stmt->execute();
    }

    public function read($idBil) {
        $query = "SELECT * FROM Bilan2 WHERE idBil2 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idBil);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Bilan2(
                $row['idBil2'],
                $row['notdossBil2'],
                $row['notorBil2'],
                $row['moyBil2'],
                $row['remarqueBil2'],
                $row['sujmemBil2'],
                $row['datevisiteBil2']
            );
        }
        return null;
    }

    public function update($bilan) {
        $query = "UPDATE Bilan2 SET 
                  notdossBil2 = ?, 
                  notorBil2 = ?, 
                  moyBil2 = ?, 
                  remarqueBil2 = ?, 
                  sujmemBil2 = ?, 
                  datevisiteBil2 = ? 
                  WHERE idBil2 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "dddddsi",
            $bilan->getNotdossBil(),
            $bilan->getNotorBil(),
            $bilan->getMoyBil(),
            $bilan->getRemarqueBil(),
            $bilan->getSujmemBil2(),
            $bilan->getDatevisiteBil(),
            $bilan->getIdBil()
        );
        return $stmt->execute();
    }

    public function delete($idBil) {
        $query = "DELETE FROM Bilan2 WHERE idBil2 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idBil);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Bilan2";
        $result = $this->conn->query($query);
        $bilans = [];
        while ($row = $result->fetch_assoc()) {
            $bilans[] = new Bilan2(
                $row['idBil2'],
                $row['notdossBil2'],
                $row['notorBil2'],
                $row['moyBil2'],
                $row['remarqueBil2'],
                $row['sujmemBil2'],
                $row['datevisiteBil2']
            );
        }
        return $bilans;
    }
}

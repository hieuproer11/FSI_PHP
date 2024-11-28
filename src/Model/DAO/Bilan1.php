<?php

namespace DAO;

class Bilan1DAO implements BilanDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($bilan) {
        $query = "INSERT INTO Bilan1 (idBil1, notentBil1, notdossBil1, notorBil1, moyBil1, remarqueBil1, datevisiteBil1) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "iddddsss",
            $bilan->getIdBil(),
            $bilan->getNotentBil(),
            $bilan->getNotdossBil(),
            $bilan->getNotorBil(),
            $bilan->getMoyBil(),
            $bilan->getRemarqueBil(),
            $bilan->getDatevisiteBil()
        );
        return $stmt->execute();
    }

    public function read($idBil) {
        $query = "SELECT * FROM Bilan1 WHERE idBil1 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idBil);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Bilan1(
                $row['idBil1'],
                $row['notentBil1'],
                $row['notdossBil1'],
                $row['notorBil1'],
                $row['moyBil1'],
                $row['remarqueBil1'],
                $row['datevisiteBil1']
            );
        }
        return null;
    }

    public function update($bilan) {
        $query = "UPDATE Bilan1 SET 
                  notentBil1 = ?, 
                  notdossBil1 = ?, 
                  notorBil1 = ?, 
                  moyBil1 = ?, 
                  remarqueBil1 = ?, 
                  datevisiteBil1 = ? 
                  WHERE idBil1 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "dddddsi",
            $bilan->getNotentBil(),
            $bilan->getNotdossBil(),
            $bilan->getNotorBil(),
            $bilan->getMoyBil(),
            $bilan->getRemarqueBil(),
            $bilan->getDatevisiteBil(),
            $bilan->getIdBil()
        );
        return $stmt->execute();
    }

    public function delete($idBil) {
        $query = "DELETE FROM Bilan1 WHERE idBil1 = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idBil);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Bilan1";
        $result = $this->conn->query($query);
        $bilans = [];
        while ($row = $result->fetch_assoc()) {
            $bilans[] = new Bilan1(
                $row['idBil1'],
                $row['notentBil1'],
                $row['notdossBil1'],
                $row['notorBil1'],
                $row['moyBil1'],
                $row['remarqueBil1'],
                $row['datevisiteBil1']
            );
        }
        return $bilans;
    }
}

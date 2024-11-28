<?php

namespace DAO;

use BO\Bilan1;

class Bilan1DAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($bilan) {
        $query = "INSERT INTO Bilan1 (idBil1, notentBil1, notdossBil1, notorBil1, moyBil1, remarqueBil1, datevisiteBil1) 
                  VALUES (:idBil, :notentBil, :notdossBil, :notorBil, :moyBil, :remarqueBil, :datevisiteBil)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idBil', $bilan->getIdBil(), \PDO::PARAM_INT);
        $stmt->bindValue(':notentBil', $bilan->getNotentBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':notdossBil', $bilan->getNotdossBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':notorBil', $bilan->getNotorBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':moyBil', $bilan->getMoyBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':remarqueBil', $bilan->getRemarqueBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':datevisiteBil', $bilan->getDatevisiteBil(), \PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function read($idBil) {
        $query = "SELECT * FROM Bilan1 WHERE idBil1 = :idBil";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idBil', $idBil, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
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
                  notentBil1 = :notentBil, 
                  notdossBil1 = :notdossBil, 
                  notorBil1 = :notorBil, 
                  moyBil1 = :moyBil, 
                  remarqueBil1 = :remarqueBil, 
                  datevisiteBil1 = :datevisiteBil 
                  WHERE idBil1 = :idBil";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':notentBil', $bilan->getNotentBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':notdossBil', $bilan->getNotdossBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':notorBil', $bilan->getNotorBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':moyBil', $bilan->getMoyBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':remarqueBil', $bilan->getRemarqueBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':datevisiteBil', $bilan->getDatevisiteBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':idBil', $bilan->getIdBil(), \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($idBil) {
        $query = "DELETE FROM Bilan1 WHERE idBil1 = :idBil";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idBil', $idBil, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Bilan1";
        $stmt = $this->conn->query($query);
        $bilans = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
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

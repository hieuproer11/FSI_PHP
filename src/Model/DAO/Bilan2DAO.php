<?php

namespace DAO;

use BO\Bilan2;

class Bilan2DAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($bilan) {
        $query = "INSERT INTO Bilan2 (idBil2, notdossBil2, notorBil2, moyBil2, remarqueBil2, sujmemBil2, datevisiteBil2) 
                  VALUES (:idBil, :notdossBil, :notorBil, :moyBil, :remarqueBil, :sujmemBil, :datevisiteBil)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idBil', $bilan->getIdBil(), \PDO::PARAM_INT);
        $stmt->bindValue(':notdossBil', $bilan->getNotdossBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':notorBil', $bilan->getNotorBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':moyBil', $bilan->getMoyBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':remarqueBil', $bilan->getRemarqueBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':sujmemBil', $bilan->getSujmemBil2(), \PDO::PARAM_STR);
        $stmt->bindValue(':datevisiteBil', $bilan->getDatevisiteBil(), \PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function read($idBil) {
        $query = "SELECT * FROM Bilan2 WHERE idBil2 = :idBil";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idBil', $idBil, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
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
                  notdossBil2 = :notdossBil, 
                  notorBil2 = :notorBil, 
                  moyBil2 = :moyBil, 
                  remarqueBil2 = :remarqueBil, 
                  sujmemBil2 = :sujmemBil, 
                  datevisiteBil2 = :datevisiteBil 
                  WHERE idBil2 = :idBil";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':notdossBil', $bilan->getNotdossBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':notorBil', $bilan->getNotorBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':moyBil', $bilan->getMoyBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':remarqueBil', $bilan->getRemarqueBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':sujmemBil', $bilan->getSujmemBil2(), \PDO::PARAM_STR);
        $stmt->bindValue(':datevisiteBil', $bilan->getDatevisiteBil(), \PDO::PARAM_STR);
        $stmt->bindValue(':idBil', $bilan->getIdBil(), \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($idBil) {
        $query = "DELETE FROM Bilan2 WHERE idBil2 = :idBil";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idBil', $idBil, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Bilan2";
        $stmt = $this->conn->query($query);
        $bilans = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
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

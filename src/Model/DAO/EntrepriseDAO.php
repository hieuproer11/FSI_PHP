<?php
namespace DAO;

use BO\Entreprise;

class EntrepriseDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($entreprise) {
        $query = "INSERT INTO Entreprise (idEnt, nomEnt, adrEnt, vilEnt, cpEnt) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idEnt', $entreprise->getIdEnt(), \PDO::PARAM_INT);
        $stmt->bindValue(':nomEnt', $entreprise->getNomEnt(), \PDO::PARAM_STR);
        $stmt->bindValue(':adrEnt', $entreprise->getAdrEnt(), \PDO::PARAM_STR);
        $stmt->bindValue(':vilEnt', $entreprise->getVilEnt(), \PDO::PARAM_STR);
        $stmt->bindValue(':cpEnt', $entreprise->getCpEnt(), \PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function read($id) {
        $query = "SELECT * FROM Entreprise WHERE idEnt = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idEnt', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return new Entreprise($row['idEnt'], $row['nomEnt'], $row['adrEnt'], $row['vilEnt'], $row['cpEnt']);
        }
        return null;
    }

    public function update($entreprise) {
        $query = "UPDATE Entreprise SET nomEnt = ?, adrEnt = ?, vilEnt = ?, cpEnt = ? WHERE idEnt = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nomEnt', $entreprise->getNomEnt(), \PDO::PARAM_STR);
        $stmt->bindValue(':adrEnt', $entreprise->getAdrEnt(), \PDO::PARAM_STR);
        $stmt->bindValue(':vilEnt', $entreprise->getVilEnt(), \PDO::PARAM_STR);
        $stmt->bindValue(':cpEnt', $entreprise->getCpEnt(), \PDO::PARAM_STR);
        $stmt->bindValue(':idEnt', $entreprise->getIdEnt(), \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Entreprise WHERE idEnt = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idEnt', $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Entreprise";
        $stmt = $this->conn->query($query);
        $entreprises = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $entreprises[] = new Entreprise($row['idEnt'], $row['nomEnt'], $row['adrEnt'], $row['vilEnt'], $row['cpEnt']);
        }
        return $entreprises;
    }
}
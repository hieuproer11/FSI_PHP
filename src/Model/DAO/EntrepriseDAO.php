<?php
namespace DAO;

class EntrepriseDAO  {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($entreprise) {
        $query = "INSERT INTO Entreprise (idEnt, nomEnt, adrEnt, vilEnt, cpEnt) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("issss", $entreprise->getIdEnt(), $entreprise->getNomEnt(), $entreprise->getAdrEnt(), $entreprise->getVilEnt(), $entreprise->getCpEnt());
        return $stmt->execute();
    }

    public function read($id) {
        $query = "SELECT * FROM Entreprise WHERE idEnt = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Entreprise($row['idEnt'], $row['nomEnt'], $row['adrEnt'], $row['vilEnt'], $row['cpEnt']);
        }
        return null;
    }

    public function update($entreprise) {
        $query = "UPDATE Entreprise SET nomEnt = ?, adrEnt = ?, vilEnt = ?, cpEnt = ? WHERE idEnt = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $entreprise->getNomEnt(), $entreprise->getAdrEnt(), $entreprise->getVilEnt(), $entreprise->getCpEnt(), $entreprise->getIdEnt());
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Entreprise WHERE idEnt = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Entreprise";
        $result = $this->conn->query($query);
        $entreprises = [];
        while ($row = $result->fetch_assoc()) {
            $entreprises[] = new Entreprise($row['idEnt'], $row['nomEnt'], $row['adrEnt'], $row['vilEnt'], $row['cpEnt']);
        }
        return $entreprises;
    }
}

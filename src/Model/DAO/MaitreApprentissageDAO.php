<?php

namespace DAO;

class MaitreApprentissageDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($maitreApprentissage) {
        $query = "INSERT INTO Maitre_d_apprentissage (idMaitapp, nomMaitapp, preMaitapp, mailMaitapp, telMaitapp, idEnt) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "sssssi",
            $maitreApprentissage->getIdMaitapp(),
            $maitreApprentissage->getNomMaitapp(),
            $maitreApprentissage->getPreMaitapp(),
            $maitreApprentissage->getMailMaitapp(),
            $maitreApprentissage->getTelMaitapp(),
            $maitreApprentissage->getIdEnt()
        );
        return $stmt->execute();
    }

    public function read($id) {
        $query = "SELECT * FROM Maitre_d_apprentissage WHERE idMaitapp = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new MaitreApprentissage(
                $row['idMaitapp'],
                $row['nomMaitapp'],
                $row['preMaitapp'],
                $row['mailMaitapp'],
                $row['telMaitapp'],
                $row['idEnt']
            );
        }
        return null;
    }

    public function update($maitreApprentissage) {
        $query = "UPDATE Maitre_d_apprentissage SET 
                  nomMaitapp = ?, preMaitapp = ?, mailMaitapp = ?, telMaitapp = ?, idEnt = ? 
                  WHERE idMaitapp = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "ssssii",
            $maitreApprentissage->getNomMaitapp(),
            $maitreApprentissage->getPreMaitapp(),
            $maitreApprentissage->getMailMaitapp(),
            $maitreApprentissage->getTelMaitapp(),
            $maitreApprentissage->getIdEnt(),
            $maitreApprentissage->getIdMaitapp()
        );
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Maitre_d_apprentissage WHERE idMaitapp = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Maitre_d_apprentissage";
        $result = $this->conn->query($query);
        $maitresApprentissage = [];
        while ($row = $result->fetch_assoc()) {
            $maitresApprentissage[] = new MaitreApprentissage(
                $row['idMaitapp'],
                $row['nomMaitapp'],
                $row['preMaitapp'],
                $row['mailMaitapp'],
                $row['telMaitapp'],
                $row['idEnt']
            );
        }
        return $maitresApprentissage;
    }
}


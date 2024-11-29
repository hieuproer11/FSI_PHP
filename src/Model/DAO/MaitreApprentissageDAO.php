<?php

namespace DAO;

use BO\Entreprise;

class MaitreApprentissageDAO {
    private $conn;
    private Entreprise $idEnt;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($maitreApprentissage) {

        $query = "INSERT INTO MaitreApprentissage (idMaitapp, nomMaitapp, preMaitapp, mailMaitapp, telMaitapp, idEnt) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idMaitapp', $maitreApprentissage->getIdMaitapp(), \PDO::PARAM_INT);
        $stmt->bindValue(':nomMaitapp', $maitreApprentissage->getNomMaitapp(), \PDO::PARAM_STR);
        $stmt->bindValue(':preMaitapp', $maitreApprentissage->getPreMaitapp(), \PDO::PARAM_STR);
        $stmt->bindValue(':mailMaitapp', $maitreApprentissage->getMailMaitapp(), \PDO::PARAM_STR);
        $stmt->bindValue(':telMaitapp', $maitreApprentissage->getTelMaitapp(), \PDO::PARAM_STR);
        $stmt->bindValue(':idEnt', $maitreApprentissage->getIdEnt(), \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function read($id) {
        $query = "SELECT * FROM MaitreApprentissage WHERE idMaitapp = ?";
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
        $query = "UPDATE MaitreApprentissage SET 
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
        $query = "DELETE FROM MaitreApprentissage WHERE idMaitapp = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM MaitreApprentissage";
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
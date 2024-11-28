<?php

namespace DAO;

class UtilisateurDAO  {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($utilisateur) {
        $query = "INSERT INTO Utilisateur (idUti, nomUti, preUti, mailUti, altUti, telUti, adrUti, cpUti, vilUti, logUti, mdpUti, idTut, idSpe, idTypeuti, idMaitapp, idEnt, idCla) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "isssssssssssiiiii",
            $utilisateur->getIdUti(),
            $utilisateur->getNomUti(),
            $utilisateur->getPreUti(),
            $utilisateur->getMailUti(),
            $utilisateur->getAltUti(),
            $utilisateur->getTelUti(),
            $utilisateur->getAdrUti(),
            $utilisateur->getCpUti(),
            $utilisateur->getVilUti(),
            $utilisateur->getLogUti(),
            $utilisateur->getMdpUti(),
            $utilisateur->getIdTut(),
            $utilisateur->getIdSpe(),
            $utilisateur->getIdTypeuti(),
            $utilisateur->getIdMaitapp(),
            $utilisateur->getIdEnt(),
            $utilisateur->getIdCla()
        );
        return $stmt->execute();
    }

    public function read($id) {
        $query = "SELECT * FROM Utilisateur WHERE idUti = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Utilisateur(
                $row['idUti'],
                $row['nomUti'],
                $row['preUti'],
                $row['mailUti'],
                $row['altUti'],
                $row['telUti'],
                $row['adrUti'],
                $row['cpUti'],
                $row['vilUti'],
                $row['logUti'],
                $row['mdpUti'],
                $row['idTut'],
                $row['idSpe'],
                $row['idTypeuti'],
                $row['idMaitapp'],
                $row['idEnt'],
                $row['idCla']
            );
        }
        return null;
    }

    public function update($utilisateur) {
        $query = "UPDATE Utilisateur SET 
                  nomUti = ?, preUti = ?, mailUti = ?, altUti = ?, telUti = ?, adrUti = ?, cpUti = ?, vilUti = ?, 
                  logUti = ?, mdpUti = ?, idTut = ?, idSpe = ?, idTypeuti = ?, idMaitapp = ?, idEnt = ?, idCla = ? 
                  WHERE idUti = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "ssssssssssssiiii",
            $utilisateur->getNomUti(),
            $utilisateur->getPreUti(),
            $utilisateur->getMailUti(),
            $utilisateur->getAltUti(),
            $utilisateur->getTelUti(),
            $utilisateur->getAdrUti(),
            $utilisateur->getCpUti(),
            $utilisateur->getVilUti(),
            $utilisateur->getLogUti(),
            $utilisateur->getMdpUti(),
            $utilisateur->getIdTut(),
            $utilisateur->getIdSpe(),
            $utilisateur->getIdTypeuti(),
            $utilisateur->getIdMaitapp(),
            $utilisateur->getIdEnt(),
            $utilisateur->getIdCla(),
            $utilisateur->getIdUti()
        );
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Utilisateur WHERE idUti = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Utilisateur";
        $result = $this->conn->query($query);
        $utilisateurs = [];
        while ($row = $result->fetch_assoc()) {
            $utilisateurs[] = new Utilisateur(
                $row['idUti'],
                $row['nomUti'],
                $row['preUti'],
                $row['mailUti'],
                $row['altUti'],
                $row['telUti'],
                $row['adrUti'],
                $row['cpUti'],
                $row['vilUti'],
                $row['logUti'],
                $row['mdpUti'],
                $row['idTut'],
                $row['idSpe'],
                $row['idTypeuti'],
                $row['idMaitapp'],
                $row['idEnt'],
                $row['idCla']
            );
        }
        return $utilisateurs;
    }
}
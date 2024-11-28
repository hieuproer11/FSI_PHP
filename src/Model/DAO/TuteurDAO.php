<?php

namespace DAO;

class TuteurDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($tuteur) {
        $query = "INSERT INTO Tuteur (preTut, nomTut, telTut, mailTut) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $tuteur->getPreTut(), $tuteur->getNomTut(), $tuteur->getTelTut(), $tuteur->getMailTut());
        return $stmt->execute();
    }

    public function read($idTut) {
        $query = "SELECT * FROM Tuteur WHERE idTut = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idTut);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Tuteur($row['idTut'], $row['preTut'], $row['nomTut'], $row['telTut'], $row['mailTut']);
        }
        return null;
    }

    public function update($tuteur) {
        $query = "UPDATE Tuteur SET preTut = ?, nomTut = ?, telTut = ?, mailTut = ? WHERE idTut = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $tuteur->getPreTut(), $tuteur->getNomTut(), $tuteur->getTelTut(), $tuteur->getMailTut(), $tuteur->getIdTut());
        return $stmt->execute();
    }

    public function delete($idTut) {
        $query = "DELETE FROM Tuteur WHERE idTut = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idTut);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Tuteur";
        $result = $this->conn->query($query);
        $tuteurList = [];
        while ($row = $result->fetch_assoc()) {
            $tuteurList[] = new Tuteur($row['idTut'], $row['preTut'], $row['nomTut'], $row['telTut'], $row['mailTut']);
        }
        return $tuteurList;
    }
}
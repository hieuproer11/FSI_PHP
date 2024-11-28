<?php

namespace DAO;


class ClasseDAO  {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($classe) {
        $query = "INSERT INTO Classe (idCla, nomCla) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("is", $classe->getIdCla(), $classe->getNomCla());
        return $stmt->execute();
    }

    public function read($id) {
        $query = "SELECT * FROM Classe WHERE idCla = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Classe($row['idCla'], $row['nomCla']);
        }
        return null;
    }

    public function update($classe) {
        $query = "UPDATE Classe SET nomCla = ? WHERE idCla = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $classe->getNomCla(), $classe->getIdCla());
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Classe WHERE idCla = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Classe";
        $result = $this->conn->query($query);
        $classes = [];
        while ($row = $result->fetch_assoc()) {
            $classes[] = new Classe($row['idCla'], $row['nomCla']);
        }
        return $classes;
    }
}

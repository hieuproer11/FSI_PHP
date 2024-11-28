<?php

namespace DAO;

use BO\Classe;

class ClasseDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($classe) {
        $query = "INSERT INTO Classe (idCla, nomCla) VALUES (:idCla, :nomCla)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idCla', $classe->getIdCla(), \PDO::PARAM_INT);
        $stmt->bindValue(':nomCla', $classe->getNomCla(), \PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function read($id) {
        $query = "SELECT * FROM Classe WHERE idCla = :idCla";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idCla', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return new Classe($row['idCla'], $row['nomCla']);
        }
        return null;
    }

    public function update($classe) {
        $query = "UPDATE Classe SET nomCla = :nomCla WHERE idCla = :idCla";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nomCla', $classe->getNomCla(), \PDO::PARAM_STR);
        $stmt->bindValue(':idCla', $classe->getIdCla(), \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Classe WHERE idCla = :idCla";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':idCla', $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Classe";
        $stmt = $this->conn->query($query);
        $classes = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $classes[] = new Classe($row['idCla'], $row['nomCla']);
        }
        return $classes;
    }
}
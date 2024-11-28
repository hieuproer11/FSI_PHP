<?php
<<<<<<< Updated upstream
namespace DAO;
use Classe;

class ClasseDAO {
    private \PDO $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function addClasse(Classe $classe): void {
        $sql = "INSERT INTO Classe (nom_Cla, nbmax_Cla) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $classe->getNomCla(),
            $classe->getNbmaxCla()
        ]);
    }

    public function getClasse(int $idCla): ?Classe {
        $sql = "SELECT * FROM Classe WHERE id_Cla = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idCla]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Classe($row['id_Cla'], $row['nom_Cla'], $row['nbmax_Cla']);
    }

    public function updateClasse(Classe $classe): void {
        $sql = "UPDATE Classe SET nom_Cla = ?, nbmax_Cla = ? WHERE id_Cla = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $classe->getNomCla(),
            $classe->getNbmaxCla(),
            $classe->getIdCla()
        ]);
    }

    public function deleteClasse(int $idCla): void {
        $sql = "DELETE FROM Classe WHERE id_Cla = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idCla]);
    }

    public function getAllClasses(): array {
        $sql = "SELECT * FROM Classe";
        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $classes = [];
        foreach ($rows as $row) {
            $classes[] = new Classe($row['id_Cla'], $row['nom_Cla'], $row['nbmax_Cla']);
        }

=======

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
>>>>>>> Stashed changes
        return $classes;
    }
}

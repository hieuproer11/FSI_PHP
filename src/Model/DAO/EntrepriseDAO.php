<?php
namespace DAO;
<<<<<<< Updated upstream
use Entreprise;

class EntrepriseDAO {
    private \PDO $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function addEntreprise(Entreprise $entreprise): void {
        $sql = "INSERT INTO Entreprise (nom_Ent, vl_Ent, cp_Ent) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $entreprise->getNomEnt(),
            $entreprise->getVlEnt(),
            $entreprise->getCpEnt()
        ]);
    }

    public function getEntreprise(int $idEnt): ?Entreprise {
        $sql = "SELECT * FROM Entreprise WHERE id_Ent = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idEnt]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Entreprise($row['id_Ent'], $row['nom_Ent'], $row['vl_Ent'], $row['cp_Ent']);
    }

    public function updateEntreprise(Entreprise $entreprise): void {
        $sql = "UPDATE Entreprise SET nom_Ent = ?, vl_Ent = ?, cp_Ent = ? WHERE id_Ent = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $entreprise->getNomEnt(),
            $entreprise->getVlEnt(),
            $entreprise->getCpEnt(),
            $entreprise->getIdEnt()
        ]);
    }

    public function deleteEntreprise(int $idEnt): void {
        $sql = "DELETE FROM Entreprise WHERE id_Ent = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idEnt]);
    }

    public function getAllEntreprises(): array {
        $sql = "SELECT * FROM Entreprise";
        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $entreprises = [];
        foreach ($rows as $row) {
            $entreprises[] = new Entreprise($row['id_Ent'], $row['nom_Ent'], $row['vl_Ent'], $row['cp_Ent']);
        }

=======

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
>>>>>>> Stashed changes
        return $entreprises;
    }
}

<?php
namespace DAO;
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

        return $entreprises;
    }
}

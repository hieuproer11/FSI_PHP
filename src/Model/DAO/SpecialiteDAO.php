<?php
namespace DAO;
use Specialite; // Inclure la classe Specialite

class SpecialiteDAO {
    private \PDO $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function addSpecialite(Specialite $specialite): void {
        $sql = "INSERT INTO Specialite (nom_Spe) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$specialite->getNomSpe()]);
    }

    public function getSpecialite(int $idSpe): ?Specialite {
        $sql = "SELECT * FROM Specialite WHERE id_Spe = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idSpe]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Specialite($row['id_Spe'], $row['nom_Spe']);
    }

    public function updateSpecialite(Specialite $specialite): void {
        $sql = "UPDATE Specialite SET nom_Spe = ? WHERE id_Spe = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $specialite->getNomSpe(),
            $specialite->getIdSpe()
        ]);
    }

    public function deleteSpecialite(int $idSpe): void {
        $sql = "DELETE FROM Specialite WHERE id_Spe = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idSpe]);
    }

    public function getAllSpecialites(): array {
        $sql = "SELECT * FROM Specialite";
        $resultat = $this->db->query($sql);
        $rows = $resultat->fetchAll(\PDO::FETCH_ASSOC);

        $specialites = [];
        foreach ($rows as $row) {
            $specialites[] = new Specialite($row['id_Spe'], $row['nom_Spe']);
        }

        return $specialites;
    }
}

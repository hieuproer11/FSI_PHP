<?php

require_once 'Classe.php';

class ClasseDAO {
    private PDO $db;

    public function __construct(PDO $db) {
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
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

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
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $classes = [];
        foreach ($rows as $row) {
            $classes[] = new Classe($row['id_Cla'], $row['nom_Cla'], $row['nbmax_Cla']);
        }

        return $classes;
    }
}

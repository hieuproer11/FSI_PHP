<?php

require_once 'Alerte.php';

class AlerteDAO {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function addAlerte(Alerte $alerte): void {
        $sql = "INSERT INTO Alerte (datevisitebilan1_Al, datevisitebilan2_Al, datelim1_Al, datelim2_Al) 
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $alerte->getDateVisiteBilan1(),
            $alerte->getDateVisiteBilan2(),
            $alerte->getDateLim1(),
            $alerte->getDateLim2()
        ]);
    }

    public function getAlerte(int $idAl): ?Alerte {
        $sql = "SELECT * FROM Alerte WHERE id_Al = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idAl]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Alerte(
            $row['id_Al'],
            $row['datevisitebilan1_Al'],
            $row['datevisitebilan2_Al'],
            $row['datelim1_Al'],
            $row['datelim2_Al']
        );
    }

    public function updateAlerte(Alerte $alerte): void {
        $sql = "UPDATE Alerte SET datevisitebilan1_Al = ?, datevisitebilan2_Al = ?, datelim1_Al = ?, datelim2_Al = ? 
                WHERE id_Al = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $alerte->getDateVisiteBilan1(),
            $alerte->getDateVisiteBilan2(),
            $alerte->getDateLim1(),
            $alerte->getDateLim2(),
            $alerte->getIdAl()
        ]);
    }

    public function deleteAlerte(int $idAl): void {
        $sql = "DELETE FROM Alerte WHERE id_Al = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idAl]);
    }

    public function getAllAlertes(): array {
        $sql = "SELECT * FROM Alerte";
        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $alertes = [];
        foreach ($rows as $row) {
            $alertes[] = new Alerte(
                $row['id_Al'],
                $row['datevisitebilan1_Al'],
                $row['datevisitebilan2_Al'],
                $row['datelim1_Al'],
                $row['datelim2_Al']
            );
        }

        return $alertes;
    }
}

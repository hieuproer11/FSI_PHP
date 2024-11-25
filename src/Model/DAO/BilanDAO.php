<?php

require_once 'Bilan.php';
require_once 'Bilan1.php';
require_once 'Bilan2.php';


class BilanDAO {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function addBilan(Bilan $bilan): void {
        $sql = "INSERT INTO Bilan (notor_Bil, moy_Bil, remarque_Bil, sujmen_Bil, dat_Bil, datlim_Bil) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $bilan->getNotorBil(),
            $bilan->getMoyBil(),
            $bilan->getRemarqueBil(),
            $bilan->getSujmenBil(),
            $bilan->getDatBil(),
            $bilan->getDatlimBil()
        ]);
    }

    public function getBilan(int $idBil): ?Bilan {
        $sql = "SELECT * FROM Bilan WHERE id_Bil = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idBil]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Bilan(
            $row['id_Bil'],
            $row['notor_Bil'],
            $row['moy_Bil'],
            $row['remarque_Bil'],
            $row['sujmen_Bil'],
            $row['dat_Bil'],
            $row['datlim_Bil']
        );
    }

    public function updateBilan(Bilan $bilan): void {
        $sql = "UPDATE Bilan SET notor_Bil = ?, moy_Bil = ?, remarque_Bil = ?, sujmen_Bil = ?, dat_Bil = ?, datlim_Bil = ? 
                WHERE id_Bil = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $bilan->getNotorBil(),
            $bilan->getMoyBil(),
            $bilan->getRemarqueBil(),
            $bilan->getSujmenBil(),
            $bilan->getDatBil(),
            $bilan->getDatlimBil(),
            $bilan->getIdBil()
        ]);
    }

    public function deleteBilan(int $idBil): void {
        $sql = "DELETE FROM Bilan WHERE id_Bil = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idBil]);
    }

    public function getAllBilans(): array {
        $sql = "SELECT * FROM Bilan";
        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $bilans = [];
        foreach ($rows as $row) {
            $bilans[] = new Bilan(
                $row['id_Bil'],
                $row['notor_Bil'],
                $row['moy_Bil'],
                $row['remarque_Bil'],
                $row['sujmen_Bil'],
                $row['dat_Bil'],
                $row['datlim_Bil']
            );
        }

        return $bilans;
    }
}

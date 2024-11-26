<?php

require_once 'MaitreApprentissage.php';

class MaitreApprentissageDAO {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function addMaitreApprentissage(MaitreApprentissage $maitre): void {
        $sql = "INSERT INTO MaitreApprentissage (nom_Maitapp, pre_Maitapp, mail_Maitapp, tel_Maitapp) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $maitre->getNomMaitapp(),
            $maitre->getPreMaitapp(),
            $maitre->getMailMaitapp(),
            $maitre->getTelMaitapp()
        ]);
    }

    public function getMaitreApprentissage(int $idMaitapp): ?MaitreApprentissage {
        $sql = "SELECT * FROM MaitreApprentissage WHERE id_Maitapp = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idMaitapp]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new MaitreApprentissage(
            $row['id_Maitapp'],
            $row['nom_Maitapp'],
            $row['pre_Maitapp'],
            $row['mail_Maitapp'],
            $row['tel_Maitapp']
        );
    }

    public function updateMaitreApprentissage(MaitreApprentissage $maitre): void {
        $sql = "UPDATE MaitreApprentissage 
                SET nom_Maitapp = ?, pre_Maitapp = ?, mail_Maitapp = ?, tel_Maitapp = ? 
                WHERE id_Maitapp = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $maitre->getNomMaitapp(),
            $maitre->getPreMaitapp(),
            $maitre->getMailMaitapp(),
            $maitre->getTelMaitapp(),
            $maitre->getIdMaitapp()
        ]);
    }

    public function deleteMaitreApprentissage(int $idMaitapp): void {
        $sql = "DELETE FROM MaitreApprentissage WHERE id_Maitapp = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idMaitapp]);
    }

    public function getAllMaitresApprentissage(): array {
        $sql = "SELECT * FROM MaitreApprentissage";
        $resultat = $this->db->query($sql);
        $rows = $resultat->fetchAll(PDO::FETCH_ASSOC);

        $maitres = [];
        foreach ($rows as $row) {
            $maitres[] = new MaitreApprentissage(
                $row['id_Maitapp'],
                $row['nom_Maitapp'],
                $row['pre_Maitapp'],
                $row['mail_Maitapp'],
                $row['tel_Maitapp']
            );
        }

        return $maitres;
    }
}

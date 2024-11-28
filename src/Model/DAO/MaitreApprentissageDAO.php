<?php
<<<<<<< Updated upstream
namespace  DAO;
use MaitreApprentissage;


class MaitreApprentissageDAO {
    private \PDO $db;

    public function __construct(\PDO $db) {
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
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

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
        $rows = $resultat->fetchAll(\PDO::FETCH_ASSOC);

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
=======

namespace DAO;

class MaitreApprentissageDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($maitreApprentissage) {
        $query = "INSERT INTO Maitre_d_apprentissage (idMaitapp, nomMaitapp, preMaitapp, mailMaitapp, telMaitapp, idEnt) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "sssssi",
            $maitreApprentissage->getIdMaitapp(),
            $maitreApprentissage->getNomMaitapp(),
            $maitreApprentissage->getPreMaitapp(),
            $maitreApprentissage->getMailMaitapp(),
            $maitreApprentissage->getTelMaitapp(),
            $maitreApprentissage->getIdEnt()
        );
        return $stmt->execute();
    }

    public function read($id) {
        $query = "SELECT * FROM Maitre_d_apprentissage WHERE idMaitapp = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new MaitreApprentissage(
                $row['idMaitapp'],
                $row['nomMaitapp'],
                $row['preMaitapp'],
                $row['mailMaitapp'],
                $row['telMaitapp'],
                $row['idEnt']
            );
        }
        return null;
    }

    public function update($maitreApprentissage) {
        $query = "UPDATE Maitre_d_apprentissage SET 
                  nomMaitapp = ?, preMaitapp = ?, mailMaitapp = ?, telMaitapp = ?, idEnt = ? 
                  WHERE idMaitapp = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "ssssii",
            $maitreApprentissage->getNomMaitapp(),
            $maitreApprentissage->getPreMaitapp(),
            $maitreApprentissage->getMailMaitapp(),
            $maitreApprentissage->getTelMaitapp(),
            $maitreApprentissage->getIdEnt(),
            $maitreApprentissage->getIdMaitapp()
        );
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Maitre_d_apprentissage WHERE idMaitapp = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Maitre_d_apprentissage";
        $result = $this->conn->query($query);
        $maitresApprentissage = [];
        while ($row = $result->fetch_assoc()) {
            $maitresApprentissage[] = new MaitreApprentissage(
                $row['idMaitapp'],
                $row['nomMaitapp'],
                $row['preMaitapp'],
                $row['mailMaitapp'],
                $row['telMaitapp'],
                $row['idEnt']
            );
        }
        return $maitresApprentissage;
    }
}

>>>>>>> Stashed changes

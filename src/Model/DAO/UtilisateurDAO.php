<?php
<<<<<<< Updated upstream
namespace DAO;

use BO\Utilisateur; // Inclure la classe Utilisateur

class UtilisateurDAO {
    protected \PDO $db;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function getAllUtilisateur(): ?array
    {
        $resultset = null;
        $query = 'SELECT * FROM Utilisateur';
        $res = $this->db->query($query);
        if ($res) {
            while($row = $res->fetch(\PDO::FETCH_ASSOC)){
                $data = [
                    'idUti'=> $row['idUti'],
                    'nomUti'=> $row['nomUti'],
                    'preUti'=> $row['preUti'],
                    'mailUti'=> $row['mailUti'],
                    'altUti'=> $row['altUti'],
                    'telUti'=> $row['telUti'],
                    'adrUti'=> $row['adrUti'],
                    'cpUti'=> $row['adrUti'],
                    'vilUti'=> $row['adrUti'],
                    'logUti'=>$row['logUti'],
                    'mdpUti'=>$row['mdpUti']
                ];
                $resultset[] = new Utilisateur($data);
            }
        }
        return $resultset;
    }






    public function addUtilisateur(Utilisateur $utilisateur): void {
        $sql = "INSERT INTO Utilisateur (nom_Uti, pre_Uti, mail_Uti, tel_Uti, ad_Uti, vl_Uti, ioh_Uti, mdp_Uti) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $utilisateur->getNomUti(),
            $utilisateur->getPreUti(),
            $utilisateur->getMailUti(),
            $utilisateur->getTelUti(),
            $utilisateur->getAdUti(),
            $utilisateur->getVlUti(),
            $utilisateur->getIohUti(),
            $utilisateur->getMdpUti()
        ]);
    }

    public function getUtilisateur(int $idUti): ?Utilisateur {
        $sql = "SELECT * FROM Utilisateur WHERE id_Uti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idUti]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Utilisateur(
            $row['id_Uti'],
            $row['nom_Uti'],
            $row['pre_Uti'],
            $row['mail_Uti'],
            $row['tel_Uti'],
            $row['ad_Uti'],
            $row['vl_Uti'],
            $row['ioh_Uti'],
            $row['mdp_Uti']
        );
    }

    public function updateUtilisateur(Utilisateur $utilisateur): void {
        $sql = "UPDATE Utilisateur 
                SET nom_Uti = ?, pre_Uti = ?, mail_Uti = ?, tel_Uti = ?, ad_Uti = ?, vl_Uti = ?, ioh_Uti = ?, mdp_Uti = ? 
                WHERE id_Uti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $utilisateur->getNomUti(),
            $utilisateur->getPreUti(),
            $utilisateur->getMailUti(),
            $utilisateur->getTelUti(),
            $utilisateur->getAdUti(),
            $utilisateur->getVlUti(),
            $utilisateur->getIohUti(),
            $utilisateur->getMdpUti(),
            $utilisateur->getIdUti()
        ]);
    }

    public function deleteUtilisateur(int $idUti): void {
        $sql = "DELETE FROM Utilisateur WHERE id_Uti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idUti]);
    }
/*
    public function getAllUtilisateurs(): array {
        $sql = "SELECT * FROM Utilisateur";
        $resultat = $this->db->query($sql);
        $rows = $resultat->fetchAll(\PDO::FETCH_ASSOC);

        $utilisateurs = [];
        foreach ($rows as $row) {
            $utilisateurs[] = new Utilisateur(
                $row['id_Uti'],
                $row['nom_Uti'],
                $row['pre_Uti'],
                $row['mail_Uti'],
                $row['tel_Uti'],
                $row['ad_Uti'],
                $row['vl_Uti'],
                $row['ioh_Uti'],
                $row['mdp_Uti']
            );
        }

        return $utilisateurs;
    }
*/
}
=======

namespace DAO;

class UtilisateurDAO  {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($utilisateur) {
        $query = "INSERT INTO Utilisateur (idUti, nomUti, preUti, mailUti, altUti, telUti, adrUti, cpUti, vilUti, logUti, mdpUti, idTut, idSpe, idTypeuti, idMaitapp, idEnt, idCla) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "isssssssssssiiiii",
            $utilisateur->getIdUti(),
            $utilisateur->getNomUti(),
            $utilisateur->getPreUti(),
            $utilisateur->getMailUti(),
            $utilisateur->getAltUti(),
            $utilisateur->getTelUti(),
            $utilisateur->getAdrUti(),
            $utilisateur->getCpUti(),
            $utilisateur->getVilUti(),
            $utilisateur->getLogUti(),
            $utilisateur->getMdpUti(),
            $utilisateur->getIdTut(),
            $utilisateur->getIdSpe(),
            $utilisateur->getIdTypeuti(),
            $utilisateur->getIdMaitapp(),
            $utilisateur->getIdEnt(),
            $utilisateur->getIdCla()
        );
        return $stmt->execute();
    }

    public function read($id) {
        $query = "SELECT * FROM Utilisateur WHERE idUti = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return new Utilisateur(
                $row['idUti'],
                $row['nomUti'],
                $row['preUti'],
                $row['mailUti'],
                $row['altUti'],
                $row['telUti'],
                $row['adrUti'],
                $row['cpUti'],
                $row['vilUti'],
                $row['logUti'],
                $row['mdpUti'],
                $row['idTut'],
                $row['idSpe'],
                $row['idTypeuti'],
                $row['idMaitapp'],
                $row['idEnt'],
                $row['idCla']
            );
        }
        return null;
    }

    public function update($utilisateur) {
        $query = "UPDATE Utilisateur SET 
                  nomUti = ?, preUti = ?, mailUti = ?, altUti = ?, telUti = ?, adrUti = ?, cpUti = ?, vilUti = ?, 
                  logUti = ?, mdpUti = ?, idTut = ?, idSpe = ?, idTypeuti = ?, idMaitapp = ?, idEnt = ?, idCla = ? 
                  WHERE idUti = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "ssssssssssssiiii",
            $utilisateur->getNomUti(),
            $utilisateur->getPreUti(),
            $utilisateur->getMailUti(),
            $utilisateur->getAltUti(),
            $utilisateur->getTelUti(),
            $utilisateur->getAdrUti(),
            $utilisateur->getCpUti(),
            $utilisateur->getVilUti(),
            $utilisateur->getLogUti(),
            $utilisateur->getMdpUti(),
            $utilisateur->getIdTut(),
            $utilisateur->getIdSpe(),
            $utilisateur->getIdTypeuti(),
            $utilisateur->getIdMaitapp(),
            $utilisateur->getIdEnt(),
            $utilisateur->getIdCla(),
            $utilisateur->getIdUti()
        );
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Utilisateur WHERE idUti = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function findAll() {
        $query = "SELECT * FROM Utilisateur";
        $result = $this->conn->query($query);
        $utilisateurs = [];
        while ($row = $result->fetch_assoc()) {
            $utilisateurs[] = new Utilisateur(
                $row['idUti'],
                $row['nomUti'],
                $row['preUti'],
                $row['mailUti'],
                $row['altUti'],
                $row['telUti'],
                $row['adrUti'],
                $row['cpUti'],
                $row['vilUti'],
                $row['logUti'],
                $row['mdpUti'],
                $row['idTut'],
                $row['idSpe'],
                $row['idTypeuti'],
                $row['idMaitapp'],
                $row['idEnt'],
                $row['idCla']
            );
        }
        return $utilisateurs;
    }
}

>>>>>>> Stashed changes

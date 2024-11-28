<?php
namespace DAO;

use BO\Utilisateur; // Inclure la classe Utilisateur

class UtilisateurDAO {
    protected \PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getALl_Uti(): ?array
    {
        $resultset = null;
        $query = 'SELECT * FROM Utilisateur';
        $res = $this->bdd->query($query);
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
        $sql = "INSERT INTO Utilisateur (nom_Uti, pre_Uti, mail_Uti, alt_uti, tel_Uti, ad_Uti, vl_Uti, ioh_Uti,log_uti, mdp_Uti) 
                VALUES (?, ?, ?,?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $utilisateur->getNomUti(),
            $utilisateur->getPreUti(),
            $utilisateur->getMailUti(),
            $utilisateur->getTelUti(),
            $utilisateur->getAdUti(),
            $utilisateur->getVlUti(),
            $utilisateur->getIohUti(),
            $utilisateur->getLog_Uti(),
            $utilisateur->getAlt_Uti(),
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
            $row['log_Uti'],
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

    public function getAllUtilisateurs(): array {
        $sql = "SELECT * FROM Utilisateur";
        $resultat = $this->db->query($sql);
        $rows = $resultat->fetchAll(PDO::FETCH_ASSOC);

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
                $row['log_Uti'],
                $row['alt_Uti'],
                $row['mdp_Uti']
            );
        }

        return $utilisateurs;
    }

}

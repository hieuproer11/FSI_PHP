<?php

require_once 'Utilisateur.php'; // Inclure la classe Utilisateur

class UtilisateurDAO {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
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
                $row['mdp_Uti']
            );
        }

        return $utilisateurs;
    }
}

<?php
namespace DAO;
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Entreprise.php';
use BO\Entreprise;
use BO\Utilisateur;
use BO\Etudiant;
use PDO;

class EtudiantDAO
{

    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getById(int $id): ?Etudiant{
        $sql = "SELECT  U.idUti,
                        U.nomUti,
                        U.preUti,
                        U.adrUti,
                        U.mailUti,
                        U.telUti,
                        U.altUti,
                        E.nomEnt,
                        E.adrEnt 
                FROM Utilisateur U 
                inner join Entreprise E on U.idEnt = E.idEnt
                WHERE U.idUti = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        $entreprise = new Entreprise(0,$row['nomEnt'],$row['adrEnt'],'','');
        if (!$row) {
            return null;
        }
        return new Etudiant(
            $row['idUti'],
            $row['preUti'],
            $row['nomUti'],
            $row['adrUti'],
            $row['mailUti'],
            $row['telUti'],
            $row['altUti'],
            $entreprise
        );
    }


    public function update($liste){

        $sql = "UPDATE Utilisateur U Join Entreprise E ON U.idEnt = E.idENT 
                SET U.preUti = :preUti,
                    U.nomUti = :nomUti,
                    U.adrUti = :adrUti,
                    U.mailUti = :mailUti,
                    U.telUti = :telUti,                    
                    U.altUti = :altUti,
                    E.nomEnt = :nomEnt,
                    E.adrEnt = :adrEnt 
                WHERE U.idUti = :idUti";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
                'idUti' =>  $liste['idUti'],
                'preUti' => $liste['preUti'],
                'nomUti' => $liste['nomUti'],
                'adrUti' => $liste['adrUti'],
                'mailUti'=> $liste['mailUti'],
                'telUti' => $liste['telUti'],
                'altUti' => $liste['altUti'],
                'nomEnt' => $liste['nomEnt'],
                'adrEnt' => $liste['adrEnt']
            ]);
    }
}
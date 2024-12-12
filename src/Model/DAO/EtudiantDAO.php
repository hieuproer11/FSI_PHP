<?php
namespace DAO;
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Entreprise.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Specialite.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Classe.php';

use BO\Entreprise;
use BO\Specialite;
use BO\Classe;
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
        $classe = new Classe(0,'');
        $specialite = new Specialite(0,'');
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
            $entreprise,
            $specialite,
            $classe
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

    public function getAll() : array{
        $sql = " SELECT U.idUti, 
                        U.nomUti, 
                        U.preUti,
                        U.nomUti,
                        U.adrUti,
	                    U.telUti,
                        U.mailUti,
                        U.altUti,
                        S.nomSpe,
                        C.nomCla 
                From Utilisateur U inner join Specialite S on U.idSpe = S.idSpe
                inner join Classe C on U.idCla = C.idCla;";
        $result = $this->db->query($sql);
        $etudiantData = $result->fetchAll(\PDO::FETCH_ASSOC);
        $etudiants = [];
        foreach ($etudiantData as $row) {
            $entreprise = new Entreprise(0,'','','','');
            $classe = new Classe(0, $row['nomCla']);
            $specialite = new Specialite(0,$row['nomSpe']);
            $etudiants[] = new Etudiant(
                $row['idUti'],
                $row['preUti'],
                $row['nomUti'],
                $row['adrUti'],
                $row['mailUti'],
                $row['telUti'],
                $row['altUti'],
                $entreprise,
                $specialite,
                $classe
            );
        }
                return $etudiants;
}





}
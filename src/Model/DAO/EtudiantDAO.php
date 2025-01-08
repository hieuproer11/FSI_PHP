<?php
namespace DAO;

include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Entreprise.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Specialite.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Classe.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan1.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Bilan2.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Etudiant.php'; // Ajout pour inclure la classe Etudiant
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan1DAO.php';
include_once 'C:\wamp64\www\FSI_PHP\src\Model\DAO\Bilan2DAO.php';

use BO\Bilan1;
use BO\Bilan2;
use BO\Entreprise;
use BO\Specialite;
use BO\Classe;
use BO\Etudiant; // Assurez-vous que cette classe existe
use DAO\Bilan1DAO;
use DAO\Bilan2DAO;
use PDO;

class EtudiantDAO
{
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getById(int $id): ?Etudiant {
        $sql = "SELECT  U.idUti,
                        U.nomUti,
                        U.preUti,
                        U.adrUti,
                        U.mailUti,
                        U.telUti,
                        U.altUti,
                        U.cpUti,
                        U.vilUti,
                        E.nomEnt,
                        E.adrEnt,
                        B1.idBil1,
                        B2.idBil2
                FROM Utilisateur U 
                 JOIN Entreprise E ON U.idEnt = E.idEnt
                 JOIN Realiser1 R1 ON U.idUti = R1.idUti
                 JOIN Realiser2 R2 ON U.idUti = R2.idUti
                 JOIN Bilan1 B1 ON R1.idBil1 = B1.idBil1
                 JOIN Bilan2 B2 ON R2.idBil2 = B2.idBil2
                WHERE U.idUti = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // Si aucun résultat, retournez null
        }

        $entreprise = new Entreprise(0, $row['nomEnt'], $row['adrEnt'], '', '');
        $classe = new Classe(0, '');
        $specialite = new Specialite(0, '');
        $daoBilan1 = new Bilan1DAO($this->db);
        $bilan1 = $daoBilan1->getById($row['idBil1']);
        $daoBilan2 = new Bilan2DAO($this->db);
        $bilan2 = $daoBilan2->getById($row['idBil2']);

        return new Etudiant(
            $row['idUti'],
            $row['preUti'],
            $row['nomUti'],
            $row['adrUti'],
            $row['mailUti'],
            $row['telUti'],
            $row['altUti'],
            $row['cpUti'],
            $row['vilUti'],
            $entreprise,
            $specialite,
            $classe,
            $bilan1,
            $bilan2
        );
    }

    public function update($liste) {
        $sql = "UPDATE Utilisateur U JOIN Entreprise E ON U.idEnt = E.idEnt 
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
            'idUti' => $liste['idUti'],
            'preUti' => $liste['preUti'],
            'nomUti' => $liste['nomUti'],
            'adrUti' => $liste['adrUti'],
            'mailUti' => $liste['mailUti'],
            'telUti' => $liste['telUti'],
            'altUti' => $liste['altUti'],
            'nomEnt' => $liste['nomEnt'],
            'adrEnt' => $liste['adrEnt']
        ]);
    }

    public function getAll(): array {
        $sql = "SELECT U.idUti, 
                        U.nomUti, 
                        U.preUti,
                        U.adrUti,
	                    U.telUti,
                        U.mailUti,
                        U.altUti,
                        U.cpUti,
                        U.vilUti,
                        S.nomSpe,
                        C.nomCla 
                FROM Utilisateur U 
                INNER JOIN Specialite S ON U.idSpe = S.idSpe
                INNER JOIN Classe C ON U.idCla = C.idCla
                WHERE U.idTypeuti = 1";

        $result = $this->db->query($sql);
        $etudiantData = $result->fetchAll(\PDO::FETCH_ASSOC);
        $etudiants = [];

        foreach ($etudiantData as $row) {
            $entreprise = new Entreprise(0, '', '', '', '');
            $classe = new Classe(0, $row['nomCla']);
            $specialite = new Specialite(0, $row['nomSpe']);
            $bilan1 = new Bilan1(0, 0, 0, 0, 0, '', '', '');
            $bilan2 = new Bilan2(0, 0, 0, 0, '', '', '');
            $etudiants[] = new Etudiant(
                $row['idUti'],
                $row['preUti'],
                $row['nomUti'],
                $row['adrUti'],
                $row['mailUti'],
                $row['telUti'],
                $row['altUti'],
                $row['cpUti'],
                $row['vilUti'],
                $entreprise,
                $specialite,
                $classe,
                $bilan1,
                $bilan2
            );
        }

        return $etudiants;
    }
}

<?php
<<<<<<< Updated upstream
namespace DAO;
use Alerte;

class AlerteDAO {
    private \PDO $db;

    public function __construct(\PDO $db) {
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
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

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
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

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
=======

namespace DAO;
use BO\Alerte;
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';  // Connexion à la base de données
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Alerte.php';    // Classe modèle Alerte

class AlerteDAO {

    private $connexion;

    // Constructeur qui reçoit une connexion PDO
    public function __construct($conn) {
        $this->connexion = $conn;
    }

    // Méthode pour créer une alerte
    public function create(Alerte $alerte) {
        $query = "INSERT INTO Alerte (datelimbil1Al, datelimbil2Al) 
                  VALUES (:datelimbil1Al, :datelimbil2Al)";

        try {
            // Préparation de la requête
            $stmt = $this->connexion->prepare($query);

            // Liaison des paramètres avec les valeurs de l'objet Alerte
            $stmt->bindValue(':datelimbil1Al', $alerte->getDatelimbil1Al(), \PDO::PARAM_STR);
            $stmt->bindValue(':datelimbil2Al', $alerte->getDatelimbil2Al(), \PDO::PARAM_STR);

            // Exécution de la requête et gestion du résultat
            if ($stmt->execute()) {
                return true;  // Si l'exécution réussit
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la création de l'alerte: " . $e->getMessage();
        }

        // Si une erreur se produit, retourne false
        return false;
    }

    // Méthode pour obtenir une alerte par son ID
    public function getById($idAl) {
        $query = "SELECT * FROM Alerte WHERE idAl = ?";

        try {
            // Préparation de la requête
            $stmt = $this->connexion->prepare($query);

            // Liaison du paramètre ID
            $stmt->bindValue(':idAl', $idAl, \PDO::PARAM_INT);

            // Exécution de la requête
            $stmt->execute();

            // Récupération du résultat sous forme de tableau associatif
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);

            // Si l'alerte existe, la retourner sous forme d'objet Alerte
            if ($row) {
                $alerte = new Alerte($row['datelimbil1Al'], $row['datelimbil2Al'], $row['idAl'] );
                $alerte->setIdAl($row['idAl']);
                $alerte->setDatelimbil1Al($row['datelimbil1Al']);
                $alerte->setDatelimbil2Al($row['datelimbil2Al']);
                return $alerte;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de l'alerte: " . $e->getMessage();
        }

        // Retourne null si l'alerte n'est pas trouvée
        return null;
    }

    // Méthode pour mettre à jour une alerte existante
    public function update(Alerte $alerte) {
        $query = "UPDATE Alerte 
                  SET datelimbil1Al = :datelimbil1Al, datelimbil2Al = :datelimbil2Al 
                  WHERE idAl = :idAl";

        try {
            // Préparation de la requête
            $stmt = $this->connexion->prepare($query);

            // Liaison des paramètres avec les valeurs de l'objet Alerte
            $stmt->bindValue(':idAl', $alerte->getIdAl(), PDO::PARAM_INT);
            $stmt->bindValue(':datelimbil1Al', $alerte->getDatelimbil1Al(), \PDO::PARAM_STR);
            $stmt->bindValue(':datelimbil2Al', $alerte->getDatelimbil2Al(), \PDO::PARAM_STR);

            // Exécution de la requête
            if ($stmt->execute()) {
                return true;  // Retourne true si la mise à jour réussit
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de l'alerte: " . $e->getMessage();
        }

        // Retourne false en cas d'échec
        return false;
    }

    // Méthode pour supprimer une alerte par son ID
    public function delete($idAl) {
        $query = "DELETE FROM Alerte WHERE idAl = :idAl";

        try {
            // Préparation de la requête
            $stmt = $this->connexion->prepare($query);

            // Liaison du paramètre ID
            $stmt->bindValue(':idAl', $idAl, \PDO::PARAM_INT);

            // Exécution de la requête
            if ($stmt->execute()) {
                return true;  // Retourne true si la suppression réussit
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de l'alerte: " . $e->getMessage();
        }

        // Retourne false en cas d'échec
        return false;
    }

    // Méthode pour récupérer toutes les alertes
    public function getAll() {
        $query = "SELECT * FROM Alerte";

        try {
            // Préparation de la requête
            $stmt = $this->connexion->prepare($query);

            // Exécution de la requête
            $stmt->execute();

            // Tableau pour stocker toutes les alertes
            $alertes = [];

            // Récupération des résultats sous forme d'objets Alerte
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $alerte = new Alerte(4,'datelimbil1Al','datelimbil2Al');
           //     $alerte->setIdAl($row['idAl']);
             //   $alerte->setDatelimbil1Al($row['datelimbil1Al']);
               // $alerte->setDatelimbil2Al($row['datelimbil2Al']);
                $alertes[] = $alerte;
            }

            // Retourne le tableau d'alertes
            return $alertes;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des alertes: " . $e->getMessage();
        }

        // Retourne un tableau vide si une erreur se produit
        return [];
>>>>>>> Stashed changes
    }
}

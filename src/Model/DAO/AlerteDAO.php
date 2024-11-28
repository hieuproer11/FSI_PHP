<?php

namespace DAO;
use BO\Alerte;
include_once 'C:\wamp64\www\FSI_PHP\src\Model\bddManager.php';  // Connexion à la base de données
include_once 'C:\wamp64\www\FSI_PHP\src\Model\BO\Alerte.php';    // Classe modèle Alerte

class AlerteDAO
{

    private $connexion;

    // Constructeur qui reçoit une connexion PDO
    public function __construct($conn)
    {
        $this->connexion = $conn;
    }

    // Méthode pour créer une alerte
    public function create(Alerte $alerte)
    {
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
    public function getById($idAl)
    {
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
                $alerte = new Alerte($row['datelimbil1Al'], $row['datelimbil2Al'], $row['idAl']);
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
}
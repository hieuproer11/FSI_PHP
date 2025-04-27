<?php
require_once __DIR__ . '/../src/Model/bddManager.php';

function testConnexionBDD(): void
{
    try {
        $bdd = ConnexionBDD();

        if ($bdd instanceof PDO) {
            echo "Connexion à la base de données réussie !";
        } else {
            echo "La connexion a échoué. L'objet PDO n'a pas été créé.";
        }
    } catch (Exception $e) {
        // Gestion des erreurs potentielles
        echo "Erreur lors du test de connexion : " . $e->getMessage();
    }
}

testConnexionBDD();
?>

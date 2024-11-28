<?php
// Inclure la connexion et le DAO de Entreprise
include_once 'src/Model/bddManager.php';
include_once 'src/Model/EntrepriseDAO.php';

// Connexion à la base de données
$conn = ConnexionBDD();

// Création de l'instance du DAO Entreprise
$entrepriseDAO = new EntrepriseDAO($conn);

// 1. Test de création d'une Entreprise
echo "Test de la création d'une Entreprise :\n";
$entreprise = new Entreprise(null, 'TechCorp', '1234 Avenue de la Technologie', 'Paris', '75000', 'France', 'contact@techcorp.com');
$createdEntreprise = $entrepriseDAO->create($entreprise);
if ($createdEntreprise) {
    echo "Entreprise créée avec succès : " . $createdEntreprise->getNom() . "\n";
} else {
    echo "Échec de la création de l'Entreprise.\n";
}

// 2. Test de lecture d'une Entreprise par ID
echo "\nTest de la lecture d'une Entreprise par ID :\n";
$entrepriseToRead = $entrepriseDAO->read(1); // Assurez-vous qu'un enregistrement avec cet ID existe
if ($entrepriseToRead) {
    echo "Entreprise lue : " . $entrepriseToRead->getNom() . ", " . $entrepriseToRead->getAdresse() . "\n";
} else {
    echo "Entreprise non trouvée.\n";
}

// 3. Test de mise à jour d'une Entreprise
echo "\nTest de la mise à jour d'une Entreprise :\n";
$entrepriseToUpdate = $entrepriseDAO->read(1); // Assurez-vous qu'un enregistrement avec cet ID existe
if ($entrepriseToUpdate) {
    // Mise à jour des informations de l'entreprise
    $entrepriseToUpdate->setAdresse('5678 Boulevard de l\'Innovation');
    $updatedEntreprise = $entrepriseDAO->update($entrepriseToUpdate);
    if ($updatedEntreprise) {
        echo "Entreprise mise à jour avec succès : " . $entrepriseToUpdate->getNom() . "\n";
    } else {
        echo "Échec de la mise à jour de l'Entreprise.\n";
    }
} else {
    echo "Entreprise non trouvée pour mise à jour.\n";
}

// 4. Test de suppression d'une Entreprise
echo "\nTest de la suppression d'une Entreprise :\n";
$deletedEntreprise = $entrepriseDAO->delete(1); // Assurez-vous qu'un enregistrement avec cet ID existe
if ($deletedEntreprise) {
    echo "Entreprise supprimée avec succès.\n";
} else {
    echo "Échec de la suppression de l'Entreprise.\n";
}

// 5. Test de récupération de toutes les Entreprises
echo "\nTest de la récupération de toutes les Entreprises :\n";
$entreprises = $entrepriseDAO->findAll();
if (count($entreprises) > 0) {
    echo "Entreprises trouvées :\n";
    foreach ($entreprises as $entreprise) {
        echo $entreprise->getNom() . ", " . $entreprise->getAdresse() . "\n";
    }
} else {
    echo "Aucune Entreprise trouvée.\n";
}

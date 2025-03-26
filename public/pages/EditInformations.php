<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class="container">
    <?php include('../pages/SidebarTuteur.php'); ?>

    <div class="main-content">
    <div class="content-card informations-eleve">
        <h2>Informations élève</h2>
        <form>
            <div class="form-group">
                <input type="text" placeholder="Prénom">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Nom">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Adresse">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Numéro de téléphone">
            </div>
            <div class="form-group">
                <input type="email" placeholder="Adresse mail">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Classe">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Spécialité">
            </div>
        </form>
    </div>

    <div class="content-card informations-entreprise">
        <h2>Informations entreprise</h2>
        <form>
            <div class="form-group">
                <input type="text" placeholder="Nom de l'entreprise">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Adresse complète">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Prénom maître d'apprentissage">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Nom maître d'apprentissage">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Numéro de téléphone">
            </div>
            <div class="form-group">
                <input type="email" placeholder="Adresse mail">
            </div>
        </form>
    </div>

    <div class="content-card informations-tuteur">
        <h2>Informations du tuteur</h2>
        <form>
            <div class="form-group">
                <input type="text" placeholder="Prénom">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Nom">
            </div>
            <div class="form-group">
                <input type="email" placeholder="Adresse mail">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Numéro de téléphone">
            </div>
        </form>
    </div>

    <button class="submit-btn2">Modifier</button>
</div>

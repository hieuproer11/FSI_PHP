<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Informations</title>
    <link rel="stylesheet" href="../css/HeaderTuteur-styles.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="info-styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class="container">
  <!-- Sidebar -->
  <nav class="sidebar">
    <div class="logo">
      <img src="../img/FSI_logo.png" alt="Logo">
    </div>
    <ul class="nav-links">
      <li><a href="AccueilTuteur.php">Liste des étudiants</a></li>
      <li class="active"><a href="InformationsTuteurs.php">Mes informations</a></li>
      <li><a href="#">Alertes</a></li>
    </ul>
    <div class="collapse-button">
      <span class="collapse-icon">◄</span>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="main-content">
      <h2>Mes informations</h2>
    <div class="content-card">
      <form class="info-form">
        <div class="form-group">
          <label for="prenom">Prénom</label>
          <input type="text" id="prenom" name="prenom">
        </div>

        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" id="nom" name="nom">
        </div>

        <div class="form-group">
          <label for="email">Adresse mail</label>
          <input type="email" id="email" name="email">
        </div>

        <div class="form-group">
          <label for="telephone">Numéro de téléphone</label>
          <input type="tel" id="telephone" name="telephone">
        </div>

        <button type="submit" class="submit-btn">Modifier</button>
      </form>
    </div>
  </main>
</div>
</body>
</html>
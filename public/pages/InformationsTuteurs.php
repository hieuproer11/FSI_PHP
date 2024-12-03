<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Informations</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="info-styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class="container">
 <?php include('../pages/SidebarTuteur_Admin.php'); ?>
  <!-- Main Content -->
  <main class="main-content">
      <h2>Mes informations</h2>
    <div class="content-card">
      <form class="info-form">
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
            <input type="" placeholder="Numéro de téléphone">
        </div>

        <button type="submit" class="submit-btn">Modifier</button>
      </form>
    </div>
  </main>
</div>
</body>
</html>
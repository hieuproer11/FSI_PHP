<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Étudiant</title>
    <link rel="stylesheet" href="../css/Header-styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include('../pages/HeaderTuteur.php'); ?>
<div class="container">
    <?php include('../pages/SidebarTuteur.php'); ?>

    <main class="main-content">
        <h2>Détails de l'étudiant</h2>
        <div class="content-card">
            <h3>Informations personnelles</h3>
            <p><strong>Nom :</strong> <?php echo htmlspecialchars($etudiant->getNom()); ?></p>
            <p><strong>Prénom :</strong> <?php echo htmlspecialchars($etudiant->getPrenom()); ?></p>
            <p><strong>Adresse :</strong> <?php echo htmlspecialchars($etudiant->getAdresse()); ?></p>
            <p><strong>Email :</strong> <?php echo htmlspecialchars($etudiant->getMail()); ?></p>
            <p><strong>Téléphone :</strong> <?php echo htmlspecialchars($etudiant->getTelephone()); ?></p>

            <h3>Informations sur l'entreprise</h3>
            <p><strong>Nom de l'entreprise :</strong> <?php echo htmlspecialchars($etudiant->getEntreprise()->getNomEnt()); ?></p>
            <p><strong>Adresse de l'entreprise :</strong> <?php echo htmlspecialchars($etudiant->getEntreprise()->getAdresse()); ?></p>

            <h3>Bilan 1</h3>
            <?php if ($bilan1): ?>
                <p><strong>Date de visite :</strong> <?php echo htmlspecialchars($bilan1->getDatevisiteBil()); ?></p>
                <p><strong>Note entreprise :</strong> <?php echo htmlspecialchars($bilan1->getNotentBil()); ?></p>
                <p><strong>Remarque :</strong> <?php echo htmlspecialchars($bilan1->getRemarqueBil()); ?></p>
            <?php else: ?>
                <p>Aucun bilan 1 trouvé.</p>
            <?php endif; ?>

            <h3>Bilan 2</h3>
            <?php if ($bilan2): ?>
                <p><strong>Date de visite :</strong> <?php echo htmlspecialchars($bilan2->getDatevisiteBil()); ?></p>
                <p><strong>Sujet de mémoire :</strong> <?php echo htmlspecialchars($bilan2->getSujmemBil2()); ?></p>
                <p><strong>Remarque :</strong> <?php echo htmlspecialchars($bilan2->getRemarqueBil()); ?></p>
            <?php else: ?>
                <p>Aucun bilan 2 trouvé.</p>
            <?php endif; ?>
        </div>
    </main>
</div>
</body>
</html>

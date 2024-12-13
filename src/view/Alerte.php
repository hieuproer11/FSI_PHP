<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Alertes Bilans</title>
    <link rel="stylesheet" href='C:\wamp64\www\FSI_PHP\public\css\Header-styles.css'>
    <link rel="stylesheet" href='C:\wamp64\www\FSI_PHP\public\css\styles.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<?php include 'C:\wamp64\www\FSI_PHP\public\pages\HeaderTuteur.php'; ?>
<div class="container">
    <?php include 'C:\wamp64\www\FSI_PHP\public\pages\SidebarTuteur_Admin.php'; ?>

    <main>
        <h2>Liste des alertes pour les bilans</h2>
        <table>
            <thead>
            <tr>
                <th>Date de visite Bilan 1</th>
                <th>Date limite Bilan 1</th>
                <th>Date de visite Bilan 2</th>
                <th>Date limite Bilan 2</th>
                <th>Type d'alerte</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($alertesFinales)): ?>
                <tr>
                    <td colspan="5">Aucune alerte pour le moment.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($alertesFinales as $alerte): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($alerte['date_visite_bilan_1'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($alerte['date_limite_bilan_1'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($alerte['date_visite_bilan_2'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($alerte['date_limite_bilan_2'] ?? ''); ?></td>
                        <td><?php echo htmlspecialchars($alerte['alerte']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </main>
</div>
</body>
</html>

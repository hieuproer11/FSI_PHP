<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - FSI</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <div class="logo">
            <img src="../../src/img/FSI_logo.png" alt="FSI Logo">
        </div>

        <h1>Bienvenue</h1>

        <form class="login-form" method="post" action="../../src/traitConnexion.php">
            <div class="form-group">
                <input type="text" name="login" placeholder="Nom d'utilisateur">
            </div>

            <div class="form-group">
                <input type="text" name="mdp" placeholder="Mot de passe">
            </div>

            <button type="submit" class="login-button">Connexion</button>
        </form>
    </div>
</div>
</body>
</html>
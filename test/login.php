<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à la base de données</title>
</head>
<body>
    <h1>Connexion à la base de données</h1>
    <form action="./db_connection_test.php" method="post">
        
        <div>
            <label for="dbname">Nom de la base de données :</label>
            <input type="text" name="DB_NAME" id="dbname" autocomplete="off" required>
        </div>
        <div>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="DB_USER" id="username" autocomplete="off" required>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="DB_PASSWORD" id="password">
        </div>
        <div>
            <input type="submit" value="Se connecter">
        </div>
    </form>
</body>
</html>


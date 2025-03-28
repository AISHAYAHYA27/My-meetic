<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <title>MY MEETIC</title>
</head>

<body>
    <div class="container">
        <h1>CONNEXION</h1>
        <form action="View/HomeView.php" method="POST">

            <label> </label>
            <input type="email" name="email" id="login_email" placeholder="Mail..." required>
            <br>
            <br>
            <label></label>
            <input type="password" name="password" id="login_password" placeholder="Password..." required>
            <br>
            <br>
            <input class="submit" type="submit" name="input" value="Me Connecter">
        </form>
        <h5>Vous n'avez pas de compte ? <br>
            <a id="btnInscription" href="/?go=register">Inscrivez-vous ici!</a>
        </h5>
        <h5> <a href="#">Mot de passe oublié?</a></h5>
    </div>
</body>

</html>
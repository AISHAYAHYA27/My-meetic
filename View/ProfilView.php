<?php
$usersJson = file_get_contents("http://localhost/my_meetic/search.php");
$users = json_decode($usersJson, true);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/profil.css">
    <title>MY MEETIC</title>
</head>

<body>


    <div class="user-profile">
        <div class="profile-header">
            <img class="profile-pic" src="assets/avatars/Randy_Black.jpg" alt="Profile Picture">
            <h2>Nom Utilisateur</h2>
        </div>
        <div class="user-info">
            <p>Email: utilisateur@example.com</p>
            <p>Loisirs: Basketball, Lecture</p>
        </div>
        <div class="buttons">

            <form action="/update" method="POST">
                <button type="submit" class="update-profile">Mettre à jour le profil</button>
            </form>


            <form method="POST" action="profile.php?action=addLoisir">
                <button type="submit" class="add-loisir">Ajouter un loisir</button>
            </form>


            <form action="/delete-account" method="POST">
                <button type="submit" class="deactivate-account">Supprimer mon compte</button>
            </form>


            <form action="/logout" method="POST">
                <button type="submit" class="logout">Se déconnecter</button>
            </form>
        </div>
    </div>


    <div class="form-section">
        <h3>Modifier Mes informations</h3>
        <form method="POST" action="/update-profile">
            <input type="text" name="first_name" placeholder="Prénom" value="firstname">
            <input type="text" name="last_name" placeholder="Nom" value="lastname">
            <input type="email" name="email" placeholder="Email" value="email@example.com">
            <button type="submit">Mettre à jour</button>
        </form>
    </div>


    <div class="form-section">
        <h3>Ajouter un loisir</h3>
        <form method="POST" action="profilView.php?action=addLoisir">
            <input type="text" name="loisir_name" placeholder="Loisir">
            <button type="submit">Ajouter un loisir</button>
        </form>
    </div>

</body>

</html>
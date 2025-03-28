<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../inscription.css">
    <title>MY MEETIC</title>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <h2>INSCRIPTION</h2>
        <form action="/" method="POST">

            <label>
                <input type="text" name="lastname" id="lastname" placeholder=" Nom..." required>
            </label>
            <br>
            <br>
            <label>
                <input type="text" name="firstname" id="firstname" placeholder=" Prenom..." required>
            </label>
            <br>
            <br>
            <label for="pseudo"></label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo...">
            <br>
            <br>
            <label for="email"> </label>
            <input type="email" name="email" id="email" placeholder="Mail..." required>
            <br>
            <br>
            <label for="city"> </label>
            <input type="text" name="city" id="city" placeholder=" Ville..." required>
            <br>
            <br>
            <label for="country"></label>
            <input type="text" name="country" id="country" placeholder=" Pays..." required>
            <br>
            <br>
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Password..." required>
            <br>
            <br>
            <label for="birthdate"></label>
            <input type="date" name="birthdate" id="birthdate">
            <br>
            <br>
            <label for="genre"> </label>
            <select name="genre" id="genre">
                <option value="1">Homme</option>
                <option value="2">Femme</option>
                <option value="3">Autre</option>
            </select>
            <br>
            <br>

            <label>
                <select name="loisir_name" id="loisir_name">
                    <option value="Dance">Dance</option>
                    <option value="Film">Film</option>
                    <option value="Randonné">Randonné</option>
                    <option value="Lecture">Lecture</option>
                    <option value="Manga">Manga</option>
                    <option value="Cuisine">Cuisine</option>
                    <option value="Dessin">Dessin</option>
                    <option value="Cuisine">Cuisine</option>
                    <option value="Foot">Foot</option>
                    <option value="Musique">Musique</option>
                    <option value="Sport">Sport</option>
                    <option value="Jeux vidéos">jeux videos</option>
                    <option value="Autres">Autres</option>
                </select>
            </label>
            <br>
            <br>
            <input class="submit" type="submit" name="input" value="M'inscrire">
        </form>


    </div>
    <h5>Vous avez deja un compte ?
        <a id="btnConnexion" href="/?go=login">Connectez vous !</a>
    </h5>
</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY MEETIC</title>
</head>

<body>
    <form method="GET" action="search.php">

        <label>Genre :</label>
        <select name="genre">
            <option value="">Tous</option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <option value="Autres">Autres</option>
        </select>

        <label>Ville :</label>
        <select name="city[]" multiple>
            <option value="Paris">Paris</option>
            <option value="Lyon">Lyon</option>
            <option value="Marseille">Marseille</option>
            <option value="Autre">Autre (à préciser)</option>
        </select>
        <input type="text" name="city_autre" placeholder="Autre ville">

        <label>age :</label>
        <select name="age">
            <option value="">Toutes</option>
            <option value="18-25">18-25 ans</option>
            <option value="25-35">25-35 ans</option>
            <option value="35-45">35-45 ans</option>
            <option value="45+">45 ans et plus</option>
        </select>


        <label>Loisir :</label>
        <select name="loisir[]" multiple>
            <option value="Dance">Dance</option>
            <option value="Skateboard">Skateboard</option>
            <option value="Manga">Manga</option>
            <option value="Licorne">Licorne</option>
            <option value="Cuisiner">Cuisiner</option>
            <option value="Autre">Autre (à préciser)</option>
        </select>
        <input type="text" name="loisir_autre" placeholder="Autre loisir">

        <button type="submit">Rechercher</button>
    </form>
</body>

</html>
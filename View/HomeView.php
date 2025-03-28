<?php
require_once __DIR__ . '/../config/bdd.php';
require_once __DIR__ . '/../Controller/SearchController.php';
$pdo = getDatabaseConnexion();
$controller = new SearchController($pdo);
//$json = file_get_contents("http://localhost:8000/my_meetic/search.php"); ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/home.css">
    <title>MY MEETIC</title>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="/assets/logonoir1.png" alt="logo love">
        </div>
        <div class="search-container">
            <a href="/View/ProfilView.php">
                <img class="logoUtilisateurs" src="assets/user.jpeg" alt="logo Utilisateurs">
            </a>
        </div>
    </nav>

    <div class="barre_search">
        <input class="search" type="text" placeholder="Search" id="search-bar">
        <input class="submit" type="submit" value="search">
    </div>

    <header>

        <div class="carousel-container">
            <div class="carousel">
                <?php

                if (isset($user) && is_array($user)):
                    foreach ($user as $user):

                ?>
                        <div class="carousel-item">

                            <img src="/assets/avatars/<?php echo $user['profile_pic'] ?: 'default.jpg'; ?>" alt="Photo de profil">


                            <p><?php echo $user['firstname'] ? $user['firstname'] : $user['pseudo']; ?></p>


                            <p>Age: <?php echo $this->model->calculateAge($user['birthdate']); ?> ans</p>


                            <p>Loisir préféré: <?php echo $user['loisir_name']; ?></p>
                        </div>
                    <?php
                    endforeach;
                else:
                    ?>
                    <p>Aucun utilisateur trouvé.</p>
                <?php endif; ?>

            </div>
            <button class="prev">Précédent</button>
            <button class="next">Suivant</button>
        </div>
    </header>

    <div class="content"></div>

    <footer>
        <div>

        </div>
    </footer>

    <script src="/script.js" defer></script>
</body>

</html>
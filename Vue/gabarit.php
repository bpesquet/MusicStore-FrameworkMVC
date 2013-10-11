<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Feuilles de style -->
        <link rel="stylesheet" href="Librairies/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="Contenu/style.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="Contenu/Images/favicon.png">

        <!-- Titre -->
        <title>PHP Music Store - <?= $titre ?></title>
    </head>
    <body>
        <!-- Barre de navigation en haut de la page -->
        <div class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Lien de retour à la page d'accueil -->
            <a class="navbar-brand" href=""><span class="glyphicon glyphicon-headphones"></span> PHP Music Store</a>
        </div>

        <div class="container">
            <?= $contenu ?>

            <footer class="well well-sm">
                <p class="text-center">Le PHP Music Store est un site à vocation pédagogique construit avec PHP, HTML5, CSS et Bootstrap.</p>
            </footer>

        </div>
    </body>
</html>
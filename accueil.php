<?php
// Accès aux données
$bdd = new PDO('mysql:host=localhost;dbname=musicstore;charset=utf8', 'root', '');
$genres = $bdd->query("select G.GEN_ID as id, GEN_NOM as nom, count(ALB_ID) AS nbAlbums " .
        "from T_GENRE G left join T_ALBUM A on G.GEN_ID=A.GEN_ID group by G.GEN_ID order by GEN_NOM");
?>

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
        <title>The PHP Music Store</title>
    </head>
    <body>
        <!-- Barre de navigation en haut de la page -->
        <div class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Lien de retour à la page d'accueil -->
            <a class="navbar-brand" href=""><span class="glyphicon glyphicon-headphones"></span> PHP Music Store</a>
        </div>

        <div class="container">
            <ul class="breadcrumb">
                <li><span class="glyphicon glyphicon-home"></span> <a href="">Accueil</a> 
                </li>
            </ul>

            <div class="row">
                <nav class="col-md-3 col-sm-4">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Genres musicaux</div>
                        <!-- List group -->
                        <div class="list-group">
                            <?php foreach ($genres as $genre): ?>
                                <a class="list-group-item" href="genre.php?id=<?= $genre['id'] ?>">
                                    <?= $genre['nom'] ?> <span class="badge pull-right"><?= $genre['nbAlbums'] ?></span>
                                </a>                              
                            <?php endforeach; ?>
                        </div>
                    </div>
                </nav>

                <!-- Partie principale de la page d'accueil -->
                <div class="col-md-9 col-sm-8">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-responsive" id="imgAccueil" src="Contenu/Images/BannerFIB.png" />
                        </div>
                        <div class="col-md-6">
                            <h2>Music Is Life <span class="glyphicon glyphicon-headphones"></span><br> <small>Bienvenue sur le PHP Music Store !</small></h2>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="well well-sm">
                <p class="text-center">Le PHP Music Store est un site à vocation pédagogique construit avec PHP, HTML5, CSS et Bootstrap.</p>
            </footer>

        </div>
    </body>
</html>
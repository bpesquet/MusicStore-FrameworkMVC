<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <base href="<?= $racineWeb ?>" >

        <!-- Feuilles de style -->
        <link rel="stylesheet" href="Librairies/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="Librairies/font-awesome/css/font-awesome.min.css" >
        <link rel="stylesheet" href="Contenu/style.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="Contenu/Images/favicon.png">

        <!-- Titre (dynamique) -->
        <title>The PHP Music Store - <?= $titre ?></title>
    </head>
    <body>
        <!-- Barre de navigation en haut de la page -->
        <div class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <!-- Bouton affiché à droite si la zone d'affichage est trop petite -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Activer la navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Lien de retour à la page d'accueil -->
                <a class="navbar-brand" href=""><i class="icon-headphones"></i> PHP Music Store</a>
            </div>

            <div class="collapse navbar-collapse">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-default">Rechercher</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user icon-white"></i> Non connecté <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a id="lienIdentification" class="btn btn-warning" href="#">Identifiez-vous</a></li>
                            <li class="divider"></li>
                            <li class="disabled"><a href="#">Informations personnelles</a></li>
                            <li class="disabled"><a href="#">Commandes</a></li>
                        </ul>
                    </li>
                    <li>
                        <button type="button" class="btn btn-default btn-primary navbar-btn">
                            <i class="icon-shopping-cart icon-white"></i> Panier <span class="badge">0</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container">
            <?php require 'Vue/Partielles/filAriane.php'; ?>

            <div class="row">
                <!-- Contenu de la page (dynamique) -->
                <?= $contenu ?>
            </div>
        </div>

        <!--footer>
            <p class="text-center">Le PHP Music Store est construit à l'aide des technologies PHP, HTML5 et CSS.</p>
        </footer-->
        <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
            <p class="text-center">Le PHP Music Store est construit à l'aide des technologies PHP, HTML5 et CSS.</p>
        </nav>

        <script src="Librairies/jquery/jquery-1.10.1.min.js"></script>
        <script src="Librairies/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
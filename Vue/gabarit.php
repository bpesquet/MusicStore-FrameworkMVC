<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

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
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="#"><i class="icon-headphones"></i> PHP Music Store</a>
                    <form class="navbar-search">
                        <input type="text" class="search-query" placeholder="Rechercher...">
                    </form>

                    <a class="btn btn-primary pull-right" href="#"><i class="icon-shopping-cart icon-white"></i> Panier <span class="badge">0</span></a>
                    <ul class="nav pull-right">
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
                    </ul>

                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Fil d'Ariane -->
            <ul class="breadcrumb">
                <li><i class="icon-home"></i> <a href="#">Accueil</a> <span class="divider">/</span></li>
                <li><i class="icon-music"></i> <a href="#">Rock</a> <span class="divider">/</span></li>
                <li><i class="icon-male"></i> <a href="#">The White Stripes</a> <span class="divider">/</span></li>
                <li class="active"><i class="icon-volume-up"></i> Get Behind Me Satan</li>
            </ul>

            <div class="row-fluid">
                <!-- Contenu de la page (dynamique) -->
                <?= $contenu ?>
            </div>
        </div>

        <footer>
            <p class="text-center">Le PHP Music Store est construit à l'aide des technologies PHP, HTML5 et CSS.</p>
        </footer>

        <script src="Librairies/jquery/jquery-1.10.1.min.js"></script>
        <script src="Librairies/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
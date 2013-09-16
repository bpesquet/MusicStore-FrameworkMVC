<?php $titre = 'Accueil' ?>

<?php ob_start() ?>
<aside class="col-md-3 col-sm-4 hidden-xs">
    <?php require 'Vue/Partielles/menuGenres.php'; ?>
</aside>

<!-- Partie principale de la page d'accueil -->
<div class="col-md-9 col-sm-8 col-xs-12">
    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive" style="border-radius: 7px; border:4px solid white; box-shadow: 1px 1px 10px #555;" src="Contenu/Images/BannerFIB.png" />
        </div>
        <div class="col-md-6">
            <h2>Music Is Life <i class="icon-headphones"></i><br> <small>Bienvenue sur le PHP Music Store !</small></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3>Nouveautés <small>Les dernières sorties musicales</small></h3>
        </div>
    </div>

    <div class="row">
        <?php foreach ($albumsRecents as $album): ?>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <a href="navigation/album/<?= $album['id'] ?>" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" title="<?= $album["nom"] ?>" />
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php $contenu = ob_get_clean() ?>

<?php require 'Vue/gabarit.php' ?>


<?php $this->titre = $this->nettoyer($album['nom']) ?>

<ul class="breadcrumb">
    <li><span class="glyphicon glyphicon-home"></span> <a href="">Accueil</a></li>
    <li><span class="glyphicon glyphicon-music"></span> 
        <a href="navigation/index/<?= $this->nettoyer($genreSelectionne['id']) ?>"><?= $this->nettoyer($genreSelectionne['nom']) ?></a>
    </li>
    <li><span class="glyphicon glyphicon-record"></span> <?= $this->nettoyer($album['nom']) ?>
    </li>
</ul>

<div class="row">
    <nav class="col-md-3 col-sm-4">
        <?php require 'Vue/_Commun/menuNavigation.php'; ?>
    </nav>

    <div class="col-md-9 col-sm-8">
        <h2><?= $this->nettoyer($album['nom']) ?> <small><?= $this->nettoyer($album['nomArtiste']) ?></small></h2>
        <div class="row">
            <div class="col-md-5 col-xs-7">
                <img class="img-responsive" id="imgAlbum" src="Contenu/Images/Albums/<?= $this->nettoyer($album['image']) ?>" title="<?= $this->nettoyer($album["nom"]) ?>" />
            </div>
        </div>
        <button class="btn btn-primary" id="btnAjouter"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier</button>
    </div>
</div>

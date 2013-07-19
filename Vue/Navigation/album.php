<?php $titre = $album['nom'] ?>

<?php ob_start() ?>
<aside class="span2">
    <?php require 'Vue/Partielles/menuGenres.php'; ?>
</aside>

<!-- Partie principale de la page d'accueil -->
<div class="span10">
    <h3><?= $album['nom'] ?></h3>
    <img src="Contenu/Images/placeholder_big.jpg" alt="" />
    <h4>Artiste : <?= $album['nomArtiste'] ?></h4>
    <h4>Genre : <?= $nomGenre ?></h4>
    <a class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i> Ajouter au panier</a>
</div>
<?php $contenu = ob_get_clean() ?>

<?php require 'Vue/gabarit.php' ?>


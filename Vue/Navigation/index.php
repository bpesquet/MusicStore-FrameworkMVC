<?php $titre = $nomGenre ?>

<?php ob_start() ?>
<aside class="col-md-3 col-sm-4 hidden-xs">
    <?php require 'Vue/Partielles/menuGenres.php'; ?>
</aside>

<!-- Partie principale de la page d'accueil -->
<div class="col-md-9 col-sm-8 col-xs-12">
    <?php if (isset($idGenre)): ?>
        <?php if ($albums->rowCount() > 0): ?>
            <?php if (isset($nomGenre)) : ?>
                <h3>Liste des albums <?= $nomGenre ?></h3>
            <?php else: ?>
                <h3>Liste des albums</h3>
            <?php endif; ?>

            <div class="row">
                <?php foreach ($albums as $album): ?>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <a href="navigation/album/<?= $album['id'] ?>" class="thumbnail">
                            <img src="Contenu/Images/placeholder.gif" title="<?= $album["nom"] ?>" />
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <ul class="thumbnails">
                <?php foreach ($albums as $album): ?>
                    <li class="miniatureAlbum">
                        <a href="navigation/album/<?= $album['id'] ?>" class="thumbnail">
                            <img src="Contenu/Images/placeholder.gif" title="<?= $album["nom"] ?>" />
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <h3>Aucun album <?= $nomGenre ?> n'est disponible.</h3>
        <?php endif; ?>
    <?php else: ?>
        <div class="alert alert-warning">
            Sélectionnez un genre musical pour afficher les albums associés.
        </div>
    <?php endif; ?>
</div>
<?php $contenu = ob_get_clean() ?>

<?php require 'Vue/gabarit.php' ?>


<?php $titre = $nomGenre ?>

<?php ob_start() ?>
<aside class="span2">
    <?php require 'Vue/Partielles/menuGenres.php'; ?>
</aside>

<!-- Partie principale de la page d'accueil -->
<div class="span10">
    <?php if (isset($idGenre)): ?>
        <?php if ($albums->rowCount() > 0): ?>
            <?php if (isset($nomGenre)) : ?>
                <h3>Liste des albums <?= $nomGenre ?></h3>
            <?php else: ?>
                <h3>Liste des albums</h3>
            <?php endif; ?>

            <ul class="thumbnails">
                <?php foreach ($albums as $album): ?>
                    <li class="miniatureAlbum">
                        <a href="navigation/album/<?= $album['id'] ?>" href="#">
                            <img src="Contenu/Images/placeholder.gif" alt="" />
                            <span><?= $album["nom"] ?></span>
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


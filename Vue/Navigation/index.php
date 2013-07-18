<?php $titre = '$nomGenre' ?>

<?php ob_start() ?>
<aside class="span2">
    <?php require 'Vue/Partielles/menuGenres.php'; ?>
</aside>

<!-- Partie principale de la page d'accueil -->
<div class="span10">
    <section>
        <h3>Albums <?= $nomGenre ?></h3>
        <ul class="thumbnails">
            <?php foreach ($albums as $album): ?>
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#"><?= $album["nom"] ?></a></p>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</div>
<?php $contenu = ob_get_clean() ?>

<?php require 'Vue/gabarit.php' ?>


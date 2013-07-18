<?php $titre = 'Accueil' ?>

<?php ob_start() ?>
<aside class="span2">
    <?php require 'Vue/Partielles/menuGenres.php'; ?>
</aside>

<!-- Partie principale de la page d'accueil -->
<div class="span10">
    <div class="row-fluid">
        <div class="span5 offset2">
            <img style="float:right; border-radius: 7px; border:4px solid white; box-shadow: 1px 1px 10px #555;" src="Contenu/Images/BannerFIB.png" />
        </div>
        <div class="span5">
            <h2>Music Is Life <i class="icon-headphones"></i><br> <small>Bienvenue sur le PHP Music Store !</small></h2>
        </div>
    </div>

    <section>
        <h3>Nouveautés <small>Les dernières sorties musicales</small></h3>
        <ul class="thumbnails">
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
        </ul>
    </section>

    <section>
        <h3>Meilleures ventes <small>Nos albums les plus populaires</small></h3>
        <ul class="thumbnails">
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
            <li class="span2">
                <a href="#" class="thumbnail">
                    <img src="Contenu/Images/placeholder.gif" alt="">
                </a>
                <p class="text-center"><a href="#">Back In Black</a></p>
            </li>
        </ul>
    </section>
</div>
<?php $contenu = ob_get_clean() ?>

<?php require 'Vue/gabarit.php' ?>


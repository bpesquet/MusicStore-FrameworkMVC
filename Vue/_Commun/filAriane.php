<!-- Fil d'Ariane -->
<ul class="breadcrumb">
    <li><span class="glyphicon glyphicon-home"></span> <a href="">Accueil</a></li>
    <?php if (isset($filArianeNiveau2)): ?>
        <li><i class="icon-music"></i> 
            <a href="navigation/index/<?= $idGenre ?>"><?= $nomGenre ?></a>
        </li>
        <?php if (isset($idAlbum) && isset($nomAlbum)): ?>
            <li class="active"><i class="icon-volume-up"></i> 
                <?= $album['nom'] ?>               
            </li>
        <?php endif; ?>
    <?php endif; ?>
</ul>


<ul class="breadcrumb">
    <li><i class="icon-home"></i> <a href="">Accueil</a> 
    </li>
    <?php if (isset($idGenre) && isset($nomGenre)): ?>
        <li><i class="icon-music"></i> 
            <a href="navigation/index/<?= $idGenre ?>"><?= $nomGenre ?></a>
        </li>
        <?php if (isset($idAlbum) && isset($nomAlbum)): ?>
            <li class="active"><i class="icon-volume-up"></i> 
                <?= $album['nom'] ?>               
            </li>
        <?php endif; ?>
    <?php endif; ?>
<!--li><i class="icon-male"></i> <a href="#">The White Stripes</a> <span class="divider">/</span></li>
<li class="active"><i class="icon-volume-up"></i> Get Behind Me Satan</li-->
</ul>

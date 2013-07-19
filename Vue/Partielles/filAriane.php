<!-- Fil d'Ariane -->
<ul class="breadcrumb">
    <li><i class="icon-home"></i> <a href="">Accueil</a> 
        <?php if (isset($idGenre)): ?>
            <span class="divider">/</span>
        <?php endif; ?>
    </li>
    <?php if (isset($idGenre) && isset($nomGenre)): ?>
        <li><i class="icon-music"></i> 
            <a href="navigation/index/<?= $idGenre ?>"><?= $nomGenre ?></a>
            <?php if (isset($idAlbum)): ?>
                <span class="divider">/</span>
            <?php endif; ?>
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

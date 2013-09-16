<!-- Menu de navigation par genre -->

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Genres musicaux</div>
    <!-- List group -->
    <div class="list-group">
        <?php foreach ($genres as $genre): ?>
            <?php
            $classeLien = "list-group-item";
            if (isset($nomGenre) && ($nomGenre == $genre['nom'])) {
                $classeLien .= " active";
            }
            ?>
            <a class="<?= $classeLien ?>" href="navigation/index/<?= $genre['id'] ?>">
                <?= $genre['nom'] ?> <span class="badge pull-right"><?= $genre['nbAlbums'] ?></span>
            </a>
        <?php endforeach; ?>

    </div>
</div>


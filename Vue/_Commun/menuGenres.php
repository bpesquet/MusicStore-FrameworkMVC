<!-- Menu de navigation par genre -->
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Genres musicaux</div>
    <!-- List group -->
    <div class="list-group">
        <?php foreach ($genres as $genre): ?>
            <?php
            $estSelectionne = false;
            if (isset($genreSelectionne) && ($genreSelectionne['id'] == $genre['id'])) {
                $estSelectionne = true;
            }
            ?>
            <a class="list-group-item <?= $estSelectionne ? 'active' : '' ?>" href="navigation/genre/<?= $this->nettoyer($genre['id']) ?>">
                <?= $this->nettoyer($genre['nom']) ?> <span class="badge pull-right"><?= $this->nettoyer($genre['nbAlbums']) ?></span>
            </a>                              
        <?php endforeach; ?>
    </div>
</div>



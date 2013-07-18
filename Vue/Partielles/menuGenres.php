<!-- Menu de navigation par genre -->
<div class="well sidebar-nav">
    <ul class="nav nav-list">
        <li class="nav-header">Genres musicaux</li>
        <?php foreach ($genres as $genre): ?>
            <?php if (isset($nomGenre) && ($nomGenre == $genre['nom'])) : ?>
                <li class="active">
                <?php else: ?>
                <li>
                <?php endif; ?>
                <a href = "navigation/index/<?= $genre['id'] ?>"><?= $genre['nom'] ?></a>
            </li>
        <?php endforeach; ?>
        </li>
    </ul>
</div><!--/.well -->

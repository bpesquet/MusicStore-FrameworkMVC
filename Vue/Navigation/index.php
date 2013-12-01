<?php if (isset($genreSelectionne)): ?>
    <?php $this->titre = $this->nettoyer($genreSelectionne['nom']); ?>
<?php else: ?>
    <?php $this->titre = "Genres musicaux"; ?>
<?php endif; ?>

<?php require 'Vue/_Commun/barreNavigation.php'; ?>

<ul class="breadcrumb">
    <li><span class="glyphicon glyphicon-home"></span> <a href="">Accueil</a></li>
    <?php if (isset($genreSelectionne)): ?>
        <li><span class="glyphicon glyphicon-music"></span> 
            <a href="navigation/genre/<?= $this->nettoyer($genreSelectionne['id']) ?>"><?= $this->nettoyer($genreSelectionne['nom']) ?></a>
        </li>
    <?php endif; ?>
</ul>

<div class="row">
    <nav class="col-md-3 col-sm-4">
        <?php require 'Vue/_Commun/menuNavigation.php'; ?>
    </nav>

    <div class="col-md-9 col-sm-8">
        <?php if (isset($genreSelectionne)): ?>
            <?php if ($albums->rowCount() > 0): ?>
                <h3>Liste des albums <?= $this->nettoyer($genreSelectionne['nom']) ?></h3>             
                <div class="row">
                    <?php foreach ($albums as $album): ?>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <a href="navigation/album/<?= $this->nettoyer($album['id']) ?>" class="thumbnail">
                                <img src="Contenu/Images/Albums/<?= $this->nettoyer($album['image']) ?>" title="<?= $this->nettoyer($album["nom"]) ?>" />
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <h3>Aucun album <?= $this->nettoyer($genreSelectionne['nom']) ?> n'est disponible.</h3>
            <?php endif; ?>
        <?php else: ?>
            <div class="alert alert-warning">
                Sélectionnez un genre musical pour afficher les albums associés.
            </div>
        <?php endif; ?>
    </div>
</div>


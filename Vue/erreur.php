<?php $titre = 'Erreur !' ?>

<?php ob_start() ?>
<div class="alert alert-danger">
    <?= $msgErreur ?>
</div>
<?php $contenu = ob_get_clean() ?>

<?php require 'gabarit.php' ?>

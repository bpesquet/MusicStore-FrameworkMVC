<?php
$this->titre = "Contenu du panier";
?>

<?php require 'Vue/_Commun/barreNavigation.php'; ?>

<?php if ($articles->rowCount() > 0): ?>

    <h2 class="text-center">Contenu de votre panier</h2>
    <div class="table-responsive">
        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Nom de l'album</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                    <!--th></th-->  <!-- Colonne des boutons d'action -->
                </tr>
            </thead>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td><a href="navigation/album/<?= $this->nettoyer($article['idAlbum']) ?>"><?= $this->nettoyer($article['nomAlbum']) ?></a></td>
                    <td><?= $this->nettoyer($article['quantite']) ?></td>
                    <td><?= $this->nettoyer($article['prixAlbum']) ?> €</td>
                    <td><?= $this->nettoyer($article['prixTotal']) ?> €</td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td><strong>Total</td>
                <td></td>
                <td></td>
                <td><strong><?= $this->nettoyer($prixTotal) ?> €</strong></td>
            </tr>
        </table>
    </div>
    <a href="#" class="btn btn-primary disabled" id="btnAjouter">
        <span class="glyphicon glyphicon-ok"></span> Valider votre achat
    </a>
<?php else: ?>
    <div class="alert alert-info">Votre panier est vide.</div>
<?php endif; ?>


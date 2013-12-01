<?php $this->titre = "Inscription"; ?>

<?php if (isset($msgErreur)) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Erreur !</strong> <?= $this->nettoyer($msgErreur) ?>
    </div>
<?php endif; ?>
<h2 class="text-center">Inscription au PHP Music Store</h2>
<div class="well">
    <form class="form-horizontal" role="form" action="inscription/inscrire" method="post">
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <p class="form-control-static">Tous les champs sont obligatoires.</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-4 control-label">Nom</label>
            <div class="col-sm-6 col-md-4">
                <input name="nom" type="text" class="form-control" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-4 control-label">Prénom</label>
            <div class="col-sm-6 col-md-4">
                <input name="prenom" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-4 control-label">Adresse</label>
            <div class="col-sm-7 col-md-5">
                <input name="adresse" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-4 control-label">Code postal</label>
            <div class="col-sm-3 col-md-2">
                <input name="codePostal" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-4 control-label">Ville</label>
            <div class="col-sm-6 col-md-4">
                <input name="ville" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-4 control-label">Courriel</label>
            <div class="col-sm-6 col-md-4">
                <input name="courriel" type="email" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 col-md-4 control-label">Mot de passe</label>
            <div class="col-sm-6 col-md-4">
                <input name="mdp" type="password" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-edit"></span> Inscription</button>
            </div>
        </div>
    </form>
</div>


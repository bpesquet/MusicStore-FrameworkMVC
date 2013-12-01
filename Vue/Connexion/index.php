<?php $this->titre = "Connexion"; ?>

<?php if (isset($msgErreur)) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Erreur !</strong> <?= $this->nettoyer($msgErreur) ?>
    </div>
<?php endif; ?>
<h2 class="text-center">Identification client</h2>
<div class="well">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#connexion" data-toggle="tab">Connexion</a></li>
                <li><a href="#inscription" data-toggle="tab">Inscription</a></li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="connexion">
            <form class="form-signin form-horizontal" role="form" action="connexion/connecter" method="post">
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <input name="courriel" type="email" class="form-control" placeholder="Entrez votre courriel" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <input name="mdp" type="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Connexion</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="inscription">
            <form class="form-horizontal" role="form" action="connexion/inscrire" method="post">
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-5">
                        <p class="form-control-static">Tous les champs sont obligatoires.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-md-5 control-label">Nom</label>
                    <div class="col-sm-6 col-md-4">
                        <input name="nom" type="text" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-md-5 control-label">Prénom</label>
                    <div class="col-sm-6 col-md-4">
                        <input name="prenom" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-md-5 control-label">Adresse</label>
                    <div class="col-sm-6 col-md-4">
                        <input name="adresse" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-md-5 control-label">Code postal</label>
                    <div class="col-sm-3 col-md-2">
                        <input name="codePostal" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-md-5 control-label">Ville</label>
                    <div class="col-sm-6 col-md-4">
                        <input name="ville" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-md-5 control-label">Courriel</label>
                    <div class="col-sm-6 col-md-4">
                        <input name="courriel" type="email" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-md-5 control-label">Mot de passe</label>
                    <div class="col-sm-6 col-md-4">
                        <input name="mdp" type="password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-5">
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-edit"></span> Inscription</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


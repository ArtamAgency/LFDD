<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compte</title>
</head>
<body>
<div align="center">
    <ul>
        <b>Nom : </b><?=$_SESSION['user_infos'][0]['user_name']?><br/>
        <b>Email : </b><?=$_SESSION['user_infos'][0]['user_mail']?><br/>
        <?php if($enigme == 10): ?>
        <b>Enigme(s) validée(s) : </b><?= $enigme; ?> / 10
        <?php else:
            $enigme -= 1;
        ?>
        <b>Enigme(s) validée(s) : </b><?= $enigme; ?> / 10
        <?php endif ?>
    </ul>
    <form class ="form_user form-horizontal" method="post" action="User/cgPassword">
        <h4>Changer de mot de passe</h4>
        <div class="control-group">
            <div class="controls">
                <input class="validate[required]" type="password" name="curpaswd" placeholder="Mot de passe actuel">
                <?php echo form_error('curpaswd'); ?>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <input class="validate[required]" type="password" placeholder="Nouveau mot de passe" name="newpaswd">
                <?php echo form_error('newpaswd'); ?>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <input class="validate[required]" type="password" placeholder="Répéter nouveau mot de passe" name="rpnewpaswd">
                <?php echo form_error('rpnewpaswd'); ?>
            </div>
        </div>

        <button class="btn btn-large btn-primary" type="submit">Valider</button>

    </form>

    <form class ="form_user form-horizontal" method="post" action="User/cgMail">
        <h4>Changer email</h4>
        <div class="control-group">
            <div class="controls">
                <input class="validate[required]" type="email" name="curmail" placeholder="Email actuel">
                <?php echo form_error('curmail'); ?>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <input class="validate[required]" type="email" placeholder="Nouvel email" name="newmail">
                <?php echo form_error('newmail'); ?>
            </div>
        </div>

        <button class="btn btn-large btn-primary" type="submit">Valider</button>

    </form>
    <?php if ($this->session->flashdata('change')) : ?>
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?= $this->session->flashdata('change')?><strong>
        </div>
    <?php endif ?>
    <br/>
    <a href="User/logout">Se déconnecter</a>
</div>
</body>
</html>
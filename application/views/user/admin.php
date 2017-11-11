<!DOCTYPE html>
<html>
<head>
    <title>La Ferme de Didier</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/jquery/animate.css">
    <script type="text/javascript" src="<?=base_url();?>asset/jquery/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>asset/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>asset/jquery/jquery.textillate.js"></script>
    <script type="text/javascript" src="<?=base_url();?>asset/jquery/jquery.fittext.js"></script>
    <script type="text/javascript" src="<?=base_url();?>asset/jquery/jquery.lettering.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="<?=base_url();?>">Accueil</a></li>
            <li><a href="<?=base_url();?>compte">Compte</a></li>
            <li><a href="<?=base_url();?>classement">Classement</a></li>
        </ul>
    </div>
</nav>
    <h3>Joueurs</h3>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Bloqué jusqu'à</th>
                    <th>Enigme en cours</th>
                    <th>Éssais</th>
                    <th>Admin</th>
                    <th>Bloquage</th>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                        <?php if($user['user_blocked'] == 1 && $user['user_admin'] == 1): ?>
                            <tr class="warning">
                        <?php elseif($user['user_admin'] == 1): ?>
                            <tr class="info">
                        <?php elseif($user['user_blocked'] == 1): ?>
                            <tr class="danger">
                        <?php else: ?>
                            <tr>
                        <?php endif ?>
                            <td><?= $user['user_id'] ?></td>
                            <td><?= $user['user_name'] ?></td>
                            <td><?= $user['user_mail'] ?></td>
                            <?php if($user['user_blocked'] == 0){ ?>
                            <td>Non bloqué</td>
                            <?php } else { ?>
                            <td><?= $user['user_bantil'] ?></td>
                            <?php } ?>
                            <td><?= $user['enigme_id'] ?></td>
                            <td><?= $user['user_attempts'] ?></td>
                            <td>
                                <?php if($user['user_admin'] == 1): ?>
                                <a href="<?=base_url();?>User/setAdmin/<?=$user['user_id'];?>/0">Supprimer les droit</a>
                                <?php elseif($user['user_admin'] == 0): ?>
                                <a href="<?=base_url();?>User/setAdmin/<?=$user['user_id'];?>/1">Donner les droits</a>
                                <?php else: ?>
                                Super admin
                                <?php endif ?>
                            </td>
                            <?php if($user['user_admin'] < 2): ?>
                                <?php if($user['user_blocked'] == 0): ?>
                                <td>
                                    <a href="Enigme/blockUser24h/<?=$user['user_id'];?>">24h</a> /
                                    <a href="Enigme/blockUserDef/<?=$user['user_id'];?>">Définitif</a>
                                </td>
                                <?php else: ?>
                                    <td>
                                        <a href="Enigme/unblockUser/<?= $user['user_id'];?>">Débloquer</a>
                                    </td>
                                <?php endif ?>
                            <?php else: ?>
                                <?php if($user['user_blocked'] == 0): ?>
                                    <td>Non bloquable</td>
                                <?php endif ?>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<style>
    th {
        text-align: center;
    }

    table, h3 {
        font-family: 'Lato', sans-serif;
    }
</style>
</html>
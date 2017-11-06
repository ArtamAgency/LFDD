<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border: 1px solid #000;
            text-align: center;
            width: 50%;
        }
    </style>
</head>
<body>
<?php
var_dump($enigmes);
?>
<div align="center">
    <h3>Enigmes</h3>
    <table>
        <thead>
            <th>#</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Réponse</th>
        </thead>
        <tbody>
            <?php foreach($enigmes as $enigme): ?>
                <tr>
                    <td><?= $enigme['enigme_id'] ?></td>
                    <td><?= $enigme['enigme_nom'] ?></td>
                    <td><?= $enigme['enigme_description'] ?></td>
                    <td><?= $enigme['enigme_response'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <br/>
    <h3>Joueurs</h3>
    <table>
        <thead>
            <th>#</th>
            <th>Nom</th>
            <th>email</th>
            <th>bloqué jusqu'à</th>
            <th>enigme en cours</th>
            <th>éssais</th>
            <th>temps passé</th>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['user_id'] ?></td>
                <td><?= $user['user_name'] ?></td>
                <td><?= $user['user_mail'] ?></td>
                <?php if($user['user_bantil'] == NULL){ ?>
                <td>Non bloqué</td>
                <?php } else { ?>
                <td><?= $user['user_bantil'] ?></td>
                <?php } ?>
                <td><?= $user['enigme_id'] ?></td>
                <td><?= $user['user_attempts'] ?></td>
                <td><?= $user['user_spentime'] ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>
</html>
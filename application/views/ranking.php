<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classement</title>
</head>
<body>
    <h1>Classement</h1>

    <table style="text-align: center; width: 50%; border: 1px solid #000;">
        <thead>
        <th>#</th>
        <th>Nom</th>
        <th>Points</th>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($ranking as $row): ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row['user_name']; ?></td>
                    <td><?= $row['enigme_id']*10; ?></td>
                    <?php $i++; ?>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
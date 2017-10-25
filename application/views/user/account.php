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
<ul>
    <li><b>Nom : </b><?=$_SESSION['user_infos'][0]['user_name']?></li>
    <li><b>email : </b><?=$_SESSION['user_infos'][0]['user_mail']?></li>
</ul>
</body>
</html>
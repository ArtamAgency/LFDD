<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?= form_open('Enigme/enigmeHandler/'.$enigme[0]['enigme_id']); ?>
        <input type="text" name="response" class="validate[required]" placeholder="Ta réponse">
        <input type="submit" value="Valider">
    </form>
</body>
</html>
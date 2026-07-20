<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <title>Bienvenue sur votre compte</title>
</head>
<body>
    <h1>Bienvenue sur votre compte</h1>
    <h2>Numéro de téléphone : <?= session()->get('numero_telephone') ?></h2>
    <a href="<?= base_url('voirSolde') ?>">Voir le solde</a>
    <a href="<?= base_url('faireDepot') ?>">Faire un dépot</a>
    <a href="<?= base_url('faireRetrait') ?>">Faire un retrait</a>
    <a href="<?= base_url('faireTransfert') ?>">Faire un transfert</a>
    <a href="<?= base_url('voirHistorique') ?>">Voir les historiques</a>
    <a href="<?= base_url('deconnexion') ?>">Se deconnecter</a>
</body>
</html>
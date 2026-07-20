<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <title>Mon solde</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Mon solde</h1>
        <?php if ($solde): ?>
            <p>Votre solde actuel est de : <strong><?= number_format($solde['montant'], 2, ',', ' ') ?> Ar</strong></p>
        <?php else: ?>
            <p>Votre solde actuel est de : <strong>0,00 Ar</strong></p>
        <?php endif; ?>
        <a href="<?= base_url('espaceClient') ?>" class="btn btn-primary">Retour</a>
    </div>
</body>
</html>

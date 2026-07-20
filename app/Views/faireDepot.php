<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <title>Faire un dépôt</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Faire un dépôt</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('faireDepot') ?>" method="post">
            <div class="mb-3">
                <label for="montant" class="form-label">Montant :</label>
                <input type="number" id="montant" name="montant" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-success">Déposer</button>
            <a href="<?= base_url('espaceClient') ?>" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</body>
</html>

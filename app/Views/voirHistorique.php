<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <title>Historique des transactions</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Historique des transactions</h1>
        <?php if (empty($transactions)): ?>
            <p>Aucune transaction pour le moment.</p>
        <?php else: ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Montant</th>
                        <th>Frais</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $t): ?>
                        <tr>
                            <td><?= $t['date_transaction'] ?></td>
                            <td><?= $t['type_operation'] ?></td>
                            <td><?= number_format($t['montant'], 2, ',', ' ') ?> Ar</td>
                            <td>
                                <?php if ($t['type_operation'] == 'DEPOT') { ?>
                                    Pas de frais
                                <?php } else { ?>
                                    <?= number_format($t['frais'], 2, ',', ' ') ?> Ar
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="<?= base_url('espaceClient') ?>" class="btn btn-primary">Retour</a>
    </div>
</body>
</html>

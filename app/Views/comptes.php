<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Situation des comptes clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2 class="mb-4">Situation des comptes clients</h2>

    <div class="alert alert-info">
        <strong><?= $nbComptes ?></strong> comptes enregistrés —
        Total des soldes : <strong><?= number_format($totalSoldes, 0, ',', ' ') ?> Ar</strong>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Numéro de téléphone</th>
                <th>Solde</th>
                <th>Date de création</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($comptes)): ?>
                <tr><td colspan="3">Aucun compte enregistré pour le moment.</td></tr>
            <?php else: ?>
                <?php foreach ($comptes as $c): ?>
                <tr>
                    <td><?= esc($c['numero_telephone']) ?></td>
                    <td><?= number_format($c['montant'] ?? 0, 0, ',', ' ') ?> Ar</td>
                    <td><?= esc($c['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="/situation" class="btn btn-secondary">Voir situation des gains</a>

</div>

</body>
</html>
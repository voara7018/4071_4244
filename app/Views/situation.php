<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Situation des gains</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2 class="mb-4">Situation des gains</h2>

    <div class="alert alert-info">
        <strong>Total des frais collectés : <?= number_format($totalGeneral, 0, ',', ' ') ?> Ar</strong>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Type d'opération</th>
                <th>Nombre d'opérations</th>
                <th>Total des frais</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($parType)): ?>
                <tr><td colspan="3">Aucune opération enregistrée pour le moment.</td></tr>
            <?php else: ?>
                <?php foreach ($parType as $t): ?>
                <tr>
                    <td><?= esc($t['type_operation']) ?></td>
                    <td><?= $t['nb_operations'] ?></td>
                    <td><?= number_format($t['total_frais'], 0, ',', ' ') ?> Ar</td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="/situation/comptes" class="btn btn-secondary">Voir situation des comptes</a>

</div>

</body>
</html>
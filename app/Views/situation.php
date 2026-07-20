<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="breadcrumb-custom animate-slideUp">
    <a href="<?= base_url('/') ?>">Administration</a>
    <span class="separator"><i class="bi bi-chevron-right"></i></span>
    <span class="current">Situation des gains</span>
</div>

<div class="page-header animate-slideUp">
    <h1>Situation des gains</h1>
    <p class="page-subtitle">Vue d'ensemble des revenus générés par les frais de transaction</p>
</div>

<div class="row animate-slideUp delay-1 mb-4">
    <div class="col-md-6 col-lg-4">
        <div class="stat-card">
            <div class="stat-icon success">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div class="stat-label">Total des frais collectés</div>
            <div class="stat-value"><?= number_format($totalGeneral ?? 0, 0, ',', ' ') ?> Ar</div>
        </div>
    </div>
</div>

<div class="row animate-slideUp delay-2">
    <div class="col-12 mb-4">
        <div class="card-custom">
            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <h5>Gains Internes</h5>
                <span class="badge-custom primary">Réseau Local</span>
            </div>
            <div class="card-body p-0">
                <div class="table-wrapper">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th>Type d'opération</th>
                                <th>Nombre d'opérations</th>
                                <th>Total des frais</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($gainsInternes)): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Aucune opération interne enregistrée.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($gainsInternes as $t): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi <?= strtolower($t['type_operation']) == 'retrait' ? 'bi-box-arrow-up text-warning' : 'bi-arrow-left-right text-info' ?>"></i>
                                            <span class="fw-600"><?= esc($t['type_operation']) ?></span>
                                        </div>
                                    </td>
                                    <td><span class="badge-custom secondary"><?= $t['nb_operations'] ?></span></td>
                                    <td class="fw-600 text-success-custom">+ <?= number_format($t['total_frais'], 0, ',', ' ') ?> Ar</td>
                                    <td><span class="badge-custom success"><span class="dot"></span> Actif</span></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Gains Externes -->
    <div class="col-12 mb-4">
        <div class="card-custom">
            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <h5>Gains Externes</h5>
                <span class="badge-custom warning">Autres Réseaux</span>
            </div>
            <div class="card-body p-0">
                <div class="table-wrapper">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th>Type d'opération</th>
                                <th>Nombre d'opérations</th>
                                <th>Total Commissions</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($gainsExternes)): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Aucune opération externe enregistrée.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($gainsExternes as $t): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-globe text-primary"></i>
                                            <span class="fw-600"><?= esc($t['type_operation']) ?></span>
                                        </div>
                                    </td>
                                    <td><span class="badge-custom secondary"><?= $t['nb_operations'] ?></span></td>
                                    <td class="fw-600 text-success-custom">+ <?= number_format($t['total_commission_externe'], 0, ',', ' ') ?> Ar</td>
                                    <td><span class="badge-custom success"><span class="dot"></span> Actif</span></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Dettes Opérateurs -->
    <div class="col-12">
        <div class="card-custom border-danger-custom">
            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <h5 class="text-danger-custom">Dettes</h5>
                <i class="bi bi-exclamation-triangle text-danger-custom"></i>
            </div>
            <div class="card-body p-0">
                <div class="table-wrapper">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th>Opérateur</th>
                                <th>Nombre de transferts</th>
                                <th>Montant total à envoyer</th>
                                <th>Action requise</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($dettesOperateurs)): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Aucune dette envers les autres opérateurs.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($dettesOperateurs as $dette): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-custom" style="width:32px; height:32px; background:#f8d7da; color:#dc3545; display:flex; align-items:center; justify-content:center; border-radius:50%; font-weight:bold; font-size:12px;">
                                                <?= strtoupper(substr($dette['operateur_nom'], 0, 1)) ?>
                                            </div>
                                            <span class="fw-600"><?= esc($dette['operateur_nom']) ?></span>
                                        </div>
                                    </td>
                                    <td><span class="badge-custom secondary"><?= $dette['nb_operations'] ?></span></td>
                                    <td class="fw-600 text-danger-custom">- <?= number_format($dette['total_du'], 0, ',', ' ') ?> Ar</td>
                                    <td>
                                        <button class="btn-custom btn-sm btn-danger-custom">Régler</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
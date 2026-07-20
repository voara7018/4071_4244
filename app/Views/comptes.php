<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="breadcrumb-custom animate-slideUp">
    <a href="<?= base_url('/') ?>">Administration</a>
    <span class="separator"><i class="bi bi-chevron-right"></i></span>
    <span class="current">Comptes clients</span>
</div>

<div class="page-header animate-slideUp">
    <h1>Comptes clients</h1>
    <p class="page-subtitle">Vue d'ensemble des utilisateurs et de leurs soldes</p>
</div>

<div class="row animate-slideUp delay-1 mb-4">
    <div class="col-md-6 col-lg-4">
        <div class="stat-card">
            <div class="stat-icon primary">
                <i class="bi bi-people"></i>
            </div>
            <div class="stat-label">Comptes enregistrés</div>
            <div class="stat-value"><?= $nbComptes ?? 0 ?></div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
        <div class="stat-card">
            <div class="stat-icon info">
                <i class="bi bi-wallet2"></i>
            </div>
            <div class="stat-label">Total des soldes</div>
            <div class="stat-value"><?= number_format($totalSoldes ?? 0, 0, ',', ' ') ?> Ar</div>
        </div>
    </div>
</div>

<div class="row animate-slideUp delay-2">
    <div class="col-12">
        <div class="card-custom">
            <div class="card-header-custom">
                <h5>Liste des clients</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-wrapper">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Numéro de téléphone</th>
                                <th>Solde Actuel</th>
                                <th>Date d'inscription</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($comptes)): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Aucun compte enregistré pour le moment.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($comptes as $c): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="btn-icon" style="background: var(--bg-main); color: var(--primary);">
                                                <?= strtoupper(substr($c['numero_telephone'], 0, 2)) ?>
                                            </div>
                                            <span class="fw-600">Client</span>
                                        </div>
                                    </td>
                                    <td><?= esc($c['numero_telephone']) ?></td>
                                    <td class="fw-700"><?= number_format($c['montant'] ?? 0, 0, ',', ' ') ?> Ar</td>
                                    <td><span class="text-muted"><?= date('d/m/Y', strtotime($c['created_at'])) ?></span></td>
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
</div>

<?= $this->endSection() ?>
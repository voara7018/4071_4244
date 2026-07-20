<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="page-header animate-slideUp">
    <h1>Tableau de bord Administrateur</h1>
    <p class="page-subtitle">Vue d'ensemble et gestion du système Mobile Money</p>
</div>

<div class="row g-4 animate-slideUp delay-1">
    
    <div class="col-md-3 col-6">
        <a href="<?= base_url('operation') ?>" class="quick-action">
            <div class="action-icon" style="background: var(--info-light); color: var(--info);">
                <i class="bi bi-gear"></i>
            </div>
            <div class="action-label">Barème des frais</div>
        </a>
    </div>
    
    <div class="col-md-3 col-6">
        <a href="<?= base_url('prefixes') ?>" class="quick-action">
            <div class="action-icon" style="background: var(--success-light); color: var(--success);">
                <i class="bi bi-hash"></i>
            </div>
            <div class="action-label">Préfixes</div>
        </a>
    </div>

    <div class="col-md-3 col-6">
        <a href="<?= base_url('situation_financiere') ?>" class="quick-action">
            <div class="action-icon" style="background: rgba(109, 1, 1, 0.1); color: var(--primary-dark);">
                <i class="bi bi-graph-up"></i>
            </div>
            <div class="action-label">Situation Gains</div>
        </a>
    </div>
    
    <div class="col-md-3 col-6">
        <a href="<?= base_url('comptabilite') ?>" class="quick-action">
            <div class="action-icon" style="background: var(--warning-light); color: var(--warning);">
                <i class="bi bi-people"></i>
            </div>
            <div class="action-label">Comptes clients</div>
        </a>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="page-header animate-slideUp">
    <h1>Tableau de bord</h1>
    <p class="page-subtitle">Bienvenue sur votre espace personnel, <?= session()->get('numero_telephone') ?></p>
</div>

<div class="row g-4 animate-slideUp delay-1">
    <div class="col-lg-12">
        <div class="balance-card">
            <div class="balance-label">Solde disponible</div>
            <div class="balance-amount">Consulter <i class="bi bi-eye ms-2" style="font-size: 1.5rem; cursor:pointer;" onclick="window.location.href='<?= base_url('voirSolde') ?>'"></i></div>
            <div class="balance-phone"><i class="bi bi-telephone-fill me-2"></i> <?= session()->get('numero_telephone') ?></div>
        </div>
    </div>
</div>

<div class="row g-4 mt-2 animate-slideUp delay-2">
    <div class="col-md-3 col-6">
        <a href="<?= base_url('faireDepot') ?>" class="quick-action">
            <div class="action-icon" style="background: var(--success-light); color: var(--success);">
                <i class="bi bi-box-arrow-in-down"></i>
            </div>
            <div class="action-label">Dépôt</div>
        </a>
    </div>
    
    <div class="col-md-3 col-6">
        <a href="<?= base_url('faireRetrait') ?>" class="quick-action">
            <div class="action-icon" style="background: var(--warning-light); color: var(--warning);">
                <i class="bi bi-box-arrow-up"></i>
            </div>
            <div class="action-label">Retrait</div>
        </a>
    </div>
    
    <div class="col-md-3 col-6">
        <a href="<?= base_url('faireTransfert') ?>" class="quick-action">
            <div class="action-icon" style="background: var(--info-light); color: var(--info);">
                <i class="bi bi-arrow-left-right"></i>
            </div>
            <div class="action-label">Transfert</div>
        </a>
    </div>
    
    <div class="col-md-3 col-6">
        <a href="<?= base_url('voirHistorique') ?>" class="quick-action">
            <div class="action-icon" style="background: rgba(109, 1, 1, 0.1); color: var(--primary-dark);">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="action-label">Historique</div>
        </a>
    </div>
</div>

<?= $this->endSection() ?>
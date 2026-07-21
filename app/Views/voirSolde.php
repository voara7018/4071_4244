<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="breadcrumb-custom animate-slideUp">
    <a href="<?= base_url('espaceClient') ?>">Tableau de bord</a>
    <span class="separator"><i class="bi bi-chevron-right"></i></span>
    <span class="current">Mon solde</span>
</div>

<div class="page-header animate-slideUp">
    <h1>Mon solde </h1>
    <p class="page-subtitle">Consultez votre solde actuel</p>
</div>

<div class="row animate-slideUp delay-1">
    <div class="col-lg-6 col-md-8">
        <div class="balance-card text-center" style="padding-top: var(--space-xl); padding-bottom: var(--space-xl);">
            <div class="balance-label"><i class="bi bi-wallet2 me-2"></i> Solde disponible</div>
            <?php if (isset($solde) && $solde): ?>
                <div class="balance-amount mb-0" style="font-size: 3rem; margin-top: 1rem;"><?= number_format($solde['montant'], 0, ',', ' ') ?> Ar</div>
            <?php else: ?>
                <div class="balance-amount mb-0" style="font-size: 3rem; margin-top: 1rem;">0 Ar</div>
            <?php endif; ?>
        </div>
        
        <div class="mt-4 text-center">
            <a href="<?= base_url('espaceClient') ?>" class="btn-custom btn-secondary-custom">
                <i class="bi bi-arrow-left"></i> Retour au tableau de bord
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

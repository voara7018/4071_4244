<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="breadcrumb-custom animate-slideUp">
    <a href="<?= base_url('espaceClient') ?>">Tableau de bord</a>
    <span class="separator"><i class="bi bi-chevron-right"></i></span>
    <span class="current">Retrait</span>
</div>

<div class="page-header animate-slideUp">
    <h1>Faire un retrait</h1>
    <p class="page-subtitle">Retirez de l'argent de votre compte</p>
</div>

<div class="row animate-slideUp delay-1">
    <div class="col-lg-6 col-md-8">
        <div class="form-card">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-custom alert-danger-custom" data-autodismiss>
                    <i class="bi bi-exclamation-circle"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('faireRetrait') ?>" method="post">
                <div class="form-group-custom">
                    <label for="montant">Montant à retirer (Ariary)</label>
                    <div class="input-group-custom">
                        <input type="number" id="montant" name="montant" class="form-input" required min="100">
                        <span class="input-append">Ar</span>
                    </div>
                    <div class="form-hint">Des frais de retrait seront appliqués selon le barème.</div>
                </div>

                <div class="d-flex gap-3 mt-xl">
                    <button type="submit" class="btn-custom btn-warning-custom flex-grow-1">
                        <i class="bi bi-box-arrow-up"></i> Confirmer le retrait
                    </button>
                    <a href="<?= base_url('espaceClient') ?>" class="btn-custom btn-ghost">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

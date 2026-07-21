<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="breadcrumb-custom animate-slideUp">
    <a href="<?= base_url('/') ?>">Administration</a>
    <span class="separator"><i class="bi bi-chevron-right"></i></span>
    <span class="current">Préfixes</span>
</div>

<div class="page-header animate-slideUp">
    <h1>Gestion des promotion</h1>
    <p class="page-subtitle">Ajoutez pourcentages</p>
</div>

<div class="row animate-slideUp delay-1">
    <div class="col-lg-6">
        <div class="form-card">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert-custom alert-success-custom" data-autodismiss>
                    <i class="bi bi-check-circle"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-custom alert-danger-custom" data-autodismiss>
                    <i class="bi bi-exclamation-circle"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('promotion/insert') ?>" method="post">
                                <div class="form-group-custom">
                    <label for="prefixes">Promotion (%)</label>
                    <div class="input-group-custom">
                        <span class="input-prepend"><i class="bi bi-percent"></i></span>
                       <input type="number" id="prefixes" name="promotion" class="form-input" 
       placeholder="Entrez la commission" step="0.01" min="0" max="100" required>
                </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn-custom btn-primary-custom">
                        <i class="bi bi-plus-circle"></i> Ajouter le pourcentage
                    </button>
                </div>
            </form>
           
        </div>
    </div>
</div>

<?= $this->endSection() ?>
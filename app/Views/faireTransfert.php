<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="breadcrumb-custom animate-slideUp">
    <a href="<?= base_url('espaceClient') ?>">Tableau de bord</a>
    <span class="separator"><i class="bi bi-chevron-right"></i></span>
    <span class="current">Transfert</span>
</div>

<div class="page-header animate-slideUp">
    <h1>Faire un transfert</h1>
    <p class="page-subtitle">Envoyez de l'argent à un autre utilisateur Mobile Money</p>
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

            <form action="<?= base_url('faireTransfert') ?>" method="post">
                <div class="form-group-custom">
                    <label for="destinataire">Numéro du destinataire</label>
                    <div class="input-group-custom">
                        <span class="input-prepend"><i class="bi bi-person"></i></span>
                        <input type="text" id="destinataire" name="destinataire" class="form-input" placeholder="Ex: 0340012345" required>
                    </div>
                </div>

                <div class="form-group-custom">
                    <label for="montant">Montant à transférer (Ariary)</label>
                    <div class="input-group-custom">
                        <input type="number" id="montant" name="montant" class="form-input" required min="100">
                        <span class="input-append">Ar</span>
                    </div>
                    <div class="form-hint">Des frais de transfert seront appliqués selon le barème.</div>
                </div>

                <div class="d-flex gap-3 mt-xl">
                    <button type="submit" class="btn-custom btn-primary-custom flex-grow-1">
                        <i class="bi bi-send"></i> Transférer
                    </button>
                    <a href="<?= base_url('espaceClient') ?>" class="btn-custom btn-ghost">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

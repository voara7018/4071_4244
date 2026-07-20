<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="breadcrumb-custom animate-slideUp">
    <a href="<?= base_url('/') ?>">Administration</a>
    <span class="separator"><i class="bi bi-chevron-right"></i></span>
    <span class="current">Préfixes</span>
</div>

<div class="page-header animate-slideUp">
    <h1>Gestion des préfixes</h1>
    <p class="page-subtitle">Ajoutez de nouveaux préfixes téléphoniques autorisés</p>
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

            <form action="<?= base_url('prefixes/insert') ?>" method="post">
                <div class="form-group-custom">
                    <label for="prefixes">Nouveau préfixe (ex: 034)</label>
                    <div class="input-group-custom">
                        <span class="input-prepend"><i class="bi bi-telephone-plus"></i></span>
                        <input type="text" id="prefixes" name="prefixes" class="form-input" placeholder="Entrez le préfixe" required>
                    </div>
                    <br>
                    <div class="form-group-custom">
                        <label for="operateur_id">Opérateur</label>
                        <select id="operateur_id" name="operateurid" class="form-input" required>
                            <option value="">Sélectionnez un opérateur</option>
                            <?php foreach ($operateurs as $operateur) { ?>
                                <option value="<?= $operateur['id'] ?>"><?= $operateur['nom'] ?></option>
                            <?php } ?>
                            </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn-custom btn-primary-custom">
                        <i class="bi bi-plus-circle"></i> Ajouter le préfixe
                    </button>
                </div>
            </form>
            <br>
            <div class="form-group-custom mt-4">
                 <label>Liste des préfixes existants</label>
                 <div class="table-wrapper mt-2">
                     <table class="table-custom">
                         <thead>
                             <tr>
                                 <th>Préfixe</th>
                                 <th>Opérateur</th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php foreach ($prefixes as $prefixe): ?>
                            <tr>
                                <td class="fw-600"><?= esc($prefixe['prefixes']) ?></td>
                                <td>
                                    <?php if ($prefixe['operateur_nom']): ?>
                                        <span class="badge-custom primary"><?= esc($prefixe['operateur_nom']) ?></span>
                                    <?php else: ?>
                                        <span class="badge-custom secondary">Inconnu</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                         </tbody>
                     </table>
                 </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

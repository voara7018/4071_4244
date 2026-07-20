<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="breadcrumb-custom animate-slideUp">
    <a href="<?= base_url('/') ?>">Administration</a>
    <span class="separator"><i class="bi bi-chevron-right"></i></span>
    <span class="current">Barème des frais</span>
</div>

<div class="page-header animate-slideUp">
    <h1>Ajouter un barème</h1>
    <p class="page-subtitle">Configurez les tranches de frais pour les opérations</p>
</div>

<div class="row animate-slideUp delay-1">
    <div class="col-lg-6">
        <div class="form-card">
            <form action="<?= base_url('insert_operation') ?>" method="post">
                <div class="form-group-custom">
                    <label for="type_operation">Type d'opération</label>
                    <select name="type_operation" id="type_operation" class="form-select-custom" required>
                        <option value="">Sélectionner</option>
                        <?php foreach ($type_operations as $type_operation): ?>
                            <option value="<?= $type_operation['id'] ?>"><?= $type_operation['type_operation'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-custom">
                            <label for="montant_min">Montant minimum</label>
                            <div class="input-group-custom">
                                <input type="number" id="montant_min" name="montant_min" class="form-input" required>
                                <span class="input-append">Ar</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-custom">
                            <label for="montant_max">Montant maximum</label>
                            <div class="input-group-custom">
                                <input type="number" id="montant_max" name="montant_max" class="form-input" required>
                                <span class="input-append">Ar</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group-custom">
                    <label for="frais">Frais appliqués</label>
                    <div class="input-group-custom">
                        <input type="number" id="frais" name="frais" class="form-input" required>
                        <span class="input-append">Ar</span>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn-custom btn-primary-custom w-100">
                        <i class="bi bi-plus-circle"></i> Ajouter le barème
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="breadcrumb-custom animate-slideUp">
    <a href="<?= base_url('espaceClient') ?>">Tableau de bord</a>
    <span class="separator"><i class="bi bi-chevron-right"></i></span>
    <span class="current">Historique</span>
</div>

<div class="page-header animate-slideUp">
    <h1>Historique des transactions</h1>
    <p class="page-subtitle">Consultez vos dernières opérations</p>
</div>

<div class="row animate-slideUp delay-1">
    <div class="col-12">
        <div class="card-custom">
            <div class="card-body p-0">
                <?php if (empty($transactions)): ?>
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <h4>Aucune transaction</h4>
                        <p>Vous n'avez pas encore effectué de transaction sur votre compte.</p>
                    </div>
                <?php else: ?>
                    <div class="p-4">
                        <?php foreach ($transactions as $t): ?>
                            <div class="transaction-item">
                                <div class="tx-icon <?= strtolower($t['type_operation']) ?>">
                                    <?php if ($t['type_operation'] == 'DEPOT'): ?>
                                        <i class="bi bi-arrow-down-left"></i>
                                    <?php elseif ($t['type_operation'] == 'RETRAIT'): ?>
                                        <i class="bi bi-arrow-up-right"></i>
                                    <?php else: ?>
                                        <i class="bi bi-arrow-left-right"></i>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="tx-info">
                                    <div class="tx-type"><?= ucfirst(strtolower($t['type_operation'])) ?></div>
                                    <div class="tx-date"><?= date('d/m/Y H:i', strtotime($t['date_transaction'])) ?></div>
                                </div>
                                
                                <div>
                                    <div class="tx-amount <?= $t['type_operation'] == 'DEPOT' ? 'positive' : 'negative' ?>">
                                        <?= $t['type_operation'] == 'DEPOT' ? '+' : '-' ?><?= number_format($t['montant'], 0, ',', ' ') ?> Ar
                                    </div>
                                    <div class="tx-fees">
                                        <?php if ($t['type_operation'] == 'DEPOT'): ?>
                                            Sans frais
                                        <?php else: ?>
                                            Frais: <?= number_format($t['frais'], 0, ',', ' ') ?> Ar
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

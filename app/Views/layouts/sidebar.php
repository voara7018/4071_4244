<?php
    $currentUrl = current_url();
    $isAdmin = session()->get('is_admin');
?>
<nav class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">
            <i class="bi bi-wallet2"></i>
        </div>
        <div class="logo-text">Mobile<span>Money</span></div>
    </div>

    <!-- Navigation -->
    <div class="sidebar-nav">
        <?php if ($isAdmin): ?>
        <!-- Admin Section -->
        <div class="nav-section-title">Administration</div>
        <div class="nav-item">
            <a href="<?= base_url('/') ?>" class="nav-link <?= (base_url('/') === $currentUrl || str_contains($currentUrl, 'insert_operation')) ? 'active' : '' ?>">
                <i class="bi bi-gear"></i>
                <span>Barème des frais</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="<?= base_url('prefixes') ?>" class="nav-link <?= str_contains($currentUrl, 'prefixes') ? 'active' : '' ?>">
                <i class="bi bi-hash"></i>
                <span>Préfixes</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="<?= base_url('situation') ?>" class="nav-link <?= str_contains($currentUrl, 'situation') && !str_contains($currentUrl, 'comptes') ? 'active' : '' ?>">
                <i class="bi bi-graph-up"></i>
                <span>Situation gains</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="<?= base_url('situation/comptes') ?>" class="nav-link <?= str_contains($currentUrl, 'comptes') ? 'active' : '' ?>">
                <i class="bi bi-people"></i>
                <span>Comptes clients</span>
            </a>
        </div>

        <?php else: ?>
        <!-- Client Section -->
        <div class="nav-section-title">Mon compte</div>
        <div class="nav-item">
            <a href="<?= base_url('espaceClient') ?>" class="nav-link <?= str_contains($currentUrl, 'espaceClient') ? 'active' : '' ?>">
                <i class="bi bi-house"></i>
                <span>Tableau de bord</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="<?= base_url('voirSolde') ?>" class="nav-link <?= str_contains($currentUrl, 'voirSolde') ? 'active' : '' ?>">
                <i class="bi bi-wallet2"></i>
                <span>Mon solde</span>
            </a>
        </div>

        <div class="nav-section-title">Opérations</div>
        <div class="nav-item">
            <a href="<?= base_url('faireDepot') ?>" class="nav-link <?= str_contains($currentUrl, 'faireDepot') ? 'active' : '' ?>">
                <i class="bi bi-box-arrow-in-down"></i>
                <span>Dépôt</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="<?= base_url('faireRetrait') ?>" class="nav-link <?= str_contains($currentUrl, 'faireRetrait') ? 'active' : '' ?>">
                <i class="bi bi-box-arrow-up"></i>
                <span>Retrait</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="<?= base_url('faireTransfert') ?>" class="nav-link <?= str_contains($currentUrl, 'faireTransfert') ? 'active' : '' ?>">
                <i class="bi bi-arrow-left-right"></i>
                <span>Transfert</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="<?= base_url('voirHistorique') ?>" class="nav-link <?= str_contains($currentUrl, 'voirHistorique') ? 'active' : '' ?>">
                <i class="bi bi-clock-history"></i>
                <span>Historique</span>
            </a>
        </div>
        <?php endif; ?>
    </div>

    <!-- Profile -->
    <div class="sidebar-profile">
        <div class="profile-info">
            <div class="profile-avatar">
                <?= strtoupper(substr(session()->get('numero_telephone') ?? 'U', 0, 2)) ?>
            </div>
            <div class="profile-details">
                <div class="profile-name"><?= session()->get('numero_telephone') ?? 'Utilisateur' ?></div>
                <div class="profile-role"><?= $isAdmin ? 'Administrateur' : 'Client' ?></div>
            </div>
        </div>
    </div>
</nav>

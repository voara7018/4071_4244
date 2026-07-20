<header class="top-navbar">
    <div class="navbar-search">
        <i class="bi bi-search search-icon"></i>
        <input type="text" placeholder="Rechercher...">
    </div>

    <div class="navbar-actions">
        <button class="navbar-action-btn" title="Notifications">
            <i class="bi bi-bell"></i>
            <span class="badge-dot"></span>
        </button>

        <div class="dropdown">
            <button class="navbar-user dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-avatar">
                    <?= strtoupper(substr(session()->get('numero_telephone') ?? 'U', 0, 2)) ?>
                </div>
                <div class="user-info">
                    <div class="user-name"><?= session()->get('numero_telephone') ?? 'Utilisateur' ?></div>
                    <div class="user-role"><?= session()->get('is_admin') ? 'Administrateur' : 'Client' ?></div>
                </div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                <?php if (!session()->get('is_admin')): ?>
                <li>
                    <a class="dropdown-item" href="<?= base_url('voirSolde') ?>">
                        <i class="bi bi-wallet2"></i> Mon solde
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="<?= base_url('voirHistorique') ?>">
                        <i class="bi bi-clock-history"></i> Historique
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <?php endif; ?>
                <li>
                    <a class="dropdown-item text-danger" href="<?= session()->get('is_admin') ? base_url('admin/logout') : base_url('deconnexion') ?>">
                        <i class="bi bi-box-arrow-right"></i> Se déconnecter
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

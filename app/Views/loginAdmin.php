<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration | Mobile Money</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/variables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/forms.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/buttons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/utilities.css') ?>">
</head>
<body>
    <div class="login-page">
        <div class="login-left" style="background: linear-gradient(135deg, #2c3e50 0%, #1a252f 100%);">
            <div class="login-illustration">
                <i class="bi bi-shield-lock illustration-icon"></i>
                <h2>Espace Administration</h2>
                <p>Gestion sécurisée du réseau Mobile Money.</p>
            </div>
        </div>

        <div class="login-right">
            <div class="login-form-container">
                <div class="login-logo">
                    <div class="logo-icon"><i class="bi bi-shield-lock"></i></div>
                    <div class="logo-text">Admin</div>
                </div>

                <h1>Accès restreint</h1>
                <p class="login-subtitle">Veuillez vous authentifier pour continuer</p>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert-custom alert-danger-custom" data-autodismiss>
                        <i class="bi bi-exclamation-circle"></i>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('admin/login') ?>" method="post">
                    <div class="form-group-custom">
                        <label for="username">Nom d'utilisateur</label>
                        <div class="input-group-custom">
                            <span class="input-prepend"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-input" id="username" name="username" placeholder="admin" value="admin" required>
                        </div>
                    </div>
                    
                    <div class="form-group-custom">
                        <label for="password">Mot de passe</label>
                        <div class="input-group-custom">
                            <span class="input-prepend"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-input" id="password" name="password" placeholder="admin" value="admin" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-custom btn-primary-custom btn-block btn-lg-custom mt-md">
                        Connexion <i class="bi bi-box-arrow-in-right"></i>
                    </button>
                    
                    <div class="mt-4 text-center">
                        <a href="<?= base_url('/') ?>" class="text-secondary-custom" style="font-size: var(--fs-sm);"><i class="bi bi-arrow-left"></i> Retour au site client</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>

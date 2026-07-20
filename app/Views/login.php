<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Mobile Money</title>
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
        <div class="login-left">
            <div class="login-illustration">
                <i class="bi bi-wallet2 illustration-icon"></i>
                <h2>Le futur de votre portefeuille</h2>
                <p>Gérez vos finances en toute simplicité, sécurité et rapidité avec Mobile Money.</p>
            </div>
        </div>

        <div class="login-right">
            <div class="login-form-container">
                <div class="login-logo">
                    <div class="logo-icon"><i class="bi bi-wallet2"></i></div>
                    <div class="logo-text">Mobile<span>Money</span></div>
                </div>

                <h1>Bon retour !</h1>
                <p class="login-subtitle">Connectez-vous pour accéder à votre espace</p>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert-custom alert-danger-custom" data-autodismiss>
                        <i class="bi bi-exclamation-circle"></i>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('login') ?>" method="post">
                    <div class="form-group-custom">
                        <label for="numero_telephone">Numéro de téléphone</label>
                        <div class="input-group-custom">
                            <span class="input-prepend"><i class="bi bi-telephone"></i></span>
                            <input type="text" class="form-input" id="numero_telephone" name="numero_telephone" placeholder="Ex: 0340012345" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-custom btn-primary-custom btn-block btn-lg-custom mt-md">
                        Se connecter <i class="bi bi-arrow-right"></i>
                    </button>
                </form>
                <div class="mt-md text-center">
                    <p>Vous etes un <a href="/admin">administrateur </a></p>
                </div>
                
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>
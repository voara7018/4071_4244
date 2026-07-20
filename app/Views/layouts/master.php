<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mobile Money - Votre portefeuille mobile">
    <title><?= $title ?? 'Mobile Money' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/variables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/sidebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/cards.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/buttons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/forms.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/utilities.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css') ?>">
</head>
<body>
    <div class="app-wrapper">
        <button class="sidebar-toggle" aria-label="Toggle menu">
            <i class="bi bi-list"></i>
        </button>

        <div class="sidebar-overlay"></div>

        <?= $this->include('layouts/sidebar') ?>

        <div class="main-content">
            <?= $this->include('layouts/navbar') ?>

            <div class="content-wrapper">
                <?= $this->renderSection('content') ?>
            </div>

            <?= $this->include('layouts/footer') ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/sidebar.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>

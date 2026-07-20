<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter prefixes</title>
</head>
<body>
    <form action="<?= base_url('prefixes/insert') ?>" method="post">
        <input type="text" name="prefixes" placeholder="Entrez le prefixes" required>
        <button type="submit">Ajouter le prefixes </button>
    </form>
</body>
</html>
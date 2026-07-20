<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <title>Connexion client</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="<?= base_url('login') ?>" method="post">
                    <label for="numero_telephone">Numéro de téléphone:</label>
                    <input type="text" id="numero_telephone" name="numero_telephone" required><br><br>
                    <input type="submit" value="Se connecter">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
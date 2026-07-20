<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <title>Ajouter une opération</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="<?= site_url('insert_operation') ?>" method="post">
                    <label for="code">Code:</label>
                    <select name="type_operation" id="type_operation">
                        <option value="">Selectionner</option>
                        <?php foreach ($type_operations as $type_operation) { ?>
                            <option value="<?= $type_operation['id'] ?>"><?= $type_operation['type_operation'] ?></option>
                        <?php } ?>
                    </select>
                    <label for="montant_min">Montant minimum:</label>
                    <input type="number" id="montant_min" name="montant_min" required><br><br>
                    <label for="montant_max">Montant maximum:</label>
                    <input type="number" id="montant_max" name="montant_max" required><br><br>

                    <label for="frais">Frais:</label>
                    <input type="number" id="frais" name="frais" required><br><br>
                    <input type="submit" value="Ajouter">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
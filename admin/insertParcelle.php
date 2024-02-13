<?php
    include "../Function/function_get.php";
    include "header.php";
    $thes = getThe();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion parcelle</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire d'insertion de parcelle</h4>
                        <form class="form-inline" action="traitement/insertParcelle.php" method="post">
                            <div class="form-group mr-3 mb-2">
                                <label for="nom" class="mr-2">Nom :</label>
                                <input type="text" class="form-control" id="nom" name="nom">
                            </div>
                            <div class="form-group mr-3 mb-2">
                                <label for="surface" class="mr-2">Surface :</label>
                                <input type="text" class="form-control" id="surface" name="surface">
                            </div>
                            <div class="form-group mr-3 mb-2">
                                <label for="the" class="mr-2">Sélectionnez The :</label>
                                <select class="form-control" id="the" name="the">
                                    <?php foreach ($thes as $the) { ?>
                                        <option value="<?php echo $the['id']; ?>"><?php echo $the['nom']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mb-2">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    include "footer.php";
?>

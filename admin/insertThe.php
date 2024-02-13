<?php
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion The</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire d'insertion de the</h4>
                        <form class="form-inline" action="traitement/traitementInsertThe.php" method="post">
                            <div class="form-group mr-3 mb-2">
                                <label for="nom" class="mr-2">variete :</label>
                                <input type="text" class="form-control" id="nom" name="the">
                            </div>
                            <div class="form-group mr-3 mb-2">
                                <label for="surface" class="mr-2">Occupation :</label>
                                <input type="text" class="form-control" id="surface" name="occupation">
                            </div>
                            <div class="form-group mr-3 mb-2">
                                <label for="surface" class="mr-2">Rendement :</label>
                                <input type="number" class="form-control" id="surface" name="rendement">
                            </div>
                            <div class="form-group mr-3 mb-2">
                                <label for="surface" class="mr-2">Pric de Vente :</label>
                                <input type="number" class="form-control" id="surface" name="prixVente">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mb-2">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include "footer.php";
?>
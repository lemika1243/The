<?php
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion Cueilleure</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <div class="lienAmbony">
            <a class="btn btn-link link" href="acceuil.php">Home</a>
        </div>
        <h4 class="card-title">Cueilleur</h4>
        <form class="form-inline" action="traitement/insertCueilleure.php" method="post">
                
                <label for="inlineFormInputName2">Nom : </label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="nom">
                <label for="inlineFormInputName3">Salaire</label>
                <input type="number" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="salaire" value=0>
                <label for="inlineFormInputName2">Pods minimal</label>
                <input type="number" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="poidsMinimal" value=0>
                <label for="inlineFormInputName2">bonus</label>
                <input type="number" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="bonus" value=0>
                <label for="inlineFormInputName2">malus</label>
                <input type="number" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="mallus" value=0>
                <button type="submit" class="btn btn-gradient-primary mb-2">Valider</button>
        </form>

<?php
    include "footer.php";
?>
<?php
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion Categorie Depense</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Inline forms</h4>
        <form class="form-inline" action="traitement/insertCategorieDepense.php" method="post">
            
            <label for="inlineFormInputName2">Categorie de Depense : </label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="depense">
            <button type="submit" class="btn btn-gradient-primary mb-2">Valider</button>
        </form>
<?php
    include "footer.php";
?>
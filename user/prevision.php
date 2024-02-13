<?php
    include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion Categorie Depense</title>
</head>
<body>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Inline forms</h4>
            <label for="inlineFormInputName2">Date de prevision : </label>
            <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="date">
            <button type="submit" class="btn btn-gradient-primary mb-2" name="bouton">Valider</button>
    <div class="col-12 grid-margin stretch-card" name="mainDiv">
        
    </div>

    <script src="../assets/js/functionPrevision.js"></script>
    <script src="../assets/js/function.js"></script>
    <script>
        var date = getInput("date");
        var bouton = getInput("bouton");
        var mainDiv = getInput("mainDiv"); 
        bouton.addEventListener("click",()=>{
            createDivs(mainDiv);
                
        });
    </script>

<?php
    include "footer.php";
?>
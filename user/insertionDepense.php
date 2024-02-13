<?php
    include "header.php";
    include "../Function/function_get.php";
    $the = getThe();
    $categorie=getCategorieDepense();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="form">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire d'insertion de depense</h4>
                        <form class="form-inline" action="traitement/insertionDepense.php" method="post">
                            <div class="form-group mr-3 mb-2">
                            <p>Categorie depense : <select class="form-control" name="categorie">
                                <?php for($i = 0 ; $i < count($categorie) ; $i++){ ?>
                                <option value="<?= $categorie[$i]['id'] ?>"><?= $categorie[$i]['nom'] ?></option>
                                <?php } ?>
                            </select></p>
                            </div>
                            <div class="form-group mr-3 mb-2">
                            <p>The : <select class="form-control" name="the" id="">
                                <?php for($i = 0 ; $i < count($the) ; $i++){ ?>
                                    <option value="<?= $the[$i]['id'] ?>"><?= $the[$i]['nom'] ?></option>
                                <?php } ?>
                            </select></p>
                            </div>
                            <label for="inlineFormInputName2">Date du depense : </label>
                            <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="dateDepense">
                            
                            <label for="inlineFormInputName3">Montant : </label>
                            <input type="number" class="form-control mb-2 mr-sm-2" id="inlineFormInputName3" name="montant">
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
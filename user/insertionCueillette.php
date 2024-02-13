<?php
    include "../Function/function_get.php";
    include "header.php";
    $parcelle=getParcelle();
    $cueilleure =getCueilleur();
    $categorieDepense = getCategorieDepense();
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
        <form action="traitement/insertionCueillette.php" method="post">
            <p>Parcelle : <select class="form-control" name="parcelle">
                <?php for($i = 0 ; $i < count($parcelle) ; $i++){ ?>
                    <option value="<?php echo($parcelle[$i]['id']); ?>"><?php echo($parcelle[$i]['nom']); ?></option>
                <?php } ?>
            </select></p>
            <p>Cueilleure : <select class="form-control" name="cueilleure">
                <?php for($i = 0 ; $i < count($cueilleure) ; $i++){ ?>
                    <option value="<?php echo($cueilleure[$i]['id']); ?>"><?php echo($cueilleure[$i]['nom']); ?></option>
                <?php } ?>
            </select></p>
            <p>Date du cueillette : <input type="date" name="dateCueillette"></p>
            <p>Choix categorie depense : <select class="form-control" name="categorieDepense" id="">
                <?php for($i = 0 ; $i < count($categorieDepense) ; $i++){ ?>
                    <option value="<?php echo($categorieDepense[$i]['id']); ?>"><?php echo($categorieDepense[$i]['nom']); ?></option>
                <?php } ?>
            </select></p>
            <p>Poids cueillie : <input type="number" name="poids"></p>
            <p style="color:red; font-size: 10px;" class="error"></p>
            <button type="submit" class="btn btn-gradient-primary mb-2">Valider</button>
        </form>
    </div>
    <script src="../assets/js/functionPoids.js"></script>
    <script src="../assets/js/function.js"></script>
    <script>
        var poids = getInput("poids");
        var parcelle = getInput('parcelle');
        var date = getInput("dateCueillette");
        poids.addEventListener('input',(e)=>{
            var value = e.target.value;
            getPoids(value,parcelle,date);
        });
    </script>
</body>
</html>
<?php
    include "footer.php";
?>
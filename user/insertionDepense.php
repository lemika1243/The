<?php
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
    <div class="lienAmbony">
        <a class="btn btn-link link" href="acceuil.php">Home</a>
    </div>
    <div class="form">
        <form action="traitement/insertionDepense.php" method="post">
            <p>Categorie depense : <select name="categorie">
                <?php for($i = 0 ; $i < count($categorie) ; $i++){ ?>
                <option value="<?= $categorie[$i]['id'] ?>"><?= $categorie[$i]['nom'] ?></option>
                <?php } ?>
            </select></p>
            <p>The : <select name="the" id="">
                <?php for($i = 0 ; $i < count($the) ; $i++){ ?>
                    <option value="<?= $the[$i]['id'] ?>"><?= $the[$i]['nom'] ?></option>
                <?php } ?>
            </select></p>
            <p>Date du depense : <input type="date" name="dateDepense"></p>
            <p>Montant : <input type="number" name="montant"></p>
            <p><input type="submit" value="Valider"></p>
        </form>
    </div>
    <h2>ETU002538 ETU002747 ETU002589</h2>
</body>
</html>
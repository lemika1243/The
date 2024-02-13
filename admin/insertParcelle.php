<?php
    include "../Function/function_get.php";
    $thes=getThe();
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
    <div class="lienAmbony">
        <a class="btn btn-link link" href="acceuil.php">Home</a>
    </div>
    <div class="form">
        <div class="title"><h1 class="h1">Parcelle</h1></div>
        <form action="traitement/insertParcelle.php" method="post">
            <p>Nom : <input type="text" name="nom" id=""></p>
            <p>Surface : <input type="number" name="surface" id=""></p>
            <p>The : <select name="the" id="">
                <?php for ($i=0; $i < count($thes); $i++) { ?>
                    <option value="<?php echo($thes[$i]['id']); ?>"><?php echo($thes[$i]['nom']); ?></option>
                <?php } ?>
            </select></p>
            <p><input type="submit" value="Valider"></p>
        </form>
    </div>
    <h2>ETU002538 ETU002747 ETU002589</h2>
</body>
</html>
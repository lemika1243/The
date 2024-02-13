<?php
    include "header.php";
    include "../Function/function_get.php";
    $poidsTotal=getPoidsTotal();
    $poidsRestant=getPoidsRestant();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="lienAmbony">
        <a class="btn btn-info" href="insertionCueillette.php">Insertion Cueillette</a>
        <a class="link btn btn-link" href="insertionDepense.php">Insertion Depense</a>
        <a class="link btn btn-link" href="listePaiement.php">ListePaiement</a>
    </div>
    <p>Poids total cueillette : <?= $poidsTotal ?></p>
    <?php for ($i=0; $i < count($poidsRestant); $i++) { ?>
        <p>Nom du parcel : <?= $poidsRestant[$i]['parcelNom'] ?></p>
        <p>Poids restant : <?= $poidsRestant[$i]['poidsRestant'] ?></p>
    <?php } ?>
    <p>Cout de revient/kg : <?= getCoutRevient() ?></p>

<?php
    include "footer.php";
?>
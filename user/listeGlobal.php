<?php
    include "header.php";
    include "../Function/function_get.php";
    $min=$_POST["dateMin"];
    $max=$_POST["dateMax"];
    $depense=getAllDep($min,$max);
    $vente=getVente($min,$max);
    $benefice=$vente-$depense;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Depense : <?= $depense ?></p>
    <p>Montant vente : <?= $vente ?></p>
    <p>Benefice : <?= $benefice ?></p>
</body>
</html>
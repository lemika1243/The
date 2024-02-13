<?php
    include "../../Function/function_insertion.php";
    $nom=$_POST['the'];
    $occupation=$_POST['occupation'];
    $rendement=$_POST['rendement'];
    $prixVente=$_POST['prixVente'];
    insertThe($nom, $occupation, $rendement, $prixVente);
    header('Location:../insertThe.php');
?>
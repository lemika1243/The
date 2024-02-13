<?php
    include "../../Function/function_insertion.php";
    $categorie=$_POST['categorie'];
    $the=$_POST['the'];
    $dataDepense=$_POST['dateDepense'];
    $montant=$_POST['montant'];
    insertDepense($categorie,$dataDepense,$montant,$the);
    header('Location:../insertionDepense.php');
?>
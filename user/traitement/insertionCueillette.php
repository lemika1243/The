<?php
    include "../../Function/function_insertion.php";
    $idParcelle=$_POST['parcelle']; 
    $cueilleure= $_POST['cueilleure']; 
    $dateCueillette = $_POST['dateCueillette']; 
    $poids = $_POST['poids'];
    insertCueillette($idParcelle, $cueilleure , $dateCueillette , $poids);
    header('Location:../insertCategorieDepense.php');
?>
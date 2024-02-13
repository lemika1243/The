<?php
    include "../../Function/function_insertion.php";
    $nom=$_POST['depense'];
    insertCategorieDepense($nom);
    header('Location:../insertCategorieDepense.php');
?>
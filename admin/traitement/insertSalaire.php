<?php
    include "../../Function/function_insertion.php";
    $nom=$_POST['salaire'];
    $today = date("Y-m-d");
    insertSalaire($nom,$today);
    header('Location:../insertSalaire.php');
?>
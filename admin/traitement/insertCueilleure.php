<?php
    include "../../Function/function_insertion.php";
    $nom=$_POST['nom'];
    $today = date("Y-m-d");
    insertCueilleur($nom,$today);
    header('Location:../insertCueilleure.php');
?>
<?php
    include "../../Function/function_insertion.php";
    $nom=$_POST['nom'];
    $salaire=$_POST["salaire"];
    $poidsMinimal=$_POST["poidsMinimal"];
    $mallus=$_POST["mallus"];
    $bonus=$_POST["bonus"];
    $today = date("Y-m-d");
    insertCueilleur($nom,$today,$salaire,$poidsMinimal,$mallus,$bonus);
    header('Location:../insertCueilleure.php');
?>
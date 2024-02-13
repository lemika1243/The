<?php
    include "../../Function/function_insertion.php";
    $nom=$_POST['nom'];$surface=$_POST['surface'];$the=$_POST['the'];
    insertParcelle($nom, $surface, $the);
    header('Location:../insertParcelle.php');
?>
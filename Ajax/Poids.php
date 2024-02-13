<?php
	include "../Function/function.php";

    header( "Content-Type: application/json");
    $poids=$_GET['poids'];
    $parcelle=$_GET['idParcelle'];
    $min = date('2000-01-02');
    $max=$_GET['date'];
    $poidsRestant = soustraction($min,$max,$parcelle);
    $retour="";
    if($poidsRestant-intval($poids)<0){
        $retour="poids invalide,stock < à ".$poids;
    }
	echo json_encode($retour);

?>
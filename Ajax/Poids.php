<?php
	include "../Function/function.php";

    header( "Content-Type: application/json");
    $poids=$_GET['poids'];
    $parcelle=$_GET['idParcelle'];
    $min = date('2023-01-01');
    $max=$_GET['date'];
    $poidsRestant = getPoidsTotalCultive($min,$max,$parcelle);
    $retour="";
    if($poidsRestant-intval($poids)<0){
        $retour="poids invalide,stock < à ".$poidsRestant;
    }
	echo json_encode($retour);

?>
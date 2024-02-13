<?php


	include '../../Function/function_insertion.php';


	$mois = $_GET['choix'];

	if (count($mois)!=0) {
		deleteAllRegeneration();
		insertRegeneration($mois);
	}
	// print_r($mois);
	header('Location:../acceuil.php');


?>
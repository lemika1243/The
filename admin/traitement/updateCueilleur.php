<?php

	include "../../Function/function_insertion.php";

	$id = $_GET['idcueilleur'];
	$salaire = $_GET['salaire'];
	$poidMin = $_GET['poidMin'];
	$bonus = $_GET['bonus'];
	$malus = $_GET['malus'];
	echo $salaire;


	updateCueilleur($id, $poidMin, $salaire, $bonus, $malus);

	header('Location:../acceuil.php');

?>
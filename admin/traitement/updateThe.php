<?php

	include "../../Function/function_insertion.php";

	$id = $_GET['idThe'];
	$prix = $_GET['prixVente'];

	updateThe($id, $prix);

	header('Location:../acceuil.php');

?>
<?php


	function insertThe($nom, $occupation, $rendement, $prixVente, $prixAchat){

		$connection = dbconnect();
		$string = "insert into The_The (nom, occupation,rendement, prixVente, prixAchat) values ('%s', %f, %f, %f,%f)"; 
	    $query = sprintf($string,$nom, $occupation, $rendement, $prixVente, $prixAchat);
	    
	    // echo $query;
	    if(mysqli_query($connection, $query)){
	    	return "The inseree";
	    }
	    return "The non inseree";
	}

	
	function insertParcelle($nom, $surface,$idThe){

		$connection = dbconnect();
		$string = "insert into The_Parcelle (nom, surface, idThe) values ('%s', %f, %d)"; 
	    $query = sprintf($string,$nom,$surface,$idThe);
	    
	    // echo $query;
	    if(mysqli_query($connection, $query)){
	    	return "Parcelle inseree";
	    }
	    return "Parcelle non inseree";
	}


?>
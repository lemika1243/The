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


?>
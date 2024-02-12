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

	function insertCueilleur ($nom,$dateEmbauche){

		$connection = dbconnect();

		$dateFormat = date('Y-m-d',strtotime(($dateEmbauche)));
		$string = "insert into The_Cueilleur (nom,dateEmbauche) values ('%s', '%s')"; 
	    $query = sprintf($string,$nom,$dateFormat);
	    
	    // echo $query;
	    if(mysqli_query($connection, $query)){
	    	return "Cueilleur inseree";
	    }
	    return "Cueilleur non inseree";
	}

	function insertCategorieDepense ($nom){

		$connection = dbconnect();

		$string = "insert into The_CategorieDepense (nom) values ('%s')"; 
	    $query = sprintf($string,$nom);
	    
	    // echo $query;
	    if(mysqli_query($connection, $query)){
	    	return "Categorie depense inseree";
	    }
	    return "Categorie depense non inseree";
	}

	function insertSalaire ($montant,$dateSalaire){

		$connection = dbconnect();

		$dateFormat = date('Y-m-d',strtotime(($dateSalaire)));
		$string = "insert into The_Salaire (salaire,dateSalaire) values (%f, '%s')"; 
	    $query = sprintf($string,$montant,$dateFormat);
	    
	    echo $query;
	    if(mysqli_query($connection, $query)){
	    	return "Salaire inseree";
	    }
	    return "Salaire non inseree";
	}
?>
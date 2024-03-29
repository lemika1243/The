<?php
	include "connection.php";

	function updateCueilleur($idCueilleur, $poidsMinimal, $salaire,$bonus,$mallus){
		$connection = dbconnect();
		$string = "update The_Cueilleur set poidsMinimal=$poidsMinimal, salaire=$salaire,bonus=$bonus,mallus=$mallus where id=$idCueilleur";
		echo $string;
		mysqli_query($connection, $string);
	}

	function updateThe($idThe, $prix){
		$connection = dbconnect();
		$string = "update The_The set prixVente=$prix where id=$idThe";
		mysqli_query($connection, $string);
	}

	function insertRegeneration($idMois){
		$connection = dbconnect();
		for ($i=0; $i < count($idMois); $i++) {
			$string = "insert into The_Regeneration values ($idMois[$i])"; 
			mysqli_query($connection, $string);
		}
	}

	function deleteAllRegeneration(){
		$connection = dbconnect();
		$string = "delete from The_Regeneration"; 
		mysqli_query($connection, $string);
	}

	function insertThe($nom, $occupation, $rendement, $prixVente){

		$connection = dbconnect();
		$string = "insert into The_The (nom, occupation,rendement, prixVente) values ('%s', %f, %f, %f)"; 
	    $query = sprintf($string,$nom, $occupation, $rendement, $prixVente);
	    
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

	function insertCueilleur ($nom,$today,$salaire,$poidsMinimal,$mallus,$bonus){

		$connection = dbconnect();

		$dateFormat = date('Y-m-d',strtotime(($dateEmbauche)));
		$string = "insert into The_Cueilleur (nom,dateEmbauche,salaire,poidsMinimal,mallus,bonus) values ('%s', '%s', %d, %d, %d, %d)"; 
	    $query = sprintf($string,$nom,$dateFormat,$salaire,$poidsMinimal,$mallus,$bonus);
	    
	    // echo $query;
	    if(mysqli_query($connection, $query)){
	    	return "Cueilleur inseree";
	    }
	    return "Cueilleur non inseree";
	}

	function insertCueillette($parcelle, $cueilleure , $dateCueillette , $poids){

		$connection = dbconnect();

		$dateFormat = date('Y-m-d',strtotime(($dateCueillette)));
		$string = "insert into The_cueillette (idParcelle,idCueilleur,poids,dateCueillette) values (%s, %s,%s,'%s')"; 
	    $query = sprintf($string,$parcelle,$cueilleure,$poids,$dateFormat);
	    
	    // echo $query;
	    if(mysqli_query($connection, $query)){
	    	return "Cueillette inseree";
	    }
	    return "Cueillette non inseree";
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

	function insertDepense($idDep, $dateDepense, $montant, $the){
		$connection = dbconnect();

		$dateFormat = date('Y-m-d',strtotime(($dateDepense)));
		$string = "insert into The_Depense (idDep,dateDepense,montant,idThe) values (%d, '%s',%f,'%s')"; 
	    $query = sprintf($string,$idDep,$dateDepense,$montant,$the);
	    
	    echo $query;
	    if(mysqli_query($connection, $query)){
	    	return "Depense inseree";
	    }
	    return "Depense non inseree";	
	}
?>
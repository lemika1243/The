<?php


	function getThe(){

		$connection = dbconnect();
	    $str = "select * from The_The";
	    $resultat = mysqli_query($connection, $str);
	    $tab = array();
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$tab[] = $res  ;
	    }
		return $tab;
	}


	function getSalaire(){

		$connection = dbconnect();
	    $str = "select * from The_Salaire order by dateSalaire DESC limit 1";	// fonction temporaire prenant le salaire par date max
	    $resultat = mysqli_query($connection, $str);
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res  ;
	    }

	}

?>
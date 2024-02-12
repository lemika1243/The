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

	function getTotalCueillette (){

		$connection = dbconnect();
	    $str = "select coalesce(sum(poids),0) sommeCueillette from The_cueillette ";	
	    $resultat = mysqli_query($connection, $str);
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res['sommeCueillette']  ;
	    }
		
	}

	function getProduction($min , $max){								// 

		$dif = monthNumber($min,$max) ;

		$connection = dbconnect();
	    $str = "create or replace view v_TheAndCulture as select c.*, idThe, rendement from The_Culture c join The_Parcelle p on idParcelle  = p.id join The_The t on idThe = t.id  ";	
	    $resultat = mysqli_query($connection, $str);
		
		$str = "select * from v_TheAndCulture ";	
	    $resultat = mysqli_query($connection, $str);
	    $somme = 0 ;

	    //echo (count(mysqli_num_rows($resultat)));
	    while ($res = mysqli_fetch_assoc($resultat)) {

	    	$meter = haToMeterSquare($res['surface']);
	    	$pied = meterSquareToPied($meter);
	    	$somme = $somme + $res['rendement']*$pied;
	    }
	    return  $dif*$somme ;
	}

	function getParcelle(){
		$connection = dbconnect();
	    $str = "select * from The_Parcelle";	// fonction temporaire prenant le salaire par date max
	    $resultat = mysqli_query($connection, $str);
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res  ;
	    }
	}


	function getCueilleur(){
		$connection = dbconnect();
	    $str = "select * from The_Cueilleur";	// fonction temporaire prenant le salaire par date max
	    $resultat = mysqli_query($connection, $str);
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res  ;
	    }
	}

	function getCategorieDepense(){
		$connection = dbconnect();
	    $str = "select * from The_CategorieDepense";	// fonction temporaire prenant le salaire par date max
	    $resultat = mysqli_query($connection, $str);
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res  ;
	    }
	}

	function getTotalCueilletteParcelle($min , $max,$idParcelle){
		
		$connection = dbconnect();
		$dif = monthNumber($min,$max) ;
	    $str = "select coalesce(sum(poids),0) sommeCueillette from The_cueillette where idParcelle = '$idParcelle'";	
	    $resultat = mysqli_query($connection, $str);
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $dif*$res['sommeCueillette']  ;
	    }		
	}


	function getProduction($min , $max,$idParcelle){								// 

		$dif = monthNumber($min,$max) ;

		$connection = dbconnect();
	    $str = "create or replace view v_TheAndCulture as select c.*, idThe, rendement from The_Culture c join The_Parcelle p on idParcelle  = p.id join The_The t on idThe = t.id where c.idParcelle = '$idParcelle' ";	
	    $resultat = mysqli_query($connection, $str);
		
		$str = "select * from v_TheAndCulture ";	
	    $resultat = mysqli_query($connection, $str);
	    $somme = 0 ;

	    //echo (count(mysqli_num_rows($resultat)));
	    while ($res = mysqli_fetch_assoc($resultat)) {

	    	$meter = haToMeterSquare($res['surface']);
	    	$pied = meterSquareToPied($meter);
	    	$somme = $somme + $res['rendement']*$pied;
	    }
	    return  $dif*$somme ;
	}
?>
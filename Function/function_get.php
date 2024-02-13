<?php

	include "connection.php";
	include "util.php";

	function getMois(){
		return array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout","Septembre","Octobre","Novembre","Decembre");
	}

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

	function getProduct($min , $max){								// 

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
		$array=array();
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$array[]=$res  ;
	    }
		return $array;
	}


	function getCueilleur(){
		$connection = dbconnect();
	    $str = "select * from The_Cueilleur";	// fonction temporaire prenant le salaire par date max
	    $resultat = mysqli_query($connection, $str);
	    
	    $array=array();
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$array[]=$res  ;
	    }
		return $array;
	}

	function getCategorieDepense(){
		$connection = dbconnect();
	    $str = "select * from The_CategorieDepense";	// fonction temporaire prenant le salaire par date max
	    $resultat = mysqli_query($connection, $str);
	    
	    $array=array();
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$array[]=$res  ;
	    }
		return $array;
	}

	function monthNumber($min,$max){
		$connection = dbconnect();
	    $str = "select period_diff(date_format('".$max."','%Y%m'),date_format('".$min."','%Y%m')) as monthDiff";	
	    $resultat = mysqli_query($connection, $str);
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res['monthDiff']  ;
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

	function getTotalPoidsCueilletteParcelle($min,$max){
		$connection = dbconnect();
		$dif = monthNumber($min,$max) ;
	    $str = "select coalesce(sum(poids),0) sommeCueillette, nom from The_cueillette as c join The_Parcelle as p on c.idParcelle=p.id group by c.idParcelle";	
	    $resultat = mysqli_query($connection, $str);
	    $categorie=array(); $mpanisa=0;
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$categorie[$mpanisa]['sommeCueillette']=$dif*$res['sommeCueillette'];
			$categorie[$mpanisa]['idParcel']=$res['idParcelle'];
			$mpanisa++;
	    }
		return $categorie;
	}

	function getPoidsTotal(){
		$connection = dbconnect();
	    $str = "select coalesce(sum(poids),0) sommeCueillette from The_cueillette";	
	    $resultat = mysqli_query($connection, $str);
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res['sommeCueillette'];
	    }
	}

	function getPoidsRestant(){
		$connection = dbconnect();
	    $str = "select (rendement*pieds)-coalesce(sum(poids),0) as poidsRestant,p.idParcelle,p.parcelNom from pieds as p join The_cueillette as c on c.idParcelle=p.idParcelle group by p.idParcelle";	
	    $resultat = mysqli_query($connection, $str);
		$valiny=array(); $mpanisa=0;
	    while ($res = mysqli_fetch_assoc($resultat)) {
			$valiny[]=$res;
	    }
		return $valiny;
	}


	function getProduction($min , $max,$idParcelle){								// 

		$dif = monthNumber($min,$max) ;

		$connection = dbconnect();
	    $str = "create or replace view v_TheAndCulture as select c.*, idThe, rendement from The_Culture c join The_Parcelle p on idParcelle  = p.id join The_The t on idThe = t.id where c.idParcelle = '$idParcelle'";	
	    $resultat = mysqli_query($connection, $str);

		$str = "select * from v_TheAndCulture";	
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

	function sumDepense(){
		$connection = dbconnect();
		$query="select sum(montant) montant from The_Depense";
		$resultat = mysqli_query($connection, $query);
		while ($res = mysqli_fetch_assoc($resultat)) {
			return $res;
		}
	}

	function getRendementParcelle(){
		$connection = dbconnect();
		$query="select t.rendement*((p.surface*10000)/t.occupation) rendement,p.id id from The_The as t join The_Parcelle as p group by p.id";
		$resultat = mysqli_query($connection, $query);
		$array = array();
		while ($res = mysqli_fetch_assoc($resultat)) {
			$array[]=$res;
		}
		return $array;
	}

	function sumRendement(){
		$rendements = getRendementParcelle();
		$result = 0;
		for ($i=0; $i < count($rendements); $i++) { 
			$result+=$rendements[$i]['rendement'];
		}
		return $result;
	}

	function getCoutrevient(){
		return sumDepense()['montant']/sumRendement();
	}
?>
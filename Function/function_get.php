<?php

	include "connection.php";
	include "util.php";

	function getDiffMois($min, $max, $tab){

		$inclus = 0 ;
		$difference = monthNumber($min,$max);

		$month = date("m",strtotime($min));

		for($i = 0 ; $i<$difference; $i++){
			$realMonth = $month+$i ;
			if (in_array($realMonth%12,$tab)) {
				$inclus = $inclus + 1 ;
			}
		}
		return $inclus ;
	}

	function getSommeCueillette($max){
		
		$connection = dbconnect();
		$str = "create or replace view v_Cueillette as select coalesce(sum(poids),0) as sommeCueillette, idParcelle from The_cueillette where dateCueillette between '01-01-23' and '$max' group by idParcelle";

		$resultat = mysqli_query($connection, $str);

		$str = "select * from v_Cueillette ";
		$resultat = mysqli_query($connection, $str);
	    
	    $somme = 0 ;
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$somme = $somme + $res['sommeCueillette'] ;
	    }
		return $somme;

	}

	function getSommeRestant($max, $tab){

		$cueilli = getSommeCueillette($max);
		$connection = dbconnect();

		$difMonth = getDiffMois('2023-01-01',$max,$tab);

		$str = "select pieds*rendement as rdn from pieds";

		$resultat = mysqli_query($connection, $str);
	    
	    $sommeAccumulee = 0 ;
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$sommeAccumulee = $sommeAccumulee + $res['rdn'] ;
	    }
	    return $difMonth*$sommeAccumulee - $cueilli ; 
	}

	function getCueilleurById($id ){
		$connection = dbconnect();
	    $str = "select * from The_Cueilleur where id = '$id'";	// fonction temporaire prenant le salaire par date max
	    $resultat = mysqli_query($connection, $str);
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res;
	    }
		
	}

	function getNbj($datemin, $datemax){
		$timestamp1 = strtotime($datemin);
		$timestamp2 = strtotime($datemax);
		$seconds_diff = $timestamp2 - $timestamp1;
		$days_diff = floor($seconds_diff / (60 * 60 * 24));
		return $days_diff;
	}

	function getPoidsNormal($datemin,$datemax){
		$nbj=getNbj($datemin,$datemax);
		$connection = dbconnect();
	    $str = "select $nbj*poidsMinimal as poidsNormal from The_Cueilleur";
	    $resultat = mysqli_query($connection, $str);
	    $tab = array();
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$tab[] = $res["poidsMinimal"];
	    }
		return $tab;
	}

	function getPoidsReel(){
		$connection = dbconnect();
	    $str = "select sum(poids) as poidsNormal from The_cueillette group by idCueilleur";
	    $resultat = mysqli_query($connection, $str);
	    $tab = array();
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$tab[] = $res["poidsMinimal"];
	    }
		return $tab;
	}

	function getCueilleurInCueillette(){
		$connection = dbconnect();
	    $str = "select ct.idCueilleur,nom,salaire,bonus,mallus from The_cueillette as ct join The_Cueilleur as c on ct.idCueilleur=c.id group by ct.idCueilleur";
	    $resultat = mysqli_query($connection, $str);
	    $tab = array();
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$tab[] = array("idCueilleur"=>$res["idCueilleur"], "nom"=>$res["nom"], "salaire"=>$res["salaire"], "bonus"=>$res["bonus"],"mallus"=>$res["mallus"]);
	    }
		return $tab;
	}

	function getMontantCueilleureWithBonus($datemin,$datemax){
	    $tab = array();
		$poidsReel=getPoidsReel();
		$poidsNormal=getPoidsNormal($datemin,$datemax);
		$cueilleure=getCueilleurInCueillette();
		$mpanisa=0;
		for ($i=0; $i < count($cueilleure); $i++) { 
			$diff=$poidsReel[$i]-$poidsNormal[$i];
			$tab[$mpanisa]["montant"]=$cueilleure[$i]["salaire"];
			if($diff<0){$tab[$mpanisa]["salaire"]=($cueilleure[$i]["mallus"]*($poidsReel[$i]-$poidsNormal[$i]))-$tab[$mpanisa]["salaire"];}
			else if($diff>0){$tab[$mpanisa]["salaire"]=($cueilleure[$i]["bonus"]*($poidsReel[$i]-$poidsNormal[$i]))+$tab[$mpanisa]["salaire"];}
			$tab[$mpanisa]["idCueilleur"]=$cueilleure[$i]["idCueilleur"];
			$tab[$mpanisa]["nom"]=$cueilleure[$i]["nom"];
			$mpanisa++;
		}
		return $tab;
	}

	function getMois(){
		return array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout","Septembre","Octobre","Novembre","Decembre");
	}

	function getTheById($id){

		$connection = dbconnect();
	    $str = "select * from The_The where id = '$id'";
	    $resultat = mysqli_query($connection, $str);
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res  ;
	    }
		
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

	function getMoisRegeneration(){
		$connection = dbconnect();
	    $str = "select * from The_Regeneration";	// fonction temporaire prenant le salaire par date max
	    $resultat = mysqli_query($connection, $str);
	    $tab=array();
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$tab[] = $res["mois"];
	    }
		return $tab;
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
			$array=array("rendement"=>$res['rendement'],"id"=>$res['id']);
		}
		return $array;
	}

	function getPoidsTotalCultive($datemin,$datemax,$idParcelle){
		$regeneration=getMoisRegeneration();
		$nbmois=getDiffMois($datemin,$datemax,$regeneration);
		$poids=getRendementParcelle();
		$poidsCultive = 0;
		for ($i=0; $i < count($poids); $i++) {
			if($poids["id"]==$idParcelle) {return $poids["rendement"]*$nbmois;}
		}
		return 100000000;
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
		$rendements=sumRendement();
		if($rendements==0) return 0;
		return sumDepense()['montant']/$rendements;
	}

	function listePay($min,$max){
		$tab=getMoisRegeneration();
		$connection = dbconnect();
		$monthDiff = getDiffMois($min,$max,$tab);
		$str = "select nom, poidsMinimal , salaire,sum(poids) as sommeCueilli, bonus, mallus from The_Cueilleur Cu left join The_cueillette Cl on Cl.idCueilleur = Cu.id";
		$resultat = mysqli_query($connection, $str);
	    $tab = array() ;
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	$tem['nom'] = $res['nom'] ; $tem['sommeCueilli'] = $res['sommeCueilli'] ; 
	    	$tem['bonus'] = 0 ; $tem['mallus'] = 0 ;

	    	if ($tem['sommeCueilli']<$res['poidsMinimal']*$monthDiff) {
	    	 	$tem['minus'] = (($res['poidsMinimal']*$monthDiff)-$tem['sommeCueilli'])*$res['mallus'];
	    	 } 
	    	if ($tem['sommeCueilli']>$res['poidsMinimal']*$monthDiff) {
	    		$tem['bonus'] = ($tem['sommeCueilli']+($res['poidsMinimal']*$monthDiff))*$res['bonus'];
	    	}

	    	$tem['paiement'] = $monthDiff*$res['salaire'] + $tem['bonus'] - $tem['mallus'];
	    	$tab[] = $tem ;
	    }
		return $tab;

	}	

	function getParcelleByPieds(){
		$connection = dbconnect();
		$query= "select * from pieds";
		$resultat = mysqli_query($connection, $query);
		$array = array();
		while ($res = mysqli_fetch_assoc($resultat)) {
			$array[]=$res;
		}
		return $array;
	}

	function salairePayer ($min, $max){
		$tab=getMoisRegeneration();
		$connection = dbconnect();
		$monthDiff = getDiffMois($min,$max,$tab);

		$somme = 0 ;

		$str = "select nom, poidsMinimal , salaire,sum(poids) as sommeCueilli, bonus, mallus from The_Cueilleur Cu left join The_cueillette Cl on Cl.idCueilleur = Cu.id";
		$resultat = mysqli_query($connection, $str);
	    
	   
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	
	    	$tem['nom'] = $res['nom'] ; $tem['sommeCueilli'] = $res['sommeCueilli'] ; 
	    	$tem['bonus'] = 0 ; $tem['mallus'] = 0 ;

	    	if ($tem['sommeCueilli']<$res['poidsMinimal']*$monthDiff) {
	    	 	$tem['minus'] = (($res['poidsMinimal']*$monthDiff)-$tem['sommeCueilli'])*$res['mallus'];
	    	 } 
	    	if ($tem['sommeCueilli']>$res['poidsMinimal']*$monthDiff) {
	    		$tem['bonus'] = ($tem['sommeCueilli']+($res['poidsMinimal']*$monthDiff))*$res['bonus'];
	    	}

	    	$somme  = $somme + ($monthDiff*$res['salaire'] + $tem['bonus'] - $tem['mallus']);
	    }
		return $somme;

	}	

	function sommeDepense ($min, $max){

		$connection = dbconnect();
		$str = "select coalesce(sum(montant),0) as dep from The_Depense where dateDepense between '$min' and '$max'";

		$resultat = mysqli_query($connection, $str);
	    
	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res['dep'];
	    }
	    
	}

	function getAllDep ($min , $max){				// A appeler pour avoir les depenses entieres
		return sommeDepense($min,$max)+salairePayer($min,$max);
	}

	function getVente($min, $max){

		$connection = dbconnect();
		$str = "create or replace view montantPrixVente as select sum(prixVente*((surface*10000)/occupation)*rendement) as montantVente,t.id,t.nom, dateCueillette from The_cueillette join The_Parcelle as p on idParcelle=p.id join The_The as t on idThe=t.id where dateCueillette between '$min' and '$max' ";

		$resultat = mysqli_query($connection, $str);

		$str = "select * from montantPrixVente ";
		$resultat = mysqli_query($connection, $str);
		while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res['montantVente'];
	    }
	}

	function getDep($vente, $dep){
		return $vente - $dep ;
	}
?>
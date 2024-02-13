<?php

	include "connection.php";
	
	function checkLogin($email, $pwd){

		$connection = dbconnect();
	    $str = "select * from The_Login where email='$email' and mdp = '$pwd'";
	    $resultat = mysqli_query($connection, $str);

	    if (mysqli_num_rows($resultat)==0) {
	        
	      return "index";
	    }
	    $res = mysqli_fetch_assoc($resultat);
	    return $res['type']."/acceuil" ;
    }

     function getFirstLogin($type){

    	$connection = dbconnect();
	    $str = "select * from The_Login where type='$type' ";
	    $resultat = mysqli_query($connection, $str);

	    while ($res = mysqli_fetch_assoc($resultat)) {
	    	return $res ;
	    }

    }

?>
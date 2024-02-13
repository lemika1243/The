<?php

	function dbconnect()
	{
	    static $bdd = null;
	    if ($bdd === null) {
	        $bdd= mysqli_connect('172.20.0.167', 'ETU002538', 'g2UzRCYHrTuh', 'db_p16_ETU002538');
	    }
	    return $bdd;
	}

?>

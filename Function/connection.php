<?php

	function dbconnect()
	{
	    static $bdd = null;
	    if ($bdd === null) {
	        $bdd= mysqli_connect('localhost', 'root', '', 'the');
	    }
	    return $bdd;
	}

?>

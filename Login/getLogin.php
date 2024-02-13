<?php
	include "../Function/function_Login.php";

    header( "Content-Type: application/json");
    $login="";
    if($_GET['type']!=null){
        $type=$_GET['type'];
        $login = getFirstLogin($type);
    }
	echo json_encode($login);

?>
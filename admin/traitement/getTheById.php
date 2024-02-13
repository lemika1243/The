<?php

	
    require("../../Function/function_get.php");
    header( "Content-Type: application/json"); 

    $theById = getTheById($_POST['id']);


    echo json_encode($theById);

?>
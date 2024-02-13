<?php

	
    require("../../Function/function_get.php");
    header( "Content-Type: application/json"); 

    $cueilleurById = getCueilleurById($_POST['id']);


    echo json_encode($cueilleurById);

?>
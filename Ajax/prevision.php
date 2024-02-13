<?php
    include "../Function/function_get.php";

    header( "Content-Type: application/json");
    $parcelles = getParcelleByPieds();
    echo json_encode($parcelles);
?>
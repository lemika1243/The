<?php
    include "function_get.php";
    function soustraction($min,$max,$idParcelle){
        $rendement=getTotalCueilletteParcelle($min , $max,$idParcelle);
        $totale=getProduction($min,$max,$idParcelle);
        return $totale-$rendement;
    }
?>
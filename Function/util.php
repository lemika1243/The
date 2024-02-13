<?php
    function haToMeterSquare($ha){
        return 10000*$ha;
    }

    function meterSquareToPied($ms,$occupation){
        return $ms/$occupation;
    }

?>
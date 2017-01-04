<?php

if ($device['os'] == 'advafsp3kr7') {

    $multiplier = 1;
    $divisor    = 10;

    if (is_array($fsp3kr7_Card)) {
        echo "psuEntry: ";

        foreach (array_keys($fsp3kr7_Card) as $index) {

          if ($fsp3kr7_Card[$index]['eqptPhysInstValueTemp'] AND $fsp3kr7_Card[$index]['eqptPhysInstValuePsuVoltInp']) {

            $low_limit = 1;
            $low_warn_limit = 2;
            $high_warn_limit = 30;
            $high_limit = $fsp3kr7_Card[$index]['eqptPhysThresholdTempHigh']/10;

            $slotnum    = $index;
            $psuname    = "PSU [".strtoupper($fsp3kr7_Card[$index]['entityEqptAidString'])."]";
            $descr      = $psuname." Card Temperature";
            $current    = $fsp3kr7_Card[$index]['eqptPhysInstValueTemp'];
            $sensorType = 'advafsp3kr7';
            $oid        = '.1.3.6.1.4.1.2544.1.11.11.1.2.1.1.1.5.'.$index;

            discover_sensor($valid['sensor'], 'temperature', $device, $oid, $index, $sensorType, $descr, 
                            $divisor, $multiplier, $low_limit, $low_warn_limit, $high_warn_limit, $high_limit, $current);
         }
       }
    }
}//end if


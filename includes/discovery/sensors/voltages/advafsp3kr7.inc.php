<?php

if ($device['os'] == 'advafsp3kr7') {

    $multiplier = 1;
    $divisor    = 1000;

    if (is_array($fsp3kr7_Card)) {
        echo "psuEntry: ";

        foreach (array_keys($fsp3kr7_Card) as $index) {

          if ($fsp3kr7_Card[$index]['eqptPhysInstValuePsuVoltInp']) {

            $low_limit = 1;
            $low_warn_limit = 2;
            $high_warn_limit = 30;
            $high_limit = 250;

            $slotnum    = $index;
            $psuname    = "PSU [".strtoupper($fsp3kr7_Card[$index]['entityEqptAidString'])."]";
            $descr      = $psuname." Input Voltage";
            $current    = $fsp3kr7_Card[$index]['eqptPhysInstValuePsuVoltInp'];
            $sensorType = 'advafsp3kr7';
            $oid        = '.1.3.6.1.4.1.2544.1.11.11.1.2.1.1.1.7.'.$index;

            discover_sensor($valid['sensor'], 'voltage', $device, $oid, $index, $sensorType, $descr, 
                            $divisor, $multiplier, $low_limit, $low_warn_limit, $high_warn_limit, $high_limit, $current);
         }
       }
    }
}//end if


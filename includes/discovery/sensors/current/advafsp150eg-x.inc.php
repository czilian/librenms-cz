<?php

if ($device['os'] == 'advafsp150eg-x') {

    $multiplier = 1;
    $divisor    = 1000;

    if (is_array($egxPSU)) {
        echo "psuEntry: ";

        foreach (array_keys($egxPSU) as $index) {

            $low_limit = 1;
            $low_warn_limit = 2;
            $high_warn_limit = 30;
            $high_limit = 25;

            $slotnum    = $index;
            $psuname    = "PSU[".strtoupper($egxPSU[$index]['psuType'])."]";
            $descr      = $psuname." #".$slotnum.' DC Output A';
            $current    = $egxPSU[$index]['psuOutputCurrent'];
            $sensorType = 'advafsp150eg-x';
            $oid        = '.1.3.6.1.4.1.2544.1.12.3.1.4.1.8.'.$index;

            discover_sensor($valid['sensor'], 'current', $device, $oid, $index, $sensorType, $descr, $divisor, $multiplier, $low_limit, $low_warn_limit, $high_warn_limit, $high_limit, $current);
        }
    }
}//end if


<?php

if ($device['os'] == 'advafsp150eg-x') {

    $multiplier = 1;
    $divisor    = 1000;

    if (is_array($egxPSU)) {
        echo "psuEntry: ";

        foreach (array_keys($egxPSU) as $index) {

            $low_limit = 6;
            $low_warn_limit = 9;
            $high_warn_limit = 14;
            $high_limit = 20;

            $slotnum    = $index;
            $psuname    = "PSU[".strtoupper($egxPSU[$index]['psuType'])."]";
            $descr      = $psuname." #".$slotnum.' DC Output V';
            $current    = $egxPSU[$index]['psuOutputVoltage'];
            $sensorType = 'advafsp150eg-x';
            $oid        = '.1.3.6.1.4.1.2544.1.12.3.1.4.1.6.'.$index;

            discover_sensor($valid['sensor'], 'voltage', $device, $oid, $index, $sensorType, $descr, $divisor, $multiplier, $low_limit, $low_warn_limit, $high_warn_limit, $high_limit, $current);
        }
    }
}//end if


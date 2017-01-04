<?php

if ($device['os'] == 'advafsp150eg-x') {

    $multiplier = 1;
    $divisor    = 1;

    if (is_array($egxPSU)) {
        echo "psuEntry: ";

        foreach (array_keys($egxPSU) as $index) {

            $low_limit       = 10;
            $low_warn_limit  = 15;
            $high_warn_limit = 40;
            $high_limit      = 60;

            $slotnum    = $index;
            $psuname    = "PSU[".strtoupper($egxPSU[$index]['psuType'])."]";
            $descr      = $psuname." #".$slotnum;
            $current    = $egxPSU[$index]['psuTemperature'];
            $sensorType = 'advafsp150eg-x';
            $oid        = '.1.3.6.1.4.1.2544.1.12.3.1.4.1.7.'.$index;

            discover_sensor($valid['sensor'], 'temperature', $device, $oid, $index, $sensorType, 
            $descr, $divisor, $multiplier, $low_limit, $low_warn_limit, $high_warn_limit, $high_limit, $current);
        }
    }
   
    if (is_array($egxSWF)) {
        echo "swfEntry: ";

       $multiplier = 1;
       $divisor    = 1;

        foreach (array_keys($egxSWF) as $index) {

            $low_limit       = 10;
            $low_warn_limit  = 15;
            $high_warn_limit = 60;
            $high_limit      = 80;

            $slotnum    = $index;
            $swfname    = "SWF[".$egxSWF[$index]['ethernetSWFCardOperationalState']."]";
            $descr      = $swfname." #".$slotnum;
            $current    = $egxSWF[$index]['ethernetSWFCardTemperature'];
            $sensorType = 'advafsp150eg-x';
            $oid        = '.1.3.6.1.4.1.2544.1.12.3.1.20.1.5.'.$index;

            discover_sensor($valid['sensor'], 'temperature', $device, $oid, $index, $sensorType, 
            $descr, $divisor, $multiplier, $low_limit, $low_warn_limit, $high_warn_limit, $high_limit, $current);
        }
    }
} //end if

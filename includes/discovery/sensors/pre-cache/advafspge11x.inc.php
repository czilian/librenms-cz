<?php

if ($device['os'] == 'advafsp150ge11x') {
    echo 'Pre-cache ADVA FSP150 GE 11x (advafsp150ge11x):';
    echo "\n";

    $ge11x_oids = array();

    echo 'Caching OIDs:'."\n";

    $ge11x_oids   = snmpwalk_cache_multi_oid($device, 'cmEntityObjects' , $ge11x_oids,   'CM-ENTITY-MIB', '', '-OQUbs');

    echo 'OIDs:'."\n";

//var_dump($ge11x_oids);
//$results = print_r($ge11x_oids, true); // $results now contains output from print_r
//file_put_contents('/opt/librenms/adva-precache.txt', $results);

}

// end of OS condition

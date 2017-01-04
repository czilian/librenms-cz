<?php

if ($device['os'] == 'advafsp150ge20x') {
    echo 'Pre-cache ADVA FSP150 XG 210 (advafsp150ge20x):';
    echo "\n";

    $ge20x_oids = array();

    echo 'Caching OIDs:'."\n";

    $ge20x_oids   = snmpwalk_cache_multi_oid($device, 'cmEntityObjects' , $ge20x_oids,   'CM-ENTITY-MIB', '', '-OQUbs');

    echo 'OIDs:'."\n";

//var_dump($egx_oids);
//$results = print_r($ge20x_oids, true); // $results now contains output from print_r
//file_put_contents('/opt/librenms/adva-precache.txt', $results);

}

// end of OS condition

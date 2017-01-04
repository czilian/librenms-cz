<?php

if ($device['os'] == 'advafsp150eg-x') {
    echo 'Pre-cache ADVA FSP150 EG-X (advafsp150eg-x):';
    echo "\n";

    $egx_oids = array();
    $egxPSU   = array();
    $egxSWF   = array();

    echo 'Caching OIDs:'."\n";

    $egxPSU   = snmpwalk_cache_multi_oid($device, 'psuTable'                     , $egxPSU,   'CM-ENTITY-MIB', '', '-OQUbs');
    $egxSWF   = snmpwalk_cache_multi_oid($device, 'ethernetSWFCardTable'         , $egxSWF,   'CM-ENTITY-MIB', '', '-OQUbs');
    $egx_oids = snmpwalk_cache_multi_oid($device, 'ethernetSWFCardTable'         , $egx_oids, 'CM-ENTITY-MIB', '', '-OQUbs');
    $egx_oids = snmpwalk_cache_multi_oid($device, 'ethernet1x10GHighPerCardTable', $egx_oids, 'CM-ENTITY-MIB', '', '-OQUbs');
    $egx_oids = snmpwalk_cache_multi_oid($device, 'ethernet10x1GHighPerCardTable', $egx_oids, 'CM-ENTITY-MIB', '', '-OQUbs');

    echo 'OIDs:'."\n";

//    var_dump($egx_oids);
//$results = print_r($egxSWF, true); // $results now contains output from print_r
//file_put_contents('/opt/librenms/adva-precache.txt', $results);

}

// end of OS condition

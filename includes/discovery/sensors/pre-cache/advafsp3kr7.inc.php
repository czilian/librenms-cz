<?php

if ($device['os'] == 'advafsp3kr7') {
    echo 'Pre-cache ADVA FSP3000 R7 (advafsp3kr7):';
    echo "\n";

    $advafsp3kr7_oids = array();

    echo 'Caching OIDs:'."\n";

    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'pmSnapshotCurrentEntry', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'entityFacilityOneIndex', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'entityDcnOneIndex', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'entityOpticalMuxOneIndex', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'entityFacilityAidString', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'entityDcnAidString', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'entityOpticalMuxAidString', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'plugMaxDataRate', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'plugAdmin', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'physicalPortFrequency', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'plugTransmitChannel', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'plugFiberType', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');
    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'plugReach', $advafsp3kr7_oids, 'ADVA-FSPR7-MIB', '', '-OQUbs');


    echo 'OIDs:'."\n";

    var_dump($advafsp3kr7_oids);

} // end of OS condition

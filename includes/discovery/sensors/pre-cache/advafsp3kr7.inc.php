<?php

if ($device['os'] == 'advafsp3kr7') {
    echo 'Pre-cache ADVA FSP3000 R7 (advafsp3kr7):
';

    $advafsp3kr7_oids = array();
    echo 'Caching OIDs:
';

    $advafsp3kr7_oids = snmpwalk_cache_multi_oid($device, 'pmSnapshotCurrentEntry' , array(), 'ADVA-FSPR7-MIB', '','-OQUbs');
}

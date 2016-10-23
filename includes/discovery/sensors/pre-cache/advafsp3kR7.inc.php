<?php

if ($device['os'] == 'advafsp3kR7') {
    echo 'Pre-cache ADVA FSP3000 R7 (advafsp3kR7):
';

    $advafsp3kR7_oids = array();
    echo 'Caching OIDs:
';

    $advafsp3kR7_oids = snmpwalk_cache_multi_oid($device, 'pmSnapshotCurrentEntry' , array(), 'ADVA-FSPR7-MIB', '','-OQUbs');
}

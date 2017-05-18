<?php

<<<<<<< HEAD
if ($device['os'] == 'datacom') {
    echo 'Pre-cache Datacom: ';

    $datacom_oids = array();
    echo 'Caching OIDs:';

    $datacom_oids = snmpwalk_cache_multi_oid($device, 'ddTransceiversEntry', array(), 'DMswitch-MIB');
}
=======
echo 'ddTransceiversEntry ';
$pre_cache['datacom_oids'] = snmpwalk_cache_multi_oid($device, 'ddTransceiversEntry', array(), 'DMswitch-MIB');
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

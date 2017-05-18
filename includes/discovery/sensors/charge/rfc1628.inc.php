<?php

// RFC1628 UPS
<<<<<<< HEAD
if (isset($config['modules_compat']['rfc1628'][$device['os']]) && $config['modules_compat']['rfc1628'][$device['os']]) {
    echo 'RFC1628 ';

    $oids = snmp_walk($device, '.1.3.6.1.2.1.33.1.2.4', '-Osqn', 'UPS-MIB');
    d_echo($oids."\n");

    $oids = trim($oids);
    foreach (explode("\n", $oids) as $data) {
        $data = trim($data);
        if ($data) {
            list($oid,$descr) = explode(' ', $data, 2);
            $split_oid        = explode('.', $oid);
            $current_id       = $split_oid[(count($split_oid) - 1)];
            $current_oid      = ".1.3.6.1.2.1.33.1.2.4.$current_id";
            $current          = snmp_get($device, $current_oid, '-O vq');
            $descr            = 'Battery charge remaining'.(count(explode("\n", $oids)) == 1 ? '' : ' '.($current_id + 1));
            $type             = 'rfc1628';
            $index            = (500 + $current_id);

            discover_sensor($valid['sensor'], 'charge', $device, $current_oid, $index, $type, $descr, '1', '1', null, null, null, null, $current);
        }
    }
}//end if
=======
echo 'RFC1628 ';

$oids = snmp_walk($device, '.1.3.6.1.2.1.33.1.2.4', '-Osqn', 'UPS-MIB');
d_echo($oids."\n");

$oids = trim($oids);
foreach (explode("\n", $oids) as $data) {
    $data = trim($data);
    if ($data) {
        list($oid,$descr) = explode(' ', $data, 2);
        $split_oid        = explode('.', $oid);
        $current_id       = $split_oid[(count($split_oid) - 1)];
        $current_oid      = ".1.3.6.1.2.1.33.1.2.4.$current_id";
        $current          = snmp_get($device, $current_oid, '-O vq');
        $descr            = 'Battery charge remaining'.(count(explode("\n", $oids)) == 1 ? '' : ' '.($current_id + 1));
        $type             = 'rfc1628';
        $index            = (500 + $current_id);

        discover_sensor($valid['sensor'], 'charge', $device, $current_oid, $index, $type, $descr, 1, 1, 15, 50, null, 101, $current);
    }
}
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

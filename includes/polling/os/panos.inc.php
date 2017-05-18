<?php

<<<<<<< HEAD
=======
use LibreNMS\RRD\RrdDefinition;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$hardware = trim(snmp_get($device, '1.3.6.1.4.1.25461.2.1.2.2.1.0', '-OQv', '', ''), '" ');
$version  = trim(snmp_get($device, '1.3.6.1.4.1.25461.2.1.2.1.1.0', '-OQv', '', ''), '" ');
$serial   = trim(snmp_get($device, '1.3.6.1.4.1.25461.2.1.2.1.3.0', '-OQv', '', ''), '" ');

// list(,,,$hardware) = explode (" ", $poll_device['sysDescr']);
$sessions = snmp_get($device, '1.3.6.1.4.1.25461.2.1.2.3.3.0', '-Ovq');

if (is_numeric($sessions)) {
<<<<<<< HEAD
    $rrd_def = 'DS:sessions:GAUGE:600:0:3000000';
=======
    $rrd_def = RrdDefinition::make()->addDataset('sessions', 'GAUGE', 0, 3000000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

    $fields = array(
        'sessions' => $sessions,
    );

    $tags = compact('rrd_def');
    data_update($device, 'panos-sessions', $tags, $fields);

    $graphs['panos_sessions'] = true;
}

$activetunnels = snmp_get($device, '1.3.6.1.4.1.25461.2.1.2.5.1.3.0', '-Ovq');

if (is_numeric($activetunnels)) {
<<<<<<< HEAD
    $rrd_def = 'DS:activetunnels:GAUGE:600:0:3000000';
=======
    $rrd_def = RrdDefinition::make()->addDataset('activetunnels', 'GAUGE', 0, 3000000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

    $fields = array(
        'activetunnels' => $activetunnels,
    );

    $tags = compact('rrd_def');
    data_update($device, 'panos-activetunnels', $tags, $fields);

    $graphs['panos_activetunnels'] = true;
}

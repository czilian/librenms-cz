<?php
/*
 * LibreNMS Pulse Secure OS information module
 *
 * Copyright (c) 2015 Christophe Martinet Chrisgfx <martinet.christophe@gmail.com>
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
*/

<<<<<<< HEAD
=======
use LibreNMS\RRD\RrdDefinition;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$version = preg_replace('/[\r\n\"]+/', ' ', snmp_get($device, "productVersion.0", "-OQv", "PULSESECURE-PSG-MIB"));
$hardware = "Juniper " . preg_replace('/[\r\n\"]+/', ' ', snmp_get($device, "productName.0", "-OQv", "PULSESECURE-PSG-MIB"));
$hostname = trim($poll_device['sysName'], '"');

$users = snmp_get($device, 'iveConcurrentUsers.0', '-OQv', 'PULSESECURE-PSG-MIB');

if (is_numeric($users)) {
<<<<<<< HEAD
    $rrd_def = 'DS:users:GAUGE:600:0:U';
=======
    $rrd_def = RrdDefinition::make()->addDataset('users', 'GAUGE', 0);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

    $fields = array(
        'users' => $users,
    );

    $tags = compact('rrd_def');
    data_update($device, 'pulse_users', $tags, $fields);
    $graphs['pulse_users'] = true;
}

$sessions = snmp_get($device, 'iveConcurrentUsers.0', '-OQv', 'PULSESECURE-PSG-MIB');

if (is_numeric($sessions)) {
<<<<<<< HEAD
    $rrd_def = 'DS:sessions:GAUGE:600:0:U';
=======
    $rrd_def = RrdDefinition::make()->addDataset('sessions', 'GAUGE', 0);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

    $fields = array(
        'sessions' => $sessions,
    );

    $tags = compact('rrd_def');
    data_update($device, 'pulse_sessions', $tags, $fields);
    $graphs['pulse_sessions'] = true;
}

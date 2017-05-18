<?php
/*
 * LibreNMS
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

<<<<<<< HEAD
$rssi = snmp_get($device, "CISCO-WAN-3G-MIB::c3gCurrentGsmRssi.13", "-Ovqn", "CISCO-WAN-3G-MIB");
if (is_numeric($rssi)) {
    $rrd_def = 'DS:rssi:GAUGE:600:-150:5000';
=======
use LibreNMS\RRD\RrdDefinition;

$rssi = snmp_get($device, "CISCO-WAN-3G-MIB::c3gCurrentGsmRssi.13", "-Ovqn", "CISCO-WAN-3G-MIB");
if (is_numeric($rssi)) {
    $rrd_def = RrdDefinition::make()->addDataset('rssi', 'GAUGE', -150, 5000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $fields = array(
        'rssi' => $rssi,
    );
    $tags = compact('rrd_def');
    data_update($device, 'cisco-wwan-rssi', $tags, $fields);
    $graphs['cisco_wwan_rssi'] = true;
}

$mnc = snmp_get($device, "CISCO-WAN-3G-MIB::c3gGsmMnc.13", "-Ovqn", "CISCO-WAN-3G-MIB");
if (is_numeric($mnc)) {
<<<<<<< HEAD
    $rrd_def = 'DS:mnc:GAUGE:600:0:U';
=======
    $rrd_def = RrdDefinition::make()->addDataset('mnc', 'GAUGE', 0);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $fields = array(
        'mnc' => $mnc,
    );
    $tags = compact('rrd_def');
    data_update($device, 'cisco-wwan-rssi', $tags, $fields);
    $graphs['cisco-wwan-mnc'] = true;
}
unset($rrd_def, $rssi, $mnc, $fields, $tags);

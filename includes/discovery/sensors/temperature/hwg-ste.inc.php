<?php
/*
 * LibreNMS
 *
 * Copyright (c) 2016 Søren Friis Rosiak <sorenrosiak@gmail.com> 
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

<<<<<<< HEAD:includes/discovery/sensors/temperatures/riverbed.inc.php
if ($device['os'] == 'riverbed') {
    d_echo('Riverbed');
    $oid = '.1.3.6.1.4.1.17163.1.1.2.9.0';
    $index = 0;
    $descr = 'System Temperature';
    $temperature = snmp_get($device, $oid, '-Oqv');
    if (is_numeric($temperature)) {
        discover_sensor($valid['sensor'], 'temperature', $device, $oid, $index, 'riverbed', $descr, '1', '1', 0, null, null, 65, $temperature);
=======
$temp = snmpwalk_cache_multi_oid($device, 'sensTable', array(), 'STE-MIB');
$cur_oid = '.1.3.6.1.4.1.21796.4.1.3.1.5.';

if (is_array($temp)) {
    foreach ($temp as $index => $entry) {
        discover_sensor($valid['sensor'], 'temperature', $device, $cur_oid.$index, $index, 'hwg-ste', $temp[$index]['sensName'], '10', '1', null, null, null, null, $temp[$index]['sensValue'], 'snmp', $index);
>>>>>>> 716441eeda921def312f3448de38aa42cf26c50c:includes/discovery/sensors/temperature/hwg-ste.inc.php
    }
}

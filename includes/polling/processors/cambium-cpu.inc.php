<?php
/*
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */
echo 'Cambium CPU Usage';

<<<<<<< HEAD:includes/discovery/os/ciscowlc.inc.php
if (str_contains($sysDescr, 'Cisco Controller')) {
    $os = 'ciscowlc';
=======
$usage = str_replace('"', "", snmp_get($device, 'CAMBIUM-PMP80211-MIB::sysCPUUsage.0', '-OvQ'));

if (is_numeric($usage)) {
    $proc = ($usage / 10);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7:includes/polling/processors/cambium-cpu.inc.php
}

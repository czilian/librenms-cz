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
// Simple hard-coded poller for Pulse Secure
// Yes, it really can be this simple.

echo 'Pulse Secure CPU Usage';

<<<<<<< HEAD
if ($device['os'] == 'pulse') {
    $usage = str_replace('"', "", snmp_get($device, 'PULSESECURE-PSG-MIB::iveCpuUtil.0', '-OvQ'));

    if (is_numeric($usage)) {
        $proc = ($usage * 100);
    }
=======
$usage = str_replace('"', "", snmp_get($device, 'PULSESECURE-PSG-MIB::iveCpuUtil.0', '-OvQ'));

if (is_numeric($usage)) {
    $proc = ($usage * 100);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}

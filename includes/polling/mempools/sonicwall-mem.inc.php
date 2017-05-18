<?php
/*
 * LibreNMS SonicWALL CPU information module
 *
 * Copyright (c) 2015 Mark Nagel <mnagel@willingminds.com>
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */
<<<<<<< HEAD
if ($device['os'] == 'sonicwall') {
    echo 'SonicWALL-MEMORY-POOL: ';
    $perc = str_replace('"', "", snmp_get($device, 'SONICWALL-FIREWALL-IP-STATISTICS-MIB::sonicCurrentRAMUtil.0', '-OvQ'));
    if (is_numeric($perc)) {
        $mempool['perc'] = $perc;
        $mempool['used'] = $perc;
        $mempool['total'] = 100;
        $mempool['free'] = 100 - $perc;
    }
=======

echo 'SonicWALL-MEMORY-POOL: ';
$perc = str_replace('"', "", snmp_get($device, 'SONICWALL-FIREWALL-IP-STATISTICS-MIB::sonicCurrentRAMUtil.0', '-OvQ'));
if (is_numeric($perc)) {
    $mempool['perc'] = $perc;
    $mempool['used'] = $perc;
    $mempool['total'] = 100;
    $mempool['free'] = 100 - $perc;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}

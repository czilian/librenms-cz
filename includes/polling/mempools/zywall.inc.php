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

<<<<<<< HEAD
if ($device['os'] == 'zywall') {
    d_echo('Zywall');
    $perc = snmp_get($device, ".1.3.6.1.4.1.890.1.6.22.1.2.0", '-OvQ');
    if (is_numeric($perc)) {
        $mempool['perc'] = $perc;
        $mempool['used'] = $perc;
        $mempool['total'] = 100;
        $mempool['free'] = 100 - $perc;
    }
=======
d_echo('Zywall');
$perc = snmp_get($device, ".1.3.6.1.4.1.890.1.6.22.1.2.0", '-OvQ');
if (is_numeric($perc)) {
    $mempool['perc'] = $perc;
    $mempool['used'] = $perc;
    $mempool['total'] = 100;
    $mempool['free'] = 100 - $perc;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}

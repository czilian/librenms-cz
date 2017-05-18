<?php
/*
 * LibreNMS module to Graph Hardware MTP Resources in a Cisco Voice Router
 *
 * Copyright (c) 2015 Aaron Daniels <aaron@daniels.id.au>
 *
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
if ($device['os_group'] == "cisco") {
    // Total
    $total = snmpwalk_cache_oid_num($device, "1.3.6.1.4.1.9.9.86.1.6.4.1.3", null);
    $total = $total['1.3.6.1.4.1.9.9.86.1.6.4.1.3'][''];

    if (isset($total) && $total > 0) {
        // Available
        $available = snmpwalk_cache_oid_num($device, "1.3.6.1.4.1.9.9.86.1.6.4.1.4", null);
        $available = $available['1.3.6.1.4.1.9.9.86.1.6.4.1.4'][''];

        // Active
        $active = $total - $available;

<<<<<<< HEAD
        $rrd_def = array(
            'DS:total:GAUGE:600:0:U',
            'DS:active:GAUGE:600:0:U'
        );
=======
        $rrd_def = RrdDefinition::make()
            ->addDataset('total', 'GAUGE', 0)
            ->addDataset('active', 'GAUGE', 0);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

        $fields = array(
            'total'  => $total,
            'active' => $active,
        );

        $tags = compact('rrd_def');
        data_update($device, 'cisco-iosmtp', $tags, $fields);

        $graphs['cisco-iosmtp'] = true;
        echo (" Cisco IOS MTP ");
    }
    unset($rrd_def, $total, $active, $available, $fields, $tags);
}

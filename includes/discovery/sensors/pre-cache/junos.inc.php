<?php
/*
 * LibreNMS
 *
 * Copyright (c) 2016 Neil Lathwood <neil@lathwood.co.uk>
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

<<<<<<< HEAD
if ($device['os'] == 'junos') {
    echo 'Pre-cache JunOS: ';

    $junos_oids = array();
    echo 'Caching OIDs:';

    $junos_oids = snmpwalk_cache_multi_oid($device, 'JnxDomCurrentEntry', array(), 'JUNIPER-DOM-MIB', 'junos');
}
=======
echo 'JnxDomCurrentEntry ';
$pre_cache['junos_oids'] = snmpwalk_cache_multi_oid($device, 'JnxDomCurrentEntry', array(), 'JUNIPER-DOM-MIB', 'junos');

echo 'JnxDomCurrentLaneEntry ';
$pre_cache['junos_multilane_oids'] = snmpwalk_cache_multi_oid($device, 'JnxDomCurrentLaneEntry', array(), 'JUNIPER-DOM-MIB', 'junos');
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

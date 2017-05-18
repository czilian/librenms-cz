<?php
<<<<<<< HEAD
=======

use LibreNMS\RRD\RrdDefinition;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$version = trim(snmp_get($device, "BLUECOAT-SG-PROXY-MIB::sgProxyVersion.0", "-OQv"), '"');
$hardware = trim(snmp_get($device, "BLUECOAT-SG-PROXY-MIB::sgProxySoftware.0", "-OQv"), '"');
$hostname = trim(snmp_get($device, "SNMPv2-MIB::sysName.0", "-OQv"), '"');
$sgos_requests = snmp_get($device, "BLUECOAT-SG-PROXY-MIB::sgProxyHttpClientRequestRate.0", "-OQvU");

if (is_numeric($sgos_requests)) {
<<<<<<< HEAD
    $rrd_def = 'DS:requests:GAUGE:600:0:U';
=======
    $rrd_def = RrdDefinition::make()->addDataset('requests', 'GAUGE', 0);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $fields = array(
        'requests' => $sgos_requests
    );
    $tags = compact('rrd_def');
    data_update($device, 'sgos_average_requests', $tags, $fields);
    $graphs['sgos_average_requests'] = true;
}

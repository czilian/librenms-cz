<?php
<<<<<<< HEAD
=======
use LibreNMS\RRD\RrdDefinition;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

if (!starts_with($device['os'], array('Snom', 'asa'))) {
    echo ' IP-FORWARD';

<<<<<<< HEAD
    // Below have more oids, and are in trees by themselves, so we can snmpwalk_cache_oid them
    $oids = array('ipCidrRouteNumber');

    unset($snmpstring, $fields, $snmpdata, $snmpdata_cmd, $rrd_create);

    $rrd_def = array();
    $snmpstring = '';
    foreach ($oids as $oid) {
        $oid_ds       = substr($oid, 0, 19);
        $rrd_create[] = "DS:$oid_ds:GAUGE:600:U:1000000"; // Limit to 1MPPS?
        $snmpstring .= ' IP-FORWARD-MIB::'.$oid.'.0';
    }

    $data = snmp_get_multi($device, $snmpstring, '-OQUs', 'IP-FORWARD-MIB');

    $fields = array();
    foreach ($oids as $oid) {
        if (is_numeric($data[0][$oid])) {
            $value = $data[0][$oid];
        } else {
            $value = 'U';
        }
        $fields[$oid] = $value;
    }

    if (isset($data[0]['ipCidrRouteNumber'])) {
        $tags = compact('rrd_def');
        data_update($device, 'netstats-ip_forward', $tags, $fields);

        $graphs['netstat_ip_forward'] = true;
    }
}

unset($oids, $rrd_def, $data, $oid, $fields, $snmpstring, $tags);
=======
    $oid = 'ipCidrRouteNumber';
    $fields = array();
    $rrd_def = RrdDefinition::make()->addDataset($oid, 'GAUGE', null, 5000000);
    $data = snmp_get($device, 'IP-FORWARD-MIB::' . $oid . '.0', '-OQv');
    if (is_numeric($data)) {
        $value = $data;
        $fields[$oid] = $value;
        $tags = compact('rrd_def');
        data_update($device, 'netstats-ip_forward', $tags, $fields);
        $graphs['netstat_ip_forward'] = true;
    }
}
unset($oid, $rrd_def, $data, $fields, $tags);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

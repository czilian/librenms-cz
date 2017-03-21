<?php

<<<<<<< HEAD
if ($device['os'] != 'Snom') {
=======
use LibreNMS\RRD\RrdDefinition;

if (!starts_with($device['os'], array('Snom', 'asa'))) {
>>>>>>> 716441eeda921def312f3448de38aa42cf26c50c
    echo ' TCP';

    $oids = array(
        'tcpActiveOpens',
        'tcpPassiveOpens',
        'tcpAttemptFails',
        'tcpEstabResets',
        'tcpCurrEstab',
        'tcpInSegs',
        'tcpOutSegs',
        'tcpRetransSegs',
        'tcpInErrs',
        'tcpOutRsts',
    );

<<<<<<< HEAD
    $rrd_def = array();
    $snmpstring = '';
    foreach ($oids as $oid) {
        $oid_ds      = truncate($oid, 19, '');
        $rrd_def[]   = " DS:$oid_ds:COUNTER:600:U:10000000"; // Limit to 10MPPS
=======
    $rrd_def = new RrdDefinition();
    $snmpstring = '';
    foreach ($oids as $oid) {
        $rrd_def->addDataset($oid, 'COUNTER', null, 10000000);
>>>>>>> 716441eeda921def312f3448de38aa42cf26c50c
        $snmpstring .= ' TCP-MIB::'.$oid.'.0';
    }

    $snmpstring .= ' tcpHCInSegs.0';
    $snmpstring .= ' tcpHCOutSegs.0';

    $data = snmp_get_multi($device, $snmpstring, '-OQUs', 'TCP-MIB');
<<<<<<< HEAD
    $fields = $data[0];

    // use HC Segs if we have them.
    if (isset($fields['tcpHCInSegs'])) {
        if (!empty($fields['tcpHCInSegs'])) {
            $fields['tcpInSegs'] = $fields['tcpHCInSegs'];
            $fields['tcpOutSegs'] = $fields['tcpHCOutSegs'];
        }
        unset($fields['tcpHCInSegs'], $fields['tcpHCOutSegs']);
    }

    if (isset($fields['tcpInSegs']) && isset($fields['tcpOutSegs'])) {
=======
    $data = $data[0];

    if (isset($data['tcpInSegs']) && isset($data['tcpOutSegs'])) {
        $fields = array();
        foreach ($oids as $oid) {
            $fields[$oid] = isset($data[$oid]) ? $data[$oid] : 'U';
        }

        // use HC Segs if we have them.
        if (isset($data['tcpHCInSegs'])) {
            if (!empty($data['tcpHCInSegs'])) {
                $fields['tcpInSegs'] = $data['tcpHCInSegs'];
                $fields['tcpOutSegs'] = $data['tcpHCOutSegs'];
            }
        }

>>>>>>> 716441eeda921def312f3448de38aa42cf26c50c
        $tags = compact('rrd_def');
        data_update($device, 'netstats-tcp', $tags, $fields);

        $graphs['netstat_tcp'] = true;
    }

<<<<<<< HEAD
    unset($oids, $data, $fields, $oid, $protos, $snmpstring);
=======
    unset($oids, $data, $fields, $oid, $snmpstring);
>>>>>>> 716441eeda921def312f3448de38aa42cf26c50c
}//end if

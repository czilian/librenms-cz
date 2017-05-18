<?php

<<<<<<< HEAD
=======
use LibreNMS\RRD\RrdDefinition;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
if ($device['os'] != 'Snom') {
    echo ' SNMP';

    // Below have more oids, and are in trees by themselves, so we can snmpwalk_cache_oid them
    $oids = array(
        'snmpInPkts',
        'snmpOutPkts',
        'snmpInBadVersions',
        'snmpInBadCommunityNames',
        'snmpInBadCommunityUses',
        'snmpInASNParseErrs',
        'snmpInTooBigs',
        'snmpInNoSuchNames',
        'snmpInBadValues',
        'snmpInReadOnlys',
        'snmpInGenErrs',
        'snmpInTotalReqVars',
        'snmpInTotalSetVars',
        'snmpInGetRequests',
        'snmpInGetNexts',
        'snmpInSetRequests',
        'snmpInGetResponses',
        'snmpInTraps',
        'snmpOutTooBigs',
        'snmpOutNoSuchNames',
        'snmpOutBadValues',
        'snmpOutGenErrs',
        'snmpOutGetRequests',
        'snmpOutGetNexts',
        'snmpOutSetRequests',
        'snmpOutGetResponses',
        'snmpOutTraps',
        'snmpSilentDrops',
        'snmpProxyDrops',
    );

    $data = snmpwalk_cache_oid($device, 'snmp', array(), 'SNMPv2-MIB');

    if (isset($data[0]['snmpInPkts'])) {
<<<<<<< HEAD
        $rrd_def = array();
        $fields = array();
        foreach ($oids as $oid) {
            $oid_ds    = substr($oid, 0, 19);
            $rrd_def[] = "DS:$oid_ds:COUNTER:600:U:100000000000";
=======
        $rrd_def = new RrdDefinition();
        $fields = array();
        foreach ($oids as $oid) {
            $rrd_def->addDataset($oid, 'COUNTER', null, 100000000000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
            $fields[$oid] = isset($data[0][$oid]) ? $data[0][$oid] : 'U';
        }

        $tags = compact('rrd_def');
        data_update($device, 'netstats-snmp', $tags, $fields);

        $graphs['netstat_snmp']     = true;
        $graphs['netstat_snmp_pkt'] = true;
    }

    unset($oids, $data, $rrd_def, $fields, $tags);
}//end if

<?php

<<<<<<< HEAD
if ($this_port['dot3StatsIndex'] and $port['ifType'] == 'ethernetCsmacd') {
    $rrd_oldname= 'etherlike-'.$port['ifIndex']; // TODO: remove oldname check?
    $rrd_name = getPortRrdName($port_id, 'dot3');
    $rrd_def = array();

    $rrd_create = $config['rrd_rra'];
    foreach ($etherlike_oids as $oid) {
        $oid       = substr(str_replace('dot3Stats', '', $oid), 0, 19);
        $rrd_def[] = "DS:$oid:COUNTER:600:U:100000000000";
    }

    $fields = array();
    foreach ($etherlike_oids as $oid) {
        $data           = ($this_port[$oid] + 0);
=======
use LibreNMS\RRD\RrdDefinition;

if ($this_port['dot3StatsIndex'] and $port['ifType'] == 'ethernetCsmacd') {
    $rrd_oldname= 'etherlike-'.$port['ifIndex']; // TODO: remove oldname check?
    $rrd_name = getPortRrdName($port_id, 'dot3');

    $rrd_def = new RrdDefinition();
    $fields = array();
    foreach ($etherlike_oids as $oid) {
        $oid_ds = str_replace('dot3Stats', '', $oid);
        $rrd_def->addDataset($oid_ds, 'COUNTER', null, 100000000000);

        $data = ($this_port[$oid] + 0);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $fields[$oid] = $data;
    }

    $tags = compact('ifName', 'rrd_name', 'rrd_def', 'rrd_oldname');
    data_update($device, 'dot3', $tags, $fields);

    echo 'EtherLike ';
}

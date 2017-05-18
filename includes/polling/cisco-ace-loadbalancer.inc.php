<?php

<<<<<<< HEAD
if ($device['os_group'] == 'cisco') {
    $rserver_array = snmpwalk_cache_oid($device, 'cesServerFarmRserverTable', array(), 'CISCO-ENHANCED-SLB-MIB');
    $rserver_db = dbFetchRows('SELECT * FROM `loadbalancer_rservers` WHERE `device_id` = ?', array($device['device_id']));

=======
use LibreNMS\RRD\RrdDefinition;

if ($device['os_group'] == 'cisco') {
    $rserver_array = snmpwalk_cache_oid($device, 'cesServerFarmRserverTable', array(), 'CISCO-ENHANCED-SLB-MIB');
    $rserver_db = dbFetchRows('SELECT * FROM `loadbalancer_rservers` WHERE `device_id` = ?', array($device['device_id']));

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    foreach ($rserver_db as $serverfarm) {
        $serverfarms[$serverfarm['farm_id']] = $serverfarm;
    }

    foreach ($rserver_array as $index => $serverfarm) {
        $farm_id = preg_replace('@\d+\."(.*?)"\.\d+@', '\\1', $index);

        $oids = array(
            'cesServerFarmRserverTotalConns',
            'cesServerFarmRserverCurrentConns',
            'cesServerFarmRserverFailedConns',
        );

        $db_oids = array(
            $farm_id => 'farm_id',
            'cesServerFarmRserverStateDescr' => 'StateDescr',
        );

        if (!is_array($serverfarms[$farm_id])) {
            $rserver_id = dbInsert(array(
                'device_id' => $device['device_id'],
                'farm_id' => $farm_id,
                'StateDescr' => $serverfarm['cesServerFarmRserverStateDescr']
            ), 'loadbalancer_rservers');
        } else {
            foreach ($db_oids as $db_oid => $db_value) {
                $db_update[$db_value] = $serverfarm[$db_oid];
            }

            $updated = dbUpdate($db_update, 'loadbalancer_rservers', '`rserver_id` = ?', $serverfarm['cesServerFarmRserverFailedConns']['farm_id']);
        }

        $rrd_name = array('rserver', $serverfarms[$farm_id]['rserver_id']);

<<<<<<< HEAD
        $rrd_def = array();
        foreach ($oids as $oid) {
            $oid_ds = substr(str_replace('cesServerFarm', '', $oid), 0, 19);
            $rrd_def[] = "DS:$oid_ds:GAUGE:600:-1:100000000";
=======
        $rrd_def = new RrdDefinition();
        foreach ($oids as $oid) {
            $oid_ds = str_replace('cesServerFarm', '', $oid);
            $rrd_def->addDataset($oid_ds, 'GAUGE', -1, 100000000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        }

        $fields = array();

        foreach ($oids as $oid) {
            if (is_numeric($serverfarm[$oid])) {
                $value = $serverfarm[$oid];
            } else {
                $value = '0';
            }
            $fields[$oid] = $value;
        }

        if (isset($serverfarms[$farm_id])) {
            $tags = compact('farm_id', 'rrd_name', 'rrd_def');
            data_update($device, 'rservers', $tags, $fields);
        }
    }//end foreach

    unset($rrd_name, $rrd_def, $oids, $oid, $serverfarm);
}
<<<<<<< HEAD
=======

unset(
    $rserver_array,
    $rserver_db
);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

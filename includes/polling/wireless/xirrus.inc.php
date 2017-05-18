<?php
<<<<<<< HEAD
=======
use LibreNMS\RRD\RrdDefinition;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$radios = snmpwalk_cache_oid($device, 'XIRRUS-MIB::realtimeMonitorIfaceName', array(), 'XIRRUS-MIB');
$rssi = snmpwalk_cache_oid($device, 'XIRRUS-MIB::realtimeMonitorAverageRSSI', array(), 'XIRRUS-MIB');
$dataRate = snmpwalk_cache_oid($device, 'XIRRUS-MIB::realtimeMonitorAverageDataRate', array(), 'XIRRUS-MIB');
$noiseFloor = snmpwalk_cache_oid($device, 'XIRRUS-MIB::realtimeMonitorNoiseFloor', array(), 'XIRRUS-MIB');
$associations=array();

foreach ($radios as $idx => $radio) {
    $radioName = $radio['realtimeMonitorIfaceName'];
    $associations[$radioName]=0;

    $measurement = 'xirrus_stats';
    $rrd_name = array($measurement, $radioName);
<<<<<<< HEAD
    $rrd_def = array(
        'DS:rssi:GAUGE:600:-150:0',
        'DS:dataRate:GAUGE:600:0:1400',
        'DS:noiseFloor:GAUGE:600:-150:0'
    );
=======
    $rrd_def = RrdDefinition::make()
        ->addDataset('rssi', 'GAUGE', -150, 0)
        ->addDataset('dataRate', 'GAUGE', 0, 1400)
        ->addDataset('noiseFloor', 'GAUGE', -150, 0);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $fields = array(
        'rssi' => $rssi[$idx]['realtimeMonitorAverageRSSI'],
        'dataRate' => $dataRate[$idx]['realtimeMonitorAverageDataRate'],
        'noiseFloor' => $noiseFloor[$idx]['realtimeMonitorNoiseFloor']
    );
    $tags = compact('radioName', 'rrd_name', 'rrd_def');
    data_update($device, $measurement, $tags, $fields);
}

// if this config flag is true, don't poll for stations
// this in case of large APs which may have many stations
// to prevent causing long polling times
if ($config['xirrus_disable_stations']!=true) {
    // station associations
    // custom RRDs and graph as each AP may have 16 radios
    $assoc = snmpwalk_cache_oid($device, 'XIRRUS-MIB::stationAssociationIAP', array(), 'XIRRUS-MIB');
    foreach ($assoc as $s) {
        $radio = array_pop($s);
        $associations[$radio]++;
    }
    unset($radio);
    unset($assoc);
    // write to rrds
    foreach ($associations as $radio => $count) {
        $measurement = 'xirrus_users';
        $rrd_name = array($measurement, $radio);
<<<<<<< HEAD
        $rrd_def = 'DS:stations:GAUGE:600:0:3200';
=======
        $rrd_def = RrdDefinition::make()->addDataset('stations', 'GAUGE', 0, 3200);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $fields = array(
            'stations' => $count
        );
        $tags = compact('radio', 'rrd_name', 'rrd_def');
        data_update($device, $measurement, $tags, $fields);
    }
    $graphs['xirrus_stations'] = true;
} else {
    $graphs['xirrus_stations'] = false;
}

$graphs['xirrus_rssi'] = true;
$graphs['xirrus_dataRates'] = true;
$graphs['xirrus_noiseFloor'] = true;
$graphs['xirrus_stations'] = true;

// cleanup
unset($rrd_def, $radios, $rssi, $radioName, $associations, $tags, $fields, $measurement);

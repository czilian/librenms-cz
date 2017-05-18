<?php
/*
 * LibreNMS
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

<<<<<<< HEAD
$transmitPower = snmp_get($device, "transmitPower.0", "-Ovqn", "CAMBIUM-PTP650-MIB");
if (is_numeric($transmitPower)) {
    $rrd_def = 'DS:transmitPower:GAUGE:600:0:100';
=======
use LibreNMS\RRD\RrdDefinition;

$transmitPower = snmp_get($device, "transmitPower.0", "-Ovqn", "CAMBIUM-PTP650-MIB");
if (is_numeric($transmitPower)) {
    $rrd_def = RrdDefinition::make()->addDataset('transmitPower', 'GAUGE', 0, 100);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $fields = array(
        'transmitPower' => $transmitPower / 10,
    );
    $tags = compact('rrd_def');
    data_update($device, 'cambium-650-transmitPower', $tags, $fields);
    $graphs['cambium_650_transmitPower'] = true;
}

$rawReceivePower = snmp_get($device, "rawReceivePower.0", "-Ovqn", "CAMBIUM-PTP650-MIB");
if (is_numeric($rawReceivePower)) {
<<<<<<< HEAD
    $rrd_def = 'DS:rawReceivePower:GAUGE:600:-100:0';
=======
    $rrd_def = RrdDefinition::make()->addDataset('rawReceivePower', 'GAUGE', -100, 0);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $fields = array(
        'rawReceivePower' => $rawReceivePower / 10,
    );
    $tags = compact('rrd_def');
    data_update($device, 'cambium-650-rawReceivePower', $tags, $fields);
    $graphs['cambium_650_rawReceivePower'] = true;
}


$txModulation = snmp_get($device, ".1.3.6.1.4.1.17713.7.12.15.0", "-Ovqn", "");
$rxModulation = snmp_get($device, ".1.3.6.1.4.1.17713.7.12.14.0", "-Ovqn", "");
if (is_numeric($txModulation) && is_numeric($rxModulation)) {
<<<<<<< HEAD
    $rrd_def = array(
        'DS:txModulation:GAUGE:600:0:24',
        'DS:rxModulation:GAUGE:600:0:24'
    );
=======
    $rrd_def = RrdDefinition::make()
        ->addDataset('txModulation', 'GAUGE', 0, 24)
        ->addDataset('rxModulation', 'GAUGE', 0, 24);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $fields = array(
        'txModuation' => $txModulation,
        'rxModulation' => $rxModulation,
    );
    $tags = compact('rrd_def');
    data_update($device, 'cambium-650-modulationMode', $tags, $fields);
    $graphs['cambium_650_modulationMode'] = true;
}

$receiveDataRate = snmp_get($device, "receiveDataRate.0", "-Ovqn", "CAMBIUM-PTP650-MIB");
$transmitDataRate = snmp_get($device, "transmitDataRate.0", "-Ovqn", "CAMBIUM-PTP650-MIB");
$aggregateDataRate = snmp_get($device, "aggregateDataRate.0", "-Ovqn", "CAMBIUM-PTP650-MIB");
if (is_numeric($receiveDataRate) && is_numeric($transmitDataRate) && is_numeric($aggregateDataRate)) {
<<<<<<< HEAD
    $rrd_def = array(
        'DS:receiveDataRate:GAUGE:600:0:10000',
        'DS:transmitDataRate:GAUGE:600:0:10000',
        'DS:aggregateDataRate:GAUGE:600:0:10000'
    );
=======
    $rrd_def = RrdDefinition::make()
        ->addDataset('receiveDataRate', 'GAUGE', 0, 10000)
        ->addDataset('transmitDataRate', 'GAUGE', 0, 10000)
        ->addDataset('aggregateDataRate', 'GAUGE', 0, 10000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $fields = array(
        'receiveDataRate' => $receiveDataRate / 100,
        'transmitDataRate' => $transmitDataRate / 100,
        'aggregateDataRate' => $aggregateDataRate / 100,
    );
    $tags = compact('rrd_def');
    data_update($device, 'cambium-650-dataRate', $tags, $fields);
    $graphs['cambium_650_dataRate'] = true;
}

$ssr = snmp_get($device, "signalStrengthRatio.0", "-Ovqn", "CAMBIUM-PTP650-MIB");
if (is_numeric($ssr)) {
<<<<<<< HEAD
    $rrd_def = 'DS:ssr:GAUGE:600:-150:150';
=======
    $rrd_def = RrdDefinition::make()->addDataset('ssr', 'GAUGE', -150, 150);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $fields = array(
        'ssr' => $ssr,
    );
    $tags = compact('rrd_def');
    data_update($device, 'cambium-650-ssr', $tags, $fields);
    $graphs['cambium_650_ssr'] = true;
}

$gps = snmp_get($device, "tDDSynchronizationStatus.0", "-Ovqn", "CAMBIUM-PTP650-MIB");
if ($gps == 'locked') {
        $gps = 0;
} elseif ($gps == 'holdover') {
        $gps = 1;
} elseif ($gps == 'holdoverNoGPSSyncIn') {
    $gps = 2;
} elseif ($gps == 'notSynchronized') {
    $gps = 3;
} elseif ($gps == 'notSynchronizedNoGPSSyncIn') {
    $gps = 4;
} elseif ($gps == 'pTPSYNCNotConnected') {
    $gps = 5;
} elseif ($gps == 'initialising') {
    $gps = 6;
} elseif ($gps == 'clusterTimingMaster') {
    $gps = 7;
} elseif ($gps == 'acquiringLock') {
    $gps = 8;
} elseif ($gps == 'inactive') {
    $gps = 9;
}
if (is_numeric($gps)) {
<<<<<<< HEAD
    $rrd_def = 'DS:gps:GAUGE:600:0:10';
=======
    $rrd_def = RrdDefinition::make()->addDataset('gps', 'GAUGE', 0, 10);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $fields = array(
    'gps' => $gps,
        );
        $tags = compact('rrd_def');
        data_update($device, 'cambium-650-gps', $tags, $fields);
            $graphs['cambium_650_gps'] = true;
}

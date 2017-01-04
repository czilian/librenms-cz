<?php

if ($device['os'] == 'advafsp3kr7') {
    echo 'ADVA FSP3000 R7 - interface dBm sensor readings';

    $multiplier = 1;
    $divisor = 10;

//    $InputPower  = array('pmSnapshotCurrentInputPower'  => '.1.3.6.1.4.1.2544.1.11.7.7.2.3.1.2.');
//    $OutputPower = array('pmSnapshotCurrentOutputPower' => '.1.3.6.1.4.1.2544.1.11.7.7.2.3.1.1.');
//    $TxLineAtten = array('pmSnapshotCurrentTxLineAtten' => 'x';
//    $RxLineAtten = array('pmSnapshotCurrentRxLineAtten' => 'x';


    foreach ($advafsp3kr7_oids as $index => $entry) {
echo "\n-------------------- foreach ENTRY -----------------------------\n";


        if ($entry['pmSnapshotCurrentInputPower']) {
            $oid = '.1.3.6.1.4.1.2544.1.11.7.7.2.3.1.2.' . $index;
echo "---- Input Power ----\n";

            $port = get_port_by_index_cache($device['device_id'], $entry['OneIndex']);

            echo "Device:  ".$device['device_id']."\n";
            echo "Port:    ".$port['ifIndex']."\n";

            $limit_low                 = -20;
            $warn_limit_low            = -18;
            $limit                     = 7;
            $warn_limit                = 5;

            $current                   = $entry['pmSnapshotCurrentInputPower'];
            $descr                     = $port['ifDescr'].' RX Pwr []';
            $entPhysicalIndex          = 'ports';
            $entPhysicalIndex_measured = $port['ifIndex'];
            $descr                     = $port['ifDescr'].' RX Pwr []';
            echo "Descr:   ".$descr." dBm ".$current."\n";

            discover_sensor($valid['sensor'], 'dbm', $device, $oid, $entry['AidString'].'-RX', 'advafsp3kr7', $descr, $divisor, $multiplier, 
                            $limit_low, $warn_limit_low, $warn_limit, $limit, $current, 'snmp', $entPhysicalIndex, $entPhysicalIndex_measured);
        }//End if Input Power

        if (is_numeric(str_replace('dBm', '', $entry['pmSnapshotCurrentOutputPower']))) {
            $oid = '.1.3.6.1.4.1.2544.1.11.7.7.2.3.1.1.' . $index;
echo "\n---- Output Power ----\n";

            $port = get_port_by_index_cache($device['device_id'], $entry['OneIndex']);

            $limit_low                 = -20;
            $warn_limit_low            = -18;
            $limit                     = 7;
            $warn_limit                = 5;

            $current                   = $entry['pmSnapshotCurrentOutputPower'];
            $entPhysicalIndex          = 'ports';
            $entPhysicalIndex_measured = $port['ifIndex'];
            $descr                     = $port['ifDescr'].' TX Pwr []';
            echo "Descr:   ".$descr." dBm ".$current."\n";

            discover_sensor($valid['sensor'], 'dbm', $device, $oid, $entry['AidString'].'-TX', 'advafsp3kr7', $descr, $divisor, $multiplier, 
                            $limit_low, $warn_limit_low, $warn_limit, $limit, $current, 'snmp', $entPhysicalIndex, $entPhysicalIndex_measured);

        }//End if Output Power
    }//End foreach entry
}//End IF os

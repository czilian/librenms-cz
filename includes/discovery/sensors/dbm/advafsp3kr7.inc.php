<?php

if ($device['os'] == 'advafsp3kr7') {
    echo 'ADVA FSP3000 R7 - interface dBm sensor readings';

    $multiplier = 1;
    $divisor = 10;

    foreach ($advafsp3kr7_oids as $index => $entry) {
        if (is_numeric(str_replace('dBm', '', $entry['pmSnapshotCurrentInputPower']))) {
            $oid = '.1.3.6.1.4.1.2544.1.11.7.7.2.3.1.2.' . $index;

            $port = get_port_by_index_cache($device['device_id'], $entry['entityFacilityAidString']);

            $descr = dbFetchCell('SELECT `ifDescr` FROM `ports` WHERE `ifIndex`= ? AND `device_id` = ?', array($index, $device['device_id']))
                    .$entry['entityFacilityAidString'].' RX Pwr [';//.$entry['plugTransmitChannel'].']';

            $limit_low = -20;
            $warn_limit_low = -18;
            $limit = 7;
            $warn_limit = 5;
            $current                   = $entry['pmSnapshotCurrentInputPower'];
            $entPhysicalIndex          = 'port';
            $entPhysicalIndex_measured = $port['port_id'];
            //$entry['entityFacilityOneIndex'];
            discover_sensor($valid['sensor'], 'dbm', $device, $oid, $entry['entityFacilityAidString'].'-RX', 'advafsp3kr7', $descr, $divisor, $multiplier, $limit_low, $warn_limit_low, $warn_limit, $limit, $current, 'snmp', $entPhysicalIndex, $entPhysicalIndex_measured);
        }

        if (is_numeric(str_replace('dBm', '', $entry['pmSnapshotCurrentOutputPower']))) {
            $oid = '.1.3.6.1.4.1.2544.1.11.7.7.2.3.1.1.' . $index;

            $descr = dbFetchCell('SELECT `ifDescr` FROM `ports` WHERE `ifIndex`= ? AND `device_id` = ?', array($index, $device['device_id']))
                    .$entry['entityFacilityAidString'].' TX Pwr [';//.$entry['plugTransmitChannel'].']';

            $limit_low = -20;
            $warn_limit_low = -18;
            $limit = 7;
            $warn_limit = 5;
            $current                   = $entry['pmSnapshotCurrentOutputPower'];
            $entPhysicalIndex          = 'ports';
            $entPhysicalIndex_measured = $entry['entityFacilityOneIndex'];
            discover_sensor($valid['sensor'], 'dbm', $device, $oid, $entry['entityFacilityAidString'].'-TX', 'advafsp3kr7', $descr, $divisor, $multiplier, $limit_low, $warn_limit_low, $warn_limit, $limit, $current, 'snmp', $entPhysicalIndex, $entPhysicalIndex_measured);
        }
    }
}

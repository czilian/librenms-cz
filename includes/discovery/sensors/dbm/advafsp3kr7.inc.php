<?php

if ($device['os'] == 'advafsp3kr7') {
    echo 'ADVA FSP3000 R7 - interface dBm sensor readings';

    $multiplier = 1;
    $divisor = 10;

    foreach ($advafsp3kr7_oids as $index => $entry) {
        if (is_numeric(str_replace('dBm','',$entry['pmSnapshotCurrentInputPower']))) {
            $oid = '.1.3.6.1.4.1.2544.1.11.7.7.2.3.1.2.' . $index;
            // get associated ifDescr from NE
            $index_short_tmp = explode('.', $index, '-2');
            $index_short_tmp = implode('.',$index_short_tmp);
            $index_short_tmp = explode('.', $index_short_tmp, '3');
            $index_short = $index_short_tmp[2];

            $descr = dbFetchCell('SELECT `ifDescr` FROM `ports` WHERE `ifIndex`= ? AND `device_id` = ?', array($index, $device['device_id'])) . $index_short . ' Rx Pwr';
            /* Basic default values */
            $limit_low = -20;
            $warn_limit_low = -18;
            $limit = 7;
            $warn_limit = 5;
            $current = $entry['pmSnapshotCurrentInputPower'];
            $entPhysicalIndex = $index_short;
            $entPhysicalIndex_measured = $index_short;
            discover_sensor($valid['sensor'], 'dbm', $device, $oid, 'Rx-' . $index_short, 'advafsp3kr7', $descr, $divisor, $multiplier, $limit_low, $warn_limit_low, $warn_limit, $limit, $current, 'snmp', $entPhysicalIndex, $entPhysicalIndex_measured);
            }

        if (is_numeric(str_replace('dBm','',$entry['pmSnapshotCurrentOutputPower']))) {
            $oid = '.1.3.6.1.4.1.2544.1.11.7.7.2.3.1.1.' . $index;
            // get associated ifDescr from NE
            $index_short_tmp = explode('.', $index, '-2'); // remove last two segments from OID
            $index_short_tmp = implode('.',$index_short_tmp);
            $index_short_tmp = explode('.', $index_short_tmp, '3');
            $index_short = $index_short_tmp[2];

            $descr = dbFetchCell('SELECT `ifDescr` FROM `ports` WHERE `ifIndex`= ? AND `device_id` = ?', array($index, $device['device_id'])) . $index_short . ' Tx Pwr';
            /* Basic default values */
            $limit_low = -20;
            $warn_limit_low = -18;
            $limit = 7;
            $warn_limit = 5;
            $current = $entry['pmSnapshotCurrentOutputPower'];
            $entPhysicalIndex = $index_short;
            $entPhysicalIndex_measured = $index_short;
            discover_sensor($valid['sensor'], 'dbm', $device, $oid, 'Tx-' . $index_short, 'advafsp3kr7', $descr, $divisor, $multiplier, $limit_low, $warn_limit_low, $warn_limit, $limit, $current, 'snmp', $entPhysicalIndex, $entPhysicalIndex_measured);
            }

    }
}

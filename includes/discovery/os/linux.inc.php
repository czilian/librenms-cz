<?php


<<<<<<< HEAD
$skip_oids = array(
    '.1.3.6.1.4.1.674.10892.2',
    '.1.3.6.1.4.1.17163.1.1',
    '.1.3.6.1.4.1.17713.21',
    '.1.3.6.1.4.1.2.3.51.3',
    '.1.3.6.1.4.1.7779.', // nios
    '.1.3.6.1.4.1.9.1.1348' // Cisco Unified Communications Manager
);

if (starts_with($sysDescr, 'Linux') && !starts_with($sysObjectId, $skip_oids)) {
    $os = 'linux';

    // Specific Linux-derivatives
    if (starts_with($sysObjectId, array('.1.3.6.1.4.1.5528.100.20.10.2014', '.1.3.6.1.4.1.5528.100.20.10.2016'))) {
        $os = 'netbotz';
    } elseif (str_contains($sysDescr, 'endian')) {
        $os = 'endian';
    } elseif (str_contains($sysDescr, 'Cisco Small Business')) {
        $os = 'ciscosmblinux';
    } elseif (str_contains(snmp_get($device, 'ENTITY-MIB::entPhysicalMfgName.1', '-Osqnv'), 'QNAP')) {
        $os = 'qnap';
    } elseif (starts_with($sysObjectId, '.1.3.6.1.4.1.15397.2')) {
        $os = 'procera';
    } elseif (starts_with($sysObjectId, array('.1.3.6.1.4.1.10002.1', '.1.3.6.1.4.1.41112.1.4')) || str_contains(snmp_get($device, 'dot11manufacturerName.5', '-Osqnv', 'IEEE802dot11-MIB'), 'Ubiquiti')) {
=======
if (starts_with($sysDescr, 'Linux') || starts_with($sysObjectId, '.1.3.6.1.4.1.8072.3.2.10')) {
    $os = 'linux';

    // Specific Linux-derivatives
    if (starts_with($sysObjectId, array('.1.3.6.1.4.1.10002.1', '.1.3.6.1.4.1.41112.1.4')) || str_contains(snmp_get($device, 'dot11manufacturerName.5', '-Osqnv', 'IEEE802dot11-MIB'), 'Ubiquiti')) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $os = 'airos';
        if (str_contains(snmp_walk($device, 'dot11manufacturerProductName', '-Osqnv', 'IEEE802dot11-MIB'), 'UAP')) {
            $os = 'unifi';
        } elseif (snmp_get($device, 'fwVersion.1', '-Osqnv', 'UBNT-AirFIBER-MIB', 'ubnt') !== false) {
            $os = 'airos-af';
<<<<<<< HEAD
        }
    } elseif (snmp_get($device, 'GANDI-MIB::rxCounter.0', '-Osqnv', 'GANDI-MIB') !== false) {
        $os = 'pktj';
    } elseif (starts_with($sysObjectId, '.1.3.6.1.4.1.40310')) {
        $os = 'cumulus';
    } elseif (str_contains($sysDescr, array('g56fa85e', 'gc80f187', 'g829be90', 'g63c0044', 'gba768e5'))) {
        $os = 'sophos';
    } elseif (snmp_get($device, 'SFA-INFO::systemName.0', '-Osqnv', 'SFA-INFO') !== false) {
        $os = 'ddnos';
    } elseif (is_numeric(trim(snmp_get($device, 'roomTemp.0', '-OqvU', 'CAREL-ug40cdz-MIB', 'carel')))) {
        $os = 'pcoweb'; // Carel PCOweb
    } elseif (starts_with($sysDescr, 'Linux mirthtemplate')) {
        $os = 'mirth';
=======
        }
    } elseif (snmp_get($device, 'extrahopInfoVersionString', '-Osqnv', 'EXTRAHOP-MIB', 'extrahop') !== false) {
        $os = 'extrahop';
    } elseif (snmp_get($device, 'GANDI-MIB::rxCounter.0', '-Osqnv', 'GANDI-MIB') !== false) {
        $os = 'pktj';
    } elseif (snmp_get($device, 'SFA-INFO::systemName.0', '-Osqnv', 'SFA-INFO') !== false) {
        $os = 'ddnos';
    } elseif (is_numeric(trim(snmp_get($device, 'roomTemp.0', '-OqvU', 'CAREL-ug40cdz-MIB', 'carel')))) {
        $os = 'pcoweb'; // Carel PCOweb
    } elseif ($wrt = snmp_get($device, '.1.3.6.1.4.1.2021.7890.1.101.1', '-Osqnv')) {
        $wrt = trim($wrt, '"');
        if (starts_with($wrt, 'ASUSWRT-Merlin')) {
            $os = 'asuswrt-merlin';
        } elseif (starts_with($wrt, 'Tomato ')) {
            $os = 'tomato';
        }
    } elseif (preg_match('/^QNAP Systems/', snmp_get($device, "entPhysicalMfgName.1", "-Ovqn", "ENTITY-MIB"))) {
        $os = 'qnap';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    }
}

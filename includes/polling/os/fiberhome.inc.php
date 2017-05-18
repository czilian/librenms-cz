<?php
// ***********  Fiberhome S2800 Switches
if (starts_with($device['sysObjectID'], 'enterprises.3807.1.281802')) {
    $version  = trim(snmp_get($device, "msppDevSwVersion.0", "-OQv", "WRI-DEVICE-MIB"), '"');
    $hardware = 'FHN S2800 V'.trim(snmp_get($device, "msppDevHwVersion.0", "-OQv", "WRI-DEVICE-MIB"), '"');
   // No serial number readable. Using MAC instead
    $serial = trim(snmp_get($device, "msppDevMac.0", "-OQv", "WRI-DEVICE-MIB"), '"');
    $features = ''; //search for PTP info in MIB
}// End If S2800 Switches


/**
** Old OLT entries
$hardware = 'Fiberhome '.snmp_get($device, 'sysDescr.0', '-Oqv', 'GEPON-OLT-COMMON-MIB');
$version  = str_replace('"', '', snmp_get($device, 'sysHardVersion.0', '-Ovq', 'GEPON-OLT-COMMON-MIB')).' - '.str_replace('"', '', snmp_get($device, 'sysSoftVersion.0', '-Ovq', 'GEPON-OLT-COMMON-MIB'));
$features = 'Olt '.snmp_get($device, 'sysDescr.0', '-Oqv', 'GEPON-OLT-COMMON-MIB');
*/

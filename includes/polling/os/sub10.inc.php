<?php

if (preg_match("/Sub10 Systems - ([\s\d\w]+)/", $poll_device['sysDescr'], $hardware)) {
    $hardware = $hardware[1];
<<<<<<< HEAD
=======
} else {
    $hardware = $poll_device['sysDescr'];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}

$version = str_replace('"', '', snmp_get($device, 'sub10UnitLclFirmwareVersion.0', '-Osqnv', 'SUB10SYSTEMS-MIB'));
$serial = str_replace('"', '', snmp_get($device, 'sub10UnitLclHWSerialNumber.0', '-Osqnv', 'SUB10SYSTEMS-MIB'));

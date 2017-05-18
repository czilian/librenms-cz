<?php
echo 'DNOS CPU Usage';
<<<<<<< HEAD
if ($device['os'] == 'dnos') {
    $get_series = explode('.', snmp_get($device, 'mib-2.1.2.0', '-Onvsbq', 'F10-PRODUCTS-MIB', 'dnos'), 2); // Get series From MIB
    $series = $get_series[0];
    $descr = 'CPU';
    if ($series == 'f10SSeriesProducts') {
        $proc = trim(snmp_get($device, 'chStackUnitCpuUtil5Sec.1', '-OvQ', 'F10-S-SERIES-CHASSIS-MIB'));
    } elseif ($series == 'f10CSeriesProducts') {
        $proc = trim(snmp_get($device, 'chLineCardCpuUtil5Sec.1', '-OvQ', 'F10-S-SERIES-CHASSIS-MIB'));
    } else {
        preg_match('/(\d*\.\d*)/', snmp_get($device, '.1.3.6.1.4.1.674.10895.5000.2.6132.1.1.1.1.4.9.0', '-OvQ'), $matches);
        $proc = $matches[0];
    }
=======

$get_series = explode('.', snmp_get($device, 'mib-2.1.2.0', '-Onvsbq', 'F10-PRODUCTS-MIB', 'dnos'), 2); // Get series From MIB
$series = $get_series[0];
$descr = 'CPU';
if ($series == 'f10SSeriesProducts') {
    $proc = trim(snmp_get($device, 'chStackUnitCpuUtil5Sec.1', '-OvQ', 'F10-S-SERIES-CHASSIS-MIB'));
} elseif ($series == 'f10CSeriesProducts') {
    $proc = trim(snmp_get($device, 'chLineCardCpuUtil5Sec.1', '-OvQ', 'F10-S-SERIES-CHASSIS-MIB'));
} else {
    preg_match('/(\d*\.\d*)/', snmp_get($device, '.1.3.6.1.4.1.674.10895.5000.2.6132.1.1.1.1.4.9.0', '-OvQ'), $matches);
    $proc = $matches[0];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}

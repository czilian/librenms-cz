<?php

$tmp_text = trim(snmp_get($device, '.1.3.6.1.2.1.1.1.0', '-Oqv', ''),'"');
$pieces = explode(' ',$tmp_text);

$HWversion = trim(snmp_get($device, 'msppDevHwVersion.0', '-Oqv', 'WRI-DEVICE-MIB'),'"');
$hardware = $pieces[2].' '.$pieces[1].' HW '.$HWversion;

$version = trim(snmp_get($device, 'msppDevSwVersion.0', '-Oqv', 'WRI-DEVICE-MIB'),'"');

// cannot find the OID  
$serial = '1x1x1x1 OID tbd';

unset($pieces);

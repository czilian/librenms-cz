<?php
<<<<<<< HEAD

=======
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
/*
 * LibreNMS
 *
 * Copyright (c) 2015 Steve Calvário <https://github.com/Calvario/>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

<<<<<<< HEAD
if ($device['os'] == 'dsm') {
    echo 'DSM UPS Power';

    // UPS Device Manufacturer, example return : SNMPv2-SMI::enterprises.6574.4.1.2.0 = STRING: "American Power Conversion"
    $ups_device_manufacturer_oid = '.1.3.6.1.4.1.6574.4.1.2.0';
    $ups_device_manufacturer     = str_replace('"', '', snmp_get($device, $ups_device_manufacturer_oid, '-Oqv'));
    // UPS Device Model, example return : SNMPv2-SMI::enterprises.6574.4.1.1.0 = STRING: "Back-UPS RS 900G"
    $ups_device_model_oid = '.1.3.6.1.4.1.6574.4.1.1.0';
    $ups_device_model     = str_replace('"', '', snmp_get($device, $ups_device_model_oid, '-Oqv'));


    // UPS Info Real Power Nominal, example return : SNMPv2-SMI::enterprises.6574.4.2.21.2.0 = Opaque: Float: 540.000000
    $ups_real_power_nominal_oid = '.1.3.6.1.4.1.6574.4.2.21.2.0';
    $ups_real_power_nominal     = snmp_get($device, $ups_real_power_nominal_oid, '-Oqv');
    if (is_numeric($ups_real_power_nominal)) {
        discover_sensor($valid['sensor'], 'power', $device, $ups_real_power_nominal_oid, 'UPSRealPowerNominal', $ups_device_manufacturer.' '.$ups_device_model, 'UPS Real Power Nominal', '1', '1', null, null, null, null, $ups_real_power_nominal);
    }
=======
echo 'DSM UPS Power';

// UPS Device Manufacturer, example return : SNMPv2-SMI::enterprises.6574.4.1.2.0 = STRING: "American Power Conversion"
$ups_device_manufacturer_oid = '.1.3.6.1.4.1.6574.4.1.2.0';
$ups_device_manufacturer     = str_replace('"', '', snmp_get($device, $ups_device_manufacturer_oid, '-Oqv'));
// UPS Device Model, example return : SNMPv2-SMI::enterprises.6574.4.1.1.0 = STRING: "Back-UPS RS 900G"
$ups_device_model_oid = '.1.3.6.1.4.1.6574.4.1.1.0';
$ups_device_model     = str_replace('"', '', snmp_get($device, $ups_device_model_oid, '-Oqv'));

// UPS Info Real Power Nominal, example return : SNMPv2-SMI::enterprises.6574.4.2.21.2.0 = Opaque: Float: 540.000000
$ups_real_power_nominal_oid = '.1.3.6.1.4.1.6574.4.2.21.2.0';
$ups_real_power_nominal     = snmp_get($device, $ups_real_power_nominal_oid, '-Oqv');
if (is_numeric($ups_real_power_nominal)) {
    discover_sensor($valid['sensor'], 'power', $device, $ups_real_power_nominal_oid, 'UPSRealPowerNominal', $ups_device_manufacturer.' '.$ups_device_model, 'UPS Real Power Nominal', '1', '1', null, null, null, null, $ups_real_power_nominal);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}

<?php
/*
 * LibreNMS
 *
 * Copyright (c) 2017 Søren Friis Rosiak <sorenrosiak@gmail.com>
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

<<<<<<< HEAD
$data = snmp_get_multi($device, 'productIDDisplayName.0 productIDVendor.0 productIDVersion.0 physicalIdentSerialNumber.0', '-OQUs', 'DELL-SNMP-UPS-MIB');

$hardware = $data[0]['productIDDisplayName'];
$serial = $data[0]['physicalIdentSerialNumber'];
$version = $data[0]['productIDVersion'] . $data[0]['productIDVendor'];
=======
$data = snmp_get_multi($device, 'productIDDisplayName.0 productIDBuildNumber.0 productIDVersion.0 physicalIdentSerialNumber.0', '-OQUs', 'DELL-SNMP-UPS-MIB');

$hardware = $data[0]['productIDDisplayName'];
$serial = $data[0]['physicalIdentSerialNumber'];
$version = $data[0]['productIDVersion'] . '.' . $data[0]['productIDBuildNumber'];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

<?php

//$inventoryTable

$version  = 'SW V'.trim(snmp_get($device, "swVersionActiveApplSw.100737280", "-OQv", "ADVA-MIB"), '"');

$hardware = 'ADVA FSP3000R7 '.trim(snmp_get($device, "inventoryUnitName.33619968", "-OQv", "ADVA-MIB"), '"')
            .' V'.trim(snmp_get($device, "inventoryHardwareRev.33619968", "-OQv", "ADVA-MIB"), '"');

$serial = trim(snmp_get($device, "inventorySerialNum.33619968", "-OQv", "ADVA-MIB"), '"');

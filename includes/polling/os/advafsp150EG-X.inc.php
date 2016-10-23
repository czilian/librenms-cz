<?php

//$inventoryTable

$version  = 'SW V'.trim(snmp_get($device, "entPhysicalSoftwareRev.1", "-OQv", "ADVA-MIB"),'"');

$hardware = 'ADVA '.trim(snmp_get($device, "sysDescr.0", "-OQv", "ADVA-MIB"),'"')
            .' '.trim(snmp_get($device, "entPhysicalName.1", "-OQv", "ADVA-MIB"),'"')
            .' V'.trim(snmp_get($device, "entPhysicalHardwareRev.1", "-OQv", "ADVA-MIB"),'"');

$serial = trim(snmp_get($device, "entPhysicalSerialNum.1", "-OQv", "ADVA-MIB"),'"');


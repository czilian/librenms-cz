<?php
<<<<<<< HEAD
$version = trim(snmp_get($device, '.1.3.6.1.4.1.3375.2.1.4.2.0', '-OQv', '', ''), '"');
=======
$version = trim(snmp_get($device, '.1.3.6.1.4.1.3375.2.1.4.2.0', '-OQv'), '"');
$hardware = trim(snmp_get($device, '.1.3.6.1.4.1.3375.2.1.3.5.2.0', '-OQv'), '"');
$serial = trim(snmp_get($device, '.1.3.6.1.4.1.3375.2.1.3.3.3.0', '-OQv'), '"');
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

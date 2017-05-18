<?php

$hardware = 'Ubiquiti AF '.trim(snmp_get($device, 'dot11manufacturerProductName.5', '-Ovq', 'IEEE802dot11-MIB'));

<<<<<<< HEAD
$version         = trim(snmp_get($device, 'dot11manufacturerProductVersion.5', '-Ovq', 'IEEE802dot11-MIB'));
list(, $version) = preg_split('/\.v/', $version);

// EOF
=======
$version  = snmp_get($device, 'fwVersion.1', '-Ovq', 'UBNT-AirFIBER-MIB');
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

<?php

if ($device['os'] == 'fspr7') {
    echo 'ADVA FSP3KR7 : ';
    $descr = 'Processor';
    $usage = snmp_get($device, '.1.3.6.1.4.1.12356.101.4.1.3.0', '-Ovq');

    if (is_numeric($usage)) {
        discover_processor($valid['processor'], $device, '.1.3.6.1.4.1.12356.101.4.1.3.0', '0', 'ADVA-FSPR7-MIB', $descr, '1', $usage, null, null);
    }
} // END if device is ADVA

unset($processors_array);

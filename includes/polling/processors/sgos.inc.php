<?php

echo 'ProxySG CPU Usage';

<<<<<<< HEAD
if ($device['os'] == 'sgos') {
    $usage = str_replace('"', "", snmp_get($device, 'BLUECOAT-SG-PROXY-MIB::sgProxyCpuCoreBusyPerCent.0', '-OvQ'));

    if (is_numeric($usage)) {
        $proc = ($usage * 100);
    }
=======
$usage = str_replace('"', "", snmp_get($device, 'BLUECOAT-SG-PROXY-MIB::sgProxyCpuCoreBusyPerCent.0', '-OvQ'));

if (is_numeric($usage)) {
    $proc = ($usage * 100);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}

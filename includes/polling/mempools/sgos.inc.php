<?php

// Simple hard-coded poller for ProxySG

echo 'ProxySG MemPool'.'\n';

<<<<<<< HEAD
if ($device['os'] == 'sgos') {
    $used = str_replace('"', "", snmp_get($device, "BLUECOAT-SG-PROXY-MIB::sgProxyMemSysUsage.0", '-OUvQ'));
    $total = str_replace('"', "", snmp_get($device, "BLUECOAT-SG-PROXY-MIB::sgProxyMemAvailable.0", '-OUvQ'));
    $free = ($total - $used);
    $percent = ($used / $total * 100);

    $mempool['used'] = ($used);
    $mempool['free'] = ($free);
    $mempool['total'] = (($used + $free));
}
=======
$used = str_replace('"', "", snmp_get($device, "BLUECOAT-SG-PROXY-MIB::sgProxyMemSysUsage.0", '-OUvQ'));
$total = str_replace('"', "", snmp_get($device, "BLUECOAT-SG-PROXY-MIB::sgProxyMemAvailable.0", '-OUvQ'));
$free = ($total - $used);
$percent = ($used / $total * 100);

$mempool['used'] = ($used);
$mempool['free'] = ($free);
$mempool['total'] = (($used + $free));
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

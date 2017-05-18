<?php
if ($service['service_port']) {
    $port = $service['service_port'];
} else {
    $port = '23';
}
<<<<<<< HEAD
$check_cmd = $config['nagios_plugins'] . "/check_telnet -H ".$service['hostname']." -p ".$port;
=======
$check_cmd = $config['nagios_plugins'] . "/check_telnet -H ".$service['hostname']." -p ".$port." ".$service['service_param'];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

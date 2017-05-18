<?php

<<<<<<< HEAD
$version = preg_replace('/(.+)\ version\ (.+)\ \(SN:\ (.+)\,\ (.+)\)/', '\\1||\\2||\\3||\\4', $poll_device['sysDescr']);
list($hardware,$version,$serial,$features) = explode('||', $version);

=======
use LibreNMS\RRD\RrdDefinition;

$version = preg_replace('/(.+)\ version\ (.+)\ \(SN:\ (.+)\,\ (.+)\)/', '\\1||\\2||\\3||\\4', $poll_device['sysDescr']);
list($hardware,$version,$serial,$features) = explode('||', $version);

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$sess_cmd  = $config['snmpget'].' -M '.$config['mibdir'].' -O qv '.snmp_gen_auth($device).' '.$device['hostname'];
$sess_cmd .= ' .1.3.6.1.4.1.3224.16.3.2.0 .1.3.6.1.4.1.3224.16.3.3.0 .1.3.6.1.4.1.3224.16.3.4.0';
$sess_data = shell_exec($sess_cmd);
list ($sessalloc, $sessmax, $sessfailed) = explode("\n", $sess_data);

<<<<<<< HEAD
$rrd_def = array(
    'DS:allocate:GAUGE:600:0:3000000',
    'DS:max:GAUGE:600:0:3000000',
    'DS:failed:GAUGE:600:0:1000'
);
=======
$rrd_def = RrdDefinition::make()
    ->addDataset('allocate', 'GAUGE', 0, 3000000)
    ->addDataset('max', 'GAUGE', 0, 3000000)
    ->addDataset('failed', 'GAUGE', 0, 1000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

$fields = array(
    'allocate'  => $sessalloc,
    'max'       => $sessmax,
    'failed'    => $sessfailed,
);

$tags = compact('rrd_def');
data_update($device, 'screenos_sessions', $tags, $fields);

$graphs['screenos_sessions'] = true;

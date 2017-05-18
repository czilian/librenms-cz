#!/usr/bin/env php
<?php

$init_modules = array();
require realpath(__DIR__ . '/..') . '/includes/init.php';

rrdtool_initialize();

$options = getopt('h:p:');

$hosts = str_replace('*', '%', mres($options['h']));
$ports = str_replace('*', '%', mres($options['p']));

if (empty($hosts) && empty($ports)) {
<<<<<<< HEAD
    echo "-h <device hostname wildcard>    Device(s) to match\n";
    echo "-p <ifName widcard>              Port(s) to match using ifName\n";
    echo "\n";
=======
    echo "-h <device hostname wildcard>    Device(s) to match (all is a valid arg)\n";
    echo "-p <ifName widcard>              Port(s) to match using ifName (all is a valid arg)\n";
    echo "\n";
    exit;
}

if ($hosts == 'all') {
    $hosts = '';
}
if ($ports == 'all') {
    $ports = '';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}

foreach (dbFetchRows("SELECT `device_id`,`hostname` FROM `devices` WHERE `hostname` LIKE ?", array('%'.$hosts.'%')) as $device) {
    echo "Found hostname " . $device['hostname'].".......\n";
    foreach (dbFetchRows("SELECT `port_id`,`ifIndex`,`ifName`,`ifSpeed` FROM `ports` WHERE `ifName` LIKE ? AND `device_id` = ?", array('%'.$ports.'%',$device['device_id'])) as $port) {
        echo "Tuning port " . $port['ifName'].".......\n";
        $rrdfile = get_port_rrdfile_path($device['hostname'], $port['port_id']);
        rrdtool_tune('port', $rrdfile, $port['ifSpeed']);
    }
}

rrdtool_close();

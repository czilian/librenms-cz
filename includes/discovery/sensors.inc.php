<?php

$valid['sensor'] = array();

// Pre-cache data for later use
<<<<<<< HEAD
require 'includes/discovery/sensors/pre-cache.inc.php';

=======
$pre_cache = array();
$pre_cache_file = 'includes/discovery/sensors/pre-cache/' . $device['os'] . '.inc.php';
if (is_file($pre_cache_file)) {
    echo "Pre-cache {$device['os']}: ";
    include $pre_cache_file;
    echo PHP_EOL;
    d_echo($pre_cache);
}

// Run custom sensors 
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
require 'includes/discovery/sensors/cisco-entity-sensor.inc.php';
require 'includes/discovery/sensors/entity-sensor.inc.php';
require 'includes/discovery/sensors/ipmi.inc.php';

if ($device['os'] == 'netscaler') {
    include 'includes/discovery/sensors/netscaler.inc.php';
}

if ($device['os'] == 'openbsd') {
    include 'includes/discovery/sensors/openbsd.inc.php';
}

<<<<<<< HEAD
require 'includes/discovery/sensors/temperatures.inc.php';
require 'includes/discovery/sensors/humidity.inc.php';
require 'includes/discovery/sensors/voltages.inc.php';
require 'includes/discovery/sensors/frequencies.inc.php';
require 'includes/discovery/sensors/runtime.inc.php';
require 'includes/discovery/sensors/current.inc.php';
require 'includes/discovery/sensors/power.inc.php';
require 'includes/discovery/sensors/fanspeeds.inc.php';
require 'includes/discovery/sensors/charge.inc.php';
require 'includes/discovery/sensors/load.inc.php';
require 'includes/discovery/sensors/states.inc.php';
require 'includes/discovery/sensors/dbm.inc.php';
require 'includes/discovery/sensors/signal.inc.php';
=======
if (strstr($device['hardware'], 'Dell')) {
    include 'includes/discovery/sensors/fanspeed/dell.inc.php';
    include 'includes/discovery/sensors/power/dell.inc.php';
    include 'includes/discovery/sensors/voltage/dell.inc.php';
    include 'includes/discovery/sensors/state/dell.inc.php';
    include 'includes/discovery/sensors/temperature/dell.inc.php';
}

if (strstr($device['hardware'], 'ProLiant')) {
    include 'includes/discovery/sensors/state/hp.inc.php';
}

$run_sensors = array(
    'airflow',
    'current',
    'charge',
    'dbm',
    'fanspeed',
    'frequency',
    'humidity',
    'load',
    'power',
    'runtime',
    'signal',
    'state',
    'temperature',
    'voltage',
);
sensors($run_sensors, $device, $valid, $pre_cache);
unset(
    $pre_cache,
    $run_sensors,
    $entitysensor
);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

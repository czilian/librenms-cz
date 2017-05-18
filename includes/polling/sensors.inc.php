<?php
<<<<<<< HEAD

=======
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
/*
 * LibreNMS Network Management and Monitoring System
 * Copyright (C) 2006-2011, Observium Developers - http://www.observium.org
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * See COPYING for more details.
 */

<<<<<<< HEAD
// Call poll_sensor for each sensor type that we support.
$supported_sensors = array(
    'current'     => 'A',
    'frequency'   => 'Hz',
    'runtime'     => 'Min',
    'humidity'    => '%',
    'fanspeed'    => 'rpm',
    'power'       => 'W',
    'voltage'     => 'V',
    'temperature' => 'C',
    'dbm'         => 'dBm',
    'charge'      => '%',
    'load'        => '%',
    'state'       => '#',
    'signal'      => 'dBm',
);

foreach ($supported_sensors as $sensor_type => $sensor_unit) {
    poll_sensor($device, $sensor_type, $sensor_unit);
}
=======
$sensors = dbFetchRows("SELECT `sensor_class` FROM `sensors` WHERE `device_id` = ? GROUP BY `sensor_class`", array($device['device_id']));
foreach ($sensors as $sensor_type) {
    poll_sensor($device, $sensor_type['sensor_class']);
}

unset($sensors, $sensor_type);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

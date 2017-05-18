<?php

require_once 'includes/discovery/functions.inc.php';

<<<<<<< HEAD
require_once 'includes/discovery/functions.inc.php';

if ($agent_data['haddtemp'] != '|') {
    $disks = explode('||', trim($agent_data['hddtemp'], '|'));

    if (count($disks)) {
        echo 'hddtemp: ';
        foreach ($disks as $disk) {
            list($blockdevice,$descr,$temperature,$unit) = explode('|', $disk, 4);
            $diskcount++;
            discover_sensor($valid['sensor'], 'temperature', $device, '', $diskcount, 'hddtemp', "$blockdevice: $descr", '1', '1', null, null, null, null, $temperature, 'agent');

            $agent_sensors['temperature']['hddtemp'][$diskcount] = array(
                'description' => "$blockdevice: $descr",
                'current'     => $temperature,
                'index'       => $diskcount,
            );
        }

        echo "\n";
    }
=======
if (isset($agent_data['hddtemp']) && $agent_data['hddtemp'] != '|') {
    $disks = explode('||', trim($agent_data['hddtemp'], '|'));
    echo 'hddtemp: ';

    $diskcount = 0;
    foreach ($disks as $disk) {
        list($blockdevice,$descr,$temperature,$unit) = explode('|', $disk, 4);
        $diskcount++;
        $temperature = trim(str_replace('C', '', $temperature));
        discover_sensor($valid['sensor'], 'temperature', $device, '', $diskcount, 'hddtemp', "$blockdevice: $descr", '1', '1', null, null, null, null, $temperature, 'agent');
        dbUpdate(array('sensor_current' => $temperature), 'sensors', '`sensor_index` = ?, `sensor_class` = ?, `poller_type` = ?, `device_id` = ?', array($diskcount, 'temperature', 'agent', $device['device_id']));
        $tmp_agent_sensors = dbFetchRow("SELECT * FROM `sensors` WHERE `sensor_index` = ? AND `device_id` = ? AND `sensor_class` = 'temperature' AND `poller_type` = 'agent' AND `sensor_deleted` = 0 LIMIT 1", array($diskcount, $device['device_id']));
        $tmp_agent_sensors['new_value'] = $temperature;
        $agent_sensors[] = $tmp_agent_sensors;
        unset($tmp_agent_sensors);
    }

    echo "\n";
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}//end if

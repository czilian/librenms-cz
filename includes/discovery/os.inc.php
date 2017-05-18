<?php

<<<<<<< HEAD
$os   = getHostOS($device);
if ($os != $device['os']) {
    log_event('Device OS changed '.$device['os']." => $os", $device, 'system');
    $device['os'] = $os;
    $sql = dbUpdate(array('os' => $os), 'devices', 'device_id=?', array($device['device_id']));
    echo "Changed OS! : $os\n";
}

$icon = getImageName($device, false);
if ($icon != $device['icon']) {
    log_event('Device Icon changed '.$device['icon']." => $icon", $device, 'system');
    $device['icon'] = $icon;
    $sql = dbUpdate(array('icon' => $icon), 'devices', 'device_id=?', array($device['device_id']));
    echo "Changed Icon! : $icon\n";
}
=======
$os = getHostOS($device);
if ($os != $device['os']) {
    log_event('Device OS changed ' . $device['os'] . " => $os", $device, 'system', 3);
    $device['os'] = $os;
    $sql = dbUpdate(array('os' => $os), 'devices', 'device_id=?', array($device['device_id']));

    if (!isset($config['os'][$device['os']])) {
        load_os($device);
    }

    echo "Changed OS! : $os\n";
}

update_device_logo($device);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

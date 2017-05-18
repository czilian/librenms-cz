<?php

if (is_file($config['install_dir'].'/includes/polling/os/'.$device['os'].'.inc.php')) {
    // OS Specific
    include $config['install_dir'].'/includes/polling/os/'.$device['os'].'.inc.php';
} elseif ($device['os_group'] && is_file($config['install_dir'].'/includes/polling/os/'.$device['os_group'].'.inc.php')) {
    // OS Group Specific
    include $config['install_dir'].'/includes/polling/os/'.$device['os_group'].'.inc.php';
} else {
    echo "Generic :(\n";
<<<<<<< HEAD
}

if ($version && $device['version'] != $version) {
    $update_array['version'] = $version;
    log_event('OS Version -> '.$version, $device, 'system');
}

if ($features != $device['features']) {
    $update_array['features'] = $features;
    log_event('OS Features -> '.$features, $device, 'system');
}

if ($hardware && $hardware != $device['hardware']) {
    $update_array['hardware'] = $hardware;
    log_event('Hardware -> '.$hardware, $device, 'system');
}

if ($serial && $serial != $device['serial']) {
    $update_array['serial'] = $serial;
    log_event('Serial -> '.$serial, $device, 'system');
}

if ($icon && $icon != $device['icon']) {
    $update_array['icon'] = $icon;
    log_event('Icon -> '.$icon, $device, 'system');
}

=======
}

if ($device['version'] != $version) {
    $update_array['version'] = $version;
    log_event('OS Version -> ' . $version, $device, 'system', 3);
}

if ($features != $device['features']) {
    $update_array['features'] = $features;
    log_event('OS Features -> ' . $features, $device, 'system', 3);
}

if ($hardware != $device['hardware']) {
    $update_array['hardware'] = $hardware;
    log_event('Hardware -> ' . $hardware, $device, 'system', 3);
}

if ($serial != $device['serial']) {
    $update_array['serial'] = $serial;
    log_event('Serial -> ' . $serial, $device, 'system', 3);
}

update_device_logo($device);

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
echo 'Hardware: ' . $hardware . PHP_EOL;
echo 'Version: ' . $version . PHP_EOL;
echo 'Features: ' . $features . PHP_EOL;
echo 'Serial: ' . $serial . PHP_EOL;

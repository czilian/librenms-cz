<?php

if (is_numeric($vars['id']) && ($auth || port_permitted($vars['id']))) {
<<<<<<< HEAD
    $port   = get_port_by_id($vars['id']);
    $device = device_by_id_cache($port['device_id']);
    $title  = generate_device_link($device);
    $title .= ' :: Port  '.generate_port_link($port);
    if ($port['ifAlias'] != '') {
        $title .= ', '.display($port['ifAlias']);
    }

    $graph_title = shorthost($device['hostname']).'::'.strtolower(makeshortif($port['ifDescr']));

    $auth = true;

=======
    $port   = cleanPort(get_port_by_id($vars['id']));
    $device = device_by_id_cache($port['device_id']);
    $title  = generate_device_link($device);
    $title .= ' :: Port  '.generate_port_link($port);

    $graph_title = shorthost($device['hostname']).'::'.strtolower(makeshortif($port['ifDescr']));

    if (($port['ifAlias'] != '') && ($port['ifAlias'] != $port['ifDescr'])) {
        $title .= ', '.display($port['ifAlias']);
        $graph_title .= '::'.display($port['ifAlias']);
    }

    $auth = true;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $rrd_filename = get_port_rrdfile_path($device['hostname'], $port['port_id']);
}

<?php

<<<<<<< HEAD
if ($device['status'] == '0') {
    $class = 'alert-danger';
} else {
    $class = '';
}

if ($device['ignore'] == '1') {
    $class = 'div-ignore-alert';
    if ($device['status'] == '1') {
        $class = 'alert-warning';
    }
}

if ($device['disabled'] == '1') {
    $class = 'alert-info';
}
=======
echo getLogoTag($device, 'device-icon-header pull-left') .'
<div class="pull-left" style="margin-top: 5px;">';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

$host_id = get_vm_parent_id($device);
if ($host_id > 0) {
    echo '
<a href="'.generate_url(array('page'=>'device','device'=>$host_id)).'"><i class="fa fa-server fa-fw fa-lg"></i></a>';
}

<<<<<<< HEAD
$image = getImage($device);
$host_id = dbFetchCell("SELECT `device_id` FROM `vminfo` WHERE `vmwVmDisplayName` = ? OR `vmwVmDisplayName` = ?", array($device['hostname'],$device['hostname'].'.'.$config['mydomain']));

echo '
            <tr bgcolor="'.$device_colour.'" class="alert '.$class.'">
             <td><span class="device_icon">'.$image.'</span></td>
             <td>';
if ($host_id > 0) {
    echo '
             <a href="'.generate_url(array('page'=>'device','device'=>$host_id)).'"><i class="fa fa-server fa-fw fa-lg"></i></a>
         ';
}
             
echo '
             <span style="font-size: 20px;">'.generate_device_link($device).'</span>
             <br />'.generate_link($device['location'], array('page' => 'devices', 'location' => $device['location'])).'</td>
             <td>';
=======
echo '
<span style="font-size: 20px;">'.generate_device_link($device).'</span><br />
'.generate_link($device['location'], array('page' => 'devices', 'location' => $device['location'])) .'
</div>';
//<div class="col-xs-6 col-sm-8 col-md-8">';

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

if (isset($config['os'][$device['os']]['over'])) {
    $graphs = $config['os'][$device['os']]['over'];
} elseif (isset($device['os_group']) && isset($config['os'][$device['os_group']]['over'])) {
    $graphs = $config['os'][$device['os_group']]['over'];
} else {
    $graphs = $config['os']['default']['over'];
}

$graph_array                = array();
$graph_array['height']      = '100';
$graph_array['width']       = '310';
$graph_array['to']          = $config['time']['now'];
$graph_array['device']      = $device['device_id'];
$graph_array['type']        = 'device_bits';
$graph_array['from']        = $config['time']['day'];
$graph_array['legend']      = 'no';
$graph_array['popup_title'] = $descr;

$graph_array['height'] = '45';
$graph_array['width']  = '150';
$graph_array['bg']     = 'FFFFFF00';

<<<<<<< HEAD
foreach ($graphs as $entry) {
    if ($entry['graph']) {
        $graph_array['type'] = $entry['graph'];

        echo "<div style='float: right; text-align: center; padding: 1px 5px; margin: 0 1px; ' class='rounded-5px'>";
        print_graph_popup($graph_array);
        echo "<div style='font-weight: bold; font-size: 7pt; margin: -3px;'>".$entry['text'].'</div>';
        echo '</div>';
    }
=======
if (device_permitted($device['device_id']) || $config['allow_unauth_graphs']) {
    echo '<div class="pull-right">';
    foreach ($graphs as $entry) {
        if ($entry['graph']) {
            $graph_array['type'] = $entry['graph'];

            echo "<div style='float: right; text-align: center; padding: 1px 5px; margin: 0 1px; ' class='rounded-5px'>";
            print_graph_popup($graph_array);
            echo "<div style='font-weight: bold; font-size: 7pt; margin: -3px;'>" . $entry['text'] . '</div>';
            echo '</div>';
        }
    }
    echo '</div>';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}
echo '<br style="clear: both;" />';

unset($graph_array);
<<<<<<< HEAD

echo '</td>
   </tr>';
=======
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

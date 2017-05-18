<?php

require 'includes/graphs/common.inc.php';

$scale_min    = 0;
$colours      = 'mixed';
$nototal      = (($width < 550) ? 1 : 0);
$unit_text    = 'Messages/sec';
$rrd_filename = rrd_name($device['hostname'], array('app', 'mailscannerV2', $app['app_id']));
$array        = array(
                 'msg_rejected' => array('descr' => 'Rejected'),
                 'msg_relay'    => array('descr' => 'Relayed'),
                 'msg_waiting'  => array('descr' => 'Waiting'),
                );

$i = 0;
$x = 0;

if (rrdtool_check_rrd_exists($rrd_filename)) {
    $max_colours = count($config['graph_colours'][$colours]);
<<<<<<< HEAD
    foreach ($array as $ds => $vars) {
        $x = (($x <= $max_colours) ? $x : 0);
        $rrd_list[$i]['filename'] = $rrd_filename;
        $rrd_list[$i]['descr']    = $vars['descr'];
=======
    foreach ($array as $ds => $var) {
        $x = (($x <= $max_colours) ? $x : 0);
        $rrd_list[$i]['filename'] = $rrd_filename;
        $rrd_list[$i]['descr']    = $var['descr'];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $rrd_list[$i]['ds']       = $ds;
        $rrd_list[$i]['colour']   = $config['graph_colours'][$colours][$x];
        $i++;
        $x++;
    }
}

require 'includes/graphs/generic_multi_line.inc.php';

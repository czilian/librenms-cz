<?php

require 'includes/graphs/common.inc.php';

$scale_min    = 0;
$colours      = 'mixed';
$nototal      = (($width < 224) ? 1 : 0);
$unit_text    = 'Buffer';
$rrd_filename = rrd_name($device['hostname'], array('app', 'ntp-server', $app['app_id']));
$array        = array(
                 'buffer_recv' => array('descr' => 'Received'),
                 'buffer_used' => array('descr' => 'Used'),
                 'buffer_free' => array('descr' => 'Free'),
                );

$i = 0;

if (rrdtool_check_rrd_exists($rrd_filename)) {
<<<<<<< HEAD
    foreach ($array as $ds => $vars) {
        $rrd_list[$i]['filename']   = $rrd_filename;
        $rrd_list[$i]['descr']  = $vars['descr'];
=======
    foreach ($array as $ds => $var) {
        $rrd_list[$i]['filename']   = $rrd_filename;
        $rrd_list[$i]['descr']  = $var['descr'];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $rrd_list[$i]['ds']     = $ds;
        $rrd_list[$i]['colour'] = $config['graph_colours'][$colours][$i];
        $i++;
    }
} else {
    echo "file missing: $file";
}

require 'includes/graphs/generic_multi_line.inc.php';

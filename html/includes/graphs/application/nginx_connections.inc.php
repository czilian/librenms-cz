<?php

$scale_min = 0;

require 'includes/graphs/common.inc.php';

$rrd_filename = rrd_name($device['hostname'], array('app', 'nginx', $app['app_id']));

$array = array(
          'Reading' => array(
                        'descr'  => 'Reading',
                        'colour' => '750F7DFF',
                       ),
          'Writing' => array(
                        'descr'  => 'Writing',
                        'colour' => '00FF00FF',
                       ),
          'Waiting' => array(
                        'descr'  => 'Waiting',
                        'colour' => '4444FFFF',
                       ),
          'Active'  => array(
                        'descr'  => 'Starting',
                        'colour' => '157419FF',
                       ),
         );

$i = 0;
if (rrdtool_check_rrd_exists($rrd_filename)) {
<<<<<<< HEAD
    foreach ($array as $ds => $vars) {
        $rrd_list[$i]['filename'] = $rrd_filename;
        $rrd_list[$i]['descr']    = $vars['descr'];
        $rrd_list[$i]['ds']       = $ds;
        $rrd_list[$i]['colour']   = $vars['colour'];
=======
    foreach ($array as $ds => $var) {
        $rrd_list[$i]['filename'] = $rrd_filename;
        $rrd_list[$i]['descr']    = $var['descr'];
        $rrd_list[$i]['ds']       = $ds;
        $rrd_list[$i]['colour']   = $var['colour'];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $i++;
    }
} else {
    echo "file missing: $file";
}

$colours   = 'mixed';
$nototal   = 1;
$unit_text = 'Workers';

require 'includes/graphs/generic_multi_simplex_seperated.inc.php';

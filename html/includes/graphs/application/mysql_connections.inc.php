<?php

require 'includes/graphs/common.inc.php';

$rrd_filename = rrd_name($device['hostname'], array('app', 'mysql', $app['app_id']));

$array = array(
          'MaCs' => array(
                     'descr'  => 'Max Connections',
                     'colour' => '22FF22',
                    ),
          'MUCs' => array(
                     'descr'  => 'Max Used Connections',
                     'colour' => '0022FF',
                    ),
          'ACs'  => array(
                     'descr'  => 'Aborted Clients',
                     'colour' => 'FF0000',
                    ),
          'AdCs' => array(
                     'descr'  => 'Aborted Connects',
                     'colour' => '0080C0',
                    ),
          'TCd'  => array(
                     'descr'  => 'Threads Connected',
                     'colour' => 'FF0000',
                    ),
          'Cs'   => array(
                     'descr'  => 'New Connections',
                     'colour' => '0080C0',
                    ),
         );

$i = 0;
if (rrdtool_check_rrd_exists($rrd_filename)) {
<<<<<<< HEAD
    foreach ($array as $ds => $vars) {
        $rrd_list[$i]['filename'] = $rrd_filename;
        $rrd_list[$i]['descr']    = $vars['descr'];
        $rrd_list[$i]['ds']       = $ds;
        // $rrd_list[$i]['colour'] = $vars['colour'];
=======
    foreach ($array as $ds => $var) {
        $rrd_list[$i]['filename'] = $rrd_filename;
        $rrd_list[$i]['descr']    = $var['descr'];
        $rrd_list[$i]['ds']       = $ds;
        // $rrd_list[$i]['colour'] = $var['colour'];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $i++;
    }
} else {
    echo "file missing: $file";
}

$colours   = 'mixed';
$nototal   = 1;
$unit_text = 'Connections';

require 'includes/graphs/generic_multi_line.inc.php';

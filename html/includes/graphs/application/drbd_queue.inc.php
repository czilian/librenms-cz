<?php

require 'includes/graphs/common.inc.php';

$rrd_filename = rrd_name($device['hostname'], array('app', 'drbd', $app['app_instance']));

$array = array(
          'lo' => 'Local I/O',
          'pe' => 'Pending',
          'ua' => 'UnAcked',
          'ap' => 'App Pending',
         );

$i = 0;
if (rrdtool_check_rrd_exists($rrd_filename)) {
<<<<<<< HEAD
    foreach ($array as $ds => $vars) {
        $rrd_list[$i]['filename'] = $rrd_filename;
        if (is_array($vars)) {
            $rrd_list[$i]['descr'] = $vars['descr'];
        } else {
            $rrd_list[$i]['descr'] = $vars;
=======
    foreach ($array as $ds => $var) {
        $rrd_list[$i]['filename'] = $rrd_filename;
        if (is_array($var)) {
            $rrd_list[$i]['descr'] = $var['descr'];
        } else {
            $rrd_list[$i]['descr'] = $var;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        }

        $rrd_list[$i]['ds'] = $ds;
        $i++;
    }
} else {
    echo "file missing: $file";
}

$colours   = 'mixed';
$nototal   = 0;
$unit_text = '';

require 'includes/graphs/generic_multi_simplex_seperated.inc.php';

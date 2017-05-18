<?php

require 'includes/graphs/common.inc.php';

$scale_min    = 0;
$colours      = 'mixed';
$nototal      = (($width < 224) ? 1 : 0);
$unit_text    = 'Packets/sec';
$rrd_filename = rrd_name($device['hostname'], array('app', 'powerdns', $app['app_id']));
$array        = array(
                 'q_tcpAnswers' => array(
                                    'descr'  => 'TCP Answers',
                                    'colour' => '008800FF',
                                   ),
                 'q_tcpQueries' => array(
                                    'descr'  => 'TCP Queries',
                                    'colour' => '00FF00FF',
                                   ),
                 'q_udpAnswers' => array(
                                    'descr'  => 'UDP Answers',
                                    'colour' => '336699FF',
                                   ),
                 'q_udpQueries' => array(
                                    'descr'  => 'UDP Queries',
                                    'colour' => '6699CCFF',
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

require 'includes/graphs/generic_multi_simplex_seperated.inc.php';

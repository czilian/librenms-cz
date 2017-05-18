<?php

require 'includes/graphs/common.inc.php';

$scale_min    = 0;
$nototal      = (($width < 550) ? 1 : 0);
$unit_text    = 'Messages/sec';
$rrd_filename = rrd_name($device['hostname'], array('app', 'mailscannerV2', $app['app_id']));
$array        = array(
                 'spam'  => array(
                             'descr'  => 'Spam',
                             'colour' => 'FF8800',
                            ),
                 'virus' => array(
                             'descr'  => 'Virus',
                             'colour' => 'FF0000',
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
}

require 'includes/graphs/generic_multi_simplex_seperated.inc.php';

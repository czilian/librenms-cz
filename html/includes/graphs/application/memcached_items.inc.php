<?php

require 'memcached.inc.php';
require 'includes/graphs/common.inc.php';

$scale_min = 0;
$colours   = 'mixed';
$nototal   = 0;
$unit_text = 'Items';
$array     = array(
    'curr_items' => array(
        'descr'  => 'Items',
        'colour' => '555555',
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
        if (!empty($vars['areacolour'])) {
            $rrd_list[$i]['areacolour'] = $vars['areacolour'];
=======
    foreach ($array as $ds => $var) {
        $rrd_list[$i]['filename'] = $rrd_filename;
        $rrd_list[$i]['descr']    = $var['descr'];
        $rrd_list[$i]['ds']       = $ds;
        $rrd_list[$i]['colour']   = $var['colour'];
        if (!empty($var['areacolour'])) {
            $rrd_list[$i]['areacolour'] = $var['areacolour'];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        }

        $i++;
    }
} else {
    echo "file missing: $file";
}

require 'includes/graphs/generic_multi_line.inc.php';

<?php

require 'includes/graphs/common.inc.php';

$rrd_filename = rrd_name($device['hostname'], array('app', 'mysql', $app['app_id']));

$array = array(
    'CDe'  => array(
        'descr'  => 'Delete',
        'colour' => '22FF22',
    ),
    'CIt'  => array(
        'descr'  => 'Insert',
        'colour' => '0022FF',
    ),
    'CISt' => array(
        'descr'  => 'Insert Select',
        'colour' => 'FF0000',
    ),
    'CLd'  => array(
        'descr'  => 'Load Data',
        'colour' => '00AAAA',
    ),
    'CRe'  => array(
        'descr'  => 'Replace',
        'colour' => 'FF00FF',
    ),
    'CRSt' => array(
        'descr'  => 'Replace Select',
        'colour' => 'FFA500',
    ),
    'CSt'  => array(
        'descr'  => 'Select',
        'colour' => 'CC0000',
    ),
    'CUe'  => array(
        'descr'  => 'Update',
        'colour' => '0000CC',
    ),
    'CUMi' => array(
        'descr'  => 'Update Multiple',
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
$unit_text = 'Commands';

require 'includes/graphs/generic_multi_simplex_seperated.inc.php';

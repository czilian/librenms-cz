<?php
require 'includes/graphs/common.inc.php';
$scale_min     = 0;
$colours       = 'mixed';
$unit_text     = 'Cached seconds';
$unitlen       = 15;
$bigdescrlen   = 15;
$smalldescrlen = 15;
$dostack       = 0;
$printtotal    = 0;
$addarea       = 1;
$transparency  = 33;
$rrd_filename  = $config['rrd_dir'].'/'.$device['hostname'].'/app-nfs-stats-'.$app['app_id'].'.rrd';
$array = array(
    'ra_size' => array('descr' => 'size','colour' => '091B40',),
    'ra_range01' => array('descr' => '0-10','colour' => '8293B3',),
    'ra_range02' => array('descr' => '10-20','colour' => '566B95',),
    'ra_range03' => array('descr' => '20-30','colour' => '1B315D',),
    'ra_range04' => array('descr' => '30-40','colour' => '091B40',),
    'ra_range05' => array('descr' => '40-50','colour' => '296F6A',),
    'ra_range06' => array('descr' => '50-60','colour' => '498984',),
    'ra_range07' => array('descr' => '60-70','colour' => '125651',),
    'ra_range08' => array('descr' => '70-80','colour' => '023B37',),
    'ra_range09' => array('descr' => '80-90','colour' => '14623A',),
    'ra_range10' => array('descr' => '90-100','colour' => '034423',),
    'ra_notfound' => array('descr' => 'not found','colour' => '590315',),
);

$i = 0;

if (is_file($rrd_filename)) {
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
    echo "file missing: $rrd_filename";
}

require 'includes/graphs/generic_v3_multiline.inc.php';

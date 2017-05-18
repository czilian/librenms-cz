<?php

require 'includes/graphs/common.inc.php';

$scale_min = 0;
$ds        = 'uptime';
<<<<<<< HEAD
$colour_area     = 'EEEEEE';
$colour_line     = '36393D';
=======
$colour_area     = $config['graph_colours']['purples'][0].'33';
$colour_line     = $config['graph_colours']['purples'][0];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$colour_area_max = 'FFEE99';
$graph_max       = 0;
$unit_text       = 'Seconds';
$ntpdserver_rrd  = rrd_name($device['hostname'], array('app', 'ntp-server', $app['app_id']));

if (rrdtool_check_rrd_exists($ntpdserver_rrd)) {
    $rrd_filename = $ntpdserver_rrd;
}

require 'includes/graphs/generic_simplex.inc.php';

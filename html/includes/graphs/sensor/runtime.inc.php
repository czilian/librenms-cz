<?php
$scale_min = '0';
require 'includes/graphs/common.inc.php';
<<<<<<< HEAD
$rrd_options .= " COMMENT:'                                 Last   Max\\n'";
$sensor['sensor_descr_fixed'] = substr(str_pad($sensor['sensor_descr'], 28), 0, 28);
=======
$rrd_options .= " COMMENT:'                                       Last     Max\\n'";
$sensor['sensor_descr_fixed'] = rrdtool_escape($sensor['sensor_descr'], 32);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$rrd_options .= " DEF:sensor=$rrd_filename:sensor:AVERAGE";
$rrd_options .= " LINE1.5:sensor#cc0000:'".$sensor['sensor_descr_fixed']."'";
$rrd_options .= ' GPRINT:sensor:LAST:%3.0lfMin';
$rrd_options .= ' GPRINT:sensor:MAX:%3.0lfMin\l';
if (is_numeric($sensor['sensor_limit'])) {
    $rrd_options .= ' HRULE:'.$sensor['sensor_limit'].'#999999::dashes';
}
if (is_numeric($sensor['sensor_limit_low'])) {
    $rrd_options .= ' HRULE:'.$sensor['sensor_limit_low'].'#999999::dashes';
}

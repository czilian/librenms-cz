<?php
require 'includes/graphs/common.inc.php';
$rrdfilename = rrd_name($device['hostname'], 'ceragon-radio');
if (rrdtool_check_rrd_exists($rrdfilename)) {
    $rrd_options .= ' COMMENT:"  Now        Min         Max\r" ';
    $features = explode(' ', $device[features]);
    $num_radios = $features[0];
    $color = array("CC0000", "00CC00", "0000CC", "CCCCCC");
    for ($i=1; $i <= $num_radios; $i++) {
        $rrd_options .= ' DEF:radio'.$i.'XPI='.$rrdfilename.':radio'.$i.'XPI:AVERAGE ';
        $rrd_options .= ' CDEF:divided'.$i.'XPI=radio'.$i.'XPI,100,/ ';
        $rrd_options .= ' LINE1:divided'.$i.'XPI#'.$color[$i-1].':"Radio '.$i.' XPI\l" ';
        $rrd_options .= ' COMMENT:\u ';
        $rrd_options .= ' GPRINT:divided'.$i.'XPI:LAST:"%0.2lf dB" ';
        $rrd_options .= ' GPRINT:divided'.$i.'XPI:MIN:"%0.2lf dB" ';
        $rrd_options .= ' GPRINT:divided'.$i.'XPI:MAX:"%0.2lf dB\r" ';
    }
}

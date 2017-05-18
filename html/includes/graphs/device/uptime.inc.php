<?php

$scale_min = '0';

require 'includes/graphs/common.inc.php';

$rrd_filename = rrd_name($device['hostname'], 'uptime');

$rrd_options .= ' DEF:uptime='.$rrd_filename.':uptime:AVERAGE';
$rrd_options .= ' CDEF:cuptime=uptime,86400,/';
$rrd_options .= " 'COMMENT:Days      Current  Minimum  Maximum  Average\\n'";
<<<<<<< HEAD
$rrd_options .= ' AREA:cuptime#EEEEEE:Uptime';
=======
$rrd_options .= ' AREA:cuptime#00FF0022:Uptime';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$rrd_options .= ' LINE1.25:cuptime#36393D:';
$rrd_options .= ' GPRINT:cuptime:LAST:%6.2lf  GPRINT:cuptime:AVERAGE:%6.2lf';
$rrd_options .= " GPRINT:cuptime:MAX:%6.2lf  'GPRINT:cuptime:AVERAGE:%6.2lf\\n'";

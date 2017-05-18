<?php

require 'includes/graphs/common.inc.php';

$rrd_filename = rrd_name($device['hostname'], 'ucd_cpu');
$rrd_options .= " DEF:user=$rrd_filename:user:AVERAGE";
$rrd_options .= " DEF:nice=$rrd_filename:nice:AVERAGE";
$rrd_options .= " DEF:system=$rrd_filename:system:AVERAGE";
$rrd_options .= " DEF:idle=$rrd_filename:idle:AVERAGE";
$rrd_options .= ' CDEF:total=user,nice,system,idle,+,+,+';
$rrd_options .= ' CDEF:user_perc=user,total,/,100,*';
$rrd_options .= ' CDEF:nice_perc=nice,total,/,100,*';
$rrd_options .= ' CDEF:system_perc=system,total,/,100,*';
$rrd_options .= ' CDEF:idle_perc=idle,total,/,100,*';
$rrd_options .= " COMMENT:'Usage       Current     Average    Maximum\\n'";
$rrd_options .= ' AREA:user_perc#c02020:user';
$rrd_options .= " GPRINT:user_perc:LAST:'     %5.2lf%%'";
$rrd_options .= " GPRINT:user_perc:AVERAGE:'   %5.2lf%%'";
$rrd_options .= " GPRINT:user_perc:MAX:'   %5.2lf%%\\n'";
$rrd_options .= ' AREA:nice_perc#008f00:nice:STACK';
$rrd_options .= " GPRINT:nice_perc:LAST:'     %5.2lf%%'";
$rrd_options .= " GPRINT:nice_perc:AVERAGE:'   %5.2lf%%'";
$rrd_options .= " GPRINT:nice_perc:MAX:'   %5.2lf%%\\n'";
$rrd_options .= ' AREA:system_perc#ea8f00:system:STACK';
$rrd_options .= " GPRINT:system_perc:LAST:'   %5.2lf%%'";
$rrd_options .= " GPRINT:system_perc:AVERAGE:'   %5.2lf%%'";
$rrd_options .= " GPRINT:system_perc:MAX:'   %5.2lf%%\\n'";
<<<<<<< HEAD
$rrd_options .= ' AREA:idle_perc#f8f8f3:idle:STACK';
=======
$rrd_options .= ' AREA:idle_perc#00007776:idle:STACK';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$rrd_options .= " GPRINT:idle_perc:LAST:'     %5.2lf%%'";
$rrd_options .= " GPRINT:idle_perc:AVERAGE:'   %5.2lf%%'";
$rrd_options .= " GPRINT:idle_perc:MAX:'   %5.2lf%%\\n'";

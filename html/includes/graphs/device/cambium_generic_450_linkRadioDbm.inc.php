<?php
/*
 * LibreNMS
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

require 'includes/graphs/common.inc.php';
$rrdfilename = $config['rrd_dir'].'/'.$device['hostname'].'/cambium-generic-450-linkRadioDbm.rrd';
if (file_exists($rrdfilename)) {
    $rrd_options .= " COMMENT:'dBm                Now       Ave      Max     \\n'";
    $rrd_options .= ' DEF:vertical='.$rrdfilename.':vertical:AVERAGE ';
    $rrd_options .= ' DEF:horizontal='.$rrdfilename.':horizontal:AVERAGE ';
    $rrd_options .= " LINE2:vertical#FF0000:'Vertical       ' ";
    $rrd_options .= ' GPRINT:vertical:LAST:%0.2lf%s ';
    $rrd_options .= ' GPRINT:vertical:MIN:%0.2lf%s ';
    $rrd_options .= ' GPRINT:vertical:MAX:%0.2lf%s\\\l ';
    $rrd_options .= " LINE2:horizontal#003EFF:'Horizontal      ' ";
    $rrd_options .= ' GPRINT:horizontal:LAST:%0.2lf%s ';
    $rrd_options .= ' GPRINT:horizontal:MIN:%0.2lf%s ';
    $rrd_options .= ' GPRINT:horizontal:MAX:%0.2lf%s\\\l ';
}

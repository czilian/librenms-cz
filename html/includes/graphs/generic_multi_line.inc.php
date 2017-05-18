<?php

/*
 * Outputs a graph with multiple overlaid lines
 *
 * Variables:
 *   $rrd_list    array   required - array of data sets to graph.  Each item is an array that contains the following
 *          ds        string  required - data set name as defined in rrd
 *          filename  string  required - path to the rrd file as generated by rrd_name()
 *          descr     string  required - the label for this data set
 *          colour    string  optional - Defines the colour for this data set (overrides the overall colour set)
 *          area      boolean optional - Colors in the area of the data set with 20% opacity (unless areacolor is set)
 *          areacolor string  optional - Sets the area color manually
 *          invert    boolean optional - multiplies values in this data set by -1
 *   $colours     string  required - colour set as defined in $config['graph_colours']
 *   $print_total boolean optional - Sum all the values and output the last, min, max, and avg in the legend
 *   $simplerrd   boolean optional - All data sets reside in the same rrd file
 */

require 'includes/graphs/common.inc.php';

<<<<<<< HEAD
if ($width > '500') {
    $descr_len = 24;
} else {
    $descr_len  = 12;
    $descr_len += round(($width - 250) / 8);
}
=======
$descr_len = 12;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

if ($nototal) {
    $descr_len += '2';
    $unitlen  += '2';
}

<<<<<<< HEAD
if ($width > '500') {
    $rrd_options .= " COMMENT:'".substr(str_pad($unit_text, ($descr_len + 5)), 0, ($descr_len + 5))."Now      Min      Max     Avg\l'";
    if (!$nototal) {
        $rrd_options .= " COMMENT:'Total      '";
    }

    $rrd_options .= " COMMENT:'\l'";
} else {
    $rrd_options .= " COMMENT:'".substr(str_pad($unit_text, ($descr_len + 5)), 0, ($descr_len + 5))."Now      Min      Max     Avg\l'";
}

=======
$rrd_options .= " COMMENT:'".rrdtool_escape($unit_text, $descr_len)."      Now      Min      Max     Avg\l'";

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$i    = 0;
$iter = 0;

foreach ($rrd_list as $rrd) {
    // get the color for this data set
    if (isset($rrd['colour'])) {
        $colour = $rrd['colour'];
    } else {
        if (!$config['graph_colours'][$colours][$iter]) {
            $iter = 0;
        }
        $colour = $config['graph_colours'][$colours][$iter];
        $iter++;
    }

    if (!empty($rrd['area']) && empty($rrd['areacolour'])) {
        $rrd['areacolour'] = $colour."20";
    }

    $ds       = $rrd['ds'];
    $filename = $rrd['filename'];

    $descr = rrdtool_escape($rrd['descr'], $descr_len);

    $id = 'ds'.$i;

    $rrd_options .= ' DEF:'.$id."=$filename:$ds:AVERAGE";

    if ($simple_rrd) {
        $rrd_options .= ' CDEF:'.$id.'min='.$id.' ';
        $rrd_options .= ' CDEF:'.$id.'max='.$id.' ';
    } else {
        $rrd_options .= ' DEF:'.$id."min=$filename:$ds:MIN";
        $rrd_options .= ' DEF:'.$id."max=$filename:$ds:MAX";
    }

    if ($rrd['invert']) {
        $rrd_options  .= ' CDEF:'.$id.'i='.$id.',-1,*';
        $rrd_optionsb .= ' LINE1.25:'.$id.'i#'.$colour.":'$descr'";
        if (!empty($rrd['areacolour'])) {
            $rrd_optionsb .= ' AREA:'.$id.'i#'.$rrd['areacolour'];
        }
    } else {
        $rrd_optionsb .= ' LINE1.25:'.$id.'#'.$colour.":'$descr'";
        if (!empty($rrd['areacolour'])) {
            $rrd_optionsb .= ' AREA:'.$id.'#'.$rrd['areacolour'];
        }
    }

    $rrd_optionsb .= ' GPRINT:'.$id.':LAST:%5.2lf%s'.$units.' GPRINT:'.$id.'min:MIN:%5.2lf%s'.$units;
    $rrd_optionsb .= ' GPRINT:'.$id.'max:MAX:%5.2lf%s'.$units.' GPRINT:'.$id.":AVERAGE:'%5.2lf%s$units\\n'";

    $i++;
}//end foreach

$rrd_options .= $rrd_optionsb;
$rrd_options .= ' HRULE:0#555555';

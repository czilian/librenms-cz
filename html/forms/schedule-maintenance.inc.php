<?php

/*
 * LibreNMS
 *
 * Copyright (c) 2014 Neil Lathwood <https://github.com/laf/ http://www.lathwood.co.uk/fa>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

if(is_admin() === false) {
    die('ERROR: You need to be admin');
}

$sub_type = $_POST['sub_type'];

if ($sub_type == 'new-maintenance') {

    // Defaults
    $status = 'error';

    $title = mres($_POST['title']);
    $notes = mres($_POST['notes']);
    $start = mres($_POST['start']);
    $end   = mres($_POST['end']);
    $maps  = mres($_POST['maps']);

    if (empty($title)) {
        $message = "Missing title<br />";
    }
    if (empty($start)) {
        $message .= "Missing start date<br />";
    }
    if (empty($end)) {
        $message .= "Missing end date<br />";
    }
    if( !is_array($_POST['maps']) ) {
        $message .= "Not mapped to any groups or devices<br />";
    }

    if (empty($message)) {
        $schedule_id = dbInsert(array('start'=>$start,'end'=>$end,'title'=>$title,'notes'=>$notes),'alert_schedule');
        if ($schedule_id > 0) {
            $items = array();
            $fail = 0;
            foreach( $_POST['maps'] as $target ) {
                $item = dbInsert(array('schedule_id'=>$schedule_id,'target'=>$target),'alert_schedule_items');
                if ($item > 0) {
                     array_push($items,$item);
                } else {
                    $fail = 1;
                }
            }
            if ($fail == 1) {
                foreach ($items as $item) {
                    dbDelete('alert_schedule_items', '`item_id`=?', array($item));
                }
                dbDelete('alert_schedule', '`schedule_id`=?', array($schedule_id));
                $message = 'Creating maintenance schedule failed'.$yeah;
            } else {
                $status = 'ok';
                $message = 'Created maintenance schedule';
            }
        } else {
            $message = "Issue creating maintenance schedule";
        }
    }

    $response = array('status'=>$status,'message'=>$message);

} elseif ($sub_type == 'parse-maintenance') {

    $schedule_id = $_POST['schedule_id'];
    $schedule = dbFetchRow("SELECT * FROM `alert_schedule` WHERE `schedule_id`=?",array($schedule_id));
    $items = array();
    foreach (dbFetchRows("SELECT `target` FROM `alert_schedule_items` WHERE `schedule_id`=?",array($schedule_id)) as $targets) {
        $items[] = $targets;
    }
    $response = array('start'=>$schedule['start'],'end'=>$schedule['end'],'title'=>$schedule['title'],'notes'=>$schedule['notes'],'targets'=>$items);
}

echo _json_encode($response);

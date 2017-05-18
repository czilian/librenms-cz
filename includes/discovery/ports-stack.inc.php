<?php

$sql = "SELECT * FROM `ports_stack` WHERE `device_id` = '".$device['device_id']."'";

foreach (dbFetchRows($sql) as $entry) {
    $stack_db_array[$entry['port_id_high']][$entry['port_id_low']]['ifStackStatus'] = $entry['ifStackStatus'];
}
<<<<<<< HEAD
=======
unset(
    $sql,
    $entry
);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

$stack_poll_array = snmpwalk_cache_twopart_oid($device, 'ifStackStatus', array());

foreach ($stack_poll_array as $port_id_high => $entry_high) {
    foreach ($entry_high as $port_id_low => $entry_low) {
        $ifStackStatus = $entry_low['ifStackStatus'];
        if (isset($stack_db_array[$port_id_high][$port_id_low])) {
            if ($stack_db_array[$port_id_high][$port_id_low]['ifStackStatus'] == $ifStackStatus) {
                echo '.';
            } else {
                dbUpdate(array('ifStackStatus' => $ifStackStatus), 'ports_stack', 'device_id=? AND port_id_high=? AND `port_id_low`=?', array($device['device_id'], $port_id_high, $port_id_low));
                echo 'U';
            }

            unset($stack_db_array[$port_id_high][$port_id_low]);
        } else {
            dbInsert(array('device_id' => $device['device_id'], 'port_id_high' => $port_id_high, 'port_id_low' => $port_id_low, 'ifStackStatus' => $ifStackStatus), 'ports_stack');
            echo '+';
        }
    }//end foreach
<<<<<<< HEAD
}//end foreach
=======
    unset(
        $port_id_low,
        $entry_low
    );
}//end foreach
unset($stack_poll_array);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

foreach ($stack_db_array as $port_id_high => $array) {
    foreach ($array as $port_id_low => $blah) {
        echo $device['device_id'].' '.$port_id_low.' '.$port_id_high."\n";
        dbDelete('ports_stack', '`device_id` =  ? AND port_id_high = ? AND port_id_low = ?', array($device['device_id'], $port_id_high, $port_id_low));
        echo '-';
    }
}

echo "\n";
<<<<<<< HEAD
=======
unset(
    $stack_db_array,
    $array,
    $port_id_high,
    $entry_high
);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

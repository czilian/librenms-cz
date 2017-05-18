<?php

$diskio_array = snmpwalk_cache_oid($device, 'diskIOEntry', array(), 'UCD-DISKIO-MIB');
$valid_diskio = array();
if (is_array($diskio_array)) {
    foreach ($diskio_array as $index => $entry) {
        if ($entry['diskIONRead'] > '0' || $entry['diskIONWritten'] > '0') {
            d_echo("$index ".$entry['diskIODevice']."\n");

<<<<<<< HEAD
            if (dbFetchCell('SELECT COUNT(*) FROM `ucd_diskio` WHERE `device_id` = ? AND `diskio_index` = ?', array($device['device_id'], $index)) == '0') {
=======
            if (dbFetchCell('SELECT COUNT(*) FROM `ucd_diskio` WHERE `device_id` = ? AND `diskio_index` = ? and `diskio_descr` = ?', array($device['device_id'], $index, $entry['diskIODevice'])) == '0') {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
                $inserted = dbInsert(array('device_id' => $device['device_id'], 'diskio_index' => $index, 'diskio_descr' => $entry['diskIODevice']), 'ucd_diskio');
                echo '+';
                d_echo($sql." - $inserted inserted ");
            } else {
                  echo '.';
                  // FIXME Need update code here!
            }

<<<<<<< HEAD
                $valid_diskio[$index] = 1;
=======
                $valid_diskio[$index] = $entry['diskIODevice'];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        } //end if
    } //end foreach
} //end if

// Remove diskio entries which weren't redetected here
$sql = "SELECT * FROM `ucd_diskio` where `device_id`  = '".$device['device_id']."'";

d_echo($valid_diskio);

foreach (dbFetchRows($sql) as $test) {
    d_echo($test['diskio_index'].' -> '.$test['diskio_descr']."\n");

<<<<<<< HEAD
    if (!$valid_diskio[$test['diskio_index']]) {
=======
    if ($valid_diskio[$test['diskio_index']] !== $test['diskio_descr']) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        echo '-';
        dbDelete('ucd_diskio', '`diskio_id` = ?', array($test['diskio_id']));
    }
}

unset($valid_diskio);
echo "\n";

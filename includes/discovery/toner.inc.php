<?php

$valid_toner = array();

if ($device['os_group'] == 'printer') {
    echo 'Toner: ';
    $oids = snmpwalk_cache_oid($device, 'prtMarkerColorantMarkerIndex', array(), 'Printer-MIB');
    if (empty($oids)) {
        $oids = snmpwalk_cache_oid($device, 'prtMarkerSuppliesMarkerIndex', $oids, 'Printer-MIB');
    }

    if (!empty($oids)) {
        $oids = snmpwalk_cache_oid($device, 'prtMarkerSuppliesLevel', $oids, 'Printer-MIB');
        $oids = snmpwalk_cache_oid($device, 'prtMarkerSuppliesMaxCapacity', $oids, 'Printer-MIB');
        $oids = snmpwalk_cache_oid($device, 'prtMarkerSuppliesDescription', $oids, 'Printer-MIB', null, '-OQUsa');
<<<<<<< HEAD
=======
        $oids = snmpwalk_cache_oid($device, 'prtMarkerColorantValue', $oids, 'Printer-MIB', null, '-OQUsa');
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    }

    foreach ($oids as $index => $data) {
        $last_index = substr($index, strrpos($index, '.') + 1);
<<<<<<< HEAD
        if ($os == 'ricoh' || $os == 'nrg' || $os == 'lanier') {
            $toner_oid = ".1.3.6.1.4.1.367.3.2.1.2.24.1.1.5.$last_index";
            $descr_oid = ".1.3.6.1.4.1.367.3.2.1.2.24.1.1.3.$last_index";
            $capacity_oid = '';

            $descr = snmp_get($device, $descr_oid, '-Oqva');
            $raw_toner = snmp_get($device, $toner_oid, '-Oqv');
        } else {
            $toner_oid = ".1.3.6.1.2.1.43.11.1.1.9.$index";
            $capacity_oid = ".1.3.6.1.2.1.43.11.1.1.8.$index";

            $descr = $data['prtMarkerSuppliesDescription'];
            $raw_toner = $data['prtMarkerSuppliesLevel'];
        }

        $type = 'jetdirect';
        $capacity = get_toner_capacity($data['prtMarkerSuppliesMaxCapacity']);
        $current = get_toner_levels($device, $raw_toner, $capacity);

        discover_toner(
            $valid_toner,
            $device,
            $toner_oid,
            $last_index,
            $type,
            $descr,
            $capacity_oid,
            $capacity,
            $current
        );
=======
        
        $raw_toner     = $data['prtMarkerSuppliesLevel'];
        $descr         = $data['prtMarkerSuppliesDescription'];
        $raw_capacity  = $data['prtMarkerSuppliesMaxCapacity'];
        $raw_toner     = $data['prtMarkerSuppliesLevel'];
        $toner_oid     = ".1.3.6.1.2.1.43.11.1.1.9.$index";
        $capacity_oid  = ".1.3.6.1.2.1.43.11.1.1.8.$index";

        if (empty($raw_toner)) {
            $toner_oid = ".1.3.6.1.4.1.367.3.2.1.2.24.1.1.5.$last_index";
            $raw_toner = snmp_get($device, $toner_oid, '-Oqv');
        }

        if (empty($descr)) {
            $descr_oid = ".1.3.6.1.4.1.367.3.2.1.2.24.1.1.3.$last_index";
            $descr = snmp_get($device, $descr_oid, '-Oqva');
        }

        if (empty($raw_toner)) {
            $raw_toner = snmp_get($device, $toner_oid, '-Oqv');
        }

        if (!empty($data['prtMarkerColorantValue'])) {
            $descr = ucfirst($data['prtMarkerColorantValue']);
        }

        $type = 'jetdirect';
        $capacity = get_toner_capacity($data['prtMarkerSuppliesMaxCapacity']);
        $current = get_toner_levels($device, $raw_toner, $capacity);

        if (is_numeric($current)) {
            discover_toner(
                $valid_toner,
                $device,
                $toner_oid,
                $last_index,
                $type,
                $descr,
                $capacity_oid,
                $capacity,
                $current
            );
        }
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    }
}

// Delete removed toners
d_echo("\n Checking valid toner ... \n");
d_echo($valid_toner);

<<<<<<< HEAD
$sql = "SELECT * FROM toner WHERE device_id = '" . $device['device_id'] . "'";
foreach (dbFetchRows($sql) as $test_toner) {
    $toner_index = $test_toner['toner_index'];
    $toner_type = $test_toner['toner_type'];
    if (!$valid_toner[$toner_type][$toner_index]) {
=======
$toners = dbFetchRows("SELECT * FROM toner WHERE device_id = '" . $device['device_id'] . "'");
d_echo($toners);
foreach ($toners as $test_toner) {
    $toner_oid = $test_toner['toner_oid'];
    $toner_type = $test_toner['toner_type'];
    if (!$valid_toner[$toner_type][$toner_oid]) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        echo '-';
        dbDelete('toner', '`toner_id` = ?', array($test_toner['toner_id']));
    }
}

unset($valid_toner);
echo PHP_EOL;

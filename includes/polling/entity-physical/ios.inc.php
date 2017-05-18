<?php

<<<<<<< HEAD
=======
use LibreNMS\RRD\RrdDefinition;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
echo "Cisco Cat6xxx/76xx Crossbar : \n";

$mod_stats  = snmpwalk_cache_oid($device, 'cc6kxbarModuleModeTable', array(), 'CISCO-CAT6K-CROSSBAR-MIB');
$chan_stats = snmpwalk_cache_oid($device, 'cc6kxbarModuleChannelTable', array(), 'CISCO-CAT6K-CROSSBAR-MIB');
$chan_stats = snmpwalk_cache_oid($device, 'cc6kxbarStatisticsTable', $chan_stats, 'CISCO-CAT6K-CROSSBAR-MIB');

foreach ($mod_stats as $index => $entry) {
    $group = 'c6kxbar';
    foreach ($entry as $key => $value) {
        $subindex = null;
        $entPhysical_state[$index][$subindex][$group][$key] = $value;
    }
}

foreach ($chan_stats as $index => $entry) {
    list($index,$subindex) = explode('.', $index, 2);
    $group                 = 'c6kxbar';
    foreach ($entry as $key => $value) {
        $entPhysical_state[$index][$subindex][$group][$key] = $value;
    }

    $rrd_name = array('c6kxbar', $index, $subindex);
<<<<<<< HEAD
    $rrd_def = array(
        'DS:inutil:GAUGE:600:0:100',
        'DS:oututil:GAUGE:600:0:100',
        'DS:outdropped:DERIVE:600:0:125000000000',
        'DS:outerrors:DERIVE:600:0:125000000000',
        'DS:inerrors:DERIVE:600:0:125000000000'
    );
=======
    $rrd_def = RrdDefinition::make()
        ->addDataset('inutil', 'GAUGE', 0, 100)
        ->addDataset('oututil', 'GAUGE', 0, 100)
        ->addDataset('outdropped', 'DERIVE', 0, 125000000000)
        ->addDataset('outerrors', 'DERIVE', 0, 125000000000)
        ->addDataset('inerrors', 'DERIVE', 0, 125000000000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

    $fields = array(
        'inutil'      => $entry['cc6kxbarStatisticsInUtil'],
        'oututil'     => $entry['cc6kxbarStatisticsOutUtil'],
        'outdropped'  => $entry['cc6kxbarStatisticsOutDropped'],
        'outerrors'   => $entry['cc6kxbarStatisticsOutErrors'],
        'inerrors'    => $entry['cc6kxbarStatisticsInErrors'],
    );

    $tags = compact('index', 'subindex', 'rrd_name', 'rrd_def');
    data_update($device, 'c6kxbar', $tags, $fields);
}//end foreach

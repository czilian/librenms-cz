<?php

// Polls shoutcast statistics from script via SNMP
$name = 'shoutcast';
$app_id = $app['app_id'];

<<<<<<< HEAD
$options = '-O qv';
$oid     = 'nsExtendOutputFull.9.115.104.111.117.116.99.97.115.116';
=======
use LibreNMS\RRD\RrdDefinition;

$name = 'shoutcast';
$app_id = $app['app_id'];

$options = '-O qv';
$oid     = '.1.3.6.1.4.1.8072.1.3.2.3.1.2.9.115.104.111.117.116.99.97.115.116';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$shoutcast = snmp_get($device, $oid, $options);
update_application($app, $shoutcast);

echo ' shoutcast';

$servers = explode("\n", $shoutcast);

foreach ($servers as $item => $server) {
    $server = trim($server);

    if (!empty($server)) {
        $data = explode(';', $server);
        list($host, $port) = explode(':', $data['0'], 2);

        $rrd_name = array('app', $name, $app_id, $host . '_' . $port);
<<<<<<< HEAD
        $rrd_def = array(
            'DS:bitrate:GAUGE:600:0:125000000000',
            'DS:traf_in:GAUGE:600:0:125000000000',
            'DS:traf_out:GAUGE:600:0:125000000000',
            'DS:current:GAUGE:600:0:125000000000',
            'DS:status:GAUGE:600:0:125000000000',
            'DS:peak:GAUGE:600:0:125000000000',
            'DS:max:GAUGE:600:0:125000000000',
            'DS:unique:GAUGE:600:0:125000000000'
        );
=======
        $rrd_def = RrdDefinition::make()
            ->addDataset('bitrate', 'GAUGE', 0, 125000000000)
            ->addDataset('traf_in', 'GAUGE', 0, 125000000000)
            ->addDataset('traf_out', 'GAUGE', 0, 125000000000)
            ->addDataset('current', 'GAUGE', 0, 125000000000)
            ->addDataset('status', 'GAUGE', 0, 125000000000)
            ->addDataset('peak', 'GAUGE', 0, 125000000000)
            ->addDataset('max', 'GAUGE', 0, 125000000000)
            ->addDataset('unique', 'GAUGE', 0, 125000000000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

        $fields = array(
            'bitrate'  => $data['1'],
            'traf_in'  => $data['2'],
            'traf_out' => $data['3'],
            'current'  => $data['4'],
            'status'   => $data['5'],
            'peak'     => $data['6'],
            'max'      => $data['7'],
            'unique'   => $data['8'],
        );

        $tags = compact('name', 'app_id', 'host', 'port', 'rrd_name', 'rrd_def');
        data_update($device, 'app', $tags, $fields);
    }//end if
}//end foreach

<?php

// Polls MailScanner statistics from script via SNMP

<<<<<<< HEAD
$options      = '-O qv';
$oid          = 'nsExtendOutputFull.11.109.97.105.108.115.99.97.110.110.101.114';

$mailscanner = snmp_get($device, $oid, $options);

=======
use LibreNMS\RRD\RrdDefinition;

$options      = '-O qv';
$oid          = '.1.3.6.1.4.1.8072.1.3.2.3.1.2.11.109.97.105.108.115.99.97.110.110.101.114';

$mailscanner = snmp_get($device, $oid, $options);
update_application($app, $mailscanner);

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
echo ' mailscanner';

list ($msg_recv, $msg_rejected, $msg_relay, $msg_sent, $msg_waiting, $spam, $virus) = explode("\n", $mailscanner);

$name = 'mailscannerV2';
$app_id = $app['app_id'];
$rrd_name = array('app', $name, $app_id);
<<<<<<< HEAD
$rrd_def = array(
    'DS:msg_recv:COUNTER:600:0:125000000000',
    'DS:msg_rejected:COUNTER:600:0:12500000000',
    'DS:msg_relay:COUNTER:600:0:125000000000',
    'DS:msg_sent:COUNTER:600:0:125000000000',
    'DS:msg_waiting:COUNTER:600:0:125000000000',
    'DS:spam:COUNTER:600:0:125000000000',
    'DS:virus:COUNTER:600:0:125000000000'
);
=======
$rrd_def = RrdDefinition::make()
    ->addDataset('msg_recv', 'COUNTER', 0, 125000000000)
    ->addDataset('msg_rejected', 'COUNTER', 0, 12500000000)
    ->addDataset('msg_relay', 'COUNTER', 0, 125000000000)
    ->addDataset('msg_sent', 'COUNTER', 0, 125000000000)
    ->addDataset('msg_waiting', 'COUNTER', 0, 125000000000)
    ->addDataset('spam', 'COUNTER', 0, 125000000000)
    ->addDataset('virus', 'COUNTER', 0, 125000000000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

$fields = array(
    'msg_recv'     => $msg_recv,
    'msg_rejected' => $msg_rejected,
    'msg_relay'    => $msg_relay,
    'msg_sent'     => $msg_sent,
    'msg_waiting'  => $msg_waiting,
    'spam'         => $spam,
    'virus'        => $virus,
);

$tags = compact('name', 'app_id', 'rrd_name', 'rrd_def');
data_update($device, 'app', $tags, $fields);

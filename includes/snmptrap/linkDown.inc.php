<?php

$interface = dbFetchRow('SELECT * FROM `ports` WHERE `device_id` = ? AND `ifIndex` = ?', array($device['device_id'], $entry[2]));

if (!$interface) {
    exit;
}

$ifOperStatus = 'down';
// $ifAdminStatus = "down";
<<<<<<< HEAD
log_event('SNMP Trap: linkDown '.$interface['ifDescr'], $device, 'interface', $interface['port_id']);
=======
log_event('SNMP Trap: linkDown ' . $interface['ifDescr'], $device, 'interface', 5, $interface['port_id']);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

// if ($ifAdminStatus != $interface['ifAdminStatus'])
// {
// log_event("Interface Disabled : " . $interface['ifDescr'] . " (TRAP)", $device, "interface", $interface['port_id']);
// }
if ($ifOperStatus != $interface['ifOperStatus']) {
<<<<<<< HEAD
    log_event('Interface went Down : '.$interface['ifDescr'].' (TRAP)', $device, 'interface', $interface['port_id']);
=======
    log_event('Interface went Down : ' . $interface['ifDescr'] . ' (TRAP)', $device, 'interface', 5, $interface['port_id']);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    dbUpdate(array('ifOperStatus' => 'down'), 'ports', 'port_id=?', array($interface['port_id']));
}

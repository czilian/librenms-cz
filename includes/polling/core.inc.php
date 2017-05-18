<?php

/*
 * LibreNMS Network Management and Monitoring System
 * Copyright (C) 2006-2011, Observium Developers - http://www.observium.org
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * See COPYING for more details.
 */

<<<<<<< HEAD
=======
use LibreNMS\RRD\RrdDefinition;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
unset($poll_device);

$snmpdata = snmp_get_multi($device, 'sysUpTime.0 sysLocation.0 sysContact.0 sysName.0 sysObjectID.0', '-OQnUst', 'SNMPv2-MIB:HOST-RESOURCES-MIB:SNMP-FRAMEWORK-MIB');
$poll_device = $snmpdata[0];
$poll_device['sysName'] = strtolower($poll_device['sysName']);

$poll_device['sysDescr'] = snmp_get($device, 'sysDescr.0', '-OvQ', 'SNMPv2-MIB:HOST-RESOURCES-MIB:SNMP-FRAMEWORK-MIB');

if (!empty($agent_data['uptime'])) {
    list($uptime) = explode(' ', $agent_data['uptime']);
    $uptime = round($uptime);
    echo "Using UNIX Agent Uptime ($uptime)\n";
}

if (empty($uptime)) {
    $snmp_data = snmp_get_multi($device, 'snmpEngineTime.0 hrSystemUptime.0', '-OQnUst', 'HOST-RESOURCES-MIB:SNMP-FRAMEWORK-MIB');
    $uptime_data = $snmp_data[0];
    $snmp_uptime = (integer)$uptime_data['snmpEngineTime'];
    $hrSystemUptime = $uptime_data['hrSystemUptime'];
    if (!empty($hrSystemUptime) && !strpos($hrSystemUptime, 'No') && ($device['os'] != 'windows')) {
<<<<<<< HEAD
        // Move uptime into agent_uptime
        $agent_uptime = $uptime;

=======
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $uptime = floor($hrSystemUptime / 100);
        echo 'Using hrSystemUptime (' . $uptime . "s)\n";
    } else {
        $uptime = floor($poll_device['sysUpTime'] / 100);
        echo 'Using SNMP Agent Uptime (' . $uptime . "s)\n  ";
    }//end if
}//end if

if ($config['os'][$device['os']]['bad_snmpEngineTime'] !== true) {
    if ($snmp_uptime > $uptime && is_numeric($snmp_uptime)) {
        $uptime = $snmp_uptime;
        d_echo('hrSystemUptime or sysUpTime looks like to have rolled, using snmpEngineTime instead');
    }
}

if (is_numeric($uptime) && ($config['os'][$device['os']]['bad_uptime'] !== true)) {
    if ($uptime < $device['uptime']) {
<<<<<<< HEAD
        log_event('Device rebooted after ' . formatUptime($device['uptime']), $device, 'reboot', $device['uptime']);
    }

    $tags = array(
        'rrd_def' => 'DS:uptime:GAUGE:600:0:U',
=======
        log_event('Device rebooted after ' . formatUptime($device['uptime']) . ' -> ' . $uptime, $device, 'reboot', 4, $device['uptime']);
    }

    $tags = array(
        'rrd_def' => RrdDefinition::make()->addDataset('uptime', 'GAUGE', 0),
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    );
    data_update($device, 'uptime', $tags, $uptime);

    $graphs['uptime'] = true;

    echo 'Uptime: ' . formatUptime($uptime) . "\n";

    $update_array['uptime'] = $uptime;
}//end if

$poll_device['sysLocation'] = str_replace('"', '', $poll_device['sysLocation']);

// Remove leading & trailing backslashes added by VyOS/Vyatta/EdgeOS
$poll_device['sysLocation'] = trim($poll_device['sysLocation'], '\\');

// Rewrite sysLocation if there is a mapping array (database too?)
<<<<<<< HEAD
if (!empty($poll_device['sysLocation']) && (is_array($config['location_map']) || is_array($config['location_map_regex']))) {
=======
if (!empty($poll_device['sysLocation']) && (is_array($config['location_map']) || is_array($config['location_map_regex']) || is_array($config['location_map_regex_sub']))) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $poll_device['sysLocation'] = rewrite_location($poll_device['sysLocation']);
}

$poll_device['sysContact'] = str_replace('"', '', $poll_device['sysContact']);

// Remove leading & trailing backslashes added by VyOS/Vyatta/EdgeOS
$poll_device['sysContact'] = trim($poll_device['sysContact'], '\\');


foreach (array('sysLocation', 'sysContact') as $elem) {
    if ($poll_device[$elem] == 'not set') {
        $poll_device[$elem] = '';
    }
}

// Save results of various polled values to the database
foreach (array('sysContact', 'sysObjectID', 'sysName', 'sysDescr') as $elem) {
<<<<<<< HEAD
    if ($poll_device[$elem] && $poll_device[$elem] != $device[$elem]) {
        $update_array[$elem] = $poll_device[$elem];
        log_event("$elem -> " . $poll_device[$elem], $device, 'system');
=======
    if ($poll_device[$elem] != $device[$elem]) {
        $update_array[$elem] = $poll_device[$elem];
        log_event("$elem -> " . $poll_device[$elem], $device, 'system', 3);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    }
}

if ($poll_device['sysLocation'] && $device['location'] != $poll_device['sysLocation'] && $device['override_sysLocation'] == 0) {
    $update_array['location'] = $poll_device['sysLocation'];
<<<<<<< HEAD
    log_event('Location -> ' . $poll_device['sysLocation'], $device, 'system');
=======
    log_event('Location -> ' . $poll_device['sysLocation'], $device, 'system', 3);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}

if ($config['geoloc']['latlng'] === true) {
    location_to_latlng($device);
}

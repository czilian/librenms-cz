<?php
/*
 * Copyright (C) 2015 Daniel Preussker <f0o@devilcode.org>
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/*
 * TinyDNS Statistics
 * @author Daniel Preussker <f0o@devilcode.org>
 * @copyright 2015 f0o, LibreNMS
 * @license GPL
 * @package LibreNMS
 * @subpackage Polling
 */

<<<<<<< HEAD
$name = 'tinydns';
$app_id = $app['app_id'];
if (!empty($agent_data['app'][$name]) && $app_id > 0) {
    echo ' tinydns';
    $rrd_name = array('app', $name, $app_id);
    $rrd_def = array(
        'DS:a:COUNTER:600:0:125000000000',
        'DS:ns:COUNTER:600:0:125000000000',
        'DS:cname:COUNTER:600:0:125000000000',
        'DS:soa:COUNTER:600:0:125000000000',
        'DS:ptr:COUNTER:600:0:125000000000',
        'DS:hinfo:COUNTER:600:0:125000000000',
        'DS:mx:COUNTER:600:0:125000000000',
        'DS:txt:COUNTER:600:0:125000000000',
        'DS:rp:COUNTER:600:0:125000000000',
        'DS:sig:COUNTER:600:0:125000000000',
        'DS:key:COUNTER:600:0:125000000000',
        'DS:aaaa:COUNTER:600:0:125000000000',
        'DS:axfr:COUNTER:600:0:125000000000',
        'DS:any:COUNTER:600:0:125000000000',
        'DS:total:COUNTER:600:0:125000000000',
        'DS:other:COUNTER:600:0:125000000000',
        'DS:notauth:COUNTER:600:0:125000000000',
        'DS:notimpl:COUNTER:600:0:125000000000',
        'DS:badclass:COUNTER:600:0:125000000000',
        'DS:noquery:COUNTER:600:0:125000000000'
    );
=======
use LibreNMS\RRD\RrdDefinition;

$name = 'tinydns';
$app_id = $app['app_id'];
if (!empty($agent_data['app'][$name]) && $app_id > 0) {
    update_application($app, $name);
    echo ' tinydns';
    $rrd_name = array('app', $name, $app_id);
    $rrd_def = RrdDefinition::make()
        ->addDataset('a', 'COUNTER', 0, 125000000000)
        ->addDataset('ns', 'COUNTER', 0, 125000000000)
        ->addDataset('cname', 'COUNTER', 0, 125000000000)
        ->addDataset('soa', 'COUNTER', 0, 125000000000)
        ->addDataset('ptr', 'COUNTER', 0, 125000000000)
        ->addDataset('hinfo', 'COUNTER', 0, 125000000000)
        ->addDataset('mx', 'COUNTER', 0, 125000000000)
        ->addDataset('txt', 'COUNTER', 0, 125000000000)
        ->addDataset('rp', 'COUNTER', 0, 125000000000)
        ->addDataset('sig', 'COUNTER', 0, 125000000000)
        ->addDataset('key', 'COUNTER', 0, 125000000000)
        ->addDataset('aaaa', 'COUNTER', 0, 125000000000)
        ->addDataset('axfr', 'COUNTER', 0, 125000000000)
        ->addDataset('any', 'COUNTER', 0, 125000000000)
        ->addDataset('total', 'COUNTER', 0, 125000000000)
        ->addDataset('other', 'COUNTER', 0, 125000000000)
        ->addDataset('notauth', 'COUNTER', 0, 125000000000)
        ->addDataset('notimpl', 'COUNTER', 0, 125000000000)
        ->addDataset('badclass', 'COUNTER', 0, 125000000000)
        ->addDataset('noquery', 'COUNTER', 0, 125000000000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

    $tags = compact('name', 'app_id', 'rrd_name', 'rrd_def');
    data_update($device, 'app', $tags, $fields);
}//end if

<?php
/**
 * rrdcached.inc.php
 *
 * rrdcached application polling module
 * Capable of collecting stats from the agent or via direct connection
 * Only the default tcp port is supported, and unix sockets only work on localhost
 *
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
 *
 * @package    LibreNMS
 * @link       http://librenms.org
 * @copyright  2016 Tony Murray
 * @author     Tony Murray <murraytony@gmail.com>
 */

<<<<<<< HEAD
=======
use LibreNMS\RRD\RrdDefinition;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
echo ' rrdcached';

$data = "";
$name = 'rrdcached';
$app_id = $app['app_id'];

if ($agent_data['app'][$name]) {
    $data = $agent_data['app'][$name];
} else {
    d_echo("\nNo Agent Data. Attempting to connect directly to the rrdcached server " . $device['hostname'] . ":42217\n");

    $sock = fsockopen($device['hostname'], 42217, $errno, $errstr, 5);

<<<<<<< HEAD
    if (!$sock && $device['hostname'] == 'localhost') {
        if (file_exists('/var/run/rrdcached.sock')) {
            $sock = fsockopen('unix:///var/run/rrdcached.sock');
=======
    if (!$sock) {
        if (file_exists('/var/run/rrdcached.sock')) {
            $sock = fsockopen('unix:///var/run/rrdcached.sock');
        } elseif (file_exists('/var/run/rrdcached/rrdcached.sock')) {
            $sock = fsockopen('unix:///var/run/rrdcached/rrdcached.sock');
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        } elseif (file_exists('/run/rrdcached.sock')) {
            $sock = fsockopen('unix:///run/rrdcached.sock');
        } elseif (file_exists('/tmp/rrdcached.sock')) {
            $sock = fsockopen('unix:///tmp/rrdcached.sock');
        }
    }

    if ($sock) {
        fwrite($sock, "STATS\n");
        $max = -1;
        $count = 0;
        while ($max == -1 || $count < $max) {
            $data .= fgets($sock, 128);
            if ($max == -1) {
                $tmp_max = explode(' ', $data);
                $max     = $tmp_max[0]+1;
            }
            $count++;
        }
        fclose($sock);
    } else {
        d_echo("ERROR: $errno - $errstr\n");
    }
}

<<<<<<< HEAD

$rrd_name = array('app', $name, $app_id);
$rrd_def = array(
    'DS:queue_length:GAUGE:600:0:U',
    'DS:updates_received:COUNTER:600:0:U',
    'DS:flushes_received:COUNTER:600:0:U',
    'DS:updates_written:COUNTER:600:0:U',
    'DS:data_sets_written:COUNTER:600:0:U',
    'DS:tree_nodes_number:GAUGE:600:0:U',
    'DS:tree_depth:GAUGE:600:0:U',
    'DS:journal_bytes:COUNTER:600:0:U',
    'DS:journal_rotate:COUNTER:600:0:U'
);
=======
update_application($app, $data);

$rrd_name = array('app', $name, $app_id);
$rrd_def = RrdDefinition::make()
    ->addDataset('queue_length', 'GAUGE', 0)
    ->addDataset('updates_received', 'COUNTER', 0)
    ->addDataset('flushes_received', 'COUNTER', 0)
    ->addDataset('updates_written', 'COUNTER', 0)
    ->addDataset('data_sets_written', 'COUNTER', 0)
    ->addDataset('tree_nodes_number', 'GAUGE', 0)
    ->addDataset('tree_depth', 'GAUGE', 0)
    ->addDataset('journal_bytes', 'COUNTER', 0)
    ->addDataset('journal_rotate', 'COUNTER', 0);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

$fields = array();
foreach (explode("\n", $data) as $line) {
    $split = explode(': ', $line);
    if (count($split) == 2) {
        $ds = strtolower(preg_replace('/[A-Z]/', '_$0', lcfirst($split[0])));
        $fields[$ds] = $split[1];
    }
}

$tags = compact('name', 'app_id', 'rrd_name', 'rrd_def');
data_update($device, 'app', $tags, $fields);

unset($data, $rrd_name, $rrd_def, $fields, $tags);

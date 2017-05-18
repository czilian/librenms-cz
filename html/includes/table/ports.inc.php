<?php
/**
 * ports.inc.php
 *
 * Exports the ports table to json
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

$where = "`D`.`hostname` != '' ";
$param = array();
$sql = 'FROM `ports`';

if (is_admin() === false && is_read() === false) {
<<<<<<< HEAD
    $sql    .= ' LEFT JOIN `devices_perms` AS `DP` ON `ports`.`device_id` = `DP`.`device_id`';
    $sql    .= ' LEFT JOIN `ports_perms` AS `PP` ON `ports`.`port_id` = `PP`.`port_id`';

    $where  .= ' AND (`DP`.`user_id`=? OR `PP`.`user_id`=?)';
=======
    $sql .= ' LEFT JOIN `devices_perms` AS `DP` ON `ports`.`device_id` = `DP`.`device_id`';
    $sql .= ' LEFT JOIN `ports_perms` AS `PP` ON `ports`.`port_id` = `PP`.`port_id`';

    $where .= ' AND (`DP`.`user_id`=? OR `PP`.`user_id`=?)';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $param[] = $_SESSION['user_id'];
    $param[] = $_SESSION['user_id'];
}

$sql .= ' LEFT JOIN `devices` AS `D` ON `ports`.`device_id` = `D`.`device_id`';

if (!empty($_POST['hostname'])) {
<<<<<<< HEAD
    $where  .= ' AND `D`.`hostname` LIKE ?';
=======
    $where .= ' AND `D`.`hostname` LIKE ?';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $param[] = '%' . $_POST['hostname'] . '%';
}

if (!empty($_POST['location'])) {
<<<<<<< HEAD
    $where  .= " AND `D`.`location` = ?";
=======
    $where .= " AND `D`.`location` = ?";
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $param[] = $_POST['location'];
}

$sql .= " WHERE $where ";

if (!empty($_POST['errors'])) {
    $sql .= " AND (`ports`.`ifInErrors_delta` > 0 OR `ports`.`ifOutErrors_delta` > 0)";
}

if (!empty($_POST['device_id'])) {
<<<<<<< HEAD
    $sql    .= ' AND `ports`.`device_id`=?';
=======
    $sql .= ' AND `ports`.`device_id`=?';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $param[] = $_POST['device_id'];
}

if (!empty($_POST['state'])) {
<<<<<<< HEAD
    $sql .= ' AND `ports`.`ifOperStatus`=?';
    $param[] = $_POST['state'];
=======
    switch ($_POST['state']) {
        case "down":
            $sql .= " AND `ports`.`ifAdminStatus` = ? AND `ports`.`ifOperStatus` = ?";
            $param[] = "up";
            $param[] = "down";
            break;
        case "up":
            $sql .= " AND `ports`.`ifAdminStatus` = ? AND `ports`.`ifOperStatus` = ?";
            $param[] = "up";
            $param[] = "up";
            break;
        case "admindown":
            $sql .= " AND `ports`.`ifAdminStatus` = ? AND `D`.`ignore` = 0";
            $param[] = "down";
            break;
    }
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}

if (!empty($_POST['ifSpeed'])) {
    $sql .= ' AND `ports`.`ifSpeed`=?';
    $param[] = $_POST['ifSpeed'];
}

if (!empty($_POST['ifType'])) {
    $sql .= ' AND `ports`.`ifType`=?';
    $param[] = $_POST['ifType'];
}

if (!empty($_POST['port_descr_type'])) {
    $sql .= ' AND `ports`.`port_descr_type`=?';
    $param[] = $_POST['port_descr_type'];
}

if (!empty($_POST['ifAlias'])) {
    $sql .= ' AND `ports`.`ifAlias` LIKE ?';
<<<<<<< HEAD
    $param[] = '%'.$_POST['ifAlias'].'%';
}

$sql    .= ' AND `ports`.`disabled`=?';
$param[] = (int)(isset($_POST['disabled']) && $_POST['disabled']);

$sql    .= ' AND `ports`.`ignore`=?';
$param[] = (int)(isset($_POST['ignore']) && $_POST['ignore']);

$sql    .= ' AND `ports`.`deleted`=?';
=======
    $param[] = '%' . $_POST['ifAlias'] . '%';
}

$sql .= ' AND `ports`.`disabled`=?';
$param[] = (int)(isset($_POST['disabled']) && $_POST['disabled']);

$sql .= ' AND `ports`.`ignore`=?';
$param[] = (int)(isset($_POST['ignore']) && $_POST['ignore']);

$sql .= ' AND `ports`.`deleted`=?';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$param[] = (int)(isset($_POST['deleted']) && $_POST['deleted']);

$count_sql = "SELECT COUNT(`ports`.`port_id`) $sql";
$total = (int)dbFetchCell($count_sql, $param);

if (isset($sort) && !empty($sort)) {
    list($sort_column, $sort_order) = explode(' ', trim($sort));
    if ($sort_column == 'device') {
        $sql .= " ORDER BY `D`.`hostname` $sort_order";
    } elseif ($sort_column == 'port') {
        $sql .= " ORDER BY `ifDescr` $sort_order";
    } elseif ($sort_column == 'ifLastChange') {
        $sql .= " ORDER BY `secondsIfLastChange` $sort_order";
    } else {
        $sql .= " ORDER BY `$sort_column` $sort_order";
    }
}

if (isset($current)) {
<<<<<<< HEAD
    $limit_low  = (($current * $rowCount) - ($rowCount));
=======
    $limit_low = (($current * $rowCount) - ($rowCount));
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $limit_high = $rowCount;
}

if ($rowCount != -1) {
    $sql .= " LIMIT $limit_low,$limit_high";
}

$query = 'SELECT DISTINCT(`ports`.`port_id`),`ports`.*';
// calculate ifLastChange as seconds ago
$query .= ',`D`.`uptime` - `ports`.`ifLastChange` / 100 as secondsIfLastChange ';
$query .= $sql;

foreach (dbFetchRows($query, $param) as $port) {
    $device = device_by_id_cache($port['device_id']);
<<<<<<< HEAD
=======
    $port = cleanPort($port, $device);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

    // FIXME what actions should we have?
    $actions = '<div class="container-fluid"><div class="row">';
    $actions .= '<div class="col-xs-1"><a href="';
    $actions .= generate_device_url($device, array('tab' => 'alerts'));
<<<<<<< HEAD
    $actions .= '"><img src="images/16/bell.png" border="0" align="absmiddle" alt="View alerts" title="View alerts" /></a></div>';
=======
    $actions .= '"><i class="fa fa-exclamation-circle fa-lg icon-theme" title="View alerts" aria-hidden="true"></i></a></div>';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

    if ($_SESSION['userlevel'] >= '7') {
        $actions .= '<div class="col-xs-1"><a href="';
        $actions .= generate_device_url($device, array('tab' => 'edit', 'section' => 'ports'));
<<<<<<< HEAD
        $actions .= '"><img src="images/16/wrench.png" border="0" align="absmiddle" alt="Edit ports" title="Edit ports" /></a></div>';
=======
        $actions .= '"><i class="fa fa-pencil fa-lg icon-theme" title="Edit ports" aria-hidden="true"></i></a></div>';
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    }

    $actions .= '</div></div>';

    $response[] = array(
        'device' => generate_device_link($device),
        'port' => generate_port_link($port),
        'ifLastChange' => ceil($port['secondsIfLastChange']),
        'ifConnectorPresent' => ($port['ifConnectorPresent'] == 'true') ? 'yes' : 'no',
        'ifSpeed' => $port['ifSpeed'],
        'ifMtu' => $port['ifMtu'],
        'ifInOctets_rate' => $port['ifInOctets_rate'] * 8,
        'ifOutOctets_rate' => $port['ifOutOctets_rate'] * 8,
        'ifInUcastPkts_rate' => $port['ifInUcastPkts_rate'],
        'ifOutUcastPkts_rate' => $port['ifOutUcastPkts_rate'],
        'ifInErrors' => $port['ifInErrors'],
        'ifOutErrors' => $port['ifOutErrors'],
        'ifType' => humanmedia($port['ifType']),
<<<<<<< HEAD
        'description' => display($port['ifAlias']),
=======
        'description' => $port['ifAlias'],
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        'actions' => $actions,
    );
}

$output = array(
<<<<<<< HEAD
    'current'  => $current,
    'rowCount' => $rowCount,
    'rows'     => $response,
    'total'    => $total,
=======
    'current' => $current,
    'rowCount' => $rowCount,
    'rows' => $response,
    'total' => $total,
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
);

echo _json_encode($output);

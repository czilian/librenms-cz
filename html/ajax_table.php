<?php

/*
 * LibreNMS
 *
 * Copyright (c) 2014 Neil Lathwood <https://github.com/laf/ http://www.lathwood.co.uk/fa>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

$init_modules = array('web', 'auth');
require realpath(__DIR__ . '/..') . '/includes/init.php';

if (!$_SESSION['authenticated']) {
    echo "Unauthenticated\n";
    exit;
}

set_debug($_REQUEST['debug']);

<<<<<<< HEAD
$current = $_POST['current'];
settype($current, 'integer');
$rowCount = $_POST['rowCount'];
settype($rowCount, 'integer');
if (isset($_POST['sort']) && is_array($_POST['sort'])) {
    foreach ($_POST['sort'] as $k => $v) {
=======
$current = $_REQUEST['current'];
settype($current, 'integer');
$rowCount = $_REQUEST['rowCount'];
settype($rowCount, 'integer');
if (isset($_REQUEST['sort']) && is_array($_POST['sort'])) {
    foreach ($_REQUEST['sort'] as $k => $v) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        $sort .= " $k $v";
    }
}

<<<<<<< HEAD
$searchPhrase = mres($_POST['searchPhrase']);
$id           = mres($_POST['id']);
=======
$searchPhrase = mres($_REQUEST['searchPhrase']);
$id           = mres($_REQUEST['id']);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$response     = array();

if (isset($id)) {
    if (file_exists("includes/table/$id.inc.php")) {
        header('Content-type: application/json');
        include_once "includes/table/$id.inc.php";
    }
}

<?php

/**
 * LibreNMS
 *
 *   This file is part of LibreNMS.
 *
 * @package    librenms
 * @subpackage ajax
 * @copyright  (C) 2006 - 2012 Adam Armstrong
 */

$init_modules = array('web', 'auth');
require realpath(__DIR__ . '/..') . '/includes/init.php';

set_debug($_REQUEST['debug']);

if (!$_SESSION['authenticated']) {
    echo 'unauthenticated';
    exit;
}

if (is_numeric($_GET['device_id'])) {
    foreach (dbFetch('SELECT * FROM ports WHERE device_id = ?', array($_GET['device_id'])) as $interface) {
<<<<<<< HEAD
        $interface  = ifNameDescr($interface);
        $string = display($interface['label'].' - '.$interface['ifAlias']);
=======
        $interface  = cleanPort($interface);
        $string = addslashes(html_entity_decode($interface['label'].' - '.$interface['ifAlias']));
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        echo "obj.options[obj.options.length] = new Option('".$string."','".$interface['port_id']."');\n";
    }
}

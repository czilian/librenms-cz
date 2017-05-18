<?php
/*
 * LibreNMS
 *
 * Copyright (c) 2015 Søren Friis Rosiak <sorenrosiak@gmail.com>
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */
header('Content-type: application/json');

$status    = 'error';
$message   = 'unknown error';
$data_param = mres($_POST['data_param']);
$query_param = mres($_POST['query_param']);
if (isset($data_param) && isset($query_param)) {
    $status  = 'ok';
    $message = 'Queried';
    $output = get_ripe_api_whois_data_json($data_param, $query_param);
} else {
    $status  = 'error';
    $message = 'ERROR: Could not query';
}
<<<<<<< HEAD
die(json_encode(array(
=======
die(display(json_encode(array(
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
     'status'       => $status,
     'message'      => $message,
     'data_param'    => $data_param,
     'query_param'    => $query_param,
<<<<<<< HEAD
     'output'       => $output
)));
=======
     'output'       => $output,
))));
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

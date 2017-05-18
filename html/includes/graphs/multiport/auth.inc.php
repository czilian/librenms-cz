<?php

<<<<<<< HEAD
$auth = true;

foreach (explode(',', $vars['id']) as $ifid) {
    if (!$auth && !port_permitted($ifid)) {
        $auth = false;
=======
if (!$auth) {
    foreach (explode(',', $vars['id']) as $ifid) {
        $auth = port_permitted($ifid);
        if (!$auth) {
            break;
        }
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    }
}

$title = 'Multi Port :: ';

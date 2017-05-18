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

$no_refresh = true;

echo '<ul class="nav nav-tabs">';

$poll_tabs = array(
    array(
        'name' => 'Pollers',
<<<<<<< HEAD
        'icon' => 'clock_link',
    ),
    array(
        'name' => 'Groups',
        'icon' => 'clock_add',
=======
        'icon' => 'fa-th-large',
    ),
    array(
        'name' => 'Groups',
        'icon' => 'fa-th',
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    ),
);

foreach ($poll_tabs as $tab) {
    echo '
            <li>
                <a href="' . generate_url(array('page'=>'pollers','tab'=>lcfirst($tab['name']))) . '">
<<<<<<< HEAD
                   <img src="images/16/'.$tab['icon'].'.png" align="absmiddle" border="0"> '.$tab['name'].'
=======
                <i class="fa '.$tab['icon'].' fa-lg icon-theme" aria-hidden="true"></i>'.$tab['name'].'
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
                </a>
            </li>';
}

echo '</ul>';

if (isset($vars['tab'])) {
    include_once 'pages/pollers/'.mres($vars['tab']).'.inc.php';
}

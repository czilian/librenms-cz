<?php

if ($config['enable_inventory']) {
    // Cisco
    if ($device['os'] == 'ios') {
        include 'includes/polling/entity-physical/ios.inc.php';
    }

    // Cisco CIMC
    if ($device['os'] == 'cimc') {
        include 'includes/polling/entity-physical/cimc.inc.php';
    }
<<<<<<< HEAD

    // Update State
    include 'includes/polling/entity-physical/state.inc.php';
} else {
    echo 'Disabled!';
}//end if
=======

    // Update State
    include 'includes/polling/entity-physical/state.inc.php';
} else {
    echo 'Disabled!';
}//end if

unset(
    $mod_stats,
    $chan_stats
);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

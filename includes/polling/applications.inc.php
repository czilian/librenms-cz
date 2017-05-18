<?php

$app_rows = dbFetchRows('SELECT * FROM `applications` WHERE `device_id`  = ?', array($device['device_id']));

if (count($app_rows) > 0) {
    foreach ($app_rows as $app) {
        $app_include = $config['install_dir'].'/includes/polling/applications/'.$app['app_type'].'.inc.php';
        if (is_file($app_include)) {
            include $app_include;
        } else {
            echo $app['app_type'].' include missing! ';
        }
    }
<<<<<<< HEAD

    echo "\n";
}
=======
    echo "\n";
}

unset($app_rows);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

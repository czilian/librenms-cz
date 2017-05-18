<?php

foreach (glob($config['install_dir'].'/'.$include_dir.'/*.inc.php') as $file) {
<<<<<<< HEAD
    d_echo('Including: ' . $file . PHP_EOL);
=======
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    include $file;
}

unset($include_dir);

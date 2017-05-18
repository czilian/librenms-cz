<?php

// MYSQL Check - FIXME
// 1 UNKNOWN

/*
 * LibreNMS Network Management and Monitoring System
 * Copyright (C) 2006-2012, Observium Developers - http://www.observium.org
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * See COPYING for more details.
 */

if (!isset($debug)  && php_sapi_name() == 'cli') {
    // Not called from within discovery, let's load up the necessary stuff.
    $init_modules = array();
    require realpath(__DIR__ . '/../..') . '/includes/init.php';
<<<<<<< HEAD

    $options = getopt('d');
    if (isset($options['d'])) {
        $debug = true;
    } else {
        $debug = false;
    }
}

$insert = 0;

if ($db_rev = @dbFetchCell('SELECT version FROM `dbSchema` ORDER BY version DESC LIMIT 1')) {
} else {
    $db_rev = 0;
    $insert = 1;
}

// For transition from old system
if ($old_rev = @dbFetchCell('SELECT revision FROM `dbSchema`')) {
    echo "-- Transitioning from old revision-based schema to database version system\n";
    $db_rev = 6;

    if ($old_rev <= 1000) {
        $db_rev = 1;
    }

    if ($old_rev <= 1435) {
        $db_rev = 2;
    }

    if ($old_rev <= 2245) {
        $db_rev = 3;
    }

    if ($old_rev <= 2804) {
        $db_rev = 4;
    }

    if ($old_rev <= 2827) {
        $db_rev = 5;
    }

    $insert = 1;
}//end if
=======

    $options = getopt('d');
    $debug = isset($options['d']);
}

set_lock('schema');

d_echo("DB Schema update started....\n");

if (db_schema_is_current()) {
    d_echo("DB Schema already up to date.\n");
    release_lock('schema');
    return;
}
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

// Set Database Character set and Collation
dbQuery('ALTER DATABASE ? CHARACTER SET utf8 COLLATE utf8_unicode_ci;', array(array($config['db_name'])));

<<<<<<< HEAD
$include_dir_regexp = '/\.sql$/';

if ($handle = opendir($config['install_dir'].'/sql-schema')) {
    while (false !== ($file = readdir($handle))) {
        if (filetype($config['install_dir'].'/sql-schema/'.$file) == 'file' && preg_match($include_dir_regexp, $file)) {
            $filelist[] = $file;
        }
    }

    closedir($handle);
}

asort($filelist);
$tmp = explode('.', max($filelist), 2);
if ($tmp[0] <= $db_rev) {
    if ($debug) {
        echo "DB Schema already up to date.\n";
    }
    return;
}

$limit = 150; //magic marker far enough in the future
foreach ($filelist as $file) {
    list($filename,$extension) = explode('.', $file, 2);
    if ($filename > $db_rev) {
        if (isset($_SESSION['stage'])) {
            $limit++;
            if (time()-$_SESSION['last'] > 45) {
                $_SESSION['offset'] = $limit;
                $GLOBALS['refresh'] = '<b>Updating, please wait..</b><sub>'.date('r').'</sub><script>window.location.href = "install.php?offset='.$limit.'";</script>';
                return;
            }
        }

        if (!$updating) {
            echo "-- Updating database schema\n";
        }

        echo sprintf('%03d', $db_rev).' -> '.sprintf('%03d', $filename).' ...';

        $err = 0;

        if ($fd = @fopen($config['install_dir'].'/sql-schema/'.$file, 'r')) {
            $data = fread($fd, 4096);
            while (!feof($fd)) {
                $data .= fread($fd, 4096);
            }

            foreach (explode("\n", $data) as $line) {
                if (trim($line)) {
                    d_echo("$line \n");

                    if ($line[0] != '#') {
                        $update = mysqli_query($database_link, $line);
                        if (!$update) {
                            $err++;
                            if ($debug) {
                                echo mysqli_error($database_link)."\n";
                            }
                        }
                    }
                }
            }

            if ($db_rev < 5) {
                echo " done.\n";
            } else {
                echo " done ($err errors).\n";
            }
        } else {
            echo " Could not open file!\n";
        }//end if

        $updating++;
        $db_rev = $filename;
        if ($insert) {
            dbInsert(array('version' => $db_rev), 'dbSchema');
            if ($db_rev >= 6) {
                $insert = 0;
            }
        } else {
            dbUpdate(array('version' => $db_rev), 'dbSchema');
        }
    }//end if
}//end foreach

if ($updating) {
    echo "-- Done\n";
    if (isset($_SESSION['stage'])) {
        $_SESSION['build-ok'] = true;
    }
}
=======
$db_rev = get_db_schema();
$insert = ($db_rev == 0); // if $db_rev == 0, insert the first update

$updating = 0;
$limit = 150; //magic marker far enough in the future
foreach (get_schema_list() as $file_rev => $file) {
    if ($file_rev > $db_rev) {
        if (isset($_SESSION['stage'])) {
            $limit++;
            if (time()-$_SESSION['last'] > 45) {
                $_SESSION['offset'] = $limit;
                $GLOBALS['refresh'] = '<b>Updating, please wait..</b><sub>'.date('r').'</sub><script>window.location.href = "install.php?offset='.$limit.'";</script>';
                return;
            }
        }

        if (!$updating) {
            echo "-- Updating database schema\n";
        }

        printf('%03d -> %03d ...', $db_rev, $file_rev);

        $err = 0;
        if ($data = file_get_contents($file)) {
            foreach (explode("\n", $data) as $line) {
                if (trim($line)) {
                    d_echo("$line \n");

                    if ($line[0] != '#') {
                        if (!mysqli_query($database_link, $line)) {
                            $err++;
                            d_echo(mysqli_error($database_link) . PHP_EOL);
                        }
                    }
                }
            }

            echo " done ($err errors).\n";
        } else {
            echo " Could not open file! $file\n";
        }//end if

        $updating++;
        $db_rev = $file_rev;
        if ($insert) {
            dbInsert(array('version' => $db_rev), 'dbSchema');
            $insert = false;
        } else {
            dbUpdate(array('version' => $db_rev), 'dbSchema');
        }
    }//end if
}//end foreach

if ($updating) {
    echo "-- Done\n";
    if (isset($_SESSION['stage'])) {
        $_SESSION['build-ok'] = true;
    }
}

release_lock('schema');
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

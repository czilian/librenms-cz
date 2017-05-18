<?php
<<<<<<< HEAD
session_start();
if (isset($_REQUEST['width']) and isset($_REQUEST['height'])) {
    $_SESSION['screen_width'] = $_REQUEST['width'];
    $_SESSION['screen_height'] = $_REQUEST['height'];
}
header('Content-type: text/plain');
echo $_SESSION['screen_width'];
echo $_SESSION['screen_height'];
=======

session_start();

if (isset($_REQUEST['width'], $_REQUEST['height'])) {
    $_SESSION['screen_width'] = $_REQUEST['width'];
    $_SESSION['screen_height'] = $_REQUEST['height'];
}

session_write_close();

header('Content-type: text/plain');
echo $_SESSION['screen_width'] . 'x' . $_SESSION['screen_height'];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

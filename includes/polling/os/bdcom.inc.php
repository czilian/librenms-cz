<?php

<<<<<<< HEAD
/**
BDCOM(tm) S2524C Software, Version 2.1.0A Build 5721
Compiled: 2011-11-1 15:57:26 by SYS
ROM: System Bootstrap,Version 0.3.2,Serial num:27072980
**/

preg_match('/BDCOM\(tm\) ([A-Z0-9]+) Software, Version (.*)\nCompiled: (.*)\n(.*),Serial num:([0-9]+)/', $poll_device['sysDescr'], $matches);
$hardware = $matches['1'];

=======
/*
BDCOM(tm) S2524C Software, Version 2.1.0A Build 5721
Compiled: 2011-11-1 15:57:26 by SYS
ROM: System Bootstrap,Version 0.3.2,Serial num:27072980
*/

preg_match('/BDCOM\(tm\) ([A-Z0-9]+) Software, Version (.*)\nCompiled: (.*)\n(.*),Serial num:([0-9]+)/', $poll_device['sysDescr'], $matches);

$hardware = $matches['1'];
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$version  = $matches['2'];
$serial   = $matches['5'];

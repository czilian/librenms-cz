<?php

<<<<<<< HEAD
// FreeBSD variants, check for specialized distros first
if (str_contains($sysDescr, 'pfSense')) {
    $os = 'pfsense';
} elseif (str_contains($sysDescr, 'Voswall')) {
    $os = 'voswall';
} elseif (str_contains($sysDescr, 'm0n0wall')) {
    $os = 'monowall';
} elseif (str_contains($sysDescr, 'FreeBSD')) {
=======
// do not move to yaml, this check needs to happen last
if (str_contains($sysDescr, 'FreeBSD')) {
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $os = 'freebsd';
}

<?php

$adva_desc = array(
    'FSP150CC-GE114',
);

if (str_contains($sysDescr, $adva_desc)) {
    $os = 'advafsp150GE11x';
}

unset($adva_desc);

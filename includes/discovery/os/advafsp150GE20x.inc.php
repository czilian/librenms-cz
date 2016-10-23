<?php

$adva_desc = array(
    'FSP150CC-XG210',
);

if (str_contains($sysDescr, $adva_desc)) {
    $os = 'advafsp150GE20x';
}

unset($adva_desc);

<?php

$adva_desc = array(
    'FSP150EG-X',
);

if (str_contains($sysDescr, $adva_desc)) {
    $os = 'advafsp150EG-X';
}

unset($adva_desc);

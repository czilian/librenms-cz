<?php

$adva_desc = 'FSP150EG-X';

if (str_contains($sysDescr, $adva_desc)) {
    $os = 'advafsp150eg-x';
}

unset($adva_desc);

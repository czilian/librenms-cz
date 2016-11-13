<?php

$adva_desc = 'FSP150CC-GE114';

if (str_contains($sysDescr, $adva_desc)) {
    $os = 'advafsp150ge11x';
}

unset($adva_desc);

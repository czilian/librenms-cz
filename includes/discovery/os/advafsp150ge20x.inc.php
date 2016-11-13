<?php

$adva_desc = 'FSP150CC-XG210';

if (str_contains($sysDescr, $adva_desc)) {
    $os = 'advafsp150ge20x';
}

unset($adva_desc);

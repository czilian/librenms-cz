<?php

echo ' Siklu Wireless ';

$mib_oids = array(
    'rfAverageRssi'          => array(
        '1',
        'rfAverageRssi',
        'Signal Strength',
        'GAUGE',
    ),
    'rfAverageCinr'          => array(
        '1',
        'rfAverageCinr',
        'Signal to noise ratio',
        'GAUGE',
    ),
    'rfOperationalFrequency' => array(
        '1',
        'rfOperFreq',
        'Operational Frequency',
        'GAUGE',
    ),
);

$mib_graphs = array(
    'siklu_rfAverageRssi',
    'siklu_rfAverageCinr',
    'siklu_rfOperationalFrequency',
);

unset($graph, $oids, $oid);

poll_mib_def($device, 'RADIO-BRIDGE-MIB:siklu-wireless', 'siklu', $mib_oids, $mib_graphs, $graphs);

// Poll interface statistics
$mib_oids = array(
    'rfInPkts'          => array(
        '1',
        'rfInPkts',
        'In Packets',
        'DERIVE',
<<<<<<< HEAD
        '600:0:12500000000',
=======
        array('min' => 0, 'max' => 12500000000),
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    ),
    'rfOutPkts'         => array(
        '1',
        'rfOutPkts',
        'Out Packets',
        'DERIVE',
<<<<<<< HEAD
        '600:0:12500000000',
=======
        array('min' => 0, 'max' => 12500000000),
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    ),
    'rfInGoodPkts'      => array(
        '1',
        'rfInGoodPkts',
        'Good Packets',
        'DERIVE',
    ),
    'rfInErroredPkts'   => array(
        '1',
        'rfInErroredPkts',
        'Errored Packets',
        'DERIVE',
    ),
    'rfInLostPkts'      => array(
        '1',
        'rfInLostPkts',
        'Lost Packets',
        'DERIVE',
    ),
    'rfInOctets'        => array(
        '1',
        'rfInOctets',
        'In Packets',
        'DERIVE',
<<<<<<< HEAD
        '600:0:12500000000',
=======
        array('min' => 0, 'max' => 12500000000),
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    ),
    'rfOutOctets'       => array(
        '1',
        'rfOutOctets',
        'Out Packets',
        'DERIVE',
<<<<<<< HEAD
        '600:0:12500000000',
=======
        array('min' => 0, 'max' => 12500000000),
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    ),
    'rfInGoodOctets'    => array(
        '1',
        'rfInGoodOctets',
        'Good Packets',
        'DERIVE',
    ),
    'rfInErroredOctets' => array(
        '1',
        'rfInErroredOctets',
        'Errored Packets',
        'DERIVE',
    ),
    'rfInIdleOctets'    => array(
        '1',
        'rfInIdleOctets',
        'Lost Packets',
        'DERIVE',
    ),
    'rfOutIdleOctets'   => array(
        '1',
        'rfOutIdleOctets',
        'Lost Packets',
        'DERIVE',
    ),
);

$mib_graphs = array(
    'siklu_rfinterfacePkts',
    'siklu_rfinterfaceOtherPkts',
    'siklu_rfinterfaceOctets',
    'siklu_rfinterfaceOtherOctets',
);

unset($graph, $oids, $oid);

poll_mib_def($device, 'RADIO-BRIDGE-MIB:siklu-interface', 'siklu', $mib_oids, $mib_graphs, $graphs);

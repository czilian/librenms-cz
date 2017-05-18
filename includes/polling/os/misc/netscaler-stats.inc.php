<?php

<<<<<<< HEAD
=======
use LibreNMS\RRD\RrdDefinition;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
if ($device['os'] == 'netscaler') {
    echo ' IP';

    // These are at the start of large trees that we don't want to walk the entirety of, so we snmp_get_multi them
    $oids_gauge = array(
        'tcpCurServerConn',
        'tcpCurClientConn',
        'tcpActiveServerConn',
        'tcpCurClientConnClosing',
        'tcpCurServerConnEstablished',
        'tcpCurClientConnOpening',
        'tcpCurClientConnEstablished',
        'tcpCurServerConnClosing',
        'tcpSpareConn',
        'tcpSurgeQueueLen',
        'tcpCurServerConnOpening',
        'tcpCurPhysicalServers',
        'tcpReuseHit',
    );

    $oids_counter = array(
        'tcpTotServerConnOpened',
        'tcpTotServerConnClosed',
        'tcpTotClientConnOpened',
        'tcpTotClientConnClosed',
        'tcpTotSyn',
        'tcpTotSynProbe',
        'tcpTotSvrFin',
        'tcpTotCltFin',
        'tcpTotRxPkts',
        'tcpTotRxBytes',
        'tcpTotTxPkts',
        'tcpTotTxBytes',
        'tcpWaitToSyn',
        'tcpTotZombieCltConnFlushed',
        'tcpTotZombieSvrConnFlushed',
        'tcpTotZombieHalfOpenCltConnFlushed',
        'tcpTotZombieHalfOpenSvrConnFlushed',
        'tcpTotZombieActiveHalfCloseCltConnFlushed',
        'tcpTotZombieActiveHalfCloseSvrConnFlushed',
        'tcpTotZombiePassiveHalfCloseCltConnFlushed',
        'tcpTotZombiePassiveHalfCloseSrvConnFlushed',
        'tcpErrBadCheckSum',
        'tcpErrSynInSynRcvd',
        'tcpErrSynInEst',
        'tcpErrSynGiveUp',
        'tcpErrSynSentBadAck',
        'tcpErrSynRetry',
        'tcpErrFinRetry',
        'tcpErrFinGiveUp',
        'tcpErrFinDup',
        'tcpErrRst',
        'tcpErrRstNonEst',
        'tcpErrRstOutOfWindow',
        'tcpErrRstInTimewait',
        'tcpErrSvrRetrasmit',
        'tcpErrCltRetrasmit',
        'tcpErrFullRetrasmit',
        'tcpErrPartialRetrasmit',
        'tcpErrSvrOutOfOrder',
        'tcpErrCltOutOfOrder',
        'tcpErrCltHole',
        'tcpErrSvrHole',
        'tcpErrCookiePktSeqReject',
        'tcpErrCookiePktSigReject',
        'tcpErrCookiePktSeqDrop',
        'tcpErrCookiePktMssReject',
        'tcpErrRetransmit',
        'tcpErrRetransmitGiveUp',
        'pcbTotZombieCall',
        'tcpTotSynHeld',
        'tcpTotSynFlush',
        'tcpTotFinWaitClosed',
        'tcpErrAnyPortFail',
        'tcpErrIpPortFail',
        'tcpErrSentRst',
        'tcpErrBadStateConn',
        'tcpErrFastRetransmissions',
        'tcpErrFirstRetransmissions',
        'tcpErrSecondRetransmissions',
        'tcpErrThirdRetransmissions',
        'tcpErrForthRetransmissions',
        'tcpErrFifthRetransmissions',
        'tcpErrSixthRetransmissions',
        'tcpErrSeventhRetransmissions',
        'tcpErrDataAfterFin',
        'tcpErrRstThreshold',
        'tcpErrOutOfWindowPkts',
        'tcpErrSynDroppedCongestion',
        'tcpWaitData',
        'tcpErrStrayPkt',
    );

    $oids = array_merge($oids_gauge, $oids_counter);

    $data = snmpwalk_cache_oid($device, 'nsTcpStatsGroup', array(), 'NS-ROOT-MIB');

<<<<<<< HEAD
    $rrd_def = array();
    foreach ($oids_gauge as $oid) {
        $oid_ds    = substr(str_replace('tcp', '', str_replace('Active', 'Ac', str_replace('Passive', 'Ps', str_replace('Zombie', 'Zom', $oid)))), 0, 19);
        $rrd_def[] = "DS:$oid_ds:GAUGE:600:U:100000000000";
    }
    foreach ($oids_counter as $oid) {
        $oid_ds    = substr(str_replace('tcp', '', str_replace('Active', 'Ac', str_replace('Passive', 'Ps', str_replace('Zombie', 'Zom', $oid)))), 0, 19);
        $rrd_def[] = "DS:$oid_ds:COUNTER:600:U:100000000000";
=======

    $shorten = array(
        'tcp',
        'Active',
        'Passive',
        'Zombie',
    );
    $short_replacement = array(
        '',
        'Ac',
        'Ps',
        'Zom',
    );

    $rrd_def = new RrdDefinition();
    foreach ($oids_gauge as $oid) {
        $oid_ds    = str_replace($shorten, $short_replacement, $oid);
        $rrd_def->addDataset($oid_ds, 'GAUGE', null, 100000000000);
    }
    foreach ($oids_counter as $oid) {
        $oid_ds    = str_replace($shorten, $short_replacement, $oid);
        $rrd_def->addDataset($oid_ds, 'COUNTER', null, 100000000000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    }

    $fields = array();
    foreach ($oids as $oid) {
        if (is_numeric($data[0][$oid])) {
            $rrdupdate = ':'.$data[0][$oid];
        } else {
            $rrdupdate = 'U';
        }
        $fields[$oid] = $rrdupdate;
    }

    $tags = compact('rrd_def');
    data_update($device, 'netscaler-stats-tcp', $tags, $fields);

    $graphs['netscaler_tcp_conn'] = true;
    $graphs['netscaler_tcp_bits'] = true;
    $graphs['netscaler_tcp_pkts'] = true;
}//end if

<<<<<<< HEAD
unset($oids_gauge, $oids_counter, $oids, $data, $tags, $fields, $rrd_def);
=======
unset($oids_gauge, $oids_counter, $oids, $data, $tags, $fields, $rrd_def, $shorten, $short_replacement);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

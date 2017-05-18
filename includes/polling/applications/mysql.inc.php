<?php

// FIXME - this is lame
<<<<<<< HEAD
=======
use LibreNMS\RRD\RrdDefinition;

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$name = 'mysql';
$app_id = $app['app_id'];
if (!empty($agent_data['app'][$name])) {
    $mysql = $agent_data['app'][$name];
} else {
    // Polls MySQL  statistics from script via SNMP
<<<<<<< HEAD
    $mysql_cmd  = $config['snmpget'].' -m NET-SNMP-EXTEND-MIB -O qv '.snmp_gen_auth($device).' '.$device['hostname'].':'.$device['port'];
    $mysql_cmd .= ' nsExtendOutputFull.5.109.121.115.113.108';
    $mysql      = shell_exec($mysql_cmd);
}

echo ' mysql';

// General Stats
$mapping = array(
    'IDBLBSe' => 'cr',
    'IBLFh'   => 'ct',
    'IBLWn'   => 'cu',
    'IBLWn'   => 'cu',
    'SRows'   => 'ck',
    'SRange'  => 'cj',
    'SMPs'    => 'ci',
    'SScan'   => 'cl',
    'IBIRd'   => 'ai',
    'IBIWr'   => 'aj',
    'IBILg'   => 'ak',
    'IBIFSc'  => 'ah',
    'IDBRDd'  => 'b2',
    'IDBRId'  => 'b0',
    'IDBRRd'  => 'b3',
    'IDBRUd'  => 'b1',
    'IBRd'    => 'ae',
    'IBCd'    => 'af',
    'IBWr'    => 'ag',
    'TLIe'    => 'b5',
    'TLWd'    => 'b4',
    'IBPse'   => 'aa',
    'IBPDBp'  => 'ac',
    'IBPFe'   => 'ab',
    'IBPMps'  => 'ad',
    'TOC'     => 'bc',
    'OFs'     => 'b7',
    'OTs'     => 'b8',
    'OdTs'    => 'b9',
    'IBSRs'   => 'ay',
    'IBSWs'   => 'ax',
    'IBOWs'   => 'az',
    'QCs'     => 'c1',
    'QCeFy'   => 'bu',
    'MaCs'    => 'bl',
    'MUCs'    => 'bf',
    'ACs'     => 'bd',
    'AdCs'    => 'be',
    'TCd'     => 'bi',
    'Cs'      => 'bn',
    'IBTNx'   => 'a5',
    'KRRs'    => 'a0',
    'KRs'     => 'a1',
    'KWR'     => 'a2',
    'KWs'     => 'a3',
    'QCQICe'  => 'bz',
    'QCHs'    => 'bv',
    'QCIs'    => 'bw',
    'QCNCd'   => 'by',
    'QCLMPs'  => 'bx',
    'CTMPDTs' => 'cn',
    'CTMPTs'  => 'cm',
    'CTMPFs'  => 'co',
    'IBIIs'   => 'au',
    'IBIMRd'  => 'av',
    'IBIMs'   => 'aw',
    'IBILog'  => 'al',
    'IBISc'   => 'am',
    'IBIFLg'  => 'an',
    'IBFBl'   => 'aq',
    'IBIIAo'  => 'ap',
    'IBIAd'   => 'as',
    'IBIAe'   => 'at',
    'SFJn'    => 'cd',
    'SFRJn'   => 'ce',
    'SRe'     => 'cf',
    'SRCk'    => 'cg',
    'SSn'     => 'ch',
    'SQs'     => 'b6',
    'BRd'     => 'cq',
    'BSt'     => 'cp',
    'CDe'     => 'c6',
    'CIt'     => 'c4',
    'CISt'    => 'ca',
    'CLd'     => 'c8',
    'CRe'     => 'c7',
    'CRSt'    => 'cc',
    'CSt'     => 'c5',
    'CUe'     => 'c3',
    'CUMi'    => 'c9',
);

$data = explode("\n", $mysql);

$map = array();
foreach ($data as $str) {
    list($key, $value) = explode(':', $str);
    $map[$key]         = (float) trim($value);
}

$fields = array();
foreach ($mapping as $k => $v) {
    $fields[$k] = isset($map[$v]) ? $map[$v] : (-1);
}

$rrd_name = array('app', $name, $app_id);
$rrd_def = array(
    'DS:IDBLBSe:GAUGE:600:0:125000000000',
    'DS:IBLFh:DERIVE:600:0:125000000000',
    'DS:IBLWn:DERIVE:600:0:125000000000',
    'DS:SRows:DERIVE:600:0:125000000000',
    'DS:SRange:DERIVE:600:0:125000000000',
    'DS:SMPs:DERIVE:600:0:125000000000',
    'DS:SScan:DERIVE:600:0:125000000000',
    'DS:IBIRd:DERIVE:600:0:125000000000',
    'DS:IBIWr:DERIVE:600:0:125000000000',
    'DS:IBILg:DERIVE:600:0:125000000000',
    'DS:IBIFSc:DERIVE:600:0:125000000000',
    'DS:IDBRDd:DERIVE:600:0:125000000000',
    'DS:IDBRId:DERIVE:600:0:125000000000',
    'DS:IDBRRd:DERIVE:600:0:125000000000',
    'DS:IDBRUd:DERIVE:600:0:125000000000',
    'DS:IBRd:DERIVE:600:0:125000000000',
    'DS:IBCd:DERIVE:600:0:125000000000',
    'DS:IBWr:DERIVE:600:0:125000000000',
    'DS:TLIe:DERIVE:600:0:125000000000',
    'DS:TLWd:DERIVE:600:0:125000000000',
    'DS:IBPse:GAUGE:600:0:125000000000',
    'DS:IBPDBp:GAUGE:600:0:125000000000',
    'DS:IBPFe:GAUGE:600:0:125000000000',
    'DS:IBPMps:GAUGE:600:0:125000000000',
    'DS:TOC:GAUGE:600:0:125000000000',
    'DS:OFs:GAUGE:600:0:125000000000',
    'DS:OTs:GAUGE:600:0:125000000000',
    'DS:OdTs:COUNTER:600:0:125000000000',
    'DS:IBSRs:DERIVE:600:0:125000000000',
    'DS:IBSWs:DERIVE:600:0:125000000000',
    'DS:IBOWs:DERIVE:600:0:125000000000',
    'DS:QCs:GAUGE:600:0:125000000000',
    'DS:QCeFy:GAUGE:600:0:125000000000',
    'DS:MaCs:GAUGE:600:0:125000000000',
    'DS:MUCs:GAUGE:600:0:125000000000',
    'DS:ACs:DERIVE:600:0:125000000000',
    'DS:AdCs:DERIVE:600:0:125000000000',
    'DS:TCd:GAUGE:600:0:125000000000',
    'DS:Cs:DERIVE:600:0:125000000000',
    'DS:IBTNx:DERIVE:600:0:125000000000',
    'DS:KRRs:DERIVE:600:0:125000000000',
    'DS:KRs:DERIVE:600:0:125000000000',
    'DS:KWR:DERIVE:600:0:125000000000',
    'DS:KWs:DERIVE:600:0:125000000000',
    'DS:QCQICe:DERIVE:600:0:125000000000',
    'DS:QCHs:DERIVE:600:0:125000000000',
    'DS:QCIs:DERIVE:600:0:125000000000',
    'DS:QCNCd:DERIVE:600:0:125000000000',
    'DS:QCLMPs:DERIVE:600:0:125000000000',
    'DS:CTMPDTs:DERIVE:600:0:125000000000',
    'DS:CTMPTs:DERIVE:600:0:125000000000',
    'DS:CTMPFs:DERIVE:600:0:125000000000',
    'DS:IBIIs:DERIVE:600:0:125000000000',
    'DS:IBIMRd:DERIVE:600:0:125000000000',
    'DS:IBIMs:DERIVE:600:0:125000000000',
    'DS:IBILog:DERIVE:602:0:125000000000',
    'DS:IBISc:DERIVE:602:0:125000000000',
    'DS:IBIFLg:DERIVE:600:0:125000000000',
    'DS:IBFBl:DERIVE:600:0:125000000000',
    'DS:IBIIAo:DERIVE:600:0:125000000000',
    'DS:IBIAd:DERIVE:600:0:125000000000',
    'DS:IBIAe:DERIVE:600:0:125000000000',
    'DS:SFJn:DERIVE:600:0:125000000000',
    'DS:SFRJn:DERIVE:600:0:125000000000',
    'DS:SRe:DERIVE:600:0:125000000000',
    'DS:SRCk:DERIVE:600:0:125000000000',
    'DS:SSn:DERIVE:600:0:125000000000',
    'DS:SQs:DERIVE:600:0:125000000000',
    'DS:BRd:DERIVE:600:0:125000000000',
    'DS:BSt:DERIVE:600:0:125000000000',
    'DS:CDe:DERIVE:600:0:125000000000',
    'DS:CIt:DERIVE:600:0:125000000000',
    'DS:CISt:DERIVE:600:0:125000000000',
    'DS:CLd:DERIVE:600:0:125000000000',
    'DS:CRe:DERIVE:600:0:125000000000',
    'DS:CRSt:DERIVE:600:0:125000000000',
    'DS:CSt:DERIVE:600:0:125000000000',
    'DS:CUe:DERIVE:600:0:125000000000',
    'DS:CUMi:DERIVE:600:0:125000000000'
);

=======
    $mysql = snmp_get($device, '.1.3.6.1.4.1.8072.1.3.2.3.1.2.5.109.121.115.113.108', '-Ovq');
}

update_application($app, $mysql);
echo ' mysql';

// General Stats
$mapping = array(
    'IDBLBSe' => 'cr',
    'IBLFh'   => 'ct',
    'IBLWn'   => 'cu',
    'SRows'   => 'ck',
    'SRange'  => 'cj',
    'SMPs'    => 'ci',
    'SScan'   => 'cl',
    'IBIRd'   => 'ai',
    'IBIWr'   => 'aj',
    'IBILg'   => 'ak',
    'IBIFSc'  => 'ah',
    'IDBRDd'  => 'b2',
    'IDBRId'  => 'b0',
    'IDBRRd'  => 'b3',
    'IDBRUd'  => 'b1',
    'IBRd'    => 'ae',
    'IBCd'    => 'af',
    'IBWr'    => 'ag',
    'TLIe'    => 'b5',
    'TLWd'    => 'b4',
    'IBPse'   => 'aa',
    'IBPDBp'  => 'ac',
    'IBPFe'   => 'ab',
    'IBPMps'  => 'ad',
    'TOC'     => 'bc',
    'OFs'     => 'b7',
    'OTs'     => 'b8',
    'OdTs'    => 'b9',
    'IBSRs'   => 'ay',
    'IBSWs'   => 'ax',
    'IBOWs'   => 'az',
    'QCs'     => 'c1',
    'QCeFy'   => 'bu',
    'MaCs'    => 'bl',
    'MUCs'    => 'bf',
    'ACs'     => 'bd',
    'AdCs'    => 'be',
    'TCd'     => 'bi',
    'Cs'      => 'bn',
    'IBTNx'   => 'a5',
    'KRRs'    => 'a0',
    'KRs'     => 'a1',
    'KWR'     => 'a2',
    'KWs'     => 'a3',
    'QCQICe'  => 'bz',
    'QCHs'    => 'bv',
    'QCIs'    => 'bw',
    'QCNCd'   => 'by',
    'QCLMPs'  => 'bx',
    'CTMPDTs' => 'cn',
    'CTMPTs'  => 'cm',
    'CTMPFs'  => 'co',
    'IBIIs'   => 'au',
    'IBIMRd'  => 'av',
    'IBIMs'   => 'aw',
    'IBILog'  => 'al',
    'IBISc'   => 'am',
    'IBIFLg'  => 'an',
    'IBFBl'   => 'aq',
    'IBIIAo'  => 'ap',
    'IBIAd'   => 'as',
    'IBIAe'   => 'at',
    'SFJn'    => 'cd',
    'SFRJn'   => 'ce',
    'SRe'     => 'cf',
    'SRCk'    => 'cg',
    'SSn'     => 'ch',
    'SQs'     => 'b6',
    'BRd'     => 'cq',
    'BSt'     => 'cp',
    'CDe'     => 'c6',
    'CIt'     => 'c4',
    'CISt'    => 'ca',
    'CLd'     => 'c8',
    'CRe'     => 'c7',
    'CRSt'    => 'cc',
    'CSt'     => 'c5',
    'CUe'     => 'c3',
    'CUMi'    => 'c9',
);

$data = explode("\n", $mysql);

$map = array();
foreach ($data as $str) {
    list($key, $value) = explode(':', $str);
    $map[$key]         = (float) trim($value);
}

$fields = array();
foreach ($mapping as $k => $v) {
    $fields[$k] = (isset($map[$v]) && $map[$v] >= 0) ? $map[$v] : 'U';
}

$rrd_name = array('app', $name, $app_id);
$rrd_def = RrdDefinition::make()
    ->addDataset('IDBLBSe', 'GAUGE', 0, 125000000000)
    ->addDataset('IBLFh', 'DERIVE', 0, 125000000000)
    ->addDataset('IBLWn', 'DERIVE', 0, 125000000000)
    ->addDataset('SRows', 'DERIVE', 0, 125000000000)
    ->addDataset('SRange', 'DERIVE', 0, 125000000000)
    ->addDataset('SMPs', 'DERIVE', 0, 125000000000)
    ->addDataset('SScan', 'DERIVE', 0, 125000000000)
    ->addDataset('IBIRd', 'DERIVE', 0, 125000000000)
    ->addDataset('IBIWr', 'DERIVE', 0, 125000000000)
    ->addDataset('IBILg', 'DERIVE', 0, 125000000000)
    ->addDataset('IBIFSc', 'DERIVE', 0, 125000000000)
    ->addDataset('IDBRDd', 'DERIVE', 0, 125000000000)
    ->addDataset('IDBRId', 'DERIVE', 0, 125000000000)
    ->addDataset('IDBRRd', 'DERIVE', 0, 125000000000)
    ->addDataset('IDBRUd', 'DERIVE', 0, 125000000000)
    ->addDataset('IBRd', 'DERIVE', 0, 125000000000)
    ->addDataset('IBCd', 'DERIVE', 0, 125000000000)
    ->addDataset('IBWr', 'DERIVE', 0, 125000000000)
    ->addDataset('TLIe', 'DERIVE', 0, 125000000000)
    ->addDataset('TLWd', 'DERIVE', 0, 125000000000)
    ->addDataset('IBPse', 'GAUGE', 0, 125000000000)
    ->addDataset('IBPDBp', 'GAUGE', 0, 125000000000)
    ->addDataset('IBPFe', 'GAUGE', 0, 125000000000)
    ->addDataset('IBPMps', 'GAUGE', 0, 125000000000)
    ->addDataset('TOC', 'GAUGE', 0, 125000000000)
    ->addDataset('OFs', 'GAUGE', 0, 125000000000)
    ->addDataset('OTs', 'GAUGE', 0, 125000000000)
    ->addDataset('OdTs', 'COUNTER', 0, 125000000000)
    ->addDataset('IBSRs', 'DERIVE', 0, 125000000000)
    ->addDataset('IBSWs', 'DERIVE', 0, 125000000000)
    ->addDataset('IBOWs', 'DERIVE', 0, 125000000000)
    ->addDataset('QCs', 'GAUGE', 0, 125000000000)
    ->addDataset('QCeFy', 'GAUGE', 0, 125000000000)
    ->addDataset('MaCs', 'GAUGE', 0, 125000000000)
    ->addDataset('MUCs', 'GAUGE', 0, 125000000000)
    ->addDataset('ACs', 'DERIVE', 0, 125000000000)
    ->addDataset('AdCs', 'DERIVE', 0, 125000000000)
    ->addDataset('TCd', 'GAUGE', 0, 125000000000)
    ->addDataset('Cs', 'DERIVE', 0, 125000000000)
    ->addDataset('IBTNx', 'DERIVE', 0, 125000000000)
    ->addDataset('KRRs', 'DERIVE', 0, 125000000000)
    ->addDataset('KRs', 'DERIVE', 0, 125000000000)
    ->addDataset('KWR', 'DERIVE', 0, 125000000000)
    ->addDataset('KWs', 'DERIVE', 0, 125000000000)
    ->addDataset('QCQICe', 'DERIVE', 0, 125000000000)
    ->addDataset('QCHs', 'DERIVE', 0, 125000000000)
    ->addDataset('QCIs', 'DERIVE', 0, 125000000000)
    ->addDataset('QCNCd', 'DERIVE', 0, 125000000000)
    ->addDataset('QCLMPs', 'DERIVE', 0, 125000000000)
    ->addDataset('CTMPDTs', 'DERIVE', 0, 125000000000)
    ->addDataset('CTMPTs', 'DERIVE', 0, 125000000000)
    ->addDataset('CTMPFs', 'DERIVE', 0, 125000000000)
    ->addDataset('IBIIs', 'DERIVE', 0, 125000000000)
    ->addDataset('IBIMRd', 'DERIVE', 0, 125000000000)
    ->addDataset('IBIMs', 'DERIVE', 0, 125000000000)
    ->addDataset('IBILog', 'DERIVE', 0, 125000000000)
    ->addDataset('IBISc', 'DERIVE', 0, 125000000000)
    ->addDataset('IBIFLg', 'DERIVE', 0, 125000000000)
    ->addDataset('IBFBl', 'DERIVE', 0, 125000000000)
    ->addDataset('IBIIAo', 'DERIVE', 0, 125000000000)
    ->addDataset('IBIAd', 'DERIVE', 0, 125000000000)
    ->addDataset('IBIAe', 'DERIVE', 0, 125000000000)
    ->addDataset('SFJn', 'DERIVE', 0, 125000000000)
    ->addDataset('SFRJn', 'DERIVE', 0, 125000000000)
    ->addDataset('SRe', 'DERIVE', 0, 125000000000)
    ->addDataset('SRCk', 'DERIVE', 0, 125000000000)
    ->addDataset('SSn', 'DERIVE', 0, 125000000000)
    ->addDataset('SQs', 'DERIVE', 0, 125000000000)
    ->addDataset('BRd', 'DERIVE', 0, 125000000000)
    ->addDataset('BSt', 'DERIVE', 0, 125000000000)
    ->addDataset('CDe', 'DERIVE', 0, 125000000000)
    ->addDataset('CIt', 'DERIVE', 0, 125000000000)
    ->addDataset('CISt', 'DERIVE', 0, 125000000000)
    ->addDataset('CLd', 'DERIVE', 0, 125000000000)
    ->addDataset('CRe', 'DERIVE', 0, 125000000000)
    ->addDataset('CRSt', 'DERIVE', 0, 125000000000)
    ->addDataset('CSt', 'DERIVE', 0, 125000000000)
    ->addDataset('CUe', 'DERIVE', 0, 125000000000)
    ->addDataset('CUMi', 'DERIVE', 0, 125000000000);

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$tags = compact('name', 'app_id', 'rrd_name', 'rrd_def');
data_update($device, 'app', $tags, $fields);

// Process state statistics
$mapping_status = array(
    'State_closing_tables'       => 'd2',
    'State_copying_to_tmp_table' => 'd3',
    'State_end'                  => 'd4',
    'State_freeing_items'        => 'd5',
    'State_init'                 => 'd6',
    'State_locked'               => 'd7',
    'State_login'                => 'd8',
    'State_preparing'            => 'd9',
    'State_reading_from_net'     => 'da',
    'State_sending_data'         => 'db',
    'State_sorting_result'       => 'dc',
    'State_statistics'           => 'dd',
    'State_updating'             => 'de',
    'State_writing_to_net'       => 'df',
    'State_none'                 => 'dg',
    'State_other'                => 'dh',
);

$rrd_name = array('app', $name, $app_id, 'status');
<<<<<<< HEAD
$rrd_def = array();
unset($fields);
foreach ($mapping_status as $desc => $id) {
    $fields[$desc] = isset($map[$id]) ? $map[$id] : (-1);
    $rrd_def[] = 'DS:'.$id.':GAUGE:600:0:125000000000';
=======
$rrd_def = new RrdDefinition();
unset($fields);
$fields = array();
foreach ($mapping_status as $desc => $id) {
    $fields[$desc] = (isset($map[$id]) && $map[$id] >= 0) ? $map[$id] : 'U';
    $rrd_def->addDataset($id, 'GAUGE', 0, 125000000000);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}
$status = true;
$tags = compact('name', 'app_id', 'status', 'rrd_name', 'rrd_def');
data_update($device, 'app', $tags, $fields);

<?php

$graphs['apache']    = array(
    'bits',
    'hits',
    'scoreboard',
    'cpu',
);

$graphs['drbd']      = array(
    'disk_bits',
    'network_bits',
    'queue',
    'unsynced',
);

$graphs['mysql']     = array(
    'network_traffic',
    'connections',
    'command_counters',
    'select_types',
);

$graphs['memcached'] = array(
    'bits',
    'commands',
    'data',
    'items',
);

$graphs['nginx']     = array(
    'connections',
    'req',
);

<<<<<<< HEAD
=======
$graphs['postfix'] = array(
    'messages',
    'qstats',
    'bytes',
    'sr',
    'deferral',
    'rejects',
);

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$graphs['powerdns-recursor'] = array(
    'questions',
    'answers',
    'cache_performance',
    'outqueries'
);

$graphs['rrdcached'] = array(
    'queue_length',
    'events',
    'tree',
    'journal'
);

$graphs['bind']      = array('queries');

$graphs['tinydns']   = array(
    'queries',
    'errors',
    'dnssec',
    'other',
);

<<<<<<< HEAD
=======
$graphs['postgres'] = array(
    'backends',
    'cr',
    'rows',
    'hr',
    'index',
    'sequential'
);

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$graphs['powerdns'] = array(
    'latency',
    'fail',
    'packetcache',
    'querycache',
    'recursing',
    'queries',
    'queries_udp',
);

$graphs['ntp-client'] = array(
    'stats',
    'freq',
);

$graphs['ntp-server'] = array(
    'stats',
    'freq',
    'stratum',
    'buffer',
    'bits',
    'packets',
    'uptime',
);

$graphs['nfs-v3-stats'] = array(
    'stats',
    'io',
    'fh',
    'rc',
    'ra',
    'net',
    'rpc',
);

<<<<<<< HEAD
$graphs['os-updates'] = array(
    'packages',
);
=======
$graphs['nfs-server'] = array(
    'stats_v2',
    'stats',
    'stats_v4',
    'v4ops',
    'io',
    'fh',
    'rc',
    'ra',
    'net',
    'net_tcp_conns',
    'rpc',
);

$graphs['os-updates'] = array(
    'packages',
);

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$graphs['dhcp-stats'] = array(
     'stats',
);

<<<<<<< HEAD
=======
$graphs['fail2ban'] = array(
    'banned',
);

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
$graphs['freeswitch'] = array(
    'peak',
    'callsIn',
    'callsOut',
);

$graphs['ups-nut'] = array(
    'remaining',
    'load',
    'voltage_battery',
    'charge',
    'voltage_input',
);

$graphs['ups-apcups'] = array(
    'remaining',
    'load',
    'voltage_battery',
    'charge',
    'voltage_input',
);

$graphs['gpsd'] = array(
    'satellites',
    'dop',
    'mode',
);
<<<<<<< HEAD
=======

$graphs['exim-stats'] = array(
    'frozen',
    'queue'
);

$graphs['php-fpm'] = array(
    'stats'
);

$graphs['nvidia'] = array(
    'sm',
    'mem',
    'enc',
    'dec',
    'rxpci',
    'txpci',
    'fb',
    'bar1',
    'mclk',
    'pclk',
    'pwr',
    'temp',
    'pviol',
    'tviol',
    'sbecc',
    'dbecc',
);

$graphs['squid'] = array(
    'memory',
    'clients',
    'cpuusage',
    'objcount',
    'filedescr',
    'httpbw',
    'http',
    'server',
    'serverbw',
    'reqhit',
    'bytehit',
    'sysnumread',
    'pagefaults',
    'cputime',
);

$graphs['opengridscheduler'] = array(
    'ogs'
);

$graphs['fbsd-nfs-server'] = array(
    'stats',
    'cache',
    'gathering',
);

$graphs['fbsd-nfs-client'] = array(
    'stats',
    'cache',
    'rpc',
);

$graphs['unbound'] = array(
    'queries',
    'cache',
);

$graphs['bind']      = array(
    'incoming',
    'outgoing',
    'rr_positive',
    'rr_negative',
    'rtt',
    'resolver_failure',
    'resolver_qrs',
    'resolver_naf',
    'server_received',
    'server_results',
    'server_issues',
    'cache_hm',
    'adb_in',
    'sockets_active',
    'sockets_errors',
);

$graphs['smart'] = array(
    'id5',
    'id10',
    'id173',
    'id183',
    'id184',
    'id187',
    'id188',
    'id190',
    'id194',
    'id196',
    'id197',
    'id198',
    'id199',
    'id231',
    'id233',
);

$graphs['sdfsinfo'] = array(
    'volume',
    'blocks',
    'rates',
);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

print_optionbar_start();

echo "<span style='font-weight: bold;'>Apps</span> &#187; ";

unset($sep);

$link_array = array(
    'page'   => 'device',
    'device' => $device['device_id'],
    'tab'    => 'apps',
);

foreach ($app_list as $app) {
    echo $sep;

<<<<<<< HEAD
    // if (!$vars['app']) { $vars['app'] = $app['app_type']; }
    if ($vars['app'] == $app['app_type']) {
        echo "<span class='pagemenu-selected'>";
        // echo('<img src="images/icons/'.$app['app_type'].'.png" class="optionicon" />');
    } else {
        // echo('<img src="images/icons/greyscale/'.$app['app_type'].'.png" class="optionicon" />');
=======
    if ($vars['app'] == $app['app_type']) {
        echo "<span class='pagemenu-selected'>";
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    }

    echo generate_link(nicecase($app['app_type']), array('page' => 'apps', 'app' => $app['app_type']));
    if ($vars['app'] == $app['app_type']) {
        echo '</span>';
    }

    $sep = ' | ';
}

print_optionbar_end();

if ($vars['app']) {
    if (is_file('pages/apps/'.mres($vars['app']).'.inc.php')) {
        include 'pages/apps/'.mres($vars['app']).'.inc.php';
    } else {
        include 'pages/apps/default.inc.php';
    }
} else {
    include 'pages/apps/overview.inc.php';
}

$pagetitle[] = 'Apps';

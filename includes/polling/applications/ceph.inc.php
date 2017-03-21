<?php

use LibreNMS\RRD\RrdDefinition;

$name = 'ceph';
if (!empty($agent_data['app'][$name])) {
    $app_id = $app['app_id'];

    foreach (explode('<', $agent_data['app'][$name]) as $section) {
        if (empty($section)) {
            continue;
        }
        list($section, $data) = explode('>', $section);

        update_application($app, $section);
        if ($section == "poolstats") {
            $rrd_def = RrdDefinition::make()
                ->addDataset('ops', 'GAUGE', 0)
                ->addDataset('wrbytes', 'GAUGE', 0)
                ->addDataset('rbytes', 'GAUGE', 0);

            foreach (explode("\n", $data) as $line) {
                if (empty($line)) {
                    continue;
                }
                list($pool,$ops,$wrbytes,$rbytes) = explode(':', $line);
                $rrd_name = array('app', $name, $app_id, 'pool', $pool);

                print "Ceph Pool: $pool, IOPS: $ops, Wr bytes: $wrbytes, R bytes: $rbytes\n";
                $fields = array(
                    'ops' => $ops,
                    'wrbytes' => $wrbytes,
                    'rbytes' => $rbytes
                );
                $tags = compact('name', 'app_id', 'pool', 'rrd_name', 'rrd_def');
                data_update($device, 'app', $tags, $fields);
            }
        } elseif ($section == "osdperformance") {
            $rrd_def = RrdDefinition::make()
                ->addDataset('apply_ms', 'GAUGE', 0)
                ->addDataset('commit_ms', 'GAUGE', 0);

            foreach (explode("\n", $data) as $line) {
                if (empty($line)) {
                    continue;
                }
                list($osd,$apply,$commit) = explode(':', $line);
                $rrd_name = array('app', $name, $app_id, 'osd', $osd);

                print "Ceph OSD: $osd, Apply: $apply, Commit: $commit\n";
                $fields = array(
                    'apply_ms' => $apply,
                    'commit_ms' => $commit
                );
                $tags = compact('name', 'app_id', 'osd', 'rrd_name', 'rrd_def');
                data_update($device, 'app', $tags, $fields);
            }
        } elseif ($section == "df") {
            $rrd_def = RrdDefinition::make()
                ->addDataset('avail', 'GAUGE', 0)
                ->addDataset('used', 'GAUGE', 0)
                ->addDataset('objects', 'GAUGE', 0);

            foreach (explode("\n", $data) as $line) {
                if (empty($line)) {
                    continue;
                }
                list($df,$avail,$used,$objects) = explode(':', $line);
                $rrd_name = array('app', $name, $app_id, 'df', $df);

                print "Ceph Pool DF: $pool, Avail: $avail, Used: $used, Objects: $objects\n";
                $fields = array(
                    'avail' => $avail,
                    'used' => $used,
                    'objects' => $objects
                );

                $tags = compact('name', 'app_id', 'df', 'rrd_name', 'rrd_def');
                data_update($device, 'app', $tags, $fields);
            }
        }
    }
}

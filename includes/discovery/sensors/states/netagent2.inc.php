<?php
/**
 * netagent2.inc.php
 *
 * -Description-
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package    LibreNMS
 * @link       http://librenms.org
 * @copyright  2016 Tony Murray
 * @author     Tony Murray <murraytony@gmail.com>
 */

if ($device['os'] == 'netagent2') {
    $ups_status_oid = '.1.3.6.1.4.1.935.1.1.1.4.1.1.0';
    $ups_status = snmp_get($device, $ups_status_oid, '-Oqv');

    if (!empty($ups_status) || $ups_status == 0) {
        // UPS status OID (Value : 0-1 Unknown, 2 On Line, 3 On Battery, 4 On Boost, 5 Sleeping, 6 On Bypass, 7 Rebooting, 8 Standby, 9 On Buck )
        $state_name = 'netagent2upsstatus';
        $state_index_id = create_state_index($state_name);

        if ($state_index_id) {
            $states = array(
                 array($state_index_id,'unknown',0,0,3) ,
                 array($state_index_id,'unknown',0,1,3) ,
                 array($state_index_id,'OnLine',1,2,0) ,
                 array($state_index_id,'OnBattery',1,3,1) ,
                 array($state_index_id,'OnBoost',1,4,0) ,
                 array($state_index_id,'Sleeping',1,4,1) ,
                 array($state_index_id,'OnBypass',1,6,0) ,
                 array($state_index_id,'Rebooting',1,7,1) ,
                 array($state_index_id,'Standby',1,8,0) ,
                 array($state_index_id,'OnBuck',1,9,0)
             );

            foreach ($states as $value) {
                $insert = array(
                'state_index_id' => $value[0],
                'state_descr' => $value[1],
                'state_draw_graph' => $value[2],
                'state_value' => $value[3],
                'state_generic_value' => $value[4]
                );
                dbInsert($insert, 'state_translations');
            }
        }
    
        $index          = 0;
        $limit          = 10;
        $warnlimit      = null;
        $lowlimit       = null;
        $lowwarnlimit   = null;
        $divisor        = 1;
        $status         = $ups_status / $divisor;
        $descr          = 'UPS Status';

        discover_sensor(
            $valid['sensor'],
            'status',
            $device,
            $in_voltage_oid,
            $index,
            $state_name,
            $descr,
            $divisor,
            '1',
            $lowlimit,
            $lowwarnlimit,
            $warnlimit,
            $limit,
            $status
        );
        create_sensor_to_state_index(
            $device,
            $state_name,
            $index
        );
    }
}//end if

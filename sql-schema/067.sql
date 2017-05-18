<<<<<<< HEAD
CREATE TABLE `proxmox` ( `id` int(11) NOT NULL AUTO_INCREMENT, `device_id` int(11) NOT NULL DEFAULT '0', `vmid` int(11) NOT NULL, `cluster` varchar(255) NOT NULL, `description` varchar(255) DEFAULT NULL, `last_seen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`), UNIQUE KEY `cluster_vm` (`cluster`,`vmid`)) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
=======
CREATE TABLE `proxmox` ( `id` int(11) NOT NULL AUTO_INCREMENT, `device_id` int(11) NOT NULL DEFAULT '0', `vmid` int(11) NOT NULL, `cluster` varchar(255) NOT NULL, `description` varchar(255) DEFAULT NULL, `last_seen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`), UNIQUE KEY `cluster_vm` (`cluster`,`vmid`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
CREATE TABLE `proxmox_ports` ( `id` int(11) NOT NULL AUTO_INCREMENT, `vm_id` int(11) NOT NULL, `port` varchar(10) NOT NULL, `last_seen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`), UNIQUE KEY `vm_port` (`vm_id`,`port`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `applications` ADD COLUMN `app_instance` varchar(255) NOT NULL;

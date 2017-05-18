<<<<<<< HEAD
ALTER TABLE  `ipv4_mac` CHANGE  `mac_address`  `mac_address` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , CHANGE  `ipv4_address`  `ipv4_address` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
ALTER TABLE  `ipv4_mac` ADD INDEX (  `port_id`), ADD INDEX (`mac_address` )
ALTER TABLE `ipv4_mac` DROP INDEX `interface_id`, DROP INDEX `interface_id_2`
=======
ALTER TABLE  `ipv4_mac` CHANGE  `mac_address`  `mac_address` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , CHANGE  `ipv4_address`  `ipv4_address` VARCHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE  `ipv4_mac` ADD INDEX (  `port_id`), ADD INDEX (`mac_address` );
ALTER TABLE `ipv4_mac` DROP INDEX `interface_id`, DROP INDEX `interface_id_2`;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

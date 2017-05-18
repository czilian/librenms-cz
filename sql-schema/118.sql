<<<<<<< HEAD
UPDATE dbSchema SET version = 118;
=======
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
ALTER TABLE `eventlog` ADD `device_id` INT NOT NULL AFTER `host` ;
ALTER TABLE `eventlog` ADD INDEX ( `device_id` ) ;
UPDATE eventlog SET device_id=host WHERE device_id=0;

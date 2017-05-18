ALTER TABLE  `munin_plugins` CHANGE  `mplug_type`  `mplug_type` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL;
<<<<<<< HEAD
ALTER TABLE slas ENGINE=InnoDB; 
ALTER TABLE packages ENGINE=InnoDB;
ALTER TABLE munin_plugins_ds ENGINE=InnoDB;
ALTER TABLE munin_plugins ENGINE=InnoDB; 
=======
ALTER TABLE slas ENGINE=InnoDB;
ALTER TABLE packages ENGINE=InnoDB;
ALTER TABLE munin_plugins_ds ENGINE=InnoDB;
ALTER TABLE munin_plugins ENGINE=InnoDB;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
ALTER TABLE loadbalancer_vservers ENGINE=InnoDB;
ALTER TABLE loadbalancer_rservers ENGINE=InnoDB;
ALTER TABLE ipsec_tunnels ENGINE=InnoDB;

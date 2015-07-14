CREATE TABLE IF NOT EXISTS `device_perf` ( `id` int(11) NOT NULL AUTO_INCREMENT, `device_id` int(11) NOT NULL, `timestamp` datetime NOT NULL, `xmt` float NOT NULL, `rcv` float NOT NULL, `loss` float NOT NULL, `min` float NOT NULL, `max` float NOT NULL, `avg` float NOT NULL, KEY `id` (`id`,`device_id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
insert into config (config_name,config_value,config_default,config_descr,config_group,config_group_order,config_sub_group,config_sub_group_order,config_hidden,config_disabled) values ('alert.macros.rule.packet_loss_15m','(%macros.past_15m && %device_perf.loss)','(%macros.past_15m && %device_perf.loss)','Packet loss over the last 15 minutes','alerting',0,'macros',0,1,0);
insert into config (config_name,config_value,config_default,config_descr,config_group,config_group_order,config_sub_group,config_sub_group_order,config_hidden,config_disabled) values ('alert.macros.rule.packet_loss_5m','(%macros.past_5m && %device_perf.loss)','(%macros.past_5m && %device_perf.loss)','Packet loss over the last 5 minutes','alerting',0,'macros',0,1,0);
ALTER TABLE  `devices` ADD  `status_reason` VARCHAR( 50 ) NOT NULL AFTER  `status` ;
UPDATE `devices` SET `status_reason`='down' WHERE `status`=0;

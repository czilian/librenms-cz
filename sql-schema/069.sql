<<<<<<< HEAD
CREATE TABLE `dashboards` ( `dashboard_id` int(11) NOT NULL AUTO_INCREMENT, `user_id` int(11) NOT NULL DEFAULT 0, `dashboard_name` varchar(255) NOT NULL, `access` int(1) NOT NULL DEFAULT 0, PRIMARY KEY (`dashboard_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
=======
CREATE TABLE `dashboards` ( `dashboard_id` int(11) NOT NULL AUTO_INCREMENT, `user_id` int(11) NOT NULL DEFAULT 0, `dashboard_name` varchar(255) NOT NULL, `access` int(1) NOT NULL DEFAULT 0, PRIMARY KEY (`dashboard_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
ALTER TABLE `users_widgets` ADD COLUMN `dashboard_id` int(11) NOT NULL;

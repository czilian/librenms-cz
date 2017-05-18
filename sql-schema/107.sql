<<<<<<< HEAD
UPDATE dbSchema SET version = 107;
CREATE TABLE bill_port_counters_tmp(port_id int NOT NULL PRIMARY KEY, `timestamp` timestamp NOT NULL DEFAULT current_timestamp, in_counter bigint, in_delta bigint NOT NULL DEFAULT 0, out_counter bigint, out_delta bigint NOT NULL DEFAULT 0);
INSERT INTO bill_port_counters_tmp(port_id, timestamp, in_counter, out_counter) SELECT q.port_id, q.max_timestamp, max(i.counter), max(o.counter) FROM (SELECT port_id, MAX(`timestamp`) AS max_timestamp FROM port_in_measurements GROUP BY port_id) q INNER JOIN port_in_measurements i ON q.port_id = i.port_id AND q.max_timestamp = i.timestamp INNER JOIN port_out_measurements o ON q.port_id = o.port_id AND q.max_timestamp = o.timestamp GROUP BY q.port_id, q.max_timestamp;
RENAME TABLE bill_port_counters_tmp TO bill_port_counters;
ALTER TABLE bill_data ADD id int NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST;
DELETE bill_data FROM bill_data INNER JOIN (SELECT bill_id, timestamp, MIN(id) as first_id FROM bill_data GROUP BY bill_id, timestamp HAVING COUNT(id) > 1) q ON bill_data.bill_id = q.bill_id AND bill_data.timestamp = q.timestamp;
ALTER TABLE bill_data DROP id;
ALTER TABLE bill_data ADD PRIMARY KEY (bill_id, timestamp);
ALTER TABLE bill_data DROP INDEX bill_id_2;
DROP TABLE port_in_measurements;
DROP TABLE port_out_measurements;
=======
CREATE TABLE bill_port_counters_tmp(port_id int NOT NULL PRIMARY KEY, `timestamp` timestamp NOT NULL DEFAULT current_timestamp, in_counter bigint, in_delta bigint NOT NULL DEFAULT 0, out_counter bigint, out_delta bigint NOT NULL DEFAULT 0);
INSERT INTO bill_port_counters_tmp(port_id, timestamp, in_counter, out_counter) SELECT q.port_id, q.max_timestamp, max(i.counter), max(o.counter) FROM (SELECT port_id, MAX(`timestamp`) AS max_timestamp FROM port_in_measurements GROUP BY port_id) q INNER JOIN port_in_measurements i ON q.port_id = i.port_id AND q.max_timestamp = i.timestamp INNER JOIN port_out_measurements o ON q.port_id = o.port_id AND q.max_timestamp = o.timestamp GROUP BY q.port_id, q.max_timestamp;
RENAME TABLE bill_port_counters_tmp TO bill_port_counters;
ALTER TABLE bill_data ADD id int NOT NULL PRIMARY KEY AUTO_INCREMENT FIRST;
DELETE bill_data FROM bill_data INNER JOIN (SELECT bill_id, timestamp, MIN(id) as first_id FROM bill_data GROUP BY bill_id, timestamp HAVING COUNT(id) > 1) q ON bill_data.bill_id = q.bill_id AND bill_data.timestamp = q.timestamp;
ALTER TABLE bill_data DROP id;
ALTER TABLE bill_data ADD PRIMARY KEY (bill_id, timestamp);
ALTER TABLE bill_data DROP INDEX bill_id_2;
DROP TABLE port_in_measurements;
DROP TABLE port_out_measurements;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7

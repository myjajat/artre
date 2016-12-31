CREATE TABLE `artreoutgear`.`users` ( `username` VARCHAR(25) NOT NULL , `password` VARCHAR(225) NOT NULL , `sid` TEXT NOT NULL ) ENGINE = MyISAM;
ALTER TABLE `users` ADD `last_login` DATETIME NOT NULL AFTER `password`;
ALTER TABLE `users` ADD PRIMARY KEY(`username`);
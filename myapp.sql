-- tabela do banco de dados (MySQL)
CREATE TABLE IF NOT EXISTS  `users` ( 
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`password` VARCHAR(100) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `email` (`email`)
);


CREATE TABLE IF NOT EXISTS `notes` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`body` VARCHAR(255) NOT NULL,
	`user_id` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);


CREATE TABLE IF NOT EXISTS `feedback` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`body` VARCHAR(255) NOT NULL,
	`user_id` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);




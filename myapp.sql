-- tabela do banco de dados (MySQL)
CREATE TABLE `users` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`password` VARCHAR(100) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `email` (`email`)
);


CREATE TABLE `notes` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`body` VARCHAR(255) NOT NULL,
	`user_id` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);


CREATE TABLE `feedback` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`body` VARCHAR(255) NOT NULL,
	`user_id` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);




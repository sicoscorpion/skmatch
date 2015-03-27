create database if not exists skilzmatch;

use skilzmatch;


DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(128) not NULL,
  `lastName` varchar(128) not NULL,
  `email` varchar(128) UNIQUE NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(30) not NULL,
  `admin` BOOL NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;;

LOCK TABLES `users` WRITE;

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `phone`, `admin` )
VALUES
	(1, 'User', 'Man', 'user@example.com', '$2y$10$ZqDR0j/QhV1iUw10oms9oeVvSi4M.DgjbULB3NuCbCk7Fd.63Pw12', '9029029022', True);

UNLOCK TABLES;
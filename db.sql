-- create database if not exists skilzmatch;

use skilzmatch;


DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `people`;
DROP TABLE IF EXISTS `projects`;
DROP TABLE if exists responses;
DROP TABLE if exists sent_emails;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(128) not NULL,
  `lastName` varchar(128) not NULL,
  `email` varchar(128) UNIQUE NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(30) not NULL,
  `admin` BOOL NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE responses (
  reset_key char(32) NOT NULL,
  user varchar(128) not NULL,
  secret char(60) NOT NULL,
  request_timestamp datetime NOT NULL,
  request_ip varchar(39) NOT NULL,
  email_address char(64) NOT NULL,
  used tinyint(1) NOT NULL DEFAULT '0',
  active tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (reset_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE sent_emails (
  email_address char(64) NOT NULL,
  timestamp datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE people (
  ID int(11) not NULL auto_increment,
  description varchar(10000) not NULL, 
  headline varchar(128) not NULL,
  listed BOOL not NULL,
  approved BOOL not NULL,
  email varchar(128) UNIQUE not NULL,
  people_creation_timestamp bigint(20) not NULL,
  PRIMARY KEY (ID)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE projects (
  ID int(11) not NULL auto_increment,
  description varchar(10000) not NULL, 
  title varchar(128) not NULL,
  approved BOOL not NULL,
  email varchar(128) not NULL,
  project_creation_timestamp bigint(20) not NULL,

  PRIMARY KEY (ID)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- LOCK TABLES `users` WRITE;

-- INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `phone`, `admin` )
-- VALUES
-- 	(1, 'User', 'Man', 'user@example.com', '$2y$10$ZqDR0j/QhV1iUw10oms9oeVvSi4M.DgjbULB3NuCbCk7Fd.63Pw12', '9029029022', True);

-- UNLOCK TABLES;

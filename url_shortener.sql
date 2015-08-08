-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `url`;
CREATE TABLE `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_url` varchar(10) NOT NULL,
  `long_url` text NOT NULL,
  `clicked` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short_url` (`short_url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2015-08-08 16:33:51

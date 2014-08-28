-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               5.5.19 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных dbhelp
CREATE DATABASE IF NOT EXISTS `dbhelp` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbhelp`;


-- Дамп структуры для таблица dbhelp.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbhelp.category: ~1 rows (приблизительно)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `url`) VALUES
	(1, 'Утилиты', '1');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Дамп структуры для таблица dbhelp.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbhelp.comments: ~0 rows (приблизительно)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Дамп структуры для таблица dbhelp.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `url` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbhelp.post: ~2 rows (приблизительно)
DELETE FROM `post`;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `id_user`, `id_category`, `name`, `url`, `text`, `active`, `created`) VALUES
	(20, 1, 1, 'Утилиты name', '1', 'Утилиты текст', 1, '2014-07-17 18:09:39'),
	(22, 1, 1, 'Название поста', '2', 'Текст поста', 1, '2014-07-18 16:28:45');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;


-- Дамп структуры для таблица dbhelp.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(250) NOT NULL,
  `passwd` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы dbhelp.user: ~7 rows (приблизительно)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `login`, `passwd`, `created`) VALUES
	(1, 'dpmurm', '12345678', '2014-08-28 18:07:42'),
	(2, 'user', '123', '2014-08-27 17:30:22'),
	(3, 'user2', '123', '2014-08-27 17:31:50'),
	(4, 'user3', '123', '2014-08-27 17:45:53'),
	(5, 'user4', '123', '2014-08-27 17:50:55'),
	(6, 'user5', '123', '2014-08-27 18:00:28'),
	(7, 'user7', '123', '2014-08-27 18:01:34');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

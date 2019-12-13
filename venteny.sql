-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `cuti`;
CREATE TABLE `cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `status` enum('accept','reject','waiting') NOT NULL DEFAULT 'waiting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`),
  CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `cuti`;
INSERT INTO `cuti` (`id`, `staff_id`, `from`, `to`, `status`, `created_at`, `updated_at`) VALUES
(1,	1,	'2019-10-20',	'2019-10-25',	'reject',	'2019-10-17 04:12:20',	'2019-10-17 06:47:02'),
(2,	4,	'2019-10-21',	'2019-10-23',	'waiting',	'2019-10-17 07:57:59',	'2019-10-17 07:58:34');

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `role`;
INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Administrator',	NULL,	NULL),
(2,	'HR',	NULL,	NULL),
(3,	'Karyawan',	NULL,	NULL);

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` char(15) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(100) NOT NULL,
  `total_cuti` tinyint(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `staff`;
INSERT INTO `staff` (`id`, `role_id`, `name`, `phone`, `email`, `password`, `total_cuti`, `created_at`, `updated_at`) VALUES
(1,	1,	'Administrator',	'08888888',	'admin@admin.com',	'$2y$10$zyvEK3Ti/pzvRPx2odj0KeceSOmCThGOwtjiz.DYGHGmP4n8b1XQC',	10,	NULL,	'2019-10-17 04:11:32'),
(3,	2,	'Ramanda Eka Putra',	'082121212121',	'ramanda@gmail.com',	'$2y$10$xtCWprwU3XP6Wm.xGEcxKu2GwgDiKLemGotO7rKPVHzXuT3BZ3TTy',	0,	'2019-10-17 07:55:29',	'2019-10-17 07:55:47'),
(4,	3,	'Joni',	'08999999',	'example@example.com',	'$2y$10$rbHGqSW.zI1APv3fsOIyfu9nDhtTKx3fpLtLO54KApJEVyeWYKA.y',	5,	'2019-10-17 07:56:34',	'2019-10-17 07:56:45');

-- 2019-10-17 15:13:32

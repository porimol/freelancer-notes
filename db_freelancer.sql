-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2014 at 05:57 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE IF NOT EXISTS `budgets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `budget` decimal(12,2) NOT NULL,
  `started_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`,`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `market_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `market_place` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `market_id` (`market_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `market_id`, `name`, `email`, `skype`, `market_place`, `country`, `created_at`, `updated_at`) VALUES
(12, 7, 'James', 'fgjhs@fgdh.fhfgjhj', 'gfdgdfgd', 'Codecanayon', 'fgdfgdfgfd ', '2014-11-29 12:13:45', '2014-11-29 12:28:16'),
(13, 9, 'sfsdsdfdgdf', 'fgjhd@fgdh.fhfgjhj', 'fdsfdsf', '', 'sfsdfds', '2014-11-29 12:24:54', '2014-11-29 12:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `marketplaces`
--

CREATE TABLE IF NOT EXISTS `marketplaces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'Service',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `marketplaces`
--

INSERT INTO `marketplaces` (`id`, `name`, `url`, `type`, `created_at`, `updated_at`) VALUES
(7, 'Codecanayon', 'http://codecanayon.com', 'Product', '2014-11-29 17:07:33', '2014-11-29 17:07:33'),
(8, 'Elance', 'http://elance.com', 'Services', '2014-11-29 17:11:21', '2014-11-29 17:11:21'),
(9, 'Odesk', 'http://odesk.com', 'Services', '2014-11-29 17:12:12', '2014-11-29 17:12:12'),
(12, 'Fiverr', 'http://fiverr.com', 'Services', '2014-12-03 17:37:38', '2014-12-03 17:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `market_id` int(11) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `project_name` text NOT NULL,
  `budget` decimal(12,2) NOT NULL,
  `started_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `status` varchar(7) NOT NULL DEFAULT 'Running',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `market_id` (`market_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `market_id`, `client_id`, `project_name`, `budget`, `started_date`, `delivery_date`, `status`, `created_at`, `updated_at`) VALUES
(5, 7, 12, 'dsfsfg', 400.00, '2014-10-30', '2014-11-06', 'End', '2014-11-29 12:53:39', '2014-12-01 08:56:49'),
(6, 8, 12, 'dfsfsdf', 945.00, '2014-11-04', '2014-12-10', 'End', '2014-11-29 12:57:34', '2014-12-01 08:56:34'),
(7, 9, 13, 'Project March', 300.00, '2014-03-01', '2014-03-05', 'End', '2014-12-05 05:46:03', '2014-12-05 05:46:03'),
(8, 7, 12, 'Project March2', 1000.00, '2014-03-05', '2014-03-10', 'End', '2014-12-05 05:46:56', '2014-12-05 05:46:56'),
(9, 7, 13, 'Project April', 1000.00, '2014-04-01', '2014-04-30', 'End', '2014-12-05 05:47:38', '2014-12-05 05:47:38'),
(10, 7, 12, 'Project January', 2000.00, '2014-01-10', '2014-01-20', 'End', '2014-12-05 05:51:28', '2014-12-05 05:51:28'),
(11, 7, 12, 'Project February', 950.00, '2014-02-03', '2014-02-24', 'End', '2014-12-05 05:52:46', '2014-12-05 05:52:46'),
(12, 8, 12, 'dfsfsdf', 945.00, '2014-05-03', '2014-05-29', 'End', '2014-11-29 06:57:34', '2014-12-01 02:56:34'),
(13, 9, 13, 'Project March', 300.00, '2014-06-04', '2014-06-26', 'End', '2014-12-04 23:46:03', '2014-12-04 23:46:03'),
(14, 7, 12, 'Project March2', 1000.00, '2014-07-01', '2014-07-30', 'End', '2014-12-04 23:46:56', '2014-12-04 23:46:56'),
(15, 7, 13, 'Project April', 1000.00, '2014-08-08', '2014-08-28', 'End', '2014-12-04 23:47:38', '2014-12-04 23:47:38'),
(16, 7, 12, 'Project January', 1500.00, '2014-09-01', '2014-09-24', 'End', '2014-12-04 23:51:28', '2014-12-04 23:51:28'),
(17, 7, 12, 'Project February', 950.00, '2014-10-15', '2014-10-31', 'End', '2014-12-04 23:52:46', '2014-12-04 23:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '::1', 4, 0, 0, '2014-12-03 11:04:08', '2014-12-02 13:08:24', NULL),
(3, 2, '::1', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` longblob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `picture`, `created_at`, `updated_at`) VALUES
(2, 'user@user.com', '$2y$10$WA8I/VQ2h9VId/e8DdMKxOVTEbdhTXY9CQLPaD.t6JQp.5NhIfZhi', NULL, 1, NULL, NULL, '2014-12-13 10:44:17', '$2y$10$OTS53ogzlKKGP0nk.T49wu/s6F4LdOjTr72Dp/gF/BE1H.qcfNDLO', NULL, 'Porimol', 'Chandro', '', '2014-12-02 13:33:53', '2014-12-13 10:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`market_id`) REFERENCES `marketplaces` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`market_id`) REFERENCES `marketplaces` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

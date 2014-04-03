-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2014 at 10:56 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `signage`
--

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

DROP TABLE IF EXISTS `dates`;
CREATE TABLE IF NOT EXISTS `dates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`id`, `event`, `date`, `time`) VALUES
(1, 'Lorem ipsum', '2013-09-30', '1:00pm'),
(2, 'Lorem ipsum', '2013-10-16', '3:00pm'),
(3, 'Lorem ipsum', '2013-11-20', '8:00am'),
(4, 'Lorem ipsum', '2013-12-04', '9:00pm'),
(5, 'Lorem ipsum', '2013-11-01', '10:00am'),
(6, 'Event Number One', '2015-01-01', '4:00pm'),
(7, 'Event Number Two', '2015-02-01', '6:00pm'),
(8, 'Event Number Three', '2015-02-28', '6:00pm'),
(9, 'Event Number Four', '2015-03-01', '8:30am'),
(10, 'Event Number Five', '2015-04-01', '11:00am'),
(11, 'Event Number Six', '2014-08-04', '4:00pm');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `author`) VALUES
(1, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta dolor vitae iaculis consequat. Integer dapibus volutpat odio a aliquam. Aliquam erat volutpat. Quisque sit amet risus quis metus rutrum tincidunt viverra quis diam. Fusce imperdiet vitae nunc et aliquam.', '2013-09-06 13:21:47', 'Admin'),
(2, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta dolor vitae iaculis consequat. Integer dapibus volutpat odio a aliquam. Aliquam erat volutpat. Quisque sit amet risus quis metus rutrum tincidunt viverra quis diam. Fusce imperdiet vitae nunc et aliquam.', '2013-09-06 13:21:56', 'Admin'),
(3, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta dolor vitae iaculis consequat. Integer dapibus volutpat odio a aliquam. Aliquam erat volutpat. Quisque sit amet risus quis metus rutrum tincidunt viverra quis diam. Fusce imperdiet vitae nunc et aliquam.', '2013-09-06 13:21:59', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting` text COLLATE utf8_bin NOT NULL,
  `value` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting`, `value`) VALUES
(1, 'num_news_posts', '10'),
(2, 'num_events_posts', '5'),
(3, 'refresh_time', '90000'),
(4, 'time_zone', 'Europe/London'),
(5, 'twitter_username', 'fairfaxschool'),
(6, 'twitter_data_id', '367929468054040577'),
(7, 'facebook_pagename', 'fairfaxschool'),
(8, 'feed_channel', 'bbc_news24'),
(9, 'show_help_link', '1'),
(10, 'latest_news_title', 'Latest From The Bulletin'),
(11, 'latest_events_title', 'Upcoming Events'),
(12, 'show_upcoming_event', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'root@localhost');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

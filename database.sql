-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 06, 2013 at 03:24 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `signage`
--

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE `dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`id`, `event`, `date`, `time`) VALUES
(11, 'Lorem ipsum', '2013-09-30', '1:00pm'),
(12, 'Lorem ipsum', '2013-10-16', '3:00pm'),
(13, 'Lorem ipsum', '2013-11-20', '8:00am'),
(14, 'Lorem ipsum', '2013-12-04', '9:00pm'),
(15, 'Lorem ipsum', '2013-11-01', '10:00am');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `author`) VALUES
(19, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta dolor vitae iaculis consequat. Integer dapibus volutpat odio a aliquam. Aliquam erat volutpat. Quisque sit amet risus quis metus rutrum tincidunt viverra quis diam. Fusce imperdiet vitae nunc et aliquam.', '2013-09-06 13:21:47', 'Admin'),
(20, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta dolor vitae iaculis consequat. Integer dapibus volutpat odio a aliquam. Aliquam erat volutpat. Quisque sit amet risus quis metus rutrum tincidunt viverra quis diam. Fusce imperdiet vitae nunc et aliquam.', '2013-09-06 13:21:56', 'Admin'),
(21, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porta dolor vitae iaculis consequat. Integer dapibus volutpat odio a aliquam. Aliquam erat volutpat. Quisque sit amet risus quis metus rutrum tincidunt viverra quis diam. Fusce imperdiet vitae nunc et aliquam.', '2013-09-06 13:21:59', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'root@localhost');

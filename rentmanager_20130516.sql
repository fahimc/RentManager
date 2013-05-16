-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2013 at 06:11 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rentmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `postcode` varchar(150) NOT NULL,
  `rent` int(150) NOT NULL,
  `mortgage` int(150) NOT NULL,
  `other` int(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `user_email`, `name`, `address`, `postcode`, `rent`, `mortgage`, `other`) VALUES
(1, 'fahim.chowdhury@ogilvy.com', 'dfjkhf', 'ljkdffdl', '', 0, 0, 0),
(2, 'fahim.chowdhury@ogilvy.com', 'fdkljfdq', 'lkjdkfdlk', 'kljdfdk', 0, 0, 0),
(3, 'fahim.chowdhury@ogilvy.com', 'dfkljdfl', 'dlkjfdklflkjdkfdlk', 'kljdfdk', 500, 45, 34),
(4, 'fahim.chowdhury@ogilvy.com', 'erere', 'erer', 'erer', 0, 0, 0),
(5, 'fahim.chowdhury@ogilvy.com', 'test', 'dkfjdklfj', 'kldfjdkl', 0, 0, 0),
(6, 'fahim.chowdhury@ogilvy.com', 'fdkljfdq', 'lkjdkfdlk', 'kljdfdk', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(150) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`) VALUES
(12, 'Fahim', 'Chowdhury', 'fahim.chowdhury@ogilvy.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

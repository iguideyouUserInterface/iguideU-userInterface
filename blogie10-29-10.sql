-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2010 at 03:07 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `blogyblogy`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `postid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `entry` longtext NOT NULL,
  `blogdate` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` VALUES(83, 'new post', 'here', '2010-10-29 10:03:31', 14, 'Chicken');
INSERT INTO `blog` VALUES(80, 'new', 'dfgdfg', '2010-10-25 16:06:15', 11, 'Lion');
INSERT INTO `blog` VALUES(75, 'Post ', 'dfgdg', '2010-10-25 13:46:32', 13, 'Snake');
INSERT INTO `blog` VALUES(81, 'dfgfg', 'dfgdfg', '2010-10-25 16:06:46', 14, 'Dog');
INSERT INTO `blog` VALUES(85, 'new post from susan', 'something here', '2010-10-29 10:46:16', 15, 'dog');
INSERT INTO `blog` VALUES(84, 'new post about javascript', 'about cats', '2010-10-29 10:22:52', 14, 'cat');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` longtext NOT NULL,
  `commentdate` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(50) NOT NULL,
  PRIMARY KEY (`idcomment`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` VALUES(200, 'somethiing d about dogs here', '2010-10-29 10:46:40', 15, 85, 'susan', 'ss@gmail.com', 'http://');
INSERT INTO `comment` VALUES(199, 'a cat comment\r\nsdddddddddfdsgfgrthrthghffgbfgbghrghrthrthrthgthrgfrhrthrthtrhrth', '2010-10-29 10:41:33', 14, 84, 'new comment here', 'erik@gmail.com', 'http://');
INSERT INTO `comment` VALUES(198, 'dfgdfgzdfg', '2010-10-27 12:11:47', 14, 82, 'dfgdg', '', 'http://');
INSERT INTO `comment` VALUES(189, 'dfgdfg', '2010-10-25 12:59:46', 11, 72, 'dfgdfg', '', 'http://');
INSERT INTO `comment` VALUES(188, 'tyjghjhgj', '2010-10-25 11:35:40', 13, 70, '', '', 'http://');
INSERT INTO `comment` VALUES(196, 'fyufyufyu', '2010-10-25 16:04:04', 0, 76, '', '', 'http://');
INSERT INTO `comment` VALUES(197, 'sdfsdf', '2010-10-25 16:10:44', 11, 81, 'sdfsdf', 'dsfsdf', 'http://');
INSERT INTO `comment` VALUES(186, 'dfgdf', '2010-10-25 11:14:42', 13, 68, 'dfgdfg', '', 'http://');
INSERT INTO `comment` VALUES(192, 'dgdfgdfgdfsg', '2010-10-25 13:46:45', 13, 75, '', '', 'http://');
INSERT INTO `comment` VALUES(193, 'sdfgdfg', '2010-10-25 15:12:49', 14, 76, 'dfgdfg', '', 'http://');
INSERT INTO `comment` VALUES(195, 'dfgdfg', '2010-10-25 15:32:10', 0, 75, 'fdhdgh', '', 'http://');
INSERT INTO `comment` VALUES(191, 'dfgdfgdfgdfg', '2010-10-25 13:06:48', 12, 73, '', '', 'http://');
INSERT INTO `comment` VALUES(194, 'dfgdfg', '2010-10-25 15:30:37', 0, 75, 'fdhdgh', '', 'http://');
INSERT INTO `comment` VALUES(180, 'hfghfgj', '2010-10-25 10:29:47', 11, 65, 'cvbnc', '', 'http://');
INSERT INTO `comment` VALUES(172, 'new comment', '2010-10-25 09:23:38', 11, 64, 'sus', 'l@gmail.com', 'http://');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `usersalt` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(13, 'Susan Sarabia', 'flaca007@gmail.com', '', '2010-10-25 11:05:19', 'susa', '33b91325e5392024591416412f43e8762ef5b783', '4577822774cc5484ff1685');
INSERT INTO `user` VALUES(12, 'pedro', 'g@gmail.com', '', '2010-10-25 09:32:52', 'pedrito', '40dceaf29c3b3d16363c7d03f051f65fa6bba744', '690230944cc532a4735b5');
INSERT INTO `user` VALUES(11, 'lang', 'l@gmail.com', '', '2010-10-25 09:22:35', 'lang', 'dbc43110de3d07360d326c880c19b9b6ed735702', '13429979874cc5303b659db');
INSERT INTO `user` VALUES(14, 'Erik lang', 'erik@gmail.com', '', '2010-10-25 14:34:29', 'erik', 'de2be2a89a05af5ba32050ada694ee853d62c25c', '20052208994cc57955bb399');
INSERT INTO `user` VALUES(15, 'Susan Sarabia', 's@gmail.com', '', '2010-10-29 10:45:43', 'susan', '1a1f4433072e546e39566c23b26972ef64665f4e', '20902326484cca89b7edf48');

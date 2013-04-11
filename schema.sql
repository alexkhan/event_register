-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: db.docentus.fusionspec.com
-- Generation Time: Apr 09, 2013 at 06:54 PM
-- Server version: 5.1.39
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `docentus`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `regstart` varchar(255) NOT NULL,
  `regend` varchar(255) NOT NULL,
  `docs` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `dates` varchar(255) NOT NULL,
  `options` text NOT NULL,
  `f_first` varchar(1) NOT NULL,
  `f_last` varchar(1) NOT NULL,
  `f_address` varchar(1) NOT NULL,
  `f_city` varchar(1) NOT NULL,
  `f_state` varchar(1) NOT NULL,
  `f_zip` varchar(1) NOT NULL,
  `f_gender` varchar(1) NOT NULL,
  `f_shirtsize` varchar(1) NOT NULL,
  `f_home` varchar(1) NOT NULL,
  `f_cell` varchar(1) NOT NULL,
  `f_email` varchar(1) NOT NULL,
  `f_registrationtype` varchar(1) NOT NULL,
  `f_roommate` varchar(1) NOT NULL,
  `f_school` varchar(1) NOT NULL,
  `f_director_name` varchar(1) NOT NULL,
  `f_director_email` varchar(1) NOT NULL,
  `f_director_home` varchar(1) NOT NULL,
  `f_director_work` varchar(1) NOT NULL,
  `f_director_cell` varchar(1) NOT NULL,
  `f_director_fax` varchar(1) NOT NULL,
  `f_parent_name` varchar(1) NOT NULL,
  `f_parent_address` varchar(1) NOT NULL,
  `f_parent_city` varchar(1) NOT NULL,
  `f_parent_state` varchar(1) NOT NULL,
  `f_parent_zip` varchar(1) NOT NULL,
  `f_parent_home` varchar(1) NOT NULL,
  `f_parent_work` varchar(1) NOT NULL,
  `f_parent_cell` varchar(1) NOT NULL,
  `f_emergency_contact` varchar(1) NOT NULL,
  `f_emergency_contact_phone` varchar(1) NOT NULL,
  `emailtext` text NOT NULL,
  `confirmation` text NOT NULL,
  `email_attachments` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `event` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `shirtsize` varchar(255) NOT NULL,
  `home` varchar(255) NOT NULL,
  `cell` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `registrationtype` varchar(255) NOT NULL,
  `roommate` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `director_name` varchar(255) NOT NULL,
  `director_email` varchar(255) NOT NULL,
  `director_home` varchar(255) NOT NULL,
  `director_work` varchar(255) NOT NULL,
  `director_cell` varchar(255) NOT NULL,
  `director_fax` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `parent_address` varchar(255) NOT NULL,
  `parent_city` varchar(255) NOT NULL,
  `parent_state` varchar(255) NOT NULL,
  `parent_zip` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_home` varchar(255) NOT NULL,
  `parent_work` varchar(255) NOT NULL,
  `parent_cell` varchar(255) NOT NULL,
  `emergency_contact` varchar(255) NOT NULL,
  `emergency_contact_phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;


-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2021 at 09:46 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeecms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cs_countries_summaries_day_data`
--

CREATE TABLE `cs_countries_summaries_day_data` (
  `tracking_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `tracking_day` date NOT NULL,
  `country_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `total_visitor` int(9) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cs_device_summaries_day_data`
--

CREATE TABLE `cs_device_summaries_day_data` (
  `tracking_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `tracking_day` date NOT NULL,
  `device_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `os_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `os_version` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `browser_title` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `browser_version` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `total_visitor` int(9) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cs_referrer_summaries_day_data`
--

CREATE TABLE `cs_referrer_summaries_day_data` (
  `tracking_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `tracking_day` date NOT NULL,
  `referrer_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `total_visitor` int(9) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cs_summaries_day_data`
--

CREATE TABLE `cs_summaries_day_data` (
  `tracking_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `tracking_day` date NOT NULL,
  `page_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `total_visitor` int(9) DEFAULT '0',
  `total_return_visitor` int(9) NOT NULL DEFAULT '0',
  `total_views` int(9) NOT NULL DEFAULT '0',
  `total_view_time` int(9) NOT NULL DEFAULT '0',
  `avg_view_time` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cs_tracking_data`
--

CREATE TABLE `cs_tracking_data` (
  `tracking_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `title` varchar(155) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cs_tracking_data`
--

INSERT INTO `cs_tracking_data` (`tracking_id`, `title`, `user_id`, `status`, `ent_dt`, `upd_dt`) VALUES
('LaitDhGP', 'Default', '11015035', 1, '2021-06-19 09:36:43', '2021-06-19 10:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `cs_visitor_data`
--

CREATE TABLE `cs_visitor_data` (
  `session_id` varchar(80) COLLATE utf8_bin NOT NULL,
  `tracking_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `ip_add` varchar(30) COLLATE utf8_bin NOT NULL,
  `ip_long` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `referrer_url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `referrer_site` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `referrer_type` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'website',
  `live_time` int(9) NOT NULL DEFAULT '0',
  `os_title` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `os_version` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `browser_title` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `browser_version` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `is_mobile` int(1) NOT NULL DEFAULT '0',
  `is_tablet` int(1) NOT NULL DEFAULT '0',
  `is_windows` int(1) NOT NULL DEFAULT '1',
  `is_linux` int(1) NOT NULL DEFAULT '0',
  `is_android` int(1) NOT NULL DEFAULT '0',
  `is_ios` int(1) NOT NULL DEFAULT '0',
  `country_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cs_visitor_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `cs_visitor_page_data`
--

CREATE TABLE `cs_visitor_page_data` (
  `session_id` varchar(80) COLLATE utf8_bin NOT NULL,
  `page_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `live_time` int(9) NOT NULL DEFAULT '0',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cs_visitor_page_data`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cs_countries_summaries_day_data`
--
ALTER TABLE `cs_countries_summaries_day_data`
  ADD KEY `tracking_id` (`tracking_id`),
  ADD KEY `tracking_day` (`tracking_day`),
  ADD KEY `country_name` (`country_name`);

--
-- Indexes for table `cs_device_summaries_day_data`
--
ALTER TABLE `cs_device_summaries_day_data`
  ADD KEY `tracking_id` (`tracking_id`),
  ADD KEY `tracking_day` (`tracking_day`);

--
-- Indexes for table `cs_referrer_summaries_day_data`
--
ALTER TABLE `cs_referrer_summaries_day_data`
  ADD KEY `tracking_id` (`tracking_id`),
  ADD KEY `tracking_day` (`tracking_day`),
  ADD KEY `referrer_url` (`referrer_url`);

--
-- Indexes for table `cs_summaries_day_data`
--
ALTER TABLE `cs_summaries_day_data`
  ADD KEY `tracking_day` (`tracking_day`),
  ADD KEY `tracking_id` (`tracking_id`),
  ADD KEY `page_url` (`page_url`);

--
-- Indexes for table `cs_tracking_data`
--
ALTER TABLE `cs_tracking_data`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tracking_id` (`tracking_id`),
  ADD KEY `status` (`status`),
  ADD KEY `upd_dt` (`upd_dt`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `cs_visitor_data`
--
ALTER TABLE `cs_visitor_data`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `ip_add` (`ip_add`),
  ADD KEY `upd_dt` (`upd_dt`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `referrer_url` (`referrer_url`),
  ADD KEY `ip_long` (`ip_long`),
  ADD KEY `country_name` (`country_name`),
  ADD KEY `tracking_id` (`tracking_id`),
  ADD KEY `os_title` (`os_title`),
  ADD KEY `os_version` (`os_version`),
  ADD KEY `browser_title` (`browser_title`),
  ADD KEY `browser_version` (`browser_version`),
  ADD KEY `referrer_site` (`referrer_site`),
  ADD KEY `is_mobile` (`is_mobile`),
  ADD KEY `is_tablet` (`is_tablet`),
  ADD KEY `is_windows` (`is_windows`),
  ADD KEY `is_android` (`is_android`),
  ADD KEY `is_linux` (`is_linux`),
  ADD KEY `is_ios` (`is_ios`),
  ADD KEY `user_agent` (`user_agent`);

--
-- Indexes for table `cs_visitor_page_data`
--
ALTER TABLE `cs_visitor_page_data`
  ADD KEY `session_id` (`session_id`),
  ADD KEY `page_url` (`page_url`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `upd_dt` (`upd_dt`),
  ADD KEY `live_time` (`live_time`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

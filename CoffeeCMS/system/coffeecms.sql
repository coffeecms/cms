-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2021 at 01:19 PM
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
-- Table structure for table `activities_data`
--

CREATE TABLE `{{prefix}}activities_data` (
  `activity_c` varchar(100) COLLATE utf8_bin NOT NULL,
  `activity_content` varchar(500) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_data`
--

CREATE TABLE `{{prefix}}admin_menu_data` (
  `menu_id` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `parent_menu_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_url` int(1) NOT NULL DEFAULT '0',
  `page_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plugin_name` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'nav-icon fas fa-th',
  `sort_order` int(5) NOT NULL DEFAULT '0',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_menu_data`
--

INSERT INTO `admin_menu_data` (`menu_id`, `parent_menu_id`, `title`, `is_url`, `page_url`, `plugin_name`, `icon_text`, `sort_order`, `ent_dt`, `upd_dt`) VALUES
('1114234', '12945656', 'Activities Logs', 0, 'admin/activities_logs', NULL, 'nav-icon fas fa-tag', 1, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('12185445', '18456234', 'Add new', 0, 'admin/new_post', NULL, 'nav-icon fas fa-tag', 1, '2021-01-31 08:21:17', '2021-01-31 08:21:17'),
('12346754', '12945656', 'Settings', 0, 'admin/setting_general', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('1235232', '18124644', 'Add new', 0, 'admin/new_page', NULL, 'nav-icon fas fa-tag', 1, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('12721213', '13374544', 'Add User', 0, 'admin/new_user', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('12745633', '18456234', 'All Posts', 0, 'admin/posts', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('12745656', '13376756', 'Import', 0, 'admin/import_plugin', NULL, 'nav-icon fas fa-tag', 1, '2021-01-31 13:05:25', '2021-01-31 13:05:25'),
('12748453', '13374544', 'All Users', 0, 'admin/users', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('12945656', NULL, 'Systems', 0, 'admin/settings', NULL, 'nav-icon fas fa-bahai', 10, '2021-01-31 13:05:49', '2021-01-31 13:05:49'),
('13374544', NULL, 'Users', 0, 'admin/users', NULL, 'nav-icon fas fa-user', 5, '2021-01-31 08:26:07', '2021-01-31 08:26:07'),
('13376756', NULL, 'Plugins', 0, 'admin/plugins', NULL, 'nav-icon fas fa-code-branch', 5, '2021-01-31 08:26:07', '2021-01-31 08:26:07'),
('1367345436', NULL, 'Dashboard', 0, 'admin/index', NULL, 'nav-icon fas fa-calendar-alt', 0, '2021-01-31 08:16:27', '2021-01-31 08:16:27'),
('1543666', '18124644', 'All Pages', 0, 'admin/pages', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('1547344', '18435345', 'All Themes', 0, 'admin/themes', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 08:24:30', '2021-01-31 08:24:30'),
('16453644', '18456234', 'Comments', 0, 'admin/comments', NULL, 'nav-icon fas fa-tag', 3, '2021-01-31 08:22:45', '2021-01-31 08:22:45'),
('1746456', '13374544', 'Levels', 0, 'admin/level_user', NULL, 'nav-icon fas fa-tag', 8, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('18124644', NULL, 'Pages', 0, '/', NULL, 'nav-icon fas fa-file', 2, '2021-01-31 08:20:20', '2021-01-31 08:20:20'),
('1834574', '18435345', 'Import', 0, 'admin/import_theme', NULL, 'nav-icon fas fa-tag', 2, '2021-01-31 08:25:35', '2021-01-31 08:25:35'),
('18435345', NULL, 'Themes', 0, 'admin/themes', NULL, 'nav-icon fas fa-palette', 4, '2021-01-31 08:23:51', '2021-01-31 08:23:51'),
('18456234', NULL, 'Posts', 0, '/', NULL, 'nav-icon fas fa-file', 1, '2021-01-31 08:20:20', '2021-01-31 08:20:20'),
('19453644', '18456234', 'Categories', 0, 'admin/categories', NULL, 'nav-icon fas fa-tag', 2, '2021-01-31 08:22:16', '2021-01-31 08:22:16'),
('1945656', '13376756', 'All Plugins', 0, 'admin/plugins', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 08:42:42', '2021-01-31 08:42:42'),
('257484', '13374544', 'Permissions', 0, 'admin/global_permission', NULL, 'nav-icon fas fa-tag', 5, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('2646445', '13374544', 'Groups', 0, 'admin/group_user', NULL, 'nav-icon fas fa-tag', 4, '2021-01-31 08:20:48', '2021-01-31 08:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `cache_data`
--

CREATE TABLE `{{prefix}}cache_data` (
  `cache_id` varchar(26) COLLATE utf8_unicode_ci NOT NULL,
  `cache_key` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `cache_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `plugin_c` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theme_c` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_mst`
--

CREATE TABLE `{{prefix}}category_mst` (
  `category_c` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_category_c` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friendly_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptions` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `views` int(9) NOT NULL DEFAULT '0',
  `sort_order` int(9) NOT NULL DEFAULT '0',
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_mst`
--

INSERT INTO `category_mst` (`category_c`, `title`, `parent_category_c`, `friendly_url`, `thumbnail`, `keywords`, `descriptions`, `status`, `views`, `sort_order`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('1085506720766468534725412638', 'Test 1', '', 'fgh53gy53', '', '', '', 1, 0, 3, '15904', '2021-03-20 13:27:56', '2021-03-20 13:27:56'),
('1396872031436453543997809706', 'sub test 23', '2661709221685467449231414305', 'sub-test-23', 'dgdggfg', '', 'dgdfdg', 1, 0, 5, '15904', '2021-03-20 14:40:35', '2021-03-20 14:40:35'),
('142352353', 'News', NULL, 'news', NULL, 'news', 'News category', 1, 0, 11, '', '2021-03-15 10:37:00', '2021-03-15 10:37:00'),
('1850615299332324517395605443', 'Sub test 1', '1085506720766468534725412638', 'test-test', '', 'wer34234', 'wetwerwe', 1, 0, 2, '15904', '2021-03-20 11:06:50', '2021-03-20 11:06:50'),
('1980279784585445462722621531', 'Test 2 edit', '', 'Test-2-edit', '', 'key 6666', 'No desc 8888999', 1, 0, 2, 'mrtienmi4', '2021-03-20 11:04:33', '2021-05-07 08:57:10'),
('2661709221685467449231414305', 'Sub test 2', '1980279784585445462722621531', 'retrett', '', '', '', 1, 0, 5, '15904', '2021-03-20 13:25:14', '2021-03-20 13:25:14'),
('2805851624299549045643853544', 'sub test 11', '1085506720766468534725412638', 'sub-test-11', '', '', '', 1, 0, 1, '15904', '2021-03-20 14:41:26', '2021-03-20 14:41:26'),
('3335513918620245214657848022', 'Sub sub test 2', '2661709221685467449231414305', 'fgh53gy53', '', '', '', 1, 0, 0, '15904', '2021-03-20 13:27:34', '2021-03-20 13:27:34'),
('3422960608527471745815965978', 'test 78', '', 'test-78', '', 'gfgfg', 'fsdf', 1, 0, 6, '15904', '2021-03-20 11:07:21', '2021-03-20 11:07:21'),
('3468369932514329886640378072', 'fgh53gy53', '', 'fgh53gy53', '', '', '', 1, 0, 8, '15904', '2021-03-20 13:26:41', '2021-03-20 13:26:41'),
('3742937388284611016427174566', '42t43t3t', '', '42t43t3t', '', '', '', 1, 0, 7, '15904', '2021-03-20 13:25:33', '2021-03-20 13:25:33'),
('4668447275552405264582093075', 'fg656y589', '', 'fgh53gy53', '', '', '', 1, 0, 3, '15904', '2021-03-20 13:28:07', '2021-03-20 13:28:07'),
('5090823977378536062212414353', 'sub tet 24', '2661709221685467449231414305', 'sub-tet-24', '', '', '', 1, 0, 5, '15904', '2021-03-20 15:19:33', '2021-03-20 15:19:33'),
('5596899827500', 'Sub test 2 3', '1980279784585445462722621531', 'Sub-test-2-3', '', '', '', 1, 0, 4, '15904', '2021-05-06 09:04:07', '2021-05-06 09:04:07'),
('8543090822586176667993837392', 'test 9', '', 'test-9', '', '', '', 1, 0, 10, '15904', '2021-03-20 15:18:32', '2021-03-20 15:18:32'),
('9322693659645223538865843377', 'test ti wewe', '', 'test-ti-wewe', '', 'key', 'desc', 1, 0, 5, '15904', '2021-03-20 10:50:27', '2021-03-20 10:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `comment_data`
--

CREATE TABLE `{{prefix}}comment_data` (
  `comment_id` varchar(38) COLLATE utf8_unicode_ci NOT NULL,
  `parent_comment_id` varchar(38) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_data`
--

CREATE TABLE `{{prefix}}contact_data` (
  `contact_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci,
  `ent_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cronjob_data`
--

CREATE TABLE `{{prefix}}cronjob_data` (
  `id` int(9) NOT NULL,
  `command_content` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `start_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `minute_val` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '*/60',
  `hour_val` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '*',
  `day_val` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '*',
  `month_val` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '*',
  `weekday_val` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '*',
  `insert_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cronjob_log_data`
--

CREATE TABLE `{{prefix}}cronjob_log_data` (
  `id` int(11) NOT NULL,
  `cronjob_id` int(9) NOT NULL,
  `job_content` varchar(500) COLLATE utf8_bin NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `group_permission_data`
--

CREATE TABLE `{{prefix}}group_permission_data` (
  `group_c` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `permission_c` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_permission_data`
--

INSERT INTO `group_permission_data` (`group_c`, `permission_c`, `user_id`, `ent_dt`) VALUES
('14325464', 'category01', '', '2021-03-28 10:15:54'),
('14325464', 'menu01', '', '2021-03-28 10:15:54'),
('14325464', 'menu02', '', '2021-03-28 10:15:54'),
('14325464', 'menu03', '', '2021-03-28 10:15:54'),
('14325464', 'menu04', '', '2021-03-28 10:15:54'),
('14325464', 'menu05', '', '2021-03-28 10:15:54'),
('14325464', 'menu06', '', '2021-03-28 10:15:54'),
('14325464', 'menu07', '', '2021-03-28 10:15:54'),
('14325464', 'menu08', '', '2021-03-28 10:15:54'),
('14325464', 'menu09', '', '2021-03-28 10:15:54'),
('14325464', 'menu10', '', '2021-03-28 10:15:54'),
('14325464', 'menu11', '', '2021-03-28 10:15:54'),
('14325464', 'post01', '', '2021-03-28 10:15:54'),
('14325464', 'post02', '', '2021-03-28 10:15:54'),
('14325464', 'post03', '', '2021-03-28 10:15:54'),
('14325464', 'post04', '', '2021-03-28 10:15:54'),
('1436435', 'category01', '', '2021-03-28 10:15:54'),
('1436435', 'menu01', '', '2021-03-28 10:15:54'),
('1436435', 'menu02', '', '2021-03-28 10:15:54'),
('1436435', 'menu03', '', '2021-03-28 10:15:54'),
('1436435', 'menu04', '', '2021-03-28 10:15:54'),
('1436435', 'menu05', '', '2021-03-28 10:15:54'),
('1436435', 'menu06', '', '2021-03-28 10:15:54'),
('1436435', 'menu07', '', '2021-03-28 10:15:54'),
('1436435', 'menu08', '', '2021-03-28 10:15:54'),
('1436435', 'menu09', '', '2021-03-28 10:15:54'),
('1436435', 'menu10', '', '2021-03-28 10:15:54'),
('1436435', 'menu11', '', '2021-03-28 10:15:54'),
('1436435', 'post01', '', '2021-03-28 10:15:54'),
('1436435', 'post02', '', '2021-03-28 10:15:54'),
('1436435', 'post03', '', '2021-03-28 10:15:54'),
('1436435', 'post04', '', '2021-03-28 10:15:54'),
('19675465', 'menu01', '', '2021-03-28 10:15:54'),
('19675465', 'menu02', '', '2021-03-28 10:15:54'),
('19675465', 'menu06', '', '2021-03-28 10:15:54'),
('19675465', 'post02', '', '2021-03-28 10:15:54'),
('19675465', 'post03', '', '2021-03-28 10:15:54'),
('19675465', 'post04', '', '2021-03-28 10:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `language_mst`
--

CREATE TABLE `{{prefix}}language_mst` (
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_data`
--

CREATE TABLE `{{prefix}}media_data` (
  `id` varchar(28) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `file_path` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(28) COLLATE utf8_bin DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `media_data`
--

INSERT INTO `media_data` (`id`, `name`, `file_path`, `user_id`, `ent_dt`) VALUES
('437960155639557805858369', '20402_031381225.JPG', '/public/uploads/medias/20402_031381225.JPG', 'Auto', '2021-03-15 16:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `menu_data`
--

CREATE TABLE `{{prefix}}menu_data` (
  `menu_id` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `parent_menu_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_url` int(1) NOT NULL DEFAULT '0',
  `page_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plugin_name` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(5) NOT NULL DEFAULT '0',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_data`
--

CREATE TABLE `{{prefix}}message_data` (
  `message_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `to_user_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `is_guest` int(1) NOT NULL DEFAULT '0',
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci,
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_data`
--

CREATE TABLE `{{prefix}}page_data` (
  `page_c` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `descriptions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '1',
  `views` int(9) NOT NULL DEFAULT '0',
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_data`
--

INSERT INTO `page_data` (`page_c`, `title`, `friendly_url`, `content`, `descriptions`, `keywords`, `page_type`, `status`, `views`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('033935769923', 'tiele page 3', 'tiele_page_3_033935769923', '<p>dsfsdfsdfsdf</p>\n', 'sdgsdfwef', 'efsfsdf,rtert,etre', 'normal', 1, 0, '111321323', '2021-03-27 10:26:46', '2021-03-27 10:26:46'),
('341204905882', 'tiele page 3', 'tiele_page_3_341204905882', '<p>dsfsdfsdfsdf</p>\n', 'sdgsdfwef', 'efsfsdf,rtert,etre', '0', 1, 0, '111321323', '2021-03-27 10:26:25', '2021-03-27 10:26:25'),
('3838579660132', 'tiele page 31111', 'tiele_page_31111_3838579660132', '<p>dsfsdfsdfsdf1111111111</p>\n', 'sdgsdfwef111111', 'efsfsdf,rtert,etre', 'image', 1, 0, 'mrtienmi4', '2021-03-27 10:29:40', '2021-03-27 10:29:40'),
('7073199417401', 'tiele page 3', 'tiele_page_3_7073199417401', '<p>dsfsdfsdfsdf</p>\n', 'sdgsdfwef', 'efsfsdf,rtert,etre', 'normal', 1, 0, '111321323', '2021-03-27 10:29:29', '2021-03-27 10:29:29'),
('9752261429286', 'tiele page 3', 'tiele_page_3_9752261429286', '<p>dsfsdfsdfsdf</p>\n', 'sdgsdfwef', 'efsfsdf,rtert,etre', 'normal', 1, 0, '111321323', '2021-03-27 10:29:22', '2021-03-27 10:29:22'),
('9888314490220', 'tiele page 3', 'tiele_page_3_9888314490220', '<p>dsfsdfsdfsdf</p>\n', 'sdgsdfwef', 'efsfsdf,rtert,etre', 'normal', 1, 0, '111321323', '2021-03-27 10:29:03', '2021-03-27 10:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_mst`
--

CREATE TABLE `{{prefix}}permissions_mst` (
  `permission_c` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions_mst`
--

INSERT INTO `permissions_mst` (`permission_c`, `title`, `status`, `user_id`, `ent_dt`) VALUES
('category01', 'Can manage categories ?', 1, '', '2021-03-28 10:07:14'),
('menu01', 'Can manage pages ?', 1, '15904', '2021-03-27 16:36:56'),
('menu02', 'Can add new page ?', 1, '15904', '2021-03-27 16:37:13'),
('menu03', 'Can manage plugins ?', 1, '15904', '2021-03-27 16:37:27'),
('menu04', 'Can manage themes ?', 1, '15904', '2021-03-27 16:37:38'),
('menu05', 'Can change system setting ?', 1, '15904', '2021-03-27 16:37:52'),
('menu06', 'Can manage post ?', 1, '15904', '2021-03-27 16:38:52'),
('menu07', 'Can manage users ?', 1, '15904', '2021-03-27 16:39:10'),
('menu08', 'Can add new post ?', 1, '15904', '2021-03-27 16:39:55'),
('menu09', 'Can change system theme ?', 1, '15904', '2021-03-27 16:40:18'),
('menu10', 'Can activate plugin ?', 1, '15904', '2021-03-27 16:40:37'),
('menu11', 'Can deactivate plugin ?', 1, '15904', '2021-03-27 16:40:49'),
('post01', 'Can change post status ?', 1, '', '2021-03-28 10:04:52'),
('post02', 'Can delete post ?', 1, '', '2021-03-28 10:05:03'),
('post03', 'Can edit post ?', 1, '', '2021-03-28 10:05:15'),
('post04', 'Can view post ?', 1, '', '2021-03-28 10:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `plugin_hook_data`
--

CREATE TABLE `{{prefix}}plugin_hook_data` (
  `plugin_dir` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `hook_key` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `func_call` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plugin_mst`
--

CREATE TABLE `{{prefix}}plugin_mst` (
  `plugin_dir` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plugin_mst`
--

INSERT INTO `plugin_mst` (`plugin_dir`, `status`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('LiteBBCode', 1, '15923', '2021-04-08 16:49:08', '2021-04-08 16:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `post_cache_data`
--

CREATE TABLE `{{prefix}}post_cache_data` (
  `post_c` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `descriptions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `parent_post_c` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` int(9) NOT NULL DEFAULT '0',
  `category_c` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_data`
--

CREATE TABLE `{{prefix}}post_data` (
  `post_c` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `descriptions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `post_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `parent_post_c` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` int(9) NOT NULL DEFAULT '0',
  `category_c` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_data`
--

INSERT INTO `post_data` (`post_c`, `title`, `friendly_url`, `content`, `descriptions`, `keywords`, `thumbnail`, `tags`, `status`, `post_type`, `parent_post_c`, `views`, `category_c`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('222977529037', 'tset 2', 'tset_2_222977529037', '<p>fdggfh53634543t3t3t</p>\n', 'fwer243523', 'wfwef435435', '', 'gfh,ryutyuty,uioyui434', 1, 'normal', NULL, 0, '1085506720766468534725412638', '111321323', '2021-03-27 09:47:58', '2021-03-27 09:47:58'),
('3324571084994582594596065328', 'test title', 'test-title', '<p>dfsdfsdfsdfsdf</p>\n', 'des vfgf', 'keyfggfh,tyutyu', '', 'tag,tet2,tryty', 1, 'normal', NULL, 0, '1085506720766468534725412638', '111321323', '2021-03-27 09:39:11', '2021-03-27 09:39:11'),
('3690221646542355631382489567', 'tset 2', 'tset-2', '<p>fdggfh53634543t3t3t</p>\n', 'fwer243523', 'wfwef435435', '', 'gfh,ryutyuty,uioyui434', 0, 'normal', NULL, 0, '2805851624299549045643853544', '111321323', '2021-03-27 09:42:47', '2021-03-27 09:42:47'),
('956158837253', 'tset title 899', 'tset_title_899_956158837253', '<p>sdgsdgfsdfsdfsdfsd453454353451111111111111155555555555555</p>\n', 'erwerwe', 'fdgfdgfdg', 'public/uploads/medias/20402_031381225.JPG', 'tset,htrytryr,nghjghj,3454,2232,11111', 1, 'normal', NULL, 0, '1980279784585445462722621531', 'mrtienmi4', '2021-03-27 10:13:05', '2021-03-27 10:13:05'),
('983025617811', 'tset 2', 'tset_2_983025617811', '<p>fdggfh53634543t3t3t</p>\n', 'fwer243523', 'wfwef435435', '', 'gfh,ryutyuty,uioyui434', 0, 'normal', NULL, 0, '1085506720766468534725412638', '111321323', '2021-03-27 09:44:35', '2021-03-27 09:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag_data`
--

CREATE TABLE `{{prefix}}post_tag_data` (
  `post_c` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_tag_data`
--

INSERT INTO `post_tag_data` (`post_c`, `tag`, `ent_dt`) VALUES
('3324571084994582594596065328', 'tag', '2021-03-27 09:39:11'),
('3324571084994582594596065328', 'tet2', '2021-03-27 09:39:11'),
('3324571084994582594596065328', 'tryty', '2021-03-27 09:39:11'),
('222977529037', 'gfh', '2021-03-27 09:47:58'),
('222977529037', 'ryutyuty', '2021-03-27 09:47:58'),
('222977529037', 'uioyui434', '2021-03-27 09:47:59'),
('956158837253', 'tset', '2021-05-08 06:10:14'),
('956158837253', 'htrytryr', '2021-05-08 06:10:14'),
('956158837253', 'nghjghj', '2021-05-08 06:10:14'),
('956158837253', '3454', '2021-05-08 06:10:14'),
('956158837253', '2232', '2021-05-08 06:10:14'),
('956158837253', '11111', '2021-05-08 06:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag_view_data`
--

CREATE TABLE `{{prefix}}post_tag_view_data` (
  `tag` varchar(255) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `post_type_data`
--

CREATE TABLE `{{prefix}}post_type_data` (
  `type_c` varchar(100) COLLATE utf8_bin NOT NULL,
  `title` varchar(155) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `post_type_data`
--

INSERT INTO `post_type_data` (`type_c`, `title`, `ent_dt`) VALUES
('normal', 'Normal', '2021-04-11 15:34:15'),
('page', 'Page', '2021-04-11 15:34:25'),
('image', 'Image', '2021-04-11 15:34:32'),
('video', 'Video', '2021-04-11 15:34:41'),
('fullwidth', 'Full Width', '2021-04-11 15:34:48'),
('news', 'News', '2021-04-11 15:34:57'),
('post', 'Post', '2021-04-11 15:35:03'),
('thread', 'Thread', '2021-04-11 15:35:11'),
('question', 'Question', '2021-04-11 15:35:18'),
('notify', 'Notify', '2021-04-11 15:35:24'),
('movie', 'Movie', '2021-04-11 15:35:32'),
('status', 'Status', '2021-04-11 15:35:38'),
('card', 'Card', '2021-04-11 15:35:43'),
('product', 'Product', '2021-04-11 15:35:49'),
('profile', 'Profile', '2021-04-11 15:35:56'),
('category', 'Category', '2021-04-11 15:37:19'),
('cart', 'Cart', '2021-04-11 15:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `post_view_data`
--

CREATE TABLE `{{prefix}}post_view_data` (
  `post_c` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friendly_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_add` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_data`
--

CREATE TABLE `{{prefix}}setting_data` (
  `key_c` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key_value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting_data`
--

INSERT INTO `setting_data` (`key_c`, `title`, `key_value`, `status`) VALUES
('allow_comment', 'Allow Comments', 'yes', 1),
('default_adminpage_url', 'Default Adminpage Url', '', 1),
('default_member_banned_groupid', 'default_member_banned_groupid', '14763454', 1),
('default_member_groupid', 'default_member_groupid', '1436435', 1),
('default_page', 'Default Page', '', 1),
('default_theme', 'Default Theme', 'basic', 1),
('enable_rss', 'Enable RSS Feed', 'yes', 1),
('enable_sitemap', 'Enable Sitemap', 'yes', 1),
('frontend_lang', 'Frontend Language', 'en', 1),
('is_construction', 'Is Construction', 'no', 1),
('register_user_status', 'register_user_status', 'no', 1),
('register_verify_email', 'register_verify_email', 'no', 1),
('require_login_if_is_guest', 'Require login if is guest', '1', 1),
('site_description', 'Descriptions', 'Site descriptions', 1),
('site_keywords', 'Site Keywords', 'key1,key2', 1),
('site_title', 'Title', 'Coffee CMS Site', 1),
('system_admin_lang', 'Administrator Language', 'en', 1),
('system_setting_cache', 'System Setting Cached', 'no', 1),
('system_status', 'system_status', 'working', 1),
('website_view_cache', 'Website View Cache', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shortcode_data`
--

CREATE TABLE `{{prefix}}shortcode_data` (
  `name` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'plugin',
  `dirname` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `theme_hook_data`
--

CREATE TABLE `{{prefix}}theme_hook_data` (
  `theme_dir` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `hook_key` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `func_call` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme_mst`
--

CREATE TABLE `{{prefix}}theme_mst` (
  `theme_dir` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_api_key_data`
--

CREATE TABLE `{{prefix}}user_api_key_data` (
  `user_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `api_key` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insert_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_api_key_permission_data`
--

CREATE TABLE `{{prefix}}user_api_key_permission_data` (
  `api_key` varchar(255) COLLATE utf8_bin NOT NULL,
  `permission_c` varchar(155) COLLATE utf8_bin NOT NULL,
  `insert_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_api_key_permission_mst`
--

CREATE TABLE `{{prefix}}user_api_key_permission_mst` (
  `permission_c` varchar(155) COLLATE utf8_bin NOT NULL,
  `permission_nm` varchar(255) COLLATE utf8_bin NOT NULL,
  `insert_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_group_mst`
--

CREATE TABLE `{{prefix}}user_group_mst` (
  `group_c` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` varchar(28) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_group_mst`
--

INSERT INTO `user_group_mst` (`group_c`, `title`, `status`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('14325464', 'Administrator', 1, '15904', '2021-03-28 10:01:17', '2021-03-28 10:01:17'),
('1436435', 'Users', 1, NULL, '2021-03-28 10:01:25', '2021-03-28 10:01:25'),
('14763454', 'Banned Users', 1, NULL, '2021-03-28 10:01:53', '2021-03-28 10:01:53'),
('18765475', 'Pending activation users', 1, NULL, '2021-03-28 10:02:14', '2021-03-28 10:02:14'),
('19675465', 'Writers', 1, NULL, '2021-03-28 10:02:39', '2021-03-28 10:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_level_mst`
--

CREATE TABLE `{{prefix}}user_level_mst` (
  `level_id` varchar(30) COLLATE utf8_bin NOT NULL,
  `title` varchar(155) COLLATE utf8_bin NOT NULL,
  `title_left_string` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `title_right_string` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_level_mst`
--

INSERT INTO `user_level_mst` (`level_id`, `title`, `title_left_string`, `title_right_string`, `status`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('122121324', 'Ultimate', NULL, NULL, 1, '', '2021-03-28 13:38:05', '2021-03-28 13:38:05'),
('12423423', 'Professional', NULL, NULL, 1, '', '2021-03-28 13:37:30', '2021-03-28 13:37:30'),
('16343435', 'Beginner', NULL, NULL, 1, '', '2021-03-28 13:35:20', '2021-03-28 13:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_mst`
--

CREATE TABLE `{{prefix}}user_mst` (
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify_c` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_c` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_c` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_mst`
--

INSERT INTO `user_mst` (`user_id`, `username`, `password`, `email`, `fullname`, `avatar`, `verify_c`, `group_c`, `level_c`, `status`, `ent_dt`, `upd_dt`) VALUES
('111321323', 'admin', 'demo123', 'admin@gmail.com', NULL, NULL, NULL, '14325464', '122121324', 1, '2021-05-06 16:40:54', '2021-05-06 16:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_online_data`
--

CREATE TABLE `{{prefix}}user_online_data` (
  `user_id` varchar(28) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_add` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities_data`
--
ALTER TABLE `{{prefix}}activities_data`
  ADD KEY `ix1` (`activity_c`),
  ADD KEY `ix2` (`user_id`),
  ADD KEY `ix3` (`ent_dt`);

--
-- Indexes for table `admin_menu_data`
--
ALTER TABLE `{{prefix}}admin_menu_data`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `parent_menu_id` (`parent_menu_id`),
  ADD KEY `title` (`title`),
  ADD KEY `plugin_name` (`plugin_name`),
  ADD KEY `is_url` (`is_url`);

--
-- Indexes for table `cache_data`
--
ALTER TABLE `{{prefix}}cache_data`
  ADD KEY `ix1` (`cache_id`),
  ADD KEY `ix2` (`cache_key`),
  ADD KEY `ix3` (`ent_dt`),
  ADD KEY `ix4` (`plugin_c`),
  ADD KEY `ix5` (`theme_c`);

--
-- Indexes for table `category_mst`
--
ALTER TABLE `{{prefix}}category_mst`
  ADD PRIMARY KEY (`category_c`),
  ADD KEY `ix1` (`category_c`),
  ADD KEY `ix2` (`title`),
  ADD KEY `ix3` (`friendly_url`),
  ADD KEY `ix4` (`status`);

--
-- Indexes for table `comment_data`
--
ALTER TABLE `{{prefix}}comment_data`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `ix1` (`comment_id`),
  ADD KEY `ix2` (`post_id`),
  ADD KEY `ix4` (`owner_id`),
  ADD KEY `ix6` (`ent_dt`),
  ADD KEY `ix7` (`parent_comment_id`);

--
-- Indexes for table `contact_data`
--
ALTER TABLE `{{prefix}}contact_data`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `ix1` (`ip`),
  ADD KEY `ix2` (`contact_id`),
  ADD KEY `ix3` (`user_agent`),
  ADD KEY `ix5` (`ent_dt`);

--
-- Indexes for table `cronjob_data`
--
ALTER TABLE `{{prefix}}cronjob_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `start_time` (`start_time`),
  ADD KEY `end_time` (`end_time`),
  ADD KEY `insert_id` (`insert_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `minute_val` (`minute_val`),
  ADD KEY `hour_val` (`hour_val`),
  ADD KEY `day_val` (`day_val`),
  ADD KEY `month_val` (`month_val`),
  ADD KEY `weekday_val` (`weekday_val`);

--
-- Indexes for table `cronjob_log_data`
--
ALTER TABLE `{{prefix}}cronjob_log_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cronjob_id` (`cronjob_id`),
  ADD KEY `status` (`status`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `group_permission_data`
--
ALTER TABLE `{{prefix}}group_permission_data`
  ADD PRIMARY KEY (`group_c`,`permission_c`),
  ADD KEY `ix1` (`group_c`),
  ADD KEY `ix2` (`permission_c`);

--
-- Indexes for table `language_mst`
--
ALTER TABLE `{{prefix}}language_mst`
  ADD PRIMARY KEY (`code`),
  ADD KEY `code` (`code`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `media_data`
--
ALTER TABLE `{{prefix}}media_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix1` (`id`),
  ADD KEY `name` (`file_path`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `name_2` (`name`);

--
-- Indexes for table `menu_data`
--
ALTER TABLE `{{prefix}}menu_data`
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `parent_menu_id` (`parent_menu_id`),
  ADD KEY `title` (`title`),
  ADD KEY `plugin_name` (`plugin_name`),
  ADD KEY `is_url` (`is_url`);

--
-- Indexes for table `message_data`
--
ALTER TABLE `{{prefix}}message_data`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `ix1` (`is_guest`),
  ADD KEY `ix2` (`subject`),
  ADD KEY `ix4` (`ent_dt`),
  ADD KEY `ix5` (`to_user_id`),
  ADD KEY `ix6` (`message_id`),
  ADD KEY `user_id` (`user_id`);
ALTER TABLE `{{prefix}}message_data` ADD FULLTEXT KEY `fl1` (`content`);

--
-- Indexes for table `page_data`
--
ALTER TABLE `{{prefix}}page_data`
  ADD PRIMARY KEY (`page_c`),
  ADD KEY `ix1` (`page_c`),
  ADD KEY `ix2` (`title`),
  ADD KEY `ix3` (`friendly_url`),
  ADD KEY `ix7` (`status`),
  ADD KEY `ox10` (`ent_dt`),
  ADD KEY `ic2` (`page_type`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `views` (`views`);

--
-- Indexes for table `permissions_mst`
--
ALTER TABLE `{{prefix}}permissions_mst`
  ADD PRIMARY KEY (`permission_c`),
  ADD KEY `ix1` (`permission_c`),
  ADD KEY `ix2` (`status`),
  ADD KEY `title` (`title`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `plugin_hook_data`
--
ALTER TABLE `{{prefix}}plugin_hook_data`
  ADD KEY `ix1` (`plugin_dir`),
  ADD KEY `ix2` (`hook_key`),
  ADD KEY `ix3` (`status`);

--
-- Indexes for table `plugin_mst`
--
ALTER TABLE `{{prefix}}plugin_mst`
  ADD KEY `ix1` (`plugin_dir`),
  ADD KEY `ix2` (`status`);

--
-- Indexes for table `post_cache_data`
--
ALTER TABLE `{{prefix}}post_cache_data`
  ADD KEY `ix1` (`post_c`),
  ADD KEY `ix2` (`title`),
  ADD KEY `ix3` (`friendly_url`),
  ADD KEY `ix6` (`tags`),
  ADD KEY `ix7` (`status`),
  ADD KEY `ix9` (`parent_post_c`),
  ADD KEY `ox10` (`ent_dt`),
  ADD KEY `ix11` (`category_c`);

--
-- Indexes for table `post_data`
--
ALTER TABLE `{{prefix}}post_data`
  ADD PRIMARY KEY (`post_c`),
  ADD KEY `ix1` (`post_c`),
  ADD KEY `ix2` (`title`),
  ADD KEY `ix3` (`friendly_url`),
  ADD KEY `ix6` (`tags`),
  ADD KEY `ix7` (`status`),
  ADD KEY `ix9` (`parent_post_c`),
  ADD KEY `ox10` (`ent_dt`),
  ADD KEY `ix11` (`category_c`),
  ADD KEY `post_type` (`post_type`),
  ADD KEY `views` (`views`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_tag_data`
--
ALTER TABLE `{{prefix}}post_tag_data`
  ADD KEY `ix1` (`post_c`),
  ADD KEY `ix2` (`tag`);

--
-- Indexes for table `post_tag_view_data`
--
ALTER TABLE `{{prefix}}post_tag_view_data`
  ADD KEY `ix1` (`tag`),
  ADD KEY `ix2` (`ent_dt`);

--
-- Indexes for table `post_type_data`
--
ALTER TABLE `{{prefix}}post_type_data`
  ADD KEY `ix1` (`type_c`),
  ADD KEY `ix2` (`ent_dt`);

--
-- Indexes for table `post_view_data`
--
ALTER TABLE `{{prefix}}post_view_data`
  ADD KEY `ix1` (`post_c`),
  ADD KEY `ix2` (`friendly_url`),
  ADD KEY `ix3` (`user_agent`),
  ADD KEY `ix4` (`ip_add`),
  ADD KEY `ix5` (`ent_dt`);

--
-- Indexes for table `setting_data`
--
ALTER TABLE `{{prefix}}setting_data`
  ADD PRIMARY KEY (`key_c`),
  ADD KEY `ix1` (`key_c`),
  ADD KEY `ix2` (`title`);

--
-- Indexes for table `shortcode_data`
--
ALTER TABLE `{{prefix}}shortcode_data`
  ADD KEY `ix1` (`name`),
  ADD KEY `ix2` (`type`),
  ADD KEY `ix3` (`dirname`);

--
-- Indexes for table `theme_hook_data`
--
ALTER TABLE `{{prefix}}theme_hook_data`
  ADD KEY `ix1` (`theme_dir`),
  ADD KEY `ix2` (`hook_key`),
  ADD KEY `ix3` (`status`);

--
-- Indexes for table `theme_mst`
--
ALTER TABLE `{{prefix}}theme_mst`
  ADD KEY `ix1` (`theme_dir`),
  ADD KEY `ix2` (`status`);

--
-- Indexes for table `user_api_key_data`
--
ALTER TABLE `{{prefix}}user_api_key_data`
  ADD PRIMARY KEY (`api_key`),
  ADD KEY `ix1` (`user_id`),
  ADD KEY `ix2` (`status`),
  ADD KEY `ix3` (`start_date`),
  ADD KEY `ix4` (`end_date`),
  ADD KEY `ix5` (`ent_dt`),
  ADD KEY `ix6` (`upd_dt`),
  ADD KEY `ix7` (`insert_id`),
  ADD KEY `api_key` (`api_key`);

--
-- Indexes for table `user_api_key_permission_data`
--
ALTER TABLE `{{prefix}}user_api_key_permission_data`
  ADD KEY `ix1` (`api_key`),
  ADD KEY `ix2` (`permission_c`),
  ADD KEY `ix3` (`insert_id`);

--
-- Indexes for table `user_api_key_permission_mst`
--
ALTER TABLE `{{prefix}}user_api_key_permission_mst`
  ADD PRIMARY KEY (`permission_c`),
  ADD KEY `ix1` (`permission_nm`),
  ADD KEY `ix2` (`insert_id`),
  ADD KEY `ix4` (`ent_dt`),
  ADD KEY `permission_c` (`permission_c`);

--
-- Indexes for table `user_group_mst`
--
ALTER TABLE `{{prefix}}user_group_mst`
  ADD PRIMARY KEY (`group_c`),
  ADD KEY `group_c` (`group_c`),
  ADD KEY `title` (`title`),
  ADD KEY `status` (`status`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_level_mst`
--
ALTER TABLE `{{prefix}}user_level_mst`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `title` (`title`),
  ADD KEY `status` (`status`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `upd_dt` (`upd_dt`);

--
-- Indexes for table `user_mst`
--
ALTER TABLE `{{prefix}}user_mst`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `ix1` (`user_id`),
  ADD KEY `ix2` (`username`),
  ADD KEY `ix3` (`email`),
  ADD KEY `ix4` (`group_c`),
  ADD KEY `ix5` (`ent_dt`),
  ADD KEY `status` (`status`),
  ADD KEY `verify_c` (`verify_c`),
  ADD KEY `upd_dt` (`upd_dt`),
  ADD KEY `password` (`password`),
  ADD KEY `level_c` (`level_c`);

--
-- Indexes for table `user_online_data`
--
ALTER TABLE `{{prefix}}user_online_data`
  ADD KEY `ix1` (`ent_dt`),
  ADD KEY `ix2` (`username`),
  ADD KEY `ix3` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cronjob_data`
--
ALTER TABLE `{{prefix}}cronjob_data`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cronjob_log_data`
--
ALTER TABLE `{{prefix}}cronjob_log_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

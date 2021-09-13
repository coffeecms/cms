-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 01, 2021 at 07:25 AM
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

DROP TABLE IF EXISTS `activities_data`;
CREATE TABLE `activities_data` (
  `activity_c` varchar(100) COLLATE utf8_bin NOT NULL,
  `activity_content` varchar(500) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_data`
--

DROP TABLE IF EXISTS `admin_menu_data`;
CREATE TABLE `admin_menu_data` (
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
('11011011', NULL, 'Dashboard', 0, 'admin/dashboard', NULL, 'nav-icon fas fa-calendar-alt', 0, '2021-01-31 08:16:27', '2021-01-31 08:16:27'),
('11011012', NULL, 'Posts', 0, '/', NULL, 'nav-icon fas fa-file', 1, '2021-01-31 08:20:20', '2021-01-31 08:20:20'),
('11011013', NULL, 'Pages', 0, '/', NULL, 'nav-icon fas fa-file', 2, '2021-01-31 08:20:20', '2021-01-31 08:20:20'),
('11011014', NULL, 'Projects', 0, 'admin/projects', NULL, 'nav-icon fas fa-file', 15, '2021-01-31 08:20:20', '2021-01-31 08:20:20'),
('11011015', NULL, 'Themes', 0, 'admin/themes', NULL, 'nav-icon fas fa-palette', 17, '2021-01-31 08:23:51', '2021-01-31 08:23:51'),
('11011016', NULL, 'Users', 0, 'admin/users', NULL, 'nav-icon fas fa-user', 18, '2021-01-31 08:26:07', '2021-01-31 08:26:07'),
('11011017', NULL, 'Plugins', 0, 'admin/plugins', NULL, 'nav-icon fas fa-code-branch', 19, '2021-01-31 08:26:07', '2021-01-31 08:26:07'),
('11011018', NULL, 'Systems', 0, 'admin/settings', NULL, 'nav-icon fas fa-bahai', 20, '2021-01-31 13:05:49', '2021-01-31 13:05:49'),
('11015011', '11011012', 'Add new', 0, 'admin/new_post', NULL, 'nav-icon fas fa-tag', 3, '2021-01-31 08:21:17', '2021-01-31 08:21:17'),
('11015012', '11011018', 'Settings', 0, 'admin/setting_general', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('11015013', '11011013', 'Add new', 0, 'admin/new_page', NULL, 'nav-icon fas fa-tag', 1, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('11015014', '11011012', 'All Posts', 0, 'admin/posts', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('11015015', '11011016', 'All Users', 0, 'admin/users', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('11015016', '11011013', 'All Pages', 0, 'admin/pages', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('11015017', '11011015', 'All Themes', 0, 'admin/themes', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 08:24:30', '2021-01-31 08:24:30'),
('11015018', '11011012', 'Comments', 0, 'admin/comments', NULL, 'nav-icon fas fa-tag', 5, '2021-01-31 08:22:45', '2021-01-31 08:22:45'),
('11015019', '11011016', 'Levels', 0, 'admin/level_user', NULL, 'nav-icon fas fa-tag', 8, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('11015020', '11011015', 'Menu', 0, 'admin/edit_menu', NULL, 'nav-icon fas fa-tag', 2, '2021-01-31 08:25:35', '2021-01-31 08:25:35'),
('11015021', '11011018', 'Email Templates', 0, 'admin/email_templates', NULL, 'nav-icon fas fa-tag', 5, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('11015022', '11011012', 'Categories', 0, 'admin/categories', NULL, 'nav-icon fas fa-tag', 4, '2021-01-31 08:22:16', '2021-01-31 08:22:16'),
('11015023', '11011017', 'All Plugins', 0, 'admin/plugins', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 08:42:42', '2021-01-31 08:42:42'),
('11015024', '11011014', 'All Projects', 0, 'admin/projects', NULL, 'nav-icon fas fa-tag', 1, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('11015025', '11011016', 'Permissions', 0, 'admin/global_permission', NULL, 'nav-icon fas fa-tag', 5, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('11015026', '11011016', 'Groups', 0, 'admin/group_user', NULL, 'nav-icon fas fa-tag', 4, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('11015027', NULL, 'Email Marketings', 0, '', NULL, 'nav-icon fas fa-inbox', 30, '2021-01-31 08:26:07', '2021-01-31 08:26:07'),
('11015028', '11015027', 'Groups', 0, 'admin/email_marketing_group', NULL, 'nav-icon fas fa-tag', 4, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('11015029', '11015027', 'Email List', 0, 'admin/email_marketing_emaillist', NULL, 'nav-icon fas fa-tag', 5, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('11015030', '11015027', 'Send', 0, 'admin/email_marketing_send', NULL, 'nav-icon fas fa-tag', 1, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('11015031', '11015027', 'Send Histories', 0, 'admin/email_marketing_histories', NULL, 'nav-icon fas fa-tag', 6, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('11015032', '11015027', 'UnSubscrible List', 0, 'admin/email_marketing_unsubscrible', NULL, 'nav-icon fas fa-tag', 7, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('11015034', '11015027', 'Dashboard', 0, 'admin/email_marketing_dashboard', NULL, 'nav-icon fas fa-tag', 0, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('11015035', '11015027', 'Job List', 0, 'admin/email_marketing_jobs', NULL, 'nav-icon fas fa-tag', 2, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('11015123', '11011017', 'Import', 0, 'admin/import_plugin', NULL, 'nav-icon fas fa-tag', 2, '2021-01-31 08:42:42', '2021-01-31 08:42:42'),
('11015424', '11011014', 'All Tasks', 0, 'admin/projects_task', NULL, 'nav-icon fas fa-tag', 2, '2021-01-31 08:20:48', '2021-01-31 08:20:48'),
('11016117', '11011015', 'Import', 0, 'admin/import_theme', NULL, 'nav-icon fas fa-tag', 5, '2021-01-31 08:24:30', '2021-01-31 08:24:30'),
('11017021', '11011018', 'Activities', 0, 'admin/activities_logs', NULL, 'nav-icon fas fa-tag', 6, '2021-01-31 13:07:22', '2021-01-31 13:07:22'),
('11017121', '11011018', 'Short Urls', 0, 'admin/short_urls', NULL, 'nav-icon fas fa-tag', 8, '2021-01-31 13:07:22', '2021-01-31 13:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `cache_data`
--

DROP TABLE IF EXISTS `cache_data`;
CREATE TABLE `cache_data` (
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
-- Table structure for table `calendar_data`
--

DROP TABLE IF EXISTS `calendar_data`;
CREATE TABLE `calendar_data` (
  `calendar_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `title` varchar(500) COLLATE utf8_bin NOT NULL,
  `start_dt` datetime NOT NULL,
  `end_dt` datetime NOT NULL,
  `all_day` int(1) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_bin,
  `color_c` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `calendar_data`
--

INSERT INTO `calendar_data` (`calendar_id`, `title`, `start_dt`, `end_dt`, `all_day`, `comment`, `color_c`, `status`, `ent_dt`, `upd_dt`) VALUES
('8855744123794432624752345', 'test test', '2021-07-08 09:00:00', '2021-07-08 10:00:00', 0, NULL, '#5DB7D1', 0, '2021-07-08 16:09:31', '2021-07-08 16:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_group`
--

DROP TABLE IF EXISTS `calendar_group`;
CREATE TABLE `calendar_group` (
  `group_c` varchar(8) COLLATE utf8_bin NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `content` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `color_c` varchar(20) COLLATE utf8_bin NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `category_mst`
--

DROP TABLE IF EXISTS `category_mst`;
CREATE TABLE `category_mst` (
  `category_c` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_category_c` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friendly_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptions` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contents` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
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

INSERT INTO `category_mst` (`category_c`, `title`, `parent_category_c`, `friendly_url`, `thumbnail`, `keywords`, `descriptions`, `contents`, `status`, `views`, `sort_order`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('9844612265587', 'Non Title', '', 'Non-Title', '', 'Non Title', 'Non Title', NULL, 1, 0, 0, '', '2021-06-05 09:36:23', '2021-06-05 09:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `comment_data`
--

DROP TABLE IF EXISTS `comment_data`;
CREATE TABLE `comment_data` (
  `comment_id` varchar(38) COLLATE utf8_unicode_ci NOT NULL,
  `parent_comment_id` varchar(38) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` varchar(28) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `user_id` varchar(28) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_data`
--

INSERT INTO `comment_data` (`comment_id`, `parent_comment_id`, `post_id`, `owner_id`, `content`, `status`, `user_id`, `ent_dt`) VALUES
('1423234', NULL, '222977529037', '', 'test comment 1', 1, NULL, '2021-05-16 05:57:23'),
('16657657', NULL, '3324571084994582594596065328', NULL, 'test comment 2', 1, NULL, '2021-05-16 06:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact_data`
--

DROP TABLE IF EXISTS `contact_data`;
CREATE TABLE `contact_data` (
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

DROP TABLE IF EXISTS `cronjob_data`;
CREATE TABLE `cronjob_data` (
  `id` int(9) NOT NULL,
  `command_content` varchar(255) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cronjob_log_data`
--

DROP TABLE IF EXISTS `cronjob_log_data`;
CREATE TABLE `cronjob_log_data` (
  `id` int(11) NOT NULL,
  `job_content` varchar(500) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `emailmarketing_email_data`
--

DROP TABLE IF EXISTS `emailmarketing_email_data`;
CREATE TABLE `emailmarketing_email_data` (
  `id` int(9) NOT NULL,
  `email` varchar(155) COLLATE utf8_bin NOT NULL,
  `group_id` varchar(8) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `emailmarketing_email_data`
--

INSERT INTO `emailmarketing_email_data` (`id`, `email`, `group_id`, `ent_dt`) VALUES
(8, 'sadsadsad@gmail.com', '1001201', '2021-06-11 11:05:23'),
(9, 'test1@gmail.com', '1001201', '2021-06-11 11:30:53'),
(10, 'test2@gmail.com', '1001201', '2021-06-11 11:30:53'),
(11, 'test4@gmail.com', '1001201', '2021-06-11 11:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `emailmarketing_group_data`
--

DROP TABLE IF EXISTS `emailmarketing_group_data`;
CREATE TABLE `emailmarketing_group_data` (
  `group_id` varchar(8) COLLATE utf8_bin NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(28) COLLATE utf8_bin DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `emailmarketing_group_data`
--

INSERT INTO `emailmarketing_group_data` (`group_id`, `title`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('1001201', 'Default', '', '2021-06-11 10:16:33', '2021-06-11 10:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `emailmarketing_jobs_data`
--

DROP TABLE IF EXISTS `emailmarketing_jobs_data`;
CREATE TABLE `emailmarketing_jobs_data` (
  `job_id` varchar(12) COLLATE utf8_bin NOT NULL,
  `template_id` varchar(12) COLLATE utf8_bin NOT NULL,
  `group_id` varchar(8) COLLATE utf8_bin NOT NULL,
  `total_sended` int(9) NOT NULL DEFAULT '0',
  `total_readed` int(9) NOT NULL DEFAULT '0',
  `total_email` int(9) NOT NULL DEFAULT '0',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `emailmarketing_sent_data`
--

DROP TABLE IF EXISTS `emailmarketing_sent_data`;
CREATE TABLE `emailmarketing_sent_data` (
  `send_id` int(9) NOT NULL,
  `job_id` varchar(12) COLLATE utf8_bin NOT NULL,
  `to_email` varchar(155) COLLATE utf8_bin NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `is_readed` int(1) NOT NULL DEFAULT '0',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `emailmarketing_unsubscrible_data`
--

DROP TABLE IF EXISTS `emailmarketing_unsubscrible_data`;
CREATE TABLE `emailmarketing_unsubscrible_data` (
  `id` int(9) NOT NULL,
  `email` varchar(155) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `emailmarketing_unsubscrible_data`
--

INSERT INTO `emailmarketing_unsubscrible_data` (`id`, `email`, `ent_dt`) VALUES
(1, 'test2@gmail.com', '2021-06-11 12:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `email_sent_data`
--

DROP TABLE IF EXISTS `email_sent_data`;
CREATE TABLE `email_sent_data` (
  `send_id` int(9) NOT NULL,
  `template_id` varchar(8) COLLATE utf8_bin NOT NULL,
  `to_email` varchar(1000) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin,
  `sent_result` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `user_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `email_template_data`
--

DROP TABLE IF EXISTS `email_template_data`;
CREATE TABLE `email_template_data` (
  `template_id` varchar(8) COLLATE utf8_bin NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `subject` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `user_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `email_template_data`
--

INSERT INTO `email_template_data` (`template_id`, `title`, `subject`, `content`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('124231', 'New user registered', 'Welcome to {{site_title}}', '<p>Dear,</p>\n\n<p><strong>Welcome to {{site_title}}</strong></p>\n\n<p>Your account details:</p>\n\n<p>Username: {{username}}</p>\n\n<p>Password : {{password}}</p>\n\n<p><strong>Thanks for register new user on my website!</strong></p>\n', '', '2021-05-17 09:25:16', '2021-05-17 09:25:16'),
('137454', 'Forgot Password', 'Forgot password verfify - {{site_title}}', '<p>Hi,</p>\n\n<p>You have make a forgot password request</p>\n\n<p>You can click on below url for verify your request and create new password</p>\n\n<p><a href=\\\"{{verify_forgotpassword_url}}\\\">{{verify_forgotpassword_url}}</a></p>\n\n<p>Thanks and BRs,</p>\n\n<p>&nbsp;</p>\n', '', '2021-05-17 09:25:16', '2021-05-17 09:25:16'),
('143664', 'Change password', 'Change password - {{site_title}}', '<p><strong>Dear {{user_name}},</strong></p>\n\n<p>You have been change password of your account at our website&nbsp;<a href=\\\"{{site_url}}\\\">{{site_title}}</a></p>\n\n<p>You new account details:</p>\n\n<p>Username: <strong>{{username}}</strong></p>\n\n<p>Password: <strong>{{password}}</strong></p>\n\n<p>Thanks and BRs,</p>\n', '', '2021-05-17 09:25:16', '2021-05-17 09:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `group_permission_data`
--

DROP TABLE IF EXISTS `group_permission_data`;
CREATE TABLE `group_permission_data` (
  `group_c` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `permission_c` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_permission_data`
--

INSERT INTO `group_permission_data` (`group_c`, `permission_c`, `user_id`, `ent_dt`) VALUES
('11016013', 'category01', '11015035', '2021-06-23 09:08:08'),
('11016013', 'menu01', '11015035', '2021-06-23 09:08:08'),
('11016013', 'menu02', '11015035', '2021-06-23 09:08:08'),
('11016013', 'menu03', '11015035', '2021-06-23 09:08:08'),
('11016013', 'menu04', '11015035', '2021-06-23 09:08:08'),
('11016013', 'menu05', '11015035', '2021-06-23 09:08:08'),
('11016013', 'menu06', '11015035', '2021-06-23 09:08:08'),
('11016013', 'menu07', '11015035', '2021-06-23 09:08:08'),
('11016013', 'menu08', '11015035', '2021-06-23 09:08:08'),
('11016013', 'menu09', '11015035', '2021-06-23 09:08:08'),
('11016013', 'menu10', '11015035', '2021-06-23 09:08:08'),
('11016013', 'menu11', '11015035', '2021-06-23 09:08:08'),
('11016013', 'post01', '11015035', '2021-06-23 09:08:08'),
('11016013', 'post02', '11015035', '2021-06-23 09:08:08'),
('11016013', 'post04', '11015035', '2021-06-23 09:08:08'),
('11016013', 'post05', '11015035', '2021-06-23 09:08:08'),
('11016016', 'menu01', '11015035', '2021-06-19 14:58:39'),
('11016016', 'menu06', '11015035', '2021-06-19 14:58:39'),
('11016016', 'post04', '11015035', '2021-06-19 14:58:39'),
('11016016', 'post05', '11015035', '2021-06-19 14:58:39'),
('554546466', 'menu02', 'mrtienmi4', '2021-05-10 06:29:52'),
('554546466', 'menu08', 'mrtienmi4', '2021-05-10 06:29:52'),
('11016011', 'menu10', '11015035', '2021-09-01 13:56:09'),
('11016011', 'post08', '11015035', '2021-09-01 13:56:09'),
('11016011', 'post05', '11015035', '2021-09-01 13:56:09'),
('11016011', 'post11', '11015035', '2021-09-01 13:56:09'),
('11016011', 'per1101105', '11015035', '2021-09-01 13:56:09'),
('11016011', 'post06', '11015035', '2021-09-01 13:56:09'),
('11016011', 'remote01', '11015035', '2021-09-01 13:56:09'),
('11016011', 'post01', '11015035', '2021-09-01 13:56:09'),
('11016011', 'menu05', '11015035', '2021-09-01 13:56:09'),
('11016011', 'menu09', '11015035', '2021-09-01 13:56:09'),
('11016011', 'menu11', '11015035', '2021-09-01 13:56:09'),
('11016011', 'per1101103', '11015035', '2021-09-01 13:56:09'),
('11016011', 'post09', '11015035', '2021-09-01 13:56:09'),
('11016011', 'post02', '11015035', '2021-09-01 13:56:09'),
('11016011', 'post12', '11015035', '2021-09-01 13:56:09'),
('11016011', 'category02', '11015035', '2021-09-01 13:56:09'),
('11016011', 'menu02', '11015035', '2021-09-01 13:56:09'),
('11016011', 'menu08', '11015035', '2021-09-01 13:56:09'),
('11016011', 'category01', '11015035', '2021-09-01 13:56:09'),
('11016011', 'menu01', '11015035', '2021-09-01 13:56:09'),
('11016011', 'menu03', '11015035', '2021-09-01 13:56:09'),
('11016011', 'menu06', '11015035', '2021-09-01 13:56:09'),
('11016011', 'post10', '11015035', '2021-09-01 13:56:09'),
('11016011', 'menu04', '11015035', '2021-09-01 13:56:09'),
('11016011', 'menu07', '11015035', '2021-09-01 13:56:10'),
('11016011', 'per1101101', '11015035', '2021-09-01 13:56:10'),
('11016011', 'per1101102', '11015035', '2021-09-01 13:56:10'),
('11016011', 'post04', '11015035', '2021-09-01 13:56:10'),
('11016012', 'post05', '11015035', '2021-09-01 14:03:22'),
('11016012', 'post01', '11015035', '2021-09-01 14:03:22'),
('11016012', 'post02', '11015035', '2021-09-01 14:03:22'),
('11016012', 'category02', '11015035', '2021-09-01 14:03:22'),
('11016012', 'menu02', '11015035', '2021-09-01 14:03:22'),
('11016012', 'menu08', '11015035', '2021-09-01 14:03:22'),
('11016012', 'category01', '11015035', '2021-09-01 14:03:22'),
('11016012', 'menu01', '11015035', '2021-09-01 14:03:22'),
('11016012', 'menu06', '11015035', '2021-09-01 14:03:23'),
('11016012', 'post04', '11015035', '2021-09-01 14:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `kanban_board_comment_data`
--

DROP TABLE IF EXISTS `kanban_board_comment_data`;
CREATE TABLE `kanban_board_comment_data` (
  `id` int(9) NOT NULL,
  `message_id` varchar(24) COLLATE utf8_bin NOT NULL,
  `content` varchar(1000) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(28) COLLATE utf8_bin DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `kanban_board_data`
--

DROP TABLE IF EXISTS `kanban_board_data`;
CREATE TABLE `kanban_board_data` (
  `message_id` varchar(24) COLLATE utf8_bin NOT NULL,
  `board_c` varchar(16) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `percent` float NOT NULL DEFAULT '0',
  `sort_order` int(9) NOT NULL DEFAULT '0',
  `user_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `kanban_board_mst`
--

DROP TABLE IF EXISTS `kanban_board_mst`;
CREATE TABLE `kanban_board_mst` (
  `board_c` varchar(16) COLLATE utf8_bin NOT NULL,
  `project_c` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `sort_order` int(2) NOT NULL DEFAULT '0',
  `user_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kanban_board_mst`
--

INSERT INTO `kanban_board_mst` (`board_c`, `project_c`, `title`, `sort_order`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('554911469421', '21423523', 'Docs', 1, '', '2021-05-22 11:41:06', '2021-05-22 11:41:06'),
('648246517313', '21423523', 'Done', 4, '', '2021-05-22 11:40:57', '2021-05-22 11:40:57'),
('772343583978051', '', '', 1, '', '2021-06-13 08:33:23', '2021-06-13 08:33:23'),
('785849759653', '21423523', 'Todo', 2, '', '2021-05-22 11:40:33', '2021-05-22 11:40:33'),
('925994129363', '21423523', 'In Progress', 3, '', '2021-05-22 11:40:51', '2021-05-22 11:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `kanban_board_project_mst`
--

DROP TABLE IF EXISTS `kanban_board_project_mst`;
CREATE TABLE `kanban_board_project_mst` (
  `project_c` varchar(16) COLLATE utf8_bin NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kanban_board_project_mst`
--

INSERT INTO `kanban_board_project_mst` (`project_c`, `title`, `status`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('21423523', 'Default', 1, '', '2021-05-19 08:01:33', '2021-05-19 08:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `kanban_task_checklist_data`
--

DROP TABLE IF EXISTS `kanban_task_checklist_data`;
CREATE TABLE `kanban_task_checklist_data` (
  `check_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `task_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `title` varchar(500) COLLATE utf8_bin NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `user_id` varchar(28) COLLATE utf8_bin DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `kanban_task_comment_data`
--

DROP TABLE IF EXISTS `kanban_task_comment_data`;
CREATE TABLE `kanban_task_comment_data` (
  `comment_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `task_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `attach_files` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `kanban_task_data`
--

DROP TABLE IF EXISTS `kanban_task_data`;
CREATE TABLE `kanban_task_data` (
  `task_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `project_c` varchar(16) COLLATE utf8_bin NOT NULL,
  `title` varchar(500) COLLATE utf8_bin NOT NULL,
  `assigned_to` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `progress` int(3) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` varchar(28) COLLATE utf8_bin DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kanban_task_data`
--

INSERT INTO `kanban_task_data` (`task_id`, `project_c`, `title`, `assigned_to`, `progress`, `start_date`, `end_date`, `status`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('3407867696490430220', '21423523', 'This is test task in test project mangement plugin', '11015035', 70, '2021-06-15', '2021-06-29', 1, '11015035', '2021-06-22 14:41:31', '2021-06-22 14:41:31'),
('8267299739366316837', '21423523', 'test', '11015035', 100, '2021-06-22', '2021-07-22', 1, '11015035', '2021-06-22 14:33:36', '2021-06-22 14:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `kanboard_category_mst`
--

DROP TABLE IF EXISTS `kanboard_category_mst`;
CREATE TABLE `kanboard_category_mst` (
  `category_c` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_category_c` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friendly_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptions` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contents` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `views` int(9) NOT NULL DEFAULT '0',
  `sort_order` int(9) NOT NULL DEFAULT '0',
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kanboard_category_mst`
--

INSERT INTO `kanboard_category_mst` (`category_c`, `title`, `parent_category_c`, `friendly_url`, `thumbnail`, `keywords`, `descriptions`, `contents`, `status`, `views`, `sort_order`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('9844612265587', 'Non Title', '', 'Non-Title', '', 'Non Title', 'Non Title', NULL, 1, 0, 0, '', '2021-06-05 09:36:23', '2021-06-05 09:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `language_mst`
--

DROP TABLE IF EXISTS `language_mst`;
CREATE TABLE `language_mst` (
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

DROP TABLE IF EXISTS `media_data`;
CREATE TABLE `media_data` (
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

DROP TABLE IF EXISTS `menu_data`;
CREATE TABLE `menu_data` (
  `menu_id` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `parent_menu_id` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_url` int(1) NOT NULL DEFAULT '0',
  `page_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_type` int(3) DEFAULT '1',
  `content` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `sort_order` int(5) NOT NULL DEFAULT '0',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_data`
--

INSERT INTO `menu_data` (`menu_id`, `parent_menu_id`, `title`, `is_url`, `page_url`, `menu_type`, `content`, `status`, `sort_order`, `ent_dt`, `upd_dt`) VALUES
('11015030', '', 'Home', 0, '', 1, NULL, 1, -2, '2021-05-30 15:08:54', '2021-05-30 15:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `message_data`
--

DROP TABLE IF EXISTS `message_data`;
CREATE TABLE `message_data` (
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
-- Table structure for table `newsletter_data`
--

DROP TABLE IF EXISTS `newsletter_data`;
CREATE TABLE `newsletter_data` (
  `id` int(9) NOT NULL,
  `email` varchar(155) COLLATE utf8_bin NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `ip_add` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `user_agent` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `options_data`
--

DROP TABLE IF EXISTS `options_data`;
CREATE TABLE `options_data` (
  `option_c` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `target_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `target_value` text COLLATE utf8_unicode_ci,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options_mst`
--

DROP TABLE IF EXISTS `options_mst`;
CREATE TABLE `options_mst` (
  `option_c` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `option_type` int(5) NOT NULL DEFAULT '1',
  `title` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_data`
--

DROP TABLE IF EXISTS `page_data`;
CREATE TABLE `page_data` (
  `page_c` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `descriptions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `views` int(9) NOT NULL DEFAULT '0',
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions_mst`
--

DROP TABLE IF EXISTS `permissions_mst`;
CREATE TABLE `permissions_mst` (
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
('category02', 'Can edit all categories ?', 1, '', '2021-03-28 10:07:14'),
('menu01', 'Can manage pages ?', 1, '15904', '2021-03-27 16:36:56'),
('menu02', 'Can edit all page ?', 1, '15904', '2021-03-27 16:37:13'),
('menu03', 'Can manage plugins ?', 1, '15904', '2021-03-27 16:37:27'),
('menu04', 'Can manage themes ?', 1, '15904', '2021-03-27 16:37:38'),
('menu05', 'Can change system setting ?', 1, '15904', '2021-03-27 16:37:52'),
('menu06', 'Can manage post ?', 1, '15904', '2021-03-27 16:38:52'),
('menu07', 'Can manage users ?', 1, '15904', '2021-03-27 16:39:10'),
('menu08', 'Can edit all post ?', 1, '15904', '2021-03-27 16:39:55'),
('menu09', 'Can change system theme ?', 1, '15904', '2021-03-27 16:40:18'),
('menu10', 'Can activate plugin ?', 1, '15904', '2021-03-27 16:40:37'),
('menu11', 'Can deactivate plugin ?', 1, '15904', '2021-03-27 16:40:49'),
('per1101101', 'Can update all task ?', 1, '', '2021-03-28 10:05:49'),
('per1101102', 'Can view all task ?', 1, '', '2021-03-28 10:05:49'),
('per1101103', 'Can delete all task ?', 1, '', '2021-03-28 10:05:49'),
('per1101105', 'Can add new task ?', 1, '', '2021-03-28 10:05:49'),
('remote01', 'Can use remote api', 1, '', '2021-03-28 10:04:52'),
('post01', 'Can change post status ?', 1, '', '2021-03-28 10:04:52'),
('post02', 'Can delete post ?', 1, '', '2021-03-28 10:05:03'),
('post04', 'Can view post ?', 1, '', '2021-03-28 10:05:49'),
('post05', 'Can add new post ?', 1, '', '2021-03-28 10:05:49'),
('post06', 'Can change page status ?', 1, '', '2021-03-28 10:04:52'),
('post08', 'Can add new page ?', 1, '', '2021-03-28 10:05:49'),
('post09', 'Can delete page ?', 1, '', '2021-03-28 10:05:49'),
('post10', 'Can manage short urls ?', 1, '', '2021-03-28 10:05:49'),
('post11', 'Can add new short url ?', 1, '', '2021-03-28 10:05:49'),
('post12', 'Can delete short url ?', 1, '', '2021-03-28 10:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `plugin_hook_data`
--

DROP TABLE IF EXISTS `plugin_hook_data`;
CREATE TABLE `plugin_hook_data` (
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

DROP TABLE IF EXISTS `plugin_mst`;
CREATE TABLE `plugin_mst` (
  `plugin_dir` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_cache_data`
--

DROP TABLE IF EXISTS `post_cache_data`;
CREATE TABLE `post_cache_data` (
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

DROP TABLE IF EXISTS `post_data`;
CREATE TABLE `post_data` (
  `post_c` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `descriptions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
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

INSERT INTO `post_data` (`post_c`, `title`, `friendly_url`, `content`, `descriptions`, `keywords`, `thumbnail`, `password`, `tags`, `status`, `post_type`, `parent_post_c`, `views`, `category_c`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('59472994850914', 'What is Lorem Ipsum?', 'What_is_Lorem_Ipsum_59472994850914', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\n', '', '', '', NULL, '', 1, '', NULL, 0, '9844612265587', '11015035', '2021-06-13 08:58:48', '2021-06-13 08:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag_data`
--

DROP TABLE IF EXISTS `post_tag_data`;
CREATE TABLE `post_tag_data` (
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

DROP TABLE IF EXISTS `post_tag_view_data`;
CREATE TABLE `post_tag_view_data` (
  `tag` varchar(255) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `post_type_data`
--

DROP TABLE IF EXISTS `post_type_data`;
CREATE TABLE `post_type_data` (
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

DROP TABLE IF EXISTS `post_view_data`;
CREATE TABLE `post_view_data` (
  `post_c` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_add` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_view_data`
--

INSERT INTO `post_view_data` (`post_c`, `ip_add`, `user_agent`, `ent_dt`) VALUES
('222977529037', '127.0.0.1', NULL, '2021-05-14 20:28:05'),
('222977529037', '10.0.0.2', NULL, '2021-05-14 20:28:19'),
('222977529037', '10.0.0.21', NULL, '2021-05-14 20:28:28'),
('956158837253', '10.0.0.22', NULL, '2021-05-14 20:28:51'),
('956158837253', '127.0.0.1', NULL, '2021-05-14 20:28:59'),
('3324571084994582594596065328', '10.0.0.2', NULL, '2021-05-13 20:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `setting_data`
--

DROP TABLE IF EXISTS `setting_data`;
CREATE TABLE `setting_data` (
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
('default_guest_groupid', 'Default Guest Group', '11016017', 1),
('default_member_banned_groupid', 'default_member_banned_groupid', '11016014', 1),
('default_member_groupid', 'Default Member Group', '11016013', 1),
('default_member_levelid', 'Default Member Level', '11017013', 1),
('default_page', 'Default Page', '', 1),
('default_theme', 'Default Theme', 'bb_simple', 1),
('email_change_password_template', 'Change password template', '143664', 1),
('email_forgotpassword_template', 'Email forgot password template', '137454', 1),
('email_new_user_template', 'Email new user template', '124231', 1),
('email_sender', 'Sender Email', 'coffeecms@gmail.com', 1),
('email_sender_name', 'Sender Name', 'Coffee CMS', 1),
('email_smtp', 'Enable SMTP', 'no', 1),
('enable_rss', 'Enable RSS Feed', 'no', 1),
('frontend_lang ', 'Frontend Language', 'en', 1),
('is_construction', 'Is Construction', 'no', 1),
('mobile_website_url', 'Website url for mobile device', '', 1),
('post_back_when_add_new_payment', 'Postback url when add new payment', '', 1),
('post_back_when_add_new_product_success', 'Postback url when add new product success', '', 1),
('post_back_when_add_new_user', 'Postback url when have new user', '', 1),
('post_back_when_change_page_status', 'Postback url when change page status', '', 1),
('post_back_when_change_post_status', 'Postback url when change post status', '', 1),
('post_back_when_change_user_group', 'Postback url when change user group', '', 1),
('post_back_when_change_user_level', 'Postback url when change user level', '', 1),
('post_back_when_have_new_order', 'Postback url when have new order with status', '', 1),
('register_user_status', 'register_user_status', 'yes', 1),
('register_verify_email', 'register_verify_email', 'no', 1),
('require_login_if_is_guest', 'Require login if is guest', '1', 1),
('site_description', 'Descriptions', 'Site descriptions', 1),
('site_title', 'Title', 'Coffee CMS Site', 1),
('smtp_host', 'SMTP Host', 'smtp.gmail.com', 1),
('smtp_password', 'SMTP Password', '123456', 1),
('smtp_port', 'SMTP Port', '587', 1),
('smtp_username', 'SMTP Username', 'test', 1),
('system_admin_lang', 'Administrator Language', 'en', 1),
('system_category_id_len', 'System category id length', '12', 1),
('system_groupuser_id_len', 'System group user id length', '16', 1),
('system_post_id_len', 'System post id length', '12', 1),
('system_setting_cache', 'System Setting Cached', 'no', 1),
('system_status', 'system_status', 'working', 1),
('system_title', 'System title', 'Coffee CMS', 1),
('system_user_id_len', 'System user id length', '12', 1),
('tablet_website_url', 'Website url for tablet device', '', 1),
('theme_layout', 'Theme layout', 'default', 1),
('timezone', 'Timezone', 'America/Los_Angeles', 1),
('website_view_cache', 'Website View Cache', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shortcode_data`
--

DROP TABLE IF EXISTS `shortcode_data`;
CREATE TABLE `shortcode_data` (
  `name` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'plugin',
  `dirname` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `short_url_data`
--

DROP TABLE IF EXISTS `short_url_data`;
CREATE TABLE `short_url_data` (
  `code` varchar(30) COLLATE utf8_bin NOT NULL,
  `target_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `views` int(9) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `theme_hook_data`
--

DROP TABLE IF EXISTS `theme_hook_data`;
CREATE TABLE `theme_hook_data` (
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

DROP TABLE IF EXISTS `theme_mst`;
CREATE TABLE `theme_mst` (
  `theme_dir` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theme_mst`
--

INSERT INTO `theme_mst` (`theme_dir`, `status`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('bb_simple', 1, '11015035', '2021-08-27 14:55:33', '2021-08-27 14:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_api_key_data`
--

DROP TABLE IF EXISTS `user_api_key_data`;
CREATE TABLE `user_api_key_data` (
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

DROP TABLE IF EXISTS `user_api_key_permission_data`;
CREATE TABLE `user_api_key_permission_data` (
  `api_key` varchar(255) COLLATE utf8_bin NOT NULL,
  `permission_c` varchar(155) COLLATE utf8_bin NOT NULL,
  `insert_id` varchar(28) COLLATE utf8_bin NOT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_api_key_permission_mst`
--

DROP TABLE IF EXISTS `user_api_key_permission_mst`;
CREATE TABLE `user_api_key_permission_mst` (
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

DROP TABLE IF EXISTS `user_group_mst`;
CREATE TABLE `user_group_mst` (
  `group_c` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `left_str` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `right_str` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` varchar(28) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_group_mst`
--

INSERT INTO `user_group_mst` (`group_c`, `title`, `left_str`, `right_str`, `status`, `user_id`, `ent_dt`, `upd_dt`) VALUES
('11016011', 'Administrator', '<span style=\"color:red;\">', '</span>', 1, '11015035', '2021-03-28 10:01:17', '2021-03-28 10:01:17'),
('11016012', 'Moderator', '<span style=\"color:blue;\">', '</span>', 1, '11015035', '2021-03-28 10:01:17', '2021-03-28 10:01:17'),
('11016013', 'User', NULL, NULL, 1, '11015035', '2021-03-28 10:01:25', '2021-03-28 10:01:25'),
('11016014', 'Banned User', NULL, NULL, 1, NULL, '2021-03-28 10:01:53', '2021-03-28 10:01:53'),
('11016015', 'Pending activation user', NULL, NULL, 1, NULL, '2021-03-28 10:02:14', '2021-03-28 10:02:14'),
('11016016', 'Writer', NULL, NULL, 1, '11015035', '2021-03-28 10:02:39', '2021-03-28 10:02:39'),
('11016017', 'Guest', NULL, NULL, 1, NULL, '2021-03-28 10:02:39', '2021-03-28 10:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_info_data`
--

DROP TABLE IF EXISTS `user_info_data`;
CREATE TABLE `user_info_data` (
  `user_c` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'male',
  `passport` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `business_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'individual',
  `front_id_card` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `back_id_card` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_verify_id_card` int(1) NOT NULL DEFAULT '1',
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_level_mst`
--

DROP TABLE IF EXISTS `user_level_mst`;
CREATE TABLE `user_level_mst` (
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
('11017011', 'Ultimate', NULL, NULL, 1, '', '2021-03-28 13:38:05', '2021-03-28 13:38:05'),
('11017012', 'Professional', NULL, NULL, 1, '', '2021-03-28 13:37:30', '2021-03-28 13:37:30'),
('11017013', 'Beginner', NULL, NULL, 1, '', '2021-03-28 13:35:20', '2021-03-28 13:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_mst`
--

DROP TABLE IF EXISTS `user_mst`;
CREATE TABLE `user_mst` (
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify_c` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_c` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_c` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin_verify_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `left_str` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `right_str` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `forgot_password_c` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_logined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_mst`
--


INSERT INTO `user_mst` (`user_id`, `username`, `password`, `email`, `fullname`, `avatar`, `verify_c`, `group_c`, `level_c`, `status`, `forgot_password_c`, `last_logined`, `ent_dt`, `upd_dt`) VALUES
('11015035', '{{admin_username}}', '{{admin_password}}', '{{admin_email}}', NULL, NULL, NULL, '11016011', '1101701', 1, NULL, '2021-05-17 13:33:42', '2021-05-06 16:40:54', '2021-05-06 16:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_online_data`
--

DROP TABLE IF EXISTS `user_online_data`;
CREATE TABLE `user_online_data` (
  `user_id` varchar(28) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_add` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_permission_menu_data`
--

DROP TABLE IF EXISTS `user_permission_menu_data`;
CREATE TABLE `user_permission_menu_data` (
  `group_c` varchar(20) COLLATE utf8_bin NOT NULL,
  `menu_type` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT 'admin',
  `menu_id` varchar(18) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_permission_menu_data`
--

INSERT INTO `user_permission_menu_data` (`group_c`, `menu_type`, `menu_id`) VALUES
('11016016', 'admin', '11011011'),
('11016016', 'admin', '11011012'),
('11016016', 'admin', '11015014'),
('11016016', 'admin', '11015011'),
('11016016', 'admin', '11015022'),
('11016016', 'admin', '11015018'),
('11016016', 'admin', '11011013'),
('11016016', 'admin', '11015016'),
('11016016', 'admin', '11015013'),
('11016016', 'admin', '11017121'),
('11016013', 'admin', '11011011'),
('11016013', 'admin', '11011012'),
('11016013', 'admin', '11015014'),
('11016013', 'admin', '11015011'),
('11016013', 'admin', '11015018'),
('11016013', 'admin', '11011013'),
('11016013', 'admin', '11015016'),
('11016013', 'admin', '11015013'),
('11016013', 'admin', '11011014'),
('11016013', 'admin', '11015424'),
('11016013', 'admin', '11011016'),
('11016013', 'admin', '11017121'),
('11016011', 'admin', '11011011'),
('11016011', 'admin', '11011012'),
('11016011', 'admin', '11015014'),
('11016011', 'admin', '11015011'),
('11016011', 'admin', '11015022'),
('11016011', 'admin', '11015018'),
('11016011', 'admin', '11011013'),
('11016011', 'admin', '11015016'),
('11016011', 'admin', '11015013'),
('11016011', 'admin', '11011014'),
('11016011', 'admin', '11015024'),
('11016011', 'admin', '11015424'),
('11016011', 'admin', '11011015'),
('11016011', 'admin', '11015017'),
('11016011', 'admin', '11015020'),
('11016011', 'admin', '11016117'),
('11016011', 'admin', '11011016'),
('11016011', 'admin', '11015015'),
('11016011', 'admin', '11015026'),
('11016011', 'admin', '11015025'),
('11016011', 'admin', '11015019'),
('11016011', 'admin', '11011017'),
('11016011', 'admin', '11015023'),
('11016011', 'admin', '11015123'),
('11016011', 'admin', '11011018'),
('11016011', 'admin', '11015012'),
('11016011', 'admin', '11015021'),
('11016011', 'admin', '11017021'),
('11016011', 'admin', '11017121'),
('11016011', 'admin', '11015027'),
('11016011', 'admin', '11015034'),
('11016011', 'admin', '11015030'),
('11016011', 'admin', '11015035'),
('11016011', 'admin', '11015028'),
('11016011', 'admin', '11015029'),
('11016011', 'admin', '11015031'),
('11016011', 'admin', '11015032'),
('11016012', 'admin', '11011011'),
('11016012', 'admin', '11011012'),
('11016012', 'admin', '11015014'),
('11016012', 'admin', '11015011'),
('11016012', 'admin', '11015022'),
('11016012', 'admin', '11015018'),
('11016012', 'admin', '11011013'),
('11016012', 'admin', '11015016'),
('11016012', 'admin', '11015013'),
('11016012', 'admin', '11011014'),
('11016012', 'admin', '11015024'),
('11016012', 'admin', '11011015'),
('11016012', 'admin', '11015017'),
('11016012', 'admin', '11015020'),
('11016012', 'admin', '11011016'),
('11016012', 'admin', '11015015'),
('11016012', 'admin', '11015026'),
('11016012', 'admin', '11015025'),
('11016012', 'admin', '11015019'),
('11016012', 'admin', '11011017'),
('11016012', 'admin', '11015023'),
('11016012', 'admin', '11011018'),
('11016012', 'admin', '11015012'),
('11016012', 'admin', '11015021'),
('11016012', 'admin', '11017021'),
('11016012', 'admin', '11017121'),
('11016012', 'admin', '11015027'),
('11016012', 'admin', '11015034'),
('11016012', 'admin', '11015030'),
('11016012', 'admin', '11015035'),
('11016012', 'admin', '11015028'),
('11016012', 'admin', '11015029'),
('11016012', 'admin', '11015031'),
('11016012', 'admin', '11015032');

-- --------------------------------------------------------

--
-- Table structure for table `user_prefix_data`
--

DROP TABLE IF EXISTS `user_prefix_data`;
CREATE TABLE `user_prefix_data` (
  `user_id` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `prefix` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities_data`
--
ALTER TABLE `activities_data`
  ADD KEY `ix1` (`activity_c`),
  ADD KEY `ix2` (`user_id`),
  ADD KEY `ix3` (`ent_dt`);

--
-- Indexes for table `admin_menu_data`
--
ALTER TABLE `admin_menu_data`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `parent_menu_id` (`parent_menu_id`),
  ADD KEY `title` (`title`),
  ADD KEY `plugin_name` (`plugin_name`),
  ADD KEY `is_url` (`is_url`);

--
-- Indexes for table `cache_data`
--
ALTER TABLE `cache_data`
  ADD KEY `ix1` (`cache_id`),
  ADD KEY `ix2` (`cache_key`),
  ADD KEY `ix3` (`ent_dt`),
  ADD KEY `ix4` (`plugin_c`),
  ADD KEY `ix5` (`theme_c`);

--
-- Indexes for table `calendar_data`
--
ALTER TABLE `calendar_data`
  ADD PRIMARY KEY (`calendar_id`),
  ADD KEY `calendar_id` (`calendar_id`),
  ADD KEY `start_dt` (`start_dt`),
  ADD KEY `end_dt` (`end_dt`),
  ADD KEY `all_day` (`all_day`),
  ADD KEY `status` (`status`),
  ADD KEY `color_c` (`color_c`);

--
-- Indexes for table `calendar_group`
--
ALTER TABLE `calendar_group`
  ADD PRIMARY KEY (`group_c`),
  ADD KEY `group_c` (`group_c`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `category_mst`
--
ALTER TABLE `category_mst`
  ADD PRIMARY KEY (`category_c`),
  ADD KEY `ix1` (`category_c`),
  ADD KEY `ix2` (`title`),
  ADD KEY `ix3` (`friendly_url`),
  ADD KEY `ix4` (`status`),
  ADD KEY `sort_order` (`sort_order`),
  ADD KEY `upd_dt` (`upd_dt`),
  ADD KEY `views` (`views`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comment_data`
--
ALTER TABLE `comment_data`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `ix1` (`comment_id`),
  ADD KEY `ix2` (`post_id`),
  ADD KEY `ix4` (`owner_id`),
  ADD KEY `ix6` (`ent_dt`),
  ADD KEY `ix7` (`parent_comment_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `contact_data`
--
ALTER TABLE `contact_data`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `ix1` (`ip`),
  ADD KEY `ix2` (`contact_id`),
  ADD KEY `ix3` (`user_agent`),
  ADD KEY `ix5` (`ent_dt`);

--
-- Indexes for table `cronjob_data`
--
ALTER TABLE `cronjob_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `cronjob_log_data`
--
ALTER TABLE `cronjob_log_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `emailmarketing_email_data`
--
ALTER TABLE `emailmarketing_email_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `emailmarketing_group_data`
--
ALTER TABLE `emailmarketing_group_data`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `upd_dt` (`upd_dt`);

--
-- Indexes for table `emailmarketing_jobs_data`
--
ALTER TABLE `emailmarketing_jobs_data`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `template_id` (`template_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `total_email` (`total_email`),
  ADD KEY `total_readed` (`total_readed`),
  ADD KEY `total_sended` (`total_sended`);

--
-- Indexes for table `emailmarketing_sent_data`
--
ALTER TABLE `emailmarketing_sent_data`
  ADD PRIMARY KEY (`send_id`),
  ADD KEY `send_id` (`send_id`),
  ADD KEY `to_email` (`to_email`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `status` (`status`),
  ADD KEY `is_readed` (`is_readed`);

--
-- Indexes for table `emailmarketing_unsubscrible_data`
--
ALTER TABLE `emailmarketing_unsubscrible_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `email_sent_data`
--
ALTER TABLE `email_sent_data`
  ADD PRIMARY KEY (`send_id`),
  ADD KEY `send_id` (`send_id`),
  ADD KEY `template_id` (`template_id`),
  ADD KEY `to_email` (`to_email`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `email_template_data`
--
ALTER TABLE `email_template_data`
  ADD PRIMARY KEY (`template_id`),
  ADD KEY `template_id` (`template_id`),
  ADD KEY `title` (`title`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `upd_dt` (`upd_dt`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `group_permission_data`
--
ALTER TABLE `group_permission_data`
  ADD KEY `ix1` (`group_c`),
  ADD KEY `ix2` (`permission_c`);

--
-- Indexes for table `kanban_board_comment_data`
--
ALTER TABLE `kanban_board_comment_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_id` (`message_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `kanban_board_data`
--
ALTER TABLE `kanban_board_data`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_id` (`message_id`),
  ADD KEY `board_c` (`board_c`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `percent` (`percent`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `kanban_board_mst`
--
ALTER TABLE `kanban_board_mst`
  ADD PRIMARY KEY (`board_c`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sort_order` (`sort_order`),
  ADD KEY `project_c` (`project_c`);

--
-- Indexes for table `kanban_board_project_mst`
--
ALTER TABLE `kanban_board_project_mst`
  ADD PRIMARY KEY (`project_c`),
  ADD KEY `status` (`status`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `upd_dt` (`upd_dt`);

--
-- Indexes for table `kanban_task_checklist_data`
--
ALTER TABLE `kanban_task_checklist_data`
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `check_id` (`check_id`);

--
-- Indexes for table `kanban_task_comment_data`
--
ALTER TABLE `kanban_task_comment_data`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `kanban_task_data`
--
ALTER TABLE `kanban_task_data`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `project_c` (`project_c`),
  ADD KEY `assigned_to` (`assigned_to`),
  ADD KEY `progress` (`progress`),
  ADD KEY `start_date` (`start_date`),
  ADD KEY `end_date` (`end_date`),
  ADD KEY `status` (`status`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `upd_dt` (`upd_dt`);

--
-- Indexes for table `kanboard_category_mst`
--
ALTER TABLE `kanboard_category_mst`
  ADD PRIMARY KEY (`category_c`),
  ADD KEY `ix1` (`category_c`),
  ADD KEY `ix2` (`title`),
  ADD KEY `ix3` (`friendly_url`),
  ADD KEY `ix4` (`status`),
  ADD KEY `sort_order` (`sort_order`),
  ADD KEY `upd_dt` (`upd_dt`),
  ADD KEY `views` (`views`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `language_mst`
--
ALTER TABLE `language_mst`
  ADD PRIMARY KEY (`code`),
  ADD KEY `code` (`code`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `media_data`
--
ALTER TABLE `media_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix1` (`id`),
  ADD KEY `name` (`file_path`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `name_2` (`name`);

--
-- Indexes for table `menu_data`
--
ALTER TABLE `menu_data`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `parent_menu_id` (`parent_menu_id`),
  ADD KEY `title` (`title`),
  ADD KEY `plugin_name` (`menu_type`),
  ADD KEY `is_url` (`is_url`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `message_data`
--
ALTER TABLE `message_data`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `ix1` (`is_guest`),
  ADD KEY `ix2` (`subject`),
  ADD KEY `ix4` (`ent_dt`),
  ADD KEY `ix5` (`to_user_id`),
  ADD KEY `ix6` (`message_id`),
  ADD KEY `user_id` (`user_id`);
ALTER TABLE `message_data` ADD FULLTEXT KEY `fl1` (`content`);

--
-- Indexes for table `newsletter_data`
--
ALTER TABLE `newsletter_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_agent` (`user_agent`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `options_data`
--
ALTER TABLE `options_data`
  ADD KEY `option_c` (`option_c`),
  ADD KEY `target_id` (`target_id`);

--
-- Indexes for table `options_mst`
--
ALTER TABLE `options_mst`
  ADD PRIMARY KEY (`option_c`),
  ADD KEY `ix1` (`option_c`),
  ADD KEY `ix2` (`option_type`);

--
-- Indexes for table `page_data`
--
ALTER TABLE `page_data`
  ADD PRIMARY KEY (`page_c`),
  ADD KEY `ix1` (`page_c`),
  ADD KEY `ix2` (`title`),
  ADD KEY `ix3` (`friendly_url`),
  ADD KEY `ix7` (`status`),
  ADD KEY `ox10` (`ent_dt`),
  ADD KEY `ic2` (`page_type`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `views` (`views`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `permissions_mst`
--
ALTER TABLE `permissions_mst`
  ADD PRIMARY KEY (`permission_c`),
  ADD KEY `ix1` (`permission_c`),
  ADD KEY `ix2` (`status`),
  ADD KEY `title` (`title`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `plugin_hook_data`
--
ALTER TABLE `plugin_hook_data`
  ADD KEY `ix1` (`plugin_dir`),
  ADD KEY `ix2` (`hook_key`),
  ADD KEY `ix3` (`status`);

--
-- Indexes for table `plugin_mst`
--
ALTER TABLE `plugin_mst`
  ADD PRIMARY KEY (`plugin_dir`),
  ADD KEY `ix1` (`plugin_dir`),
  ADD KEY `ix2` (`status`);

--
-- Indexes for table `post_cache_data`
--
ALTER TABLE `post_cache_data`
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
ALTER TABLE `post_data`
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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `password` (`password`),
  ADD KEY `upd_dt` (`upd_dt`);

--
-- Indexes for table `post_tag_data`
--
ALTER TABLE `post_tag_data`
  ADD KEY `ix1` (`post_c`),
  ADD KEY `ix2` (`tag`);

--
-- Indexes for table `post_tag_view_data`
--
ALTER TABLE `post_tag_view_data`
  ADD KEY `ix1` (`tag`),
  ADD KEY `ix2` (`ent_dt`);

--
-- Indexes for table `post_type_data`
--
ALTER TABLE `post_type_data`
  ADD KEY `ix1` (`type_c`),
  ADD KEY `ix2` (`ent_dt`);

--
-- Indexes for table `post_view_data`
--
ALTER TABLE `post_view_data`
  ADD KEY `ix1` (`post_c`),
  ADD KEY `ix3` (`user_agent`),
  ADD KEY `ix4` (`ip_add`),
  ADD KEY `ix5` (`ent_dt`);

--
-- Indexes for table `ppv_fb_survey_data`
--
ALTER TABLE `ppv_fb_survey_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `ppv_payment_data`
--
ALTER TABLE `ppv_payment_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiver_user_id` (`receiver_user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `status` (`status`),
  ADD KEY `is_verify` (`is_verify`);

--
-- Indexes for table `ppv_payment_method`
--
ALTER TABLE `ppv_payment_method`
  ADD KEY `payment_method` (`payment_method`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `ppv_post_views_summaries_daily_data`
--
ALTER TABLE `ppv_post_views_summaries_daily_data`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `view_dt` (`view_dt`),
  ADD KEY `country_code` (`country_code`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `author_username` (`author_username`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `ppv_ref_link_data`
--
ALTER TABLE `ppv_ref_link_data`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_id` (`link_id`),
  ADD KEY `link_c` (`link_c`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `ppv_survey_answer_data`
--
ALTER TABLE `ppv_survey_answer_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `ppv_survey_question_data`
--
ALTER TABLE `ppv_survey_question_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `ppv_task_data`
--
ALTER TABLE `ppv_task_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `ppv_task_result_data`
--
ALTER TABLE `ppv_task_result_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppv_user_data`
--
ALTER TABLE `ppv_user_data`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ppv_user_earning_data`
--
ALTER TABLE `ppv_user_earning_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher_user_id` (`publisher_user_id`),
  ADD KEY `action_type` (`action_type`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ppv_user_earn_estimate_daily_data`
--
ALTER TABLE `ppv_user_earn_estimate_daily_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher_user_id` (`publisher_user_id`),
  ADD KEY `work_dt` (`work_dt`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ppv_user_ref_friend_summaries_data`
--
ALTER TABLE `ppv_user_ref_friend_summaries_data`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `work_dt` (`work_dt`);

--
-- Indexes for table `ppv_user_views_summaries_daily_data`
--
ALTER TABLE `ppv_user_views_summaries_daily_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `view_dt` (`view_dt`),
  ADD KEY `country_code` (`country_code`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ppv_visitor_answer_data`
--
ALTER TABLE `ppv_visitor_answer_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- Indexes for table `ppv_visitor_views_data`
--
ALTER TABLE `ppv_visitor_views_data`
  ADD KEY `session_id` (`session_id`),
  ADD KEY `username` (`username`),
  ADD KEY `ip_address` (`ip_address`),
  ADD KEY `country_name` (`country_name`),
  ADD KEY `referrer_site` (`referrer_site`),
  ADD KEY `refer_user_id` (`refer_user_id`);

--
-- Indexes for table `setting_data`
--
ALTER TABLE `setting_data`
  ADD PRIMARY KEY (`key_c`),
  ADD KEY `ix1` (`key_c`),
  ADD KEY `ix2` (`title`);

--
-- Indexes for table `shortcode_data`
--
ALTER TABLE `shortcode_data`
  ADD KEY `ix1` (`name`),
  ADD KEY `ix2` (`type`),
  ADD KEY `ix3` (`dirname`);

--
-- Indexes for table `short_url_data`
--
ALTER TABLE `short_url_data`
  ADD PRIMARY KEY (`code`),
  ADD KEY `code` (`code`),
  ADD KEY `status` (`status`),
  ADD KEY `ent_dt` (`ent_dt`);

--
-- Indexes for table `theme_hook_data`
--
ALTER TABLE `theme_hook_data`
  ADD KEY `ix1` (`theme_dir`),
  ADD KEY `ix2` (`hook_key`),
  ADD KEY `ix3` (`status`);

--
-- Indexes for table `theme_mst`
--
ALTER TABLE `theme_mst`
  ADD PRIMARY KEY (`theme_dir`),
  ADD KEY `ix1` (`theme_dir`),
  ADD KEY `ix2` (`status`);

--
-- Indexes for table `user_api_key_data`
--
ALTER TABLE `user_api_key_data`
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
ALTER TABLE `user_api_key_permission_data`
  ADD KEY `ix1` (`api_key`),
  ADD KEY `ix2` (`permission_c`),
  ADD KEY `ix3` (`insert_id`);

--
-- Indexes for table `user_api_key_permission_mst`
--
ALTER TABLE `user_api_key_permission_mst`
  ADD PRIMARY KEY (`permission_c`),
  ADD KEY `ix1` (`permission_nm`),
  ADD KEY `ix2` (`insert_id`),
  ADD KEY `ix4` (`ent_dt`),
  ADD KEY `permission_c` (`permission_c`);

--
-- Indexes for table `user_group_mst`
--
ALTER TABLE `user_group_mst`
  ADD PRIMARY KEY (`group_c`),
  ADD KEY `group_c` (`group_c`),
  ADD KEY `title` (`title`),
  ADD KEY `status` (`status`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_info_data`
--
ALTER TABLE `user_info_data`
  ADD PRIMARY KEY (`user_c`),
  ADD KEY `user_c` (`user_c`),
  ADD KEY `country` (`country`),
  ADD KEY `city` (`city`),
  ADD KEY `zip_code` (`zip_code`),
  ADD KEY `town` (`town`),
  ADD KEY `phone_1` (`phone_1`),
  ADD KEY `phone_1_2` (`phone_1`),
  ADD KEY `gender` (`gender`),
  ADD KEY `passport` (`passport`),
  ADD KEY `business_type` (`business_type`),
  ADD KEY `is_verify_id_card` (`is_verify_id_card`);

--
-- Indexes for table `user_level_mst`
--
ALTER TABLE `user_level_mst`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `title` (`title`),
  ADD KEY `status` (`status`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `ent_dt` (`ent_dt`),
  ADD KEY `upd_dt` (`upd_dt`);

--
-- Indexes for table `user_mst`
--
ALTER TABLE `user_mst`
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
  ADD KEY `level_c` (`level_c`),
  ADD KEY `last_logined` (`last_logined`),
  ADD KEY `fullname` (`fullname`);

--
-- Indexes for table `user_online_data`
--
ALTER TABLE `user_online_data`
  ADD KEY `ix1` (`ent_dt`),
  ADD KEY `ix2` (`username`),
  ADD KEY `ix3` (`user_id`);

--
-- Indexes for table `user_permission_menu_data`
--
ALTER TABLE `user_permission_menu_data`
  ADD KEY `group_c` (`group_c`),
  ADD KEY `menu_type` (`menu_type`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_prefix_data`
--
ALTER TABLE `user_prefix_data`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `prefix` (`prefix`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cronjob_data`
--
ALTER TABLE `cronjob_data`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cronjob_log_data`
--
ALTER TABLE `cronjob_log_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emailmarketing_email_data`
--
ALTER TABLE `emailmarketing_email_data`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `emailmarketing_sent_data`
--
ALTER TABLE `emailmarketing_sent_data`
  MODIFY `send_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emailmarketing_unsubscrible_data`
--
ALTER TABLE `emailmarketing_unsubscrible_data`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_sent_data`
--
ALTER TABLE `email_sent_data`
  MODIFY `send_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kanban_board_comment_data`
--
ALTER TABLE `kanban_board_comment_data`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_data`
--
ALTER TABLE `newsletter_data`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_fb_survey_data`
--
ALTER TABLE `ppv_fb_survey_data`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_payment_data`
--
ALTER TABLE `ppv_payment_data`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_ref_link_data`
--
ALTER TABLE `ppv_ref_link_data`
  MODIFY `link_id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_survey_answer_data`
--
ALTER TABLE `ppv_survey_answer_data`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_survey_question_data`
--
ALTER TABLE `ppv_survey_question_data`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_task_data`
--
ALTER TABLE `ppv_task_data`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_task_result_data`
--
ALTER TABLE `ppv_task_result_data`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_user_earning_data`
--
ALTER TABLE `ppv_user_earning_data`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_user_earn_estimate_daily_data`
--
ALTER TABLE `ppv_user_earn_estimate_daily_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_user_views_summaries_daily_data`
--
ALTER TABLE `ppv_user_views_summaries_daily_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppv_visitor_answer_data`
--
ALTER TABLE `ppv_visitor_answer_data`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

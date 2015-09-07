-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2015 at 10:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bulbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `creatives`
--

CREATE TABLE IF NOT EXISTS `creatives` (
`creative_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `creative_wp_name` text NOT NULL,
  `location_id` int(11) NOT NULL,
  `creative_wp_description` text NOT NULL,
  `creative_img` text NOT NULL,
  `creative_website` varchar(200) NOT NULL,
  `creative_phone` varchar(100) NOT NULL,
  `creative_facebook` text NOT NULL,
  `creative_twitter` text NOT NULL,
  `creative_instagram` text NOT NULL,
  `creative_rss` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creatives`
--

INSERT INTO `creatives` (`creative_id`, `user_id`, `creative_wp_name`, `location_id`, `creative_wp_description`, `creative_img`, `creative_website`, `creative_phone`, `creative_facebook`, `creative_twitter`, `creative_instagram`, `creative_rss`) VALUES
(1, 27, 'Aldo Felix Studio', 4, 'Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam\r\nvolorrum vollam, nam id unturit, vid eatio. Lore milit voluptat arum\r\nre lam quate volum quiatis et arum harioreris a dolume remperi simet re,\r\nnet lametur re mosandem int pro con eaquodipsus volor atum fuga. Otatet\r\nquaepel igentia nitas maionse quatqui ducidi doluptatio vel id etur maiores\r\nexerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae\r\nnonse doloris moluptatus magnia delen pro con.', '1440558922_1981812_10202235434467099_5992091831295111966_n.jpg', 'www.adri.com', '06457457457', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.Instagram.com/', ''),
(2, 28, 'Felix Studio', 4, 'sdfsdf ffsf sdf sdfs f', '1440496736_candramelon.png', 'www.adri.com', '06457457457', 'https://www.facebook.com/', '', '', ''),
(3, 29, 'Afan Studio', 4, 'Afan Studio is located in Bangdung, West Java', '1440396224_10805581_579084175559937_3561041624310124907_n.jpg', 'www.afan.com', '06457457457', '', '', '', ''),
(4, 34, 'Amanah Fashion', 3, 'Amanah fashion adalah bla bla bla', '1440750087_converse_poster_by_tomzdznhd-d573zer.jpg', 'www.amanah-fashion.com', '08813502494', 'amanah fashion', '', 'amanah fashion', '');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
`feature_id` int(11) NOT NULL,
  `feature_img` text NOT NULL,
  `feature_name` text NOT NULL,
  `feature_desc` text NOT NULL,
  `feature_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`feature_id`, `feature_img`, `feature_name`, `feature_desc`, `feature_date`) VALUES
(2, '1441598993_00-VBMS-Stationery-by-Studio-Dumbar-on-BPO.jpg', '6', '<p>6</p>\r\n', '2015-09-07 06:09:53'),
(3, '1441599006_06-Masala-Weltbeat-Festival-Programme-by-Hardy-Seiler-on-BPO.jpg', '5', '<p>5</p>\r\n', '2015-09-07 06:09:06'),
(4, '1441599039_9a742b53ce77df185aa9cbde844200ab.jpg', '4', '<p>4</p>\r\n', '2015-09-07 06:09:39'),
(5, '1441599081_76ca8e389c382471c67a3a6cd2a06223.jpg', '3', '<p>3</p>\r\n', '2015-09-07 06:09:21'),
(6, '1441599089_6081ecc15fe6c0716c3b7fe45281d269.jpg', '2', '<p>2</p>\r\n', '2015-09-07 06:09:29'),
(7, '1441599101_4254841cca7aae78a727fd571019c57e.jpg', '1', '<p>1</p>\r\n', '2015-09-07 06:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`location_id` int(11) NOT NULL,
  `location_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`) VALUES
(1, 'Jakarta'),
(2, 'Bandung'),
(3, 'Surabaya'),
(4, 'Bali');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`m_id` int(11) NOT NULL,
  `user_creative_id` int(11) NOT NULL,
  `user_regular_id` int(11) NOT NULL,
  `message_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`m_id`, `user_creative_id`, `user_regular_id`, `message_id`) VALUES
(18, 34, 27, 271440793129),
(19, 27, 34, 271440793129),
(20, 34, 33, 331440793438),
(21, 33, 34, 331440793438);

-- --------------------------------------------------------

--
-- Table structure for table `message_details`
--

CREATE TABLE IF NOT EXISTS `message_details` (
`md_id` int(11) NOT NULL,
  `message_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `md_date` datetime NOT NULL,
  `md_comment` text NOT NULL,
  `md_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_details`
--

INSERT INTO `message_details` (`md_id`, `message_id`, `user_id`, `md_date`, `md_comment`, `md_status`) VALUES
(23, 271440793129, 27, '2015-08-28 22:08:49', 'test ni', 0),
(24, 331440793438, 33, '2015-08-28 22:08:58', 'test ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_img` text NOT NULL,
  `news_name` text NOT NULL,
  `news_description` text NOT NULL,
  `news_type_id` int(11) NOT NULL,
  `news_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `user_id`, `news_img`, `news_name`, `news_description`, `news_type_id`, `news_date`) VALUES
(1, 28, '1440235827_MTI5MDI2MTk5NDM0NDI0Mjkw.jpg', 'Fashion Photography Workshop\r\nwith Andre Wiredja', 'Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusamvolorrum vollam, nam id unturit, vid eatio. Lore milit voluptat arum relam quate volum quiatis et arum harioreris a dolume remperi simet re, netlametur re mosandem int pro con eaquodipsus volor atum fuga. Otatet quaepeligentia nitas maionse quatqui ducidi doluptatio vel id etur maiores exererorescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse dolorismoluptatus magnia delen pro con.Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusamvolorrum vollam, nam id unturit, vid eatio. Lore milit voluptat arum relam quate volum quiatis et arum harioreris a dolume remperi simet re, netlametur re mosandem int pro con eaquodipsus volor atum fuga. Otatet quaepeligentia nitas maionse quatqui ducidi doluptatio vel id etur maiores exererorescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse dolorismoluptatus magnia delen pro con.Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusamvolorrum vollam, nam id unturit, vid eatio. Lore milit voluptat arum relam quate volum quiatis et arum harioreris a dolume remperi simet re, netlametur re mosandem int pro con eaquodipsus volor atum fuga. Otatet quaepeligentia nitas maionse quatqui ducidi doluptatio vel id etur maiores exererorescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse dolorismoluptatus magnia delen pro con.Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusamvolorrum vollam, nam id unturit, vid eatio. Lore milit voluptat arum relam quate volum quiatis et arum harioreris a dolume remperi simet re, netlametur re mosandem int pro con eaquodipsus volor atum fuga. Otatet quaepeligentia nitas maionse quatqui ducidi doluptatio vel id etur maiores exererorescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse dolorismoluptatus magnia delen pro con.', 1, '2015-08-24 01:04:07'),
(2, 28, '1440235810_resume-34-662x497.png', 'Tanamera Coffee Serpong', 'Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam volorrum vollam, nam id unturit, vid\r\neatio. Lore milit voluptat arum re lam quate volum quiatis et arum harioreris a dolume remperi simet re, net lametur re\r\nmosandem int pro con eaquodipsus volor atum fuga. Otatet quaepel igentia nitas maionse quatqui ducidi doluptatio\r\nvel id etur maiores exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse doloris moluptatus\r\nmagnia delen pro con.', 2, '2015-08-24 02:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `news_types`
--

CREATE TABLE IF NOT EXISTS `news_types` (
`news_type_id` int(11) NOT NULL,
  `news_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_types`
--

INSERT INTO `news_types` (`news_type_id`, `news_type_name`) VALUES
(1, 'Workshop'),
(2, 'Event'),
(3, 'Features'),
(4, 'Tips');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`page_id` int(11) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `page_content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_content`) VALUES
(1, 'Privacy Policy', '<p>Privacy Policy Content</p>\r\n'),
(2, 'Terms Of Use', '<p>Terms Of Use Content</p>\r\n'),
(3, 'About Us', 'About Us');

-- --------------------------------------------------------

--
-- Table structure for table `profile_categories`
--

CREATE TABLE IF NOT EXISTS `profile_categories` (
`pc_id` int(11) NOT NULL,
  `pc_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_categories`
--

INSERT INTO `profile_categories` (`pc_id`, `pc_name`) VALUES
(1, 'Graphic Design'),
(2, 'Photography'),
(3, 'Interior Design'),
(4, 'Fashion Design'),
(5, 'Product design');

-- --------------------------------------------------------

--
-- Table structure for table `profile_detail_categories`
--

CREATE TABLE IF NOT EXISTS `profile_detail_categories` (
`pdc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_detail_categories`
--

INSERT INTO `profile_detail_categories` (`pdc_id`, `user_id`, `pc_id`) VALUES
(90, 29, 1),
(91, 29, 2),
(92, 29, 3),
(95, 28, 1),
(96, 28, 2),
(112, 34, 4),
(113, 34, 5),
(120, 27, 2),
(121, 27, 3),
(122, 27, 4);

-- --------------------------------------------------------

--
-- Table structure for table `profile_likes`
--

CREATE TABLE IF NOT EXISTS `profile_likes` (
`pl_id` int(11) NOT NULL,
  `user_creative_id` int(11) NOT NULL,
  `user_regular_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_likes`
--

INSERT INTO `profile_likes` (`pl_id`, `user_creative_id`, `user_regular_id`) VALUES
(7, 29, 28),
(10, 27, 29),
(15, 29, 27),
(18, 28, 27),
(19, 27, 33);

-- --------------------------------------------------------

--
-- Table structure for table `profile_reviews`
--

CREATE TABLE IF NOT EXISTS `profile_reviews` (
`pr_id` int(11) NOT NULL,
  `user_creative_id` int(11) NOT NULL,
  `user_regular_id` int(11) NOT NULL,
  `pr_rating` int(11) NOT NULL,
  `pr_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_reviews`
--

INSERT INTO `profile_reviews` (`pr_id`, `user_creative_id`, `user_regular_id`, `pr_rating`, `pr_description`) VALUES
(2, 28, 27, 4, 'Good studio'),
(3, 28, 29, 2, 'enough'),
(4, 27, 29, 5, 'Very good studio'),
(5, 29, 27, 4, 'Enough'),
(6, 28, 33, 5, 'bagus banget'),
(7, 27, 33, 3, 'So good');

-- --------------------------------------------------------

--
-- Table structure for table `profile_views`
--

CREATE TABLE IF NOT EXISTS `profile_views` (
`pv_id` int(11) NOT NULL,
  `user_creative_id` int(11) NOT NULL,
  `user_regular_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_views`
--

INSERT INTO `profile_views` (`pv_id`, `user_creative_id`, `user_regular_id`) VALUES
(6, 28, 27),
(7, 29, 27),
(8, 29, 28),
(9, 27, 29),
(10, 27, 0),
(11, 28, 29),
(12, 28, 0),
(13, 28, 33),
(14, 27, 27),
(15, 27, 28),
(16, 27, 33),
(17, 34, 34),
(18, 34, 27),
(19, 27, 34),
(20, 34, 29),
(21, 28, 34),
(22, 27, 11);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`project_id` int(11) NOT NULL,
  `creative_id` int(11) NOT NULL,
  `project_img` text NOT NULL,
  `project_name` text NOT NULL,
  `project_description` text NOT NULL,
  `project_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `creative_id`, `project_img`, `project_name`, `project_description`, `project_date`) VALUES
(21, 1, '1440235247_best-logo-2013-48.jpg', 'Tanamera Coffee Serpong', 'Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam volorrum vollam, nam id unturit, videatio. Lore milit voluptat arum re lam quate volum quiatis et arum harioreris a dolume remperi simet re, net lametur remosandem int pro con eaquodipsus volor atum fuga. Otatet quaepel igentia nitas maionse quatqui ducidi doluptatiovel id etur maiores exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse doloris moluptatusmagnia delen pro con.', '2015-08-22 11:08:47'),
(22, 1, '1440235283_best-logo-2013-2.jpg', 'Tanamera Coffee Serpong Again', 'Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam volorrum vollam, nam id unturit, vid\r\neatio. Lore milit voluptat arum re lam quate volum quiatis et arum harioreris a dolume remperi simet re, net lametur re\r\nmosandem int pro con eaquodipsus volor atum fuga. Otatet quaepel igentia nitas maionse quatqui ducidi doluptatio\r\nvel id etur maiores exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse doloris moluptatus\r\nmagnia delen pro con.', '2015-08-22 11:08:23'),
(23, 1, '1440235326_2.jpg', 'Tanamera Coffee Serpong Again second', 'Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam volorrum vollam, nam id unturit, vid\r\neatio. Lore milit voluptat arum re lam quate volum quiatis et arum harioreris a dolume remperi simet re, net lametur re\r\nmosandem int pro con eaquodipsus volor atum fuga. Otatet quaepel igentia nitas maionse quatqui ducidi doluptatio\r\nvel id etur maiores exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse doloris moluptatus\r\nmagnia delen pro con.', '2015-08-22 11:08:06'),
(25, 2, '1440235658_clash-of-heroes-wallpaper.jpg', 'Tanamera Coffee Serpong', 'Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam volorrum vollam, nam id unturit, vid\r\neatio. Lore milit voluptat arum re lam quate volum quiatis et arum harioreris a dolume remperi simet re, net lametur re\r\nmosandem int pro con eaquodipsus volor atum fuga. Otatet quaepel igentia nitas maionse quatqui ducidi doluptatio\r\nvel id etur maiores exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse doloris moluptatus\r\nmagnia delen pro con.', '2015-08-22 11:08:38'),
(26, 2, '1440235810_resume-34-662x497.png', 'Tanamera Coffee Serpong', 'Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam volorrum vollam, nam id unturit, vid\r\neatio. Lore milit voluptat arum re lam quate volum quiatis et arum harioreris a dolume remperi simet re, net lametur re\r\nmosandem int pro con eaquodipsus volor atum fuga. Otatet quaepel igentia nitas maionse quatqui ducidi doluptatio\r\nvel id etur maiores exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse doloris moluptatus\r\nmagnia delen pro con.', '2015-08-22 11:08:10'),
(27, 2, '1440235827_MTI5MDI2MTk5NDM0NDI0Mjkw.jpg', 'Tanamera Coffee Serpong', 'Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam volorrum vollam, nam id unturit, vid\r\neatio. Lore milit voluptat arum re lam quate volum quiatis et arum harioreris a dolume remperi simet re, net lametur re\r\nmosandem int pro con eaquodipsus volor atum fuga. Otatet quaepel igentia nitas maionse quatqui ducidi doluptatio\r\nvel id etur maiores exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse doloris moluptatus\r\nmagnia delen pro con.', '2015-08-22 11:08:27'),
(28, 3, '1440396280_resume-16-662x662.jpg', 'Afan Website', 'Afan Website is awesome', '2015-08-24 08:08:40'),
(29, 1, '1440477721_see-sale-logo.png', 'Test', 'ok', '2015-08-25 06:08:01'),
(30, 1, '1440477783_dashboard-design-26.jpg', 'test lagi', 'ok', '2015-08-25 06:08:03'),
(31, 1, '1440575494_transaction-mode-touch-screen.jpg', 'Restaurant New 3', 'Restaurant New 3', '2015-08-26 08:08:14'),
(32, 1, '1440575989_setting-table.jpg', 'Setting table', 'Setting table', '2015-08-26 09:08:49'),
(33, 4, '1440750132_funny-converse-background.jpg', 'Design Converse', 'Design Converse', '2015-08-28 10:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `project_detail_categories`
--

CREATE TABLE IF NOT EXISTS `project_detail_categories` (
`pdc_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_detail_categories`
--

INSERT INTO `project_detail_categories` (`pdc_id`, `project_id`, `pc_id`) VALUES
(96, 29, 1),
(97, 29, 2),
(98, 29, 3),
(99, 31, 1),
(100, 31, 2),
(101, 31, 3),
(102, 32, 2),
(103, 32, 3),
(104, 26, 1),
(105, 26, 2),
(106, 21, 1),
(107, 21, 2),
(108, 21, 3),
(109, 33, 5);

-- --------------------------------------------------------

--
-- Table structure for table `project_detail_images`
--

CREATE TABLE IF NOT EXISTS `project_detail_images` (
`pdi_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `pdi_img` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_detail_images`
--

INSERT INTO `project_detail_images` (`pdi_id`, `project_id`, `pdi_img`) VALUES
(5, 19, '1440232017_space-settings.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
`slider_id` int(11) NOT NULL,
  `slider_img` text NOT NULL,
  `slider_name` text NOT NULL,
  `slider_desc` text NOT NULL,
  `slider_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_img`, `slider_name`, `slider_desc`, `slider_date`) VALUES
(22, '1441593947_b8eb1a7ae1395617c0d52f92958c9b36.jpg', 'Verve Coffee Roasters by Manual Creative', '<p>manual</p>\r\n', '2015-09-01 15:09:15'),
(23, '1441593935_4254841cca7aae78a727fd571019c57e.jpg', 'Verve Coffee Roasters by Manual Creative', 'asdasdasd', '2015-09-01 15:09:00'),
(24, '1441596104_03-Markus-Form-Business-Card-by-Lundgren-Lindqvist-on-BPO.jpg', 'Verve Coffee Roasters by Manual Creative', '<p><span style="color:#FF0000">Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam volorrum vollam, nam id unturit, vid eatio. Lore milit voluptat arum re lam quate volum quiatis et arum harioreris a dolume remperi simet re, net lametur re mosandem int pro con eaquodipsus volor atum fuga. Otatet quaepel igentia nitas maionse quatqui ducidi doluptatio vel id etur maiores exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse doloris moluptatus magnia delen pro con.</span></p>\r\n', '2015-09-07 05:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `tr_following`
--

CREATE TABLE IF NOT EXISTS `tr_following` (
`tr_following_id` int(11) NOT NULL,
  `user_creative_id` int(11) NOT NULL,
  `user_regular_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_following`
--

INSERT INTO `tr_following` (`tr_following_id`, `user_creative_id`, `user_regular_id`) VALUES
(30, 28, 29),
(36, 28, 33),
(38, 27, 28),
(39, 27, 29),
(48, 29, 27),
(49, 27, 33);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_username` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_first_name` varchar(100) DEFAULT NULL,
  `user_last_name` varchar(100) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_phone` varchar(100) DEFAULT NULL,
  `user_img` text NOT NULL,
  `user_active_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type_id`, `user_username`, `user_password`, `user_first_name`, `user_last_name`, `user_email`, `user_phone`, `user_img`, `user_active_status`) VALUES
(11, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'melon', '', 'A0001', '03125435432', 'candramelon.png', 1),
(27, 2, 'melon', '3a2cf27458c9aa3e358f8fc0f002bff6', 'admin', 'admin', 'admin@gmail.com', NULL, '', 1),
(28, 2, 'candra', '2614ae3c375c3095dc536283672548bd', 'Candra', 'Dwi', 'admin@gmail.com', NULL, '', 1),
(29, 2, 'afan', '31d2ded22b8d2c27df1f45357f3a101b', 'afan', 'prima', 'admin@gmail.com', NULL, '', 1),
(33, 3, 'andri', '6bd3108684ccc9dfd40b126877f850b0', 'andri 2', 'febri 2', 'andri@gmail.com', NULL, '', 1),
(34, 2, 'widhi', '8ff86798710db76b2187852c3b499297', 'Widhi', 'Lestari', 'widhi@gmail.com', NULL, '', 1),
(35, 3, 'ade', 'a562cfa07c2b1213b3a5c99b756fc206', 'ade', 'ade', 'ade@gmail.co', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_facebook`
--

CREATE TABLE IF NOT EXISTS `users_facebook` (
`id` int(10) unsigned NOT NULL,
  `oauth_provider` varchar(10) DEFAULT NULL,
  `oauth_uid` text,
  `username` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
`user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `user_type_name`) VALUES
(1, 'Administrator'),
(2, 'Creatives'),
(3, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE IF NOT EXISTS `workshops` (
`workshop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `workshop_img` text NOT NULL,
  `workshop_name` text NOT NULL,
  `workshop_description` text NOT NULL,
  `workshop_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`workshop_id`, `user_id`, `workshop_img`, `workshop_name`, `workshop_description`, `workshop_date`) VALUES
(1, 28, '1440235247_best-logo-2013-48.jpg', 'Tanamera Coffee Serpong', 'Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam volorrum vollam, nam id unturit, videatio. Lore milit voluptat arum re lam quate volum quiatis et arum harioreris a dolume remperi simet re, net lametur remosandem int pro con eaquodipsus volor atum fuga. Otatet quaepel igentia nitas maionse quatqui ducidi doluptatiovel id etur maiores exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse doloris moluptatusmagnia delen pro con.', '2015-08-24 01:01:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creatives`
--
ALTER TABLE `creatives`
 ADD PRIMARY KEY (`creative_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
 ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `message_details`
--
ALTER TABLE `message_details`
 ADD PRIMARY KEY (`md_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_types`
--
ALTER TABLE `news_types`
 ADD PRIMARY KEY (`news_type_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `profile_categories`
--
ALTER TABLE `profile_categories`
 ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `profile_detail_categories`
--
ALTER TABLE `profile_detail_categories`
 ADD PRIMARY KEY (`pdc_id`);

--
-- Indexes for table `profile_likes`
--
ALTER TABLE `profile_likes`
 ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `profile_reviews`
--
ALTER TABLE `profile_reviews`
 ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `profile_views`
--
ALTER TABLE `profile_views`
 ADD PRIMARY KEY (`pv_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_detail_categories`
--
ALTER TABLE `project_detail_categories`
 ADD PRIMARY KEY (`pdc_id`);

--
-- Indexes for table `project_detail_images`
--
ALTER TABLE `project_detail_images`
 ADD PRIMARY KEY (`pdi_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
 ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tr_following`
--
ALTER TABLE `tr_following`
 ADD PRIMARY KEY (`tr_following_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_facebook`
--
ALTER TABLE `users_facebook`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
 ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
 ADD PRIMARY KEY (`workshop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creatives`
--
ALTER TABLE `creatives`
MODIFY `creative_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `message_details`
--
ALTER TABLE `message_details`
MODIFY `md_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news_types`
--
ALTER TABLE `news_types`
MODIFY `news_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `profile_categories`
--
ALTER TABLE `profile_categories`
MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `profile_detail_categories`
--
ALTER TABLE `profile_detail_categories`
MODIFY `pdc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `profile_likes`
--
ALTER TABLE `profile_likes`
MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `profile_reviews`
--
ALTER TABLE `profile_reviews`
MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `profile_views`
--
ALTER TABLE `profile_views`
MODIFY `pv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `project_detail_categories`
--
ALTER TABLE `project_detail_categories`
MODIFY `pdc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `project_detail_images`
--
ALTER TABLE `project_detail_images`
MODIFY `pdi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tr_following`
--
ALTER TABLE `tr_following`
MODIFY `tr_following_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users_facebook`
--
ALTER TABLE `users_facebook`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
MODIFY `workshop_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

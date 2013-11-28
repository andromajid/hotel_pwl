-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2013 at 03:45 PM
-- Server version: 5.5.31-0ubuntu0.13.04.1-log
-- PHP Version: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hotel_pwl`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel_booking`
--

CREATE TABLE IF NOT EXISTS `hotel_booking` (
  `hotel_booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_boking_start_date` date DEFAULT NULL,
  `hotel_boking_end_date` date DEFAULT NULL,
  `hotel_boking_name` varchar(255) NOT NULL,
  `hotel_boking_phone` varchar(63) DEFAULT NULL,
  `hotel_boking_email` varchar(255) DEFAULT NULL,
  `hotel_booking_notes` text,
  `hotel_booking_hotel_room_id` int(11) NOT NULL,
  PRIMARY KEY (`hotel_booking_id`),
  KEY `hotel_booking_hotel_room_id` (`hotel_booking_hotel_room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hotel_booking`
--

INSERT INTO `hotel_booking` (`hotel_booking_id`, `hotel_boking_start_date`, `hotel_boking_end_date`, `hotel_boking_name`, `hotel_boking_phone`, `hotel_boking_email`, `hotel_booking_notes`, `hotel_booking_hotel_room_id`) VALUES
(1, '2013-11-28', '2013-11-30', 'Andro Majid', '08231313', 'andromajid@gmail.com', NULL, 0),
(2, '2013-11-28', '2013-11-30', 'Andro Majid', '08231313', 'andromajid@gmail.com', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_administrator`
--

CREATE TABLE IF NOT EXISTS `site_administrator` (
  `admin_id` int(15) NOT NULL AUTO_INCREMENT,
  `admin_group_id` int(15) NOT NULL DEFAULT '0',
  `admin_username` varchar(255) NOT NULL DEFAULT 'esoft',
  `admin_password` varchar(255) NOT NULL DEFAULT 'willyoubethere',
  `admin_last_login` datetime DEFAULT '0000-00-00 00:00:00',
  `admin_is_active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `site_administrator`
--

INSERT INTO `site_administrator` (`admin_id`, `admin_group_id`, `admin_username`, `admin_password`, `admin_last_login`, `admin_is_active`) VALUES
(6, 1, 'bonus1', '827ccb0eea8a706c4c34a16891f84e7b', '2013-03-13 00:35:16', '1'),
(5, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2013-11-28 14:39:57', '1');

-- --------------------------------------------------------

--
-- Table structure for table `site_administrator_group`
--

CREATE TABLE IF NOT EXISTS `site_administrator_group` (
  `admin_group_id` int(15) NOT NULL AUTO_INCREMENT,
  `admin_group_title` varchar(255) NOT NULL,
  `admin_group_is_active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `site_administrator_group`
--

INSERT INTO `site_administrator_group` (`admin_group_id`, `admin_group_title`, `admin_group_is_active`) VALUES
(1, 'admin paling top1', '1'),
(9, 'Admin Bonus', '1');

-- --------------------------------------------------------

--
-- Table structure for table `site_config`
--

CREATE TABLE IF NOT EXISTS `site_config` (
  `config_id` int(15) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) NOT NULL,
  `config_data` text NOT NULL,
  PRIMARY KEY (`config_id`),
  KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `site_config`
--

INSERT INTO `site_config` (`config_id`, `config_name`, `config_data`) VALUES
(1, 'website_title', 's:5:"Hotel";'),
(2, 'website_keyword', 's:5:"hotel";'),
(3, 'website_description', 's:5:"hotel";'),
(15, 'mlm_price', 'i:0;'),
(16, 'mlm_email', 's:20:"andromajid@gmail.com";');

-- --------------------------------------------------------

--
-- Table structure for table `site_controller_action`
--

CREATE TABLE IF NOT EXISTS `site_controller_action` (
  `con_action_id` int(14) NOT NULL AUTO_INCREMENT,
  `con_action_data` varchar(127) DEFAULT NULL,
  PRIMARY KEY (`con_action_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `site_controller_action`
--

INSERT INTO `site_controller_action` (`con_action_id`, `con_action_data`) VALUES
(1, 'admin.default.index'),
(2, 'admin.file.index'),
(3, 'admin.menu.create'),
(4, 'admin.menu.update'),
(5, 'admin.menu.list'),
(6, 'admin.menu.index'),
(7, 'admin.page.view'),
(8, 'admin.page.create'),
(9, 'admin.page.update'),
(10, 'admin.page.delete'),
(11, 'admin.page.index'),
(12, 'admin.page.list'),
(13, 'admin.user.create'),
(14, 'admin.user.update'),
(15, 'admin.user.delete'),
(16, 'admin.user.index'),
(17, 'admin.user.right'),
(18, 'admin.usergroup.index'),
(19, 'admin.usergroup.update'),
(20, 'admin.usergroup.delete'),
(21, 'admin.usergroup.create'),
(22, 'admin.default.login'),
(23, 'admin.default.logout'),
(24, 'admin.page.upload'),
(25, 'admin.file.frame'),
(26, 'admin.page.getjson'),
(27, 'admin.file.connector'),
(28, 'admin.member.view'),
(29, 'admin.member.create'),
(30, 'admin.member.update'),
(31, 'admin.member.delete'),
(32, 'admin.member.index'),
(33, 'admin.member.admin'),
(34, 'admin.transfer.index'),
(35, 'admin.member.list'),
(36, 'admin.member.password'),
(37, 'admin.aktivasi.view'),
(38, 'admin.aktivasi.create'),
(39, 'admin.aktivasi.update'),
(40, 'admin.aktivasi.list'),
(41, 'admin.aktivasi.generate'),
(42, 'admin.aktivasi.file_list'),
(43, 'member.bonus.index'),
(44, 'member.bonus.log'),
(45, 'member.bonus.report'),
(46, 'member.geneology.view_network'),
(47, 'member.geneology.sponsoring'),
(48, 'member.geneology.report'),
(49, 'member.login.index'),
(50, 'member.login.logout'),
(51, 'member.profile.index'),
(52, 'member.profile.edit_password'),
(53, 'admin.member.login'),
(54, 'admin.transfer.history'),
(55, 'admin.reward.view'),
(56, 'admin.reward.create'),
(57, 'admin.reward.update'),
(58, 'admin.reward.index'),
(59, 'admin.bank.view'),
(60, 'admin.bank.create'),
(61, 'admin.bank.update'),
(62, 'admin.bank.delete'),
(63, 'admin.bank.list'),
(64, 'admin.support.view'),
(65, 'admin.support.create'),
(66, 'admin.support.update'),
(67, 'admin.support.delete'),
(68, 'admin.support.index'),
(69, 'admin.support.admin'),
(70, 'admin.reward.memberlist'),
(71, 'admin.reward.member_list'),
(72, 'admin.config.website'),
(73, 'admin.dashboard.index'),
(74, 'admin.news.view'),
(75, 'admin.news.create'),
(76, 'admin.news.update'),
(77, 'admin.news.delete'),
(78, 'admin.news.index'),
(79, 'admin.news.list'),
(80, 'admin.gallery.list'),
(81, 'admin.gallery.create'),
(82, 'admin.gallery.update'),
(83, 'admin.gallery.delete'),
(84, 'admin.gallery.view'),
(85, 'admin.testimonial.list'),
(86, 'admin.testimonial.create'),
(87, 'admin.testimonial.update'),
(88, 'admin.testimonial.delete'),
(89, 'admin.testimonial.view'),
(90, 'admin.aktivasi.search_serial_pin'),
(91, 'admin.aktivasi.view_pin'),
(92, 'admin.gallery.index'),
(93, 'admin.gallery_category.view'),
(94, 'admin.gallery_category.create'),
(95, 'admin.gallery_category.update'),
(96, 'admin.gallery_category.delete'),
(97, 'admin.gallery_category.list'),
(98, 'admin.report.index'),
(99, 'admin.member.suspendmember'),
(100, 'admin.transfer.gettransferexcel');

-- --------------------------------------------------------

--
-- Table structure for table `site_con_action_prev`
--

CREATE TABLE IF NOT EXISTS `site_con_action_prev` (
  `con_action_prev_admin_group_id` int(14) NOT NULL DEFAULT '0',
  `con_action_prev_con_action_id` int(14) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_con_action_prev`
--

INSERT INTO `site_con_action_prev` (`con_action_prev_admin_group_id`, `con_action_prev_con_action_id`) VALUES
(1, 18),
(1, 20),
(1, 21),
(1, 14),
(1, 17),
(1, 16),
(1, 15),
(1, 13),
(1, 34),
(1, 54),
(1, 100),
(1, 89),
(1, 87),
(1, 85),
(1, 88),
(1, 86),
(1, 64),
(1, 66),
(1, 68),
(1, 67),
(1, 65),
(1, 69),
(1, 55),
(1, 57),
(1, 71),
(1, 70),
(1, 58),
(1, 56),
(1, 7),
(1, 24),
(1, 9),
(1, 12),
(1, 11),
(1, 26),
(1, 10),
(1, 8),
(1, 74),
(1, 76),
(1, 79),
(1, 78),
(1, 77),
(1, 75),
(1, 4),
(1, 5),
(1, 6),
(1, 3),
(1, 28),
(1, 30),
(1, 99),
(1, 36),
(1, 53),
(1, 35),
(1, 32),
(1, 31),
(1, 29),
(1, 33),
(1, 93),
(1, 95),
(1, 97),
(1, 96),
(1, 94),
(1, 84),
(1, 82),
(1, 80),
(1, 83),
(1, 81),
(1, 2),
(1, 25),
(1, 27),
(1, 23),
(1, 22),
(1, 1),
(1, 73),
(1, 72),
(1, 59),
(1, 61),
(1, 63),
(1, 62),
(1, 60),
(1, 91),
(1, 37),
(1, 39),
(1, 90),
(1, 40),
(1, 41),
(1, 42),
(1, 38),
(1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `site_gallery`
--

CREATE TABLE IF NOT EXISTS `site_gallery` (
  `gallery_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_gallery_category_id` int(11) unsigned NOT NULL,
  `gallery_admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `gallery_title` varchar(100) NOT NULL,
  `gallery_content` text NOT NULL,
  `gallery_image` varchar(255) DEFAULT NULL,
  `gallery_url` varchar(200) NOT NULL DEFAULT 'http://',
  `gallery_is_active` enum('0','1') NOT NULL DEFAULT '1',
  `gallery_input_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gallery_is_top` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gallery_id`),
  KEY `gallery_gallery_category_id` (`gallery_gallery_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='data gallery' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `site_gallery`
--

INSERT INTO `site_gallery` (`gallery_id`, `gallery_gallery_category_id`, `gallery_admin_id`, `gallery_title`, `gallery_content`, `gallery_image`, `gallery_url`, `gallery_is_active`, `gallery_input_datetime`, `gallery_is_top`) VALUES
(10, 8, 0, 'Banner 1', '<p>\r\n	banner</p>\r\n', '/images/gallery/social-cloud-business-enterprise-hand.jpg', 'http://', '1', '2013-03-03 15:13:50', 0),
(11, 9, 0, 'Bawah 1', '<p>\r\n	bawah</p>\r\n', '/images/gallery/banner-hokky.jpg', 'http://jogja360.com', '1', '2013-03-03 15:19:44', 0),
(12, 10, 0, 'Partner1', '<p>\r\n	partner</p>\r\n', '/images/gallery/mitra.jpg', 'http://', '1', '2013-03-03 15:22:32', 0),
(13, 11, 0, 'Album 1', '<p>\r\n	album 1</p>\r\n', '/images/gallery/Healthy-Lifestyle.jpg', 'http://', '1', '2013-03-03 15:28:47', 0),
(15, 11, 0, 'Kesehatan', '<p>kesehatan<br></p>', '/images/gallery/url.jpeg', 'http://', '1', '2013-03-16 11:45:18', 0),
(16, 11, 0, 'Hidup Sehat', '<p>sehat <br></p>', '/images/gallery/living_a_healthy_life-759360.jpg', 'http://', '1', '2013-03-16 11:45:58', 0),
(17, 11, 0, 'Seger', '<blockquote>seger</blockquote><p><br></p>', '/images/gallery/Healthy-Morning-Must-.jpg', 'http://', '1', '2013-03-16 11:53:56', 0),
(18, 7, 0, 'ngga ada judul', '<p>dasd</p>', '/images/gallery/wallpaper-2819258.jpg', 'http://', '1', '2013-11-26 11:03:04', 0),
(19, 7, 0, 'belum ada judul lagi', '<p>dsfs</p>', '/images/gallery/wallpaper-2348297.jpg', 'http://', '1', '2013-11-26 11:08:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_gallery_category`
--

CREATE TABLE IF NOT EXISTS `site_gallery_category` (
  `gallery_category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_category_title` varchar(100) DEFAULT NULL,
  `gallery_category_description` longtext,
  `gallery_category_is_active` enum('0','1') NOT NULL DEFAULT '1',
  `gallery_category_image` varchar(200) DEFAULT NULL,
  `gallery_category_is_delete` int(1) NOT NULL DEFAULT '1' COMMENT '0=> tidak bisa dihapus, 1 bisa dihapus',
  PRIMARY KEY (`gallery_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='data kategori gallery' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `site_gallery_category`
--

INSERT INTO `site_gallery_category` (`gallery_category_id`, `gallery_category_title`, `gallery_category_description`, `gallery_category_is_active`, `gallery_category_image`, `gallery_category_is_delete`) VALUES
(7, 'slide', NULL, '1', NULL, 0),
(8, 'Banner Kanan Atas', NULL, '1', NULL, 1),
(9, 'Banner Bawah', NULL, '1', NULL, 1),
(10, 'Banner Partner', NULL, '1', NULL, 1),
(11, 'Album', NULL, '1', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_menu`
--

CREATE TABLE IF NOT EXISTS `site_menu` (
  `menu_id` int(15) NOT NULL AUTO_INCREMENT,
  `menu_par_id` int(15) NOT NULL DEFAULT '0',
  `menu_title` varchar(255) DEFAULT NULL,
  `menu_description` text,
  `menu_link` varchar(255) DEFAULT NULL,
  `menu_page_id` int(15) NOT NULL DEFAULT '0',
  `menu_order_by` int(15) NOT NULL DEFAULT '0',
  `menu_location` enum('user','member','stockist','admin') NOT NULL,
  `menu_is_active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `site_menu`
--

INSERT INTO `site_menu` (`menu_id`, `menu_par_id`, `menu_title`, `menu_description`, `menu_link`, `menu_page_id`, `menu_order_by`, `menu_location`, `menu_is_active`) VALUES
(3, 0, 'System', 'Menu untuk mengelola Menu Halaman User, Halaman Member, Halaman Administrator', '', 0, 68, 'admin', '1'),
(110, 109, 'User', '', '/admin/user', 0, 46, 'admin', '1'),
(111, 109, 'Group Admin', '', '/admin/usergroup', 0, 47, 'admin', '1'),
(112, 22, 'Menu Public', '', '/admin/menu/list/type/user', 0, 48, 'admin', '1'),
(113, 0, 'Content', '', '#', 0, 65, 'admin', '1'),
(114, 113, 'File Manager', '', '/admin/file', 0, 50, 'admin', '1'),
(115, 113, 'Page', '', '/admin/page/list', 0, 51, 'admin', '1'),
(108, 22, 'Menu Admin', '', '/admin/menu/list/type/admin', 0, 44, 'admin', '1'),
(109, 3, 'Group Admin', '', '#', 0, 45, 'admin', '1'),
(22, 3, 'Menu', '', '#', 0, 3, 'admin', '1'),
(23, 4, 'Berita', '', 'admin/info/news', 0, 1, 'admin', '1'),
(24, 4, 'Promo', '', 'admin/info/promo/', 0, 2, 'admin', '1'),
(25, 4, 'Top Leader', NULL, 'index.php?do=news_admin.leaders&act=list', 0, 3, 'admin', '1'),
(26, 5, 'Daftar Kartu', '', 'admin/serial/serial_list', 0, 1, 'admin', '1'),
(27, 5, 'Pembelian Kartu Pasif', '', 'admin/serial/buy', 0, 2, 'admin', '1'),
(63, 0, 'test', NULL, 'page/view/12', 12, 1, 'member', '0'),
(81, 7, 'History', 'menu history transfer', 'admin/transfer/history/', 0, 31, 'admin', '1'),
(65, 0, 'Marketing toll', NULL, 'page/view/14', 14, 2, 'member', '0'),
(35, 16, 'Grup Administrator', NULL, 'admin/system/group_admin', 0, 1, 'admin', '1'),
(36, 16, 'User Administrator', '', 'admin/system/user', 0, 2, 'admin', '1'),
(105, 103, 'qqwe', 'qweqwe', 'qweqwe', 0, 0, 'admin', '0'),
(133, 113, 'Gallery', '', '/admin/gallery/list', 0, 66, 'admin', '1'),
(55, 13, 'Kategori Galeri', 'daftar kategori', 'admin/gallery/category', 0, 23, 'admin', '1'),
(56, 13, 'Daftar Galleri', '', 'admin/gallery', 0, 24, 'admin', '1'),
(57, 7, 'Komisi Bulanan', 'Transfer Komisi Cash', 'admin/transfer/', 0, 25, 'admin', '1'),
(60, 8, 'Daftar Reward', '', 'admin/reward/', 0, 28, 'admin', '1'),
(61, 8, 'Reward Member', '', 'admin/reward/member/', 0, 29, 'admin', '1'),
(99, 43, 'Produk', 'penambahan Produk', 'admin/product/', 0, 39, 'admin', '1'),
(90, 7, 'Komisi Harian', '', 'admin/transfer/mingguan', 0, 35, 'admin', '1'),
(107, 4, 'Test', 'asdasdas', 'sadasdasdas', 0, 1, 'admin', '1'),
(92, 91, 'Report Harian', '', 'admin/report/', 0, 37, 'admin', '1'),
(93, 91, 'Report Aktivasi', '', 'admin/report/aktivasi', 0, 38, 'admin', '1'),
(135, 0, 'Registrasi', '', 'join', 0, 0, 'user', '1'),
(101, 43, 'Daftar Excel Member List', '', '/admin/repeat_order/approval_list', 0, 41, 'admin', '1'),
(100, 43, 'Approval Repeat order', '', 'admin/repeat_order/', 0, 40, 'admin', '0'),
(102, 13, 'Slide', '', 'admin/slide', 0, 42, 'admin', '1'),
(106, 105, 'asddsad', 'dasd', 'adsdasd', 0, 43, 'admin', '1'),
(148, 133, 'Gallery', '', 'admin/gallery/list', 0, 72, 'user', '1'),
(118, 117, 'Member', '', '/admin/member/list', 0, 53, 'admin', '1'),
(119, 117, 'Transfer Komisi', '', '', 0, 54, 'admin', '1'),
(120, 117, 'Serial Aktivasi', '', '/admin/aktivasi/list', 0, 55, 'admin', '1'),
(124, 119, 'Daftar History Transfer', '', '/admin/transfer/history', 0, 57, 'admin', '1'),
(123, 119, 'Transfer Komisi', '', '/admin/transfer', 0, 56, 'admin', '1'),
(125, 117, 'Reward', '', 'admin/reward/', 0, 58, 'admin', '1'),
(126, 125, 'Daftar Reward', '', '/admin/reward', 0, 59, 'admin', '1'),
(127, 125, 'Daftar Reward Member', '', '/admin/reward/memberlist', 0, 60, 'admin', '1'),
(129, 3, 'Konfigurasi Support YM', '', '/admin/support', 0, 62, 'admin', '1'),
(130, 3, 'Konfigurasi Website', '', '/admin/config/website', 0, 63, 'admin', '1'),
(131, 113, 'Berita', '', '/admin/news/list', 0, 64, 'admin', '1'),
(132, 0, 'Dashboard', '', '/admin/dashboard', 0, 49, 'admin', '1'),
(147, 133, 'galery category', '', '/admin/gallery_category/list', 0, 71, 'admin', '1'),
(136, 0, 'Profile', '', 'profile', 0, 1, 'user', '1'),
(137, 0, 'Voucher & Reward', '', 'reward', 0, 2, 'user', '1'),
(138, 0, 'Marketing Plan', '', 'marketing-plan', 0, 3, 'user', '1'),
(139, 0, 'Testimonial', '', 'testimonial', 0, 4, 'user', '1'),
(140, 0, 'Article', '', 'article', 0, 5, 'user', '1'),
(141, 0, 'News & Event', '', 'news_event', 0, 6, 'user', '1'),
(142, 0, 'Contact Us', '', 'contact-us', 0, 7, 'user', '1'),
(143, 0, 'Web', '', '/../', 0, 14, 'admin', '1'),
(144, 120, 'Daftar Serial', '', 'aktivasi/list', 0, 69, 'admin', '1'),
(145, 120, 'Pencarian Pin', '', 'aktivasi/search_serial_pin', 0, 70, 'admin', '1'),
(146, 0, 'Kode Etik Member', 'Kode Etik', 'page/index/id/6', 0, 1, 'user', '1'),
(149, 133, 'Gallery', '', '/admin/gallery/list', 0, 72, 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `site_menu_privilege`
--

CREATE TABLE IF NOT EXISTS `site_menu_privilege` (
  `privilege_admin_group_id` int(15) NOT NULL DEFAULT '0',
  `privilege_menu_id` int(15) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_menu_privilege`
--

INSERT INTO `site_menu_privilege` (`privilege_admin_group_id`, `privilege_menu_id`) VALUES
(6, 56),
(6, 55),
(6, 13),
(6, 6),
(6, 5),
(6, 4),
(6, 22),
(2, 93),
(2, 92),
(2, 91),
(2, 84),
(2, 36),
(2, 35),
(2, 16),
(2, 56),
(2, 55),
(2, 13),
(2, 11),
(2, 10),
(2, 9),
(2, 61),
(2, 60),
(2, 8),
(2, 90),
(2, 57),
(2, 81),
(2, 7),
(2, 6),
(8, 22),
(7, 21),
(6, 3),
(2, 27),
(4, 19),
(3, 18),
(2, 26),
(9, 109),
(12, 25),
(3, 18),
(4, 19),
(6, 2),
(7, 21),
(8, 22),
(31, 14),
(2, 5),
(5, 21),
(5, 20),
(5, 3),
(5, 19),
(5, 18),
(5, 2),
(5, 1),
(5, 22),
(5, 5),
(5, 6),
(2, 24),
(2, 23),
(2, 4),
(2, 22),
(2, 20),
(2, 3),
(2, 50),
(2, 49),
(2, 2),
(1, 143),
(1, 132),
(1, 131),
(1, 149),
(1, 147),
(1, 133),
(1, 115),
(1, 114),
(1, 113),
(1, 130),
(1, 129),
(1, 108),
(1, 112),
(1, 22),
(1, 111),
(9, 110),
(9, 111),
(9, 22),
(9, 112),
(9, 108),
(1, 110),
(1, 109),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `site_news`
--

CREATE TABLE IF NOT EXISTS `site_news` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_news_category_id` int(11) unsigned NOT NULL,
  `news_admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `news_source` varchar(255) DEFAULT NULL,
  `news_title` varchar(100) NOT NULL,
  `news_subtitle` varchar(100) DEFAULT NULL,
  `news_short_content` text,
  `news_content` text NOT NULL,
  `news_video_url` varchar(300) DEFAULT NULL,
  `news_image` varchar(255) DEFAULT NULL,
  `news_is_active` enum('0','1') NOT NULL DEFAULT '0',
  `news_input_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='data berita' AUTO_INCREMENT=15 ;

--
-- Dumping data for table `site_news`
--

INSERT INTO `site_news` (`news_id`, `news_news_category_id`, `news_admin_id`, `news_source`, `news_title`, `news_subtitle`, `news_short_content`, `news_content`, `news_video_url`, `news_image`, `news_is_active`, `news_input_datetime`) VALUES
(1, 1, 1, 'http://blog.supexteam.com', 'Apakah Multi Level Marketing ?', '', 'Sukses adalah dambaan setiap orang. Tidak ada satu orangpun yang menginginkan kegagalan dalam hidupnya. Untuk mencapai prestasi kesuksesan dalam hidup Anda yang terlebih dahulu Anda punyai adalah tujuan hidup (goal setting). Tidak adanya tujuan hidup dalam diri Anda akan menyebabkan diri Anda pasif menerima apa saja yang disodorkan oleh kehidupan kepada Anda dan biasanya hidup Anda menjadi sangat menbosankan sekaligus tidak menggairahkan. ', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', NULL, '', '1', '2011-07-21 12:22:36'),
(2, 1, 2, 'http://haryantokandani.com', 'Profesionalisme', NULL, 'Dunia menuntut profesionalisme. Nilai yang kita perlu tingkatkan adalah profesionalisme dalam bermasyarakat, berorganisasi. Tahukah bahwa dunia mencari orang-orang yang profesional bahkan mereka berani bayar mahal untuk itu. Kalau dari sekarang kita mulai mengembangkan profesionalisme maka beberapa waktu dari saat ini kita akan memiliki kehidupan yang berkualitas tinggi. ', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', NULL, NULL, '1', '2011-07-21 22:10:01'),
(3, 1, 1, 'http://hanajatim.tripod.com', 'Sukses adalah Sebuah Pilihan', NULL, 'Saat ini masyarakat sudah tidak Asing lagi dengan MLM, ini menandakan bahwa bisnis mlm bukan lagi bisnis yang tabu dan di pandang sebelah mata, karena semakin terbuktinya perusahaan mlm mencetak Milyuner-milyuner baru di dunia, tunggu penawaran kami untuk anda yang mempersiapkan diri menjadi pengusaha di bisnis ini, karena uang bukan lagi menjadi halangan untuk anda memulai membangun perusahaan MLM. ', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', NULL, NULL, '1', '2011-07-21 22:11:17'),
(4, 2, 5, 'Test', 'Test Title', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', NULL, 'sock-toe.jpg', '1', '2013-02-28 20:57:56'),
(5, 2, 5, 'Test', 'Test Title', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', NULL, 'social-mobile-cloud.jpg', '1', '2013-02-28 21:02:13'),
(6, 3, 5, 'Testing Source', 'Testing', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', NULL, 'sock-toe.jpg', '1', '2013-02-28 21:43:03'),
(7, 4, 5, 'Produk 1 ', 'Produk', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', NULL, '', '1', '2013-02-28 22:17:22'),
(8, 6, 5, '', 'Promo', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', NULL, 'not_bad.jpg', '1', '2013-02-28 23:13:02'),
(9, 5, 5, '', 'Dapatkan Reword Umrah ke Tanah Suci', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', NULL, 'umrah.jpg', '1', '2013-03-02 13:28:44'),
(10, 7, 5, 'Youtube', 'For The First Time', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 'http://www.youtube.com/embed/CPEBN2dVNUY', '', '1', '2013-03-03 16:34:05'),
(11, 7, 5, 'Youtube', 'Astronout Simple Plan', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 'http://www.youtube.com/embed/N-MgRkSh5Xk', '', '1', '2013-03-03 16:45:12'),
(12, 7, 5, 'Youtube', 'The Script - If You Ever Come Back', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 'http://www.youtube.com/embed/SLJqJ6BDPnQ', '', '1', '2013-03-03 17:14:50'),
(13, 7, 5, 'Youtube', 'Maroon 5 - One More Night', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 'http://www.youtube.com/embed/fwK7ggA3-bU', '', '1', '2013-03-03 17:17:36'),
(14, 4, 5, '', 'Hokky Djoen Energy Ring Teknologi Nano', NULL, NULL, '<p>POWER RING TEKNOLOGI NANO<br>Adalah cincin terapi untuk Memperbesar dan Memperpanjang Mr.P<br>GLOW IN THE DARK POWER RING Ion Energi 300 – 400<br><br>Lebih keras &amp; lebih lama<br>Meningkatkan daya tahan seksual<br>Memperlambat ejakulasi<br>Meningkatkan intensitas dan volume orgasme<br>Mempertahankan ereksi lebih maksimal<br>Digunakan sebagai perangkat penyempitan (tourniquet) untuk pembesaran penis. <br><br>Memperbaiki control seksual laki-laki<br>Seperti yang dijelaskan sebelumnya, banyak orang mengalami kesulitan mengendalikan orgasme mereka. Power Ring secara langsung membantu orang mengendalikan kualitas orgasme mereka, tapi seiring waktu dapat membantu orang belajar bagaimana melakukan ini tanpa memakai Power Ring bila mereka menghendaki.<br><br>Banyak pria tidak puas dengan ukuran penis mereka dan telah mengambil langkah-langkah untuk meningkatkan ukuran melalui semua latihan pembesaran penis secara alami. Semua program latihan alami memberikan banyak manfaat bagi manusia dan adalah sesuatu yang kami sarankan bagi pelanggan kami peduli dengan ukuran dan kesehatan penis. Power Ring sangat aman dan efektif untuk membantu melakukan latihan secara alami. Hal ini terutama penting jika penis lebih kecil dari ukuran rata-rata.<br><br>Cara Menggunakan Power Ring. <br><br>1.Masukkan Power Ring ke Batang Penis sebelum Penis Tegang, dimana sisi yang ada Garis Melingkar / Setengah Lingkaran menghadap ke Dalam &amp; Menempel di dinding dan pastikan posisi saluran kencing ada di Bawah, bila perlu untuk mendapatkan hasil yg terbaik, cukur rambut yang tumbuh di batang Penis.<br>Jika Power Ring sulit masuk, Pegang sisi Kiri dan Kanan kemudian tarik untuk Memelarkan<br><br>2.Berikan rangsangan agar Penis Tegang &amp; Power Ring bisa langsung dipakai untuk berhubungan Intim<br>"Di awal Pemakaian anda akan merasa sedikit sakit ,di karenakan&nbsp; Power Ring menjepit Batang Penis anda, dan setelah terbiasa, semuanya akan baik baik saja."<br>Dan pasangan anda akan merasakan perbedaan dan kenikmatan yang sangat luar biasa.<br><br>3.Jika sudah selesai menggunakan, Cuci Power Ring dengan Air/Sabun ,dikeringkan, kemudian simpan di dalam Plastik<br>Pesan:<br>Power Ring dapat digunakan setiap Hari untuk melakukan Hubungan Intim :<br>Penggunaan yang disarankan untuk melakukan Hubungan Intim adalah setiap 2 hari sekali [ sekarang pakai-besok libur-pakai-libur-pakai-libur ]<br><br>1 . Power Ring Bisa dipakai hingga 30x Dari Pagi s/d Sore atau dari Sore s/d Pagi , Dan Sangat Baik digunakan saat Berhubungan Intim.<br>Dikarenakan Ring menjepit Batang Penis, Jadi Power Ring tidak akan lepas / tertinggal pada saat anda melakukan Hubungan Intim<br>Untuk mendapatkan hasil yang Maksimal , Membesarkan, Memanjangkan dengan memakai&nbsp; Power Ring Secara Rutin setiap dua (2) Hari Sekali<br>Di awal pemakaian Jika anda tidak bisa melihat perbedaan yang terjadi di Penis anda , Tanyalah pada Partner/Pasangan anda , Tanyakan bagaimana Rasanya /Enak ,kan Jika melakukan Hubungan Intim dengan menggunakan Power Ring atau Tanpa Power RIng<br>Kenapa Bisa Begitu??? Ini LogikaNya<br>Ereksi terjadi ketika penis terisi darah. Sejumlah kecil darah memasuki Corpus spongiosum, yang merupakan ruangan yang digunakan terutama untuk buang air kecil dan ejakulasi. Sisa darah masuk ke corpus cavernosum, yang merupakan jaringan mirip spons yang bertindak sebagai darah utama ruang memegang penis. Bahkan, Corpus cavernosum adalah tempat di mana lebih dari 90% dari semua darah yang diadakan setiap kali Anda mencapai ereksi.<br>Memperluas kapasitas Corpus cavernosum penis melalui Power Ring<br>Energy ring alami membantu untuk benar-benar meruntuhkan dinding-dinding sel corpus cavernosum dengan memaksa darah ke jaringan ereksi yang aman, terkendali. Setiap kali hal ini dilakukan, sel-sel yang berkembang di luar batasan normal mereka.<br><br>Power Ring memperbaikan sel-sel, membuat mereka (penis) lebih besar dan kuat untuk menahan peningkatan aliran darah yang dihasilkan oleh energy power ring. Adaptasi ini memungkinkan penis untuk menahan lebih banyak darah daripada sebelumnya. Selama beberapa minggu, terus-menerus breakdown dan membangun kembali sel-sel dalam Corpus cavernosum setara dengan peningkatan yang nyata ukuran penis secara bertahap.<br>Oleh karena itu, rahasia nyata dan kesehatan penis secara keseluruhan adalah untuk melaksanakan <br>corpus cavernosum secara teratur menggunakan Power Ring yang dikembangkan secara khusus dan teknik, yang tidak hanya memperbaiki penis, tapi juga akan meningkatkan sirkulasi darah keseluruhan.<br><br>meningkatkan kekuatan dan kontrol ejakulasi Anda, dan meningkatkan daya tahan seksual Anda sehingga Anda dapat berlangsung selama yang Anda inginkan. Jadi, katakan padaku, apakah Anda ingin memiliki hubungan yang lebih lama, lebih tebal dan penis yang lebih sehat ?<br>Seperti dilansir WebMD, perubahan fungsi Mr.P termasuk:<br><br>Ukuran<br>Penambahan berat badan umum terjadi pada pria seiring penambahan usia. Saat lemak terakumulasi di bawah perut, ukuran Mr.P berubah.<br>"Daerah sekitar pinggang yang penuh tumpukan lemak membuat batang Mr P lebih pendek," kata Ira Sharlip MD, clinical professor of urology pada the University of California, San Francisco.<br><br>"Dalam beberapa kasus, lemak di sekitar perut dan bokong ? mengubur'' Mr P. Satu cara saya memotivasi pasien saya yang kelebihan berat badan adalah dengan mengatakan, Mr P bisa ? muncul'' beberapa inci hanya dengan menurunkan berat badan," ungkap Ronald Tamler, MD, PhD, co-director the Men''s Health Program pada Mount Sinai Hospital di New York City.<br><br>Dalam hal penyusutan tampilan, Mr.P cenderung mengalami perubahan bentuk, baik panjang maupun ketebalannya. "Kalau ereksi, kira-kira panjang Mr P 6-7 inci saat usia 30 tahun, mungkin sekitar 5 atau 5,5 inci saat usianya mencapai 60 atau 70 tahun," ungkap Irwin Goldstein MD, Director Sexual Medicine Alvarado Hospital di San Diego sekaligus editor-in-chief Journal of Sexual Medicine.<br><br>Apa yang menyebabkan Mr P menyusut? Setidaknya dua mekanisme yang mempengaruhi: Pertama, endapan zat berlemak (plak-plak) di dalam arteri Mr P yang mengganggu aliran darah menuju organ tersebut. <br>Proses ini, dikenal dengan ateroklerosis, juga memberi hambatan di dalam arteri koroner, penyebab utama serangan jantung.<br><br>Goldstein memaparkan, mekanisme lain termasuk penumpukan kolagen inelastik (lapisan tisu) secara berkala di antara serat-serat elastis yang mengelilingi bilik ereksi. Ereksi terjadi saat bilik-bilik ini terisi oleh darah. Hambatan di antara arteri Mr P-dan peningkatan bilik-bilik inelastik-menyebabkan ereksi semakin lemah.<br><br>Ukuran Mr P berubah, begitu pun testikel (kantong kemaluan). "Dimulai pada usia 40 tahun, testikel mulai menyusut. Testikel pria usia 30 tahun memiliki diameter 3 cm, dan di usia 60 tahun menjadi hanya 2 cm," ungkap Goldstein.<br><br></p>', NULL, 'produk-ring.jpg', '1', '2013-03-23 12:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `site_news_category`
--

CREATE TABLE IF NOT EXISTS `site_news_category` (
  `news_category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_category_title` varchar(100) DEFAULT NULL,
  `news_category_is_active` enum('0','1') NOT NULL DEFAULT '1',
  `news_category_description` longtext,
  PRIMARY KEY (`news_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='data kategori berita' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `site_news_category`
--

INSERT INTO `site_news_category` (`news_category_id`, `news_category_title`, `news_category_is_active`, `news_category_description`) VALUES
(1, 'No Category', '1', NULL),
(2, 'Artikel', '1', NULL),
(3, 'Berita', '1', NULL),
(4, 'Produk', '1', NULL),
(5, 'Reward', '1', NULL),
(6, 'Promo', '1', NULL),
(7, 'Video', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_page`
--

CREATE TABLE IF NOT EXISTS `site_page` (
  `page_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_par_id` int(10) unsigned NOT NULL DEFAULT '0',
  `page_key` varchar(100) DEFAULT NULL,
  `page_title` varchar(100) DEFAULT NULL,
  `page_content` longtext,
  `page_location` enum('user','member','stockist') NOT NULL,
  `page_is_active` enum('0','1') NOT NULL DEFAULT '1',
  `page_is_delete` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '0=> tidak bisa dihapus; 1=> bisa dihapus',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='data konten halaman berupa teks & gambar' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `site_page`
--

INSERT INTO `site_page` (`page_id`, `page_par_id`, `page_key`, `page_title`, `page_content`, `page_location`, `page_is_active`, `page_is_delete`) VALUES
(5, 0, NULL, 'Contact Us', '', 'user', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_support`
--

CREATE TABLE IF NOT EXISTS `site_support` (
  `support_id` int(15) NOT NULL AUTO_INCREMENT,
  `support_name` varchar(255) NOT NULL,
  `support_nick` varchar(255) NOT NULL,
  `support_phone` varchar(255) NOT NULL,
  PRIMARY KEY (`support_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `site_support`
--

INSERT INTO `site_support` (`support_id`, `support_name`, `support_nick`, `support_phone`) VALUES
(3, 'Taufik', 'taufik33', '123456'),
(4, 'Faddal', 'faddal_cisco', '12345663');

-- --------------------------------------------------------

--
-- Table structure for table `site_testimonial`
--

CREATE TABLE IF NOT EXISTS `site_testimonial` (
  `testimonial_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `testimonial_name` varchar(200) NOT NULL,
  `testimonial_content` longtext NOT NULL,
  `testimonial_is_active` int(1) NOT NULL DEFAULT '1',
  `testimonial_date` date NOT NULL,
  `testimonial_datetime` datetime NOT NULL,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `site_testimonial`
--

INSERT INTO `site_testimonial` (`testimonial_id`, `testimonial_name`, `testimonial_content`, `testimonial_is_active`, `testimonial_date`, `testimonial_datetime`) VALUES
(2, 'Guest', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 1, '2013-03-03', '2013-03-16 09:59:23'),
(3, 'Intan Dwi', 'websitenya bagus banget', 1, '2013-03-03', '2013-03-03 23:49:32');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `site_gallery`
--
ALTER TABLE `site_gallery`
  ADD CONSTRAINT `site_gallery_ibfk_1` FOREIGN KEY (`gallery_gallery_category_id`) REFERENCES `site_gallery_category` (`gallery_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `site_gallery_ibfk_2` FOREIGN KEY (`gallery_gallery_category_id`) REFERENCES `site_gallery_category` (`gallery_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

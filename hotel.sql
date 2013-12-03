-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2013 at 03:25 AM
-- Server version: 5.5.32-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hotel`
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
  `hotel_booking_hotel_room_id` int(11) DEFAULT NULL,
  `hotel_booking_is_checked` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`hotel_booking_id`),
  KEY `hotel_booking_hotel_room_id` (`hotel_booking_hotel_room_id`),
  KEY `hotel_booking_is_checked` (`hotel_booking_is_checked`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE IF NOT EXISTS `hotel_room` (
  `hotel_room_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_room_description` text,
  `hotel_room_rate` int(11) NOT NULL DEFAULT '0',
  `hotel_room_facility` text,
  `hotel_room_name` varchar(2255) NOT NULL,
  PRIMARY KEY (`hotel_room_id`),
  KEY `hotel_room_name` (`hotel_room_name`(767))
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`hotel_room_id`, `hotel_room_description`, `hotel_room_rate`, `hotel_room_facility`, `hotel_room_name`) VALUES
(11, '<p><table><tbody><tr><td><br><table><tbody><tr><td>Here we are again PHP fans, with your latest edition of&nbsp;<a href="http://phpweekly.com/">phpweekly.com</a>.<br><br>We start with a great special offer.&nbsp;25% off the purchase price of PHP Beyond The Web by Rob Aley, with a limited offer coupon exclusively for readers of&nbsp;<a href="http://phpweekly.com/">phpweekly.com</a>! See our Reading and Viewing section for details.<br><br>Two&nbsp;podcasts from dev/hell this week, one recorded before True&nbsp;North PHP, the other after.&nbsp;Plus the 3rd offering from the Elephant in the Room podcast team, discussing all kinds of Test Driven Development.<br><br>Happy reading.......<br><br>Cheers<br>Katie</td></tr><tr><td><h4><span>Articles</span></h4><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=c01b234ad8&amp;e=2650636000">What is Next For Symfony2?</a><br>Lukas Kahwe Smith takes a look at the popular PHP framework Symfony2. He asks the question what is next for the framework and where should the&nbsp;community&nbsp;next direct its attention?<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=0757c9a64d&amp;e=2650636000">Quicker, Easier, More Seductive: Restraining Your Service Locators</a><br>Paul M.Jones made a passing comment last week about service locators - "When it comes to Inversion of Control, a Service Locator is like the Dark Side of The Force: quicker, easier and more seductive. But it&nbsp;gets you&nbsp;into trouble later on. Go with Dependency Injection whenever you can instead." In this article he&nbsp;elaborates further.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=b294990786&amp;e=2650636000">Contributing Advent</a><br>As a project for this year''s advent, Derek Rethans will be making an open source contribution for each day of the period. Focusing on resolving bugs in Xdebug, PHP''s DateTime extension and OpenStreetMap, he invites readers to contribute to their favourite Open Source projects. Want to get involved?<br><br><a href="http://phpweekly.us4.list-manage2.com/track/click?u=135396dd31790e834e8629b45&amp;id=8160412177&amp;e=2650636000">Are TableGateways Worth it in Zend Framework 2?</a><br>Matthew Setter asks "Are TableGateways too hard to implement in Zend Framework 2? Are they too hard to justify the effort? That''s what I was asked recently in a Twitter conversation. For me they''re not. For me they are well worth the effort". Matthew has written this post to show why they''re not and how they bring great flexibility, when implemented correctly.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=75cef6a37a&amp;e=2650636000">The Fall of PEAR and the Rise of Composer</a><br>Ben Ramsey talks about package management in the PHP community.</td></tr><tr><td><h2>Tutorials&nbsp;and Talks</h2><div><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=814f839820&amp;e=2650636000">Using PHP Streams Effectively</a><br>In a previous article from Sitepoint several months ago, we discovered the basics of PHP streams and how powerful they are. In this tutorial we are going to learn how to use this power in the real world. First we will learn how to build custom filters and attach them to a stream, before&nbsp;packaging&nbsp;filters inside a document parser application.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=cbba892c67&amp;e=2650636000">Find and Correct Misspelled Words with Pspell</a><br>Every site could do with a search function to indicate misspellings if no or too few results have been found. PHP''s Pspell module allows for checking the spelling of a word and suggesting a replacement from it''s default dictionary, or from a customised dictionary.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=e2c0fafc56&amp;e=2650636000">Imagick vs GD</a><br>If you want to create a thumbnail, apply a filter to an image or transform it in any other way, you will have to employ an image processing library in your PHP application. It means that you will probably choose GD or ImageMagick. But which one supports a wider range of image formats? Maybe one of them is slower than the other? What other criteria should be taken into consideration when choosing the right library? Read this article to find out.<br><br><a href="http://phpweekly.us4.list-manage1.com/track/click?u=135396dd31790e834e8629b45&amp;id=0cf5a55142&amp;e=2650636000">Automated Testing with Selenium2 and PHPUnit</a><br>Selenium2 is a software testing framework for web applications. This tutorial focuses on automating browser testing using Selenium2.<br><br><a href="http://phpweekly.us4.list-manage1.com/track/click?u=135396dd31790e834e8629b45&amp;id=825b343e7b&amp;e=2650636000">Battle of the Autoloaders: PSR-0 vs PSR-4</a><br>If you''ve gone past the beginner stage&nbsp;in your PHP training, you''ve heard of PSR-0 - an autoloading standard that defines ways to automatically include PHP classes in your code. When Composer showed up and took the PHP package management world by storm, things changed. Due to some of its rules, folders often duplicated and became too deep when looking at PSR-0 class installations via Composer. Therefore some highly qualified PHP devs got together and put together a suggestion for a new standard: PSR-4.<br><br><a href="http://phpweekly.us4.list-manage2.com/track/click?u=135396dd31790e834e8629b45&amp;id=db53fb7903&amp;e=2650636000">Google App Engine and PHP: Getting Started</a><br>It''s been a while since Google announced PHP Support on Google App Engine. This article series will take you through all the necessary steps in getting your app up and running on GAE.&nbsp;This tutorial&nbsp;uses PhpStorm which supports GAE projects out of the box, but you can use any IDE of your choice.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=96c3f5b093&amp;e=2650636000">Beyond Clean Code</a><br>This is the 4th post in Anthony Ferrara''s "Beyond" series. The three previous posts focused on reimagining OOP and questioning some of the core beliefs that we have come to take for granted. This one is slightly different, in that he talks about another angle of writing code: the process itself. People always talk about how code should be clean, but how do you write clean code?<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=d78e12cd28&amp;e=2650636000">Deploying a Laravel Application Using Capistrano</a><br>So you''ve just built a fancy web application and you''re planning to put it online. This can be done in many ways. This article covers one approach to deploy your backend system to your production server. It will go through the following steps through the example of a Laravel application, but this can be applied to any other language or technology.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=18ee6d1be1&amp;e=2650636000">The Repository Design Pattern</a><br>The Repository Design Pattern is one of the most useful and widely applicable design patterns ever invented. Any application has to work with persistence and with some kind of list of items. The problem that all of these list management logics have in common is how to connect business logic, factories and persistence.</div></td></tr><tr><td>News and Announcements<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=fcdb1bb9d8&amp;e=2650636000">WordPress 3.8 Beta 1</a><br>The first Beta of the 3.8 is now available. The next dates to watch out for are code freeze on<span>December 5th</span>&nbsp;and a final release on&nbsp;<span>December 12th</span>.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=658c94b135&amp;e=2650636000">Joomla!&nbsp;<span>2.5.16</span>&nbsp;Released</a><br>The Joomla Project is pleased to announce the immediate availability of Joomla&nbsp;<span>2.5.16</span>.<br><br><a href="http://phpweekly.us4.list-manage1.com/track/click?u=135396dd31790e834e8629b45&amp;id=03ee185971&amp;e=2650636000">Drupal 7.24 and 6.29 Released</a><br>Drupal 7.24 and Drupal 6.29, maintenance releases which contain fixes for security vulnerabilities, are now available for download.<br><br><a href="http://phpweekly.us4.list-manage1.com/track/click?u=135396dd31790e834e8629b45&amp;id=3af95dc046&amp;e=2650636000">php.net Modern Web Theme Goes Live!</a><br>The PHP web team are delighted to announce the launch of the new web theme that has been in beta for many months.</td></tr><tr><td><h2><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=0529a94501&amp;e=2650636000">Reading and Viewing</a></h2><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=da4c518818&amp;e=2650636000">PHP Beyond The Web (by Rob Aley, out now) - 25% off Coupon Exclusively for subscribers to phpweekly.com!</a><br>Ever get the feeling that PHP could be useful for more than just websites? "PHP Beyond The Web" by Rob Aley is a new book that will show you how to write CLI scripts, system daemons, desktop software and more, all using your existing PHP skills. For one week only PHP Weekly News readers can save 25% by using coupon code ohSoVytlOEal at<a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=0153d2fb26&amp;e=2650636000">https://leanpub.com/php</a>&nbsp;(valid until&nbsp;<span>6th December</span>).<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=bd55317274&amp;e=2650636000">Elephant in the Room PHP Podcast Episode #3 - Schools of TDD</a><br>In this episode Konstantin and Mathias discuss the difference between fakes, stubs, mocks and spies; testing the outcome of an action; testing the communication between objects; Kent Beck-style classical TDD and the London School of TDD, with GOOS-style mockist testing.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=0aa42975dd&amp;e=2650636000">dev/hell Podcast - Episode 37 Jets V Sharks</a><br>Recorded before True North PHP, this episode features Paul M.Jones, creator of the Solar framework and Aura component library. With a broad range of topics including dependency injection and human behaviour in tribes.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=ec530f4358&amp;e=2650636000">dev/hell Podcast - Dark Secret Branding</a><br>A second offering from Chris and Ed, this one recorded after True North PHP. This episode features a chat with web developer Jonathan Snook,&nbsp;discussing Twitter application development among other things.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=62e94b7215&amp;e=2650636000">Learning FuelPHP for Effective PHP Development (by Ross Tweedie, published 21st November 2013)</a><br>FuelPHP was one of the first frameworks built for PHP 5.3. It makes use of more advanced features of the language to allow you to focus on delivering features and code for your project. This practical guide will show you how to use FuelPHP to create projects quickly and effectively.<br><br><a href="http://phpweekly.us4.list-manage1.com/track/click?u=135396dd31790e834e8629b45&amp;id=76658f33ca&amp;e=2650636000">PHP Error Reporting - How To Do It Right (by Jay Docherty, published 19th November 2013)</a><br>This book gets stuck into how do PHP error reporting well, with practical examples and downloadable code. It also takes a broader look at strategies and best practices.</td></tr><tr><td><h2>Jobs</h2>If you have a position that needs filling, let us know and we will include it.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=7ac4a83c79&amp;e=2650636000">Developer at Sailthru (New York City)</a><br>We''re searching for a talented developer who can take the challenge of scaling architectures and dive into leading technologies. You''ll have the opportunity to work with a great team, in the heart of New York City and with great benefits such as working from home. Send your resume to Federico,&nbsp;<a href="mailto:fulfo@sailthru.com">fulfo@sailthru.com</a>.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=672de65646&amp;e=2650636000">DeskPRO is hiring Full Stack PHP Developer (Symfony/AngularJS) in London or Remote.</a><br>Join our small London based team (excellent remote workers considered as well) building a large PHP application where your work will have immediate impact on our millions of end users. Lots of interesting projects coming up including adding elasticsearch and memached to our stack, writing a DeskPRO app for telephony based upon Twilio, integrating our software with other companies APIs, adding functionality to our phonegap mobile app as well as continuing the development of our core software platform.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=386318fc38&amp;e=2650636000">PHP (Drupal) developers at Torchbox (Bristol and Oxford, UK)&nbsp;</a><br>Passionate about PHP, delirious about Drupal and want to work on a wide variety of challenging yet fun projects for fantastic clients? If yes, then Torchbox would love to hear from you! In return, we can offer an enviable working environment (country park or buzzing Bristol), a competitive salary, all the usual kit and sometimes even a ski trip.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=7aaa1cb3f5&amp;e=2650636000">Full Stack Developer&nbsp;</a><br>Major television production company seeks an experienced web developer to join its digital division. The ideal candidate possesses a deep expertise and abiding love of web development, an incredible track record of producing stellar web applications (with a long list of URLs &amp; GitHub repositories to prove it), a near-supernatural work ethic and a fantastic sense of humour.<br><br><a href="http://phpweekly.us4.list-manage.com/track/click?u=135396dd31790e834e8629b45&amp;id=a977f5c4a0&amp;e=2650636000">Machine Learning / AI skills (project based)</a><br>Inovica are looking for someone to work with them on detecting ecommerce products on sites and extracting relevant information. In the first instance please email&nbsp;<a href="mailto:phpweeklyjob@inovica.com">phpweeklyjob@inovica.com</a>stating the experience you have in this field. They don''t have a job description online but will reply to every email they receive.</td></tr></tbody></table></td></tr></tbody></table><br></p>', 100000, '["AC","TV Layar Lebar"]', 'Honey Moon Suite'),
(12, '<p><i><p>Rooms</p></i><p>We provide Superior, Deluxe, and Standard Rooms, which are arranged in two hotels, that is Cepu Indah Hotel 1 and Cepu Indah Hotel 2.</p><p>All rooms contain a comfortable accommodation by providing some facilities such as air conditioner, TV with 15 channel satellites programs, and unlimited Internet access that could be found in Standard and Deluxe rooms while a refrigerator is provided in Superior rooms.</p><br></p>', 1000000, '["makan bayar sendiri","AC","TV PLasma"]', 'A Room full of an sharp object');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_image`
--

CREATE TABLE IF NOT EXISTS `hotel_room_image` (
  `hotel_room_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_room_image` varchar(255) DEFAULT NULL,
  `hotel_room_image_hotel_room_id` int(11) NOT NULL,
  PRIMARY KEY (`hotel_room_image_id`),
  KEY `hotel_room_image_hotel_room_id` (`hotel_room_image_hotel_room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `hotel_room_image`
--

INSERT INTO `hotel_room_image` (`hotel_room_image_id`, `hotel_room_image`, `hotel_room_image_hotel_room_id`) VALUES
(35, 'Screenshot from 2013-09-26 22:16:09.png', 11),
(36, 'Screenshot from 2013-09-21 06:25:18.png', 11),
(39, 'Screenshot from 2013-09-13 02:24:29.png', 11),
(40, 'rooms6.jpg', 12),
(41, 'rooms5.jpg', 12),
(42, 'rooms4.jpg', 12),
(43, 'rooms3.jpg', 12),
(44, 'rooms2.jpg', 12),
(45, 'rooms1.jpg', 12);

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
(5, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2013-12-04 01:54:19', '1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `site_config`
--

INSERT INTO `site_config` (`config_id`, `config_name`, `config_data`) VALUES
(1, 'website_title', 's:21:"http://hokkydjoen.com";'),
(2, 'website_keyword', 's:21:"http://hokkydjoen.com";'),
(3, 'website_description', 's:21:"http://hokkydjoen.com";'),
(15, 'mlm_price', 'i:2500000;');

-- --------------------------------------------------------

--
-- Table structure for table `site_controller_action`
--

CREATE TABLE IF NOT EXISTS `site_controller_action` (
  `con_action_id` int(14) NOT NULL AUTO_INCREMENT,
  `con_action_data` varchar(127) DEFAULT NULL,
  PRIMARY KEY (`con_action_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

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
(100, 'admin.transfer.gettransferexcel'),
(101, 'admin.hotel_room.view'),
(102, 'admin.hotel_room.create'),
(103, 'admin.hotel_room.update'),
(104, 'admin.hotel_room.delete'),
(105, 'admin.hotel_room.index'),
(106, 'admin.hotel_room.admin'),
(107, 'admin.hotel_room.list'),
(108, 'admin.hotel_booking.view'),
(109, 'admin.hotel_booking.create'),
(110, 'admin.hotel_booking.update'),
(111, 'admin.hotel_booking.delete'),
(112, 'admin.hotel_booking.index'),
(113, 'admin.hotel_booking.admin'),
(114, 'admin.hotel_room.delete_image');

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
(1, 101),
(1, 103),
(1, 107),
(1, 105),
(1, 114),
(1, 104),
(1, 102),
(1, 106),
(1, 108),
(1, 110),
(1, 112),
(1, 111),
(1, 109),
(1, 113),
(1, 93),
(1, 95),
(1, 97),
(1, 96),
(1, 94),
(1, 84),
(1, 82),
(1, 80),
(1, 92),
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
(1, 16),
(1, 17),
(1, 14),
(1, 21),
(1, 20),
(1, 18),
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
(19, 7, 0, 'bg', '<p>test</p>', '/images/gallery/bg.jpg', 'http://', '1', '2013-12-04 02:25:47', 0);

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
(7, 'Slide', NULL, '1', NULL, 1),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `site_menu`
--

INSERT INTO `site_menu` (`menu_id`, `menu_par_id`, `menu_title`, `menu_description`, `menu_link`, `menu_page_id`, `menu_order_by`, `menu_location`, `menu_is_active`) VALUES
(3, 0, 'System', 'Menu untuk mengelola Menu Halaman User, Halaman Member, Halaman Administrator', '', 0, 73, 'admin', '1'),
(110, 109, 'User', '', '/admin/user', 0, 46, 'admin', '1'),
(111, 109, 'Group Admin', '', '/admin/usergroup', 0, 47, 'admin', '1'),
(112, 22, 'Menu Public', '', '/admin/menu/list/type/user', 0, 48, 'admin', '1'),
(113, 0, 'Content', '', '#', 0, 68, 'admin', '1'),
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
(149, 133, 'Gallery', '', '/admin/gallery/list', 0, 72, 'admin', '1'),
(150, 0, 'Hotel', '', '', 0, 65, 'admin', '1'),
(151, 150, 'Hotel Room', '', '/admin/hotel_room/list', 0, 74, 'admin', '1'),
(152, 150, 'Hotel Book', '', '/admin/hotel_booking/admin', 0, 75, 'admin', '1');

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
(1, 152),
(1, 151),
(1, 150),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='data berita' AUTO_INCREMENT=14 ;

--
-- Dumping data for table `site_news`
--

INSERT INTO `site_news` (`news_id`, `news_news_category_id`, `news_admin_id`, `news_source`, `news_title`, `news_subtitle`, `news_short_content`, `news_content`, `news_video_url`, `news_image`, `news_is_active`, `news_input_datetime`) VALUES
(10, 7, 5, 'Youtube', 'For The First Time', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 'http://www.youtube.com/embed/CPEBN2dVNUY', '', '0', '2013-03-03 16:34:05'),
(11, 7, 5, 'Youtube', 'Astronout Simple Plan', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 'http://www.youtube.com/embed/N-MgRkSh5Xk', '', '1', '2013-03-03 16:45:12'),
(12, 7, 5, 'Youtube', 'The Script - If You Ever Come Back', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 'http://www.youtube.com/embed/SLJqJ6BDPnQ', '', '1', '2013-03-03 17:14:50'),
(13, 7, 5, 'Youtube', 'Maroon 5 - One More Night', NULL, NULL, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 'http://www.youtube.com/embed/fwK7ggA3-bU', '', '1', '2013-03-03 17:17:36');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='data konten halaman berupa teks & gambar' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `site_page`
--

INSERT INTO `site_page` (`page_id`, `page_par_id`, `page_key`, `page_title`, `page_content`, `page_location`, `page_is_active`, `page_is_delete`) VALUES
(7, 0, NULL, 'home', '<h3><i class="fa fa-check-circle"></i> Cepu Indah Hotel</h3>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <p>Located at the heart of Cepu City, Cepu Indah Hotel is Jasmine class hotel with services and facility as a three stars hotel.</p>\r\n<h3><i class="fa fa-pencil"></i> Cepu Indah Hotel</h3>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <p>A business &amp; Family style hotel in central Cepu area. A combination of Superior, Deluxe and Standard rooms are arranged in two units hotels, Cepu Indah 1 &amp; Cepu Indah 2. All rooms are providing comfortable, tasteful accommodation overlooking the hotel’s landscaped tropical gardens.</p>\r\n<h3><i class="fa fa-folder-open"></i> Cepu Indah Hotel</h3>\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <p>Cepu Indah Hotel is just five minutes drive from the train station, centrally surrounded by restaurants, amusement center, and nightlife entertainment.</p>\r\n\r\n', 'user', '1', 1),
(8, 0, NULL, 'Meeting Facilites', '<p>\r\n\r\n\r\n\r\n\r\n<i></i></p><p class="title"><i>Meeting Room</i></p>\r\n\r\n\r\n\r\n\r\n<br><p>\r\n\r\n\r\n\r\n\r\nYour Wedding, Seminar, Family Gathering or Company Event is our concern too. We provide three types of rooms to meet your purposes.\r\n\r\n\r\n\r\n\r\n</p>\r\n\r\n\r\n\r\n\r\n<center><table border="1">\r\n\r\n\r\n\r\n\r\n<tbody><tr>\r\n\r\n\r\n\r\n\r\n<td width="75px" align="center">Room</td>\r\n\r\n\r\n\r\n\r\n<td width="75px" align="center">Pax</td>\r\n\r\n\r\n\r\n\r\n<td width="100px" align="center">Sound System</td>\r\n\r\n\r\n\r\n\r\n<td width="100px" align="center">LCD Projector</td>\r\n\r\n\r\n\r\n\r\n<td width="100px" align="center">Internet Access</td>\r\n\r\n\r\n\r\n\r\n</tr>\r\n\r\n\r\n\r\n\r\n<tr>\r\n\r\n\r\n\r\n\r\n<td align="center">Anggrek</td>\r\n\r\n\r\n\r\n\r\n<td align="center">30-50</td>\r\n\r\n\r\n\r\n\r\n<td align="center" style="color:green;"><strong>Yes</strong></td>\r\n\r\n\r\n\r\n\r\n<td align="center" style="color:green;"><strong>Yes</strong></td>\r\n\r\n\r\n\r\n\r\n<td align="center" style="color:green;"><strong>Yes</strong></td>\r\n\r\n\r\n\r\n\r\n</tr>\r\n\r\n\r\n\r\n\r\n<tr>\r\n\r\n\r\n\r\n\r\n<td align="center">Teratai</td>\r\n\r\n\r\n\r\n\r\n<td align="center">50-80</td>\r\n\r\n\r\n\r\n\r\n<td align="center" style="color:green;"><strong>Yes</strong></td>\r\n\r\n\r\n\r\n\r\n<td align="center" style="color:green;"><strong>Yes</strong></td>\r\n\r\n\r\n\r\n\r\n<td align="center" style="color:green;"><strong>Yes</strong></td>\r\n\r\n\r\n\r\n\r\n</tr>\r\n\r\n\r\n\r\n\r\n<tr>\r\n\r\n\r\n\r\n\r\n<td align="center">Mawar</td>\r\n\r\n\r\n\r\n\r\n<td align="center">150-200</td>\r\n\r\n\r\n\r\n\r\n<td align="center" style="color:green;"><strong>Yes</strong></td>\r\n\r\n\r\n\r\n\r\n<td align="center" style="color:green;"><strong>Yes</strong></td>\r\n\r\n\r\n\r\n\r\n<td align="center" style="color:green;"><strong>Yes</strong></td>\r\n\r\n\r\n\r\n\r\n</tr>\r\n\r\n\r\n\r\n\r\n</tbody></table><br></center><center><br></center>\r\n\r\n\r\n\r\n\r\n<p><img src="/files/images/meet1.jpg" style="">&nbsp;<img src="/files/images/meet2.jpg" style="">&nbsp;<img src="/files/images/meet3.jpg">&nbsp;<img src="/files/images/meet4.jpg" style=""><br></p>\r\n', 'user', '1', 1),
(9, 0, NULL, 'Catering', '<p><i><p>Catering Service</p></i><p>Cepu Indah Hotel has given the best service in catering for more than 10 years for many events such as Wedding Ceremony, Seminar, Company Event, and House Party. We have professional staffs with high-qualified foods and five-stars service.</p><p>We provide a complete menu, from local cuisine to international whereas Chinese foods can be found too. Its innovation in combining menu and service will give you a splendid memory for your event.</p><p><strong>For further information please contact +62-296-424040&nbsp;</strong></p><br></p>', 'user', '1', 1),
(10, 0, NULL, 'Restaurant', '<p><i><p>Cepu Indah Resto</p></i><p>Our restaurant is opened daily for both in-house guest and outside diner. We give you a 24-hours service and convenient dining experiences by providing tasty choices of foods.</p><p>We are open for breakfast from 06:30 a.m. ? 10:30 a.m.</p><br></p>', 'user', '1', 1),
(11, 0, NULL, 'laundry', '<p><i><p>Laundry Service</p></i><p><strong>For further information, please contact +62-296-424040 and get best served for your need.</strong></p><br></p>', 'user', '1', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_booking`
--
ALTER TABLE `hotel_booking`
  ADD CONSTRAINT `hotel_booking_ibfk_1` FOREIGN KEY (`hotel_booking_hotel_room_id`) REFERENCES `hotel_room` (`hotel_room_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `hotel_room_image`
--
ALTER TABLE `hotel_room_image`
  ADD CONSTRAINT `hotel_room_image_ibfk_1` FOREIGN KEY (`hotel_room_image_hotel_room_id`) REFERENCES `hotel_room` (`hotel_room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `site_gallery`
--
ALTER TABLE `site_gallery`
  ADD CONSTRAINT `site_gallery_ibfk_1` FOREIGN KEY (`gallery_gallery_category_id`) REFERENCES `site_gallery_category` (`gallery_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `site_gallery_ibfk_2` FOREIGN KEY (`gallery_gallery_category_id`) REFERENCES `site_gallery_category` (`gallery_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

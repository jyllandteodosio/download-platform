-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2016 at 11:34 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rtlcbsasia`
--

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_ahm_country`
--

CREATE TABLE IF NOT EXISTS `rtl21016_ahm_country` (
`id` int(11) NOT NULL,
  `country_code` varchar(50) DEFAULT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `rtl21016_ahm_country`
--

INSERT INTO `rtl21016_ahm_country` (`id`, `country_code`, `country_name`, `status`) VALUES
(1, 'AD', 'ANDORRA', NULL),
(2, 'AE', 'UNITED ARAB EMIRATES', NULL),
(3, 'AF', 'AFGHANISTAN', NULL),
(4, 'AG', 'ANTIGUA AND BARBUDA', NULL),
(5, 'AI', 'ANGUILLA', NULL),
(6, 'AL', 'ALBANIA', NULL),
(7, 'AM', 'ARMENIA', NULL),
(8, 'AN', 'NETHERLANDS ANTILLES', NULL),
(9, 'AO', 'ANGOLA', NULL),
(10, 'AQ', 'ANTARCTICA', NULL),
(11, 'AR', 'ARGENTINA', NULL),
(12, 'AS', 'AMERICAN SAMOA', NULL),
(13, 'AT', 'AUSTRIA', NULL),
(14, 'AU', 'AUSTRALIA', NULL),
(15, 'AW', 'ARUBA', NULL),
(16, 'AZ', 'AZERBAIJAN', NULL),
(17, 'BA', 'BOSNIA AND HERZEGOVINA', NULL),
(18, 'BB', 'BARBADOS', NULL),
(19, 'BD', 'BANGLADESH', NULL),
(20, 'BE', 'BELGIUM', NULL),
(21, 'BF', 'BURKINA FASO', NULL),
(22, 'BG', 'BULGARIA', NULL),
(23, 'BH', 'BAHRAIN', NULL),
(24, 'BI', 'BURUNDI', NULL),
(25, 'BJ', 'BENIN', NULL),
(26, 'BM', 'BERMUDA', NULL),
(27, 'BN', 'BRUNEI DARUSSALAM', NULL),
(28, 'BO', 'BOLIVIA', NULL),
(29, 'BR', 'BRAZIL', NULL),
(30, 'BS', 'BAHAMAS', NULL),
(31, 'BT', 'BHUTAN', NULL),
(32, 'BV', 'BOUVET ISLAND', NULL),
(33, 'BW', 'BOTSWANA', NULL),
(34, 'BY', 'BELARUS', NULL),
(35, 'BZ', 'BELIZE', NULL),
(36, 'CA', 'CANADA', NULL),
(37, 'CC', 'COCOS (KEELING) ISLANDS', NULL),
(38, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', NULL),
(39, 'CF', 'CENTRAL AFRICAN REPUBLIC', NULL),
(40, 'CG', 'CONGO', NULL),
(41, 'CH', 'SWITZERLAND', NULL),
(42, 'CI', 'COTE DIVOIRE', NULL),
(43, 'CK', 'COOK ISLANDS', NULL),
(44, 'CL', 'CHILE', NULL),
(45, 'CM', 'CAMEROON', NULL),
(46, 'CN', 'CHINA', NULL),
(47, 'CO', 'COLOMBIA', NULL),
(48, 'CR', 'COSTA RICA', NULL),
(49, 'CS', 'SERBIA AND MONTENEGRO', NULL),
(50, 'CU', 'CUBA', NULL),
(51, 'CV', 'CAPE VERDE', NULL),
(52, 'CX', 'CHRISTMAS ISLAND', NULL),
(53, 'CY', 'CYPRUS', NULL),
(54, 'CZ', 'CZECH REPUBLIC', NULL),
(55, 'DE', 'GERMANY', NULL),
(56, 'DJ', 'DJIBOUTI', NULL),
(57, 'DK', 'DENMARK', NULL),
(58, 'DM', 'DOMINICA', NULL),
(59, 'DO', 'DOMINICAN REPUBLIC', NULL),
(60, 'DZ', 'ALGERIA', NULL),
(61, 'EC', 'ECUADOR', NULL),
(62, 'EE', 'ESTONIA', NULL),
(63, 'EG', 'EGYPT', NULL),
(64, 'EH', 'WESTERN SAHARA', NULL),
(65, 'ER', 'ERITREA', NULL),
(66, 'ES', 'SPAIN', NULL),
(67, 'ET', 'ETHIOPIA', NULL),
(68, 'FI', 'FINLAND', NULL),
(69, 'FJ', 'FIJI', NULL),
(70, 'FK', 'FALKLAND ISLANDS (MALVINAS)', NULL),
(71, 'FM', 'MICRONESIA, FEDERATED STATES OF', NULL),
(72, 'FO', 'FAROE ISLANDS', NULL),
(73, 'FR', 'FRANCE', NULL),
(74, 'GA', 'GABON', NULL),
(75, 'GB', 'UNITED KINGDOM', NULL),
(76, 'GD', 'GRENADA', NULL),
(77, 'GE', 'GEORGIA', NULL),
(78, 'GF', 'FRENCH GUIANA', NULL),
(79, 'GH', 'GHANA', NULL),
(80, 'GI', 'GIBRALTAR', NULL),
(81, 'GL', 'GREENLAND', NULL),
(82, 'GM', 'GAMBIA', NULL),
(83, 'GN', 'GUINEA', NULL),
(84, 'GP', 'GUADELOUPE', NULL),
(85, 'GQ', 'EQUATORIAL GUINEA', NULL),
(86, 'GR', 'GREECE', NULL),
(87, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', NULL),
(88, 'GT', 'GUATEMALA', NULL),
(89, 'GU', 'GUAM', NULL),
(90, 'GW', 'GUINEA-BISSAU', NULL),
(91, 'GY', 'GUYANA', NULL),
(92, 'HK', 'HONG KONG', NULL),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', NULL),
(94, 'HN', 'HONDURAS', NULL),
(95, 'HR', 'CROATIA', NULL),
(96, 'HT', 'HAITI', NULL),
(97, 'HU', 'HUNGARY', NULL),
(98, 'ID', 'INDONESIA', NULL),
(99, 'IE', 'IRELAND', NULL),
(100, 'IL', 'ISRAEL', NULL),
(101, 'IN', 'INDIA', NULL),
(102, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', NULL),
(103, 'IQ', 'IRAQ', NULL),
(104, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', NULL),
(105, 'IS', 'ICELAND', NULL),
(106, 'IT', 'ITALY', NULL),
(107, 'JM', 'JAMAICA', NULL),
(108, 'JO', 'JORDAN', NULL),
(109, 'JP', 'JAPAN', NULL),
(110, 'KE', 'KENYA', NULL),
(111, 'KG', 'KYRGYZSTAN', NULL),
(112, 'KH', 'CAMBODIA', NULL),
(113, 'KI', 'KIRIBATI', NULL),
(114, 'KM', 'COMOROS', NULL),
(115, 'KN', 'SAINT KITTS AND NEVIS', NULL),
(116, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', NULL),
(117, 'KR', 'KOREA, REPUBLIC OF', NULL),
(118, 'KW', 'KUWAIT', NULL),
(119, 'KY', 'CAYMAN ISLANDS', NULL),
(120, 'KZ', 'KAZAKHSTAN', NULL),
(121, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', NULL),
(122, 'LB', 'LEBANON', NULL),
(123, 'LC', 'SAINT LUCIA', NULL),
(124, 'LI', 'LIECHTENSTEIN', NULL),
(125, 'LK', 'SRI LANKA', NULL),
(126, 'LR', 'LIBERIA', NULL),
(127, 'LS', 'LESOTHO', NULL),
(128, 'LT', 'LITHUANIA', NULL),
(129, 'LU', 'LUXEMBOURG', NULL),
(130, 'LV', 'LATVIA', NULL),
(131, 'LY', 'LIBYAN ARAB JAMAHIRIYA', NULL),
(132, 'MA', 'MOROCCO', NULL),
(133, 'MC', 'MONACO', NULL),
(134, 'MD', 'MOLDOVA, REPUBLIC OF', NULL),
(135, 'MG', 'MADAGASCAR', NULL),
(136, 'MH', 'MARSHALL ISLANDS', NULL),
(137, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', NULL),
(138, 'ML', 'MALI', NULL),
(139, 'MM', 'MYANMAR', NULL),
(140, 'MN', 'MONGOLIA', NULL),
(141, 'MO', 'MACAO', NULL),
(142, 'MP', 'NORTHERN MARIANA ISLANDS', NULL),
(143, 'MQ', 'MARTINIQUE', NULL),
(144, 'MR', 'MAURITANIA', NULL),
(145, 'MS', 'MONTSERRAT', NULL),
(146, 'MT', 'MALTA', NULL),
(147, 'MU', 'MAURITIUS', NULL),
(148, 'MV', 'MALDIVES', NULL),
(149, 'MW', 'MALAWI', NULL),
(150, 'MX', 'MEXICO', NULL),
(151, 'MY', 'MALAYSIA', NULL),
(152, 'MZ', 'MOZAMBIQUE', NULL),
(153, 'NA', 'NAMIBIA', NULL),
(154, 'NC', 'NEW CALEDONIA', NULL),
(155, 'NE', 'NIGER', NULL),
(156, 'NF', 'NORFOLK ISLAND', NULL),
(157, 'NG', 'NIGERIA', NULL),
(158, 'NI', 'NICARAGUA', NULL),
(159, 'NL', 'NETHERLANDS', NULL),
(160, 'NO', 'NORWAY', NULL),
(161, 'NP', 'NEPAL', NULL),
(162, 'NR', 'NAURU', NULL),
(163, 'NU', 'NIUE', NULL),
(164, 'NZ', 'NEW ZEALAND', NULL),
(165, 'OM', 'OMAN', NULL),
(166, 'PA', 'PANAMA', NULL),
(167, 'PE', 'PERU', NULL),
(168, 'PF', 'FRENCH POLYNESIA', NULL),
(169, 'PG', 'PAPUA NEW GUINEA', NULL),
(170, 'PH', 'PHILIPPINES', NULL),
(171, 'PK', 'PAKISTAN', NULL),
(172, 'PL', 'POLAND', NULL),
(173, 'PM', 'SAINT PIERRE AND MIQUELON', NULL),
(174, 'PN', 'PITCAIRN', NULL),
(175, 'PR', 'PUERTO RICO', NULL),
(176, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', NULL),
(177, 'PT', 'PORTUGAL', NULL),
(178, 'PW', 'PALAU', NULL),
(179, 'PY', 'PARAGUAY', NULL),
(180, 'QA', 'QATAR', NULL),
(181, 'RE', 'REUNION', NULL),
(182, 'RO', 'ROMANIA', NULL),
(183, 'RU', 'RUSSIAN FEDERATION', NULL),
(184, 'RW', 'RWANDA', NULL),
(185, 'SA', 'SAUDI ARABIA', NULL),
(186, 'SB', 'SOLOMON ISLANDS', NULL),
(187, 'SC', 'SEYCHELLES', NULL),
(188, 'SD', 'SUDAN', NULL),
(189, 'SE', 'SWEDEN', NULL),
(190, 'SG', 'SINGAPORE', NULL),
(191, 'SH', 'SAINT HELENA', NULL),
(192, 'SI', 'SLOVENIA', NULL),
(193, 'SJ', 'SVALBARD AND JAN MAYEN', NULL),
(194, 'SK', 'SLOVAKIA', NULL),
(195, 'SL', 'SIERRA LEONE', NULL),
(196, 'SM', 'SAN MARINO', NULL),
(197, 'SN', 'SENEGAL', NULL),
(198, 'SO', 'SOMALIA', NULL),
(199, 'SR', 'SURINAME', NULL),
(200, 'ST', 'SAO TOME AND PRINCIPE', NULL),
(201, 'SV', 'EL SALVADOR', NULL),
(202, 'SY', 'SYRIAN ARAB REPUBLIC', NULL),
(203, 'SZ', 'SWAZILAND', NULL),
(204, 'TC', 'TURKS AND CAICOS ISLANDS', NULL),
(205, 'TD', 'CHAD', NULL),
(206, 'TF', 'FRENCH SOUTHERN TERRITORIES', NULL),
(207, 'TG', 'TOGO', NULL),
(208, 'TH', 'THAILAND', NULL),
(209, 'TJ', 'TAJIKISTAN', NULL),
(210, 'TK', 'TOKELAU', NULL),
(211, 'TL', 'TIMOR-LESTE', NULL),
(212, 'TM', 'TURKMENISTAN', NULL),
(213, 'TN', 'TUNISIA', NULL),
(214, 'TO', 'TONGA', NULL),
(215, 'TR', 'TURKEY', NULL),
(216, 'TT', 'TRINIDAD AND TOBAGO', NULL),
(217, 'TV', 'TUVALU', NULL),
(218, 'TW', 'TAIWAN, PROVINCE OF CHINA', NULL),
(219, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', NULL),
(220, 'UA', 'UKRAINE', NULL),
(221, 'UG', 'UGANDA', NULL),
(222, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', NULL),
(223, 'US', 'UNITED STATES', NULL),
(224, 'UY', 'URUGUAY', NULL),
(225, 'UZ', 'UZBEKISTAN', NULL),
(226, 'VA', 'HOLY SEE (VATICAN CITY STATE)', NULL),
(227, 'VC', 'SAINT VINCENT AND THE GRENADINES', NULL),
(228, 'VE', 'VENEZUELA', NULL),
(229, 'VG', 'VIRGIN ISLANDS, BRITISH', NULL),
(230, 'VI', 'VIRGIN ISLANDS, U.S.', NULL),
(231, 'VN', 'VIET NAM', NULL),
(232, 'VU', 'VANUATU', NULL),
(233, 'WF', 'WALLIS AND FUTUNA', NULL),
(234, 'WS', 'SAMOA', NULL),
(235, 'YE', 'YEMEN', NULL),
(236, 'YT', 'MAYOTTE', NULL),
(237, 'ZA', 'SOUTH AFRICA', NULL),
(238, 'ZM', 'ZAMBIA', NULL),
(239, 'ZW', 'ZIMBABWE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_ahm_download_stats`
--

CREATE TABLE IF NOT EXISTS `rtl21016_ahm_download_stats` (
`id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `oid` varchar(100) NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `day` int(2) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rtl21016_ahm_download_stats`
--

INSERT INTO `rtl21016_ahm_download_stats` (`id`, `pid`, `uid`, `oid`, `year`, `month`, `day`, `timestamp`, `ip`) VALUES
(1, 42, 1, '', 2016, 2, 12, 1455272679, '192.168.1.167'),
(2, 32, 1, '', 2016, 2, 15, 1455506982, '192.168.1.167'),
(3, 32, 1, '', 2016, 2, 15, 1455522289, '::1'),
(4, 98, 1, '', 2016, 3, 1, 1456803142, '::1'),
(5, 42, 1, '', 2016, 3, 1, 1456803159, '::1'),
(6, 52, 1, '', 2016, 3, 8, 1457411769, '::1'),
(7, 35, 1, '', 2016, 3, 8, 1457415770, '::1'),
(8, 42, 1, '', 2016, 3, 8, 1457427116, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_ahm_emails`
--

CREATE TABLE IF NOT EXISTS `rtl21016_ahm_emails` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `custom_data` text NOT NULL,
  `request_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_ahm_feature_products`
--

CREATE TABLE IF NOT EXISTS `rtl21016_ahm_feature_products` (
`id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `startdate` int(11) NOT NULL,
  `enddate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_ahm_licenses`
--

CREATE TABLE IF NOT EXISTS `rtl21016_ahm_licenses` (
`id` int(11) NOT NULL,
  `domain` text NOT NULL,
  `licenseno` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `oid` varchar(100) NOT NULL,
  `pid` int(11) NOT NULL,
  `activation_date` int(11) NOT NULL,
  `expire_date` int(11) NOT NULL,
  `expire_period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_ahm_orders`
--

CREATE TABLE IF NOT EXISTS `rtl21016_ahm_orders` (
  `order_id` varchar(100) NOT NULL,
  `trans_id` varchar(200) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `expire_date` int(11) NOT NULL,
  `items` text NOT NULL,
  `cart_data` text NOT NULL,
  `total` double NOT NULL,
  `order_status` enum('Pending','Processing','Completed','Cancelled','Expired') NOT NULL,
  `payment_status` enum('Pending','Processing','Completed','Bonus','Gifted','Cancelled','Refunded','Disputed','Expired') NOT NULL,
  `uid` int(11) NOT NULL,
  `ipn` text NOT NULL,
  `unit_prices` text NOT NULL,
  `subtotal` double NOT NULL,
  `discount` double NOT NULL,
  `tax` float NOT NULL,
  `order_notes` text CHARACTER SET utf8 COLLATE utf8_bin,
  `payment_method` varchar(255) DEFAULT NULL,
  `billing_info` text,
  `cart_discount` float DEFAULT NULL,
  `currency` text NOT NULL,
  `download` int(11) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `coupon_discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rtl21016_ahm_orders`
--

INSERT INTO `rtl21016_ahm_orders` (`order_id`, `trans_id`, `title`, `date`, `expire_date`, `items`, `cart_data`, `total`, `order_status`, `payment_status`, `uid`, `ipn`, `unit_prices`, `subtotal`, `discount`, `tax`, `order_notes`, `payment_method`, `billing_info`, `cart_discount`, `currency`, `download`, `IP`, `coupon_discount`) VALUES
('56bd817ae398c', '', '', 1455260026, 1486796026, 'a:1:{i:0;i:32;}', 'a:1:{i:32;a:8:{s:8:"quantity";i:1;s:9:"variation";a:0:{}s:5:"price";s:4:"1.00";s:2:"ID";i:32;s:10:"post_title";s:19:"Limitless Season 01";s:6:"prices";i:0;s:10:"variations";a:0:{}s:15:"discount_amount";d:0;}}', 1, 'Completed', 'Completed', 1, '', '', 0, 0, 0, 'a:1:{s:8:"messages";a:1:{i:1455260026;a:2:{s:4:"note";s:72:"Order Status: Completed / Payment Status: Completed / Paid with: TestPay";s:2:"by";s:8:"Customer";}}}', 'TestPay', 'a:2:{s:10:"first_name";s:4:"Dana";s:11:"order_email";s:24:"dana.bustos@7thmedia.com";}', 0, 'a:2:{s:4:"sign";s:1:"$";s:4:"code";s:3:"USD";}', 0, '192.168.1.165', 0),
('56bd81c627b80', '', '', 1455260102, 1486796102, 'a:1:{i:0;i:37;}', 'a:1:{i:37;a:8:{s:8:"quantity";i:1;s:9:"variation";a:0:{}s:5:"price";s:4:"1.00";s:2:"ID";i:37;s:10:"post_title";s:19:"Limitless Season 03";s:6:"prices";i:0;s:10:"variations";a:0:{}s:15:"discount_amount";d:0;}}', 1, 'Completed', 'Completed', 1, '', '', 0, 0, 0, 'a:1:{s:8:"messages";a:1:{i:1455260102;a:2:{s:4:"note";s:72:"Order Status: Completed / Payment Status: Completed / Paid with: TestPay";s:2:"by";s:8:"Customer";}}}', 'TestPay', 'a:2:{s:10:"first_name";s:4:"Dana";s:11:"order_email";s:24:"dana.bustos@7thmedia.com";}', 0, 'a:2:{s:4:"sign";s:1:"$";s:4:"code";s:3:"USD";}', 0, '192.168.1.165', 0),
('56bd81e2d5316', '', '', 1455260130, 1486796130, 'a:1:{i:0;i:44;}', 'a:1:{i:44;a:8:{s:8:"quantity";i:1;s:9:"variation";a:0:{}s:5:"price";s:4:"1.00";s:2:"ID";i:44;s:10:"post_title";s:12:"Scorpion S01";s:6:"prices";i:0;s:10:"variations";a:0:{}s:15:"discount_amount";d:0;}}', 1, 'Completed', 'Completed', 1, '', '', 0, 0, 0, 'a:1:{s:8:"messages";a:1:{i:1455260130;a:2:{s:4:"note";s:72:"Order Status: Completed / Payment Status: Completed / Paid with: TestPay";s:2:"by";s:8:"Customer";}}}', 'TestPay', 'a:2:{s:10:"first_name";s:4:"Dana";s:11:"order_email";s:24:"dana.bustos@7thmedia.com";}', 0, 'a:2:{s:4:"sign";s:1:"$";s:4:"code";s:3:"USD";}', 0, '192.168.1.165', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_ahm_order_items`
--

CREATE TABLE IF NOT EXISTS `rtl21016_ahm_order_items` (
`id` int(11) NOT NULL,
  `oid` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `variations` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `status` int(11) NOT NULL,
  `coupon` varchar(255) DEFAULT NULL,
  `coupon_discount` float DEFAULT NULL,
  `role_discount` float DEFAULT NULL,
  `site_commission` float DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rtl21016_ahm_order_items`
--

INSERT INTO `rtl21016_ahm_order_items` (`id`, `oid`, `pid`, `variations`, `quantity`, `price`, `status`, `coupon`, `coupon_discount`, `role_discount`, `site_commission`) VALUES
(5, '56bd817ae398c', 32, 'a:0:{}', 1, 1, 0, '', 0, NULL, NULL),
(6, '56bd81c627b80', 37, 'a:0:{}', 1, 1, 0, '', 0, NULL, NULL),
(7, '56bd81e2d5316', 44, 'a:0:{}', 1, 1, 0, '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_ahm_payment_methods`
--

CREATE TABLE IF NOT EXISTS `rtl21016_ahm_payment_methods` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `class_name` varchar(80) NOT NULL,
  `enabled` int(11) NOT NULL,
  `default` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rtl21016_ahm_payment_methods`
--

INSERT INTO `rtl21016_ahm_payment_methods` (`id`, `title`, `description`, `class_name`, `enabled`, `default`) VALUES
(1, 'PayPal', 'PayPal', 'paypal', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_ahm_withdraws`
--

CREATE TABLE IF NOT EXISTS `rtl21016_ahm_withdraws` (
`id` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_commentmeta`
--

CREATE TABLE IF NOT EXISTS `rtl21016_commentmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_comments`
--

CREATE TABLE IF NOT EXISTS `rtl21016_comments` (
`comment_ID` bigint(20) unsigned NOT NULL,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rtl21016_comments`
--

INSERT INTO `rtl21016_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Mr WordPress', '', 'https://wordpress.org/', '', '2016-02-10 09:39:11', '2016-02-10 09:39:11', 'Hi, this is a comment.\nTo delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_custom_cart`
--

CREATE TABLE IF NOT EXISTS `rtl21016_custom_cart` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `channel` varchar(50) NOT NULL,
  `meta_file` longtext,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=206 ;

--
-- Dumping data for table `rtl21016_custom_cart`
--

INSERT INTO `rtl21016_custom_cart` (`id`, `user_id`, `channel`, `meta_file`, `created_at`, `updated_at`) VALUES
(205, 1, 'entertainment', 'a:3:{s:13:"1459317541240";a:7:{s:10:"file_title";s:41:"1459317541wpdm_LIM-keyart-vert-TT105i.jpg";s:9:"file_path";s:110:"C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317541wpdm_LIM-keyart-vert-TT105i.jpg";s:12:"download_url";s:155:"http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=TptoQSeTCOMA2bq235RKo4khMkjzEa3MFLfNhp-k3Gzgj7my6RPjIvi29ihdeEN3Pel_EpfK9llHdbJbg6i8sw";s:7:"post_id";i:175;s:9:"file_type";s:5:"image";s:7:"user_id";i:1;s:5:"thumb";s:123:"http://192.168.1.167/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317541wpdm_LIM-keyart-vert-TT105i-270x296.jpg";}s:13:"1459317538416";a:7:{s:10:"file_title";s:38:"1459317538wpdm_LIM-keyart-vert104i.jpg";s:9:"file_path";s:107:"C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317538wpdm_LIM-keyart-vert104i.jpg";s:12:"download_url";s:155:"http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=swFnaLAtix5tZoLF8NUWRg2d6jpVqwROLbjNAtWSH4rpOgcfA0U5zqKw4m5ZtbIWAy7zXW3WsLIzCZvJt_xnNA";s:7:"post_id";i:175;s:9:"file_type";s:5:"image";s:7:"user_id";i:1;s:5:"thumb";s:120:"http://192.168.1.167/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317538wpdm_LIM-keyart-vert104i-270x296.jpg";}s:13:"1459317529367";a:7:{s:10:"file_title";s:39:"1459317529wpdm_LIM-keyart-horiz101i.jpg";s:9:"file_path";s:108:"C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317529wpdm_LIM-keyart-horiz101i.jpg";s:12:"download_url";s:155:"http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=UKtLFsNldSqVTRJQz4rqbr35UGOv8_GxuLrplaNzr8BvAsh4wazEWDhXk6_lg9F2Cp2lWpLt51kpo3ZaFfQV0A";s:7:"post_id";i:175;s:9:"file_type";s:5:"image";s:7:"user_id";i:1;s:5:"thumb";s:121:"http://192.168.1.167/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317529wpdm_LIM-keyart-horiz101i-270x296.jpg";}}', '2016-04-05 08:53:48', '2016-04-05 08:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_custom_reports`
--

CREATE TABLE IF NOT EXISTS `rtl21016_custom_reports` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_group` varchar(100) NOT NULL,
  `operator_group` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL,
  `file_id` varchar(100) NOT NULL,
  `file_path` varchar(300) NOT NULL,
  `download_url` varchar(300) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=334 ;

--
-- Dumping data for table `rtl21016_custom_reports`
--

INSERT INTO `rtl21016_custom_reports` (`id`, `user_id`, `country_group`, `operator_group`, `post_id`, `file_id`, `file_path`, `download_url`, `file_type`, `created_at`, `updated_at`) VALUES
(302, 25, 'PH', 'SKYCable', 175, '1459317574324', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317574wpdm_LIM-S01-Synopsis0110.pdf', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=vVaW6oEs8kQZ8xfTS5SKQPobhjMLErmLihQjWRqoui6-0KStjQYT31mdv0EFRLOwQaa6dfRKFVbxiT9S0XwuFg', 'document', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(303, 25, 'PH', 'SKYCable', 175, '1459317573300', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317573wpdm_LIM-S01-Synopsis0109.pdf', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=ndwB4-TGQTHAYgl09pfgVfGEqyOKm8BmZp5rELKRFcW2qiToYcYoSBvJqFAEj4M0E2s0_mSAFVWfXAZk9LSvmw', 'document', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(304, 25, 'PH', 'SKYCable', 175, '1459317572276', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317572wpdm_LIM-S01-Synopsis0108.pdf', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=XcNKPCnBbn1IMdp1g_kWyZg91Q9wlq_eQwEJTZsp4zQfmIjrI5JqKsdFemnOiDQ_a-fZssHmDalAxYB17Pc2yQ', 'document', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(305, 25, 'PH', 'SKYCable', 175, '1459317571116', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317571wpdm_LIM-S01-Synopsis0107.pdf', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=_At09E0cfCqvYIzV7rwsnpbRAzDU-nlBxpdg-cb5X1yymHNPK2RV6lQE24DmGHb7Z0GH5t9j5uqldSjQiuX1Cg', 'document', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(306, 25, 'PH', 'SKYCable', 175, '1459317569535', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317569wpdm_LIM-S01-Synopsis0106.pdf', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=fLF9DlDXajf37h6WOt8i0h1cp--HdkXdxlqswUG5ODMHUlBpaWyB16chYMF8n1u8K6_p8SBFBvHR62q50a4zCg', 'document', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(307, 25, 'PH', 'SKYCable', 175, '1459317568243', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317568wpdm_LIM-S01-Synopsis0105.pdf', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=3LdnhjTxOKMg3ZC3ZmL3aGp37tVQ0JStWWCkNUlVKMORC5T2aczduszpKQur6_cxHLvFUA1WXuJ0j022GStoTw', 'document', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(308, 25, 'PH', 'SKYCable', 175, '1459317567259', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317567wpdm_LIM-S01-Synopsis0104.pdf', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=HB8xX_ds5XAnLOE4ckWtXE-R418HfUmKbOpwlAURMw9Izcr9JUJSbTJnG2USerS1Zdumu0jbqZLgr1889OsnqA', 'document', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(309, 25, 'PH', 'SKYCable', 175, '1459317566235', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317566wpdm_LIM-S01-Synopsis0103.pdf', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=POXal5tHc50P2hQZXodDsY8UR7J8c5y_mJoYki-snq0HdHABFDSlND7mN-t0V3VdR-WD9QcRorGVyQNoCv9KZw', 'document', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(310, 25, 'PH', 'SKYCable', 175, '1459317565195', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317565wpdm_LIM-S01-Synopsis0102.pdf', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=PAxkMR-C4CrW6SVZKiu4ZmcoUEyhqYH4d8U4hJ4QmDHBX-fLHHKnu2hyGKEDuBDhKec0r9GDGERHCNgDmyvVLA', 'document', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(311, 25, 'PH', 'SKYCable', 175, '1459317564275', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317564wpdm_LIM-S01-Synopsis0101.pdf', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=G5POKYMdLxd-WBf51S0PelNNKkMneMde6DFtkk88paGBTI2lgW2pixkrDTzQjbyo8utLkLodD2bJ4pcy5ktNfQ', 'document', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(312, 25, 'PH', 'SKYCable', 175, '1459317541240', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317541wpdm_LIM-keyart-vert-TT105i.jpg', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=KG6ihwaGCdIXb5Y0JBLTU0KGvqjmnS7x-bzIv5J6_c6ildUcW7xpfVGz5jNUzep9BupWSD03duI2L1idTg_B7Q', 'image', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(313, 25, 'PH', 'SKYCable', 175, '1459317538416', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317538wpdm_LIM-keyart-vert104i.jpg', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=t2U8cBqQhq9vTrjEf4VaV_y3VeDcTieNRL8ZpSJQ-4zr7wXuJyN6m98mvvyBmV0uKdxqNUZ7SrlvU3_-j1BItg', 'image', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(314, 25, 'PH', 'SKYCable', 175, '1459317529367', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459317529wpdm_LIM-keyart-horiz101i.jpg', 'http://192.168.1.167/rtlcbsasia/download/limitless-4/?wpdmdl=175&ind=c0tmIVtVR4_WEK7xrWUm8syKI87YHrP79aWyeJZyZHrnTlW8KNwN-dlqUR6otuVJ0tRrSIA7VvSDPx-KXOiHqg', 'image', '2016-03-31 02:34:14', '2016-03-31 02:34:14'),
(315, 12, 'SG', 'Singtel', 42, '1459150676157', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/1459150676wpdm_show-1-featured-img.jpg', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=0lkyMYw9FWi5M1_1IiKYgK6R541VLbcstEmhPJ5ucfv_sAGsapz0hRwDTAZ_8X00Vploi8BIiBQcOYGelWt4Bw', 'image', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(316, 12, 'SG', 'Singtel', 42, '1459142784603', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-keyart-horiz-TT202i.jpg', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=xGeZZyA1zfjPdEpAmg2V5F7j8qEV6HP6ilE3XbjE1VmkONTpnQUMEOVLIEXkOPVr', 'image', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(317, 12, 'SG', 'Singtel', 42, '1459142785989', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-keyart-horiz-TT-TAG202i.jpg', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=4y5Dn8MQWyW2I3shhVArOdNPANym3-EgAypwKogk6ptou5_ulC09TqxqbkCYtmjz', 'image', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(318, 12, 'SG', 'Singtel', 42, '1459142790369', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-keyart-horiz201i.jpg', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=41TMOEdKybJ-Mo1hUfKg7dhEMpLeTsJVJj2uXVxm79tGCz-DXLT4BjHf6Ge-fsgk', 'image', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(319, 12, 'SG', 'Singtel', 42, '1459142816334', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-keyart-horiz-minilayers203i.jpg', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=xwPfcTFW8ZkOu2wXJxvVkW3IqHaHLB1dwH95S83gpKmWrBxRD7UmRFtKAI9iM8gYrwgSW8Ztq4ws03tNjeZgvQ', 'image', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(320, 12, 'SG', 'Singtel', 42, '1459148733786', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0206.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=F_5qtb_IC-L6RDMGkVlqxkAvykSvyHgaQqR8D318nYgu9f694TPwYrldmc-otAGQ', 'document', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(321, 12, 'SG', 'Singtel', 42, '1459148735072', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0207.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=1uW0DgPDOTCCEwUHHbugOxle2xopgdCxdQz1v3cWie19abCilAdg5tF2XjrPMQ4E', 'document', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(322, 12, 'SG', 'Singtel', 42, '1459148736110', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0208.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=dy3dxiceRtzpQrZniH61EF09XjI-Yc7G7GhZ2W3iSWT88VhcDwDKNTZzjqhKvfRO', 'document', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(323, 12, 'SG', 'Singtel', 42, '1459148737149', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0209.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=9tPn3yrZNOgy0Ego1KGrRaZncoEMhtdbKIvNSCoRXRgy0Tj5P2q-p6TOZ7-OCtnm', 'document', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(324, 12, 'SG', 'Singtel', 42, '1459148738051', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0210.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=VtnRWA7zAlZZv7lJACSB2aygSZmw28ihU9jo9n-eL5l4x3I5yfBS1a0wKDgoDkDL', 'document', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(325, 12, 'SG', 'Singtel', 42, '1459148739291', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0211.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=lkGbMdFuryNhDgzJDAc3zpE7B5edh6Q3XpplHNSlCSSnY5854HzgslHD569Psp2O', 'document', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(326, 12, 'SG', 'Singtel', 42, '1459148740095', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0212.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=tQhFanVJPU9JvD2q90rMI_LtZS61RwpS9apREXeat38A9Lq0-E_vHZbI2T0s9iuK', 'document', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(327, 12, 'SG', 'Singtel', 42, '1459148740950', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0213.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=tS7OA_mEq9wRy0_rw-xD15a-xF7yGDC92meA6o6_uPf1gK0hz-crpghC-A6wNzyu', 'document', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(328, 12, 'SG', 'Singtel', 42, '1459148741910', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0214.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=lbQ4-l0f-Mi4OkGMb-6Y7E7vcRlhpTcRg0Bxp_otlm8LX9ksEKevGizlgO4zs5Rl', 'document', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(329, 12, 'SG', 'Singtel', 42, '1459148743048', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0201.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=VZuCVKAaJxZACROM-lLOYZ__e0Ks9tjwlRwlR6Otqk9z0X_OyRTmL1lmP33Rqc2c', 'document', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(330, 12, 'SG', 'Singtel', 42, '1459148744233', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0202.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=9OKrDcR0NMKnOMTtZxXjNhbLOKvn2OJeRv5Sl3owc4BqsFHBs1cG06E_qFKN72P_', 'document', '2016-03-31 02:36:40', '2016-03-31 02:36:40'),
(331, 12, 'SG', 'Singtel', 42, '1459148745019', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0203.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=dIm1JsgvIs_vxlausjfZa_dSuBLRuBwHgkxRC3bJf34lbuepJyf-FCJguW1d0pkQ', 'document', '2016-03-31 00:00:00', '2016-03-31 02:36:40'),
(332, 12, 'SG', 'Singtel', 42, '1459148745793', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0204.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=1JCfnqxK7zwYtcfO3rqvAEgrNOD-DLUSTNPkSq0rmmxhPl80KOzxy1veYaPv0Cmq', 'document', '2016-04-01 02:36:40', '2016-03-31 02:36:40'),
(333, 12, 'SG', 'Singtel', 42, '1459148746556', 'C:/xampp/htdocs/rtlcbsasia/wp-content/uploads/download-manager-files/SCP-S02-Synopsis0205.pdf', 'http://192.168.1.167/rtlcbsasia/download/scorpion-2/?wpdmdl=42&ind=FPZpd3DEnQkfBBpQ6Z1l9G5AXmf-0NpdeoXmuIId1hAkizjkNQxaWJpG4FAu_gDd', 'document', '2016-04-01 02:36:40', '2016-03-31 02:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_ewwwio_images`
--

CREATE TABLE IF NOT EXISTS `rtl21016_ewwwio_images` (
`id` mediumint(9) NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `results` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_size` int(10) unsigned DEFAULT NULL,
  `orig_size` int(10) unsigned DEFAULT NULL,
  `updates` int(5) unsigned DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `trace` blob
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=598 ;

--
-- Dumping data for table `rtl21016_ewwwio_images`
--

INSERT INTO `rtl21016_ewwwio_images` (`id`, `path`, `results`, `image_size`, `orig_size`, `updates`, `updated`, `trace`) VALUES
(1, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-horiz101i.jpg', 'Reduced by 12.3% (307.2&nbsp;kB)', 2250931, 2565461, 1, '2016-03-22 21:40:50', NULL),
(2, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-horiz101i-150x150.jpg', 'Reduced by 7.5% (449.0&nbsp;B)', 5562, 6011, 1, '2016-03-22 21:40:50', NULL),
(3, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-horiz101i-300x93.jpg', 'Reduced by 8.1% (693.0&nbsp;B)', 7854, 8547, 1, '2016-03-22 21:40:50', NULL),
(4, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-horiz101i-768x239.jpg', 'Reduced by 5.1% (1.6&nbsp;kB)', 30834, 32479, 1, '2016-03-22 21:40:51', NULL),
(5, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-horiz101i-1024x318.jpg', 'Reduced by 4.6% (2.3&nbsp;kB)', 48496, 50823, 1, '2016-03-22 21:40:51', NULL),
(6, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-vert-TT105i.jpg', 'No savings', 10364738, 11552756, 2, '2016-03-23 05:43:09', ''),
(7, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-vert-TT105i-150x150.jpg', 'No savings', 8162, 8995, 2, '2016-03-23 05:43:09', ''),
(8, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-vert-TT105i-200x300.jpg', 'No savings', 15645, 16933, 2, '2016-03-23 05:43:09', ''),
(9, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-vert-TT105i-768x1154.jpg', 'No savings', 133539, 140961, 2, '2016-03-23 05:43:10', ''),
(10, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-vert-TT105i-682x1024.jpg', 'No savings', 108515, 114408, 2, '2016-03-23 05:43:10', ''),
(11, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458711838wpdm_LIM-keyart-vert-TT105i-48x48.jpg', 'Reduced by 20.6% (396.0&nbsp;B)', 1531, 1927, 1, '2016-03-22 21:44:09', NULL),
(12, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458711836wpdm_LIM-keyart-vert104i-48x48.jpg', 'Reduced by 22.2% (403.0&nbsp;B)', 1409, 1812, 1, '2016-03-22 21:44:11', NULL),
(13, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458711832wpdm_LIM-keyart-horiz101i-48x48.jpg', 'Reduced by 24.6% (396.0&nbsp;B)', 1213, 1609, 1, '2016-03-22 21:44:12', NULL),
(14, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-keyart-vert-TT105i-400x300.jpg', 'Reduced by 6.6% (1.9&nbsp;kB)', 27883, 29847, 1, '2016-03-22 21:44:17', NULL),
(15, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-keyart-vert-TT105i-575x170.jpg', 'Reduced by 6.8% (1.6&nbsp;kB)', 22514, 24167, 1, '2016-03-22 21:44:19', NULL),
(16, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-keyart-vert-TT105i-100x45.jpg', 'Reduced by 14.9% (435.0&nbsp;B)', 2477, 2912, 1, '2016-03-22 21:44:22', NULL),
(17, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-keyart-vert-TT105i-900x5000.jpg', 'Reduced by 4.3% (32.3&nbsp;kB)', 730556, 763640, 1, '2016-03-22 21:44:27', NULL),
(18, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458711838wpdm_LIM-keyart-vert-TT105i-270x296.jpg', 'Reduced by 7.8% (1.7&nbsp;kB)', 20535, 22266, 1, '2016-03-22 21:45:08', NULL),
(19, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458711836wpdm_LIM-keyart-vert104i-270x296.jpg', 'Reduced by 7.2% (1.4&nbsp;kB)', 18491, 19923, 1, '2016-03-22 21:45:10', NULL),
(20, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458711832wpdm_LIM-keyart-horiz101i-270x296.jpg', 'Reduced by 4.1% (555.0&nbsp;B)', 12883, 13438, 1, '2016-03-22 21:45:11', NULL),
(21, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-keyart-vert-TT105i-270x290.jpg', 'Reduced by 7.5% (1.6&nbsp;kB)', 20468, 22131, 1, '2016-03-22 21:46:40', NULL),
(22, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-S01-SocialMedia_sideeffectsi-270x296.jpg', 'Reduced by 8.2% (2.6&nbsp;kB)', 29989, 32669, 1, '2016-03-22 22:29:12', NULL),
(23, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-S01-SocialMedia_Morra-270x296.jpg', 'Reduced by 8.6% (3.7&nbsp;kB)', 39561, 43300, 1, '2016-03-22 22:29:13', NULL),
(24, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-QuoteMeme-001i-270x296.jpg', 'Reduced by 4.8% (699.0&nbsp;B)', 13783, 14482, 1, '2016-03-22 22:29:13', NULL),
(25, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-JenCarpenter-Meme-107i-270x296.jpg', 'Reduced by 6.1% (1.2&nbsp;kB)', 19229, 20478, 1, '2016-03-22 22:29:13', NULL),
(26, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-3015bi-270x296.jpg', 'Reduced by 5.6% (1.0&nbsp;kB)', 17716, 18765, 1, '2016-03-22 22:29:14', NULL),
(27, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-3007bi-270x296.jpg', 'Reduced by 5.0% (898.0&nbsp;B)', 16923, 17821, 1, '2016-03-22 22:29:15', NULL),
(28, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-2236bi-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 19411, 20572, 1, '2016-03-22 22:29:15', NULL),
(29, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-1358bi-270x296.jpg', 'Reduced by 5.3% (1.0&nbsp;kB)', 19378, 20452, 1, '2016-03-22 22:29:16', NULL),
(30, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-1267Bi-270x296.jpg', 'Reduced by 9.9% (3.6&nbsp;kB)', 33235, 36880, 1, '2016-03-22 22:29:17', NULL),
(31, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-472bi-270x296.jpg', 'Reduced by 7.7% (2.4&nbsp;kB)', 29427, 31892, 1, '2016-03-22 22:29:17', NULL),
(32, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-338bi-270x296.jpg', 'Reduced by 4.0% (663.0&nbsp;B)', 16068, 16731, 1, '2016-03-22 22:29:18', NULL),
(33, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-141bi-270x296.jpg', 'Reduced by 6.6% (1.5&nbsp;kB)', 21695, 23228, 1, '2016-03-22 22:29:19', NULL),
(34, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-38BWSi-270x296.jpg', 'Reduced by 6.2% (1.6&nbsp;kB)', 24972, 26629, 1, '2016-03-22 22:29:19', NULL),
(35, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_1498bi-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 18580, 19678, 1, '2016-03-22 22:29:20', NULL),
(36, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_1495bi-270x296.jpg', 'Reduced by 6.6% (1.5&nbsp;kB)', 22308, 23895, 1, '2016-03-22 22:29:21', NULL),
(37, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_1437bi-270x296.jpg', 'Reduced by 8.1% (2.4&nbsp;kB)', 28041, 30523, 1, '2016-03-22 22:29:22', NULL),
(38, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_1416bi-270x296.jpg', 'Reduced by 8.6% (2.7&nbsp;kB)', 29662, 32461, 1, '2016-03-22 22:29:22', NULL),
(39, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_1015bi-270x296.jpg', 'Reduced by 7.3% (2.4&nbsp;kB)', 31312, 33795, 1, '2016-03-22 22:29:23', NULL),
(40, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0983bi-270x296.jpg', 'Reduced by 4.5% (533.0&nbsp;B)', 11269, 11802, 1, '2016-03-22 22:29:24', NULL),
(41, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0952bi-270x296.jpg', 'Reduced by 6.3% (1.4&nbsp;kB)', 21025, 22434, 1, '2016-03-22 22:29:24', NULL),
(42, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0886bi-270x296.jpg', 'Reduced by 6.3% (1.7&nbsp;kB)', 25785, 27510, 1, '2016-03-22 22:29:25', NULL),
(43, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0861bi-270x296.jpg', 'Reduced by 6.5% (1.8&nbsp;kB)', 26109, 27927, 1, '2016-03-22 22:29:26', NULL),
(44, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0854bi-270x296.jpg', 'Reduced by 5.5% (1.4&nbsp;kB)', 24532, 25969, 1, '2016-03-22 22:29:26', NULL),
(45, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0848bi-270x296.jpg', 'Reduced by 6.1% (1.7&nbsp;kB)', 26825, 28557, 1, '2016-03-22 22:29:27', NULL),
(46, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0657bi-270x296.jpg', 'Reduced by 4.7% (786.0&nbsp;B)', 16000, 16786, 1, '2016-03-22 22:29:28', NULL),
(47, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0608bi-270x296.jpg', 'Reduced by 4.7% (798.0&nbsp;B)', 16280, 17078, 1, '2016-03-22 22:29:28', NULL),
(48, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0579bi-270x296.jpg', 'Reduced by 5.2% (1.1&nbsp;kB)', 19928, 21029, 1, '2016-03-22 22:29:29', NULL),
(49, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0551b2i-270x296.jpg', 'Reduced by 7.1% (2.1&nbsp;kB)', 28101, 30236, 1, '2016-03-22 22:29:30', NULL),
(50, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0545bi-270x296.jpg', 'Reduced by 6.9% (2.1&nbsp;kB)', 29746, 31945, 1, '2016-03-22 22:29:30', NULL),
(51, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0423bi-270x296.jpg', 'Reduced by 4.3% (909.0&nbsp;B)', 20197, 21106, 1, '2016-03-22 22:29:31', NULL),
(52, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0019bi-270x296.jpg', 'Reduced by 4.3% (708.0&nbsp;B)', 15879, 16587, 1, '2016-03-22 22:29:32', NULL),
(53, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0008bi-270x296.jpg', 'Reduced by 6.0% (1.6&nbsp;kB)', 25207, 26815, 1, '2016-03-22 22:29:32', NULL),
(54, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0004bi-270x296.jpg', 'Reduced by 6.1% (1.6&nbsp;kB)', 25766, 27449, 1, '2016-03-22 22:29:33', NULL),
(55, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0103-D_0003bi-270x296.jpg', 'Reduced by 6.8% (1.9&nbsp;kB)', 26878, 28834, 1, '2016-03-22 22:29:34', NULL),
(56, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-NAZ6bi-270x296.jpg', 'Reduced by 4.6% (909.0&nbsp;B)', 18905, 19814, 1, '2016-03-22 22:29:35', NULL),
(57, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image24i-270x296.jpg', 'Reduced by 6.0% (1.3&nbsp;kB)', 21351, 22724, 1, '2016-03-22 22:29:35', NULL),
(58, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image19i-270x296.jpg', 'Reduced by 5.7% (1.2&nbsp;kB)', 19728, 20926, 1, '2016-03-22 22:29:36', NULL),
(59, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image18i-270x296.jpg', 'Reduced by 3.3% (563.0&nbsp;B)', 16484, 17047, 1, '2016-03-22 22:29:36', NULL),
(60, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image17i-270x296.jpg', 'Reduced by 6.4% (1.3&nbsp;kB)', 19261, 20575, 1, '2016-03-22 22:29:37', NULL),
(61, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image16i-270x296.jpg', 'Reduced by 6.1% (1.2&nbsp;kB)', 18436, 19625, 1, '2016-03-22 22:29:37', NULL),
(62, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image15i-270x296.jpg', 'Reduced by 5.3% (1.1&nbsp;kB)', 19650, 20758, 1, '2016-03-22 22:29:38', NULL),
(63, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image14i-270x296.jpg', 'Reduced by 5.5% (1.1&nbsp;kB)', 19383, 20517, 1, '2016-03-22 22:29:38', NULL),
(64, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image12i-270x296.jpg', 'Reduced by 5.1% (819.0&nbsp;B)', 15307, 16126, 1, '2016-03-22 22:29:39', NULL),
(65, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image8i-270x296.jpg', 'Reduced by 4.8% (910.0&nbsp;B)', 18147, 19057, 1, '2016-03-22 22:29:40', NULL),
(66, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image6i-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 19300, 20449, 1, '2016-03-22 22:29:40', NULL),
(67, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image2i-270x296.jpg', 'Reduced by 6.1% (1.2&nbsp;kB)', 19372, 20620, 1, '2016-03-22 22:29:41', NULL),
(68, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-Image1i-270x296.jpg', 'Reduced by 6.4% (1.5&nbsp;kB)', 23070, 24644, 1, '2016-03-22 22:29:41', NULL),
(69, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0357bi-270x296.jpg', 'Reduced by 6.8% (2.0&nbsp;kB)', 27951, 30001, 1, '2016-03-22 22:29:42', NULL),
(70, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0333bi-270x296.jpg', 'Reduced by 6.9% (1.9&nbsp;kB)', 26556, 28529, 1, '2016-03-22 22:29:43', NULL),
(71, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0305bi-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 19781, 20947, 1, '2016-03-22 22:29:43', NULL),
(72, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0262bi-270x296.jpg', 'Reduced by 6.0% (1.4&nbsp;kB)', 21893, 23286, 1, '2016-03-22 22:29:44', NULL),
(73, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0251bi-270x296.jpg', 'Reduced by 6.2% (1.5&nbsp;kB)', 23095, 24617, 1, '2016-03-22 22:29:45', NULL),
(74, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0234bi-270x296.jpg', 'Reduced by 6.1% (1.4&nbsp;kB)', 22486, 23941, 1, '2016-03-22 22:29:45', NULL),
(75, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0230bi-270x296.jpg', 'Reduced by 5.3% (1.3&nbsp;kB)', 23119, 24407, 1, '2016-03-22 22:29:46', NULL),
(76, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0193bi-270x296.jpg', 'Reduced by 5.2% (886.0&nbsp;B)', 15995, 16881, 1, '2016-03-22 22:29:47', NULL),
(77, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0149bi-270x296.jpg', 'Reduced by 5.3% (850.0&nbsp;B)', 15226, 16076, 1, '2016-03-22 22:29:47', NULL),
(78, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0097bi-270x296.jpg', 'Reduced by 5.1% (944.0&nbsp;B)', 17718, 18662, 1, '2016-03-22 22:29:48', NULL),
(79, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0092bi-270x296.jpg', 'Reduced by 5.7% (1.1&nbsp;kB)', 18141, 19237, 1, '2016-03-22 22:29:49', NULL),
(80, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0059bi-270x296.jpg', 'Reduced by 4.3% (618.0&nbsp;B)', 13866, 14484, 1, '2016-03-22 22:29:50', NULL),
(81, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0040bi-270x296.jpg', 'Reduced by 5.9% (1.1&nbsp;kB)', 18408, 19571, 1, '2016-03-22 22:29:50', NULL),
(82, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0027bi-270x296.jpg', 'Reduced by 6.4% (1.4&nbsp;kB)', 20606, 22014, 1, '2016-03-22 22:29:51', NULL),
(83, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-D_0020bi-270x296.jpg', 'Reduced by 7.0% (1.3&nbsp;kB)', 17889, 19237, 1, '2016-03-22 22:29:51', NULL),
(84, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0758bi-270x296.jpg', 'Reduced by 8.2% (2.3&nbsp;kB)', 26403, 28750, 1, '2016-03-22 22:29:52', NULL),
(85, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0670bi-270x296.jpg', 'Reduced by 6.5% (1.6&nbsp;kB)', 22916, 24522, 1, '2016-03-22 22:29:53', NULL),
(86, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0662bi-270x296.jpg', 'Reduced by 6.9% (1.6&nbsp;kB)', 21777, 23397, 1, '2016-03-22 22:29:54', NULL),
(87, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0634bi-270x296.jpg', 'Reduced by 8.3% (2.3&nbsp;kB)', 26154, 28529, 1, '2016-03-22 22:29:54', NULL),
(88, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0517bi-270x296.jpg', 'Reduced by 6.1% (1.5&nbsp;kB)', 23218, 24739, 1, '2016-03-22 22:29:55', NULL),
(89, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0511bi-270x296.jpg', 'Reduced by 5.9% (1.4&nbsp;kB)', 23047, 24501, 1, '2016-03-22 22:29:56', NULL),
(90, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0458bi-270x296.jpg', 'Reduced by 5.1% (1.1&nbsp;kB)', 21154, 22286, 1, '2016-03-22 22:29:56', NULL),
(91, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0429bi-270x296.jpg', 'Reduced by 5.3% (1.2&nbsp;kB)', 22435, 23697, 1, '2016-03-22 22:29:57', NULL),
(92, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0290bi-270x296.jpg', 'Reduced by 6.1% (1.4&nbsp;kB)', 22324, 23764, 1, '2016-03-22 22:29:57', NULL),
(93, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0266bi-270x296.jpg', 'Reduced by 5.4% (1.2&nbsp;kB)', 21036, 22242, 1, '2016-03-22 22:29:58', NULL),
(94, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0253bi-270x296.jpg', 'Reduced by 7.5% (2.2&nbsp;kB)', 27563, 29789, 1, '2016-03-22 22:29:59', NULL),
(95, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0243bi-270x296.jpg', 'Reduced by 6.8% (1.7&nbsp;kB)', 24168, 25922, 1, '2016-03-22 22:29:59', NULL),
(96, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0213bi-270x296.jpg', 'Reduced by 7.4% (2.0&nbsp;kB)', 25716, 27759, 1, '2016-03-22 22:30:00', NULL),
(97, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0159bi-270x296.jpg', 'Reduced by 6.2% (1.2&nbsp;kB)', 19452, 20727, 1, '2016-03-22 22:30:01', NULL),
(98, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0051bi-270x296.jpg', 'Reduced by 5.4% (1.0&nbsp;kB)', 18054, 19091, 1, '2016-03-22 22:30:01', NULL),
(99, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0102-0044bi-270x296.jpg', 'Reduced by 7.7% (2.0&nbsp;kB)', 24603, 26658, 1, '2016-03-22 22:30:02', NULL),
(100, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-Image14i-270x296.jpg', 'Reduced by 4.4% (780.0&nbsp;B)', 16958, 17738, 1, '2016-03-22 22:30:03', NULL),
(101, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-Image12i-270x296.jpg', 'Reduced by 7.2% (1.6&nbsp;kB)', 21457, 23118, 1, '2016-03-22 22:30:03', NULL),
(102, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-Image11i-270x296.jpg', 'Reduced by 4.9% (954.0&nbsp;B)', 18481, 19435, 1, '2016-03-22 22:30:04', NULL),
(103, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-Image4i-270x296.jpg', 'Reduced by 3.6% (602.0&nbsp;B)', 16175, 16777, 1, '2016-03-22 22:30:05', NULL),
(104, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-Image2i-270x296.jpg', 'Reduced by 5.0% (782.0&nbsp;B)', 14759, 15541, 1, '2016-03-22 22:30:05', NULL),
(105, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D1319bi-270x296.jpg', 'Reduced by 7.5% (2.1&nbsp;kB)', 26513, 28678, 1, '2016-03-22 22:30:06', NULL),
(106, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D1233bi-270x296.jpg', 'Reduced by 7.5% (2.1&nbsp;kB)', 26224, 28364, 1, '2016-03-22 22:30:06', NULL),
(107, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D1064bi-270x296.jpg', 'Reduced by 4.7% (904.0&nbsp;B)', 18204, 19108, 1, '2016-03-22 22:30:07', NULL),
(108, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D0912bi-270x296.jpg', 'Reduced by 7.0% (1.6&nbsp;kB)', 21283, 22887, 1, '2016-03-22 22:30:08', NULL),
(109, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D0868bi-270x296.jpg', 'Reduced by 7.7% (1.9&nbsp;kB)', 23023, 24953, 1, '2016-03-22 22:30:09', NULL),
(110, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D0848bi-270x296.jpg', 'Reduced by 6.3% (1.4&nbsp;kB)', 21169, 22599, 1, '2016-03-22 22:30:09', NULL),
(111, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D0714bi-270x296.jpg', 'Reduced by 6.0% (1.3&nbsp;kB)', 21175, 22524, 1, '2016-03-22 22:30:10', NULL),
(112, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D0707bi-270x296.jpg', 'Reduced by 5.6% (1.2&nbsp;kB)', 20445, 21664, 1, '2016-03-22 22:30:11', NULL),
(113, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D0659bi-270x296.jpg', 'Reduced by 3.9% (629.0&nbsp;B)', 15544, 16173, 1, '2016-03-22 22:30:11', NULL),
(114, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D0581bi-270x296.jpg', 'Reduced by 6.6% (1.8&nbsp;kB)', 25601, 27409, 1, '2016-03-22 22:30:12', NULL),
(115, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D0329bi-270x296.jpg', 'Reduced by 5.7% (1,019.0&nbsp;B)', 17005, 18024, 1, '2016-03-22 22:30:13', NULL),
(116, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D0243bi-270x296.jpg', 'Reduced by 6.2% (1.5&nbsp;kB)', 23300, 24834, 1, '2016-03-22 22:30:13', NULL),
(117, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-D0110bi-270x296.jpg', 'Reduced by 6.5% (1.5&nbsp;kB)', 22549, 24119, 1, '2016-03-22 22:30:14', NULL),
(118, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-epi0101-3518bi-270x296.jpg', 'Reduced by 6.3% (1.6&nbsp;kB)', 24849, 26526, 1, '2016-03-22 22:30:15', NULL),
(119, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-logo-white102i-270x296.png', 'Reduced by 55.9% (430.0&nbsp;B)', 339, 769, 1, '2016-03-22 22:30:15', NULL),
(120, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-logo-black101i-270x296.png', 'Reduced by 55.1% (416.0&nbsp;B)', 339, 755, 1, '2016-03-22 22:30:15', NULL),
(121, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-logo-black101i-270x296.jpg', 'Reduced by 37.1% (1.7&nbsp;kB)', 3019, 4796, 1, '2016-03-22 22:30:16', NULL),
(122, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/Limitless_logo-270x296.png', 'Reduced by 10.9% (1.1&nbsp;kB)', 9040, 10149, 1, '2016-03-22 22:30:16', NULL),
(123, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715357wpdm_LIM-keyart-vert-TT105i-48x48.jpg', 'Reduced by 20.6% (396.0&nbsp;B)', 1531, 1927, 1, '2016-03-22 22:42:54', NULL),
(124, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715356wpdm_LIM-keyart-vert104i-48x48.jpg', 'Reduced by 22.2% (403.0&nbsp;B)', 1409, 1812, 1, '2016-03-22 22:42:57', NULL),
(125, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715352wpdm_LIM-keyart-horiz101i-48x48.jpg', 'Reduced by 24.6% (396.0&nbsp;B)', 1213, 1609, 1, '2016-03-22 22:42:57', NULL),
(126, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715357wpdm_LIM-keyart-vert-TT105i-270x296.jpg', 'Reduced by 7.8% (1.7&nbsp;kB)', 20535, 22266, 1, '2016-03-22 22:43:01', NULL),
(127, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715356wpdm_LIM-keyart-vert104i-270x296.jpg', 'Reduced by 7.2% (1.4&nbsp;kB)', 18491, 19923, 1, '2016-03-22 22:43:04', NULL),
(128, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715352wpdm_LIM-keyart-horiz101i-270x296.jpg', 'Reduced by 4.1% (555.0&nbsp;B)', 12883, 13438, 1, '2016-03-22 22:43:04', NULL),
(129, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715425wpdm_LIM-logo-white102i-48x48.png', 'Reduced by 18.5% (116.0&nbsp;B)', 512, 628, 1, '2016-03-22 22:43:57', NULL),
(130, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715422wpdm_LIM-logo-black101i-48x48.png', 'Reduced by 6.6% (20.0&nbsp;B)', 284, 304, 1, '2016-03-22 22:43:58', NULL),
(131, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715421wpdm_LIM-logo-black101i-48x48.jpg', 'Reduced by 41.1% (478.0&nbsp;B)', 686, 1164, 1, '2016-03-22 22:43:58', NULL),
(132, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715417wpdm_Limitless_logo-48x48.png', 'No savings', 1176, 1176, 1, '2016-03-22 22:43:59', NULL),
(133, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715425wpdm_LIM-logo-white102i-270x296.png', 'Reduced by 55.9% (430.0&nbsp;B)', 339, 769, 1, '2016-03-22 22:44:09', NULL),
(134, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715422wpdm_LIM-logo-black101i-270x296.png', 'Reduced by 55.1% (416.0&nbsp;B)', 339, 755, 1, '2016-03-22 22:44:09', NULL),
(135, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715421wpdm_LIM-logo-black101i-270x296.jpg', 'Reduced by 37.1% (1.7&nbsp;kB)', 3019, 4796, 1, '2016-03-22 22:44:10', NULL),
(136, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715417wpdm_Limitless_logo-270x296.png', 'Reduced by 10.9% (1.1&nbsp;kB)', 9040, 10149, 1, '2016-03-22 22:44:11', NULL),
(137, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715609wpdm_LIM-backplate_C242_clean101i-48x48.jpg', 'Reduced by 27.1% (388.0&nbsp;B)', 1045, 1433, 1, '2016-03-22 22:46:59', NULL),
(138, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715609wpdm_LIM-backplate_C242_clean101i-270x296.jpg', 'Reduced by 5.9% (719.0&nbsp;B)', 11494, 12213, 1, '2016-03-22 22:47:05', NULL),
(139, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715647wpdm_LIM-carpenter101i-48x48.jpg', 'Reduced by 21.9% (390.0&nbsp;B)', 1394, 1784, 1, '2016-03-22 22:47:40', NULL),
(140, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458715647wpdm_LIM-carpenter101i-270x296.jpg', 'Reduced by 6.9% (1.6&nbsp;kB)', 22617, 24286, 1, '2016-03-22 22:47:44', NULL),
(141, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/key_SCP-keyart-horiz201i-270x296.jpg', 'Reduced by 5.3% (1.1&nbsp;kB)', 20798, 21971, 1, '2016-03-22 23:13:48', NULL),
(142, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717243wpdm_LIM-mcdorman101i-48x48.jpg', 'Reduced by 21.4% (385.0&nbsp;B)', 1414, 1799, 1, '2016-03-22 23:14:12', NULL),
(143, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717243wpdm_LIM-mcdorman101i-270x296.jpg', 'Reduced by 6.3% (1.1&nbsp;kB)', 17497, 18668, 1, '2016-03-22 23:14:30', NULL),
(144, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717602wpdm_LIM-keyart-vert-TT105i-48x48.jpg', 'Reduced by 20.6% (396.0&nbsp;B)', 1531, 1927, 1, '2016-03-22 23:20:10', NULL),
(145, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717599wpdm_LIM-keyart-vert104i-48x48.jpg', 'Reduced by 22.2% (403.0&nbsp;B)', 1409, 1812, 1, '2016-03-22 23:20:13', NULL),
(146, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717595wpdm_LIM-keyart-horiz101i-48x48.jpg', 'Reduced by 24.6% (396.0&nbsp;B)', 1213, 1609, 1, '2016-03-22 23:20:14', NULL),
(147, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717602wpdm_LIM-keyart-vert-TT105i-270x296.jpg', 'Reduced by 7.8% (1.7&nbsp;kB)', 20535, 22266, 1, '2016-03-22 23:20:19', NULL),
(148, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717599wpdm_LIM-keyart-vert104i-270x296.jpg', 'Reduced by 7.2% (1.4&nbsp;kB)', 18491, 19923, 1, '2016-03-22 23:20:22', NULL),
(149, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717595wpdm_LIM-keyart-horiz101i-270x296.jpg', 'Reduced by 4.1% (555.0&nbsp;B)', 12883, 13438, 1, '2016-03-22 23:20:23', NULL),
(150, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717802wpdm_LIM-epi0103-D_1498bi-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 18580, 19678, 1, '2016-03-22 23:24:08', NULL),
(151, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717799wpdm_LIM-epi0103-D_1495bi-270x296.jpg', 'Reduced by 6.6% (1.5&nbsp;kB)', 22308, 23895, 1, '2016-03-22 23:24:09', NULL),
(152, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717797wpdm_LIM-epi0103-D_1437bi-270x296.jpg', 'Reduced by 8.1% (2.4&nbsp;kB)', 28041, 30523, 1, '2016-03-22 23:24:09', NULL),
(153, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717795wpdm_LIM-epi0103-D_1416bi-270x296.jpg', 'Reduced by 8.6% (2.7&nbsp;kB)', 29662, 32461, 1, '2016-03-22 23:24:10', NULL),
(154, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717793wpdm_LIM-epi0103-D_1015bi-270x296.jpg', 'Reduced by 7.3% (2.4&nbsp;kB)', 31312, 33795, 1, '2016-03-22 23:24:11', NULL),
(155, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717791wpdm_LIM-epi0103-D_0983bi-270x296.jpg', 'Reduced by 4.5% (533.0&nbsp;B)', 11269, 11802, 1, '2016-03-22 23:24:12', NULL),
(156, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717789wpdm_LIM-epi0103-D_0952bi-270x296.jpg', 'Reduced by 6.3% (1.4&nbsp;kB)', 21025, 22434, 1, '2016-03-22 23:24:13', NULL),
(157, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717787wpdm_LIM-epi0103-D_0886bi-270x296.jpg', 'Reduced by 6.3% (1.7&nbsp;kB)', 25785, 27510, 1, '2016-03-22 23:24:14', NULL),
(158, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717786wpdm_LIM-epi0103-D_0861bi-270x296.jpg', 'Reduced by 6.5% (1.8&nbsp;kB)', 26109, 27927, 1, '2016-03-22 23:24:15', NULL),
(159, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717784wpdm_LIM-epi0103-D_0854bi-270x296.jpg', 'Reduced by 5.5% (1.4&nbsp;kB)', 24532, 25969, 1, '2016-03-22 23:24:16', NULL),
(160, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717782wpdm_LIM-epi0103-D_0848bi-270x296.jpg', 'Reduced by 6.1% (1.7&nbsp;kB)', 26825, 28557, 1, '2016-03-22 23:24:17', NULL),
(161, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717780wpdm_LIM-epi0103-D_0657bi-270x296.jpg', 'Reduced by 4.7% (786.0&nbsp;B)', 16000, 16786, 1, '2016-03-22 23:24:18', NULL),
(162, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717777wpdm_LIM-epi0103-D_0608bi-270x296.jpg', 'Reduced by 4.7% (798.0&nbsp;B)', 16280, 17078, 1, '2016-03-22 23:24:19', NULL),
(163, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717776wpdm_LIM-epi0103-D_0579bi-270x296.jpg', 'Reduced by 5.2% (1.1&nbsp;kB)', 19928, 21029, 1, '2016-03-22 23:24:20', NULL),
(164, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717774wpdm_LIM-epi0103-D_0551b2i-270x296.jpg', 'Reduced by 7.1% (2.1&nbsp;kB)', 28101, 30236, 1, '2016-03-22 23:24:20', NULL),
(165, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717772wpdm_LIM-epi0103-D_0545bi-270x296.jpg', 'Reduced by 6.9% (2.1&nbsp;kB)', 29746, 31945, 1, '2016-03-22 23:24:21', NULL),
(166, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717770wpdm_LIM-epi0103-D_0423bi-270x296.jpg', 'Reduced by 4.3% (909.0&nbsp;B)', 20197, 21106, 1, '2016-03-22 23:24:22', NULL),
(167, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717769wpdm_LIM-epi0103-D_0019bi-270x296.jpg', 'Reduced by 4.3% (708.0&nbsp;B)', 15879, 16587, 1, '2016-03-22 23:24:23', NULL),
(168, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717767wpdm_LIM-epi0103-D_0008bi-270x296.jpg', 'Reduced by 6.0% (1.6&nbsp;kB)', 25207, 26815, 1, '2016-03-22 23:24:25', NULL),
(169, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717765wpdm_LIM-epi0103-D_0004bi-270x296.jpg', 'Reduced by 6.1% (1.6&nbsp;kB)', 25766, 27449, 1, '2016-03-22 23:24:26', NULL),
(170, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717764wpdm_LIM-epi0103-D_0003bi-270x296.jpg', 'Reduced by 6.8% (1.9&nbsp;kB)', 26878, 28834, 1, '2016-03-22 23:24:27', NULL),
(171, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717762wpdm_LIM-epi0102-NAZ6bi-270x296.jpg', 'Reduced by 4.6% (909.0&nbsp;B)', 18905, 19814, 1, '2016-03-22 23:24:28', NULL),
(172, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717761wpdm_LIM-epi0102-Image24i-270x296.jpg', 'Reduced by 6.0% (1.3&nbsp;kB)', 21351, 22724, 1, '2016-03-22 23:24:29', NULL),
(173, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717759wpdm_LIM-epi0102-Image19i-270x296.jpg', 'Reduced by 5.7% (1.2&nbsp;kB)', 19728, 20926, 1, '2016-03-22 23:24:29', NULL),
(174, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717757wpdm_LIM-epi0102-Image18i-270x296.jpg', 'Reduced by 3.3% (563.0&nbsp;B)', 16484, 17047, 1, '2016-03-22 23:24:30', NULL),
(175, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717756wpdm_LIM-epi0102-Image17i-270x296.jpg', 'Reduced by 6.4% (1.3&nbsp;kB)', 19261, 20575, 1, '2016-03-22 23:24:31', NULL),
(176, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717754wpdm_LIM-epi0102-Image16i-270x296.jpg', 'Reduced by 6.1% (1.2&nbsp;kB)', 18436, 19625, 1, '2016-03-22 23:24:32', NULL),
(177, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717753wpdm_LIM-epi0102-Image15i-270x296.jpg', 'Reduced by 5.3% (1.1&nbsp;kB)', 19650, 20758, 1, '2016-03-22 23:24:33', NULL),
(178, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717751wpdm_LIM-epi0102-Image14i-270x296.jpg', 'Reduced by 5.5% (1.1&nbsp;kB)', 19383, 20517, 1, '2016-03-22 23:24:34', NULL),
(179, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717750wpdm_LIM-epi0102-Image12i-270x296.jpg', 'Reduced by 5.1% (819.0&nbsp;B)', 15307, 16126, 1, '2016-03-22 23:24:34', NULL),
(180, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717748wpdm_LIM-epi0102-Image8i-270x296.jpg', 'Reduced by 4.8% (910.0&nbsp;B)', 18147, 19057, 1, '2016-03-22 23:24:35', NULL),
(181, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717747wpdm_LIM-epi0102-Image6i-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 19300, 20449, 1, '2016-03-22 23:24:36', NULL),
(182, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717745wpdm_LIM-epi0102-Image2i-270x296.jpg', 'Reduced by 6.1% (1.2&nbsp;kB)', 19372, 20620, 1, '2016-03-22 23:24:36', NULL),
(183, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717744wpdm_LIM-epi0102-Image1i-270x296.jpg', 'Reduced by 6.4% (1.5&nbsp;kB)', 23070, 24644, 1, '2016-03-22 23:24:37', NULL),
(184, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717742wpdm_LIM-epi0102-D_0357bi-270x296.jpg', 'Reduced by 6.8% (2.0&nbsp;kB)', 27951, 30001, 1, '2016-03-22 23:24:38', NULL),
(185, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717741wpdm_LIM-epi0102-D_0333bi-270x296.jpg', 'Reduced by 6.9% (1.9&nbsp;kB)', 26556, 28529, 1, '2016-03-22 23:24:39', NULL),
(186, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717739wpdm_LIM-epi0102-D_0305bi-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 19781, 20947, 1, '2016-03-22 23:24:40', NULL),
(187, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717737wpdm_LIM-epi0102-D_0262bi-270x296.jpg', 'Reduced by 6.0% (1.4&nbsp;kB)', 21893, 23286, 1, '2016-03-22 23:24:41', NULL),
(188, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717736wpdm_LIM-epi0102-D_0251bi-270x296.jpg', 'Reduced by 6.2% (1.5&nbsp;kB)', 23095, 24617, 1, '2016-03-22 23:24:42', NULL),
(189, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717734wpdm_LIM-epi0102-D_0234bi-270x296.jpg', 'Reduced by 6.1% (1.4&nbsp;kB)', 22486, 23941, 1, '2016-03-22 23:24:42', NULL),
(190, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717732wpdm_LIM-epi0102-D_0230bi-270x296.jpg', 'Reduced by 5.3% (1.3&nbsp;kB)', 23119, 24407, 1, '2016-03-22 23:24:43', NULL),
(191, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717731wpdm_LIM-epi0102-D_0193bi-270x296.jpg', 'Reduced by 5.2% (886.0&nbsp;B)', 15995, 16881, 1, '2016-03-22 23:24:45', NULL),
(192, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717729wpdm_LIM-epi0102-D_0149bi-270x296.jpg', 'Reduced by 5.3% (850.0&nbsp;B)', 15226, 16076, 1, '2016-03-22 23:24:46', NULL),
(193, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717727wpdm_LIM-epi0102-D_0097bi-270x296.jpg', 'Reduced by 5.1% (944.0&nbsp;B)', 17718, 18662, 1, '2016-03-22 23:24:47', NULL),
(194, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717725wpdm_LIM-epi0102-D_0092bi-270x296.jpg', 'Reduced by 5.7% (1.1&nbsp;kB)', 18141, 19237, 1, '2016-03-22 23:24:49', NULL),
(195, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717723wpdm_LIM-epi0102-D_0059bi-270x296.jpg', 'Reduced by 4.3% (618.0&nbsp;B)', 13866, 14484, 1, '2016-03-22 23:24:50', NULL),
(196, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717721wpdm_LIM-epi0102-D_0040bi-270x296.jpg', 'Reduced by 5.9% (1.1&nbsp;kB)', 18408, 19571, 1, '2016-03-22 23:24:52', NULL),
(197, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717720wpdm_LIM-epi0102-D_0027bi-270x296.jpg', 'Reduced by 6.4% (1.4&nbsp;kB)', 20606, 22014, 1, '2016-03-22 23:24:53', NULL),
(198, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717718wpdm_LIM-epi0102-D_0020bi-270x296.jpg', 'Reduced by 7.0% (1.3&nbsp;kB)', 17889, 19237, 1, '2016-03-22 23:24:54', NULL),
(199, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717716wpdm_LIM-epi0102-0758bi-270x296.jpg', 'Reduced by 8.2% (2.3&nbsp;kB)', 26403, 28750, 1, '2016-03-22 23:24:55', NULL),
(200, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717714wpdm_LIM-epi0102-0670bi-270x296.jpg', 'Reduced by 6.5% (1.6&nbsp;kB)', 22916, 24522, 1, '2016-03-22 23:24:56', NULL),
(201, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717712wpdm_LIM-epi0102-0662bi-270x296.jpg', 'Reduced by 6.9% (1.6&nbsp;kB)', 21777, 23397, 1, '2016-03-22 23:24:57', NULL),
(202, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717710wpdm_LIM-epi0102-0634bi-270x296.jpg', 'Reduced by 8.3% (2.3&nbsp;kB)', 26154, 28529, 1, '2016-03-22 23:24:58', NULL),
(203, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717708wpdm_LIM-epi0102-0517bi-270x296.jpg', 'Reduced by 6.1% (1.5&nbsp;kB)', 23218, 24739, 1, '2016-03-22 23:24:59', NULL),
(204, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717706wpdm_LIM-epi0102-0511bi-270x296.jpg', 'Reduced by 5.9% (1.4&nbsp;kB)', 23047, 24501, 1, '2016-03-22 23:25:00', NULL),
(205, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717704wpdm_LIM-epi0102-0458bi-270x296.jpg', 'Reduced by 5.1% (1.1&nbsp;kB)', 21154, 22286, 1, '2016-03-22 23:25:02', NULL),
(206, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717702wpdm_LIM-epi0102-0429bi-270x296.jpg', 'Reduced by 5.3% (1.2&nbsp;kB)', 22435, 23697, 1, '2016-03-22 23:25:03', NULL),
(207, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717701wpdm_LIM-epi0102-0290bi-270x296.jpg', 'Reduced by 6.1% (1.4&nbsp;kB)', 22324, 23764, 1, '2016-03-22 23:25:04', NULL),
(208, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717698wpdm_LIM-epi0102-0266bi-270x296.jpg', 'Reduced by 5.4% (1.2&nbsp;kB)', 21036, 22242, 1, '2016-03-22 23:25:05', NULL),
(209, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717697wpdm_LIM-epi0102-0253bi-270x296.jpg', 'Reduced by 7.5% (2.2&nbsp;kB)', 27563, 29789, 1, '2016-03-22 23:25:06', NULL),
(210, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717695wpdm_LIM-epi0102-0243bi-270x296.jpg', 'Reduced by 6.8% (1.7&nbsp;kB)', 24168, 25922, 1, '2016-03-22 23:25:07', NULL),
(211, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717692wpdm_LIM-epi0102-0213bi-270x296.jpg', 'Reduced by 7.4% (2.0&nbsp;kB)', 25716, 27759, 1, '2016-03-22 23:25:08', NULL),
(212, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717690wpdm_LIM-epi0102-0159bi-270x296.jpg', 'Reduced by 6.2% (1.2&nbsp;kB)', 19452, 20727, 1, '2016-03-22 23:25:09', NULL),
(213, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717688wpdm_LIM-epi0102-0051bi-270x296.jpg', 'Reduced by 5.4% (1.0&nbsp;kB)', 18054, 19091, 1, '2016-03-22 23:25:10', NULL),
(214, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717686wpdm_LIM-epi0102-0044bi-270x296.jpg', 'Reduced by 7.7% (2.0&nbsp;kB)', 24603, 26658, 1, '2016-03-22 23:25:11', NULL),
(215, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717684wpdm_LIM-epi0101-Image14i-270x296.jpg', 'Reduced by 4.4% (780.0&nbsp;B)', 16958, 17738, 1, '2016-03-22 23:25:11', NULL),
(216, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717683wpdm_LIM-epi0101-Image12i-270x296.jpg', 'Reduced by 7.2% (1.6&nbsp;kB)', 21457, 23118, 1, '2016-03-22 23:25:12', NULL),
(217, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717681wpdm_LIM-epi0101-Image11i-270x296.jpg', 'Reduced by 4.9% (954.0&nbsp;B)', 18481, 19435, 1, '2016-03-22 23:25:13', NULL),
(218, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717679wpdm_LIM-epi0101-Image4i-270x296.jpg', 'Reduced by 3.6% (602.0&nbsp;B)', 16175, 16777, 1, '2016-03-22 23:25:14', NULL),
(219, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717677wpdm_LIM-epi0101-Image2i-270x296.jpg', 'Reduced by 5.0% (782.0&nbsp;B)', 14759, 15541, 1, '2016-03-22 23:25:15', NULL),
(220, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717676wpdm_LIM-epi0101-D1319bi-270x296.jpg', 'Reduced by 7.5% (2.1&nbsp;kB)', 26513, 28678, 1, '2016-03-22 23:25:15', NULL),
(221, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717674wpdm_LIM-epi0101-D1233bi-270x296.jpg', 'Reduced by 7.5% (2.1&nbsp;kB)', 26224, 28364, 1, '2016-03-22 23:25:16', NULL),
(222, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717672wpdm_LIM-epi0101-D1064bi-270x296.jpg', 'Reduced by 4.7% (904.0&nbsp;B)', 18204, 19108, 1, '2016-03-22 23:25:17', NULL),
(223, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717670wpdm_LIM-epi0101-D0912bi-270x296.jpg', 'Reduced by 7.0% (1.6&nbsp;kB)', 21283, 22887, 1, '2016-03-22 23:25:18', NULL),
(224, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717668wpdm_LIM-epi0101-D0868bi-270x296.jpg', 'Reduced by 7.7% (1.9&nbsp;kB)', 23023, 24953, 1, '2016-03-22 23:25:19', NULL),
(225, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717667wpdm_LIM-epi0101-D0848bi-270x296.jpg', 'Reduced by 6.3% (1.4&nbsp;kB)', 21169, 22599, 1, '2016-03-22 23:25:20', NULL),
(226, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717665wpdm_LIM-epi0101-D0714bi-270x296.jpg', 'Reduced by 6.0% (1.3&nbsp;kB)', 21175, 22524, 1, '2016-03-22 23:25:21', NULL),
(227, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717663wpdm_LIM-epi0101-D0707bi-270x296.jpg', 'Reduced by 5.6% (1.2&nbsp;kB)', 20445, 21664, 1, '2016-03-22 23:25:22', NULL),
(228, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717661wpdm_LIM-epi0101-D0659bi-270x296.jpg', 'Reduced by 3.9% (629.0&nbsp;B)', 15544, 16173, 1, '2016-03-22 23:25:24', NULL),
(229, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717659wpdm_LIM-epi0101-D0581bi-270x296.jpg', 'Reduced by 6.6% (1.8&nbsp;kB)', 25601, 27409, 1, '2016-03-22 23:25:25', NULL),
(230, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717658wpdm_LIM-epi0101-D0329bi-270x296.jpg', 'Reduced by 5.7% (1,019.0&nbsp;B)', 17005, 18024, 1, '2016-03-22 23:25:25', NULL),
(231, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717656wpdm_LIM-epi0101-D0243bi-270x296.jpg', 'Reduced by 6.2% (1.5&nbsp;kB)', 23300, 24834, 1, '2016-03-22 23:25:27', NULL),
(232, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717654wpdm_LIM-epi0101-D0110bi-270x296.jpg', 'Reduced by 6.5% (1.5&nbsp;kB)', 22549, 24119, 1, '2016-03-22 23:25:27', NULL),
(233, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717652wpdm_LIM-epi0101-3518bi-270x296.jpg', 'Reduced by 6.3% (1.6&nbsp;kB)', 24849, 26526, 1, '2016-03-22 23:25:28', NULL),
(234, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717651wpdm_LIM-epi0101-3015bi-270x296.jpg', 'Reduced by 5.6% (1.0&nbsp;kB)', 17716, 18765, 1, '2016-03-22 23:25:29', NULL),
(235, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717649wpdm_LIM-epi0101-3007bi-270x296.jpg', 'Reduced by 5.0% (898.0&nbsp;B)', 16923, 17821, 1, '2016-03-22 23:25:31', NULL),
(236, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717647wpdm_LIM-epi0101-2236bi-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 19411, 20572, 1, '2016-03-22 23:25:32', NULL),
(237, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717645wpdm_LIM-epi0101-1358bi-270x296.jpg', 'Reduced by 5.3% (1.0&nbsp;kB)', 19378, 20452, 1, '2016-03-22 23:25:33', NULL),
(238, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717643wpdm_LIM-epi0101-1267Bi-270x296.jpg', 'Reduced by 9.9% (3.6&nbsp;kB)', 33235, 36880, 1, '2016-03-22 23:25:34', NULL),
(239, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717641wpdm_LIM-epi0101-472bi-270x296.jpg', 'Reduced by 7.7% (2.4&nbsp;kB)', 29427, 31892, 1, '2016-03-22 23:25:35', NULL),
(240, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717640wpdm_LIM-epi0101-338bi-270x296.jpg', 'Reduced by 4.0% (663.0&nbsp;B)', 16068, 16731, 1, '2016-03-22 23:25:36', NULL),
(241, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717638wpdm_LIM-epi0101-141bi-270x296.jpg', 'Reduced by 6.6% (1.5&nbsp;kB)', 21695, 23228, 1, '2016-03-22 23:25:38', NULL),
(242, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458717636wpdm_LIM-epi0101-38BWSi-270x296.jpg', 'Reduced by 6.2% (1.6&nbsp;kB)', 24972, 26629, 1, '2016-03-22 23:25:39', NULL),
(243, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458718017wpdm_LIM-backplate_C242_clean101i-270x296.jpg', 'Reduced by 5.9% (719.0&nbsp;B)', 11494, 12213, 1, '2016-03-22 23:28:57', NULL),
(244, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458718020wpdm_Limitless_logo-270x296.png', 'Reduced by 10.9% (1.1&nbsp;kB)', 9040, 10149, 1, '2016-03-22 23:28:58', NULL),
(245, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458718023wpdm_LIM-logo-black101i-270x296.jpg', 'Reduced by 37.1% (1.7&nbsp;kB)', 3019, 4796, 1, '2016-03-22 23:28:58', NULL),
(246, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458718025wpdm_LIM-logo-black101i-270x296.png', 'Reduced by 55.1% (416.0&nbsp;B)', 339, 755, 1, '2016-03-22 23:28:59', NULL),
(247, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458718028wpdm_LIM-logo-white102i-270x296.png', 'Reduced by 55.9% (430.0&nbsp;B)', 339, 769, 1, '2016-03-22 23:28:59', NULL),
(248, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458718212wpdm_LIM-JenCarpenter-Meme-107i-270x296.jpg', 'Reduced by 6.1% (1.2&nbsp;kB)', 19229, 20478, 1, '2016-03-22 23:31:33', NULL),
(249, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458718215wpdm_LIM-QuoteMeme-001i-270x296.jpg', 'Reduced by 4.8% (699.0&nbsp;B)', 13783, 14482, 1, '2016-03-22 23:31:33', NULL),
(250, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458718218wpdm_LIM-S01-SocialMedia_Morra-270x296.jpg', 'Reduced by 8.6% (3.7&nbsp;kB)', 39561, 43300, 1, '2016-03-22 23:31:34', NULL),
(251, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458718220wpdm_LIM-S01-SocialMedia_sideeffectsi-270x296.jpg', 'Reduced by 8.2% (2.6&nbsp;kB)', 29989, 32669, 1, '2016-03-22 23:31:35', NULL),
(252, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458718357wpdm_LIM-carpenter101i-270x296.jpg', 'Reduced by 6.9% (1.6&nbsp;kB)', 22617, 24286, 1, '2016-03-22 23:33:16', NULL),
(253, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1458718360wpdm_LIM-mcdorman101i-270x296.jpg', 'Reduced by 6.3% (1.1&nbsp;kB)', 17497, 18668, 1, '2016-03-22 23:33:20', NULL),
(259, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-gabel102i-48x48.jpg', 'Reduced by 29.5% (384.0&nbsp;B)', 918, 1302, 1, '2016-03-22 23:57:26', NULL),
(260, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-gabel102i-270x296.jpg', 'Reduced by 5.6% (575.0&nbsp;B)', 9741, 10316, 1, '2016-03-23 00:01:38', NULL);
INSERT INTO `rtl21016_ewwwio_images` (`id`, `path`, `results`, `image_size`, `orig_size`, `updates`, `updated`, `trace`) VALUES
(261, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/img-404-270x296.png', 'Reduced by 57.0% (32.3&nbsp;kB)', 25015, 58131, 1, '2016-03-23 00:17:07', NULL),
(262, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-carpenter102i 2-48x48.jpg', 'Reduced by 31.2% (400.0&nbsp;B)', 882, 1282, 1, '2016-03-27 17:32:29', NULL),
(263, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-carpenter102i 2-270x296.jpg', 'Reduced by 6.7% (648.0&nbsp;B)', 8989, 9637, 1, '2016-03-27 17:33:15', NULL),
(264, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459128823wpdm_LIM-carpenter101i-48x48.jpg', 'Reduced by 21.9% (390.0&nbsp;B)', 1394, 1784, 1, '2016-03-27 17:33:53', NULL),
(265, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459128823wpdm_LIM-carpenter101i-270x296.jpg', 'Reduced by 6.9% (1.6&nbsp;kB)', 22617, 24286, 1, '2016-03-27 17:33:58', NULL),
(266, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-carpenter101i 2-48x48.jpg', 'Reduced by 21.9% (391.0&nbsp;B)', 1392, 1783, 1, '2016-03-27 17:35:26', NULL),
(267, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-carpenter101i 2-270x296.jpg', 'Reduced by 6.8% (1.6&nbsp;kB)', 22633, 24297, 1, '2016-03-27 17:35:41', NULL),
(268, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/docx-270x296.png', 'Reduced by 1.3% (42.0&nbsp;B)', 3126, 3168, 1, '2016-03-27 18:21:52', NULL),
(269, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/pdf-270x296.png', 'Reduced by 0.9% (24.0&nbsp;B)', 2660, 2684, 1, '2016-03-27 18:21:53', NULL),
(270, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/xlsx-270x296.png', 'Reduced by 1.4% (42.0&nbsp;B)', 2931, 2973, 1, '2016-03-27 18:21:53', NULL),
(271, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/jpg-270x296.png', 'Reduced by 1.5% (42.0&nbsp;B)', 2758, 2800, 1, '2016-03-27 18:21:54', NULL),
(272, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/psd-270x296.png', 'Reduced by 2.0% (51.0&nbsp;B)', 2530, 2581, 1, '2016-03-27 18:24:19', NULL),
(273, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/eps-270x296.png', 'Reduced by 1.7% (42.0&nbsp;B)', 2374, 2416, 1, '2016-03-27 18:24:20', NULL),
(274, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/pdf-30x30.png', 'No savings', 1688, 1688, 1, '2016-03-27 18:41:33', NULL),
(275, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/psd-30x30.png', 'No savings', 1694, 1694, 1, '2016-03-27 18:41:34', NULL),
(276, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/eps-30x30.png', 'Reduced by 0.2% (3.0&nbsp;B)', 1615, 1618, 1, '2016-03-27 18:41:34', NULL),
(277, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/img-404-30x30.png', 'Reduced by 22.7% (142.0&nbsp;B)', 483, 625, 1, '2016-03-27 18:41:35', NULL),
(278, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Entertainment_whiteBG_solid-400x300.png', 'Reduced by 18.4% (7.0&nbsp;kB)', 31807, 38982, 1, '2016-03-27 18:48:34', NULL),
(279, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Entertainment_whiteBG_solid-575x170.png', 'Reduced by 10.9% (3.9&nbsp;kB)', 32708, 36720, 1, '2016-03-27 18:48:36', NULL),
(280, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Entertainment_whiteBG_solid-100x45.png', 'Reduced by 4.4% (181.0&nbsp;B)', 3896, 4077, 1, '2016-03-27 18:48:37', NULL),
(281, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/01/SCP-keyart-horiz201i.jpg', 'Reduced by 9.5% (1.1&nbsp;MB)', 10543139, 11654770, 1, '2016-03-27 21:21:37', NULL),
(282, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/01/SCP-keyart-horiz201i-150x150.jpg', 'Reduced by 6.6% (578.0&nbsp;B)', 8141, 8719, 1, '2016-03-27 21:21:37', NULL),
(283, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/01/SCP-keyart-horiz201i-300x93.jpg', 'Reduced by 7.5% (852.0&nbsp;B)', 10483, 11335, 1, '2016-03-27 21:21:37', NULL),
(284, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/01/SCP-keyart-horiz201i-768x239.jpg', 'Reduced by 5.8% (2.8&nbsp;kB)', 46161, 48989, 1, '2016-03-27 21:21:38', NULL),
(285, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/01/SCP-keyart-horiz201i-1024x318.jpg', 'Reduced by 5.4% (4.1&nbsp;kB)', 73724, 77916, 1, '2016-03-27 21:21:38', NULL),
(286, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-keyart-horiz201i-400x300.jpg', 'Reduced by 5.6% (1.7&nbsp;kB)', 29856, 31624, 1, '2016-03-27 21:22:50', NULL),
(287, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-keyart-horiz201i-575x170.jpg', 'Reduced by 6.5% (1.9&nbsp;kB)', 28484, 30467, 1, '2016-03-27 21:22:53', NULL),
(288, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-keyart-horiz201i-100x45.jpg', 'Reduced by 13.0% (409.0&nbsp;B)', 2735, 3144, 1, '2016-03-27 21:22:55', NULL),
(289, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-keyart-horiz-TT202i-270x296.jpg', 'Reduced by 6.9% (1.7&nbsp;kB)', 23645, 25398, 1, '2016-03-27 21:32:24', NULL),
(290, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-keyart-horiz-TT-TAG202i-270x296.jpg', 'Reduced by 6.9% (1.7&nbsp;kB)', 23645, 25398, 1, '2016-03-27 21:32:25', NULL),
(291, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-keyart-horiz201i-270x296.jpg', 'Reduced by 5.4% (1.2&nbsp;kB)', 20657, 21847, 1, '2016-03-27 21:32:27', NULL),
(292, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-cast101i-270x296.jpg', 'Reduced by 6.6% (1.6&nbsp;kB)', 22710, 24325, 1, '2016-03-27 21:32:28', NULL),
(293, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-cast102i-270x296.jpg', 'Reduced by 6.4% (1.7&nbsp;kB)', 25148, 26871, 1, '2016-03-27 21:32:29', NULL),
(294, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-gabel101i-270x296.jpg', 'Reduced by 5.4% (614.0&nbsp;B)', 10765, 11379, 1, '2016-03-27 21:32:30', NULL),
(295, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459142824wpdm_SCP-gabel102i-270x296.jpg', 'Reduced by 5.6% (575.0&nbsp;B)', 9741, 10316, 1, '2016-03-27 21:32:31', NULL),
(296, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-mcphee101i-270x296.jpg', 'Reduced by 6.0% (656.0&nbsp;B)', 10352, 11008, 1, '2016-03-27 21:32:32', NULL),
(297, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-patrick101i-270x296.jpg', 'Reduced by 6.2% (581.0&nbsp;B)', 8843, 9424, 1, '2016-03-27 21:32:33', NULL),
(298, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-stidham101i-270x296.jpg', 'Reduced by 3.8% (507.0&nbsp;B)', 12892, 13399, 1, '2016-03-27 21:32:34', NULL),
(299, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-thomas101i-270x296.jpg', 'Reduced by 5.1% (618.0&nbsp;B)', 11559, 12177, 1, '2016-03-27 21:32:35', NULL),
(300, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-wong101i-270x296.jpg', 'Reduced by 9.0% (973.0&nbsp;B)', 9800, 10773, 1, '2016-03-27 21:32:36', NULL),
(301, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-logoblack101i-270x296.jpg', 'Reduced by 24.7% (1.9&nbsp;kB)', 5835, 7745, 1, '2016-03-27 21:35:28', NULL),
(302, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-logoblack101i-270x296.png', 'Reduced by 41.0% (739.0&nbsp;B)', 1062, 1801, 1, '2016-03-27 21:35:29', NULL),
(303, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-logocolor102i-270x296.jpg', 'Reduced by 18.4% (1.7&nbsp;kB)', 7822, 9580, 1, '2016-03-27 21:35:29', NULL),
(304, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-logocolor102i-270x296.png', 'Reduced by 44.1% (838.0&nbsp;B)', 1062, 1900, 1, '2016-03-27 21:35:30', NULL),
(305, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-logowhite103i-270x296.png', 'Reduced by 43.5% (818.0&nbsp;B)', 1062, 1880, 1, '2016-03-27 21:35:30', NULL),
(306, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-logoblack101i (1)-270x296.png', 'Reduced by 41.0% (739.0&nbsp;B)', 1062, 1801, 1, '2016-03-27 21:35:30', NULL),
(307, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459148668wpdm_SCP-gabel101i-270x296.jpg', 'Reduced by 5.4% (614.0&nbsp;B)', 10765, 11379, 1, '2016-03-27 23:06:10', NULL),
(308, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459148670wpdm_SCP-gabel102i-270x296.jpg', 'Reduced by 5.6% (575.0&nbsp;B)', 9741, 10316, 1, '2016-03-27 23:06:11', NULL),
(309, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459148671wpdm_SCP-mcphee101i-270x296.jpg', 'Reduced by 6.0% (656.0&nbsp;B)', 10352, 11008, 1, '2016-03-27 23:06:12', NULL),
(310, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459148673wpdm_SCP-patrick101i-270x296.jpg', 'Reduced by 6.2% (581.0&nbsp;B)', 8843, 9424, 1, '2016-03-27 23:06:13', NULL),
(311, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459148674wpdm_SCP-stidham101i-270x296.jpg', 'Reduced by 3.8% (507.0&nbsp;B)', 12892, 13399, 1, '2016-03-27 23:06:14', NULL),
(312, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459148676wpdm_SCP-thomas101i-270x296.jpg', 'Reduced by 5.1% (618.0&nbsp;B)', 11559, 12177, 1, '2016-03-27 23:06:15', NULL),
(313, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459148677wpdm_SCP-wong101i-270x296.jpg', 'Reduced by 9.0% (973.0&nbsp;B)', 9800, 10773, 1, '2016-03-27 23:06:16', NULL),
(314, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459148679wpdm_SCP-cast101i-270x296.jpg', 'Reduced by 6.6% (1.6&nbsp;kB)', 22710, 24325, 1, '2016-03-27 23:06:17', NULL),
(315, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459148681wpdm_SCP-cast102i-270x296.jpg', 'Reduced by 6.4% (1.7&nbsp;kB)', 25148, 26871, 1, '2016-03-27 23:06:19', NULL),
(316, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0203-D0149bi-270x296.jpg', 'Reduced by 8.4% (3.4&nbsp;kB)', 37486, 40945, 1, '2016-03-27 23:06:19', NULL),
(317, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0203-D0485bi-270x296.jpg', 'Reduced by 5.2% (1,021.0&nbsp;B)', 18633, 19654, 1, '2016-03-27 23:06:20', NULL),
(318, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0203-D0542bi-270x296.jpg', 'Reduced by 6.3% (1.4&nbsp;kB)', 21940, 23419, 1, '2016-03-27 23:06:20', NULL),
(319, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-BTS-epi0201-D2798bxi-270x296.jpg', 'Reduced by 6.2% (1.5&nbsp;kB)', 22588, 24081, 1, '2016-03-27 23:06:21', NULL),
(320, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D0074bi-270x296.jpg', 'Reduced by 5.0% (1.0&nbsp;kB)', 19675, 20700, 1, '2016-03-27 23:06:21', NULL),
(321, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D0162bi-270x296.jpg', 'Reduced by 7.6% (1.7&nbsp;kB)', 20953, 22667, 1, '2016-03-27 23:06:22', NULL),
(322, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D0198bi-270x296.jpg', 'Reduced by 4.7% (782.0&nbsp;B)', 15886, 16668, 1, '2016-03-27 23:06:22', NULL),
(323, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D0524bi-270x296.jpg', 'Reduced by 5.9% (1.2&nbsp;kB)', 19241, 20440, 1, '2016-03-27 23:06:23', NULL),
(324, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D0565bi-270x296.jpg', 'Reduced by 6.0% (1.2&nbsp;kB)', 19161, 20385, 1, '2016-03-27 23:06:24', NULL),
(325, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D0599bi-270x296.jpg', 'Reduced by 4.2% (628.0&nbsp;B)', 14170, 14798, 1, '2016-03-27 23:06:24', NULL),
(326, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D0749bi-270x296.jpg', 'Reduced by 6.2% (1.2&nbsp;kB)', 17784, 18966, 1, '2016-03-27 23:06:25', NULL),
(327, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D0870bi-270x296.jpg', 'Reduced by 5.2% (914.0&nbsp;B)', 16796, 17710, 1, '2016-03-27 23:06:26', NULL),
(328, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D0912bi-270x296.jpg', 'Reduced by 6.0% (1.2&nbsp;kB)', 19783, 21055, 1, '2016-03-27 23:06:26', NULL),
(329, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D0990bi-270x296.jpg', 'Reduced by 5.4% (1.0&nbsp;kB)', 18515, 19563, 1, '2016-03-27 23:06:27', NULL),
(330, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D1057bi-270x296.jpg', 'Reduced by 7.4% (1.9&nbsp;kB)', 23946, 25847, 1, '2016-03-27 23:06:28', NULL),
(331, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D1466bi-270x296.jpg', 'Reduced by 5.9% (1.2&nbsp;kB)', 20067, 21323, 1, '2016-03-27 23:06:28', NULL),
(332, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D1708bi-270x296.jpg', 'Reduced by 4.3% (616.0&nbsp;B)', 13820, 14436, 1, '2016-03-27 23:06:29', NULL),
(333, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D1736bi-270x296.jpg', 'Reduced by 4.3% (741.0&nbsp;B)', 16468, 17209, 1, '2016-03-27 23:06:29', NULL),
(334, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0201-D2752bi-270x296.jpg', 'Reduced by 6.0% (1.1&nbsp;kB)', 17923, 19057, 1, '2016-03-27 23:06:30', NULL),
(335, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0202-D0495bi-270x296.jpg', 'Reduced by 4.3% (927.0&nbsp;B)', 20542, 21469, 1, '2016-03-27 23:06:31', NULL),
(336, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0202-D0532bi-270x296.jpg', 'Reduced by 4.5% (846.0&nbsp;B)', 18039, 18885, 1, '2016-03-27 23:06:31', NULL),
(337, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0202-D0862bi-270x296.jpg', 'Reduced by 4.5% (647.0&nbsp;B)', 13856, 14503, 1, '2016-03-27 23:06:32', NULL),
(338, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0202-D0967bi-270x296.jpg', 'Reduced by 5.8% (1.4&nbsp;kB)', 23265, 24691, 1, '2016-03-27 23:06:33', NULL),
(339, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0202-D0978bi-270x296.jpg', 'Reduced by 6.3% (1.6&nbsp;kB)', 24696, 26358, 1, '2016-03-27 23:06:33', NULL),
(340, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0203-D0017bi-270x296.jpg', 'Reduced by 8.0% (2.8&nbsp;kB)', 33395, 36313, 1, '2016-03-27 23:06:34', NULL),
(341, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0203-D0048bi-270x296.jpg', 'Reduced by 7.8% (2.3&nbsp;kB)', 28190, 30576, 1, '2016-03-27 23:06:34', NULL),
(342, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0203-D0062bi-270x296.jpg', 'Reduced by 8.1% (2.5&nbsp;kB)', 29149, 31716, 1, '2016-03-27 23:06:35', NULL),
(343, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0203-D0077bi-270x296.jpg', 'Reduced by 7.9% (2.6&nbsp;kB)', 31112, 33791, 1, '2016-03-27 23:06:36', NULL),
(344, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0203-D0083bi-270x296.jpg', 'Reduced by 7.4% (2.4&nbsp;kB)', 30546, 32997, 1, '2016-03-27 23:06:36', NULL),
(345, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-epi0203-D0123bi-270x296.jpg', 'Reduced by 7.4% (2.1&nbsp;kB)', 26419, 28540, 1, '2016-03-27 23:06:37', NULL),
(346, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/Scorpion_SFG_Meme_FanBoy-270x296.jpg', 'Reduced by 7.7% (2.5&nbsp;kB)', 31020, 33611, 1, '2016-03-27 23:06:37', NULL),
(347, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/Scorpion_SFG_Meme_PattyPrankenstein-270x296.jpg', 'Reduced by 7.6% (2.2&nbsp;kB)', 27536, 29794, 1, '2016-03-27 23:06:38', NULL),
(348, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/Scorpion_SFG_Meme_SuperFunGuy-270x296.jpg', 'Reduced by 8.2% (2.8&nbsp;kB)', 31751, 34589, 1, '2016-03-27 23:06:38', NULL),
(349, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/Scorpion_SFG_Meme_TheGiggler-270x296.jpg', 'Reduced by 8.5% (3.1&nbsp;kB)', 33575, 36714, 1, '2016-03-27 23:06:39', NULL),
(350, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/Scorpion_SFG_Meme_WhimsicalBoy-270x296.jpg', 'Reduced by 7.7% (2.4&nbsp;kB)', 29252, 31697, 1, '2016-03-27 23:06:39', NULL),
(351, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/Scorpion_SFG_Meme_ZaneyZoey-270x296.jpg', 'Reduced by 7.4% (2.1&nbsp;kB)', 26794, 28941, 1, '2016-03-27 23:06:39', NULL),
(352, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/Scorpion_SFG_poster_6-270x296.jpg', 'Reduced by 8.3% (3.3&nbsp;kB)', 37674, 41069, 1, '2016-03-27 23:06:40', NULL),
(353, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459149423wpdm_show-1-featured-img-48x48.jpg', 'Reduced by 20.0% (396.0&nbsp;B)', 1587, 1983, 1, '2016-03-27 23:17:29', NULL),
(354, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459149421wpdm_elementary3-featured-48x48.jpg', 'Reduced by 24.4% (389.0&nbsp;B)', 1206, 1595, 1, '2016-03-27 23:17:30', NULL),
(355, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459149423wpdm_show-1-featured-img-270x296.jpg', 'Reduced by 8.5% (1.7&nbsp;kB)', 19029, 20806, 1, '2016-03-27 23:17:33', NULL),
(356, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459149421wpdm_elementary3-featured-270x296.jpg', 'Reduced by 5.3% (637.0&nbsp;B)', 11444, 12081, 1, '2016-03-27 23:17:34', NULL),
(357, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459150676wpdm_show-1-featured-img-270x296.jpg', 'Reduced by 8.5% (1.7&nbsp;kB)', 19029, 20806, 1, '2016-03-27 23:38:23', NULL),
(358, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155276wpdm_SCP-wong101i-270x296.jpg', 'Reduced by 9.0% (973.0&nbsp;B)', 9800, 10773, 1, '2016-03-28 00:55:04', NULL),
(359, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155275wpdm_SCP-thomas101i-270x296.jpg', 'Reduced by 5.1% (618.0&nbsp;B)', 11559, 12177, 1, '2016-03-28 00:55:05', NULL),
(360, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155273wpdm_SCP-stidham101i-270x296.jpg', 'Reduced by 3.8% (507.0&nbsp;B)', 12892, 13399, 1, '2016-03-28 00:55:06', NULL),
(361, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155272wpdm_SCP-patrick101i-270x296.jpg', 'Reduced by 6.2% (581.0&nbsp;B)', 8843, 9424, 1, '2016-03-28 00:55:08', NULL),
(362, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155270wpdm_SCP-mcphee101i-270x296.jpg', 'Reduced by 6.0% (656.0&nbsp;B)', 10352, 11008, 1, '2016-03-28 00:55:09', NULL),
(363, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155268wpdm_SCP-gabel102i-270x296.jpg', 'Reduced by 5.6% (575.0&nbsp;B)', 9741, 10316, 1, '2016-03-28 00:55:10', NULL),
(364, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155267wpdm_SCP-gabel101i-270x296.jpg', 'Reduced by 5.4% (614.0&nbsp;B)', 10765, 11379, 1, '2016-03-28 00:55:11', NULL),
(365, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155265wpdm_SCP-cast102i-270x296.jpg', 'Reduced by 6.4% (1.7&nbsp;kB)', 25148, 26871, 1, '2016-03-28 00:55:12', NULL),
(366, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155263wpdm_SCP-cast101i-270x296.jpg', 'Reduced by 6.6% (1.6&nbsp;kB)', 22710, 24325, 1, '2016-03-28 00:55:13', NULL),
(367, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155276wpdm_SCP-wong101i-48x48.jpg', 'Reduced by 33.2% (405.0&nbsp;B)', 814, 1219, 1, '2016-03-28 00:55:16', NULL),
(368, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155275wpdm_SCP-thomas101i-48x48.jpg', 'Reduced by 27.4% (389.0&nbsp;B)', 1032, 1421, 1, '2016-03-28 00:55:17', NULL),
(369, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155273wpdm_SCP-stidham101i-48x48.jpg', 'Reduced by 26.4% (390.0&nbsp;B)', 1089, 1479, 1, '2016-03-28 00:55:18', NULL),
(370, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155272wpdm_SCP-patrick101i-48x48.jpg', 'Reduced by 29.3% (394.0&nbsp;B)', 952, 1346, 1, '2016-03-28 00:55:19', NULL),
(371, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155270wpdm_SCP-mcphee101i-48x48.jpg', 'Reduced by 28.3% (383.0&nbsp;B)', 970, 1353, 1, '2016-03-28 00:55:20', NULL),
(372, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155268wpdm_SCP-gabel102i-48x48.jpg', 'Reduced by 29.5% (384.0&nbsp;B)', 918, 1302, 1, '2016-03-28 00:55:21', NULL),
(373, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155267wpdm_SCP-gabel101i-48x48.jpg', 'Reduced by 28.4% (388.0&nbsp;B)', 978, 1366, 1, '2016-03-28 00:55:22', NULL),
(374, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155265wpdm_SCP-cast102i-48x48.jpg', 'Reduced by 20.5% (399.0&nbsp;B)', 1550, 1949, 1, '2016-03-28 00:55:23', NULL),
(375, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155263wpdm_SCP-cast101i-48x48.jpg', 'Reduced by 20.6% (392.0&nbsp;B)', 1509, 1901, 1, '2016-03-28 00:55:24', NULL),
(376, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155413wpdm_SCP-epi0203-D0542bi-270x296.jpg', 'Reduced by 6.3% (1.4&nbsp;kB)', 21940, 23419, 1, '2016-03-28 00:57:30', NULL),
(377, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155411wpdm_SCP-epi0203-D0485bi-270x296.jpg', 'Reduced by 5.2% (1,021.0&nbsp;B)', 18633, 19654, 1, '2016-03-28 00:57:30', NULL),
(378, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155410wpdm_SCP-epi0203-D0149bi-270x296.jpg', 'Reduced by 8.4% (3.4&nbsp;kB)', 37486, 40945, 1, '2016-03-28 00:57:31', NULL),
(379, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155408wpdm_SCP-epi0203-D0123bi-270x296.jpg', 'Reduced by 7.4% (2.1&nbsp;kB)', 26419, 28540, 1, '2016-03-28 00:57:32', NULL),
(380, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155407wpdm_SCP-epi0203-D0083bi-270x296.jpg', 'Reduced by 7.4% (2.4&nbsp;kB)', 30546, 32997, 1, '2016-03-28 00:57:32', NULL),
(381, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155406wpdm_SCP-epi0203-D0077bi-270x296.jpg', 'Reduced by 7.9% (2.6&nbsp;kB)', 31112, 33791, 1, '2016-03-28 00:57:33', NULL),
(382, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155404wpdm_SCP-epi0203-D0062bi-270x296.jpg', 'Reduced by 8.1% (2.5&nbsp;kB)', 29149, 31716, 1, '2016-03-28 00:57:34', NULL),
(383, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155403wpdm_SCP-epi0203-D0048bi-270x296.jpg', 'Reduced by 7.8% (2.3&nbsp;kB)', 28190, 30576, 1, '2016-03-28 00:57:34', NULL),
(384, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155401wpdm_SCP-epi0203-D0017bi-270x296.jpg', 'Reduced by 8.0% (2.8&nbsp;kB)', 33395, 36313, 1, '2016-03-28 00:57:35', NULL),
(385, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155400wpdm_SCP-epi0202-D0978bi-270x296.jpg', 'Reduced by 6.3% (1.6&nbsp;kB)', 24696, 26358, 1, '2016-03-28 00:57:35', NULL),
(386, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155398wpdm_SCP-epi0202-D0967bi-270x296.jpg', 'Reduced by 5.8% (1.4&nbsp;kB)', 23265, 24691, 1, '2016-03-28 00:57:36', NULL),
(387, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155397wpdm_SCP-epi0202-D0862bi-270x296.jpg', 'Reduced by 4.5% (647.0&nbsp;B)', 13856, 14503, 1, '2016-03-28 00:57:36', NULL),
(388, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155395wpdm_SCP-epi0202-D0532bi-270x296.jpg', 'Reduced by 4.5% (846.0&nbsp;B)', 18039, 18885, 1, '2016-03-28 00:57:37', NULL),
(389, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155394wpdm_SCP-epi0202-D0495bi-270x296.jpg', 'Reduced by 4.3% (927.0&nbsp;B)', 20542, 21469, 1, '2016-03-28 00:57:38', NULL),
(390, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155392wpdm_SCP-epi0201-D2752bi-270x296.jpg', 'Reduced by 6.0% (1.1&nbsp;kB)', 17923, 19057, 1, '2016-03-28 00:57:38', NULL),
(391, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155391wpdm_SCP-epi0201-D1736bi-270x296.jpg', 'Reduced by 4.3% (741.0&nbsp;B)', 16468, 17209, 1, '2016-03-28 00:57:39', NULL),
(392, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155390wpdm_SCP-epi0201-D1708bi-270x296.jpg', 'Reduced by 4.3% (616.0&nbsp;B)', 13820, 14436, 1, '2016-03-28 00:57:39', NULL),
(393, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155388wpdm_SCP-epi0201-D1466bi-270x296.jpg', 'Reduced by 5.9% (1.2&nbsp;kB)', 20067, 21323, 1, '2016-03-28 00:57:40', NULL),
(394, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155387wpdm_SCP-epi0201-D1057bi-270x296.jpg', 'Reduced by 7.4% (1.9&nbsp;kB)', 23946, 25847, 1, '2016-03-28 00:57:40', NULL),
(395, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155385wpdm_SCP-epi0201-D0990bi-270x296.jpg', 'Reduced by 5.4% (1.0&nbsp;kB)', 18515, 19563, 1, '2016-03-28 00:57:41', NULL),
(396, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155384wpdm_SCP-epi0201-D0912bi-270x296.jpg', 'Reduced by 6.0% (1.2&nbsp;kB)', 19783, 21055, 1, '2016-03-28 00:57:41', NULL),
(397, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155382wpdm_SCP-epi0201-D0870bi-270x296.jpg', 'Reduced by 5.2% (914.0&nbsp;B)', 16796, 17710, 1, '2016-03-28 00:57:42', NULL),
(398, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155381wpdm_SCP-epi0201-D0749bi-270x296.jpg', 'Reduced by 6.2% (1.2&nbsp;kB)', 17784, 18966, 1, '2016-03-28 00:57:43', NULL),
(399, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155379wpdm_SCP-epi0201-D0599bi-270x296.jpg', 'Reduced by 4.2% (628.0&nbsp;B)', 14170, 14798, 1, '2016-03-28 00:57:43', NULL),
(400, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155378wpdm_SCP-epi0201-D0565bi-270x296.jpg', 'Reduced by 6.0% (1.2&nbsp;kB)', 19161, 20385, 1, '2016-03-28 00:57:44', NULL),
(401, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155376wpdm_SCP-epi0201-D0524bi-270x296.jpg', 'Reduced by 5.9% (1.2&nbsp;kB)', 19241, 20440, 1, '2016-03-28 00:57:44', NULL),
(402, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155375wpdm_SCP-epi0201-D0198bi-270x296.jpg', 'Reduced by 4.7% (782.0&nbsp;B)', 15886, 16668, 1, '2016-03-28 00:57:45', NULL),
(403, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155374wpdm_SCP-epi0201-D0162bi-270x296.jpg', 'Reduced by 7.6% (1.7&nbsp;kB)', 20953, 22667, 1, '2016-03-28 00:57:45', NULL),
(404, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155372wpdm_SCP-epi0201-D0074bi-270x296.jpg', 'Reduced by 5.0% (1.0&nbsp;kB)', 19675, 20700, 1, '2016-03-28 00:57:46', NULL),
(405, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155371wpdm_SCP-BTS-epi0201-D2798bxi-270x296.jpg', 'Reduced by 6.2% (1.5&nbsp;kB)', 22588, 24081, 1, '2016-03-28 00:57:46', NULL),
(406, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155569wpdm_SCP-keyart-horiz201i-270x296.jpg', 'Reduced by 5.4% (1.2&nbsp;kB)', 20657, 21847, 1, '2016-03-28 01:00:44', NULL),
(407, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155573wpdm_SCP-keyart-horiz-minilayers203i-270x296.jpg', 'Reduced by 6.3% (1.5&nbsp;kB)', 23533, 25118, 1, '2016-03-28 01:00:46', NULL),
(408, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155583wpdm_SCP-keyart-horiz-TT202i-270x296.jpg', 'Reduced by 6.9% (1.7&nbsp;kB)', 23645, 25398, 1, '2016-03-28 01:00:46', NULL),
(409, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155584wpdm_SCP-keyart-horiz-TT-TAG202i-270x296.jpg', 'Reduced by 6.9% (1.7&nbsp;kB)', 23645, 25398, 1, '2016-03-28 01:00:47', NULL),
(410, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155763wpdm_SCP-logoblack101i (1)-270x296.png', 'Reduced by 41.0% (739.0&nbsp;B)', 1062, 1801, 1, '2016-03-28 01:03:35', NULL),
(411, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155766wpdm_SCP-logoblack101i-270x296.jpg', 'Reduced by 24.7% (1.9&nbsp;kB)', 5835, 7745, 1, '2016-03-28 01:03:36', NULL),
(412, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155767wpdm_SCP-logoblack101i-270x296.png', 'Reduced by 41.0% (739.0&nbsp;B)', 1062, 1801, 1, '2016-03-28 01:03:36', NULL),
(413, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155770wpdm_SCP-logocolor102i-270x296.jpg', 'Reduced by 18.4% (1.7&nbsp;kB)', 7822, 9580, 1, '2016-03-28 01:03:36', NULL),
(414, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155772wpdm_SCP-logocolor102i-270x296.png', 'Reduced by 44.1% (838.0&nbsp;B)', 1062, 1900, 1, '2016-03-28 01:03:37', NULL),
(415, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155774wpdm_SCP-logowhite103i-270x296.png', 'Reduced by 43.5% (818.0&nbsp;B)', 1062, 1880, 1, '2016-03-28 01:03:37', NULL),
(416, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155775wpdm_Scorpion_SFG_Meme_FanBoy-270x296.jpg', 'Reduced by 7.7% (2.5&nbsp;kB)', 31020, 33611, 1, '2016-03-28 01:03:38', NULL),
(417, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155776wpdm_Scorpion_SFG_Meme_PattyPrankenstein-270x296.jpg', 'Reduced by 7.6% (2.2&nbsp;kB)', 27536, 29794, 1, '2016-03-28 01:03:38', NULL),
(418, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155778wpdm_Scorpion_SFG_Meme_SuperFunGuy-270x296.jpg', 'Reduced by 8.2% (2.8&nbsp;kB)', 31751, 34589, 1, '2016-03-28 01:03:38', NULL),
(419, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155779wpdm_Scorpion_SFG_Meme_TheGiggler-270x296.jpg', 'Reduced by 8.5% (3.1&nbsp;kB)', 33575, 36714, 1, '2016-03-28 01:03:39', NULL),
(420, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155780wpdm_Scorpion_SFG_Meme_WhimsicalBoy-270x296.jpg', 'Reduced by 7.7% (2.4&nbsp;kB)', 29252, 31697, 1, '2016-03-28 01:03:39', NULL),
(421, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155781wpdm_Scorpion_SFG_Meme_ZaneyZoey-270x296.jpg', 'Reduced by 7.4% (2.1&nbsp;kB)', 26794, 28941, 1, '2016-03-28 01:03:39', NULL),
(422, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459155782wpdm_Scorpion_SFG_poster_6-270x296.jpg', 'Reduced by 8.3% (3.3&nbsp;kB)', 37674, 41069, 1, '2016-03-28 01:03:40', NULL),
(423, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/SCP-keyart-horiz201i-270x290.jpg', 'Reduced by 5.4% (1.1&nbsp;kB)', 20700, 21874, 1, '2016-03-28 01:36:45', NULL),
(424, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712.png', 'Reduced by 8.5% (10.2&nbsp;kB)', 112435, 122908, 1, '2016-03-29 00:33:10', NULL),
(425, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-150x150.png', 'Reduced by 9.7% (465.0&nbsp;B)', 4305, 4770, 1, '2016-03-29 00:33:11', NULL),
(426, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-232x300.png', 'Reduced by 7.2% (597.0&nbsp;B)', 7674, 8271, 1, '2016-03-29 00:33:12', NULL),
(427, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-768x994.png', 'Reduced by 3.3% (1.2&nbsp;kB)', 36787, 38045, 1, '2016-03-29 00:33:14', NULL),
(428, 'C:\\xampp\\htdocs\\rtlcbsasia/wp-content/uploads/2016/03/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-791x1024.png', 'Reduced by 4.3% (1.8&nbsp;kB)', 41447, 43311, 1, '2016-03-29 00:33:16', NULL),
(429, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/xpress_us_white-270x296.png', 'Reduced by 18.1% (6.8&nbsp;kB)', 31304, 38223, 1, '2016-03-29 00:33:23', NULL),
(430, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/xpress_us_black-270x296.png', 'Reduced by 6.0% (1.5&nbsp;kB)', 24814, 26388, 1, '2016-03-29 00:33:24', NULL),
(431, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/xpress_uk_white-270x296.png', 'Reduced by 19.0% (6.5&nbsp;kB)', 28279, 34928, 1, '2016-03-29 00:33:26', NULL),
(432, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/xpress_uk_black-270x296.png', 'Reduced by 6.8% (1.6&nbsp;kB)', 22838, 24499, 1, '2016-03-29 00:33:27', NULL),
(433, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/horz_xpress_us_white_1-270x296.png', 'Reduced by 19.3% (3.2&nbsp;kB)', 13758, 17042, 1, '2016-03-29 00:33:28', NULL),
(434, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/horz_xpress_us_black_1-270x296.png', 'Reduced by 34.7% (3.9&nbsp;kB)', 7436, 11394, 1, '2016-03-29 00:33:28', NULL),
(435, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/horz_xpress_uk_white_1-270x296.png', 'Reduced by 18.9% (4.0&nbsp;kB)', 17724, 21845, 1, '2016-03-29 00:33:29', NULL),
(436, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/horz_xpress_uk_black_1-270x296.png', 'Reduced by 35.3% (3.8&nbsp;kB)', 7127, 11018, 1, '2016-03-29 00:33:30', NULL),
(437, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/FE_RedRibbon1-270x296.png', 'Reduced by 57.9% (697.0&nbsp;B)', 506, 1203, 1, '2016-03-29 00:33:30', NULL),
(438, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/FE_FBlueRibbon-270x296.png', 'Reduced by 63.8% (727.0&nbsp;B)', 412, 1139, 1, '2016-03-29 00:33:31', NULL),
(439, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Entertainment_whiteBG_solid-270x296.png', 'Reduced by 7.2% (1.5&nbsp;kB)', 20176, 21731, 1, '2016-03-29 00:33:32', NULL),
(440, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Entertainment_darkbg_solid-270x296.png', 'Reduced by 11.0% (2.6&nbsp;kB)', 21418, 24073, 1, '2016-03-29 00:33:33', NULL),
(441, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_LogoCorporate_PRINT_whiteBG_Alpha_20130724-270x296.png', 'Reduced by 12.9% (1.8&nbsp;kB)', 12405, 14246, 1, '2016-03-29 00:33:35', NULL),
(442, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_LogoCorporate_PRINT_darkBG_Alpha_20130724-270x296.png', 'Reduced by 12.1% (1.8&nbsp;kB)', 13464, 15323, 1, '2016-03-29 00:33:37', NULL),
(443, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-48x48.png', 'No savings', 1199, 1199, 1, '2016-03-29 00:38:11', NULL),
(444, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Extreme_PRINT_darkBG_ALPHA_PNG_20130712-48x48.png', 'Reduced by 12.0% (144.0&nbsp;B)', 1059, 1203, 1, '2016-03-29 00:38:12', NULL),
(445, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-270x296.png', 'Reduced by 6.8% (640.0&nbsp;B)', 8807, 9447, 1, '2016-03-29 19:49:31', NULL),
(446, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Extreme_PRINT_darkBG_ALPHA_PNG_20130712-270x296.png', 'Reduced by 5.4% (541.0&nbsp;B)', 9539, 10080, 1, '2016-03-29 19:49:32', NULL),
(447, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-400x300.png', 'Reduced by 6.1% (868.0&nbsp;B)', 13347, 14215, 1, '2016-03-29 19:49:34', NULL),
(448, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-575x170.png', 'Reduced by 5.6% (1.2&nbsp;kB)', 21284, 22546, 1, '2016-03-29 19:49:35', NULL),
(449, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-100x45.png', 'Reduced by 10.6% (304.0&nbsp;B)', 2559, 2863, 1, '2016-03-29 19:49:36', NULL),
(450, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/elements_horz_xpress_us_white_1-270x296.png', 'Reduced by 19.3% (3.2&nbsp;kB)', 13758, 17042, 1, '2016-03-29 21:24:45', NULL),
(451, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/elements_xpress_uk_black-270x296.png', 'Reduced by 6.8% (1.6&nbsp;kB)', 22838, 24499, 1, '2016-03-29 21:24:46', NULL),
(452, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/elements_xpress_uk_white-270x296.png', 'Reduced by 19.0% (6.5&nbsp;kB)', 28279, 34928, 1, '2016-03-29 21:24:47', NULL),
(453, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/elements_xpress_us_black-270x296.png', 'Reduced by 6.0% (1.5&nbsp;kB)', 24814, 26388, 1, '2016-03-29 21:24:48', NULL),
(454, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/elements_xpress_us_white-270x296.png', 'Reduced by 18.1% (6.8&nbsp;kB)', 31304, 38223, 1, '2016-03-29 21:24:50', NULL),
(455, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/elements_FE_FBlueRibbon-270x296.png', 'Reduced by 63.8% (727.0&nbsp;B)', 412, 1139, 1, '2016-03-29 21:24:50', NULL),
(456, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/elements_FE_RedRibbon1-270x296.png', 'Reduced by 57.9% (697.0&nbsp;B)', 506, 1203, 1, '2016-03-29 21:24:50', NULL),
(457, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/elements_horz_xpress_uk_black_1-270x296.png', 'Reduced by 35.3% (3.8&nbsp;kB)', 7127, 11018, 1, '2016-03-29 21:24:51', NULL),
(458, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/elements_horz_xpress_uk_white_1-270x296.png', 'Reduced by 18.9% (4.0&nbsp;kB)', 17724, 21845, 1, '2016-03-29 21:24:52', NULL),
(459, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/elements_horz_xpress_us_black_1-270x296.png', 'Reduced by 34.7% (3.9&nbsp;kB)', 7436, 11394, 1, '2016-03-29 21:24:52', NULL),
(460, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Entertainment_whiteBG_solid_logo-270x296.png', 'Reduced by 7.2% (1.5&nbsp;kB)', 20176, 21731, 1, '2016-03-29 21:27:13', NULL),
(461, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Entertainment_darkbg_solid_logo-270x296.png', 'Reduced by 11.0% (2.6&nbsp;kB)', 21418, 24073, 1, '2016-03-29 21:27:14', NULL),
(462, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712_logo-270x296.png', 'Reduced by 6.8% (640.0&nbsp;B)', 8807, 9447, 1, '2016-03-29 21:31:29', NULL),
(463, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/RTLCBS_Extreme_PRINT_darkBG_ALPHA_PNG_20130712_logo-270x296.png', 'Reduced by 5.4% (541.0&nbsp;B)', 9539, 10080, 1, '2016-03-29 21:31:31', NULL),
(464, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315839wpdm_RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-270x296.png', 'Reduced by 6.8% (640.0&nbsp;B)', 8807, 9447, 1, '2016-03-29 21:31:33', NULL),
(465, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315838wpdm_RTLCBS_Extreme_PRINT_darkBG_ALPHA_PNG_20130712-270x296.png', 'Reduced by 5.4% (541.0&nbsp;B)', 9539, 10080, 1, '2016-03-29 21:31:34', NULL),
(466, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315828wpdm_elements_xpress_us_white-270x296.png', 'Reduced by 18.1% (6.8&nbsp;kB)', 31304, 38223, 1, '2016-03-29 21:31:35', NULL),
(467, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315828wpdm_elements_xpress_us_black-270x296.png', 'Reduced by 6.0% (1.5&nbsp;kB)', 24814, 26388, 1, '2016-03-29 21:31:36', NULL),
(468, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315827wpdm_elements_xpress_uk_white-270x296.png', 'Reduced by 19.0% (6.5&nbsp;kB)', 28279, 34928, 1, '2016-03-29 21:31:38', NULL),
(469, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315826wpdm_elements_xpress_uk_black-270x296.png', 'Reduced by 6.8% (1.6&nbsp;kB)', 22838, 24499, 1, '2016-03-29 21:31:39', NULL),
(470, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315825wpdm_elements_horz_xpress_us_white_1-270x296.png', 'Reduced by 19.3% (3.2&nbsp;kB)', 13758, 17042, 1, '2016-03-29 21:31:40', NULL),
(471, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315824wpdm_elements_horz_xpress_us_black_1-270x296.png', 'Reduced by 34.7% (3.9&nbsp;kB)', 7436, 11394, 1, '2016-03-29 21:31:40', NULL),
(472, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315823wpdm_elements_horz_xpress_uk_white_1-270x296.png', 'Reduced by 18.9% (4.0&nbsp;kB)', 17724, 21845, 1, '2016-03-29 21:31:41', NULL),
(473, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315822wpdm_elements_horz_xpress_uk_black_1-270x296.png', 'Reduced by 35.3% (3.8&nbsp;kB)', 7127, 11018, 1, '2016-03-29 21:31:41', NULL),
(474, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315821wpdm_elements_FE_RedRibbon1-270x296.png', 'Reduced by 57.9% (697.0&nbsp;B)', 506, 1203, 1, '2016-03-29 21:31:42', NULL),
(475, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459315821wpdm_elements_FE_FBlueRibbon-270x296.png', 'Reduced by 63.8% (727.0&nbsp;B)', 412, 1139, 1, '2016-03-29 21:31:42', NULL),
(476, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317037wpdm_RTLCBS_LogoCorporate_PRINT_whiteBG_Alpha_20130724-270x296.png', 'Reduced by 12.9% (1.8&nbsp;kB)', 12405, 14246, 1, '2016-03-29 21:51:26', NULL),
(477, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317036wpdm_RTLCBS_LogoCorporate_PRINT_darkBG_Alpha_20130724-270x296.png', 'Reduced by 12.1% (1.8&nbsp;kB)', 13464, 15323, 1, '2016-03-29 21:51:28', NULL),
(478, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317035wpdm_RTLCBS_Entertainment_whiteBG_solid_logo-270x296.png', 'Reduced by 7.2% (1.5&nbsp;kB)', 20176, 21731, 1, '2016-03-29 21:51:29', NULL),
(479, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317034wpdm_RTLCBS_Entertainment_darkbg_solid_logo-270x296.png', 'Reduced by 11.0% (2.6&nbsp;kB)', 21418, 24073, 1, '2016-03-29 21:51:30', NULL),
(480, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317024wpdm_elements_xpress_us_white-270x296.png', 'Reduced by 18.1% (6.8&nbsp;kB)', 31304, 38223, 1, '2016-03-29 21:51:32', NULL),
(481, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317022wpdm_elements_xpress_us_black-270x296.png', 'Reduced by 6.0% (1.5&nbsp;kB)', 24814, 26388, 1, '2016-03-29 21:51:33', NULL),
(482, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317021wpdm_elements_xpress_uk_white-270x296.png', 'Reduced by 19.0% (6.5&nbsp;kB)', 28279, 34928, 1, '2016-03-29 21:51:34', NULL),
(483, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317020wpdm_elements_xpress_uk_black-270x296.png', 'Reduced by 6.8% (1.6&nbsp;kB)', 22838, 24499, 1, '2016-03-29 21:51:35', NULL),
(484, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317019wpdm_elements_horz_xpress_us_white_1-270x296.png', 'Reduced by 19.3% (3.2&nbsp;kB)', 13758, 17042, 1, '2016-03-29 21:51:36', NULL),
(485, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317018wpdm_elements_horz_xpress_us_black_1-270x296.png', 'Reduced by 34.7% (3.9&nbsp;kB)', 7436, 11394, 1, '2016-03-29 21:51:37', NULL),
(486, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317017wpdm_elements_horz_xpress_uk_white_1-270x296.png', 'Reduced by 18.9% (4.0&nbsp;kB)', 17724, 21845, 1, '2016-03-29 21:51:38', NULL),
(487, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317016wpdm_elements_horz_xpress_uk_black_1-270x296.png', 'Reduced by 35.3% (3.8&nbsp;kB)', 7127, 11018, 1, '2016-03-29 21:51:38', NULL),
(488, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317015wpdm_elements_FE_RedRibbon1-270x296.png', 'Reduced by 57.9% (697.0&nbsp;B)', 506, 1203, 1, '2016-03-29 21:51:38', NULL),
(489, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317014wpdm_elements_FE_FBlueRibbon-270x296.png', 'Reduced by 63.8% (727.0&nbsp;B)', 412, 1139, 1, '2016-03-29 21:51:39', NULL),
(490, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317563wpdm_LIM-S01-SocialMedia_sideeffectsi-270x296.jpg', 'Reduced by 8.2% (2.6&nbsp;kB)', 29989, 32669, 1, '2016-03-29 22:01:57', NULL),
(491, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317561wpdm_LIM-S01-SocialMedia_Morra-270x296.jpg', 'Reduced by 8.6% (3.7&nbsp;kB)', 39561, 43300, 1, '2016-03-29 22:01:57', NULL),
(492, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317557wpdm_LIM-QuoteMeme-001i-270x296.jpg', 'Reduced by 4.8% (699.0&nbsp;B)', 13783, 14482, 1, '2016-03-29 22:01:58', NULL),
(493, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317553wpdm_LIM-JenCarpenter-Meme-107i-270x296.jpg', 'Reduced by 6.1% (1.2&nbsp;kB)', 19229, 20478, 1, '2016-03-29 22:01:58', NULL),
(494, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317552wpdm_LIM-logo-white102i-270x296.png', 'Reduced by 55.9% (430.0&nbsp;B)', 339, 769, 1, '2016-03-29 22:01:58', NULL),
(495, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317550wpdm_LIM-logo-black101i-270x296.png', 'Reduced by 55.1% (416.0&nbsp;B)', 339, 755, 1, '2016-03-29 22:01:59', NULL),
(496, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317549wpdm_LIM-logo-black101i-270x296.jpg', 'Reduced by 37.1% (1.7&nbsp;kB)', 3019, 4796, 1, '2016-03-29 22:01:59', NULL),
(497, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317547wpdm_Limitless_logo-270x296.png', 'Reduced by 10.9% (1.1&nbsp;kB)', 9040, 10149, 1, '2016-03-29 22:02:00', NULL),
(498, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/LIM-backplate_C242_clean101i_logo-270x296.jpg', 'Reduced by 5.9% (719.0&nbsp;B)', 11494, 12213, 1, '2016-03-29 22:02:00', NULL),
(499, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317541wpdm_LIM-keyart-vert-TT105i-270x296.jpg', 'Reduced by 7.8% (1.7&nbsp;kB)', 20535, 22266, 1, '2016-03-29 22:02:03', NULL),
(500, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317538wpdm_LIM-keyart-vert104i-270x296.jpg', 'Reduced by 7.2% (1.4&nbsp;kB)', 18491, 19923, 1, '2016-03-29 22:02:05', NULL),
(501, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317529wpdm_LIM-keyart-horiz101i-270x296.jpg', 'Reduced by 4.1% (555.0&nbsp;B)', 12883, 13438, 1, '2016-03-29 22:02:05', NULL),
(502, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317496wpdm_LIM-epi0103-D_1498bi-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 18580, 19678, 1, '2016-03-29 22:02:42', NULL),
(503, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317494wpdm_LIM-epi0103-D_1495bi-270x296.jpg', 'Reduced by 6.6% (1.5&nbsp;kB)', 22308, 23895, 1, '2016-03-29 22:02:42', NULL),
(504, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317493wpdm_LIM-epi0103-D_1437bi-270x296.jpg', 'Reduced by 8.1% (2.4&nbsp;kB)', 28041, 30523, 1, '2016-03-29 22:02:43', NULL),
(505, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317490wpdm_LIM-epi0103-D_1416bi-270x296.jpg', 'Reduced by 8.6% (2.7&nbsp;kB)', 29662, 32461, 1, '2016-03-29 22:02:44', NULL),
(506, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317488wpdm_LIM-epi0103-D_1015bi-270x296.jpg', 'Reduced by 7.3% (2.4&nbsp;kB)', 31312, 33795, 1, '2016-03-29 22:02:44', NULL),
(507, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317486wpdm_LIM-epi0103-D_0983bi-270x296.jpg', 'Reduced by 4.5% (533.0&nbsp;B)', 11269, 11802, 1, '2016-03-29 22:02:45', NULL),
(508, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317484wpdm_LIM-epi0103-D_0952bi-270x296.jpg', 'Reduced by 6.3% (1.4&nbsp;kB)', 21025, 22434, 1, '2016-03-29 22:02:46', NULL),
(509, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317482wpdm_LIM-epi0103-D_0886bi-270x296.jpg', 'Reduced by 6.3% (1.7&nbsp;kB)', 25785, 27510, 1, '2016-03-29 22:02:46', NULL),
(510, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317480wpdm_LIM-epi0103-D_0861bi-270x296.jpg', 'Reduced by 6.5% (1.8&nbsp;kB)', 26109, 27927, 1, '2016-03-29 22:02:47', NULL),
(511, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317478wpdm_LIM-epi0103-D_0854bi-270x296.jpg', 'Reduced by 5.5% (1.4&nbsp;kB)', 24532, 25969, 1, '2016-03-29 22:02:48', NULL);
INSERT INTO `rtl21016_ewwwio_images` (`id`, `path`, `results`, `image_size`, `orig_size`, `updates`, `updated`, `trace`) VALUES
(512, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317476wpdm_LIM-epi0103-D_0848bi-270x296.jpg', 'Reduced by 6.1% (1.7&nbsp;kB)', 26825, 28557, 1, '2016-03-29 22:02:48', NULL),
(513, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317474wpdm_LIM-epi0103-D_0657bi-270x296.jpg', 'Reduced by 4.7% (786.0&nbsp;B)', 16000, 16786, 1, '2016-03-29 22:02:49', NULL),
(514, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317473wpdm_LIM-epi0103-D_0608bi-270x296.jpg', 'Reduced by 4.7% (798.0&nbsp;B)', 16280, 17078, 1, '2016-03-29 22:02:50', NULL),
(515, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317471wpdm_LIM-epi0103-D_0579bi-270x296.jpg', 'Reduced by 5.2% (1.1&nbsp;kB)', 19928, 21029, 1, '2016-03-29 22:02:50', NULL),
(516, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317469wpdm_LIM-epi0103-D_0551b2i-270x296.jpg', 'Reduced by 7.1% (2.1&nbsp;kB)', 28101, 30236, 1, '2016-03-29 22:02:51', NULL),
(517, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317468wpdm_LIM-epi0103-D_0545bi-270x296.jpg', 'Reduced by 6.9% (2.1&nbsp;kB)', 29746, 31945, 1, '2016-03-29 22:02:52', NULL),
(518, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317467wpdm_LIM-epi0103-D_0423bi-270x296.jpg', 'Reduced by 4.3% (909.0&nbsp;B)', 20197, 21106, 1, '2016-03-29 22:02:52', NULL),
(519, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317465wpdm_LIM-epi0103-D_0019bi-270x296.jpg', 'Reduced by 4.3% (708.0&nbsp;B)', 15879, 16587, 1, '2016-03-29 22:02:53', NULL),
(520, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317464wpdm_LIM-epi0103-D_0008bi-270x296.jpg', 'Reduced by 6.0% (1.6&nbsp;kB)', 25207, 26815, 1, '2016-03-29 22:02:54', NULL),
(521, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317463wpdm_LIM-epi0103-D_0004bi-270x296.jpg', 'Reduced by 6.1% (1.6&nbsp;kB)', 25766, 27449, 1, '2016-03-29 22:02:54', NULL),
(522, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317462wpdm_LIM-epi0103-D_0003bi-270x296.jpg', 'Reduced by 6.8% (1.9&nbsp;kB)', 26878, 28834, 1, '2016-03-29 22:02:55', NULL),
(523, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317461wpdm_LIM-epi0102-NAZ6bi-270x296.jpg', 'Reduced by 4.6% (909.0&nbsp;B)', 18905, 19814, 1, '2016-03-29 22:02:56', NULL),
(524, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317460wpdm_LIM-epi0102-Image24i-270x296.jpg', 'Reduced by 6.0% (1.3&nbsp;kB)', 21351, 22724, 1, '2016-03-29 22:02:56', NULL),
(525, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317459wpdm_LIM-epi0102-Image19i-270x296.jpg', 'Reduced by 5.7% (1.2&nbsp;kB)', 19728, 20926, 1, '2016-03-29 22:02:57', NULL),
(526, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317458wpdm_LIM-epi0102-Image18i-270x296.jpg', 'Reduced by 3.3% (563.0&nbsp;B)', 16484, 17047, 1, '2016-03-29 22:02:57', NULL),
(527, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317457wpdm_LIM-epi0102-Image17i-270x296.jpg', 'Reduced by 6.4% (1.3&nbsp;kB)', 19261, 20575, 1, '2016-03-29 22:02:58', NULL),
(528, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317456wpdm_LIM-epi0102-Image16i-270x296.jpg', 'Reduced by 6.1% (1.2&nbsp;kB)', 18436, 19625, 1, '2016-03-29 22:02:58', NULL),
(529, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317455wpdm_LIM-epi0102-Image15i-270x296.jpg', 'Reduced by 5.3% (1.1&nbsp;kB)', 19650, 20758, 1, '2016-03-29 22:02:59', NULL),
(530, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317454wpdm_LIM-epi0102-Image14i-270x296.jpg', 'Reduced by 5.5% (1.1&nbsp;kB)', 19383, 20517, 1, '2016-03-29 22:02:59', NULL),
(531, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317453wpdm_LIM-epi0102-Image12i-270x296.jpg', 'Reduced by 5.1% (819.0&nbsp;B)', 15307, 16126, 1, '2016-03-29 22:03:00', NULL),
(532, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317452wpdm_LIM-epi0102-Image8i-270x296.jpg', 'Reduced by 4.8% (910.0&nbsp;B)', 18147, 19057, 1, '2016-03-29 22:03:00', NULL),
(533, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317452wpdm_LIM-epi0102-Image6i-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 19300, 20449, 1, '2016-03-29 22:03:01', NULL),
(534, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317450wpdm_LIM-epi0102-Image2i-270x296.jpg', 'Reduced by 6.1% (1.2&nbsp;kB)', 19372, 20620, 1, '2016-03-29 22:03:01', NULL),
(535, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317449wpdm_LIM-epi0102-Image1i-270x296.jpg', 'Reduced by 6.4% (1.5&nbsp;kB)', 23070, 24644, 1, '2016-03-29 22:03:02', NULL),
(536, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317448wpdm_LIM-epi0102-D_0357bi-270x296.jpg', 'Reduced by 6.8% (2.0&nbsp;kB)', 27951, 30001, 1, '2016-03-29 22:03:03', NULL),
(537, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317447wpdm_LIM-epi0102-D_0333bi-270x296.jpg', 'Reduced by 6.9% (1.9&nbsp;kB)', 26556, 28529, 1, '2016-03-29 22:03:03', NULL),
(538, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317445wpdm_LIM-epi0102-D_0305bi-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 19781, 20947, 1, '2016-03-29 22:03:04', NULL),
(539, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317444wpdm_LIM-epi0102-D_0262bi-270x296.jpg', 'Reduced by 6.0% (1.4&nbsp;kB)', 21893, 23286, 1, '2016-03-29 22:03:04', NULL),
(540, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317443wpdm_LIM-epi0102-D_0251bi-270x296.jpg', 'Reduced by 6.2% (1.5&nbsp;kB)', 23095, 24617, 1, '2016-03-29 22:03:05', NULL),
(541, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317442wpdm_LIM-epi0102-D_0234bi-270x296.jpg', 'Reduced by 6.1% (1.4&nbsp;kB)', 22486, 23941, 1, '2016-03-29 22:03:06', NULL),
(542, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317441wpdm_LIM-epi0102-D_0230bi-270x296.jpg', 'Reduced by 5.3% (1.3&nbsp;kB)', 23119, 24407, 1, '2016-03-29 22:03:06', NULL),
(543, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317440wpdm_LIM-epi0102-D_0193bi-270x296.jpg', 'Reduced by 5.2% (886.0&nbsp;B)', 15995, 16881, 1, '2016-03-29 22:03:07', NULL),
(544, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317438wpdm_LIM-epi0102-D_0149bi-270x296.jpg', 'Reduced by 5.3% (850.0&nbsp;B)', 15226, 16076, 1, '2016-03-29 22:03:08', NULL),
(545, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317437wpdm_LIM-epi0102-D_0097bi-270x296.jpg', 'Reduced by 5.1% (944.0&nbsp;B)', 17718, 18662, 1, '2016-03-29 22:03:08', NULL),
(546, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317435wpdm_LIM-epi0102-D_0092bi-270x296.jpg', 'Reduced by 5.7% (1.1&nbsp;kB)', 18141, 19237, 1, '2016-03-29 22:03:09', NULL),
(547, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317434wpdm_LIM-epi0102-D_0059bi-270x296.jpg', 'Reduced by 4.3% (618.0&nbsp;B)', 13866, 14484, 1, '2016-03-29 22:03:10', NULL),
(548, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317432wpdm_LIM-epi0102-D_0040bi-270x296.jpg', 'Reduced by 5.9% (1.1&nbsp;kB)', 18408, 19571, 1, '2016-03-29 22:03:10', NULL),
(549, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317431wpdm_LIM-epi0102-D_0027bi-270x296.jpg', 'Reduced by 6.4% (1.4&nbsp;kB)', 20606, 22014, 1, '2016-03-29 22:03:11', NULL),
(550, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317430wpdm_LIM-epi0102-D_0020bi-270x296.jpg', 'Reduced by 7.0% (1.3&nbsp;kB)', 17889, 19237, 1, '2016-03-29 22:03:11', NULL),
(551, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317429wpdm_LIM-epi0102-0758bi-270x296.jpg', 'Reduced by 8.2% (2.3&nbsp;kB)', 26403, 28750, 1, '2016-03-29 22:03:12', NULL),
(552, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317427wpdm_LIM-epi0102-0670bi-270x296.jpg', 'Reduced by 6.5% (1.6&nbsp;kB)', 22916, 24522, 1, '2016-03-29 22:03:13', NULL),
(553, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317426wpdm_LIM-epi0102-0662bi-270x296.jpg', 'Reduced by 6.9% (1.6&nbsp;kB)', 21777, 23397, 1, '2016-03-29 22:03:13', NULL),
(554, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317425wpdm_LIM-epi0102-0634bi-270x296.jpg', 'Reduced by 8.3% (2.3&nbsp;kB)', 26154, 28529, 1, '2016-03-29 22:03:14', NULL),
(555, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317424wpdm_LIM-epi0102-0517bi-270x296.jpg', 'Reduced by 6.1% (1.5&nbsp;kB)', 23218, 24739, 1, '2016-03-29 22:03:15', NULL),
(556, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317423wpdm_LIM-epi0102-0511bi-270x296.jpg', 'Reduced by 5.9% (1.4&nbsp;kB)', 23047, 24501, 1, '2016-03-29 22:03:15', NULL),
(557, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317422wpdm_LIM-epi0102-0458bi-270x296.jpg', 'Reduced by 5.1% (1.1&nbsp;kB)', 21154, 22286, 1, '2016-03-29 22:03:16', NULL),
(558, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317421wpdm_LIM-epi0102-0429bi-270x296.jpg', 'Reduced by 5.3% (1.2&nbsp;kB)', 22435, 23697, 1, '2016-03-29 22:03:17', NULL),
(559, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317419wpdm_LIM-epi0102-0290bi-270x296.jpg', 'Reduced by 6.1% (1.4&nbsp;kB)', 22324, 23764, 1, '2016-03-29 22:03:17', NULL),
(560, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317418wpdm_LIM-epi0102-0266bi-270x296.jpg', 'Reduced by 5.4% (1.2&nbsp;kB)', 21036, 22242, 1, '2016-03-29 22:03:18', NULL),
(561, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317417wpdm_LIM-epi0102-0253bi-270x296.jpg', 'Reduced by 7.5% (2.2&nbsp;kB)', 27563, 29789, 1, '2016-03-29 22:03:19', NULL),
(562, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317416wpdm_LIM-epi0102-0243bi-270x296.jpg', 'Reduced by 6.8% (1.7&nbsp;kB)', 24168, 25922, 1, '2016-03-29 22:03:19', NULL),
(563, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317415wpdm_LIM-epi0102-0213bi-270x296.jpg', 'Reduced by 7.4% (2.0&nbsp;kB)', 25716, 27759, 1, '2016-03-29 22:03:20', NULL),
(564, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317413wpdm_LIM-epi0102-0159bi-270x296.jpg', 'Reduced by 6.2% (1.2&nbsp;kB)', 19452, 20727, 1, '2016-03-29 22:03:21', NULL),
(565, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317411wpdm_LIM-epi0102-0051bi-270x296.jpg', 'Reduced by 5.4% (1.0&nbsp;kB)', 18054, 19091, 1, '2016-03-29 22:03:21', NULL),
(566, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317410wpdm_LIM-epi0102-0044bi-270x296.jpg', 'Reduced by 7.7% (2.0&nbsp;kB)', 24603, 26658, 1, '2016-03-29 22:03:22', NULL),
(567, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317409wpdm_LIM-epi0101-Image14i-270x296.jpg', 'Reduced by 4.4% (780.0&nbsp;B)', 16958, 17738, 1, '2016-03-29 22:03:22', NULL),
(568, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317408wpdm_LIM-epi0101-Image12i-270x296.jpg', 'Reduced by 7.2% (1.6&nbsp;kB)', 21457, 23118, 1, '2016-03-29 22:03:23', NULL),
(569, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317407wpdm_LIM-epi0101-Image11i-270x296.jpg', 'Reduced by 4.9% (954.0&nbsp;B)', 18481, 19435, 1, '2016-03-29 22:03:23', NULL),
(570, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317406wpdm_LIM-epi0101-Image4i-270x296.jpg', 'Reduced by 3.6% (602.0&nbsp;B)', 16175, 16777, 1, '2016-03-29 22:03:24', NULL),
(571, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317405wpdm_LIM-epi0101-Image2i-270x296.jpg', 'Reduced by 5.0% (782.0&nbsp;B)', 14759, 15541, 1, '2016-03-29 22:03:24', NULL),
(572, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317404wpdm_LIM-epi0101-D1319bi-270x296.jpg', 'Reduced by 7.5% (2.1&nbsp;kB)', 26513, 28678, 1, '2016-03-29 22:03:25', NULL),
(573, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317403wpdm_LIM-epi0101-D1233bi-270x296.jpg', 'Reduced by 7.5% (2.1&nbsp;kB)', 26224, 28364, 1, '2016-03-29 22:03:26', NULL),
(574, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317402wpdm_LIM-epi0101-D1064bi-270x296.jpg', 'Reduced by 4.7% (904.0&nbsp;B)', 18204, 19108, 1, '2016-03-29 22:03:26', NULL),
(575, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317400wpdm_LIM-epi0101-D0912bi-270x296.jpg', 'Reduced by 7.0% (1.6&nbsp;kB)', 21283, 22887, 1, '2016-03-29 22:03:27', NULL),
(576, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317399wpdm_LIM-epi0101-D0868bi-270x296.jpg', 'Reduced by 7.7% (1.9&nbsp;kB)', 23023, 24953, 1, '2016-03-29 22:03:28', NULL),
(577, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317397wpdm_LIM-epi0101-D0848bi-270x296.jpg', 'Reduced by 6.3% (1.4&nbsp;kB)', 21169, 22599, 1, '2016-03-29 22:03:28', NULL),
(578, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317396wpdm_LIM-epi0101-D0714bi-270x296.jpg', 'Reduced by 6.0% (1.3&nbsp;kB)', 21175, 22524, 1, '2016-03-29 22:03:29', NULL),
(579, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317394wpdm_LIM-epi0101-D0707bi-270x296.jpg', 'Reduced by 5.6% (1.2&nbsp;kB)', 20445, 21664, 1, '2016-03-29 22:03:30', NULL),
(580, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317392wpdm_LIM-epi0101-D0659bi-270x296.jpg', 'Reduced by 3.9% (629.0&nbsp;B)', 15544, 16173, 1, '2016-03-29 22:03:30', NULL),
(581, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317391wpdm_LIM-epi0101-D0581bi-270x296.jpg', 'Reduced by 6.6% (1.8&nbsp;kB)', 25601, 27409, 1, '2016-03-29 22:03:31', NULL),
(582, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317389wpdm_LIM-epi0101-D0329bi-270x296.jpg', 'Reduced by 5.7% (1,019.0&nbsp;B)', 17005, 18024, 1, '2016-03-29 22:03:32', NULL),
(583, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317388wpdm_LIM-epi0101-D0243bi-270x296.jpg', 'Reduced by 6.2% (1.5&nbsp;kB)', 23300, 24834, 1, '2016-03-29 22:03:32', NULL),
(584, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317387wpdm_LIM-epi0101-D0110bi-270x296.jpg', 'Reduced by 6.5% (1.5&nbsp;kB)', 22549, 24119, 1, '2016-03-29 22:03:33', NULL),
(585, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317386wpdm_LIM-epi0101-3518bi-270x296.jpg', 'Reduced by 6.3% (1.6&nbsp;kB)', 24849, 26526, 1, '2016-03-29 22:03:34', NULL),
(586, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317384wpdm_LIM-epi0101-3015bi-270x296.jpg', 'Reduced by 5.6% (1.0&nbsp;kB)', 17716, 18765, 1, '2016-03-29 22:03:34', NULL),
(587, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317383wpdm_LIM-epi0101-3007bi-270x296.jpg', 'Reduced by 5.0% (898.0&nbsp;B)', 16923, 17821, 1, '2016-03-29 22:03:35', NULL),
(588, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317381wpdm_LIM-epi0101-2236bi-270x296.jpg', 'Reduced by 5.6% (1.1&nbsp;kB)', 19411, 20572, 1, '2016-03-29 22:03:36', NULL),
(589, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317380wpdm_LIM-epi0101-1358bi-270x296.jpg', 'Reduced by 5.3% (1.0&nbsp;kB)', 19378, 20452, 1, '2016-03-29 22:03:36', NULL),
(590, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317378wpdm_LIM-epi0101-1267Bi-270x296.jpg', 'Reduced by 9.9% (3.6&nbsp;kB)', 33235, 36880, 1, '2016-03-29 22:03:37', NULL),
(591, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317377wpdm_LIM-epi0101-472bi-270x296.jpg', 'Reduced by 7.7% (2.4&nbsp;kB)', 29427, 31892, 1, '2016-03-29 22:03:38', NULL),
(592, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317376wpdm_LIM-epi0101-338bi-270x296.jpg', 'Reduced by 4.0% (663.0&nbsp;B)', 16068, 16731, 1, '2016-03-29 22:03:38', NULL),
(593, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317374wpdm_LIM-epi0101-141bi-270x296.jpg', 'Reduced by 6.6% (1.5&nbsp;kB)', 21695, 23228, 1, '2016-03-29 22:03:39', NULL),
(594, 'C:/xampp/htdocs/rtlcbsasia/wp-content/plugins/download-manager/cache/1459317373wpdm_LIM-epi0101-38BWSi-270x296.jpg', 'Reduced by 6.2% (1.6&nbsp;kB)', 24972, 26629, 1, '2016-03-29 22:03:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_exportsreports_groups`
--

CREATE TABLE IF NOT EXISTS `rtl21016_exportsreports_groups` (
`id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `disabled` int(1) NOT NULL,
  `role_access` mediumtext NOT NULL,
  `weight` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rtl21016_exportsreports_groups`
--

INSERT INTO `rtl21016_exportsreports_groups` (`id`, `name`, `disabled`, `role_access`, `weight`, `created`, `updated`) VALUES
(1, 'WordPress', 0, '', 0, '2016-04-01 10:44:43', '2016-04-01 10:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_exportsreports_log`
--

CREATE TABLE IF NOT EXISTS `rtl21016_exportsreports_log` (
`id` int(10) NOT NULL,
  `report_id` int(10) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `rtl21016_exportsreports_log`
--

INSERT INTO `rtl21016_exportsreports_log` (`id`, `report_id`, `filename`, `created`, `updated`) VALUES
(1, 3, 'rtl_04-01-2016_09-01-35_A5twI.csv', '2016-04-01 09:01:35', '0000-00-00 00:00:00'),
(2, 3, 'rtl_04-01-2016_09-18-47_S6Onq.csv', '2016-04-01 09:18:47', '0000-00-00 00:00:00'),
(3, 3, 'rtl_04-01-2016_09-18-56_aJyFz.csv', '2016-04-01 09:18:56', '0000-00-00 00:00:00'),
(4, 3, 'rtl_04-01-2016_09-22-02_2XJiQ.csv', '2016-04-01 09:22:02', '0000-00-00 00:00:00'),
(5, 1, '_04-01-2016_09-24-29_rEkG3.csv', '2016-04-01 09:24:29', '0000-00-00 00:00:00'),
(6, 3, 'rtl_04-01-2016_09-38-39_aPk2Q.csv', '2016-04-01 09:38:39', '0000-00-00 00:00:00'),
(7, 3, 'rtl_04-01-2016_09-44-07_flaBg.csv', '2016-04-01 09:44:07', '0000-00-00 00:00:00'),
(8, 3, 'rtl_04-01-2016_09-47-00_q0g2B.csv', '2016-04-01 09:47:00', '0000-00-00 00:00:00'),
(9, 3, 'rtl_04-01-2016_09-47-40_q9qPt.csv', '2016-04-01 09:47:40', '0000-00-00 00:00:00'),
(10, 3, 'rtl_04-01-2016_09-47-58_ckUTX.csv', '2016-04-01 09:47:58', '0000-00-00 00:00:00'),
(11, 3, 'rtl_04-01-2016_09-49-33_SpkzA.csv', '2016-04-01 09:49:33', '0000-00-00 00:00:00'),
(12, 3, 'rtl_04-01-2016_09-51-10_TkY0F.csv', '2016-04-01 09:51:10', '0000-00-00 00:00:00'),
(13, 3, 'rtl_04-01-2016_09-53-47_4YMZj.csv', '2016-04-01 09:53:47', '0000-00-00 00:00:00'),
(14, 3, 'rtl_04-01-2016_10-00-10_mPH2w.csv', '2016-04-01 10:00:10', '0000-00-00 00:00:00'),
(15, 3, 'rtl_04-01-2016_10-01-54_2cDx8.csv', '2016-04-01 10:01:54', '0000-00-00 00:00:00'),
(16, 3, 'rtl_04-01-2016_10-03-42_qakQh.csv', '2016-04-01 10:03:42', '0000-00-00 00:00:00'),
(17, 3, 'rtl_04-01-2016_10-03-57_QTQrx.csv', '2016-04-01 10:03:57', '0000-00-00 00:00:00'),
(18, 3, 'rtl_04-01-2016_10-04-31_MxjDY.csv', '2016-04-01 10:04:31', '0000-00-00 00:00:00'),
(19, 3, 'rtl_04-01-2016_10-04-39_qPYpR.csv', '2016-04-01 10:04:39', '0000-00-00 00:00:00'),
(20, 3, 'rtl_04-01-2016_10-04-58_MqLnh.csv', '2016-04-01 10:04:58', '0000-00-00 00:00:00'),
(21, 3, 'rtl_04-01-2016_10-05-56_YP6UV.csv', '2016-04-01 10:05:56', '0000-00-00 00:00:00'),
(22, 3, 'rtl_04-01-2016_10-07-41_YQtmv.csv', '2016-04-01 10:07:41', '0000-00-00 00:00:00'),
(23, 3, 'rtl_04-01-2016_10-08-08_pQuwk.csv', '2016-04-01 10:08:08', '0000-00-00 00:00:00'),
(24, 3, 'rtl_04-01-2016_10-12-17_b9CAQ.csv', '2016-04-01 10:12:17', '0000-00-00 00:00:00'),
(25, 3, 'rtl_04-01-2016_10-16-02_nTYl7.csv', '2016-04-01 10:16:02', '0000-00-00 00:00:00'),
(26, 3, 'rtl_04-01-2016_10-16-21_jIaOo.csv', '2016-04-01 10:16:21', '0000-00-00 00:00:00'),
(27, 3, 'rtl_04-01-2016_10-16-56_hMwWt.csv', '2016-04-01 10:16:56', '0000-00-00 00:00:00'),
(28, 3, 'rtl_04-01-2016_10-17-13_bCm0L.csv', '2016-04-01 10:17:13', '0000-00-00 00:00:00'),
(29, 3, 'rtl_04-01-2016_10-18-05_1tFzQ.csv', '2016-04-01 10:18:05', '0000-00-00 00:00:00'),
(30, 3, 'rtl_04-01-2016_10-18-27_3AI2l.csv', '2016-04-01 10:18:27', '0000-00-00 00:00:00'),
(31, 3, 'rtl_04-01-2016_10-18-48_WIFft.csv', '2016-04-01 10:18:48', '0000-00-00 00:00:00'),
(32, 3, 'rtl_04-01-2016_10-19-18_hXYhM.csv', '2016-04-01 10:19:18', '0000-00-00 00:00:00'),
(33, 3, 'rtl_04-01-2016_10-22-27_0C91I.csv', '2016-04-01 10:22:27', '0000-00-00 00:00:00'),
(34, 3, 'rtl_04-01-2016_10-22-54_Dw5vB.csv', '2016-04-01 10:22:54', '0000-00-00 00:00:00'),
(35, 3, 'rtl_04-01-2016_10-32-04_xREgF.csv', '2016-04-01 10:32:04', '0000-00-00 00:00:00'),
(36, 3, 'rtl_04-01-2016_10-33-56_c6y0L.csv', '2016-04-01 10:33:56', '0000-00-00 00:00:00'),
(37, 3, 'rtl_04-01-2016_10-34-21_gGULW.csv', '2016-04-01 10:34:21', '0000-00-00 00:00:00'),
(38, 3, 'rtl_04-01-2016_10-34-39_Rf968.csv', '2016-04-01 10:34:39', '0000-00-00 00:00:00'),
(39, 3, 'rtl_04-01-2016_10-34-54_1wB0X.csv', '2016-04-01 10:34:54', '0000-00-00 00:00:00'),
(40, 3, 'rtl_04-04-2016_01-14-11_vqSZN.csv', '2016-04-04 01:14:11', '0000-00-00 00:00:00'),
(41, 3, 'rtl_04-04-2016_01-36-26_4Pjui.csv', '2016-04-04 01:36:26', '0000-00-00 00:00:00'),
(42, 3, 'rtl_04-04-2016_01-41-37_AW5Vu.csv', '2016-04-04 01:41:37', '0000-00-00 00:00:00'),
(43, 3, 'rtl_04-04-2016_01-42-17_5FEi5.csv', '2016-04-04 01:42:17', '0000-00-00 00:00:00'),
(44, 3, 'rtl_04-04-2016_01-45-33_AgiqK.csv', '2016-04-04 01:45:33', '0000-00-00 00:00:00'),
(45, 3, 'rtl_04-04-2016_01-45-47_zroUw.csv', '2016-04-04 01:45:47', '0000-00-00 00:00:00'),
(46, 3, 'rtl_04-04-2016_01-45-58_kVAjX.csv', '2016-04-04 01:45:58', '0000-00-00 00:00:00'),
(47, 3, 'rtl_04-04-2016_01-47-17_lWs7j.csv', '2016-04-04 01:47:17', '0000-00-00 00:00:00'),
(48, 3, 'rtl_04-04-2016_02-01-45_L1YoL.csv', '2016-04-04 02:01:45', '0000-00-00 00:00:00'),
(49, 3, 'rtl_04-04-2016_02-04-39_bGk1T.csv', '2016-04-04 02:04:39', '0000-00-00 00:00:00'),
(50, 3, 'rtl_04-04-2016_02-06-50_1cJka.csv', '2016-04-04 02:06:50', '0000-00-00 00:00:00'),
(51, 3, 'rtl_04-04-2016_02-07-49_mryt5.csv', '2016-04-04 02:07:49', '0000-00-00 00:00:00'),
(52, 3, 'rtl_04-04-2016_02-08-38_2VTuB.csv', '2016-04-04 02:08:38', '0000-00-00 00:00:00'),
(53, 3, 'rtl_04-04-2016_02-14-45_9K6v4.csv', '2016-04-04 02:14:45', '0000-00-00 00:00:00'),
(54, 3, 'rtl_04-04-2016_02-22-32_jPlDU.csv', '2016-04-04 02:22:32', '0000-00-00 00:00:00'),
(55, 3, 'rtl_04-04-2016_02-22-58_BSMPQ.csv', '2016-04-04 02:22:58', '0000-00-00 00:00:00'),
(56, 3, 'rtl_04-04-2016_02-23-59_AfI9r.csv', '2016-04-04 02:23:59', '0000-00-00 00:00:00'),
(57, 3, 'rtl_04-04-2016_02-25-08_DwmYY.csv', '2016-04-04 02:25:08', '0000-00-00 00:00:00'),
(58, 3, 'rtl_04-04-2016_02-31-05_49AxK.csv', '2016-04-04 02:31:05', '0000-00-00 00:00:00'),
(59, 3, 'rtl_04-04-2016_02-35-30_9Rw29.csv', '2016-04-04 02:35:30', '0000-00-00 00:00:00'),
(60, 3, 'rtl_04-04-2016_02-35-53_v4hOJ.csv', '2016-04-04 02:35:53', '0000-00-00 00:00:00'),
(61, 3, 'rtl_04-04-2016_02-36-05_47nod.csv', '2016-04-04 02:36:05', '0000-00-00 00:00:00'),
(62, 3, 'rtl_04-04-2016_02-36-12_gNPzk.csv', '2016-04-04 02:36:12', '0000-00-00 00:00:00'),
(63, 3, 'rtl_04-04-2016_02-39-16_HjyQD.csv', '2016-04-04 02:39:16', '0000-00-00 00:00:00'),
(64, 3, 'rtl_04-04-2016_02-39-50_FReNw.csv', '2016-04-04 02:39:50', '0000-00-00 00:00:00'),
(65, 3, 'rtl_04-04-2016_03-42-35_Bz3Cw.csv', '2016-04-04 03:42:35', '0000-00-00 00:00:00'),
(66, 3, 'rtl_04-04-2016_03-55-41_Ieu3h.csv', '2016-04-04 03:55:41', '0000-00-00 00:00:00'),
(67, 3, 'rtl_04-04-2016_03-57-55_QbQYV.csv', '2016-04-04 03:57:55', '0000-00-00 00:00:00'),
(68, 3, 'rtl_04-04-2016_04-59-35_0Ty0G.csv', '2016-04-04 04:59:35', '0000-00-00 00:00:00'),
(69, 3, 'rtl_04-04-2016_05-00-40_742GW.csv', '2016-04-04 05:00:40', '0000-00-00 00:00:00'),
(70, 3, 'rtl_04-04-2016_05-01-43_eSKTf.csv', '2016-04-04 05:01:43', '0000-00-00 00:00:00'),
(71, 3, 'rtl_04-04-2016_06-22-04_WYlq2.csv', '2016-04-04 06:22:04', '0000-00-00 00:00:00'),
(72, 3, 'rtl_04-04-2016_06-23-12_X93LC.csv', '2016-04-04 06:23:12', '0000-00-00 00:00:00'),
(73, 3, 'rtl_04-04-2016_06-27-02_c7M0u.csv', '2016-04-04 06:27:02', '0000-00-00 00:00:00'),
(74, 3, 'rtl_04-04-2016_06-42-27_atzZU.csv', '2016-04-04 06:42:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_exportsreports_reports`
--

CREATE TABLE IF NOT EXISTS `rtl21016_exportsreports_reports` (
`id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group` int(10) NOT NULL,
  `disabled` int(1) NOT NULL,
  `disable_export` int(1) NOT NULL,
  `default_none` int(1) NOT NULL,
  `role_access` mediumtext NOT NULL,
  `sql_query` longtext NOT NULL,
  `sql_query_count` longtext NOT NULL,
  `field_data` longtext NOT NULL,
  `weight` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rtl21016_exportsreports_reports`
--

INSERT INTO `rtl21016_exportsreports_reports` (`id`, `name`, `group`, `disabled`, `disable_export`, `default_none`, `role_access`, `sql_query`, `sql_query_count`, `field_data`, `weight`, `created`, `updated`) VALUES
(1, 'Example Posts Report', 1, 0, 0, 0, '', 'SELECT ID,post_title,post_name,post_date,post_content FROM rtl21016_posts WHERE post_type=''post''', '', '[{"name":"ID","label":"Post ID","hide_report":"0","hide_export":"0","custom_display":"","type":"text"},{"name":"post_title","label":"Post Title","hide_report":"0","hide_export":"0","custom_display":"","type":"text"},{"name":"post_name","label":"Post''s Slug","hide_report":"0","hide_export":"0","custom_display":"","type":"text"},{"name":"post_date","label":"Post Date","hide_report":"0","hide_export":"0","custom_display":"","type":"date"},{"name":"post_content","label":"Post Content","hide_report":"1","hide_export":"0","custom_display":"","type":"text"}]', 0, '2016-04-01 10:44:44', '2016-04-01 10:44:44'),
(2, 'Example Pages Report', 1, 0, 0, 1, '', 'SELECT ID,post_title,post_name,post_date,post_content FROM rtl21016_posts WHERE post_type=''page''', '', '[{"name":"ID","label":"Page ID","hide_report":"0","hide_export":"0","custom_display":"","type":"text"},{"name":"post_title","label":"Page Title","hide_report":"0","hide_export":"0","custom_display":"","type":"text"},{"name":"post_name","label":"Post''s Slug","hide_report":"0","hide_export":"0","custom_display":"","type":"text"},{"name":"post_date","label":"Page Date","hide_report":"0","hide_export":"0","custom_display":"","type":"date"},{"name":"post_content","label":"Page Content","hide_report":"1","hide_export":"0","custom_display":"","type":"text"}]', 1, '2016-04-01 10:44:44', '2016-04-01 10:44:44'),
(3, 'RTL', 1, 0, 0, 0, '', '\r\n        SELECT ''2016'' as Period,\r\n            case r.country_group when ''SG'' then ''Singapore'' when ''HK'' then ''Hong Kong'' when ''TH'' then ''Thailand'' when ''MY'' then ''Malaysia'' when ''ID'' then ''Indonesia'' when ''PH'' then ''Philippines'' end as country_group, \r\n            r.operator_group, u.user_email, p.post_title, count(*) as downloaded_files\r\n        FROM rtl21016_custom_reports r \r\n        INNER JOIN rtl21016_users u ON r.user_id = u.id\r\n        INNER JOIN rtl21016_posts p ON r.post_id = p.id\r\n        WHERE r.created_at BETWEEN ''2016-01-01 00:00:00'' AND ''2016-12-31 23:59:59'' AND 1 AND 1 AND 1 AND 1 GROUP BY r.user_id, r.post_id\r\n          ORDER BY u.user_email,p.post_title\r\n    ', '', '[]', 0, '2016-04-01 06:55:46', '2016-04-01 09:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_links`
--

CREATE TABLE IF NOT EXISTS `rtl21016_links` (
`link_id` bigint(20) unsigned NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_operator_access`
--

CREATE TABLE IF NOT EXISTS `rtl21016_operator_access` (
`id` int(11) NOT NULL,
  `operator_group` varchar(200) NOT NULL,
  `country_group` varchar(200) NOT NULL,
  `meta_access` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `rtl21016_operator_access`
--

INSERT INTO `rtl21016_operator_access` (`id`, `operator_group`, `country_group`, `meta_access`, `created_at`, `updated_at`) VALUES
(21, 'Singtel', 'AF', 'a:1:{s:17:"channel-access[0]";s:13:"entertainment";}', '2016-03-07 10:09:58', '2016-03-08 01:44:59'),
(22, 'Skycable', 'AF', 'a:1:{s:17:"channel-access[1]";s:7:"extreme";}', '2016-03-07 10:10:15', '2016-03-07 10:43:40'),
(23, 'Singtel', 'AL', 'a:1:{s:17:"channel-access[0]";s:13:"entertainment";}', '2016-03-07 10:24:04', '2016-03-07 10:24:04'),
(25, 'Skycable', 'AL', 'a:2:{s:17:"channel-access[0]";s:13:"entertainment";s:17:"channel-access[1]";s:7:"extreme";}', '2016-03-08 01:40:21', '2016-03-08 01:40:21'),
(26, 'Singtel', 'SG', 'a:1:{s:17:"channel-access[0]";s:13:"entertainment";}', '2016-03-11 03:21:18', '2016-03-31 02:30:54'),
(27, 'StarHub', 'SG', 'a:1:{s:17:"channel-access[1]";s:7:"extreme";}', '2016-03-11 03:21:26', '2016-03-11 03:21:26'),
(28, 'nowTV', 'HK', 'a:1:{s:17:"channel-access[0]";s:13:"entertainment";}', '2016-03-15 07:11:20', '2016-03-15 07:11:20'),
(29, 'Singtel', 'PH', 'a:2:{s:17:"channel-access[0]";s:13:"entertainment";s:17:"channel-access[1]";s:7:"extreme";}', '2016-03-21 06:36:21', '2016-03-22 05:36:46'),
(31, '', '', 'N;', '2016-03-22 04:03:10', '2016-03-22 04:03:10'),
(32, 'K-Visions', 'PH', 'a:2:{s:17:"channel-access[0]";s:13:"entertainment";s:17:"channel-access[1]";s:7:"extreme";}', '2016-03-23 02:13:17', '2016-03-23 02:13:37'),
(33, 'SKYCable', 'PH', 'a:2:{s:17:"channel-access[0]";s:13:"entertainment";s:17:"channel-access[1]";s:7:"extreme";}', '2016-03-31 02:27:50', '2016-03-31 02:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_options`
--

CREATE TABLE IF NOT EXISTS `rtl21016_options` (
`option_id` bigint(20) unsigned NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1866 ;

--
-- Dumping data for table `rtl21016_options`
--

INSERT INTO `rtl21016_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://192.168.1.167/rtlcbsasia', 'yes'),
(2, 'home', 'http://192.168.1.167/rtlcbsasia', 'yes'),
(3, 'blogname', 'RTL CBS Asia', 'yes'),
(4, 'blogdescription', 'Just another WordPress site', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'diannekatherinedelosreyes@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '0', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:13:{i:0;s:55:"global-admin-bar-hide-or-remove/hide-admin-tool-bar.php";i:1;s:29:"acf-repeater/acf-repeater.php";i:2;s:33:"admin-menu-editor/menu-editor.php";i:3;s:30:"advanced-custom-fields/acf.php";i:4;s:37:"download-manager/download-manager.php";i:5;s:45:"ewww-image-optimizer/ewww-image-optimizer.php";i:6;s:43:"exports-and-reports/exports-and-reports.php";i:7;s:43:"lh-password-changer/lh-password-changer.php";i:8;s:29:"pc-robotstxt/pc-robotstxt.php";i:9;s:34:"profile-builder-hobbyist/index.php";i:10;s:29:"wpdm-reports/wpdm-reports.php";i:11;s:31:"wpdmpp-sales-report/reports.php";i:12;s:53:"wpfront-user-role-editor/wpfront-user-role-editor.php";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(37, 'comment_max_links', '2', 'yes'),
(38, 'gmt_offset', '0', 'yes'),
(39, 'default_email_category', '1', 'yes'),
(40, 'recently_edited', 'a:3:{i:0;s:69:"C:\\xampp\\htdocs\\rtlcbsasia/wp-content/themes/twentythirteen/style.css";i:1;s:83:"C:\\xampp\\htdocs\\rtlcbsasia/wp-content/plugins/acf-unique-id-field/acf-unique_id.php";i:2;s:0:"";}', 'no'),
(41, 'template', 'rtlcbsasia-theme', 'yes'),
(42, 'stylesheet', 'rtlcbsasia-theme', 'yes'),
(43, 'comment_whitelist', '1', 'yes'),
(44, 'blacklist_keys', '', 'no'),
(45, 'comment_registration', '0', 'yes'),
(46, 'html_type', 'text/html', 'yes'),
(47, 'use_trackback', '0', 'yes'),
(48, 'default_role', 'operator', 'yes'),
(49, 'db_version', '35700', 'yes'),
(50, 'uploads_use_yearmonth_folders', '1', 'yes'),
(51, 'upload_path', '', 'yes'),
(52, 'blog_public', '0', 'yes'),
(53, 'default_link_category', '2', 'yes'),
(54, 'show_on_front', 'page', 'yes'),
(55, 'tag_base', '', 'yes'),
(56, 'show_avatars', '1', 'yes'),
(57, 'avatar_rating', 'G', 'yes'),
(58, 'upload_url_path', '', 'yes'),
(59, 'thumbnail_size_w', '150', 'yes'),
(60, 'thumbnail_size_h', '150', 'yes'),
(61, 'thumbnail_crop', '1', 'yes'),
(62, 'medium_size_w', '300', 'yes'),
(63, 'medium_size_h', '300', 'yes'),
(64, 'avatar_default', 'mystery', 'yes'),
(65, 'large_size_w', '1024', 'yes'),
(66, 'large_size_h', '1024', 'yes'),
(67, 'image_default_link_type', 'file', 'yes'),
(68, 'image_default_size', '', 'yes'),
(69, 'image_default_align', '', 'yes'),
(70, 'close_comments_for_old_posts', '0', 'yes'),
(71, 'close_comments_days_old', '14', 'yes'),
(72, 'thread_comments', '1', 'yes'),
(73, 'thread_comments_depth', '5', 'yes'),
(74, 'page_comments', '0', 'yes'),
(75, 'comments_per_page', '50', 'yes'),
(76, 'default_comments_page', 'newest', 'yes'),
(77, 'comment_order', 'asc', 'yes'),
(78, 'sticky_posts', 'a:0:{}', 'yes'),
(79, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_text', 'a:0:{}', 'yes'),
(81, 'widget_rss', 'a:0:{}', 'yes'),
(82, 'uninstall_plugins', 'a:0:{}', 'no'),
(83, 'timezone_string', '', 'yes'),
(84, 'page_for_posts', '0', 'yes'),
(85, 'page_on_front', '15', 'yes'),
(86, 'default_post_format', '0', 'yes'),
(87, 'link_manager_enabled', '0', 'yes'),
(88, 'finished_splitting_shared_terms', '1', 'yes'),
(89, 'initial_db_version', '33056', 'yes'),
(90, 'rtl21016_user_roles', 'a:4:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:88:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;s:21:"access_server_browser";b:1;s:10:"list_roles";b:1;s:12:"create_roles";b:1;s:10:"edit_roles";b:1;s:12:"delete_roles";b:1;s:15:"edit_role_menus";b:1;s:27:"edit_posts_role_permissions";b:1;s:27:"edit_pages_role_permissions";b:1;s:25:"edit_nav_menu_permissions";b:1;s:23:"edit_content_shortcodes";b:1;s:25:"delete_content_shortcodes";b:1;s:20:"edit_login_redirects";b:1;s:22:"delete_login_redirects";b:1;s:15:"bulk_edit_roles";b:1;s:23:"edit_widget_permissions";b:1;s:16:"edit_attachments";b:1;s:18:"delete_attachments";b:1;s:23:"read_others_attachments";b:1;s:23:"edit_others_attachments";b:1;s:25:"delete_others_attachments";b:1;s:23:"edit_users_higher_level";b:1;s:25:"delete_users_higher_level";b:1;s:26:"promote_users_higher_level";b:1;s:29:"promote_users_to_higher_level";b:1;s:27:"exports_reports_full_access";b:1;s:24:"exports_reports_settings";b:1;s:20:"exports_reports_view";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}s:8:"operator";a:2:{s:4:"name";s:8:"Operator";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}s:10:"supervisor";a:2:{s:4:"name";s:10:"Supervisor";s:12:"capabilities";a:2:{s:4:"read";b:1;s:14:"edit_dashboard";b:1;}}}', 'yes'),
(91, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(92, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(93, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(96, 'sidebars_widgets', 'a:3:{s:19:"wp_inactive_widgets";a:0:{}s:19:"primary-widget-area";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:13:"array_version";i:3;}', 'yes'),
(98, 'cron', 'a:6:{i:1459849151;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1459849167;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1459852332;a:1:{s:52:"check_plugin_updates-profile-builder-hobbyist-update";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:12:"every12hours";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1459908006;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1459910684;a:1:{s:23:"exports_reports_cleanup";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(111, 'auto_core_update_notified', 'a:4:{s:4:"type";s:7:"success";s:5:"email";s:35:"diannekatherinedelosreyes@gmail.com";s:7:"version";s:5:"4.3.3";s:9:"timestamp";i:1455097164;}', 'yes'),
(112, '_transient_random_seed', '63236e3506c0a002e6c0788fdf6244b7', 'yes'),
(113, '_site_transient_timeout_browser_4612fbec4e77343f50ff23fea97e8a07', '1455701968', 'yes'),
(114, '_site_transient_browser_4612fbec4e77343f50ff23fea97e8a07', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:13:"48.0.2564.103";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(119, 'recently_activated', 'a:2:{s:37:"export-user-data/export-user-data.php";i:1459493612;s:31:"wp-all-export/wp-all-export.php";i:1459482508;}', 'yes'),
(134, 'widget_pages', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(135, 'widget_calendar', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(136, 'widget_tag_cloud', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(137, 'widget_nav_menu', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(138, 'site_icon', '0', 'yes'),
(139, 'medium_large_size_w', '768', 'yes'),
(140, 'medium_large_size_h', '0', 'yes'),
(141, 'db_upgraded', '', 'yes'),
(143, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:6:"latest";s:8:"download";s:59:"https://downloads.wordpress.org/release/wordpress-4.4.2.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:59:"https://downloads.wordpress.org/release/wordpress-4.4.2.zip";s:10:"no_content";s:70:"https://downloads.wordpress.org/release/wordpress-4.4.2-no-content.zip";s:11:"new_bundled";s:71:"https://downloads.wordpress.org/release/wordpress-4.4.2-new-bundled.zip";s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.4.2";s:7:"version";s:5:"4.4.2";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.4";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1459822185;s:15:"version_checked";s:5:"4.4.2";s:12:"translations";a:0:{}}', 'yes'),
(145, 'can_compress_scripts', '1', 'yes'),
(151, 'widget_wppb-login-widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(152, 'wppb_version', '2.3.0', 'yes'),
(153, 'wppb_manage_fields', 'a:5:{i:0;a:27:{s:11:"field-title";s:13:"Country Group";s:5:"field";s:6:"Select";s:9:"meta-name";s:13:"country_group";s:2:"id";s:2:"16";s:11:"description";s:0:"";s:9:"row-count";s:1:"5";s:24:"allowed-image-extensions";s:2:".*";s:25:"allowed-upload-extensions";s:2:".*";s:11:"avatar-size";s:3:"100";s:11:"date-format";s:8:"mm/dd/yy";s:18:"terms-of-agreement";s:0:"";s:7:"options";s:17:"SG,HK,TH,MY,ID,PH";s:6:"labels";s:59:"Singapore,Hong Kong,Thailand,Malaysia,Indonesia,Philippines";s:10:"public-key";s:0:"";s:11:"private-key";s:0:"";s:16:"captcha-pb-forms";s:11:"pb_register";s:16:"captcha-wp-forms";s:19:"default_wp_register";s:10:"user-roles";s:0:"";s:21:"user-roles-sort-order";s:34:", subscriber, operator, supervisor";s:13:"default-value";s:0:"";s:14:"default-option";s:2:"SG";s:15:"default-options";s:0:"";s:22:"default-option-country";s:0:"";s:23:"default-option-timezone";s:32:"(GMT -12:00) Eniwetok, Kwajalein";s:15:"default-content";s:0:"";s:8:"required";s:3:"Yes";s:18:"overwrite-existing";s:3:"Yes";}i:1;a:27:{s:11:"field-title";s:14:"Operator Group";s:5:"field";s:6:"Select";s:9:"meta-name";s:14:"operator_group";s:2:"id";s:2:"15";s:11:"description";s:0:"";s:9:"row-count";s:1:"5";s:24:"allowed-image-extensions";s:2:".*";s:25:"allowed-upload-extensions";s:2:".*";s:11:"avatar-size";s:3:"100";s:11:"date-format";s:8:"mm/dd/yy";s:18:"terms-of-agreement";s:0:"";s:7:"options";s:65:"Singtel,StarHub,nowTV,LeEco,TrueVisions,HyppTV,K-Visions,SKYCable";s:6:"labels";s:65:"Singtel,StarHub,nowTV,LeEco,TrueVisions,HyppTV,K-Visions,SKYCable";s:10:"public-key";s:0:"";s:11:"private-key";s:0:"";s:16:"captcha-pb-forms";s:11:"pb_register";s:16:"captcha-wp-forms";s:19:"default_wp_register";s:10:"user-roles";s:0:"";s:21:"user-roles-sort-order";s:41:", editor, author, contributor, subscriber";s:13:"default-value";s:0:"";s:14:"default-option";s:7:"Singtel";s:15:"default-options";s:0:"";s:22:"default-option-country";s:0:"";s:23:"default-option-timezone";s:32:"(GMT -12:00) Eniwetok, Kwajalein";s:15:"default-content";s:0:"";s:8:"required";s:3:"Yes";s:18:"overwrite-existing";s:2:"No";}i:2;a:21:{s:2:"id";i:8;s:5:"field";s:16:"Default - E-mail";s:9:"meta-name";s:0:"";s:11:"field-title";s:6:"E-mail";s:11:"description";s:0:"";s:8:"required";s:3:"Yes";s:18:"overwrite-existing";s:2:"No";s:9:"row-count";s:1:"5";s:24:"allowed-image-extensions";s:2:".*";s:25:"allowed-upload-extensions";s:2:".*";s:11:"avatar-size";s:3:"100";s:11:"date-format";s:8:"mm/dd/yy";s:18:"terms-of-agreement";s:0:"";s:7:"options";s:0:"";s:6:"labels";s:0:"";s:10:"public-key";s:0:"";s:11:"private-key";s:0:"";s:13:"default-value";s:0:"";s:14:"default-option";s:0:"";s:15:"default-options";s:0:"";s:15:"default-content";s:0:"";}i:3;a:21:{s:2:"id";i:2;s:5:"field";s:18:"Default - Username";s:9:"meta-name";s:0:"";s:11:"field-title";s:8:"Username";s:11:"description";s:0:"";s:8:"required";s:3:"Yes";s:18:"overwrite-existing";s:2:"No";s:9:"row-count";s:1:"5";s:24:"allowed-image-extensions";s:2:".*";s:25:"allowed-upload-extensions";s:2:".*";s:11:"avatar-size";s:3:"100";s:11:"date-format";s:8:"mm/dd/yy";s:18:"terms-of-agreement";s:0:"";s:7:"options";s:0:"";s:6:"labels";s:0:"";s:10:"public-key";s:0:"";s:11:"private-key";s:0:"";s:13:"default-value";s:0:"";s:14:"default-option";s:0:"";s:15:"default-options";s:0:"";s:15:"default-content";s:0:"";}i:4;a:21:{s:2:"id";i:12;s:5:"field";s:18:"Default - Password";s:9:"meta-name";s:0:"";s:11:"field-title";s:8:"Password";s:11:"description";s:0:"";s:8:"required";s:3:"Yes";s:18:"overwrite-existing";s:2:"No";s:9:"row-count";s:1:"5";s:24:"allowed-image-extensions";s:2:".*";s:25:"allowed-upload-extensions";s:2:".*";s:11:"avatar-size";s:3:"100";s:11:"date-format";s:8:"mm/dd/yy";s:18:"terms-of-agreement";s:0:"";s:7:"options";s:0:"";s:6:"labels";s:0:"";s:10:"public-key";s:0:"";s:11:"private-key";s:0:"";s:13:"default-value";s:0:"";s:14:"default-option";s:0:"";s:15:"default-options";s:0:"";s:15:"default-content";s:0:"";}}', 'yes'),
(156, 'wppb_general_settings', 'a:8:{s:17:"extraFieldsLayout";s:7:"default";s:17:"emailConfirmation";s:2:"no";s:21:"activationLandingPage";s:0:"";s:13:"adminApproval";s:2:"no";s:23:"adminApprovalOnUserRole";a:5:{i:0;s:6:"editor";i:1;s:6:"author";i:2;s:11:"contributor";i:3;s:10:"subscriber";i:4;s:8:"operator";}s:9:"loginWith";s:13:"usernameemail";s:23:"minimum_password_length";s:0:"";s:25:"minimum_password_strength";s:0:"";}', 'yes'),
(157, 'wppb_display_admin_settings', 'a:0:{}', 'yes'),
(161, 'external_updates-profile-builder-hobbyist-update', 'O:8:"stdClass":3:{s:9:"lastCheck";i:1459822192;s:14:"checkedVersion";s:5:"2.3.0";s:6:"update";O:12:"PluginUpdate":6:{s:2:"id";i:0;s:4:"slug";s:28:"profile-builder-hobby-update";s:7:"version";s:5:"2.3.4";s:8:"homepage";N;s:12:"download_url";s:80:"http://www.cozmoslabs.com/wp-content/plugins/cl_serve_download.php?tempkey=55698";s:14:"upgrade_notice";N;}}', 'yes'),
(162, 'wppb_profile_builder_hobbyist_serial', 'CLPBH-1258-SN-b98297667d9a7450e14a48643c177335', 'yes'),
(163, 'wppb_profile_builder_hobbyist_serial_status', 'found', 'yes'),
(170, '_wpdm_etpl', 'a:2:{s:5:"title";s:18:"Your download link";s:4:"body";s:4866:"<table align="center" bgcolor="#cccccc" cellpadding="0" cellspacing="0" style="width: 100%; background:#cccccc; background-color:#cccccc; margin:0; padding:0 20px;">\r\n	<tr>\r\n		<td>\r\n		<table align="center" cellpadding="0" cellspacing="0" style="width: 620px; border-collapse:collapse; text-align:left; font-family:Tahoma; font-weight:normal; font-size:12px; line-height:15pt; color:#444444; margin:0 auto;">\r\n			<!-- Start of logo and top links -->\r\n			<tr>\r\n				<td valign="top" style="height:5px;margin:0;padding:20px 0 0 0;;line-height:0;">\r\n				<img alt="" height="5" src="https://lh4.googleusercontent.com/-HhYJa1RgT3Y/T-Cy77lMMjI/AAAAAAAAAOI/d6K5GyWdnoI/s620/top.png" vspace="0" style="border:0; padding:0; margin:0; line-height:0;" width="620"></td>\r\n			</tr>\r\n			<tr>\r\n				<td style=" width:620px;" valign="top">\r\n					<table cellpadding="0" cellspacing="0" style="width:100%; border-collapse:collapse;font-family:Tahoma; font-weight:normal; font-size:12px; line-height:15pt; color:#444444;" >\r\n						<tr>\r\n							<td bgcolor="#0f75c3" style="background:#0f75c3; color:#ffffff; padding-left:20px; padding-right:0; padding-top:10px; padding-bottom:10px; background-color:#0f75c3" valign="top">\r\n								<p align="center">Support Email: [support_email]</td>\r\n						</tr>\r\n						<tr>\r\n							<td bgcolor="#FFFFFF" style="background:#ffffff; padding-left:20px; padding-right:0; padding-top:20px; padding-bottom:15px; background-color:#ffffff" valign="middle">\r\n								<p align="center">\r\n								<a href="[site_url]">\r\n								<img border="0" src="http://www.wpdownloadmanager.com/wp-content/uploads/2012/02/wpdm-logo.png" alt="wpdownloadmanager.com" /></a></td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td valign="top" style="height:5px;margin:0;padding:0;line-height:0;">\r\n				<img alt="" height="5" src="https://lh3.googleusercontent.com/-JE5gnp7_60k/T-C3U1xjPMI/AAAAAAAAAO8/WpCbXCFjfB0/s620/bottom.png" vspace="0" style="border:0; padding:0; margin:0; line-height:0;" width="620"></td>\r\n			</tr>\r\n			<!-- End of logo and top links -->\r\n			<!-- Start of banner -->\r\n			<!-- End of banner -->\r\n			<!-- Start of First Content -->\r\n			<tr>\r\n				<td valign="top" style="height:5px;margin:0;padding:20px 0 0 0;line-height:0;">\r\n				<img alt="" height="5" src="https://lh5.googleusercontent.com/-bgjgaEJ4zLY/T-C5FIdoNQI/AAAAAAAAAPQ/7DYVUa3Vp8Q/s620/toph.png" vspace="0" style="border:0; padding:0; margin:0; line-height:0;" width="620"></td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor="#FFFFFF" style="padding:10px 20px; background:#ffffff;background-color:#ffffff;" valign="top">\r\n					<span style="font-size: 8pt; color: #999999">[date]</span><br>\r\n					<p style="line-height: 160%; font-size: 18px; margin-left: 0; margin-right: 0; margin-top: 0; margin-bottom: 11pt; padding: 0">\r\n					Thanks for Subscribing to [site_name]</p>Please click on following link to \r\n					start download:<br>\r\n					<b><a href="[download_url]">[download_url]</a></b><br>[download_url]\r\n					<p>Best \r\n					Regards,<br>\r\n					Support Team<br>\r\n					<b>[site_name]</b></td>\r\n			</tr>\r\n			<tr>\r\n				<td valign="top" style="height:5px;margin:0;padding:0;line-height:0;">\r\n				<img alt="" height="5" src="https://lh3.googleusercontent.com/-JE5gnp7_60k/T-C3U1xjPMI/AAAAAAAAAO8/WpCbXCFjfB0/s620/bottom.png" vspace="0" style="border:0; padding:0; margin:0; line-height:0;" width="620"></td>\r\n			</tr>\r\n			<!-- End of First Content -->\r\n			<!-- Start of Second Content -->\r\n			<!-- End of Second Content -->\r\n			<!-- Start of Third Content -->\r\n			<!-- End of Third Content -->\r\n			<!-- Start of two content in row Container -->\r\n			<!-- End of two content in row Container -->\r\n			<!-- Start of Footer -->\r\n			<tr>\r\n				<td valign="top" style="height:5px;margin:0;padding:20px 0 0 0;line-height:0;">\r\n				<img alt="" height="5" src="https://lh4.googleusercontent.com/-HhYJa1RgT3Y/T-Cy77lMMjI/AAAAAAAAAOI/d6K5GyWdnoI/s620/top.png" vspace="0" style="border:0; padding:0; margin:0; line-height:0;" width="620"></td>\r\n			</tr>\r\n			<tr>\r\n				<td bgcolor="#0f75c3" style="padding:15px 20px 15px 20px; background-color:#0f75c3; background:#0f75c3;">\r\n					<table cellpadding="0" cellspacing="0" style="width: 100%; border-collapse:collapse; font-family:Tahoma; font-weight:normal; font-size:12px; line-height:15pt; color:#FFFFFF;">\r\n						<tr>\r\n							<td>\r\n								<p align="center">Copyright Â© 2010 WordPress \r\n								Download Manager</td>\r\n						</tr>\r\n					</table>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td valign="top" style="height:5px;margin:0;padding:0 0 20px 0;line-height:0;">\r\n				<img alt="" height="5" src="https://lh5.googleusercontent.com/-8ChncE34Qy8/T-C5-36xXuI/AAAAAAAAAPk/dsdkvdLwsSw/s620/bottomb.png" vspace="0" style="border:0; padding:0; margin:0; line-height:0;" width="620"></td>\r\n			</tr>\r\n			<!-- End of Footer -->\r\n		</table>\r\n		</td>\r\n	</tr>\r\n</table>\r\n";}', 'yes'),
(172, 'widget_wpdm_packageinfo_widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(173, 'widget_wpdm_categories_widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(174, 'widget_wpdm_topdls_widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(175, 'widget_wpdm_newpacks_widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(176, 'widget_wpdm_catpacks_widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(177, 'widget_wpdm_affiliate_widget', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(179, 'wpdm_latest_check', '1459839967', 'yes'),
(183, 'wpdm_latest', 's:2293:"a:68:{s:21:"download-after-submit";s:1:"1";s:16:"download-manager";s:5:"4.5.4";s:15:"email-templates";s:1:"1";s:20:"multilevel-marketing";s:1:"1";s:14:"wpdm-accordion";s:5:"1.8.3";s:27:"wpdm-advanced-custom-fields";s:5:"1.5.3";s:14:"wpdm-amazon-s3";s:1:"1";s:8:"wpdm-api";s:1:"1";s:17:"wpdm-archive-page";s:5:"2.8.3";s:12:"wpdm-audiojs";s:1:"1";s:14:"wpdm-autoshare";s:1:"1";s:18:"wpdm-block-hotlink";s:1:"1";s:12:"wpdm-box-com";s:1:"1";s:21:"wpdm-buddypress-share";s:1:"1";s:21:"wpdm-button-templates";s:1:"1";s:21:"wpdm-campaign-monitor";s:1:"1";s:21:"wpdm-constant-contact";s:1:"1";s:17:"wpdm-csv-importer";s:5:"2.4.0";s:24:"wpdm-custom-access-level";s:5:"2.5.1";s:18:"wpdm-custom-fields";s:1:"1";s:19:"wpdm-daily-download";s:1:"1";s:19:"wpdm-default-values";s:1:"1";s:20:"wpdm-download-button";s:1:"1";s:20:"wpdm-download-period";s:5:"1.2.0";s:12:"wpdm-dropbox";s:1:"1";s:17:"wpdm-email-editor";s:1:"1";s:23:"wpdm-email-notification";s:1:"1";s:24:"wpdm-extended-shortcodes";s:1:"1";s:19:"wpdm-facebook-login";s:1:"1";s:19:"wpdm-facebook-share";s:1:"1";s:14:"wpdm-file-cart";s:1:"1";s:17:"wpdm-file-hosting";s:1:"1";s:16:"wpdm-filemanager";s:1:"1";s:14:"wpdm-form-lock";s:1:"1";s:21:"wpdm-ftp-file-browser";s:1:"1";s:17:"wpdm-google-drive";s:1:"1";s:14:"wpdm-i-contact";s:1:"1";s:18:"wpdm-lazy-download";s:1:"1";s:14:"wpdm-mailchimp";s:5:"1.1.0";s:15:"wpdm-newsletter";s:5:"3.1.1";s:13:"wpdm-onedrive";s:5:"1.0.0";s:18:"wpdm-page-template";s:1:"1";s:16:"wpdm-pdf-stamper";s:5:"1.5.0";s:18:"wpdm-pinterest-pin";s:1:"1";s:21:"wpdm-premium-packages";s:5:"3.5.3";s:19:"wpdm-prepaid_credit";s:1:"1";s:19:"wpdm-social-connect";s:1:"1";s:18:"wpdm-speed-control";s:1:"1";s:19:"wpdm-tinymce-button";s:5:"2.5.0";s:19:"wpdm-twitter-follow";s:1:"1";s:19:"wpdm-update-checker";s:1:"1";s:17:"wpdm-user-reviews";s:1:"1";s:15:"wpdm-users-pack";s:1:"1";s:13:"wpdm-webhooks";s:1:"1";s:9:"wpdm-zoho";s:1:"1";s:10:"wpdmpp-2co";s:1:"1";s:20:"wpdmpp-authorize_net";s:1:"1";s:14:"wpdmpp-bluepay";s:1:"1";s:15:"wpdmpp-data-api";s:1:"1";s:14:"wpdmpp-payfast";s:1:"1";s:16:"wpdmpp-PaypalPro";s:5:"1.2.2";s:12:"wpdmpp-payza";s:1:"1";s:19:"wpdmpp-sales-report";s:1:"1";s:13:"wpdmpp-skrill";s:1:"1";s:13:"wpdmpp-stripe";s:1:"1";s:12:"wpdmpp-wepay";s:1:"1";s:15:"wpdmpp-worldpay";s:1:"1";s:15:"wppromembership";s:1:"1";}";', 'yes'),
(199, 'wpfront-user-role-editor-db-version', '2.12.4', 'yes'),
(200, 'WPLANG', '', 'yes');
INSERT INTO `rtl21016_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(207, 'ws_menu_editor', 'a:18:{s:22:"hide_advanced_settings";b:1;s:16:"show_extra_icons";b:0;s:11:"custom_menu";a:3:{s:4:"tree";a:19:{s:9:"index.php";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:10:">index.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:3:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:19:"index.php>index.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:4:"Home";s:12:"access_level";s:4:"read";s:16:"extra_capability";s:0:"";s:4:"file";s:9:"index.php";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:9:"index.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:19:"index.php>index.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:9:"index.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:25:"index.php>update-core.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:128:"Updates <span class=''update-plugins count-4'' title=''1 Plugin Update, 3 Theme Updates''><span class=''update-count''>4</span></span>";s:12:"access_level";s:11:"update_core";s:16:"extra_capability";s:0:"";s:4:"file";s:15:"update-core.php";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:9:"index.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:25:"index.php>update-core.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:15:"update-core.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:22:"index.php>wpdm-welcome";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:7:"Welcome";s:10:"menu_title";s:7:"Welcome";s:12:"access_level";s:4:"read";s:16:"extra_capability";s:0:"";s:4:"file";s:12:"wpdm-welcome";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:9:"index.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:22:"index.php>wpdm-welcome";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:27:"index.php?page=wpdm-welcome";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:9:"Dashboard";s:12:"access_level";s:4:"read";s:16:"extra_capability";s:0:"";s:4:"file";s:9:"index.php";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:0:"";s:9:"css_class";s:43:"menu-top menu-top-first menu-icon-dashboard";s:8:"hookname";s:14:"menu-dashboard";s:8:"icon_url";s:19:"dashicons-dashboard";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:10:">index.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:9:"index.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:11:"separator_3";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:1;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:12:">separator_3";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:0:"";s:12:"access_level";s:4:"read";s:16:"extra_capability";s:0:"";s:4:"file";s:11:"separator_3";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:0:"";s:9:"css_class";s:17:"wp-menu-separator";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:1;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:12:">separator_3";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:0:"";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:9:"users.php";a:31:{s:10:"page_title";N;s:10:"menu_title";s:5:"Users";s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:10:">users.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:6:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:19:"users.php>users.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:9:"All Users";s:12:"access_level";s:10:"list_users";s:16:"extra_capability";s:0:"";s:4:"file";s:9:"users.php";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:9:"users.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:19:"users.php>users.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:9:"users.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";s:16:"Add New Operator";s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:34:"users.php>profile-builder-add-user";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:8:"Add User";s:10:"menu_title";s:8:"Add User";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:24:"profile-builder-add-user";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:9:"users.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:34:"users.php>profile-builder-add-user";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:39:"users.php?page=profile-builder-add-user";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";s:21:"Add New Administrator";s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:22:"users.php>user-new.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:7:"Add New";s:12:"access_level";s:12:"create_users";s:16:"extra_capability";s:0:"";s:4:"file";s:12:"user-new.php";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:9:"users.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:22:"users.php>user-new.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:12:"user-new.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:3;a:31:{s:10:"page_title";N;s:10:"menu_title";s:22:"Assign Operator Access";s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:3;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:54:"profile-builder>profile-builder-assign-operator-access";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:22:"Assign Operator Access";s:10:"menu_title";s:22:"Assign Operator Access";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:38:"profile-builder-assign-operator-access";s:12:"page_heading";s:0:"";s:8:"position";i:3;s:6:"parent";s:15:"profile-builder";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:54:"profile-builder>profile-builder-assign-operator-access";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:53:"admin.php?page=profile-builder-assign-operator-access";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:4;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:4;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:21:"users.php>profile.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:1;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:12:"Your Profile";s:12:"access_level";s:4:"read";s:16:"extra_capability";s:0:"";s:4:"file";s:11:"profile.php";s:12:"page_heading";s:0:"";s:8:"position";i:4;s:6:"parent";s:9:"users.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:21:"users.php>profile.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:11:"profile.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:5;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:5;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:47:"users.php>wpfront-user-role-editor-assign-roles";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:1;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:28:"Assign Roles | Migrate Users";s:10:"menu_title";s:16:"Assign / Migrate";s:12:"access_level";s:13:"promote_users";s:16:"extra_capability";s:0:"";s:4:"file";s:37:"wpfront-user-role-editor-assign-roles";s:12:"page_heading";s:0:"";s:8:"position";i:5;s:6:"parent";s:9:"users.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:47:"users.php>wpfront-user-role-editor-assign-roles";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:52:"users.php?page=wpfront-user-role-editor-assign-roles";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:5:"Users";s:12:"access_level";s:10:"list_users";s:16:"extra_capability";s:0:"";s:4:"file";s:9:"users.php";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:0:"";s:9:"css_class";s:24:"menu-top menu-icon-users";s:8:"hookname";s:10:"menu-users";s:8:"icon_url";s:21:"dashicons-admin-users";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:10:">users.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:9:"users.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:15:"profile-builder";a:31:{s:10:"page_title";N;s:10:"menu_title";s:15:"Profile Builder";s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:3;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:16:">profile-builder";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:6:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:42:"profile-builder>profile-builder-basic-info";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:17:"Basic Information";s:10:"menu_title";s:17:"Basic Information";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:26:"profile-builder-basic-info";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:15:"profile-builder";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:42:"profile-builder>profile-builder-basic-info";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:41:"admin.php?page=profile-builder-basic-info";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:48:"profile-builder>profile-builder-general-settings";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:16:"General Settings";s:10:"menu_title";s:16:"General Settings";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:32:"profile-builder-general-settings";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:15:"profile-builder";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:48:"profile-builder>profile-builder-general-settings";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:47:"admin.php?page=profile-builder-general-settings";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:50:"profile-builder>profile-builder-admin-bar-settings";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:40:"Show/Hide the Admin Bar on the Front-End";s:10:"menu_title";s:18:"Admin Bar Settings";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:34:"profile-builder-admin-bar-settings";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:15:"profile-builder";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:50:"profile-builder>profile-builder-admin-bar-settings";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:49:"admin.php?page=profile-builder-admin-bar-settings";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:3;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:3;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:29:"profile-builder>manage-fields";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:31:"Manage Default and Extra Fields";s:10:"menu_title";s:13:"Manage Fields";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:13:"manage-fields";s:12:"page_heading";s:0:"";s:8:"position";i:3;s:6:"parent";s:15:"profile-builder";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:29:"profile-builder>manage-fields";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:28:"admin.php?page=manage-fields";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:4;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:4;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:39:"profile-builder>profile-builder-add-ons";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:7:"Add-Ons";s:10:"menu_title";s:7:"Add-Ons";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:23:"profile-builder-add-ons";s:12:"page_heading";s:0:"";s:8:"position";i:4;s:6:"parent";s:15:"profile-builder";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:39:"profile-builder>profile-builder-add-ons";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:38:"admin.php?page=profile-builder-add-ons";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:5;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:5;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:40:"profile-builder>profile-builder-register";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:21:"Register Your Version";s:10:"menu_title";s:16:"Register Version";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:24:"profile-builder-register";s:12:"page_heading";s:0:"";s:8:"position";i:5;s:6:"parent";s:15:"profile-builder";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:40:"profile-builder>profile-builder-register";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:39:"admin.php?page=profile-builder-register";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:15:"Profile Builder";s:10:"menu_title";s:15:"Profile Builder";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:15:"profile-builder";s:12:"page_heading";s:0:"";s:8:"position";i:3;s:6:"parent";s:0:"";s:9:"css_class";s:38:"menu-top toplevel_page_profile-builder";s:8:"hookname";s:29:"toplevel_page_profile-builder";s:8:"icon_url";s:106:"http://192.168.1.167/rtlcbsasia/wp-content/plugins/profile-builder-hobbyist/assets/images/pb_menu_icon.png";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:16:">profile-builder";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:30:"admin.php?page=profile-builder";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:26:"edit.php?post_type=wpdmpro";a:31:{s:10:"page_title";N;s:10:"menu_title";s:13:"Shows & Files";s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:4;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:27:">edit.php?post_type=wpdmpro";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:11:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";s:17:"All Shows & Files";s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:53:"edit.php?post_type=wpdmpro>edit.php?post_type=wpdmpro";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:12:"All Packages";s:12:"access_level";s:10:"edit_posts";s:16:"extra_capability";s:0:"";s:4:"file";s:26:"edit.php?post_type=wpdmpro";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:26:"edit.php?post_type=wpdmpro";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:53:"edit.php?post_type=wpdmpro>edit.php?post_type=wpdmpro";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:26:"edit.php?post_type=wpdmpro";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:57:"edit.php?post_type=wpdmpro>post-new.php?post_type=wpdmpro";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:7:"Add New";s:12:"access_level";s:10:"edit_posts";s:16:"extra_capability";s:0:"";s:4:"file";s:30:"post-new.php?post_type=wpdmpro";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:26:"edit.php?post_type=wpdmpro";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:57:"edit.php?post_type=wpdmpro>post-new.php?post_type=wpdmpro";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:30:"post-new.php?post_type=wpdmpro";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:80:"edit.php?post_type=wpdmpro>edit-tags.php?taxonomy=post_tag&amp;post_type=wpdmpro";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:4:"Tags";s:12:"access_level";s:17:"manage_categories";s:16:"extra_capability";s:0:"";s:4:"file";s:53:"edit-tags.php?taxonomy=post_tag&amp;post_type=wpdmpro";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:26:"edit.php?post_type=wpdmpro";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:80:"edit.php?post_type=wpdmpro>edit-tags.php?taxonomy=post_tag&amp;post_type=wpdmpro";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:49:"edit-tags.php?taxonomy=post_tag&post_type=wpdmpro";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:3;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:3;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:84:"edit.php?post_type=wpdmpro>edit-tags.php?taxonomy=wpdmcategory&amp;post_type=wpdmpro";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:10:"Categories";s:12:"access_level";s:17:"manage_categories";s:16:"extra_capability";s:0:"";s:4:"file";s:57:"edit-tags.php?taxonomy=wpdmcategory&amp;post_type=wpdmpro";s:12:"page_heading";s:0:"";s:8:"position";i:3;s:6:"parent";s:26:"edit.php?post_type=wpdmpro";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:84:"edit.php?post_type=wpdmpro>edit-tags.php?taxonomy=wpdmcategory&amp;post_type=wpdmpro";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:53:"edit-tags.php?taxonomy=wpdmcategory&post_type=wpdmpro";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:4;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:4;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:43:"edit.php?post_type=wpdmpro>importable-files";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:37:"Bulk Import &lsaquo; Download Manager";s:10:"menu_title";s:11:"Bulk Import";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:16:"importable-files";s:12:"page_heading";s:0:"";s:8:"position";i:4;s:6:"parent";s:26:"edit.php?post_type=wpdmpro";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:43:"edit.php?post_type=wpdmpro>importable-files";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:48:"edit.php?post_type=wpdmpro&page=importable-files";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:5;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:5;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:36:"edit.php?post_type=wpdmpro>templates";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:35:"Templates &lsaquo; Download Manager";s:10:"menu_title";s:9:"Templates";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:9:"templates";s:12:"page_heading";s:0:"";s:8:"position";i:5;s:6:"parent";s:26:"edit.php?post_type=wpdmpro";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:36:"edit.php?post_type=wpdmpro>templates";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:41:"edit.php?post_type=wpdmpro&page=templates";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:6;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:6;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:33:"edit.php?post_type=wpdmpro>emails";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:37:"Subscribers &lsaquo; Download Manager";s:10:"menu_title";s:11:"Subscribers";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:6:"emails";s:12:"page_heading";s:0:"";s:8:"position";i:6;s:6:"parent";s:26:"edit.php?post_type=wpdmpro";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:33:"edit.php?post_type=wpdmpro>emails";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:38:"edit.php?post_type=wpdmpro&page=emails";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:7;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:7;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:38:"edit.php?post_type=wpdmpro>wpdm-addons";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:33:"Add-Ons &lsaquo; Download Manager";s:10:"menu_title";s:7:"Add-Ons";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:11:"wpdm-addons";s:12:"page_heading";s:0:"";s:8:"position";i:7;s:6:"parent";s:26:"edit.php?post_type=wpdmpro";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:38:"edit.php?post_type=wpdmpro>wpdm-addons";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:43:"edit.php?post_type=wpdmpro&page=wpdm-addons";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:8;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:8;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:37:"edit.php?post_type=wpdmpro>wpdm-stats";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:31:"Stats &lsaquo; Download Manager";s:10:"menu_title";s:5:"Stats";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:10:"wpdm-stats";s:12:"page_heading";s:0:"";s:8:"position";i:8;s:6:"parent";s:26:"edit.php?post_type=wpdmpro";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:37:"edit.php?post_type=wpdmpro>wpdm-stats";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:42:"edit.php?post_type=wpdmpro&page=wpdm-stats";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:9;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:9;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:35:"edit.php?post_type=wpdmpro>settings";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:34:"Settings &lsaquo; Download Manager";s:10:"menu_title";s:8:"Settings";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:8:"settings";s:12:"page_heading";s:0:"";s:8:"position";i:9;s:6:"parent";s:26:"edit.php?post_type=wpdmpro";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:35:"edit.php?post_type=wpdmpro>settings";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:40:"edit.php?post_type=wpdmpro&page=settings";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:10;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:10;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:42:"edit.php?post_type=wpdmpro>product-reports";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:12:"Sales Report";s:10:"menu_title";s:12:"Sales Report";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:15:"product-reports";s:12:"page_heading";s:0:"";s:8:"position";i:10;s:6:"parent";s:26:"edit.php?post_type=wpdmpro";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:42:"edit.php?post_type=wpdmpro>product-reports";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:47:"edit.php?post_type=wpdmpro&page=product-reports";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:9:"Downloads";s:12:"access_level";s:10:"edit_posts";s:16:"extra_capability";s:0:"";s:4:"file";s:26:"edit.php?post_type=wpdmpro";s:12:"page_heading";s:0:"";s:8:"position";i:4;s:6:"parent";s:0:"";s:9:"css_class";s:26:"menu-top menu-icon-wpdmpro";s:8:"hookname";s:18:"menu-posts-wpdmpro";s:8:"icon_url";s:18:"dashicons-download";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:27:">edit.php?post_type=wpdmpro";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:26:"edit.php?post_type=wpdmpro";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:12:"wpdm-reports";a:31:{s:10:"page_title";N;s:10:"menu_title";s:7:"Reports";s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:5;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:13:">wpdm-reports";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:2:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:25:"wpdm-reports>wpdm-reports";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:7:"Reports";s:10:"menu_title";s:17:"Reports Dashboard";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:12:"wpdm-reports";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:12:"wpdm-reports";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:25:"wpdm-reports>wpdm-reports";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:27:"admin.php?page=wpdm-reports";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:30:"wpdm-reports>wpdm-reports-data";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:12:"Reports Data";s:10:"menu_title";s:12:"Reports Data";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:17:"wpdm-reports-data";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:12:"wpdm-reports";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:30:"wpdm-reports>wpdm-reports-data";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:32:"admin.php?page=wpdm-reports-data";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:7:"Reports";s:10:"menu_title";s:17:"Reports Dashboard";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:12:"wpdm-reports";s:12:"page_heading";s:0:"";s:8:"position";i:5;s:6:"parent";s:0:"";s:9:"css_class";s:53:"menu-top menu-icon-generic toplevel_page_wpdm-reports";s:8:"hookname";s:26:"toplevel_page_wpdm-reports";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:13:">wpdm-reports";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:27:"admin.php?page=wpdm-reports";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:15:"separator_3jqns";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:6;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:1;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:16:">separator_3jqns";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:0:"";s:12:"access_level";s:4:"read";s:16:"extra_capability";s:0:"";s:4:"file";s:15:"separator_3jqns";s:12:"page_heading";s:0:"";s:8:"position";i:6;s:6:"parent";s:0:"";s:9:"css_class";s:17:"wp-menu-separator";s:8:"hookname";s:15:"separator_3jqns";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:1;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:0:"";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:0:"";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:8:"edit.php";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:7;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:9:">edit.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:4:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:17:"edit.php>edit.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:9:"All Posts";s:12:"access_level";s:10:"edit_posts";s:16:"extra_capability";s:0:"";s:4:"file";s:8:"edit.php";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:8:"edit.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:17:"edit.php>edit.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:8:"edit.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:21:"edit.php>post-new.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:7:"Add New";s:12:"access_level";s:10:"edit_posts";s:16:"extra_capability";s:0:"";s:4:"file";s:12:"post-new.php";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:8:"edit.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:21:"edit.php>post-new.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:12:"post-new.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:40:"edit.php>edit-tags.php?taxonomy=category";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:10:"Categories";s:12:"access_level";s:17:"manage_categories";s:16:"extra_capability";s:0:"";s:4:"file";s:31:"edit-tags.php?taxonomy=category";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:8:"edit.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:40:"edit.php>edit-tags.php?taxonomy=category";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:31:"edit-tags.php?taxonomy=category";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:3;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:3;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:40:"edit.php>edit-tags.php?taxonomy=post_tag";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:4:"Tags";s:12:"access_level";s:17:"manage_categories";s:16:"extra_capability";s:0:"";s:4:"file";s:31:"edit-tags.php?taxonomy=post_tag";s:12:"page_heading";s:0:"";s:8:"position";i:3;s:6:"parent";s:8:"edit.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:40:"edit.php>edit-tags.php?taxonomy=post_tag";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:31:"edit-tags.php?taxonomy=post_tag";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:5:"Posts";s:12:"access_level";s:10:"edit_posts";s:16:"extra_capability";s:0:"";s:4:"file";s:8:"edit.php";s:12:"page_heading";s:0:"";s:8:"position";i:7;s:6:"parent";s:0:"";s:9:"css_class";s:37:"menu-top menu-icon-post open-if-no-js";s:8:"hookname";s:10:"menu-posts";s:8:"icon_url";s:20:"dashicons-admin-post";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:9:">edit.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:8:"edit.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:10:"upload.php";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:8;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:11:">upload.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:4:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:21:"upload.php>upload.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:7:"Library";s:12:"access_level";s:12:"upload_files";s:16:"extra_capability";s:0:"";s:4:"file";s:10:"upload.php";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:10:"upload.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:21:"upload.php>upload.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:10:"upload.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:24:"upload.php>media-new.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:7:"Add New";s:12:"access_level";s:12:"upload_files";s:16:"extra_capability";s:0:"";s:4:"file";s:13:"media-new.php";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:10:"upload.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:24:"upload.php>media-new.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:13:"media-new.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:36:"upload.php>ewww-image-optimizer-bulk";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:13:"Bulk Optimize";s:10:"menu_title";s:13:"Bulk Optimize";s:12:"access_level";s:16:"activate_plugins";s:16:"extra_capability";s:0:"";s:4:"file";s:25:"ewww-image-optimizer-bulk";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:10:"upload.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:36:"upload.php>ewww-image-optimizer-bulk";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:41:"upload.php?page=ewww-image-optimizer-bulk";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:3;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:3;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:43:"upload.php>ewww-image-optimizer-unoptimized";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:18:"Unoptimized Images";s:10:"menu_title";s:18:"Unoptimized Images";s:12:"access_level";s:16:"activate_plugins";s:16:"extra_capability";s:0:"";s:4:"file";s:32:"ewww-image-optimizer-unoptimized";s:12:"page_heading";s:0:"";s:8:"position";i:3;s:6:"parent";s:10:"upload.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:43:"upload.php>ewww-image-optimizer-unoptimized";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:48:"upload.php?page=ewww-image-optimizer-unoptimized";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:5:"Media";s:12:"access_level";s:12:"upload_files";s:16:"extra_capability";s:0:"";s:4:"file";s:10:"upload.php";s:12:"page_heading";s:0:"";s:8:"position";i:8;s:6:"parent";s:0:"";s:9:"css_class";s:24:"menu-top menu-icon-media";s:8:"hookname";s:10:"menu-media";s:8:"icon_url";s:21:"dashicons-admin-media";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:11:">upload.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:10:"upload.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:23:"edit.php?post_type=page";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:9;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:24:">edit.php?post_type=page";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:2:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:47:"edit.php?post_type=page>edit.php?post_type=page";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:9:"All Pages";s:12:"access_level";s:10:"edit_pages";s:16:"extra_capability";s:0:"";s:4:"file";s:23:"edit.php?post_type=page";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:23:"edit.php?post_type=page";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:47:"edit.php?post_type=page>edit.php?post_type=page";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:23:"edit.php?post_type=page";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:51:"edit.php?post_type=page>post-new.php?post_type=page";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:7:"Add New";s:12:"access_level";s:10:"edit_pages";s:16:"extra_capability";s:0:"";s:4:"file";s:27:"post-new.php?post_type=page";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:23:"edit.php?post_type=page";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:51:"edit.php?post_type=page>post-new.php?post_type=page";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:27:"post-new.php?post_type=page";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:5:"Pages";s:12:"access_level";s:10:"edit_pages";s:16:"extra_capability";s:0:"";s:4:"file";s:23:"edit.php?post_type=page";s:12:"page_heading";s:0:"";s:8:"position";i:9;s:6:"parent";s:0:"";s:9:"css_class";s:23:"menu-top menu-icon-page";s:8:"hookname";s:10:"menu-pages";s:8:"icon_url";s:20:"dashicons-admin-page";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:24:">edit.php?post_type=page";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:23:"edit.php?post_type=page";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:17:"edit-comments.php";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:10;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:18:">edit-comments.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:1:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:35:"edit-comments.php>edit-comments.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:12:"All Comments";s:12:"access_level";s:10:"edit_posts";s:16:"extra_capability";s:0:"";s:4:"file";s:17:"edit-comments.php";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:17:"edit-comments.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:35:"edit-comments.php>edit-comments.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:17:"edit-comments.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:87:"Comments <span class="awaiting-mod count-0"><span class="pending-count">0</span></span>";s:12:"access_level";s:10:"edit_posts";s:16:"extra_capability";s:0:"";s:4:"file";s:17:"edit-comments.php";s:12:"page_heading";s:0:"";s:8:"position";i:10;s:6:"parent";s:0:"";s:9:"css_class";s:27:"menu-top menu-icon-comments";s:8:"hookname";s:13:"menu-comments";s:8:"icon_url";s:24:"dashicons-admin-comments";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:18:">edit-comments.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:17:"edit-comments.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:11:"separator_4";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:11;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:1;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:12:">separator_4";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:0:"";s:12:"access_level";s:4:"read";s:16:"extra_capability";s:0:"";s:4:"file";s:11:"separator_4";s:12:"page_heading";s:0:"";s:8:"position";i:11;s:6:"parent";s:0:"";s:9:"css_class";s:17:"wp-menu-separator";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:1;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:12:">separator_4";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:0:"";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:10:"themes.php";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:12;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:11:">themes.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:5:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:21:"themes.php>themes.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:6:"Themes";s:12:"access_level";s:13:"switch_themes";s:16:"extra_capability";s:0:"";s:4:"file";s:10:"themes.php";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:10:"themes.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:21:"themes.php>themes.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:10:"themes.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:24:"themes.php>customize.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:9:"Customize";s:12:"access_level";s:9:"customize";s:16:"extra_capability";s:0:"";s:4:"file";s:88:"customize.php?return=%2Frtlcbsasia%2Fwp-admin%2Foptions-general.php%3Fpage%3Dmenu_editor";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:10:"themes.php";s:9:"css_class";s:20:"hide-if-no-customize";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:24:"themes.php>customize.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:88:"customize.php?return=%2Frtlcbsasia%2Fwp-admin%2Foptions-general.php%3Fpage%3Dmenu_editor";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:22:"themes.php>widgets.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:7:"Widgets";s:12:"access_level";s:18:"edit_theme_options";s:16:"extra_capability";s:0:"";s:4:"file";s:11:"widgets.php";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:10:"themes.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:22:"themes.php>widgets.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:11:"widgets.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:3;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:3;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:24:"themes.php>nav-menus.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:5:"Menus";s:12:"access_level";s:18:"edit_theme_options";s:16:"extra_capability";s:0:"";s:4:"file";s:13:"nav-menus.php";s:12:"page_heading";s:0:"";s:8:"position";i:3;s:6:"parent";s:10:"themes.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:24:"themes.php>nav-menus.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:13:"nav-menus.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:4;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:4;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:27:"themes.php>theme-editor.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:6:"Editor";s:10:"menu_title";s:6:"Editor";s:12:"access_level";s:11:"edit_themes";s:16:"extra_capability";s:0:"";s:4:"file";s:16:"theme-editor.php";s:12:"page_heading";s:0:"";s:8:"position";i:4;s:6:"parent";s:10:"themes.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:27:"themes.php>theme-editor.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:16:"theme-editor.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:10:"Appearance";s:12:"access_level";s:13:"switch_themes";s:16:"extra_capability";s:0:"";s:4:"file";s:10:"themes.php";s:12:"page_heading";s:0:"";s:8:"position";i:12;s:6:"parent";s:0:"";s:9:"css_class";s:29:"menu-top menu-icon-appearance";s:8:"hookname";s:15:"menu-appearance";s:8:"icon_url";s:26:"dashicons-admin-appearance";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:11:">themes.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:10:"themes.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:11:"plugins.php";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:13;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:12:">plugins.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:3:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:23:"plugins.php>plugins.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:17:"Installed Plugins";s:12:"access_level";s:16:"activate_plugins";s:16:"extra_capability";s:0:"";s:4:"file";s:11:"plugins.php";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:11:"plugins.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:23:"plugins.php>plugins.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:11:"plugins.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:30:"plugins.php>plugin-install.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:7:"Add New";s:12:"access_level";s:15:"install_plugins";s:16:"extra_capability";s:0:"";s:4:"file";s:18:"plugin-install.php";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:11:"plugins.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:30:"plugins.php>plugin-install.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:18:"plugin-install.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:29:"plugins.php>plugin-editor.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:6:"Editor";s:12:"access_level";s:12:"edit_plugins";s:16:"extra_capability";s:0:"";s:4:"file";s:17:"plugin-editor.php";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:11:"plugins.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:29:"plugins.php>plugin-editor.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:17:"plugin-editor.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:87:"Plugins <span class=''update-plugins count-1''><span class=''plugin-count''>1</span></span>";s:12:"access_level";s:16:"activate_plugins";s:16:"extra_capability";s:0:"";s:4:"file";s:11:"plugins.php";s:12:"page_heading";s:0:"";s:8:"position";i:13;s:6:"parent";s:0:"";s:9:"css_class";s:26:"menu-top menu-icon-plugins";s:8:"hookname";s:12:"menu-plugins";s:8:"icon_url";s:23:"dashicons-admin-plugins";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:12:">plugins.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:11:"plugins.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:34:"wpfront-user-role-editor-all-roles";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:14;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:35:">wpfront-user-role-editor-all-roles";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:7:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:69:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-all-roles";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:5:"Roles";s:10:"menu_title";s:9:"All Roles";s:12:"access_level";s:10:"list_roles";s:16:"extra_capability";s:0:"";s:4:"file";s:34:"wpfront-user-role-editor-all-roles";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:34:"wpfront-user-role-editor-all-roles";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:69:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-all-roles";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:49:"admin.php?page=wpfront-user-role-editor-all-roles";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:67:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-add-new";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:12:"Add New Role";s:10:"menu_title";s:7:"Add New";s:12:"access_level";s:12:"create_roles";s:16:"extra_capability";s:0:"";s:4:"file";s:32:"wpfront-user-role-editor-add-new";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:34:"wpfront-user-role-editor-all-roles";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:67:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-add-new";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:47:"admin.php?page=wpfront-user-role-editor-add-new";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:67:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-restore";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:12:"Restore Role";s:10:"menu_title";s:7:"Restore";s:12:"access_level";s:10:"edit_roles";s:16:"extra_capability";s:0:"";s:4:"file";s:32:"wpfront-user-role-editor-restore";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:34:"wpfront-user-role-editor-all-roles";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:67:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-restore";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:47:"admin.php?page=wpfront-user-role-editor-restore";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:3;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:3;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:81:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-add-remove-capability";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:21:"Add/Remove Capability";s:10:"menu_title";s:14:"Add/Remove Cap";s:12:"access_level";s:10:"edit_roles";s:16:"extra_capability";s:0:"";s:4:"file";s:46:"wpfront-user-role-editor-add-remove-capability";s:12:"page_heading";s:0:"";s:8:"position";i:3;s:6:"parent";s:34:"wpfront-user-role-editor-all-roles";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:81:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-add-remove-capability";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:61:"admin.php?page=wpfront-user-role-editor-add-remove-capability";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:4;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:4;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:74:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-login-redirect";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:14:"Login Redirect";s:10:"menu_title";s:14:"Login Redirect";s:12:"access_level";s:20:"edit_login_redirects";s:16:"extra_capability";s:0:"";s:4:"file";s:39:"wpfront-user-role-editor-login-redirect";s:12:"page_heading";s:0:"";s:8:"position";i:4;s:6:"parent";s:34:"wpfront-user-role-editor-all-roles";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:74:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-login-redirect";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:54:"admin.php?page=wpfront-user-role-editor-login-redirect";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:5;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:5;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:59:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:8:"Settings";s:10:"menu_title";s:8:"Settings";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:24:"wpfront-user-role-editor";s:12:"page_heading";s:0:"";s:8:"position";i:5;s:6:"parent";s:34:"wpfront-user-role-editor-all-roles";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:59:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:39:"admin.php?page=wpfront-user-role-editor";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:6;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:6;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:66:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-go-pro";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:6:"Go Pro";s:10:"menu_title";s:42:"<span class="wpfront-go-pro">Go Pro</span>";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:31:"wpfront-user-role-editor-go-pro";s:12:"page_heading";s:0:"";s:8:"position";i:6;s:6:"parent";s:34:"wpfront-user-role-editor-all-roles";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:66:"wpfront-user-role-editor-all-roles>wpfront-user-role-editor-go-pro";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:46:"admin.php?page=wpfront-user-role-editor-go-pro";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:5:"Roles";s:10:"menu_title";s:5:"Roles";s:12:"access_level";s:10:"list_roles";s:16:"extra_capability";s:0:"";s:4:"file";s:34:"wpfront-user-role-editor-all-roles";s:12:"page_heading";s:0:"";s:8:"position";i:14;s:6:"parent";s:0:"";s:9:"css_class";s:57:"menu-top toplevel_page_wpfront-user-role-editor-all-roles";s:8:"hookname";s:48:"toplevel_page_wpfront-user-role-editor-all-roles";s:8:"icon_url";s:97:"http://192.168.1.167/rtlcbsasia/wp-content/plugins/wpfront-user-role-editor/images/roles_menu.png";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:35:">wpfront-user-role-editor-all-roles";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:49:"admin.php?page=wpfront-user-role-editor-all-roles";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:9:"tools.php";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:15;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:10:">tools.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:3:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:19:"tools.php>tools.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:15:"Available Tools";s:12:"access_level";s:10:"edit_posts";s:16:"extra_capability";s:0:"";s:4:"file";s:9:"tools.php";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:9:"tools.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:19:"tools.php>tools.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:9:"tools.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:20:"tools.php>import.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:6:"Import";s:12:"access_level";s:6:"import";s:16:"extra_capability";s:0:"";s:4:"file";s:10:"import.php";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:9:"tools.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:20:"tools.php>import.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:10:"import.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:20:"tools.php>export.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:6:"Export";s:12:"access_level";s:6:"export";s:16:"extra_capability";s:0:"";s:4:"file";s:10:"export.php";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:9:"tools.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:20:"tools.php>export.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:10:"export.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:5:"Tools";s:12:"access_level";s:10:"edit_posts";s:16:"extra_capability";s:0:"";s:4:"file";s:9:"tools.php";s:12:"page_heading";s:0:"";s:8:"position";i:15;s:6:"parent";s:0:"";s:9:"css_class";s:24:"menu-top menu-icon-tools";s:8:"hookname";s:10:"menu-tools";s:8:"icon_url";s:21:"dashicons-admin-tools";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:10:">tools.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:9:"tools.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:19:"options-general.php";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:16;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:20:">options-general.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:10:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:39:"options-general.php>options-general.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:7:"General";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:19:"options-general.php";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:19:"options-general.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:39:"options-general.php>options-general.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:19:"options-general.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:39:"options-general.php>options-writing.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:7:"Writing";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:19:"options-writing.php";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:19:"options-general.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:39:"options-general.php>options-writing.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:19:"options-writing.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:39:"options-general.php>options-reading.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:7:"Reading";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:19:"options-reading.php";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:19:"options-general.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:39:"options-general.php>options-reading.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:19:"options-reading.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:3;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:3;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:42:"options-general.php>options-discussion.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:10:"Discussion";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:22:"options-discussion.php";s:12:"page_heading";s:0:"";s:8:"position";i:3;s:6:"parent";s:19:"options-general.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:42:"options-general.php>options-discussion.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:22:"options-discussion.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:4;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:4;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:37:"options-general.php>options-media.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:5:"Media";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:17:"options-media.php";s:12:"page_heading";s:0:"";s:8:"position";i:4;s:6:"parent";s:19:"options-general.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:37:"options-general.php>options-media.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:17:"options-media.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:5;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:5;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:41:"options-general.php>options-permalink.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:10:"Permalinks";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:21:"options-permalink.php";s:12:"page_heading";s:0:"";s:8:"position";i:5;s:6:"parent";s:19:"options-general.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:41:"options-general.php>options-permalink.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:21:"options-permalink.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:6;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:6;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:39:"options-general.php>global-hide-toolbar";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:20:"Hide Toolbar Options";s:10:"menu_title";s:20:"Hide Toolbar Options";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:19:"global-hide-toolbar";s:12:"page_heading";s:0:"";s:8:"position";i:6;s:6:"parent";s:19:"options-general.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:39:"options-general.php>global-hide-toolbar";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:44:"options-general.php?page=global-hide-toolbar";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:7;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:7;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:63:"options-general.php>lh-password-changer/lh-password-changer.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:27:"LH Password Changer Options";s:10:"menu_title";s:19:"LH Password Changer";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:43:"lh-password-changer/lh-password-changer.php";s:12:"page_heading";s:0:"";s:8:"position";i:7;s:6:"parent";s:19:"options-general.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:63:"options-general.php>lh-password-changer/lh-password-changer.php";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:68:"options-general.php?page=lh-password-changer/lh-password-changer.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:8;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:8;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:65:"options-general.php>ewww-image-optimizer/ewww-image-optimizer.php";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:20:"EWWW Image Optimizer";s:10:"menu_title";s:20:"EWWW Image Optimizer";s:12:"access_level";s:16:"activate_plugins";s:16:"extra_capability";s:0:"";s:4:"file";s:45:"ewww-image-optimizer/ewww-image-optimizer.php";s:12:"page_heading";s:0:"";s:8:"position";i:8;s:6:"parent";s:19:"options-general.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:65:"options-general.php>ewww-image-optimizer/ewww-image-optimizer.php";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:70:"options-general.php?page=ewww-image-optimizer/ewww-image-optimizer.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:9;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:9;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:31:"options-general.php>menu_editor";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:11:"Menu Editor";s:10:"menu_title";s:11:"Menu Editor";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:11:"menu_editor";s:12:"page_heading";s:0:"";s:8:"position";i:9;s:6:"parent";s:19:"options-general.php";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:31:"options-general.php>menu_editor";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:36:"options-general.php?page=menu_editor";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:8:"Settings";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:19:"options-general.php";s:12:"page_heading";s:0:"";s:8:"position";i:16;s:6:"parent";s:0:"";s:9:"css_class";s:27:"menu-top menu-icon-settings";s:8:"hookname";s:13:"menu-settings";s:8:"icon_url";s:24:"dashicons-admin-settings";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:20:">options-general.php";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:19:"options-general.php";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:22:"edit.php?post_type=acf";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:17;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:23:">edit.php?post_type=acf";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:3:{i:0;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:0;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:45:"edit.php?post_type=acf>edit.php?post_type=acf";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:13:"Custom Fields";s:10:"menu_title";s:13:"Custom Fields";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:22:"edit.php?post_type=acf";s:12:"page_heading";s:0:"";s:8:"position";i:0;s:6:"parent";s:22:"edit.php?post_type=acf";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:45:"edit.php?post_type=acf>edit.php?post_type=acf";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:22:"edit.php?post_type=acf";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:1;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:1;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:33:"edit.php?post_type=acf>acf-export";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:6:"Export";s:10:"menu_title";s:6:"Export";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:10:"acf-export";s:12:"page_heading";s:0:"";s:8:"position";i:1;s:6:"parent";s:22:"edit.php?post_type=acf";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:33:"edit.php?post_type=acf>acf-export";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:38:"edit.php?post_type=acf&page=acf-export";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}i:2;a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:2;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:0;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:33:"edit.php?post_type=acf>acf-addons";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:7:"Add-ons";s:10:"menu_title";s:7:"Add-ons";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:10:"acf-addons";s:12:"page_heading";s:0:"";s:8:"position";i:2;s:6:"parent";s:22:"edit.php?post_type=acf";s:9:"css_class";s:0:"";s:8:"hookname";s:0:"";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:33:"edit.php?post_type=acf>acf-addons";s:14:"is_plugin_page";b:1;s:6:"custom";b:0;s:3:"url";s:38:"edit.php?post_type=acf&page=acf-addons";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:13:"Custom Fields";s:10:"menu_title";s:13:"Custom Fields";s:12:"access_level";s:14:"manage_options";s:16:"extra_capability";s:0:"";s:4:"file";s:22:"edit.php?post_type=acf";s:12:"page_heading";s:0:"";s:8:"position";i:17;s:6:"parent";s:0:"";s:9:"css_class";s:59:"menu-top menu-icon-generic toplevel_page_edit?post_type=acf";s:8:"hookname";s:32:"toplevel_page_edit?post_type=acf";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:0;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:23:">edit.php?post_type=acf";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:22:"edit.php?post_type=acf";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}s:15:"separator_qoxQm";a:31:{s:10:"page_title";N;s:10:"menu_title";N;s:12:"access_level";N;s:16:"extra_capability";N;s:4:"file";N;s:12:"page_heading";N;s:8:"position";i:18;s:6:"parent";N;s:9:"css_class";N;s:8:"hookname";N;s:8:"icon_url";N;s:9:"separator";b:1;s:6:"colors";N;s:14:"is_always_open";N;s:7:"open_in";N;s:13:"iframe_height";N;s:11:"template_id";s:16:">separator_qoxQm";s:14:"is_plugin_page";N;s:6:"custom";b:0;s:3:"url";N;s:16:"embedded_page_id";N;s:21:"embedded_page_blog_id";N;s:5:"items";a:0:{}s:12:"grant_access";a:0:{}s:7:"missing";b:0;s:6:"unused";b:0;s:6:"hidden";b:0;s:17:"hidden_from_actor";a:0:{}s:24:"restrict_access_to_items";b:0;s:24:"had_access_before_hiding";N;s:8:"defaults";a:22:{s:10:"page_title";s:0:"";s:10:"menu_title";s:0:"";s:12:"access_level";s:4:"read";s:16:"extra_capability";s:0:"";s:4:"file";s:15:"separator_qoxQm";s:12:"page_heading";s:0:"";s:8:"position";i:18;s:6:"parent";s:0:"";s:9:"css_class";s:17:"wp-menu-separator";s:8:"hookname";s:15:"separator_qoxQm";s:8:"icon_url";s:23:"dashicons-admin-generic";s:9:"separator";b:1;s:6:"colors";b:0;s:14:"is_always_open";b:0;s:7:"open_in";s:11:"same_window";s:13:"iframe_height";i:0;s:11:"template_id";s:0:"";s:14:"is_plugin_page";b:0;s:6:"custom";b:0;s:3:"url";s:0:"";s:16:"embedded_page_id";i:0;s:21:"embedded_page_blog_id";i:1;}}}s:6:"format";a:3:{s:4:"name";s:22:"Admin Menu Editor menu";s:7:"version";s:3:"6.3";s:13:"is_normalized";b:1;}s:13:"color_presets";a:0:{}}s:18:"first_install_time";i:1455168263;s:21:"display_survey_notice";b:1;s:17:"plugin_db_version";i:140;s:24:"security_logging_enabled";b:0;s:17:"menu_config_scope";s:6:"global";s:13:"plugin_access";s:14:"manage_options";s:15:"allowed_user_id";N;s:28:"plugins_page_allowed_user_id";N;s:27:"show_deprecated_hide_button";b:1;s:37:"dashboard_hiding_confirmation_enabled";b:1;s:21:"submenu_icons_enabled";s:9:"if_custom";s:16:"ui_colour_scheme";s:7:"classic";s:13:"visible_users";a:0:{}s:23:"show_plugin_menu_notice";b:0;s:20:"unused_item_position";s:8:"relative";}', 'yes');
INSERT INTO `rtl21016_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(248, '_wpdmpp_settings', 'a:17:{s:12:"base_country";s:20:"---Select Country---";s:14:"guest_checkout";s:1:"1";s:14:"guest_download";s:1:"1";s:7:"page_id";s:1:"8";s:14:"orders_page_id";s:1:"9";s:19:"guest_order_page_id";s:0:"";s:21:"continue_shopping_url";s:28:"http://localhost/rtlcbsasia/";s:21:"order_validity_period";s:3:"365";s:12:"invoice_logo";s:0:"";s:23:"invoice_company_address";s:0:"";s:31:"wpdmpp_after_addtocart_redirect";s:1:"1";s:7:"TestPay";a:3:{s:7:"enabled";s:1:"1";s:10:"cancel_url";s:28:"http://localhost/rtlcbsasia/";s:10:"return_url";s:38:"http://localhost/rtlcbsasia/purchases/";}s:8:"pmorders";a:4:{i:0;s:7:"TestPay";i:1;s:6:"Paypal";i:2;s:6:"Cheque";i:3;s:4:"Cash";}s:6:"Paypal";a:5:{s:7:"enabled";s:1:"1";s:11:"Paypal_mode";s:4:"live";s:12:"Paypal_email";s:0:"";s:10:"cancel_url";s:28:"http://localhost/rtlcbsasia/";s:10:"return_url";s:38:"http://localhost/rtlcbsasia/purchases/";}s:6:"Cheque";a:1:{s:7:"enabled";s:1:"0";}s:4:"Cash";a:1:{s:7:"enabled";s:1:"0";}s:8:"currency";s:3:"USD";}', 'yes'),
(249, 'wpdmpp_access_level', 'level_2', 'yes'),
(250, 'widget_wpdmpp_minicart', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(253, '__wpdm_user_dashboard', '', 'yes'),
(254, '__wpdm_author_dashboard', '', 'yes'),
(255, '__wpdm_front_end_access', 'a:1:{i:0;s:13:"administrator";}', 'yes'),
(256, '__wpdm_front_end_access_blocked', '', 'yes'),
(257, '__wpdm_ips_frontend', 'publish', 'yes'),
(258, '__wpdm_overwrite_file_frontend', '0', 'yes'),
(259, '__wpdm_allowed_file_types', '*', 'yes'),
(260, '__wpdm_max_upload_size', '1000', 'yes'),
(261, '__wpdm_new_package_email', '', 'yes'),
(262, '__wpdm_new_package_email_subject', 'A package is waiting for your review!', 'yes'),
(263, '__wpdm_file_list_paging', '1', 'yes'),
(264, '__wpdm_rss_feed_main', '0', 'yes'),
(265, '__wpdm_cpage_info', 'a:1:{i:0;s:0:"";}', 'yes'),
(266, '__wpdm_cpage_excerpt', 'after', 'yes'),
(267, '__wpdm_cpage_template', 'link-template-msthumnail.php', 'yes'),
(285, '__wpdm_nlc', '1459911023', 'yes'),
(286, 'settings_ok', '1457840203', 'yes'),
(287, '_wpdm_license_key', '20540-28262-74710-47502', 'yes'),
(291, '__wpdmcategory', 'a:6:{i:2;a:1:{s:6:"access";a:1:{i:0;s:5:"guest";}}i:3;a:1:{s:6:"access";a:1:{i:0;s:5:"guest";}}i:4;a:1:{s:6:"access";a:2:{i:0;s:8:"__wpdm__";i:1;s:5:"guest";}}i:5;a:1:{s:6:"access";a:1:{i:0;s:5:"guest";}}i:6;a:1:{s:6:"access";a:2:{i:0;s:8:"__wpdm__";i:1;s:5:"guest";}}i:7;a:1:{s:6:"access";a:1:{i:0;s:5:"guest";}}}', 'yes'),
(302, 'current_theme', 'RTL CBS Asia Operators Theme', 'yes'),
(303, 'theme_mods_twentythirteen', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:7:"primary";i:8;}s:16:"sidebars_widgets";a:2:{s:4:"time";i:1458284936;s:4:"data";a:3:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";N;}}}', 'yes'),
(304, 'theme_switched', '', 'yes'),
(322, '_site_transient_timeout_browser_7bbf6b91fb6a8a8334413fe6497a718d', '1455854382', 'yes'),
(323, '_site_transient_browser_7bbf6b91fb6a8a8334413fe6497a718d', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:13:"48.0.2564.109";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(381, 'acf_version', '4.4.5', 'yes'),
(469, 'task', 'wdm_save_settings', 'yes'),
(470, 'action', 'wdm_settings', 'yes'),
(471, 'section', 'basic', 'yes'),
(472, '__wpdm_curl_base', 'downloads', 'yes'),
(473, '__wpdm_purl_base', 'download', 'yes'),
(474, '__wpdm_has_archive', '0', 'yes'),
(475, '__wpdm_archive_page_slug', 'all-downloads', 'yes'),
(476, '_wpdm_hide_all', '0', 'yes'),
(477, '_wpdm_file_browser_root', 'C:/xampp/htdocs/rtlcbsasia', 'yes'),
(478, '_wpdm_file_browser_access', 'a:1:{i:0;s:13:"administrator";}', 'yes'),
(479, '_wpdm_facebook_app_id', '', 'yes'),
(480, '_wpdm_linkedin_client_id', '', 'yes'),
(481, '_wpdm_recaptcha_site_key', '', 'yes'),
(482, '_wpdm_recaptcha_secret_key', '', 'yes'),
(483, '__wpdm_blocked_domains', '', 'yes'),
(484, '__wpdm_blocked_emails', '', 'yes'),
(485, '__wpdm_overwrrite_file', '0', 'yes'),
(486, '__wpdm_sanitize_filename', '0', 'yes'),
(487, 'wpdm_update_notice', '0', 'yes'),
(488, 'wpdm_permission_msg', '', 'yes'),
(489, 'wpdm_login_msg', '<div class=\\"w3eden\\"><div class=\\"panel panel-default\\"><div class=\\"panel-body\\"><span class=\\"text-danger\\">Login is required to access this page</span></div><div class=\\"panel-footer text-right\\"><a href=\\"http://localhost/rtlcbsasia/wp-login.php?redirect_to=[this_url]\\" class=\\"btn btn-danger btn-sm\\"><i class=\\"fa fa-lock\\"></i> Login</a></div></div></div>', 'yes'),
(490, '__wpdm_individual_file_download', '1', 'yes'),
(491, '__wpdm_cache_zip', '0', 'yes'),
(492, '__wpdm_download_speed', '4096', 'yes'),
(493, '__wpdm_download_resume', '1', 'yes'),
(494, '__wpdm_support_output_buffer', '1', 'yes'),
(495, '__wpdm_open_in_browser', '0', 'yes'),
(496, '__wpdm_disable_scripts', 'a:1:{i:0;s:0:"";}', 'yes'),
(508, '_fm_page_templates', 's:6:"a:0:{}";', 'yes'),
(642, 'theme_mods_wp-starter-0', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1455850526;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:0:{}s:19:"primary-widget-area";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}}}}', 'yes'),
(761, 'theme_mods_twentyfifteen', 'a:1:{s:16:"sidebars_widgets";a:2:{s:4:"time";i:1456282559;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}}}}', 'yes'),
(877, 'global-admin-bar-plugin-setting', '1', 'yes'),
(878, 'global-admin-bar-plugin-user-setting', '', 'yes'),
(879, 'global-admin-bar-roles', 'a:6:{i:0;s:13:"administrator";i:1;s:6:"editor";i:2;s:6:"author";i:3;s:11:"contributor";i:4;s:10:"subscriber";i:5;s:8:"operator";}', 'yes'),
(880, 'global-admin-bar-profiles', 'a:5:{i:0;s:6:"editor";i:1;s:6:"author";i:2;s:11:"contributor";i:3;s:10:"subscriber";i:4;s:8:"operator";}', 'yes'),
(884, '_site_transient_timeout_browser_774d5b2cadcbe8a9fa6a3c1e34e56aaa', '1457341594', 'yes'),
(885, '_site_transient_browser_774d5b2cadcbe8a9fa6a3c1e34e56aaa', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:13:"48.0.2564.109";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(937, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
(1076, '_transient_timeout_settings_errors', '1458700021', 'no'),
(1077, '_transient_settings_errors', 'a:1:{i:0;a:4:{s:7:"setting";s:7:"general";s:4:"code";s:16:"settings_updated";s:7:"message";s:15:"Settings saved.";s:4:"type";s:7:"updated";}}', 'no'),
(1078, '_site_transient_timeout_browser_e3ae366e66d1c39ce6cf9f9706edbba9', '1458196293', 'yes'),
(1079, '_site_transient_browser_e3ae366e66d1c39ce6cf9f9706edbba9', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:13:"48.0.2564.116";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(1151, 'wpdmcategory_children', 'a:2:{i:3;a:2:{i:0;i:4;i:1;i:7;}i:2;a:2:{i:0;i:5;i:1;i:6;}}', 'yes'),
(1187, 'theme_mods_rtlcbsasia-theme', 'a:2:{i:0;b:0;s:18:"nav_menu_locations";a:4:{s:7:"primary";i:8;s:9:"main-menu";i:8;s:11:"footer-menu";i:9;s:14:"secondary-menu";i:10;}}', 'yes'),
(1196, '_site_transient_timeout_browser_c4538b0c977f100b3d3d0ebdf1d4628f', '1458629570', 'yes'),
(1197, '_site_transient_browser_c4538b0c977f100b3d3d0ebdf1d4628f', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:12:"49.0.2623.75";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(1219, '_fm_link_templates', 's:6:"a:0:{}";', 'yes'),
(1251, 'category_children', 'a:0:{}', 'yes'),
(1418, 'rewrite_rules', 'a:96:{s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:36:"download/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:46:"download/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:66:"download/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"download/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"download/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:42:"download/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:25:"download/([^/]+)/embed/?$";s:40:"index.php?wpdmpro=$matches[1]&embed=true";s:29:"download/([^/]+)/trackback/?$";s:34:"index.php?wpdmpro=$matches[1]&tb=1";s:37:"download/([^/]+)/page/?([0-9]{1,})/?$";s:47:"index.php?wpdmpro=$matches[1]&paged=$matches[2]";s:44:"download/([^/]+)/comment-page-([0-9]{1,})/?$";s:47:"index.php?wpdmpro=$matches[1]&cpage=$matches[2]";s:33:"download/([^/]+)(?:/([0-9]+))?/?$";s:46:"index.php?wpdmpro=$matches[1]&page=$matches[2]";s:25:"download/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:35:"download/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:55:"download/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"download/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"download/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:31:"download/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:50:"downloads/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:51:"index.php?wpdmcategory=$matches[1]&feed=$matches[2]";s:45:"downloads/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:51:"index.php?wpdmcategory=$matches[1]&feed=$matches[2]";s:38:"downloads/([^/]+)/page/?([0-9]{1,})/?$";s:52:"index.php?wpdmcategory=$matches[1]&paged=$matches[2]";s:20:"downloads/([^/]+)/?$";s:34:"index.php?wpdmcategory=$matches[1]";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:39:"index.php?&page_id=15&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:27:"[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"([^/]+)/embed/?$";s:37:"index.php?name=$matches[1]&embed=true";s:20:"([^/]+)/trackback/?$";s:31:"index.php?name=$matches[1]&tb=1";s:40:"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:35:"([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:28:"([^/]+)/page/?([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&paged=$matches[2]";s:35:"([^/]+)/comment-page-([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&cpage=$matches[2]";s:24:"([^/]+)(?:/([0-9]+))?/?$";s:43:"index.php?name=$matches[1]&page=$matches[2]";s:16:"[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:26:"[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:46:"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:22:"[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";}', 'yes'),
(1438, 'ewww_image_optimizer_bulk_attachments', '', 'no'),
(1439, 'ewww_image_optimizer_flag_attachments', '', 'no'),
(1440, 'ewww_image_optimizer_ngg_attachments', '', 'no'),
(1441, 'ewww_image_optimizer_aux_attachments', '', 'no'),
(1442, 'ewww_image_optimizer_defer_attachments', '', 'no'),
(1443, 'ewww_image_optimizer_disable_pngout', '1', 'yes'),
(1444, 'ewww_image_optimizer_optipng_level', '2', 'yes'),
(1445, 'ewww_image_optimizer_pngout_level', '2', 'yes'),
(1446, 'ewww_image_optimizer_jpegtran_copy', '1', 'yes'),
(1447, 'ewww_image_optimizer_version', '261.0', 'yes'),
(1510, '_site_transient_timeout_browser_8bee024ee9eaf30cc1604d2cc177c077', '1459733051', 'yes'),
(1511, '_site_transient_browser_8bee024ee9eaf30cc1604d2cc177c077', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:12:"49.0.2623.87";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(1612, '_transient_timeout_plugin_slugs', '1459840749', 'no'),
(1613, '_transient_plugin_slugs', 'a:13:{i:0;s:33:"admin-menu-editor/menu-editor.php";i:1;s:30:"advanced-custom-fields/acf.php";i:2;s:29:"acf-repeater/acf-repeater.php";i:3;s:37:"download-manager/download-manager.php";i:4;s:45:"ewww-image-optimizer/ewww-image-optimizer.php";i:5;s:43:"exports-and-reports/exports-and-reports.php";i:6;s:55:"global-admin-bar-hide-or-remove/hide-admin-tool-bar.php";i:7;s:43:"lh-password-changer/lh-password-changer.php";i:8;s:34:"profile-builder-hobbyist/index.php";i:9;s:29:"pc-robotstxt/pc-robotstxt.php";i:10;s:31:"wpdmpp-sales-report/reports.php";i:11;s:29:"wpdm-reports/wpdm-reports.php";i:12;s:53:"wpfront-user-role-editor/wpfront-user-role-editor.php";}', 'no'),
(1666, 'lh_password_changer-options', 'a:1:{s:27:"lh_password_changer-page_id";i:218;}', 'yes'),
(1672, '_site_transient_timeout_browser_67bffb4457c7c00ae77275828881cb94', '1459914400', 'yes'),
(1673, '_site_transient_browser_67bffb4457c7c00ae77275828881cb94', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:12:"49.0.2623.87";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(1765, '_site_transient_timeout_browser_2c1eb1d7db60a6595e3c7b3982b5caa2', '1460080020', 'yes'),
(1766, '_site_transient_browser_2c1eb1d7db60a6595e3c7b3982b5caa2', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:11:"46.0.2486.0";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(1777, '_site_transient_timeout_browser_3bec48a1d98e73c3c54abfb8c3d1d4e7', '1460080108', 'yes'),
(1778, '_site_transient_browser_3bec48a1d98e73c3c54abfb8c3d1d4e7', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:7:"Firefox";s:7:"version";s:4:"36.0";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:2:"16";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(1786, 'exports_reports_version', '072', 'yes'),
(1787, 'exports_reports_token', 'd0445ae1b620d99e9503b1fb3a8a5c52', 'yes'),
(1797, 'PMXE_Plugin_Options', 'a:11:{s:12:"info_api_url";s:26:"http://www.wpallimport.com";s:7:"dismiss";i:0;s:18:"dismiss_manage_top";i:0;s:21:"dismiss_manage_bottom";i:0;s:12:"cron_job_key";s:12:"I1Iivhxbmlu0";s:14:"max_input_time";i:-1;s:18:"max_execution_time";i:-1;s:6:"secure";i:1;s:14:"zapier_api_key";s:32:"ZbIpWEiNLrJ3JCs48klPEL0gp8AXqEKa";s:21:"zapier_invitation_url";s:0:"";s:30:"zapier_invitation_url_received";s:0:"";}', 'yes'),
(1798, '_wpallexport_session_new_', 'a:1:{s:14:"is_user_export";b:1;}', 'no'),
(1799, '_wpallexport_session_expires_new_', '1459655291', 'no'),
(1815, '_site_transient_timeout_available_translations', '1459504825', 'yes');
INSERT INTO `rtl21016_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1816, '_site_transient_available_translations', 'a:78:{s:2:"ar";a:8:{s:8:"language";s:2:"ar";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-07 13:09:53";s:12:"english_name";s:6:"Arabic";s:11:"native_name";s:14:"العربية";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/ar.zip";s:3:"iso";a:2:{i:1;s:2:"ar";i:2;s:3:"ara";}s:7:"strings";a:1:{s:8:"continue";s:16:"المتابعة";}}s:3:"ary";a:8:{s:8:"language";s:3:"ary";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-12 10:15:45";s:12:"english_name";s:15:"Moroccan Arabic";s:11:"native_name";s:31:"العربية المغربية";s:7:"package";s:62:"https://downloads.wordpress.org/translation/core/4.4.2/ary.zip";s:3:"iso";a:2:{i:1;s:2:"ar";i:3;s:3:"ary";}s:7:"strings";a:1:{s:8:"continue";s:16:"المتابعة";}}s:2:"az";a:8:{s:8:"language";s:2:"az";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-07 20:53:51";s:12:"english_name";s:11:"Azerbaijani";s:11:"native_name";s:16:"Azərbaycan dili";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/az.zip";s:3:"iso";a:2:{i:1;s:2:"az";i:2;s:3:"aze";}s:7:"strings";a:1:{s:8:"continue";s:5:"Davam";}}s:3:"azb";a:8:{s:8:"language";s:3:"azb";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-11 22:42:10";s:12:"english_name";s:17:"South Azerbaijani";s:11:"native_name";s:29:"گؤنئی آذربایجان";s:7:"package";s:62:"https://downloads.wordpress.org/translation/core/4.4.2/azb.zip";s:3:"iso";a:2:{i:1;s:2:"az";i:3;s:3:"azb";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continue";}}s:5:"bg_BG";a:8:{s:8:"language";s:5:"bg_BG";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-08 08:50:29";s:12:"english_name";s:9:"Bulgarian";s:11:"native_name";s:18:"Български";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/bg_BG.zip";s:3:"iso";a:2:{i:1;s:2:"bg";i:2;s:3:"bul";}s:7:"strings";a:1:{s:8:"continue";s:22:"Продължение";}}s:5:"bn_BD";a:8:{s:8:"language";s:5:"bn_BD";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-08 13:17:04";s:12:"english_name";s:7:"Bengali";s:11:"native_name";s:15:"বাংলা";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/bn_BD.zip";s:3:"iso";a:1:{i:1;s:2:"bn";}s:7:"strings";a:1:{s:8:"continue";s:23:"এগিয়ে চল.";}}s:5:"bs_BA";a:8:{s:8:"language";s:5:"bs_BA";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-04 09:40:25";s:12:"english_name";s:7:"Bosnian";s:11:"native_name";s:8:"Bosanski";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/bs_BA.zip";s:3:"iso";a:2:{i:1;s:2:"bs";i:2;s:3:"bos";}s:7:"strings";a:1:{s:8:"continue";s:7:"Nastavi";}}s:2:"ca";a:8:{s:8:"language";s:2:"ca";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-24 08:27:23";s:12:"english_name";s:7:"Catalan";s:11:"native_name";s:7:"Català";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/ca.zip";s:3:"iso";a:2:{i:1;s:2:"ca";i:2;s:3:"cat";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continua";}}s:3:"ceb";a:8:{s:8:"language";s:3:"ceb";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-16 15:34:57";s:12:"english_name";s:7:"Cebuano";s:11:"native_name";s:7:"Cebuano";s:7:"package";s:62:"https://downloads.wordpress.org/translation/core/4.4.2/ceb.zip";s:3:"iso";a:2:{i:2;s:3:"ceb";i:3;s:3:"ceb";}s:7:"strings";a:1:{s:8:"continue";s:7:"Padayun";}}s:5:"cs_CZ";a:8:{s:8:"language";s:5:"cs_CZ";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-11 18:32:36";s:12:"english_name";s:5:"Czech";s:11:"native_name";s:12:"Čeština‎";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/cs_CZ.zip";s:3:"iso";a:2:{i:1;s:2:"cs";i:2;s:3:"ces";}s:7:"strings";a:1:{s:8:"continue";s:11:"Pokračovat";}}s:2:"cy";a:8:{s:8:"language";s:2:"cy";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-01-26 16:01:40";s:12:"english_name";s:5:"Welsh";s:11:"native_name";s:7:"Cymraeg";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/cy.zip";s:3:"iso";a:2:{i:1;s:2:"cy";i:2;s:3:"cym";}s:7:"strings";a:1:{s:8:"continue";s:6:"Parhau";}}s:5:"da_DK";a:8:{s:8:"language";s:5:"da_DK";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-08 22:48:20";s:12:"english_name";s:6:"Danish";s:11:"native_name";s:5:"Dansk";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/da_DK.zip";s:3:"iso";a:2:{i:1;s:2:"da";i:2;s:3:"dan";}s:7:"strings";a:1:{s:8:"continue";s:12:"Forts&#230;t";}}s:5:"de_CH";a:8:{s:8:"language";s:5:"de_CH";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-08 14:19:21";s:12:"english_name";s:20:"German (Switzerland)";s:11:"native_name";s:17:"Deutsch (Schweiz)";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/de_CH.zip";s:3:"iso";a:1:{i:1;s:2:"de";}s:7:"strings";a:1:{s:8:"continue";s:10:"Fortfahren";}}s:12:"de_DE_formal";a:8:{s:8:"language";s:12:"de_DE_formal";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-26 16:11:56";s:12:"english_name";s:15:"German (Formal)";s:11:"native_name";s:13:"Deutsch (Sie)";s:7:"package";s:71:"https://downloads.wordpress.org/translation/core/4.4.2/de_DE_formal.zip";s:3:"iso";a:1:{i:1;s:2:"de";}s:7:"strings";a:1:{s:8:"continue";s:10:"Fortfahren";}}s:5:"de_DE";a:8:{s:8:"language";s:5:"de_DE";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-29 10:47:54";s:12:"english_name";s:6:"German";s:11:"native_name";s:7:"Deutsch";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/de_DE.zip";s:3:"iso";a:1:{i:1;s:2:"de";}s:7:"strings";a:1:{s:8:"continue";s:10:"Fortfahren";}}s:2:"el";a:8:{s:8:"language";s:2:"el";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-27 09:56:24";s:12:"english_name";s:5:"Greek";s:11:"native_name";s:16:"Ελληνικά";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/el.zip";s:3:"iso";a:2:{i:1;s:2:"el";i:2;s:3:"ell";}s:7:"strings";a:1:{s:8:"continue";s:16:"Συνέχεια";}}s:5:"en_AU";a:8:{s:8:"language";s:5:"en_AU";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-07 04:39:48";s:12:"english_name";s:19:"English (Australia)";s:11:"native_name";s:19:"English (Australia)";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/en_AU.zip";s:3:"iso";a:3:{i:1;s:2:"en";i:2;s:3:"eng";i:3;s:3:"eng";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continue";}}s:5:"en_CA";a:8:{s:8:"language";s:5:"en_CA";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-06 23:10:59";s:12:"english_name";s:16:"English (Canada)";s:11:"native_name";s:16:"English (Canada)";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/en_CA.zip";s:3:"iso";a:3:{i:1;s:2:"en";i:2;s:3:"eng";i:3;s:3:"eng";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continue";}}s:5:"en_ZA";a:8:{s:8:"language";s:5:"en_ZA";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-15 11:52:35";s:12:"english_name";s:22:"English (South Africa)";s:11:"native_name";s:22:"English (South Africa)";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/en_ZA.zip";s:3:"iso";a:3:{i:1;s:2:"en";i:2;s:3:"eng";i:3;s:3:"eng";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continue";}}s:5:"en_NZ";a:8:{s:8:"language";s:5:"en_NZ";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-08 13:34:17";s:12:"english_name";s:21:"English (New Zealand)";s:11:"native_name";s:21:"English (New Zealand)";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/en_NZ.zip";s:3:"iso";a:3:{i:1;s:2:"en";i:2;s:3:"eng";i:3;s:3:"eng";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continue";}}s:5:"en_GB";a:8:{s:8:"language";s:5:"en_GB";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-01-14 21:14:29";s:12:"english_name";s:12:"English (UK)";s:11:"native_name";s:12:"English (UK)";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/en_GB.zip";s:3:"iso";a:3:{i:1;s:2:"en";i:2;s:3:"eng";i:3;s:3:"eng";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continue";}}s:2:"eo";a:8:{s:8:"language";s:2:"eo";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-01-25 13:07:29";s:12:"english_name";s:9:"Esperanto";s:11:"native_name";s:9:"Esperanto";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/eo.zip";s:3:"iso";a:2:{i:1;s:2:"eo";i:2;s:3:"epo";}s:7:"strings";a:1:{s:8:"continue";s:8:"Daŭrigi";}}s:5:"es_MX";a:8:{s:8:"language";s:5:"es_MX";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-07 17:35:10";s:12:"english_name";s:16:"Spanish (Mexico)";s:11:"native_name";s:19:"Español de México";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/es_MX.zip";s:3:"iso";a:2:{i:1;s:2:"es";i:2;s:3:"spa";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"es_GT";a:8:{s:8:"language";s:5:"es_GT";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-09 18:08:52";s:12:"english_name";s:19:"Spanish (Guatemala)";s:11:"native_name";s:21:"Español de Guatemala";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/es_GT.zip";s:3:"iso";a:2:{i:1;s:2:"es";i:2;s:3:"spa";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"es_CL";a:8:{s:8:"language";s:5:"es_CL";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-02 20:27:44";s:12:"english_name";s:15:"Spanish (Chile)";s:11:"native_name";s:17:"Español de Chile";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/es_CL.zip";s:3:"iso";a:2:{i:1;s:2:"es";i:2;s:3:"spa";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"es_VE";a:8:{s:8:"language";s:5:"es_VE";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-01-13 06:14:13";s:12:"english_name";s:19:"Spanish (Venezuela)";s:11:"native_name";s:21:"Español de Venezuela";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/es_VE.zip";s:3:"iso";a:2:{i:1;s:2:"es";i:2;s:3:"spa";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"es_CO";a:8:{s:8:"language";s:5:"es_CO";s:7:"version";s:6:"4.3-RC";s:7:"updated";s:19:"2015-08-04 06:10:33";s:12:"english_name";s:18:"Spanish (Colombia)";s:11:"native_name";s:20:"Español de Colombia";s:7:"package";s:65:"https://downloads.wordpress.org/translation/core/4.3-RC/es_CO.zip";s:3:"iso";a:2:{i:1;s:2:"es";i:2;s:3:"spa";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"es_AR";a:8:{s:8:"language";s:5:"es_AR";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-23 00:46:01";s:12:"english_name";s:19:"Spanish (Argentina)";s:11:"native_name";s:21:"Español de Argentina";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/es_AR.zip";s:3:"iso";a:2:{i:1;s:2:"es";i:2;s:3:"spa";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"es_PE";a:8:{s:8:"language";s:5:"es_PE";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-01-24 15:17:36";s:12:"english_name";s:14:"Spanish (Peru)";s:11:"native_name";s:17:"Español de Perú";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/es_PE.zip";s:3:"iso";a:2:{i:1;s:2:"es";i:2;s:3:"spa";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"es_ES";a:8:{s:8:"language";s:5:"es_ES";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-13 12:28:49";s:12:"english_name";s:15:"Spanish (Spain)";s:11:"native_name";s:8:"Español";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/es_ES.zip";s:3:"iso";a:1:{i:1;s:2:"es";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:2:"et";a:8:{s:8:"language";s:2:"et";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-18 06:44:22";s:12:"english_name";s:8:"Estonian";s:11:"native_name";s:5:"Eesti";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/et.zip";s:3:"iso";a:2:{i:1;s:2:"et";i:2;s:3:"est";}s:7:"strings";a:1:{s:8:"continue";s:6:"Jätka";}}s:2:"eu";a:8:{s:8:"language";s:2:"eu";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-03 10:31:09";s:12:"english_name";s:6:"Basque";s:11:"native_name";s:7:"Euskara";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/eu.zip";s:3:"iso";a:2:{i:1;s:2:"eu";i:2;s:3:"eus";}s:7:"strings";a:1:{s:8:"continue";s:8:"Jarraitu";}}s:5:"fa_IR";a:8:{s:8:"language";s:5:"fa_IR";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-01-31 19:24:20";s:12:"english_name";s:7:"Persian";s:11:"native_name";s:10:"فارسی";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/fa_IR.zip";s:3:"iso";a:2:{i:1;s:2:"fa";i:2;s:3:"fas";}s:7:"strings";a:1:{s:8:"continue";s:10:"ادامه";}}s:2:"fi";a:8:{s:8:"language";s:2:"fi";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-23 06:49:15";s:12:"english_name";s:7:"Finnish";s:11:"native_name";s:5:"Suomi";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/fi.zip";s:3:"iso";a:2:{i:1;s:2:"fi";i:2;s:3:"fin";}s:7:"strings";a:1:{s:8:"continue";s:5:"Jatka";}}s:5:"fr_BE";a:8:{s:8:"language";s:5:"fr_BE";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-08 13:47:35";s:12:"english_name";s:16:"French (Belgium)";s:11:"native_name";s:21:"Français de Belgique";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/fr_BE.zip";s:3:"iso";a:2:{i:1;s:2:"fr";i:2;s:3:"fra";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuer";}}s:5:"fr_FR";a:8:{s:8:"language";s:5:"fr_FR";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-08 17:19:17";s:12:"english_name";s:15:"French (France)";s:11:"native_name";s:9:"Français";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/fr_FR.zip";s:3:"iso";a:1:{i:1;s:2:"fr";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuer";}}s:5:"fr_CA";a:8:{s:8:"language";s:5:"fr_CA";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-09 02:16:19";s:12:"english_name";s:15:"French (Canada)";s:11:"native_name";s:19:"Français du Canada";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/fr_CA.zip";s:3:"iso";a:2:{i:1;s:2:"fr";i:2;s:3:"fra";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuer";}}s:2:"gd";a:8:{s:8:"language";s:2:"gd";s:7:"version";s:5:"4.3.3";s:7:"updated";s:19:"2015-09-24 15:25:30";s:12:"english_name";s:15:"Scottish Gaelic";s:11:"native_name";s:9:"Gàidhlig";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.3.3/gd.zip";s:3:"iso";a:3:{i:1;s:2:"gd";i:2;s:3:"gla";i:3;s:3:"gla";}s:7:"strings";a:1:{s:8:"continue";s:15:"Lean air adhart";}}s:5:"gl_ES";a:8:{s:8:"language";s:5:"gl_ES";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-01-13 16:48:03";s:12:"english_name";s:8:"Galician";s:11:"native_name";s:6:"Galego";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/gl_ES.zip";s:3:"iso";a:2:{i:1;s:2:"gl";i:2;s:3:"glg";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:3:"haz";a:8:{s:8:"language";s:3:"haz";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-05 00:59:09";s:12:"english_name";s:8:"Hazaragi";s:11:"native_name";s:15:"هزاره گی";s:7:"package";s:62:"https://downloads.wordpress.org/translation/core/4.4.2/haz.zip";s:3:"iso";a:1:{i:3;s:3:"haz";}s:7:"strings";a:1:{s:8:"continue";s:10:"ادامه";}}s:5:"he_IL";a:8:{s:8:"language";s:5:"he_IL";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-16 18:59:27";s:12:"english_name";s:6:"Hebrew";s:11:"native_name";s:16:"עִבְרִית";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/he_IL.zip";s:3:"iso";a:1:{i:1;s:2:"he";}s:7:"strings";a:1:{s:8:"continue";s:12:"להמשיך";}}s:5:"hi_IN";a:8:{s:8:"language";s:5:"hi_IN";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-31 09:54:46";s:12:"english_name";s:5:"Hindi";s:11:"native_name";s:18:"हिन्दी";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/hi_IN.zip";s:3:"iso";a:2:{i:1;s:2:"hi";i:2;s:3:"hin";}s:7:"strings";a:1:{s:8:"continue";s:12:"जारी";}}s:2:"hr";a:8:{s:8:"language";s:2:"hr";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-04 08:39:26";s:12:"english_name";s:8:"Croatian";s:11:"native_name";s:8:"Hrvatski";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/hr.zip";s:3:"iso";a:2:{i:1;s:2:"hr";i:2;s:3:"hrv";}s:7:"strings";a:1:{s:8:"continue";s:7:"Nastavi";}}s:5:"hu_HU";a:8:{s:8:"language";s:5:"hu_HU";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-03 14:37:42";s:12:"english_name";s:9:"Hungarian";s:11:"native_name";s:6:"Magyar";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/hu_HU.zip";s:3:"iso";a:2:{i:1;s:2:"hu";i:2;s:3:"hun";}s:7:"strings";a:1:{s:8:"continue";s:7:"Tovább";}}s:2:"hy";a:8:{s:8:"language";s:2:"hy";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-04 07:13:54";s:12:"english_name";s:8:"Armenian";s:11:"native_name";s:14:"Հայերեն";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/hy.zip";s:3:"iso";a:2:{i:1;s:2:"hy";i:2;s:3:"hye";}s:7:"strings";a:1:{s:8:"continue";s:20:"Շարունակել";}}s:5:"id_ID";a:8:{s:8:"language";s:5:"id_ID";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-21 16:17:50";s:12:"english_name";s:10:"Indonesian";s:11:"native_name";s:16:"Bahasa Indonesia";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/id_ID.zip";s:3:"iso";a:2:{i:1;s:2:"id";i:2;s:3:"ind";}s:7:"strings";a:1:{s:8:"continue";s:9:"Lanjutkan";}}s:5:"is_IS";a:8:{s:8:"language";s:5:"is_IS";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-08 00:20:24";s:12:"english_name";s:9:"Icelandic";s:11:"native_name";s:9:"Íslenska";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/is_IS.zip";s:3:"iso";a:2:{i:1;s:2:"is";i:2;s:3:"isl";}s:7:"strings";a:1:{s:8:"continue";s:6:"Áfram";}}s:5:"it_IT";a:8:{s:8:"language";s:5:"it_IT";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-13 13:43:58";s:12:"english_name";s:7:"Italian";s:11:"native_name";s:8:"Italiano";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/it_IT.zip";s:3:"iso";a:2:{i:1;s:2:"it";i:2;s:3:"ita";}s:7:"strings";a:1:{s:8:"continue";s:8:"Continua";}}s:2:"ja";a:8:{s:8:"language";s:2:"ja";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-25 13:08:14";s:12:"english_name";s:8:"Japanese";s:11:"native_name";s:9:"日本語";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/ja.zip";s:3:"iso";a:1:{i:1;s:2:"ja";}s:7:"strings";a:1:{s:8:"continue";s:9:"続ける";}}s:5:"ka_GE";a:8:{s:8:"language";s:5:"ka_GE";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-09 08:53:31";s:12:"english_name";s:8:"Georgian";s:11:"native_name";s:21:"ქართული";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/ka_GE.zip";s:3:"iso";a:2:{i:1;s:2:"ka";i:2;s:3:"kat";}s:7:"strings";a:1:{s:8:"continue";s:30:"გაგრძელება";}}s:5:"ko_KR";a:8:{s:8:"language";s:5:"ko_KR";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-24 00:12:01";s:12:"english_name";s:6:"Korean";s:11:"native_name";s:9:"한국어";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/ko_KR.zip";s:3:"iso";a:2:{i:1;s:2:"ko";i:2;s:3:"kor";}s:7:"strings";a:1:{s:8:"continue";s:6:"계속";}}s:5:"lt_LT";a:8:{s:8:"language";s:5:"lt_LT";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-08 20:07:24";s:12:"english_name";s:10:"Lithuanian";s:11:"native_name";s:15:"Lietuvių kalba";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/lt_LT.zip";s:3:"iso";a:2:{i:1;s:2:"lt";i:2;s:3:"lit";}s:7:"strings";a:1:{s:8:"continue";s:6:"Tęsti";}}s:5:"ms_MY";a:8:{s:8:"language";s:5:"ms_MY";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-01-28 05:41:39";s:12:"english_name";s:5:"Malay";s:11:"native_name";s:13:"Bahasa Melayu";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/ms_MY.zip";s:3:"iso";a:2:{i:1;s:2:"ms";i:2;s:3:"msa";}s:7:"strings";a:1:{s:8:"continue";s:8:"Teruskan";}}s:5:"my_MM";a:8:{s:8:"language";s:5:"my_MM";s:7:"version";s:6:"4.1.10";s:7:"updated";s:19:"2015-03-26 15:57:42";s:12:"english_name";s:17:"Myanmar (Burmese)";s:11:"native_name";s:15:"ဗမာစာ";s:7:"package";s:65:"https://downloads.wordpress.org/translation/core/4.1.10/my_MM.zip";s:3:"iso";a:2:{i:1;s:2:"my";i:2;s:3:"mya";}s:7:"strings";a:1:{s:8:"continue";s:54:"ဆက်လက်လုပ်ေဆာင်ပါ။";}}s:5:"nb_NO";a:8:{s:8:"language";s:5:"nb_NO";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-07 10:01:09";s:12:"english_name";s:19:"Norwegian (Bokmål)";s:11:"native_name";s:13:"Norsk bokmål";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/nb_NO.zip";s:3:"iso";a:2:{i:1;s:2:"nb";i:2;s:3:"nob";}s:7:"strings";a:1:{s:8:"continue";s:8:"Fortsett";}}s:12:"nl_NL_formal";a:8:{s:8:"language";s:12:"nl_NL_formal";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-01-20 13:35:50";s:12:"english_name";s:14:"Dutch (Formal)";s:11:"native_name";s:20:"Nederlands (Formeel)";s:7:"package";s:71:"https://downloads.wordpress.org/translation/core/4.4.2/nl_NL_formal.zip";s:3:"iso";a:2:{i:1;s:2:"nl";i:2;s:3:"nld";}s:7:"strings";a:1:{s:8:"continue";s:8:"Doorgaan";}}s:5:"nl_NL";a:8:{s:8:"language";s:5:"nl_NL";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-23 18:59:13";s:12:"english_name";s:5:"Dutch";s:11:"native_name";s:10:"Nederlands";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/nl_NL.zip";s:3:"iso";a:2:{i:1;s:2:"nl";i:2;s:3:"nld";}s:7:"strings";a:1:{s:8:"continue";s:8:"Doorgaan";}}s:5:"nn_NO";a:8:{s:8:"language";s:5:"nn_NO";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-14 12:19:44";s:12:"english_name";s:19:"Norwegian (Nynorsk)";s:11:"native_name";s:13:"Norsk nynorsk";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/nn_NO.zip";s:3:"iso";a:2:{i:1;s:2:"nn";i:2;s:3:"nno";}s:7:"strings";a:1:{s:8:"continue";s:9:"Hald fram";}}s:3:"oci";a:8:{s:8:"language";s:3:"oci";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-08 16:21:37";s:12:"english_name";s:7:"Occitan";s:11:"native_name";s:7:"Occitan";s:7:"package";s:62:"https://downloads.wordpress.org/translation/core/4.4.2/oci.zip";s:3:"iso";a:2:{i:1;s:2:"oc";i:2;s:3:"oci";}s:7:"strings";a:1:{s:8:"continue";s:9:"Contunhar";}}s:5:"pl_PL";a:8:{s:8:"language";s:5:"pl_PL";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-24 15:31:29";s:12:"english_name";s:6:"Polish";s:11:"native_name";s:6:"Polski";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/pl_PL.zip";s:3:"iso";a:2:{i:1;s:2:"pl";i:2;s:3:"pol";}s:7:"strings";a:1:{s:8:"continue";s:9:"Kontynuuj";}}s:2:"ps";a:8:{s:8:"language";s:2:"ps";s:7:"version";s:6:"4.1.10";s:7:"updated";s:19:"2015-03-29 22:19:48";s:12:"english_name";s:6:"Pashto";s:11:"native_name";s:8:"پښتو";s:7:"package";s:62:"https://downloads.wordpress.org/translation/core/4.1.10/ps.zip";s:3:"iso";a:2:{i:1;s:2:"ps";i:2;s:3:"pus";}s:7:"strings";a:1:{s:8:"continue";s:8:"دوام";}}s:5:"pt_BR";a:8:{s:8:"language";s:5:"pt_BR";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-03 17:32:29";s:12:"english_name";s:19:"Portuguese (Brazil)";s:11:"native_name";s:20:"Português do Brasil";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/pt_BR.zip";s:3:"iso";a:2:{i:1;s:2:"pt";i:2;s:3:"por";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"pt_PT";a:8:{s:8:"language";s:5:"pt_PT";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-31 09:56:22";s:12:"english_name";s:21:"Portuguese (Portugal)";s:11:"native_name";s:10:"Português";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/pt_PT.zip";s:3:"iso";a:1:{i:1;s:2:"pt";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuar";}}s:5:"ro_RO";a:8:{s:8:"language";s:5:"ro_RO";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-31 14:58:13";s:12:"english_name";s:8:"Romanian";s:11:"native_name";s:8:"Română";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/ro_RO.zip";s:3:"iso";a:2:{i:1;s:2:"ro";i:2;s:3:"ron";}s:7:"strings";a:1:{s:8:"continue";s:9:"Continuă";}}s:5:"ru_RU";a:8:{s:8:"language";s:5:"ru_RU";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-03-21 18:23:26";s:12:"english_name";s:7:"Russian";s:11:"native_name";s:14:"Русский";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/ru_RU.zip";s:3:"iso";a:2:{i:1;s:2:"ru";i:2;s:3:"rus";}s:7:"strings";a:1:{s:8:"continue";s:20:"Продолжить";}}s:5:"sk_SK";a:8:{s:8:"language";s:5:"sk_SK";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-26 11:29:13";s:12:"english_name";s:6:"Slovak";s:11:"native_name";s:11:"Slovenčina";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/sk_SK.zip";s:3:"iso";a:2:{i:1;s:2:"sk";i:2;s:3:"slk";}s:7:"strings";a:1:{s:8:"continue";s:12:"Pokračovať";}}s:5:"sl_SI";a:8:{s:8:"language";s:5:"sl_SI";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-11-26 00:00:18";s:12:"english_name";s:9:"Slovenian";s:11:"native_name";s:13:"Slovenščina";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/sl_SI.zip";s:3:"iso";a:2:{i:1;s:2:"sl";i:2;s:3:"slv";}s:7:"strings";a:1:{s:8:"continue";s:10:"Nadaljujte";}}s:2:"sq";a:8:{s:8:"language";s:2:"sq";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-02-23 10:30:30";s:12:"english_name";s:8:"Albanian";s:11:"native_name";s:5:"Shqip";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/sq.zip";s:3:"iso";a:2:{i:1;s:2:"sq";i:2;s:3:"sqi";}s:7:"strings";a:1:{s:8:"continue";s:6:"Vazhdo";}}s:5:"sr_RS";a:8:{s:8:"language";s:5:"sr_RS";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-09 09:09:51";s:12:"english_name";s:7:"Serbian";s:11:"native_name";s:23:"Српски језик";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/sr_RS.zip";s:3:"iso";a:2:{i:1;s:2:"sr";i:2;s:3:"srp";}s:7:"strings";a:1:{s:8:"continue";s:14:"Настави";}}s:5:"sv_SE";a:8:{s:8:"language";s:5:"sv_SE";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-08 23:28:56";s:12:"english_name";s:7:"Swedish";s:11:"native_name";s:7:"Svenska";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/sv_SE.zip";s:3:"iso";a:2:{i:1;s:2:"sv";i:2;s:3:"swe";}s:7:"strings";a:1:{s:8:"continue";s:9:"Fortsätt";}}s:2:"th";a:8:{s:8:"language";s:2:"th";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-08 03:22:55";s:12:"english_name";s:4:"Thai";s:11:"native_name";s:9:"ไทย";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/th.zip";s:3:"iso";a:2:{i:1;s:2:"th";i:2;s:3:"tha";}s:7:"strings";a:1:{s:8:"continue";s:15:"ต่อไป";}}s:2:"tl";a:8:{s:8:"language";s:2:"tl";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-11-27 15:51:36";s:12:"english_name";s:7:"Tagalog";s:11:"native_name";s:7:"Tagalog";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/tl.zip";s:3:"iso";a:2:{i:1;s:2:"tl";i:2;s:3:"tgl";}s:7:"strings";a:1:{s:8:"continue";s:10:"Magpatuloy";}}s:5:"tr_TR";a:8:{s:8:"language";s:5:"tr_TR";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-17 23:12:27";s:12:"english_name";s:7:"Turkish";s:11:"native_name";s:8:"Türkçe";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/tr_TR.zip";s:3:"iso";a:2:{i:1;s:2:"tr";i:2;s:3:"tur";}s:7:"strings";a:1:{s:8:"continue";s:5:"Devam";}}s:5:"ug_CN";a:8:{s:8:"language";s:5:"ug_CN";s:7:"version";s:6:"4.1.10";s:7:"updated";s:19:"2015-03-26 16:45:38";s:12:"english_name";s:6:"Uighur";s:11:"native_name";s:9:"Uyƣurqə";s:7:"package";s:65:"https://downloads.wordpress.org/translation/core/4.1.10/ug_CN.zip";s:3:"iso";a:2:{i:1;s:2:"ug";i:2;s:3:"uig";}s:7:"strings";a:1:{s:8:"continue";s:26:"داۋاملاشتۇرۇش";}}s:2:"uk";a:8:{s:8:"language";s:2:"uk";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2016-01-03 22:04:41";s:12:"english_name";s:9:"Ukrainian";s:11:"native_name";s:20:"Українська";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/uk.zip";s:3:"iso";a:2:{i:1;s:2:"uk";i:2;s:3:"ukr";}s:7:"strings";a:1:{s:8:"continue";s:20:"Продовжити";}}s:2:"vi";a:8:{s:8:"language";s:2:"vi";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-09 01:01:25";s:12:"english_name";s:10:"Vietnamese";s:11:"native_name";s:14:"Tiếng Việt";s:7:"package";s:61:"https://downloads.wordpress.org/translation/core/4.4.2/vi.zip";s:3:"iso";a:2:{i:1;s:2:"vi";i:2;s:3:"vie";}s:7:"strings";a:1:{s:8:"continue";s:12:"Tiếp tục";}}s:5:"zh_TW";a:8:{s:8:"language";s:5:"zh_TW";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-11 18:51:41";s:12:"english_name";s:16:"Chinese (Taiwan)";s:11:"native_name";s:12:"繁體中文";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/zh_TW.zip";s:3:"iso";a:2:{i:1;s:2:"zh";i:2;s:3:"zho";}s:7:"strings";a:1:{s:8:"continue";s:6:"繼續";}}s:5:"zh_CN";a:8:{s:8:"language";s:5:"zh_CN";s:7:"version";s:5:"4.4.2";s:7:"updated";s:19:"2015-12-12 22:55:08";s:12:"english_name";s:15:"Chinese (China)";s:11:"native_name";s:12:"简体中文";s:7:"package";s:64:"https://downloads.wordpress.org/translation/core/4.4.2/zh_CN.zip";s:3:"iso";a:2:{i:1;s:2:"zh";i:2;s:3:"zho";}s:7:"strings";a:1:{s:8:"continue";s:6:"继续";}}}', 'yes'),
(1848, '_site_transient_timeout_poptags_40cd750bba9870f18aada2478b24840a', '1459765074', 'yes'),
(1849, '_site_transient_poptags_40cd750bba9870f18aada2478b24840a', 'a:100:{s:6:"widget";a:3:{s:4:"name";s:6:"widget";s:4:"slug";s:6:"widget";s:5:"count";s:4:"5800";}s:4:"post";a:3:{s:4:"name";s:4:"Post";s:4:"slug";s:4:"post";s:5:"count";s:4:"3598";}s:6:"plugin";a:3:{s:4:"name";s:6:"plugin";s:4:"slug";s:6:"plugin";s:5:"count";s:4:"3560";}s:5:"admin";a:3:{s:4:"name";s:5:"admin";s:4:"slug";s:5:"admin";s:5:"count";s:4:"3071";}s:5:"posts";a:3:{s:4:"name";s:5:"posts";s:4:"slug";s:5:"posts";s:5:"count";s:4:"2756";}s:9:"shortcode";a:3:{s:4:"name";s:9:"shortcode";s:4:"slug";s:9:"shortcode";s:5:"count";s:4:"2287";}s:7:"sidebar";a:3:{s:4:"name";s:7:"sidebar";s:4:"slug";s:7:"sidebar";s:5:"count";s:4:"2191";}s:6:"google";a:3:{s:4:"name";s:6:"google";s:4:"slug";s:6:"google";s:5:"count";s:4:"2062";}s:7:"twitter";a:3:{s:4:"name";s:7:"twitter";s:4:"slug";s:7:"twitter";s:5:"count";s:4:"2009";}s:4:"page";a:3:{s:4:"name";s:4:"page";s:4:"slug";s:4:"page";s:5:"count";s:4:"1981";}s:6:"images";a:3:{s:4:"name";s:6:"images";s:4:"slug";s:6:"images";s:5:"count";s:4:"1967";}s:8:"comments";a:3:{s:4:"name";s:8:"comments";s:4:"slug";s:8:"comments";s:5:"count";s:4:"1922";}s:5:"image";a:3:{s:4:"name";s:5:"image";s:4:"slug";s:5:"image";s:5:"count";s:4:"1843";}s:8:"facebook";a:3:{s:4:"name";s:8:"Facebook";s:4:"slug";s:8:"facebook";s:5:"count";s:4:"1654";}s:11:"woocommerce";a:3:{s:4:"name";s:11:"woocommerce";s:4:"slug";s:11:"woocommerce";s:5:"count";s:4:"1572";}s:3:"seo";a:3:{s:4:"name";s:3:"seo";s:4:"slug";s:3:"seo";s:5:"count";s:4:"1549";}s:9:"wordpress";a:3:{s:4:"name";s:9:"wordpress";s:4:"slug";s:9:"wordpress";s:5:"count";s:4:"1523";}s:6:"social";a:3:{s:4:"name";s:6:"social";s:4:"slug";s:6:"social";s:5:"count";s:4:"1351";}s:7:"gallery";a:3:{s:4:"name";s:7:"gallery";s:4:"slug";s:7:"gallery";s:5:"count";s:4:"1292";}s:5:"links";a:3:{s:4:"name";s:5:"links";s:4:"slug";s:5:"links";s:5:"count";s:4:"1276";}s:5:"email";a:3:{s:4:"name";s:5:"email";s:4:"slug";s:5:"email";s:5:"count";s:4:"1194";}s:7:"widgets";a:3:{s:4:"name";s:7:"widgets";s:4:"slug";s:7:"widgets";s:5:"count";s:4:"1091";}s:5:"pages";a:3:{s:4:"name";s:5:"pages";s:4:"slug";s:5:"pages";s:5:"count";s:4:"1056";}s:6:"jquery";a:3:{s:4:"name";s:6:"jquery";s:4:"slug";s:6:"jquery";s:5:"count";s:4:"1002";}s:5:"media";a:3:{s:4:"name";s:5:"media";s:4:"slug";s:5:"media";s:5:"count";s:3:"965";}s:9:"ecommerce";a:3:{s:4:"name";s:9:"ecommerce";s:4:"slug";s:9:"ecommerce";s:5:"count";s:3:"949";}s:3:"rss";a:3:{s:4:"name";s:3:"rss";s:4:"slug";s:3:"rss";s:5:"count";s:3:"909";}s:5:"video";a:3:{s:4:"name";s:5:"video";s:4:"slug";s:5:"video";s:5:"count";s:3:"901";}s:4:"ajax";a:3:{s:4:"name";s:4:"AJAX";s:4:"slug";s:4:"ajax";s:5:"count";s:3:"900";}s:7:"content";a:3:{s:4:"name";s:7:"content";s:4:"slug";s:7:"content";s:5:"count";s:3:"887";}s:5:"login";a:3:{s:4:"name";s:5:"login";s:4:"slug";s:5:"login";s:5:"count";s:3:"882";}s:10:"javascript";a:3:{s:4:"name";s:10:"javascript";s:4:"slug";s:10:"javascript";s:5:"count";s:3:"828";}s:10:"responsive";a:3:{s:4:"name";s:10:"responsive";s:4:"slug";s:10:"responsive";s:5:"count";s:3:"806";}s:10:"buddypress";a:3:{s:4:"name";s:10:"buddypress";s:4:"slug";s:10:"buddypress";s:5:"count";s:3:"786";}s:8:"security";a:3:{s:4:"name";s:8:"security";s:4:"slug";s:8:"security";s:5:"count";s:3:"758";}s:5:"photo";a:3:{s:4:"name";s:5:"photo";s:4:"slug";s:5:"photo";s:5:"count";s:3:"753";}s:10:"e-commerce";a:3:{s:4:"name";s:10:"e-commerce";s:4:"slug";s:10:"e-commerce";s:5:"count";s:3:"748";}s:4:"feed";a:3:{s:4:"name";s:4:"feed";s:4:"slug";s:4:"feed";s:5:"count";s:3:"741";}s:7:"youtube";a:3:{s:4:"name";s:7:"youtube";s:4:"slug";s:7:"youtube";s:5:"count";s:3:"741";}s:4:"spam";a:3:{s:4:"name";s:4:"spam";s:4:"slug";s:4:"spam";s:5:"count";s:3:"740";}s:5:"share";a:3:{s:4:"name";s:5:"Share";s:4:"slug";s:5:"share";s:5:"count";s:3:"733";}s:4:"link";a:3:{s:4:"name";s:4:"link";s:4:"slug";s:4:"link";s:5:"count";s:3:"731";}s:8:"category";a:3:{s:4:"name";s:8:"category";s:4:"slug";s:8:"category";s:5:"count";s:3:"693";}s:6:"photos";a:3:{s:4:"name";s:6:"photos";s:4:"slug";s:6:"photos";s:5:"count";s:3:"686";}s:9:"analytics";a:3:{s:4:"name";s:9:"analytics";s:4:"slug";s:9:"analytics";s:5:"count";s:3:"678";}s:5:"embed";a:3:{s:4:"name";s:5:"embed";s:4:"slug";s:5:"embed";s:5:"count";s:3:"675";}s:3:"css";a:3:{s:4:"name";s:3:"CSS";s:4:"slug";s:3:"css";s:5:"count";s:3:"670";}s:4:"form";a:3:{s:4:"name";s:4:"form";s:4:"slug";s:4:"form";s:5:"count";s:3:"666";}s:6:"search";a:3:{s:4:"name";s:6:"search";s:4:"slug";s:6:"search";s:5:"count";s:3:"649";}s:6:"slider";a:3:{s:4:"name";s:6:"slider";s:4:"slug";s:6:"slider";s:5:"count";s:3:"640";}s:9:"slideshow";a:3:{s:4:"name";s:9:"slideshow";s:4:"slug";s:9:"slideshow";s:5:"count";s:3:"638";}s:6:"custom";a:3:{s:4:"name";s:6:"custom";s:4:"slug";s:6:"custom";s:5:"count";s:3:"632";}s:5:"stats";a:3:{s:4:"name";s:5:"stats";s:4:"slug";s:5:"stats";s:5:"count";s:3:"610";}s:6:"button";a:3:{s:4:"name";s:6:"button";s:4:"slug";s:6:"button";s:5:"count";s:3:"602";}s:7:"comment";a:3:{s:4:"name";s:7:"comment";s:4:"slug";s:7:"comment";s:5:"count";s:3:"594";}s:5:"theme";a:3:{s:4:"name";s:5:"theme";s:4:"slug";s:5:"theme";s:5:"count";s:3:"589";}s:4:"menu";a:3:{s:4:"name";s:4:"menu";s:4:"slug";s:4:"menu";s:5:"count";s:3:"588";}s:4:"tags";a:3:{s:4:"name";s:4:"tags";s:4:"slug";s:4:"tags";s:5:"count";s:3:"585";}s:9:"dashboard";a:3:{s:4:"name";s:9:"dashboard";s:4:"slug";s:9:"dashboard";s:5:"count";s:3:"585";}s:10:"categories";a:3:{s:4:"name";s:10:"categories";s:4:"slug";s:10:"categories";s:5:"count";s:3:"574";}s:6:"mobile";a:3:{s:4:"name";s:6:"mobile";s:4:"slug";s:6:"mobile";s:5:"count";s:3:"566";}s:10:"statistics";a:3:{s:4:"name";s:10:"statistics";s:4:"slug";s:10:"statistics";s:5:"count";s:3:"558";}s:3:"ads";a:3:{s:4:"name";s:3:"ads";s:4:"slug";s:3:"ads";s:5:"count";s:3:"553";}s:4:"user";a:3:{s:4:"name";s:4:"user";s:4:"slug";s:4:"user";s:5:"count";s:3:"544";}s:6:"editor";a:3:{s:4:"name";s:6:"editor";s:4:"slug";s:6:"editor";s:5:"count";s:3:"540";}s:5:"users";a:3:{s:4:"name";s:5:"users";s:4:"slug";s:5:"users";s:5:"count";s:3:"528";}s:4:"list";a:3:{s:4:"name";s:4:"list";s:4:"slug";s:4:"list";s:5:"count";s:3:"524";}s:7:"picture";a:3:{s:4:"name";s:7:"picture";s:4:"slug";s:7:"picture";s:5:"count";s:3:"513";}s:7:"plugins";a:3:{s:4:"name";s:7:"plugins";s:4:"slug";s:7:"plugins";s:5:"count";s:3:"510";}s:9:"affiliate";a:3:{s:4:"name";s:9:"affiliate";s:4:"slug";s:9:"affiliate";s:5:"count";s:3:"509";}s:6:"simple";a:3:{s:4:"name";s:6:"simple";s:4:"slug";s:6:"simple";s:5:"count";s:3:"496";}s:9:"multisite";a:3:{s:4:"name";s:9:"multisite";s:4:"slug";s:9:"multisite";s:5:"count";s:3:"496";}s:12:"social-media";a:3:{s:4:"name";s:12:"social media";s:4:"slug";s:12:"social-media";s:5:"count";s:3:"494";}s:12:"contact-form";a:3:{s:4:"name";s:12:"contact form";s:4:"slug";s:12:"contact-form";s:5:"count";s:3:"486";}s:7:"contact";a:3:{s:4:"name";s:7:"contact";s:4:"slug";s:7:"contact";s:5:"count";s:3:"469";}s:8:"pictures";a:3:{s:4:"name";s:8:"pictures";s:4:"slug";s:8:"pictures";s:5:"count";s:3:"457";}s:4:"shop";a:3:{s:4:"name";s:4:"shop";s:4:"slug";s:4:"shop";s:5:"count";s:3:"453";}s:3:"api";a:3:{s:4:"name";s:3:"api";s:4:"slug";s:3:"api";s:5:"count";s:3:"439";}s:3:"url";a:3:{s:4:"name";s:3:"url";s:4:"slug";s:3:"url";s:5:"count";s:3:"439";}s:10:"navigation";a:3:{s:4:"name";s:10:"navigation";s:4:"slug";s:10:"navigation";s:5:"count";s:3:"437";}s:9:"marketing";a:3:{s:4:"name";s:9:"marketing";s:4:"slug";s:9:"marketing";s:5:"count";s:3:"437";}s:4:"html";a:3:{s:4:"name";s:4:"html";s:4:"slug";s:4:"html";s:5:"count";s:3:"436";}s:5:"flash";a:3:{s:4:"name";s:5:"flash";s:4:"slug";s:5:"flash";s:5:"count";s:3:"423";}s:4:"meta";a:3:{s:4:"name";s:4:"meta";s:4:"slug";s:4:"meta";s:5:"count";s:3:"418";}s:10:"newsletter";a:3:{s:4:"name";s:10:"newsletter";s:4:"slug";s:10:"newsletter";s:5:"count";s:3:"415";}s:6:"events";a:3:{s:4:"name";s:6:"events";s:4:"slug";s:6:"events";s:5:"count";s:3:"414";}s:8:"calendar";a:3:{s:4:"name";s:8:"calendar";s:4:"slug";s:8:"calendar";s:5:"count";s:3:"410";}s:8:"tracking";a:3:{s:4:"name";s:8:"tracking";s:4:"slug";s:8:"tracking";s:5:"count";s:3:"407";}s:4:"news";a:3:{s:4:"name";s:4:"News";s:4:"slug";s:4:"news";s:5:"count";s:3:"405";}s:3:"tag";a:3:{s:4:"name";s:3:"tag";s:4:"slug";s:3:"tag";s:5:"count";s:3:"405";}s:11:"advertising";a:3:{s:4:"name";s:11:"advertising";s:4:"slug";s:11:"advertising";s:5:"count";s:3:"399";}s:10:"shortcodes";a:3:{s:4:"name";s:10:"shortcodes";s:4:"slug";s:10:"shortcodes";s:5:"count";s:3:"396";}s:9:"thumbnail";a:3:{s:4:"name";s:9:"thumbnail";s:4:"slug";s:9:"thumbnail";s:5:"count";s:3:"392";}s:7:"sharing";a:3:{s:4:"name";s:7:"sharing";s:4:"slug";s:7:"sharing";s:5:"count";s:3:"388";}s:6:"upload";a:3:{s:4:"name";s:6:"upload";s:4:"slug";s:6:"upload";s:5:"count";s:3:"388";}s:6:"paypal";a:3:{s:4:"name";s:6:"paypal";s:4:"slug";s:6:"paypal";s:5:"count";s:3:"388";}s:12:"notification";a:3:{s:4:"name";s:12:"notification";s:4:"slug";s:12:"notification";s:5:"count";s:3:"388";}s:4:"text";a:3:{s:4:"name";s:4:"text";s:4:"slug";s:4:"text";s:5:"count";s:3:"388";}s:4:"code";a:3:{s:4:"name";s:4:"code";s:4:"slug";s:4:"code";s:5:"count";s:3:"386";}s:8:"lightbox";a:3:{s:4:"name";s:8:"lightbox";s:4:"slug";s:8:"lightbox";s:5:"count";s:3:"384";}}', 'yes'),
(1854, 'pc_robotstxt', 'a:2:{s:11:"user_agents";s:26:"User-agent: *\r\nDisallow: /";s:15:"remove_settings";b:1;}', 'yes'),
(1857, '_site_transient_timeout_theme_roots', '1459823986', 'yes'),
(1858, '_site_transient_theme_roots', 'a:4:{s:16:"rtlcbsasia-theme";s:7:"/themes";s:13:"twentyfifteen";s:7:"/themes";s:14:"twentyfourteen";s:7:"/themes";s:14:"twentythirteen";s:7:"/themes";}', 'yes'),
(1859, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1459822192;s:7:"checked";a:4:{s:16:"rtlcbsasia-theme";s:3:"1.0";s:13:"twentyfifteen";s:3:"1.3";s:14:"twentyfourteen";s:3:"1.5";s:14:"twentythirteen";s:3:"1.6";}s:8:"response";a:3:{s:13:"twentyfifteen";a:4:{s:5:"theme";s:13:"twentyfifteen";s:11:"new_version";s:3:"1.4";s:3:"url";s:43:"https://wordpress.org/themes/twentyfifteen/";s:7:"package";s:59:"https://downloads.wordpress.org/theme/twentyfifteen.1.4.zip";}s:14:"twentyfourteen";a:4:{s:5:"theme";s:14:"twentyfourteen";s:11:"new_version";s:3:"1.6";s:3:"url";s:44:"https://wordpress.org/themes/twentyfourteen/";s:7:"package";s:60:"https://downloads.wordpress.org/theme/twentyfourteen.1.6.zip";}s:14:"twentythirteen";a:4:{s:5:"theme";s:14:"twentythirteen";s:11:"new_version";s:3:"1.7";s:3:"url";s:44:"https://wordpress.org/themes/twentythirteen/";s:7:"package";s:60:"https://downloads.wordpress.org/theme/twentythirteen.1.7.zip";}}s:12:"translations";a:0:{}}', 'yes'),
(1860, '_site_transient_update_plugins', 'O:8:"stdClass":4:{s:12:"last_checked";i:1459822190;s:8:"response";a:1:{s:45:"ewww-image-optimizer/ewww-image-optimizer.php";O:8:"stdClass":8:{s:2:"id";s:5:"32121";s:4:"slug";s:20:"ewww-image-optimizer";s:6:"plugin";s:45:"ewww-image-optimizer/ewww-image-optimizer.php";s:11:"new_version";s:5:"2.7.1";s:3:"url";s:51:"https://wordpress.org/plugins/ewww-image-optimizer/";s:7:"package";s:69:"https://downloads.wordpress.org/plugin/ewww-image-optimizer.2.7.1.zip";s:6:"tested";s:3:"4.5";s:13:"compatibility";b:0;}}s:12:"translations";a:0:{}s:9:"no_update";a:8:{s:33:"admin-menu-editor/menu-editor.php";O:8:"stdClass":6:{s:2:"id";s:5:"11743";s:4:"slug";s:17:"admin-menu-editor";s:6:"plugin";s:33:"admin-menu-editor/menu-editor.php";s:11:"new_version";s:3:"1.5";s:3:"url";s:48:"https://wordpress.org/plugins/admin-menu-editor/";s:7:"package";s:64:"https://downloads.wordpress.org/plugin/admin-menu-editor.1.5.zip";}s:30:"advanced-custom-fields/acf.php";O:8:"stdClass":6:{s:2:"id";s:5:"21367";s:4:"slug";s:22:"advanced-custom-fields";s:6:"plugin";s:30:"advanced-custom-fields/acf.php";s:11:"new_version";s:5:"4.4.5";s:3:"url";s:53:"https://wordpress.org/plugins/advanced-custom-fields/";s:7:"package";s:71:"https://downloads.wordpress.org/plugin/advanced-custom-fields.4.4.5.zip";}s:37:"download-manager/download-manager.php";O:8:"stdClass":6:{s:2:"id";s:5:"12879";s:4:"slug";s:16:"download-manager";s:6:"plugin";s:37:"download-manager/download-manager.php";s:11:"new_version";s:6:"2.8.93";s:3:"url";s:47:"https://wordpress.org/plugins/download-manager/";s:7:"package";s:59:"https://downloads.wordpress.org/plugin/download-manager.zip";}s:43:"exports-and-reports/exports-and-reports.php";O:8:"stdClass":6:{s:2:"id";s:5:"15875";s:4:"slug";s:19:"exports-and-reports";s:6:"plugin";s:43:"exports-and-reports/exports-and-reports.php";s:11:"new_version";s:5:"0.7.2";s:3:"url";s:50:"https://wordpress.org/plugins/exports-and-reports/";s:7:"package";s:68:"https://downloads.wordpress.org/plugin/exports-and-reports.0.7.2.zip";}s:55:"global-admin-bar-hide-or-remove/hide-admin-tool-bar.php";O:8:"stdClass":7:{s:2:"id";s:5:"20838";s:4:"slug";s:31:"global-admin-bar-hide-or-remove";s:6:"plugin";s:55:"global-admin-bar-hide-or-remove/hide-admin-tool-bar.php";s:11:"new_version";s:7:"1.6.1.1";s:3:"url";s:62:"https://wordpress.org/plugins/global-admin-bar-hide-or-remove/";s:7:"package";s:82:"https://downloads.wordpress.org/plugin/global-admin-bar-hide-or-remove.1.6.1.1.zip";s:14:"upgrade_notice";s:119:"Update [STABLE] Plugin repackaging and refreshing before merging to new 2016 branche and bugs fixing (Build 2016-01-05)";}s:43:"lh-password-changer/lh-password-changer.php";O:8:"stdClass":6:{s:2:"id";s:5:"62842";s:4:"slug";s:19:"lh-password-changer";s:6:"plugin";s:43:"lh-password-changer/lh-password-changer.php";s:11:"new_version";s:4:"1.40";s:3:"url";s:50:"https://wordpress.org/plugins/lh-password-changer/";s:7:"package";s:62:"https://downloads.wordpress.org/plugin/lh-password-changer.zip";}s:29:"pc-robotstxt/pc-robotstxt.php";O:8:"stdClass":6:{s:2:"id";s:4:"8516";s:4:"slug";s:12:"pc-robotstxt";s:6:"plugin";s:29:"pc-robotstxt/pc-robotstxt.php";s:11:"new_version";s:3:"1.4";s:3:"url";s:43:"https://wordpress.org/plugins/pc-robotstxt/";s:7:"package";s:55:"https://downloads.wordpress.org/plugin/pc-robotstxt.zip";}s:53:"wpfront-user-role-editor/wpfront-user-role-editor.php";O:8:"stdClass":7:{s:2:"id";s:5:"48417";s:4:"slug";s:24:"wpfront-user-role-editor";s:6:"plugin";s:53:"wpfront-user-role-editor/wpfront-user-role-editor.php";s:11:"new_version";s:6:"2.12.4";s:3:"url";s:55:"https://wordpress.org/plugins/wpfront-user-role-editor/";s:7:"package";s:74:"https://downloads.wordpress.org/plugin/wpfront-user-role-editor.2.12.4.zip";s:14:"upgrade_notice";s:20:"Plugin conflict fix.";}}}', 'yes'),
(1862, '_site_transient_timeout_browser_233ad652087736912443d1a3d96aba95', '1460430075', 'yes'),
(1863, '_site_transient_browser_233ad652087736912443d1a3d96aba95', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:13:"49.0.2623.110";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(1864, '_transient_timeout_dash_88ae138922fe95674369b1cb3d215a2b', '1459868509', 'no'),
(1865, '_transient_dash_88ae138922fe95674369b1cb3d215a2b', '<div class="rss-widget"><p><strong>RSS Error</strong>: WP HTTP Error: Operation timed out after 0 milliseconds with 0 out of 0 bytes received</p></div><div class="rss-widget"><p><strong>RSS Error</strong>: WP HTTP Error: Operation timed out after 10000 milliseconds with 0 bytes received</p></div><div class="rss-widget"><ul></ul></div>', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_pmxe_exports`
--

CREATE TABLE IF NOT EXISTS `rtl21016_pmxe_exports` (
`id` bigint(20) unsigned NOT NULL,
  `attch_id` bigint(20) unsigned NOT NULL,
  `options` longtext COLLATE utf8mb4_unicode_ci,
  `scheduled` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `registered_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `friendly_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `exported` bigint(20) NOT NULL DEFAULT '0',
  `canceled` tinyint(1) NOT NULL DEFAULT '0',
  `canceled_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `settings_update_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_activity` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `processing` tinyint(1) NOT NULL DEFAULT '0',
  `executing` tinyint(1) NOT NULL DEFAULT '0',
  `triggered` tinyint(1) NOT NULL DEFAULT '0',
  `iteration` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_pmxe_posts`
--

CREATE TABLE IF NOT EXISTS `rtl21016_pmxe_posts` (
`id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `export_id` bigint(20) unsigned NOT NULL,
  `iteration` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_pmxe_templates`
--

CREATE TABLE IF NOT EXISTS `rtl21016_pmxe_templates` (
`id` bigint(20) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `options` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_postmeta`
--

CREATE TABLE IF NOT EXISTS `rtl21016_postmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2662 ;

--
-- Dumping data for table `rtl21016_postmeta`
--

INSERT INTO `rtl21016_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(83, 15, '_edit_lock', '1458023826:1'),
(84, 15, '_edit_last', '1'),
(372, 42, '_edit_lock', '1459393377:1'),
(373, 42, '_edit_last', '1'),
(375, 42, '__wpdm_package_dir', ''),
(376, 42, '__wpdm_publish_date', ''),
(377, 42, '__wpdm_expire_date', ''),
(378, 42, '__wpdm_files', 'a:85:{s:13:"1459150676157";s:38:"1459150676wpdm_show-1-featured-img.jpg";s:13:"1459148666124";s:35:"SCP-keyart-horiz-minilayers203i.psd";s:13:"1459148681797";s:23:"SCP-epi0203-D0149bi.jpg";s:13:"1459148682982";s:23:"SCP-epi0203-D0485bi.jpg";s:13:"1459148684236";s:23:"SCP-epi0203-D0542bi.jpg";s:13:"1459148685643";s:28:"SCP-BTS-epi0201-D2798bxi.jpg";s:13:"1459148686906";s:23:"SCP-epi0201-D0074bi.jpg";s:13:"1459148688277";s:23:"SCP-epi0201-D0162bi.jpg";s:13:"1459148689273";s:23:"SCP-epi0201-D0198bi.jpg";s:13:"1459148691085";s:23:"SCP-epi0201-D0524bi.jpg";s:13:"1459148691983";s:23:"SCP-epi0201-D0565bi.jpg";s:13:"1459148692743";s:23:"SCP-epi0201-D0599bi.jpg";s:13:"1459148693575";s:23:"SCP-epi0201-D0749bi.jpg";s:13:"1459148694487";s:23:"SCP-epi0201-D0870bi.jpg";s:13:"1459148695395";s:23:"SCP-epi0201-D0912bi.jpg";s:13:"1459148696193";s:23:"SCP-epi0201-D0990bi.jpg";s:13:"1459148697017";s:23:"SCP-epi0201-D1057bi.jpg";s:13:"1459148697795";s:23:"SCP-epi0201-D1466bi.jpg";s:13:"1459148698548";s:23:"SCP-epi0201-D1708bi.jpg";s:13:"1459148699303";s:23:"SCP-epi0201-D1736bi.jpg";s:13:"1459148700160";s:23:"SCP-epi0201-D2752bi.jpg";s:13:"1459148701131";s:23:"SCP-epi0202-D0495bi.jpg";s:13:"1459148702228";s:23:"SCP-epi0202-D0532bi.jpg";s:13:"1459148703130";s:23:"SCP-epi0202-D0862bi.jpg";s:13:"1459148704124";s:23:"SCP-epi0202-D0967bi.jpg";s:13:"1459148705314";s:23:"SCP-epi0202-D0978bi.jpg";s:13:"1459148706322";s:23:"SCP-epi0203-D0017bi.jpg";s:13:"1459148707442";s:23:"SCP-epi0203-D0048bi.jpg";s:13:"1459148708466";s:23:"SCP-epi0203-D0062bi.jpg";s:13:"1459148709605";s:23:"SCP-epi0203-D0077bi.jpg";s:13:"1459148710660";s:23:"SCP-epi0203-D0083bi.jpg";s:13:"1459148711530";s:23:"SCP-epi0203-D0123bi.jpg";s:13:"1459148712303";s:28:"Scorpion_SFG_Meme_FanBoy.jpg";s:13:"1459148713100";s:39:"Scorpion_SFG_Meme_PattyPrankenstein.jpg";s:13:"1459148713889";s:33:"Scorpion_SFG_Meme_SuperFunGuy.jpg";s:13:"1459148714759";s:32:"Scorpion_SFG_Meme_TheGiggler.jpg";s:13:"1459148715605";s:34:"Scorpion_SFG_Meme_WhimsicalBoy.jpg";s:13:"1459148716551";s:31:"Scorpion_SFG_Meme_ZaneyZoey.jpg";s:13:"1459148717492";s:25:"Scorpion_SFG_poster_6.jpg";s:13:"1459148718245";s:19:"SCP-mcpheebio01.pdf";s:13:"1459148719003";s:19:"SCP-obrienbio01.pdf";s:13:"1459148719769";s:17:"SCP-orcibio01.pdf";s:13:"1459148720580";s:20:"SCP-patrickbio01.pdf";s:13:"1459148721516";s:18:"SCP-prodinfo01.pdf";s:13:"1459148722627";s:20:"SCP-santorabio01.pdf";s:13:"1459148724147";s:20:"SCP-stidhambio01.pdf";i:0;s:19:"SCP-thomasbio01.pdf";s:13:"1459148726076";s:17:"SCP-wongbio01.pdf";s:13:"1459148726958";s:20:"SCP-woottonbio01.pdf";s:13:"1459148727888";s:23:"Scorpion Fact Sheet.pdf";s:13:"1459148728936";s:33:"1459148730wpdm_SCP-braunbio01.pdf";i:1;s:18:"SCP-gabelbio01.pdf";i:2;s:18:"SCP-kadinbio01.pdf";s:13:"1459148731601";s:21:"SCP-kurtzmanbio01.pdf";s:13:"1459148732466";s:16:"SCP-linbio01.pdf";s:13:"1459148733786";s:24:"SCP-S02-Synopsis0206.pdf";s:13:"1459148735072";s:24:"SCP-S02-Synopsis0207.pdf";s:13:"1459148736110";s:24:"SCP-S02-Synopsis0208.pdf";s:13:"1459148737149";s:24:"SCP-S02-Synopsis0209.pdf";s:13:"1459148738051";s:24:"SCP-S02-Synopsis0210.pdf";s:13:"1459148739291";s:24:"SCP-S02-Synopsis0211.pdf";s:13:"1459148740095";s:24:"SCP-S02-Synopsis0212.pdf";s:13:"1459148740950";s:24:"SCP-S02-Synopsis0213.pdf";s:13:"1459148741910";s:24:"SCP-S02-Synopsis0214.pdf";s:13:"1459148743048";s:24:"SCP-S02-Synopsis0201.pdf";s:13:"1459148744233";s:24:"SCP-S02-Synopsis0202.pdf";s:13:"1459148745019";s:24:"SCP-S02-Synopsis0203.pdf";s:13:"1459148745793";s:24:"SCP-S02-Synopsis0204.pdf";s:13:"1459148746556";s:24:"SCP-S02-Synopsis0205.pdf";s:13:"1459148747307";s:45:"SCP_S1_FirstLookCBSSIEPK_Part1_Transcript.doc";s:13:"1459148748080";s:45:"SCP_S1_FirstLookCBSSIEPK_Part2_Transcript.doc";s:13:"1459143307030";s:21:"SCP-logoblack101i.jpg";s:13:"1459143308054";s:21:"SCP-logoblack101i.png";s:13:"1459143309118";s:21:"SCP-logocolor102i.eps";s:13:"1459143309906";s:21:"SCP-logocolor102i.jpg";s:13:"1459143310614";s:21:"SCP-logocolor102i.png";s:13:"1459143311430";s:21:"SCP-logowhite103i.eps";s:13:"1459143312254";s:21:"SCP-logowhite103i.png";s:13:"1459143312951";s:25:"SCP-logoblack101i (1).png";s:13:"1459143313895";s:21:"SCP-logoblack101i.eps";s:13:"1459142784603";s:27:"SCP-keyart-horiz-TT202i.jpg";s:13:"1459142785989";s:31:"SCP-keyart-horiz-TT-TAG202i.jpg";s:13:"1459142790369";s:24:"SCP-keyart-horiz201i.jpg";s:13:"1459142808385";s:24:"SCP-keyart-horiz201i.tif";s:13:"1459142816334";s:35:"SCP-keyart-horiz-minilayers203i.jpg";}'),
(379, 42, '__wpdm_fileinfo', 'a:85:{s:13:"1459150676157";a:2:{s:5:"title";s:42:"KEY 1459150676wpdm_show-1-featured-img.jpg";s:8:"password";s:0:"";}s:13:"1459148666124";a:2:{s:5:"title";s:35:"SCP-keyart-horiz-minilayers203i.psd";s:8:"password";s:0:"";}s:13:"1459148681797";a:2:{s:5:"title";s:23:"SCP-epi0203-D0149bi.jpg";s:8:"password";s:0:"";}s:13:"1459148682982";a:2:{s:5:"title";s:23:"SCP-epi0203-D0485bi.jpg";s:8:"password";s:0:"";}s:13:"1459148684236";a:2:{s:5:"title";s:23:"SCP-epi0203-D0542bi.jpg";s:8:"password";s:0:"";}s:13:"1459148685643";a:2:{s:5:"title";s:28:"SCP-BTS-epi0201-D2798bxi.jpg";s:8:"password";s:0:"";}s:13:"1459148686906";a:2:{s:5:"title";s:23:"SCP-epi0201-D0074bi.jpg";s:8:"password";s:0:"";}s:13:"1459148688277";a:2:{s:5:"title";s:23:"SCP-epi0201-D0162bi.jpg";s:8:"password";s:0:"";}s:13:"1459148689273";a:2:{s:5:"title";s:23:"SCP-epi0201-D0198bi.jpg";s:8:"password";s:0:"";}s:13:"1459148691085";a:2:{s:5:"title";s:23:"SCP-epi0201-D0524bi.jpg";s:8:"password";s:0:"";}s:13:"1459148691983";a:2:{s:5:"title";s:23:"SCP-epi0201-D0565bi.jpg";s:8:"password";s:0:"";}s:13:"1459148692743";a:2:{s:5:"title";s:23:"SCP-epi0201-D0599bi.jpg";s:8:"password";s:0:"";}s:13:"1459148693575";a:2:{s:5:"title";s:23:"SCP-epi0201-D0749bi.jpg";s:8:"password";s:0:"";}s:13:"1459148694487";a:2:{s:5:"title";s:23:"SCP-epi0201-D0870bi.jpg";s:8:"password";s:0:"";}s:13:"1459148695395";a:2:{s:5:"title";s:23:"SCP-epi0201-D0912bi.jpg";s:8:"password";s:0:"";}s:13:"1459148696193";a:2:{s:5:"title";s:23:"SCP-epi0201-D0990bi.jpg";s:8:"password";s:0:"";}s:13:"1459148697017";a:2:{s:5:"title";s:23:"SCP-epi0201-D1057bi.jpg";s:8:"password";s:0:"";}s:13:"1459148697795";a:2:{s:5:"title";s:23:"SCP-epi0201-D1466bi.jpg";s:8:"password";s:0:"";}s:13:"1459148698548";a:2:{s:5:"title";s:23:"SCP-epi0201-D1708bi.jpg";s:8:"password";s:0:"";}s:13:"1459148699303";a:2:{s:5:"title";s:23:"SCP-epi0201-D1736bi.jpg";s:8:"password";s:0:"";}s:13:"1459148700160";a:2:{s:5:"title";s:23:"SCP-epi0201-D2752bi.jpg";s:8:"password";s:0:"";}s:13:"1459148701131";a:2:{s:5:"title";s:23:"SCP-epi0202-D0495bi.jpg";s:8:"password";s:0:"";}s:13:"1459148702228";a:2:{s:5:"title";s:23:"SCP-epi0202-D0532bi.jpg";s:8:"password";s:0:"";}s:13:"1459148703130";a:2:{s:5:"title";s:23:"SCP-epi0202-D0862bi.jpg";s:8:"password";s:0:"";}s:13:"1459148704124";a:2:{s:5:"title";s:23:"SCP-epi0202-D0967bi.jpg";s:8:"password";s:0:"";}s:13:"1459148705314";a:2:{s:5:"title";s:23:"SCP-epi0202-D0978bi.jpg";s:8:"password";s:0:"";}s:13:"1459148706322";a:2:{s:5:"title";s:23:"SCP-epi0203-D0017bi.jpg";s:8:"password";s:0:"";}s:13:"1459148707442";a:2:{s:5:"title";s:23:"SCP-epi0203-D0048bi.jpg";s:8:"password";s:0:"";}s:13:"1459148708466";a:2:{s:5:"title";s:23:"SCP-epi0203-D0062bi.jpg";s:8:"password";s:0:"";}s:13:"1459148709605";a:2:{s:5:"title";s:23:"SCP-epi0203-D0077bi.jpg";s:8:"password";s:0:"";}s:13:"1459148710660";a:2:{s:5:"title";s:23:"SCP-epi0203-D0083bi.jpg";s:8:"password";s:0:"";}s:13:"1459148711530";a:2:{s:5:"title";s:23:"SCP-epi0203-D0123bi.jpg";s:8:"password";s:0:"";}s:13:"1459148712303";a:2:{s:5:"title";s:28:"Scorpion_SFG_Meme_FanBoy.jpg";s:8:"password";s:0:"";}s:13:"1459148713100";a:2:{s:5:"title";s:39:"Scorpion_SFG_Meme_PattyPrankenstein.jpg";s:8:"password";s:0:"";}s:13:"1459148713889";a:2:{s:5:"title";s:33:"Scorpion_SFG_Meme_SuperFunGuy.jpg";s:8:"password";s:0:"";}s:13:"1459148714759";a:2:{s:5:"title";s:32:"Scorpion_SFG_Meme_TheGiggler.jpg";s:8:"password";s:0:"";}s:13:"1459148715605";a:2:{s:5:"title";s:34:"Scorpion_SFG_Meme_WhimsicalBoy.jpg";s:8:"password";s:0:"";}s:13:"1459148716551";a:2:{s:5:"title";s:31:"Scorpion_SFG_Meme_ZaneyZoey.jpg";s:8:"password";s:0:"";}s:13:"1459148717492";a:2:{s:5:"title";s:25:"Scorpion_SFG_poster_6.jpg";s:8:"password";s:0:"";}s:13:"1459148718245";a:2:{s:5:"title";s:19:"SCP-mcpheebio01.pdf";s:8:"password";s:0:"";}s:13:"1459148719003";a:2:{s:5:"title";s:19:"SCP-obrienbio01.pdf";s:8:"password";s:0:"";}s:13:"1459148719769";a:2:{s:5:"title";s:17:"SCP-orcibio01.pdf";s:8:"password";s:0:"";}s:13:"1459148720580";a:2:{s:5:"title";s:20:"SCP-patrickbio01.pdf";s:8:"password";s:0:"";}s:13:"1459148721516";a:2:{s:5:"title";s:18:"SCP-prodinfo01.pdf";s:8:"password";s:0:"";}s:13:"1459148722627";a:2:{s:5:"title";s:20:"SCP-santorabio01.pdf";s:8:"password";s:0:"";}s:13:"1459148724147";a:2:{s:5:"title";s:20:"SCP-stidhambio01.pdf";s:8:"password";s:0:"";}i:0;a:2:{s:5:"title";s:0:"";s:8:"password";s:0:"";}s:13:"1459148726076";a:2:{s:5:"title";s:17:"SCP-wongbio01.pdf";s:8:"password";s:0:"";}s:13:"1459148726958";a:2:{s:5:"title";s:20:"SCP-woottonbio01.pdf";s:8:"password";s:0:"";}s:13:"1459148727888";a:2:{s:5:"title";s:23:"Scorpion Fact Sheet.pdf";s:8:"password";s:0:"";}s:13:"1459148728936";a:2:{s:5:"title";s:33:"1459148730wpdm_SCP-braunbio01.pdf";s:8:"password";s:0:"";}i:1;a:2:{s:5:"title";s:0:"";s:8:"password";s:0:"";}i:2;a:2:{s:5:"title";s:0:"";s:8:"password";s:0:"";}s:13:"1459148731601";a:2:{s:5:"title";s:21:"SCP-kurtzmanbio01.pdf";s:8:"password";s:0:"";}s:13:"1459148732466";a:2:{s:5:"title";s:16:"SCP-linbio01.pdf";s:8:"password";s:0:"";}s:13:"1459148733786";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0206.pdf";s:8:"password";s:0:"";}s:13:"1459148735072";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0207.pdf";s:8:"password";s:0:"";}s:13:"1459148736110";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0208.pdf";s:8:"password";s:0:"";}s:13:"1459148737149";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0209.pdf";s:8:"password";s:0:"";}s:13:"1459148738051";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0210.pdf";s:8:"password";s:0:"";}s:13:"1459148739291";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0211.pdf";s:8:"password";s:0:"";}s:13:"1459148740095";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0212.pdf";s:8:"password";s:0:"";}s:13:"1459148740950";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0213.pdf";s:8:"password";s:0:"";}s:13:"1459148741910";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0214.pdf";s:8:"password";s:0:"";}s:13:"1459148743048";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0201.pdf";s:8:"password";s:0:"";}s:13:"1459148744233";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0202.pdf";s:8:"password";s:0:"";}s:13:"1459148745019";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0203.pdf";s:8:"password";s:0:"";}s:13:"1459148745793";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0204.pdf";s:8:"password";s:0:"";}s:13:"1459148746556";a:2:{s:5:"title";s:24:"SCP-S02-Synopsis0205.pdf";s:8:"password";s:0:"";}s:13:"1459148747307";a:2:{s:5:"title";s:45:"SCP_S1_FirstLookCBSSIEPK_Part1_Transcript.doc";s:8:"password";s:0:"";}s:13:"1459148748080";a:2:{s:5:"title";s:45:"SCP_S1_FirstLookCBSSIEPK_Part2_Transcript.doc";s:8:"password";s:0:"";}s:13:"1459143307030";a:2:{s:5:"title";s:21:"SCP-logoblack101i.jpg";s:8:"password";s:0:"";}s:13:"1459143308054";a:2:{s:5:"title";s:21:"SCP-logoblack101i.png";s:8:"password";s:0:"";}s:13:"1459143309118";a:2:{s:5:"title";s:21:"SCP-logocolor102i.eps";s:8:"password";s:0:"";}s:13:"1459143309906";a:2:{s:5:"title";s:21:"SCP-logocolor102i.jpg";s:8:"password";s:0:"";}s:13:"1459143310614";a:2:{s:5:"title";s:21:"SCP-logocolor102i.png";s:8:"password";s:0:"";}s:13:"1459143311430";a:2:{s:5:"title";s:21:"SCP-logowhite103i.eps";s:8:"password";s:0:"";}s:13:"1459143312254";a:2:{s:5:"title";s:21:"SCP-logowhite103i.png";s:8:"password";s:0:"";}s:13:"1459143312951";a:2:{s:5:"title";s:25:"SCP-logoblack101i (1).png";s:8:"password";s:0:"";}s:13:"1459143313895";a:2:{s:5:"title";s:21:"SCP-logoblack101i.eps";s:8:"password";s:0:"";}s:13:"1459142784603";a:2:{s:5:"title";s:27:"SCP-keyart-horiz-TT202i.jpg";s:8:"password";s:0:"";}s:13:"1459142785989";a:2:{s:5:"title";s:31:"SCP-keyart-horiz-TT-TAG202i.jpg";s:8:"password";s:0:"";}s:13:"1459142790369";a:2:{s:5:"title";s:24:"SCP-keyart-horiz201i.jpg";s:8:"password";s:0:"";}s:13:"1459142808385";a:2:{s:5:"title";s:24:"SCP-keyart-horiz201i.tif";s:8:"password";s:0:"";}s:13:"1459142816334";a:2:{s:5:"title";s:35:"SCP-keyart-horiz-minilayers203i.jpg";s:8:"password";s:0:"";}}'),
(380, 42, '__wpdm_version', ''),
(381, 42, '__wpdm_link_label', ''),
(382, 42, '__wpdm_quota', ''),
(383, 42, '__wpdm_download_limit_per_user', ''),
(384, 42, '__wpdm_view_count', '1130'),
(385, 42, '__wpdm_download_count', '3'),
(386, 42, '__wpdm_package_size', '619.81 KB'),
(387, 42, '__wpdm_access', 'a:1:{i:0;s:5:"guest";}'),
(388, 42, '__wpdm_individual_file_download', '-1'),
(389, 42, '__wpdm_cache_zip', '-1'),
(390, 42, '__wpdm_template', 'link-template-rtlcbscustom.php'),
(391, 42, '__wpdm_page_template', 'page-template-custom.php'),
(392, 42, '__wpdm_password', '123'),
(393, 42, '__wpdm_password_usage_limit', ''),
(394, 42, '__wpdm_linkedin_message', ''),
(395, 42, '__wpdm_linkedin_url', ''),
(396, 42, '__wpdm_tweet_message', ''),
(397, 42, '__wpdm_google_plus_1', ''),
(398, 42, '__wpdm_twitter_handle', ''),
(399, 42, '__wpdm_facebook_like', ''),
(400, 42, '__wpdm_email_lock_idl', '0'),
(401, 42, '__wpdm_icon', ''),
(408, 46, '_wp_attached_file', '2016/02/SCP-keyart-horiz-minilayers203i.jpg'),
(409, 46, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:925;s:6:"height";i:288;s:4:"file";s:43:"2016/02/SCP-keyart-horiz-minilayers203i.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:43:"SCP-keyart-horiz-minilayers203i-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:42:"SCP-keyart-horiz-minilayers203i-300x93.jpg";s:5:"width";i:300;s:6:"height";i:93;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:43:"SCP-keyart-horiz-minilayers203i-768x239.jpg";s:5:"width";i:768;s:6:"height";i:239;s:9:"mime-type";s:10:"image/jpeg";}s:14:"post-thumbnail";a:4:{s:4:"file";s:43:"SCP-keyart-horiz-minilayers203i-604x270.jpg";s:5:"width";i:604;s:6:"height";i:270;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(562, 67, '_edit_lock', '1459306078:1'),
(563, 67, '_edit_last', '1'),
(565, 67, 'field_56bda94b2303c', 'a:14:{s:3:"key";s:19:"field_56bda94b2303c";s:5:"label";s:4:"Cast";s:4:"name";s:4:"cast";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"html";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:3;}'),
(566, 67, 'field_56bda9692303d', 'a:13:{s:3:"key";s:19:"field_56bda9692303d";s:5:"label";s:11:"Promo Files";s:4:"name";s:15:"add_promo_files";s:4:"type";s:8:"repeater";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:10:"sub_fields";a:14:{i:0;a:14:{s:3:"key";s:19:"field_56bda97f2303e";s:5:"label";s:14:"Promo Category";s:4:"name";s:8:"category";s:4:"type";s:5:"radio";s:12:"instructions";s:0:"";s:8:"required";s:1:"1";s:12:"column_width";s:2:"10";s:7:"choices";a:2:{s:6:"On-Air";s:6:"On-Air";s:6:"Social";s:6:"Social";}s:12:"other_choice";s:1:"0";s:17:"save_other_choice";s:1:"0";s:13:"default_value";s:6:"On-Air";s:6:"layout";s:10:"horizontal";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:0;}i:1;a:12:{s:3:"key";s:19:"field_56bda9b52303f";s:5:"label";s:11:"Upload Date";s:4:"name";s:11:"upload_date";s:4:"type";s:11:"date_picker";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:0:"";s:11:"date_format";s:6:"yymmdd";s:14:"display_format";s:8:"dd/mm/yy";s:9:"first_day";s:1:"1";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:1;}i:2;a:15:{s:3:"key";s:19:"field_56bda9eb23040";s:5:"label";s:9:"Unique ID";s:4:"name";s:2:"id";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:1:"1";s:12:"column_width";s:2:"10";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"html";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:2;}i:3;a:12:{s:3:"key";s:19:"field_56bda9fc23041";s:5:"label";s:11:"Promo Start";s:4:"name";s:11:"promo_start";s:4:"type";s:11:"date_picker";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:0:"";s:11:"date_format";s:6:"yymmdd";s:14:"display_format";s:8:"dd/mm/yy";s:9:"first_day";s:1:"1";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:3;}i:4;a:12:{s:3:"key";s:19:"field_56bdaa1123042";s:5:"label";s:9:"Promo End";s:4:"name";s:9:"promo_end";s:4:"type";s:11:"date_picker";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:0:"";s:11:"date_format";s:6:"yymmdd";s:14:"display_format";s:8:"dd/mm/yy";s:9:"first_day";s:1:"1";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:4;}i:5;a:15:{s:3:"key";s:19:"field_56bdaa2523043";s:5:"label";s:9:"File Name";s:4:"name";s:9:"file_name";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:0:"";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"html";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:5;}i:6;a:15:{s:3:"key";s:19:"field_56bdaa2e23044";s:5:"label";s:10:"Program TX";s:4:"name";s:10:"program_tx";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:0:"";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"html";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:6;}i:7;a:15:{s:3:"key";s:19:"field_56bdaa3923045";s:5:"label";s:19:"Prog Title / Stunts";s:4:"name";s:17:"prog_title_stunts";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:0:"";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"html";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:7;}i:8;a:15:{s:3:"key";s:19:"field_56bdaa4d23046";s:5:"label";s:3:"Ver";s:4:"name";s:7:"version";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:0:"";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"html";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:8;}i:9;a:15:{s:3:"key";s:19:"field_56bdaa5723047";s:5:"label";s:3:"Dur";s:4:"name";s:8:"duration";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:0:"";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"html";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:9;}i:10;a:15:{s:3:"key";s:19:"field_56bdaa6223048";s:5:"label";s:5:"Notes";s:4:"name";s:5:"notes";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:0:"";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"html";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:10;}i:11;a:11:{s:3:"key";s:19:"field_56bdaa6e23049";s:5:"label";s:13:"Attached File";s:4:"name";s:13:"attached_file";s:4:"type";s:4:"file";s:12:"instructions";s:0:"";s:8:"required";s:1:"1";s:12:"column_width";s:0:"";s:11:"save_format";s:3:"url";s:7:"library";s:3:"all";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:11;}i:12;a:12:{s:3:"key";s:19:"field_56cc2f84bbefe";s:5:"label";s:9:"Thumbnail";s:4:"name";s:9:"thumbnail";s:4:"type";s:5:"image";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:0:"";s:11:"save_format";s:3:"url";s:12:"preview_size";s:9:"thumbnail";s:7:"library";s:3:"all";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:12;}i:13;a:13:{s:3:"key";s:19:"field_56de395d8068d";s:5:"label";s:14:"Operator Group";s:4:"name";s:14:"operator_group";s:4:"type";s:6:"select";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:12:"column_width";s:0:"";s:7:"choices";a:9:{s:3:"all";s:13:"All Operators";s:7:"Singtel";s:7:"Singtel";s:7:"StarHub";s:7:"StarHub";s:5:"nowTV";s:5:"nowTV";s:5:"LeEco";s:5:"LeEco";s:11:"TrueVisions";s:11:"TrueVisions";s:6:"HyppTV";s:6:"HyppTV";s:9:"K-Visions";s:9:"K-Visions";s:8:"SKYCable";s:8:"SKYCable";}s:13:"default_value";s:3:"all";s:10:"allow_null";s:1:"0";s:8:"multiple";s:1:"0";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56bda97f2303e";s:8:"operator";s:2:"==";s:5:"value";s:6:"On-Air";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:13;}}s:7:"row_min";s:0:"";s:9:"row_limit";s:0:"";s:6:"layout";s:5:"table";s:12:"button_label";s:7:"Add Row";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56ef6b6147e52";s:8:"operator";s:2:"==";s:5:"value";s:4:"left";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:5;}'),
(568, 67, 'position', 'normal'),
(569, 67, 'layout', 'no_box'),
(570, 67, 'hide_on_screen', 'a:5:{i:0;s:13:"custom_fields";i:1;s:8:"comments";i:2;s:9:"revisions";i:3;s:4:"tags";i:4;s:15:"send-trackbacks";}'),
(579, 42, 'show_reference_name', 'limitless5'),
(580, 42, '_show_reference_name', 'field_56bda92d2303b'),
(581, 42, 'cast', 'Elyes Gabel (Walter) Katharine McPhee (Paige) Eddie Kaye Thomas (Toby) Jadyn Wong (Happy) Ari Stidham (Sylvester) Robert Patrick (Cabe Gallo)'),
(582, 42, '_cast', 'field_56bda94b2303c'),
(583, 42, 'add_promo_files', '0'),
(584, 42, '_add_promo_files', 'field_56bda9692303d'),
(587, 42, '__wpdmx_user_download_count', 'a:1:{i:1;i:3;}'),
(669, 67, 'field_56c2e940f9c75', 'a:14:{s:3:"key";s:19:"field_56c2e940f9c75";s:5:"label";s:12:"Legal Notice";s:4:"name";s:12:"legal_notice";s:4:"type";s:4:"text";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:13:"default_value";s:124:"Legal Notice:When using materials (images, videos, etc) of this show, please use the following legal notice: ©2013 ABC Inc.";s:11:"placeholder";s:124:"Legal Notice:When using materials (images, videos, etc) of this show, please use the following legal notice: ©2013 ABC Inc.";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"none";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56de3ea34d42f";s:8:"operator";s:2:"==";s:5:"value";s:8:"featured";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:4;}'),
(690, 42, 'legal_notice', 'When using materials (images, videos, etc) of this show, please use the following legal notice: ©2013 ABC Inc.'),
(691, 42, '_legal_notice', 'field_56c2e940f9c75'),
(703, 42, '__wpdmkey_56c3f4a93332e', '8'),
(727, 1, '_edit_lock', '1455851046:1'),
(728, 8, '_edit_lock', '1458182982:1'),
(729, 8, '_edit_last', '1'),
(730, 8, '_wp_page_template', 'page-cart.php'),
(761, 15, '_wp_page_template', 'page-home.php'),
(850, 98, '_edit_lock', '1459390060:1'),
(851, 98, '_edit_last', '1'),
(852, 98, 'show_reference_name', 'entertainment-channel-materials'),
(853, 98, '_show_reference_name', 'field_56bda92d2303b'),
(854, 98, 'cast', ''),
(855, 98, '_cast', 'field_56bda94b2303c'),
(856, 98, 'legal_notice', ''),
(857, 98, '_legal_notice', 'field_56c2e940f9c75'),
(858, 98, 'add_promo_files', '6'),
(859, 98, '_add_promo_files', 'field_56bda9692303d'),
(860, 98, '__wpdm_package_dir', ''),
(861, 98, '__wpdm_publish_date', ''),
(862, 98, '__wpdm_expire_date', ''),
(864, 98, '__wpdm_fileinfo', 'a:24:{s:13:"1459317043271";a:2:{s:5:"title";s:58:"1459317043wpdm_Entertainment - January 2016 Highlights.pdf";s:8:"password";s:0:"";}s:13:"1459317041843";a:2:{s:5:"title";s:59:"1459317041wpdm_Entertainment - February 2016 Highlights.pdf";s:8:"password";s:0:"";}s:13:"1459317037433";a:2:{s:5:"title";s:68:"1459317037wpdm_RTLCBS_LogoCorporate_PRINT_whiteBG_Alpha_20130724.png";s:8:"password";s:0:"";}s:13:"1459317036421";a:2:{s:5:"title";s:67:"1459317036wpdm_RTLCBS_LogoCorporate_PRINT_darkBG_Alpha_20130724.png";s:8:"password";s:0:"";}s:13:"1459317035489";a:2:{s:5:"title";s:58:"1459317035wpdm_RTLCBS_Entertainment_whiteBG_solid_logo.png";s:8:"password";s:0:"";}s:13:"1459317034464";a:2:{s:5:"title";s:57:"1459317034wpdm_RTLCBS_Entertainment_darkbg_solid_logo.png";s:8:"password";s:0:"";}s:13:"1459317032776";a:2:{s:5:"title";s:59:"1459317032wpdm_16 01 09 Entertainment EPG February TWN.xlsx";s:8:"password";s:0:"";}s:13:"1459317031596";a:2:{s:5:"title";s:62:"1459317031wpdm_16 01 09 Entertainment EPG February Now TV.xlsx";s:8:"password";s:0:"";}s:13:"1459317030496";a:2:{s:5:"title";s:60:"1459317030wpdm_16 01 09 Entertainment EPG February LeTV.xlsx";s:8:"password";s:0:"";}s:13:"1459317029552";a:2:{s:5:"title";s:69:"1459317029wpdm_16 01 04 Entertainment EPG February EPG Affiliate.xlsx";s:8:"password";s:0:"";}s:13:"1459317028424";a:2:{s:5:"title";s:63:"1459317028wpdm_16 01 03 Entertainment EPG February Starhub.xlsx";s:8:"password";s:0:"";}s:13:"1459317027028";a:2:{s:5:"title";s:63:"1459317027wpdm_15 12 29 Entertainment EPG February Singtel.xlsx";s:8:"password";s:0:"";}s:13:"1459317025660";a:2:{s:5:"title";s:61:"1459317025wpdm_Brand and Advertising Guidelines - 11 Dec.pptx";s:8:"password";s:0:"";}s:13:"1459317024327";a:2:{s:5:"title";s:43:"1459317024wpdm_elements_xpress_us_white.png";s:8:"password";s:0:"";}s:13:"1459317022895";a:2:{s:5:"title";s:43:"1459317022wpdm_elements_xpress_us_black.png";s:8:"password";s:0:"";}s:13:"1459317021663";a:2:{s:5:"title";s:43:"1459317021wpdm_elements_xpress_uk_white.png";s:8:"password";s:0:"";}s:13:"1459317020539";a:2:{s:5:"title";s:43:"1459317020wpdm_elements_xpress_uk_black.png";s:8:"password";s:0:"";}s:13:"1459317019515";a:2:{s:5:"title";s:50:"1459317019wpdm_elements_horz_xpress_us_white_1.png";s:8:"password";s:0:"";}s:13:"1459317018499";a:2:{s:5:"title";s:50:"1459317018wpdm_elements_horz_xpress_us_black_1.png";s:8:"password";s:0:"";}s:13:"1459317017467";a:2:{s:5:"title";s:50:"1459317017wpdm_elements_horz_xpress_uk_white_1.png";s:8:"password";s:0:"";}s:13:"1459317016451";a:2:{s:5:"title";s:50:"1459317016wpdm_elements_horz_xpress_uk_black_1.png";s:8:"password";s:0:"";}s:13:"1459317015503";a:2:{s:5:"title";s:41:"1459317015wpdm_elements_FE_RedRibbon1.png";s:8:"password";s:0:"";}s:13:"1459317014602";a:2:{s:5:"title";s:42:"1459317014wpdm_elements_FE_FBlueRibbon.png";s:8:"password";s:0:"";}s:13:"1459317009382";a:2:{s:5:"title";s:72:"1459317009wpdm_Boilerplates - Network and channels - September 2015.docx";s:8:"password";s:0:"";}}'),
(865, 98, '__wpdm_version', ''),
(866, 98, '__wpdm_link_label', ''),
(867, 98, '__wpdm_quota', ''),
(868, 98, '__wpdm_download_limit_per_user', ''),
(869, 98, '__wpdm_view_count', '133'),
(870, 98, '__wpdm_download_count', '1'),
(871, 98, '__wpdm_package_size', '1.61 MB'),
(872, 98, '__wpdm_access', 'a:1:{i:0;s:5:"guest";}'),
(873, 98, '__wpdm_individual_file_download', '-1'),
(874, 98, '__wpdm_cache_zip', '-1'),
(875, 98, '__wpdm_template', 'link-template-rtlcbscustom.php'),
(876, 98, '__wpdm_page_template', 'page-template-custom-plain.php'),
(877, 98, '__wpdm_password', ''),
(878, 98, '__wpdm_password_usage_limit', ''),
(879, 98, '__wpdm_linkedin_message', ''),
(880, 98, '__wpdm_linkedin_url', ''),
(881, 98, '__wpdm_tweet_message', ''),
(882, 98, '__wpdm_google_plus_1', ''),
(883, 98, '__wpdm_twitter_handle', ''),
(884, 98, '__wpdm_facebook_like', ''),
(885, 98, '__wpdm_email_lock_idl', '0'),
(886, 98, '__wpdm_icon', ''),
(903, 102, '_edit_lock', '1458615416:1'),
(904, 102, '_edit_last', '1'),
(905, 102, '_wp_page_template', 'page-shows.php'),
(906, 98, '__wpdmx_user_download_count', 'a:1:{i:1;i:1;}'),
(909, 105, '_edit_lock', '1459304287:1'),
(910, 105, '_edit_last', '1'),
(911, 105, '_wp_page_template', 'page-login.php'),
(912, 107, '_edit_lock', '1456810998:1'),
(913, 107, '_edit_last', '1'),
(914, 107, '_wp_page_template', 'default'),
(918, 112, '_menu_item_type', 'post_type'),
(919, 112, '_menu_item_menu_item_parent', '0'),
(920, 112, '_menu_item_object_id', '15'),
(921, 112, '_menu_item_object', 'page'),
(922, 112, '_menu_item_target', ''),
(923, 112, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(924, 112, '_menu_item_xfn', ''),
(925, 112, '_menu_item_url', ''),
(927, 112, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(978, 118, '_menu_item_type', 'post_type'),
(979, 118, '_menu_item_menu_item_parent', '0'),
(980, 118, '_menu_item_object_id', '102'),
(981, 118, '_menu_item_object', 'page'),
(982, 118, '_menu_item_target', ''),
(983, 118, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(984, 118, '_menu_item_xfn', ''),
(985, 118, '_menu_item_url', ''),
(987, 118, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(1000, 67, 'field_56de3ea34d42f', 'a:11:{s:3:"key";s:19:"field_56de3ea34d42f";s:5:"label";s:13:"Featured Show";s:4:"name";s:13:"featured_show";s:4:"type";s:8:"checkbox";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:7:"choices";a:1:{s:8:"featured";s:13:"Featured Show";}s:13:"default_value";s:0:"";s:6:"layout";s:10:"horizontal";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:2;}'),
(1004, 42, 'featured_show', 'a:1:{i:0;s:8:"featured";}'),
(1005, 42, '_featured_show', 'field_56de3ea34d42f'),
(1021, 98, 'featured_show', ''),
(1022, 98, '_featured_show', 'field_56de3ea34d42f'),
(1024, 131, '_edit_lock', '1458184039:1'),
(1025, 131, '_edit_last', '1'),
(1027, 132, '_edit_last', '1'),
(1028, 132, '_wp_page_template', 'page-promos.php'),
(1029, 132, '_edit_lock', '1458282296:1'),
(1030, 134, '_menu_item_type', 'post_type'),
(1031, 134, '_menu_item_menu_item_parent', '0'),
(1032, 134, '_menu_item_object_id', '132'),
(1033, 134, '_menu_item_object', 'page'),
(1034, 134, '_menu_item_target', ''),
(1035, 134, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1036, 134, '_menu_item_xfn', ''),
(1037, 134, '_menu_item_url', ''),
(1039, 134, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(1050, 135, '_edit_lock', '1458023884:1'),
(1051, 135, '_edit_last', '1'),
(1052, 135, '_wp_page_template', 'page-extreme.php'),
(1053, 131, '_wp_page_template', 'page-channel-catalog.php'),
(1066, 140, '_edit_lock', '1458634203:1'),
(1067, 140, '_edit_last', '1'),
(1088, 143, '_menu_item_type', 'custom'),
(1089, 143, '_menu_item_menu_item_parent', '0'),
(1090, 143, '_menu_item_object_id', '143'),
(1091, 143, '_menu_item_object', 'custom'),
(1092, 143, '_menu_item_target', ''),
(1093, 143, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1094, 143, '_menu_item_xfn', ''),
(1095, 143, '_menu_item_url', 'http://192.168.1.167/rtlcbsasia/download/channel-materials-entertainment/'),
(1097, 143, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(1104, 67, 'field_56ebc7b848e7d', 'a:11:{s:3:"key";s:19:"field_56ebc7b848e7d";s:5:"label";s:12:"Banner Image";s:4:"name";s:12:"banner_image";s:4:"type";s:5:"image";s:12:"instructions";s:0:"";s:8:"required";s:1:"1";s:11:"save_format";s:3:"url";s:12:"preview_size";s:9:"thumbnail";s:7:"library";s:3:"all";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56de3ea34d42f";s:8:"operator";s:2:"==";s:5:"value";s:8:"featured";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:0;}'),
(1107, 42, 'banner_image', '195'),
(1108, 42, '_banner_image', 'field_56ebc7b848e7d'),
(1134, 67, 'field_56ef6b6147e52', 'a:13:{s:3:"key";s:19:"field_56ef6b6147e52";s:5:"label";s:21:"Banner Text Alignment";s:4:"name";s:21:"banner_text_alignment";s:4:"type";s:5:"radio";s:12:"instructions";s:0:"";s:8:"required";s:1:"0";s:7:"choices";a:2:{s:4:"left";s:12:"Left Aligned";s:5:"right";s:13:"Right Aligned";}s:12:"other_choice";s:1:"0";s:17:"save_other_choice";s:1:"0";s:13:"default_value";s:4:"left";s:6:"layout";s:10:"horizontal";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:19:"field_56de3ea34d42f";s:8:"operator";s:2:"==";s:5:"value";s:8:"featured";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:1;}'),
(1141, 42, 'banner_info_alignment', 'right'),
(1142, 42, '_banner_info_alignment', 'field_56ef6b6147e52'),
(1145, 42, 'banner_text_alignment', 'left'),
(1146, 42, '_banner_text_alignment', 'field_56ef6b6147e52'),
(1278, 155, '_menu_item_type', 'post_type'),
(1279, 155, '_menu_item_menu_item_parent', '0'),
(1280, 155, '_menu_item_object_id', '15'),
(1281, 155, '_menu_item_object', 'page'),
(1282, 155, '_menu_item_target', ''),
(1283, 155, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1284, 155, '_menu_item_xfn', ''),
(1285, 155, '_menu_item_url', ''),
(1287, 155, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(1288, 156, '_menu_item_type', 'post_type'),
(1289, 156, '_menu_item_menu_item_parent', '0'),
(1290, 156, '_menu_item_object_id', '8'),
(1291, 156, '_menu_item_object', 'page'),
(1292, 156, '_menu_item_target', ''),
(1293, 156, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1294, 156, '_menu_item_xfn', ''),
(1295, 156, '_menu_item_url', ''),
(1297, 156, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(1298, 157, '_edit_last', '1'),
(1299, 157, '_wp_page_template', 'default'),
(1300, 157, '_edit_lock', '1458703397:1'),
(1301, 159, '_menu_item_type', 'post_type'),
(1302, 159, '_menu_item_menu_item_parent', '0'),
(1303, 159, '_menu_item_object_id', '157'),
(1304, 159, '_menu_item_object', 'page'),
(1305, 159, '_menu_item_target', ''),
(1306, 159, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1307, 159, '_menu_item_xfn', ''),
(1308, 159, '_menu_item_url', ''),
(1310, 159, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(1311, 160, '_menu_item_type', 'custom'),
(1312, 160, '_menu_item_menu_item_parent', '0'),
(1313, 160, '_menu_item_object_id', '160'),
(1314, 160, '_menu_item_object', 'custom'),
(1315, 160, '_menu_item_target', ''),
(1316, 160, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1317, 160, '_menu_item_xfn', ''),
(1318, 160, '_menu_item_url', 'http://192.168.1.167/rtlcbsasia/?channel=entertainment'),
(1320, 160, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(1321, 161, '_menu_item_type', 'custom'),
(1322, 161, '_menu_item_menu_item_parent', '0'),
(1323, 161, '_menu_item_object_id', '161'),
(1324, 161, '_menu_item_object', 'custom'),
(1325, 161, '_menu_item_target', ''),
(1326, 161, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1327, 161, '_menu_item_xfn', ''),
(1328, 161, '_menu_item_url', 'http://192.168.1.167/rtlcbsasia/?channel=extreme'),
(1330, 161, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(1331, 42, '_thumbnail_id', '46'),
(1333, 162, '_wp_attached_file', '2016/02/RTLCBS_Entertainment_darkbg_solid.png'),
(1334, 162, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:2248;s:6:"height";i:625;s:4:"file";s:45:"2016/02/RTLCBS_Entertainment_darkbg_solid.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:45:"RTLCBS_Entertainment_darkbg_solid-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:44:"RTLCBS_Entertainment_darkbg_solid-300x83.png";s:5:"width";i:300;s:6:"height";i:83;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:45:"RTLCBS_Entertainment_darkbg_solid-768x214.png";s:5:"width";i:768;s:6:"height";i:214;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:46:"RTLCBS_Entertainment_darkbg_solid-1024x285.png";s:5:"width";i:1024;s:6:"height";i:285;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1335, 163, '_wp_attached_file', '2016/02/RTLCBS_Entertainment_whiteBG_solid.png'),
(1336, 163, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:2248;s:6:"height";i:625;s:4:"file";s:46:"2016/02/RTLCBS_Entertainment_whiteBG_solid.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:4:{s:4:"file";s:46:"RTLCBS_Entertainment_whiteBG_solid-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:45:"RTLCBS_Entertainment_whiteBG_solid-300x83.png";s:5:"width";i:300;s:6:"height";i:83;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:46:"RTLCBS_Entertainment_whiteBG_solid-768x214.png";s:5:"width";i:768;s:6:"height";i:214;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:47:"RTLCBS_Entertainment_whiteBG_solid-1024x285.png";s:5:"width";i:1024;s:6:"height";i:285;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(1337, 98, '_thumbnail_id', '163'),
(1350, 167, '_wp_attached_file', '2016/03/LIM-keyart-horiz101i.jpg'),
(1351, 167, '_wp_attachment_metadata', 'a:6:{s:5:"width";i:3699;s:6:"height";i:1149;s:4:"file";s:32:"2016/03/LIM-keyart-horiz101i.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:5:{s:4:"file";s:32:"LIM-keyart-horiz101i-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:30:"Reduced by 7.5% (449.0&nbsp;B)";}s:6:"medium";a:5:{s:4:"file";s:31:"LIM-keyart-horiz101i-300x93.jpg";s:5:"width";i:300;s:6:"height";i:93;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:30:"Reduced by 8.1% (693.0&nbsp;B)";}s:12:"medium_large";a:5:{s:4:"file";s:32:"LIM-keyart-horiz101i-768x239.jpg";s:5:"width";i:768;s:6:"height";i:239;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:29:"Reduced by 5.1% (1.6&nbsp;kB)";}s:5:"large";a:5:{s:4:"file";s:33:"LIM-keyart-horiz101i-1024x318.jpg";s:5:"width";i:1024;s:6:"height";i:318;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:29:"Reduced by 4.6% (2.3&nbsp;kB)";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}s:20:"ewww_image_optimizer";s:32:"Reduced by 12.3% (307.2&nbsp;kB)";}'),
(1352, 168, '_wp_attached_file', '2016/03/LIM-keyart-vert-TT105i.jpg'),
(1353, 168, '_wp_attachment_metadata', 'a:6:{s:5:"width";i:3436;s:6:"height";i:5161;s:4:"file";s:34:"2016/03/LIM-keyart-vert-TT105i.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:5:{s:4:"file";s:34:"LIM-keyart-vert-TT105i-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:10:"No savings";}s:6:"medium";a:5:{s:4:"file";s:34:"LIM-keyart-vert-TT105i-200x300.jpg";s:5:"width";i:200;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:10:"No savings";}s:12:"medium_large";a:5:{s:4:"file";s:35:"LIM-keyart-vert-TT105i-768x1154.jpg";s:5:"width";i:768;s:6:"height";i:1154;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:10:"No savings";}s:5:"large";a:5:{s:4:"file";s:35:"LIM-keyart-vert-TT105i-682x1024.jpg";s:5:"width";i:682;s:6:"height";i:1024;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:10:"No savings";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}s:20:"ewww_image_optimizer";s:10:"No savings";}'),
(1569, 175, '_edit_lock', '1459475813:1'),
(1570, 175, '_edit_last', '1'),
(1571, 175, '_thumbnail_id', '168'),
(1572, 175, 'banner_image', '167'),
(1573, 175, '_banner_image', 'field_56ebc7b848e7d'),
(1574, 175, 'banner_text_alignment', 'right'),
(1575, 175, '_banner_text_alignment', 'field_56ef6b6147e52'),
(1576, 175, 'featured_show', ''),
(1577, 175, '_featured_show', 'field_56de3ea34d42f'),
(1578, 175, 'cast', 'Jake McDorman (Brian Finch), Jennifer Carpenter (Rebecca Harris), Hill Harper (Boyle), Mary Elizabeth Mastrantino (Nasreen "Naz" Pouran)'),
(1579, 175, '_cast', 'field_56bda94b2303c'),
(1580, 175, 'legal_notice', 'When using materials (images, videos, etc) of this show, please use the following legal notice: ©2013 ABC Inc.'),
(1581, 175, '_legal_notice', 'field_56c2e940f9c75'),
(1582, 175, 'add_promo_files', '4'),
(1583, 175, '_add_promo_files', 'field_56bda9692303d'),
(1584, 175, '__wpdm_package_dir', ''),
(1585, 175, '__wpdm_publish_date', '2016-03-01 12:00 am'),
(1586, 175, '__wpdm_expire_date', ''),
(1587, 175, '__wpdm_version', ''),
(1588, 175, '__wpdm_link_label', ''),
(1589, 175, '__wpdm_quota', ''),
(1590, 175, '__wpdm_download_limit_per_user', ''),
(1591, 175, '__wpdm_view_count', '65'),
(1592, 175, '__wpdm_download_count', ''),
(1593, 175, '__wpdm_package_size', '287.45 MB'),
(1594, 175, '__wpdm_access', 'a:1:{i:0;s:5:"guest";}'),
(1595, 175, '__wpdm_individual_file_download', '-1'),
(1596, 175, '__wpdm_cache_zip', '-1'),
(1597, 175, '__wpdm_template', 'link-template-rtlcbscustom.php'),
(1598, 175, '__wpdm_page_template', 'page-template-custom.php'),
(1599, 175, '__wpdm_password', ''),
(1600, 175, '__wpdm_password_usage_limit', ''),
(1601, 175, '__wpdm_linkedin_message', ''),
(1602, 175, '__wpdm_linkedin_url', ''),
(1603, 175, '__wpdm_tweet_message', ''),
(1604, 175, '__wpdm_google_plus_1', ''),
(1605, 175, '__wpdm_twitter_handle', ''),
(1606, 175, '__wpdm_facebook_like', ''),
(1607, 175, '__wpdm_email_lock_idl', '0'),
(1608, 175, '__wpdm_icon', '');
INSERT INTO `rtl21016_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1612, 175, '__wpdm_fileinfo', 'a:122:{s:13:"1459317574324";a:2:{s:5:"title";s:39:"1459317574wpdm_LIM-S01-Synopsis0110.pdf";s:8:"password";s:0:"";}s:13:"1459317573300";a:2:{s:5:"title";s:39:"1459317573wpdm_LIM-S01-Synopsis0109.pdf";s:8:"password";s:0:"";}s:13:"1459317572276";a:2:{s:5:"title";s:39:"1459317572wpdm_LIM-S01-Synopsis0108.pdf";s:8:"password";s:0:"";}s:13:"1459317571116";a:2:{s:5:"title";s:39:"1459317571wpdm_LIM-S01-Synopsis0107.pdf";s:8:"password";s:0:"";}s:13:"1459317569535";a:2:{s:5:"title";s:39:"1459317569wpdm_LIM-S01-Synopsis0106.pdf";s:8:"password";s:0:"";}s:13:"1459317568243";a:2:{s:5:"title";s:39:"1459317568wpdm_LIM-S01-Synopsis0105.pdf";s:8:"password";s:0:"";}s:13:"1459317567259";a:2:{s:5:"title";s:39:"1459317567wpdm_LIM-S01-Synopsis0104.pdf";s:8:"password";s:0:"";}s:13:"1459317566235";a:2:{s:5:"title";s:39:"1459317566wpdm_LIM-S01-Synopsis0103.pdf";s:8:"password";s:0:"";}s:13:"1459317565195";a:2:{s:5:"title";s:39:"1459317565wpdm_LIM-S01-Synopsis0102.pdf";s:8:"password";s:0:"";}s:13:"1459317564275";a:2:{s:5:"title";s:39:"1459317564wpdm_LIM-S01-Synopsis0101.pdf";s:8:"password";s:0:"";}s:13:"1459317563367";a:2:{s:5:"title";s:51:"1459317563wpdm_LIM-S01-SocialMedia_sideeffectsi.jpg";s:8:"password";s:0:"";}s:13:"1459317561531";a:2:{s:5:"title";s:44:"1459317561wpdm_LIM-S01-SocialMedia_Morra.jpg";s:8:"password";s:0:"";}s:13:"1459317560295";a:2:{s:5:"title";s:37:"1459317560wpdm_LIM-QuoteMeme-001i.psd";s:8:"password";s:0:"";}s:13:"1459317557226";a:2:{s:5:"title";s:37:"1459317557wpdm_LIM-QuoteMeme-001i.jpg";s:8:"password";s:0:"";}s:13:"1459317555502";a:2:{s:5:"title";s:45:"1459317555wpdm_LIM-JenCarpenter-Meme-107i.psd";s:8:"password";s:0:"";}s:13:"1459317553161";a:2:{s:5:"title";s:45:"1459317553wpdm_LIM-JenCarpenter-Meme-107i.jpg";s:8:"password";s:0:"";}s:13:"1459317552205";a:2:{s:5:"title";s:37:"1459317552wpdm_LIM-logo-white102i.png";s:8:"password";s:0:"";}s:13:"1459317551289";a:2:{s:5:"title";s:37:"1459317551wpdm_LIM-logo-white102i.eps";s:8:"password";s:0:"";}s:13:"1459317550161";a:2:{s:5:"title";s:37:"1459317550wpdm_LIM-logo-black101i.png";s:8:"password";s:0:"";}s:13:"1459317549235";a:2:{s:5:"title";s:37:"1459317549wpdm_LIM-logo-black101i.jpg";s:8:"password";s:0:"";}s:13:"1459317548215";a:2:{s:5:"title";s:37:"1459317548wpdm_LIM-logo-black101i.eps";s:8:"password";s:0:"";}s:13:"1459317547183";a:2:{s:5:"title";s:33:"1459317547wpdm_Limitless_logo.png";s:8:"password";s:0:"";}s:13:"1459317545549";a:2:{s:5:"title";s:37:"LIM-backplate_C242_clean101i_logo.psd";s:8:"password";s:0:"";}s:13:"1459317542448";a:2:{s:5:"title";s:37:"LIM-backplate_C242_clean101i_logo.jpg";s:8:"password";s:0:"";}s:13:"1459317541240";a:2:{s:5:"title";s:41:"1459317541wpdm_LIM-keyart-vert-TT105i.jpg";s:8:"password";s:0:"";}s:13:"1459317538416";a:2:{s:5:"title";s:38:"1459317538wpdm_LIM-keyart-vert104i.jpg";s:8:"password";s:0:"";}s:13:"1459317534796";a:2:{s:5:"title";s:46:"1459317534wpdm_LIM-keyart-horiz-TT-TAG103i.tif";s:8:"password";s:0:"";}s:13:"1459317529367";a:2:{s:5:"title";s:39:"1459317529wpdm_LIM-keyart-horiz101i.jpg";s:8:"password";s:0:"";}s:13:"1459317496503";a:2:{s:5:"title";s:39:"1459317496wpdm_LIM-epi0103-D_1498bi.jpg";s:8:"password";s:0:"";}s:13:"1459317494859";a:2:{s:5:"title";s:39:"1459317494wpdm_LIM-epi0103-D_1495bi.jpg";s:8:"password";s:0:"";}s:13:"1459317493015";a:2:{s:5:"title";s:39:"1459317493wpdm_LIM-epi0103-D_1437bi.jpg";s:8:"password";s:0:"";}s:13:"1459317490882";a:2:{s:5:"title";s:39:"1459317490wpdm_LIM-epi0103-D_1416bi.jpg";s:8:"password";s:0:"";}s:13:"1459317488722";a:2:{s:5:"title";s:39:"1459317488wpdm_LIM-epi0103-D_1015bi.jpg";s:8:"password";s:0:"";}s:13:"1459317486668";a:2:{s:5:"title";s:39:"1459317486wpdm_LIM-epi0103-D_0983bi.jpg";s:8:"password";s:0:"";}s:13:"1459317484822";a:2:{s:5:"title";s:39:"1459317484wpdm_LIM-epi0103-D_0952bi.jpg";s:8:"password";s:0:"";}s:13:"1459317482672";a:2:{s:5:"title";s:39:"1459317482wpdm_LIM-epi0103-D_0886bi.jpg";s:8:"password";s:0:"";}s:13:"1459317480728";a:2:{s:5:"title";s:39:"1459317480wpdm_LIM-epi0103-D_0861bi.jpg";s:8:"password";s:0:"";}s:13:"1459317478642";a:2:{s:5:"title";s:39:"1459317478wpdm_LIM-epi0103-D_0854bi.jpg";s:8:"password";s:0:"";}s:13:"1459317476498";a:2:{s:5:"title";s:39:"1459317476wpdm_LIM-epi0103-D_0848bi.jpg";s:8:"password";s:0:"";}s:13:"1459317474890";a:2:{s:5:"title";s:39:"1459317474wpdm_LIM-epi0103-D_0657bi.jpg";s:8:"password";s:0:"";}s:13:"1459317473462";a:2:{s:5:"title";s:39:"1459317473wpdm_LIM-epi0103-D_0608bi.jpg";s:8:"password";s:0:"";}s:13:"1459317471654";a:2:{s:5:"title";s:39:"1459317471wpdm_LIM-epi0103-D_0579bi.jpg";s:8:"password";s:0:"";}s:13:"1459317469610";a:2:{s:5:"title";s:40:"1459317469wpdm_LIM-epi0103-D_0551b2i.jpg";s:8:"password";s:0:"";}s:13:"1459317468342";a:2:{s:5:"title";s:39:"1459317468wpdm_LIM-epi0103-D_0545bi.jpg";s:8:"password";s:0:"";}s:13:"1459317467114";a:2:{s:5:"title";s:39:"1459317467wpdm_LIM-epi0103-D_0423bi.jpg";s:8:"password";s:0:"";}s:13:"1459317465762";a:2:{s:5:"title";s:39:"1459317465wpdm_LIM-epi0103-D_0019bi.jpg";s:8:"password";s:0:"";}s:13:"1459317464552";a:2:{s:5:"title";s:39:"1459317464wpdm_LIM-epi0103-D_0008bi.jpg";s:8:"password";s:0:"";}s:13:"1459317463432";a:2:{s:5:"title";s:39:"1459317463wpdm_LIM-epi0103-D_0004bi.jpg";s:8:"password";s:0:"";}s:13:"1459317462440";a:2:{s:5:"title";s:39:"1459317462wpdm_LIM-epi0103-D_0003bi.jpg";s:8:"password";s:0:"";}s:13:"1459317461268";a:2:{s:5:"title";s:37:"1459317461wpdm_LIM-epi0102-NAZ6bi.jpg";s:8:"password";s:0:"";}s:13:"1459317460160";a:2:{s:5:"title";s:39:"1459317460wpdm_LIM-epi0102-Image24i.jpg";s:8:"password";s:0:"";}s:13:"1459317459344";a:2:{s:5:"title";s:39:"1459317459wpdm_LIM-epi0102-Image19i.jpg";s:8:"password";s:0:"";}s:13:"1459317458456";a:2:{s:5:"title";s:39:"1459317458wpdm_LIM-epi0102-Image18i.jpg";s:8:"password";s:0:"";}s:13:"1459317457552";a:2:{s:5:"title";s:39:"1459317457wpdm_LIM-epi0102-Image17i.jpg";s:8:"password";s:0:"";}s:13:"1459317456612";a:2:{s:5:"title";s:39:"1459317456wpdm_LIM-epi0102-Image16i.jpg";s:8:"password";s:0:"";}s:13:"1459317455740";a:2:{s:5:"title";s:39:"1459317455wpdm_LIM-epi0102-Image15i.jpg";s:8:"password";s:0:"";}s:13:"1459317454772";a:2:{s:5:"title";s:39:"1459317454wpdm_LIM-epi0102-Image14i.jpg";s:8:"password";s:0:"";}s:13:"1459317453900";a:2:{s:5:"title";s:39:"1459317453wpdm_LIM-epi0102-Image12i.jpg";s:8:"password";s:0:"";}s:13:"1459317452804";a:2:{s:5:"title";s:38:"1459317452wpdm_LIM-epi0102-Image8i.jpg";s:8:"password";s:0:"";}s:13:"1459317451952";a:2:{s:5:"title";s:38:"1459317452wpdm_LIM-epi0102-Image6i.jpg";s:8:"password";s:0:"";}s:13:"1459317450692";a:2:{s:5:"title";s:38:"1459317450wpdm_LIM-epi0102-Image2i.jpg";s:8:"password";s:0:"";}s:13:"1459317449804";a:2:{s:5:"title";s:38:"1459317449wpdm_LIM-epi0102-Image1i.jpg";s:8:"password";s:0:"";}s:13:"1459317448784";a:2:{s:5:"title";s:39:"1459317448wpdm_LIM-epi0102-D_0357bi.jpg";s:8:"password";s:0:"";}s:13:"1459317447344";a:2:{s:5:"title";s:39:"1459317447wpdm_LIM-epi0102-D_0333bi.jpg";s:8:"password";s:0:"";}s:13:"1459317446012";a:2:{s:5:"title";s:39:"1459317445wpdm_LIM-epi0102-D_0305bi.jpg";s:8:"password";s:0:"";}s:13:"1459317444692";a:2:{s:5:"title";s:39:"1459317444wpdm_LIM-epi0102-D_0262bi.jpg";s:8:"password";s:0:"";}s:13:"1459317443508";a:2:{s:5:"title";s:39:"1459317443wpdm_LIM-epi0102-D_0251bi.jpg";s:8:"password";s:0:"";}s:13:"1459317442336";a:2:{s:5:"title";s:39:"1459317442wpdm_LIM-epi0102-D_0234bi.jpg";s:8:"password";s:0:"";}s:13:"1459317441208";a:2:{s:5:"title";s:39:"1459317441wpdm_LIM-epi0102-D_0230bi.jpg";s:8:"password";s:0:"";}s:13:"1459317440108";a:2:{s:5:"title";s:39:"1459317440wpdm_LIM-epi0102-D_0193bi.jpg";s:8:"password";s:0:"";}s:13:"1459317438639";a:2:{s:5:"title";s:39:"1459317438wpdm_LIM-epi0102-D_0149bi.jpg";s:8:"password";s:0:"";}s:13:"1459317436991";a:2:{s:5:"title";s:39:"1459317437wpdm_LIM-epi0102-D_0097bi.jpg";s:8:"password";s:0:"";}s:13:"1459317435587";a:2:{s:5:"title";s:39:"1459317435wpdm_LIM-epi0102-D_0092bi.jpg";s:8:"password";s:0:"";}s:13:"1459317434226";a:2:{s:5:"title";s:39:"1459317434wpdm_LIM-epi0102-D_0059bi.jpg";s:8:"password";s:0:"";}s:13:"1459317433006";a:2:{s:5:"title";s:39:"1459317432wpdm_LIM-epi0102-D_0040bi.jpg";s:8:"password";s:0:"";}s:13:"1459317431498";a:2:{s:5:"title";s:39:"1459317431wpdm_LIM-epi0102-D_0027bi.jpg";s:8:"password";s:0:"";}s:13:"1459317430270";a:2:{s:5:"title";s:39:"1459317430wpdm_LIM-epi0102-D_0020bi.jpg";s:8:"password";s:0:"";}s:13:"1459317429436";a:2:{s:5:"title";s:37:"1459317429wpdm_LIM-epi0102-0758bi.jpg";s:8:"password";s:0:"";}s:13:"1459317427996";a:2:{s:5:"title";s:37:"1459317427wpdm_LIM-epi0102-0670bi.jpg";s:8:"password";s:0:"";}s:13:"1459317426760";a:2:{s:5:"title";s:37:"1459317426wpdm_LIM-epi0102-0662bi.jpg";s:8:"password";s:0:"";}s:13:"1459317425433";a:2:{s:5:"title";s:37:"1459317425wpdm_LIM-epi0102-0634bi.jpg";s:8:"password";s:0:"";}s:13:"1459317424103";a:2:{s:5:"title";s:37:"1459317424wpdm_LIM-epi0102-0517bi.jpg";s:8:"password";s:0:"";}s:13:"1459317423107";a:2:{s:5:"title";s:37:"1459317423wpdm_LIM-epi0102-0511bi.jpg";s:8:"password";s:0:"";}s:13:"1459317422159";a:2:{s:5:"title";s:37:"1459317422wpdm_LIM-epi0102-0458bi.jpg";s:8:"password";s:0:"";}s:13:"1459317421003";a:2:{s:5:"title";s:37:"1459317421wpdm_LIM-epi0102-0429bi.jpg";s:8:"password";s:0:"";}s:13:"1459317419821";a:2:{s:5:"title";s:37:"1459317419wpdm_LIM-epi0102-0290bi.jpg";s:8:"password";s:0:"";}s:13:"1459317418677";a:2:{s:5:"title";s:37:"1459317418wpdm_LIM-epi0102-0266bi.jpg";s:8:"password";s:0:"";}s:13:"1459317417401";a:2:{s:5:"title";s:37:"1459317417wpdm_LIM-epi0102-0253bi.jpg";s:8:"password";s:0:"";}s:13:"1459317416501";a:2:{s:5:"title";s:37:"1459317416wpdm_LIM-epi0102-0243bi.jpg";s:8:"password";s:0:"";}s:13:"1459317415101";a:2:{s:5:"title";s:37:"1459317415wpdm_LIM-epi0102-0213bi.jpg";s:8:"password";s:0:"";}s:13:"1459317413396";a:2:{s:5:"title";s:37:"1459317413wpdm_LIM-epi0102-0159bi.jpg";s:8:"password";s:0:"";}s:13:"1459317411814";a:2:{s:5:"title";s:37:"1459317411wpdm_LIM-epi0102-0051bi.jpg";s:8:"password";s:0:"";}s:13:"1459317410686";a:2:{s:5:"title";s:37:"1459317410wpdm_LIM-epi0102-0044bi.jpg";s:8:"password";s:0:"";}s:13:"1459317409364";a:2:{s:5:"title";s:39:"1459317409wpdm_LIM-epi0101-Image14i.jpg";s:8:"password";s:0:"";}s:13:"1459317408124";a:2:{s:5:"title";s:39:"1459317408wpdm_LIM-epi0101-Image12i.jpg";s:8:"password";s:0:"";}s:13:"1459317407248";a:2:{s:5:"title";s:39:"1459317407wpdm_LIM-epi0101-Image11i.jpg";s:8:"password";s:0:"";}s:13:"1459317406400";a:2:{s:5:"title";s:38:"1459317406wpdm_LIM-epi0101-Image4i.jpg";s:8:"password";s:0:"";}s:13:"1459317405360";a:2:{s:5:"title";s:38:"1459317405wpdm_LIM-epi0101-Image2i.jpg";s:8:"password";s:0:"";}s:13:"1459317404435";a:2:{s:5:"title";s:38:"1459317404wpdm_LIM-epi0101-D1319bi.jpg";s:8:"password";s:0:"";}s:13:"1459317403547";a:2:{s:5:"title";s:38:"1459317403wpdm_LIM-epi0101-D1233bi.jpg";s:8:"password";s:0:"";}s:13:"1459317402095";a:2:{s:5:"title";s:38:"1459317402wpdm_LIM-epi0101-D1064bi.jpg";s:8:"password";s:0:"";}s:13:"1459317400603";a:2:{s:5:"title";s:38:"1459317400wpdm_LIM-epi0101-D0912bi.jpg";s:8:"password";s:0:"";}s:13:"1459317399011";a:2:{s:5:"title";s:38:"1459317399wpdm_LIM-epi0101-D0868bi.jpg";s:8:"password";s:0:"";}s:13:"1459317397491";a:2:{s:5:"title";s:38:"1459317397wpdm_LIM-epi0101-D0848bi.jpg";s:8:"password";s:0:"";}s:13:"1459317396143";a:2:{s:5:"title";s:38:"1459317396wpdm_LIM-epi0101-D0714bi.jpg";s:8:"password";s:0:"";}s:13:"1459317394381";a:2:{s:5:"title";s:38:"1459317394wpdm_LIM-epi0101-D0707bi.jpg";s:8:"password";s:0:"";}s:13:"1459317392869";a:2:{s:5:"title";s:38:"1459317392wpdm_LIM-epi0101-D0659bi.jpg";s:8:"password";s:0:"";}s:13:"1459317391645";a:2:{s:5:"title";s:38:"1459317391wpdm_LIM-epi0101-D0581bi.jpg";s:8:"password";s:0:"";}s:13:"1459317389797";a:2:{s:5:"title";s:38:"1459317389wpdm_LIM-epi0101-D0329bi.jpg";s:8:"password";s:0:"";}s:13:"1459317388501";a:2:{s:5:"title";s:38:"1459317388wpdm_LIM-epi0101-D0243bi.jpg";s:8:"password";s:0:"";}s:13:"1459317387337";a:2:{s:5:"title";s:38:"1459317387wpdm_LIM-epi0101-D0110bi.jpg";s:8:"password";s:0:"";}s:13:"1459317386009";a:2:{s:5:"title";s:37:"1459317386wpdm_LIM-epi0101-3518bi.jpg";s:8:"password";s:0:"";}s:13:"1459317384889";a:2:{s:5:"title";s:37:"1459317384wpdm_LIM-epi0101-3015bi.jpg";s:8:"password";s:0:"";}s:13:"1459317383244";a:2:{s:5:"title";s:37:"1459317383wpdm_LIM-epi0101-3007bi.jpg";s:8:"password";s:0:"";}s:13:"1459317381808";a:2:{s:5:"title";s:37:"1459317381wpdm_LIM-epi0101-2236bi.jpg";s:8:"password";s:0:"";}s:13:"1459317380476";a:2:{s:5:"title";s:37:"1459317380wpdm_LIM-epi0101-1358bi.jpg";s:8:"password";s:0:"";}s:13:"1459317378836";a:2:{s:5:"title";s:37:"1459317378wpdm_LIM-epi0101-1267Bi.jpg";s:8:"password";s:0:"";}s:13:"1459317377664";a:2:{s:5:"title";s:36:"1459317377wpdm_LIM-epi0101-472bi.jpg";s:8:"password";s:0:"";}s:13:"1459317376276";a:2:{s:5:"title";s:36:"1459317376wpdm_LIM-epi0101-338bi.jpg";s:8:"password";s:0:"";}s:13:"1459317374744";a:2:{s:5:"title";s:36:"1459317374wpdm_LIM-epi0101-141bi.jpg";s:8:"password";s:0:"";}s:13:"1459317373140";a:2:{s:5:"title";s:37:"1459317373wpdm_LIM-epi0101-38BWSi.jpg";s:8:"password";s:0:"";}s:13:"1459317356525";a:2:{s:5:"title";s:47:"1459317356wpdm_Limitless factsheet and bios.pdf";s:8:"password";s:0:"";}}'),
(1637, 175, 'add_promo_files_0_category', 'On-Air'),
(1638, 175, '_add_promo_files_0_category', 'field_56bda97f2303e'),
(1639, 175, 'add_promo_files_0_upload_date', '20160330'),
(1640, 175, '_add_promo_files_0_upload_date', 'field_56bda9b52303f'),
(1641, 175, 'add_promo_files_0_id', 'YE01106G'),
(1642, 175, '_add_promo_files_0_id', 'field_56bda9eb23040'),
(1643, 175, 'add_promo_files_0_promo_start', '20160301'),
(1644, 175, '_add_promo_files_0_promo_start', 'field_56bda9fc23041'),
(1645, 175, 'add_promo_files_0_promo_end', '20160331'),
(1646, 175, '_add_promo_files_0_promo_end', 'field_56bdaa1123042'),
(1647, 175, 'add_promo_files_0_file_name', 'YE01106G_Limitless_NewK_Wed9pm_BrandNew_Bruce'),
(1648, 175, '_add_promo_files_0_file_name', 'field_56bdaa2523043'),
(1649, 175, 'add_promo_files_0_program_tx', 'Entertainment'),
(1650, 175, '_add_promo_files_0_program_tx', 'field_56bdaa2e23044'),
(1651, 175, 'add_promo_files_0_prog_title_stunts', 'Limitless'),
(1652, 175, '_add_promo_files_0_prog_title_stunts', 'field_56bdaa3923045'),
(1653, 175, 'add_promo_files_0_version', 'NewK'),
(1654, 175, '_add_promo_files_0_version', 'field_56bdaa4d23046'),
(1655, 175, 'add_promo_files_0_duration', '30s'),
(1656, 175, '_add_promo_files_0_duration', 'field_56bdaa5723047'),
(1657, 175, 'add_promo_files_0_notes', '44 MB'),
(1658, 175, '_add_promo_files_0_notes', 'field_56bdaa6223048'),
(1659, 175, 'add_promo_files_0_attached_file', '226'),
(1660, 175, '_add_promo_files_0_attached_file', 'field_56bdaa6e23049'),
(1661, 175, 'add_promo_files_0_thumbnail', ''),
(1662, 175, '_add_promo_files_0_thumbnail', 'field_56cc2f84bbefe'),
(1663, 175, 'add_promo_files_0_operator_group', 'all'),
(1664, 175, '_add_promo_files_0_operator_group', 'field_56de395d8068d'),
(1665, 175, 'add_promo_files_1_category', 'On-Air'),
(1666, 175, '_add_promo_files_1_category', 'field_56bda97f2303e'),
(1667, 175, 'add_promo_files_1_upload_date', '20160330'),
(1668, 175, '_add_promo_files_1_upload_date', 'field_56bda9b52303f'),
(1669, 175, 'add_promo_files_1_id', 'YE01105G'),
(1670, 175, '_add_promo_files_1_id', 'field_56bda9eb23040'),
(1671, 175, 'add_promo_files_1_promo_start', '20160301'),
(1672, 175, '_add_promo_files_1_promo_start', 'field_56bda9fc23041'),
(1673, 175, 'add_promo_files_1_promo_end', '20160331'),
(1674, 175, '_add_promo_files_1_promo_end', 'field_56bdaa1123042'),
(1675, 175, 'add_promo_files_1_file_name', 'YE01105G_Limitless_NewK_Wed9pm_Xpress_Bruce'),
(1676, 175, '_add_promo_files_1_file_name', 'field_56bdaa2523043'),
(1677, 175, 'add_promo_files_1_program_tx', 'Entertainment'),
(1678, 175, '_add_promo_files_1_program_tx', 'field_56bdaa2e23044'),
(1679, 175, 'add_promo_files_1_prog_title_stunts', 'Limitless'),
(1680, 175, '_add_promo_files_1_prog_title_stunts', 'field_56bdaa3923045'),
(1681, 175, 'add_promo_files_1_version', 'NewK'),
(1682, 175, '_add_promo_files_1_version', 'field_56bdaa4d23046'),
(1683, 175, 'add_promo_files_1_duration', '30s'),
(1684, 175, '_add_promo_files_1_duration', 'field_56bdaa5723047'),
(1685, 175, 'add_promo_files_1_notes', '44 MB'),
(1686, 175, '_add_promo_files_1_notes', 'field_56bdaa6223048'),
(1687, 175, 'add_promo_files_1_attached_file', '225'),
(1688, 175, '_add_promo_files_1_attached_file', 'field_56bdaa6e23049'),
(1689, 175, 'add_promo_files_1_thumbnail', ''),
(1690, 175, '_add_promo_files_1_thumbnail', 'field_56cc2f84bbefe'),
(1691, 175, 'add_promo_files_1_operator_group', 'all'),
(1692, 175, '_add_promo_files_1_operator_group', 'field_56de395d8068d'),
(1927, 191, '_menu_item_type', 'taxonomy'),
(1928, 191, '_menu_item_menu_item_parent', '0'),
(1929, 191, '_menu_item_object_id', '2'),
(1930, 191, '_menu_item_object', 'wpdmcategory'),
(1931, 191, '_menu_item_target', ''),
(1932, 191, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1933, 191, '_menu_item_xfn', ''),
(1934, 191, '_menu_item_url', ''),
(1935, 191, '_menu_item_orphaned', '1459133350'),
(1936, 191, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:1;}'),
(1937, 192, '_menu_item_type', 'taxonomy'),
(1938, 192, '_menu_item_menu_item_parent', '0'),
(1939, 192, '_menu_item_object_id', '6'),
(1940, 192, '_menu_item_object', 'wpdmcategory'),
(1941, 192, '_menu_item_target', ''),
(1942, 192, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(1943, 192, '_menu_item_xfn', ''),
(1944, 192, '_menu_item_url', ''),
(1945, 192, '_menu_item_orphaned', '1459133350'),
(1946, 192, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:1;}'),
(1957, 98, '_wp_old_slug', 'channel-materials'),
(1958, 98, 'banner_image', '163'),
(1959, 98, '_banner_image', 'field_56ebc7b848e7d'),
(1960, 98, 'banner_text_alignment', 'left'),
(1961, 98, '_banner_text_alignment', 'field_56ef6b6147e52'),
(1978, 195, '_wp_attached_file', '2016/01/SCP-keyart-horiz201i.jpg'),
(1979, 195, '_wp_attachment_metadata', 'a:6:{s:5:"width";i:7400;s:6:"height";i:2300;s:4:"file";s:32:"2016/01/SCP-keyart-horiz201i.jpg";s:5:"sizes";a:4:{s:9:"thumbnail";a:5:{s:4:"file";s:32:"SCP-keyart-horiz201i-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:30:"Reduced by 6.6% (578.0&nbsp;B)";}s:6:"medium";a:5:{s:4:"file";s:31:"SCP-keyart-horiz201i-300x93.jpg";s:5:"width";i:300;s:6:"height";i:93;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:30:"Reduced by 7.5% (852.0&nbsp;B)";}s:12:"medium_large";a:5:{s:4:"file";s:32:"SCP-keyart-horiz201i-768x239.jpg";s:5:"width";i:768;s:6:"height";i:239;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:29:"Reduced by 5.8% (2.8&nbsp;kB)";}s:5:"large";a:5:{s:4:"file";s:33:"SCP-keyart-horiz201i-1024x318.jpg";s:5:"width";i:1024;s:6:"height";i:318;s:9:"mime-type";s:10:"image/jpeg";s:20:"ewww_image_optimizer";s:29:"Reduced by 5.4% (4.1&nbsp;kB)";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}s:20:"ewww_image_optimizer";s:29:"Reduced by 9.5% (1.1&nbsp;MB)";}'),
(1981, 164, 'banner_image', '195'),
(1982, 164, '_banner_image', 'field_56ebc7b848e7d'),
(1983, 164, 'banner_text_alignment', 'left'),
(1984, 164, '_banner_text_alignment', 'field_56ef6b6147e52'),
(1985, 164, 'featured_show', 'a:1:{i:0;s:8:"featured";}'),
(1986, 164, '_featured_show', 'field_56de3ea34d42f'),
(1987, 164, 'cast', 'Elyes Gabel (Walter) Katharine McPhee (Paige) Eddie Kaye Thomas (Toby) Jadyn Wong (Happy) Ari Stidham (Sylvester) Robert Patrick (Cabe Gallo)'),
(1988, 164, '_cast', 'field_56bda94b2303c'),
(1989, 164, 'legal_notice', ''),
(1990, 164, '_legal_notice', 'field_56c2e940f9c75'),
(1991, 164, 'add_promo_files_0_category', 'On-Air'),
(1992, 164, '_add_promo_files_0_category', 'field_56bda97f2303e'),
(1993, 164, 'add_promo_files_0_upload_date', '20160215'),
(1994, 164, '_add_promo_files_0_upload_date', 'field_56bda9b52303f'),
(1995, 164, 'add_promo_files_0_id', 'l51'),
(1996, 164, '_add_promo_files_0_id', 'field_56bda9eb23040'),
(1997, 164, 'add_promo_files_0_promo_start', '20160220'),
(1998, 164, '_add_promo_files_0_promo_start', 'field_56bda9fc23041'),
(1999, 164, 'add_promo_files_0_promo_end', '20160229'),
(2000, 164, '_add_promo_files_0_promo_end', 'field_56bdaa1123042'),
(2001, 164, 'add_promo_files_0_file_name', 'SCP'),
(2002, 164, '_add_promo_files_0_file_name', 'field_56bdaa2523043'),
(2003, 164, 'add_promo_files_0_program_tx', 'rogramtx1'),
(2004, 164, '_add_promo_files_0_program_tx', 'field_56bdaa2e23044'),
(2005, 164, 'add_promo_files_0_prog_title_stunts', 'Prog Title / Stunts'),
(2006, 164, '_add_promo_files_0_prog_title_stunts', 'field_56bdaa3923045'),
(2007, 164, 'add_promo_files_0_version', '1'),
(2008, 164, '_add_promo_files_0_version', 'field_56bdaa4d23046'),
(2009, 164, 'add_promo_files_0_duration', '5'),
(2010, 164, '_add_promo_files_0_duration', 'field_56bdaa5723047'),
(2011, 164, 'add_promo_files_0_notes', 'notes here'),
(2012, 164, '_add_promo_files_0_notes', 'field_56bdaa6223048'),
(2013, 164, 'add_promo_files_0_attached_file', '46'),
(2014, 164, '_add_promo_files_0_attached_file', 'field_56bdaa6e23049'),
(2015, 164, 'add_promo_files_0_thumbnail', '92'),
(2016, 164, '_add_promo_files_0_thumbnail', 'field_56cc2f84bbefe'),
(2017, 164, 'add_promo_files_0_operator_group', 'Skycable'),
(2018, 164, '_add_promo_files_0_operator_group', 'field_56de395d8068d'),
(2019, 164, 'add_promo_files_1_category', 'Social'),
(2020, 164, '_add_promo_files_1_category', 'field_56bda97f2303e'),
(2021, 164, 'add_promo_files_1_upload_date', '20160216'),
(2022, 164, '_add_promo_files_1_upload_date', 'field_56bda9b52303f'),
(2023, 164, 'add_promo_files_1_id', 'l52'),
(2024, 164, '_add_promo_files_1_id', 'field_56bda9eb23040'),
(2025, 164, 'add_promo_files_1_promo_start', '20160202'),
(2026, 164, '_add_promo_files_1_promo_start', 'field_56bda9fc23041'),
(2027, 164, 'add_promo_files_1_promo_end', '20160229'),
(2028, 164, '_add_promo_files_1_promo_end', 'field_56bdaa1123042'),
(2029, 164, 'add_promo_files_1_file_name', 'SCP2'),
(2030, 164, '_add_promo_files_1_file_name', 'field_56bdaa2523043'),
(2031, 164, 'add_promo_files_1_program_tx', 'rogramtx2'),
(2032, 164, '_add_promo_files_1_program_tx', 'field_56bdaa2e23044'),
(2033, 164, 'add_promo_files_1_prog_title_stunts', 'Prog Title / Stunts'),
(2034, 164, '_add_promo_files_1_prog_title_stunts', 'field_56bdaa3923045'),
(2035, 164, 'add_promo_files_1_version', '2'),
(2036, 164, '_add_promo_files_1_version', 'field_56bdaa4d23046'),
(2037, 164, 'add_promo_files_1_duration', '5'),
(2038, 164, '_add_promo_files_1_duration', 'field_56bdaa5723047'),
(2039, 164, 'add_promo_files_1_notes', 'notes here'),
(2040, 164, '_add_promo_files_1_notes', 'field_56bdaa6223048'),
(2041, 164, 'add_promo_files_1_attached_file', '78'),
(2042, 164, '_add_promo_files_1_attached_file', 'field_56bdaa6e23049'),
(2043, 164, 'add_promo_files_1_thumbnail', '91'),
(2044, 164, '_add_promo_files_1_thumbnail', 'field_56cc2f84bbefe'),
(2045, 164, 'add_promo_files_1_operator_group', 'all'),
(2046, 164, '_add_promo_files_1_operator_group', 'field_56de395d8068d'),
(2047, 164, 'add_promo_files', '2'),
(2048, 164, '_add_promo_files', 'field_56bda9692303d'),
(2062, 197, '_menu_item_type', 'post_type'),
(2063, 197, '_menu_item_menu_item_parent', '0'),
(2064, 197, '_menu_item_object_id', '15'),
(2065, 197, '_menu_item_object', 'page'),
(2066, 197, '_menu_item_target', ''),
(2067, 197, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2068, 197, '_menu_item_xfn', ''),
(2069, 197, '_menu_item_url', ''),
(2071, 197, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(2073, 198, '_menu_item_type', 'post_type'),
(2074, 198, '_menu_item_menu_item_parent', '0'),
(2075, 198, '_menu_item_object_id', '102'),
(2076, 198, '_menu_item_object', 'page'),
(2077, 198, '_menu_item_target', ''),
(2078, 198, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2079, 198, '_menu_item_xfn', ''),
(2080, 198, '_menu_item_url', ''),
(2082, 198, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(2083, 199, '_menu_item_type', 'custom'),
(2084, 199, '_menu_item_menu_item_parent', '0'),
(2085, 199, '_menu_item_object_id', '199'),
(2086, 199, '_menu_item_object', 'custom'),
(2087, 199, '_menu_item_target', ''),
(2088, 199, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2089, 199, '_menu_item_xfn', ''),
(2090, 199, '_menu_item_url', 'http://192.168.1.167/rtlcbsasia/download/channel-materials-extreme/'),
(2092, 199, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(2094, 200, '_menu_item_type', 'post_type'),
(2095, 200, '_menu_item_menu_item_parent', '0'),
(2096, 200, '_menu_item_object_id', '132'),
(2097, 200, '_menu_item_object', 'page'),
(2098, 200, '_menu_item_target', ''),
(2099, 200, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(2100, 200, '_menu_item_xfn', ''),
(2101, 200, '_menu_item_url', ''),
(2103, 200, 'wpfront-user-role-editor-nav-menu-data', 'O:8:"stdClass":1:{s:4:"type";i:2;}'),
(2105, 201, '_edit_lock', '1459389095:1'),
(2106, 201, '_edit_last', '1'),
(2107, 201, '_thumbnail_id', '209'),
(2108, 201, 'banner_image', '209'),
(2109, 201, '_banner_image', 'field_56ebc7b848e7d'),
(2110, 201, 'banner_text_alignment', 'left'),
(2111, 201, '_banner_text_alignment', 'field_56ef6b6147e52'),
(2112, 201, 'featured_show', ''),
(2113, 201, '_featured_show', 'field_56de3ea34d42f'),
(2114, 201, 'cast', ''),
(2115, 201, '_cast', 'field_56bda94b2303c'),
(2116, 201, 'legal_notice', 'Legal Notice:When using materials (images, videos, etc) of this show, please use the following legal notice: ©2013 ABC Inc.'),
(2117, 201, '_legal_notice', 'field_56c2e940f9c75'),
(2118, 201, 'add_promo_files', '3'),
(2119, 201, '_add_promo_files', 'field_56bda9692303d'),
(2120, 201, '__wpdm_package_dir', ''),
(2121, 201, '__wpdm_publish_date', ''),
(2122, 201, '__wpdm_expire_date', ''),
(2123, 201, '__wpdm_version', ''),
(2124, 201, '__wpdm_link_label', ''),
(2125, 201, '__wpdm_quota', ''),
(2126, 201, '__wpdm_download_limit_per_user', ''),
(2127, 201, '__wpdm_view_count', '18'),
(2128, 201, '__wpdm_download_count', ''),
(2129, 201, '__wpdm_package_size', '117.00 KB'),
(2130, 201, '__wpdm_access', 'a:1:{i:0;s:5:"guest";}'),
(2131, 201, '__wpdm_individual_file_download', '-1'),
(2132, 201, '__wpdm_cache_zip', '-1'),
(2133, 201, '__wpdm_template', 'link-template-rtlcbscustom.php'),
(2134, 201, '__wpdm_page_template', 'page-template-custom-plain.php'),
(2135, 201, '__wpdm_password', ''),
(2136, 201, '__wpdm_password_usage_limit', ''),
(2137, 201, '__wpdm_linkedin_message', ''),
(2138, 201, '__wpdm_linkedin_url', ''),
(2139, 201, '__wpdm_tweet_message', ''),
(2140, 201, '__wpdm_google_plus_1', ''),
(2141, 201, '__wpdm_twitter_handle', ''),
(2142, 201, '__wpdm_facebook_like', ''),
(2143, 201, '__wpdm_email_lock_idl', '0'),
(2144, 201, '__wpdm_icon', ''),
(2151, 42, '_wp_old_slug', 'limitless-season-05'),
(2155, 42, '_wp_old_slug', 'scorpion'),
(2158, 201, '__wpdm_fileinfo', 'a:19:{s:13:"1459315861845";a:2:{s:5:"title";s:52:"1459315861wpdm_Extreme - January 2016 Highlights.pdf";s:8:"password";s:0:"";}s:13:"1459315860940";a:2:{s:5:"title";s:53:"1459315860wpdm_Extreme - February 2016 Highlights.pdf";s:8:"password";s:0:"";}s:13:"1459315854847";a:2:{s:5:"title";s:56:"RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712_logo.png";s:8:"password";s:0:"";}s:13:"1459315853881";a:2:{s:5:"title";s:55:"RTLCBS_Extreme_PRINT_darkBG_ALPHA_PNG_20130712_logo.png";s:8:"password";s:0:"";}s:13:"1459315834143";a:2:{s:5:"title";s:53:"1459315834wpdm_16 01 05 Extreme February EPG TWN.xlsx";s:8:"password";s:0:"";}s:13:"1459315833303";a:2:{s:5:"title";s:57:"1459315833wpdm_16 01 03 Extreme February EPG Starhub.xlsx";s:8:"password";s:0:"";}s:13:"1459315832413";a:2:{s:5:"title";s:60:"1459315832wpdm_16 01 03 Extreme February EPG Affiliates.xlsx";s:8:"password";s:0:"";}s:13:"1459315829955";a:2:{s:5:"title";s:61:"1459315830wpdm_Brand and Advertising Guidelines - 11 Dec.pptx";s:8:"password";s:0:"";}s:13:"1459315828858";a:2:{s:5:"title";s:43:"1459315828wpdm_elements_xpress_us_white.png";s:8:"password";s:0:"";}s:13:"1459315827970";a:2:{s:5:"title";s:43:"1459315828wpdm_elements_xpress_us_black.png";s:8:"password";s:0:"";}s:13:"1459315827112";a:2:{s:5:"title";s:43:"1459315827wpdm_elements_xpress_uk_white.png";s:8:"password";s:0:"";}s:13:"1459315826229";a:2:{s:5:"title";s:43:"1459315826wpdm_elements_xpress_uk_black.png";s:8:"password";s:0:"";}s:13:"1459315825365";a:2:{s:5:"title";s:50:"1459315825wpdm_elements_horz_xpress_us_white_1.png";s:8:"password";s:0:"";}s:13:"1459315824506";a:2:{s:5:"title";s:50:"1459315824wpdm_elements_horz_xpress_us_black_1.png";s:8:"password";s:0:"";}s:13:"1459315823636";a:2:{s:5:"title";s:50:"1459315823wpdm_elements_horz_xpress_uk_white_1.png";s:8:"password";s:0:"";}s:13:"1459315822761";a:2:{s:5:"title";s:50:"1459315822wpdm_elements_horz_xpress_uk_black_1.png";s:8:"password";s:0:"";}s:13:"1459315821911";a:2:{s:5:"title";s:41:"1459315821wpdm_elements_FE_RedRibbon1.png";s:8:"password";s:0:"";}s:13:"1459315821041";a:2:{s:5:"title";s:42:"1459315821wpdm_elements_FE_FBlueRibbon.png";s:8:"password";s:0:"";}s:13:"1459315814555";a:2:{s:5:"title";s:72:"1459315814wpdm_Boilerplates - Network and channels - September 2015.docx";s:8:"password";s:0:"";}}'),
(2164, 175, '_wp_old_slug', 'limitless-42'),
(2237, 67, 'rule', 'a:5:{s:5:"param";s:9:"post_type";s:8:"operator";s:2:"==";s:5:"value";s:7:"wpdmpro";s:8:"order_no";i:0;s:8:"group_no";i:0;}'),
(2244, 209, '_wp_attached_file', '2016/03/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712.png'),
(2245, 209, '_wp_attachment_metadata', 'a:6:{s:5:"width";i:2550;s:6:"height";i:3300;s:4:"file";s:59:"2016/03/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712.png";s:5:"sizes";a:4:{s:9:"thumbnail";a:5:{s:4:"file";s:59:"RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";s:20:"ewww_image_optimizer";s:30:"Reduced by 9.7% (465.0&nbsp;B)";}s:6:"medium";a:5:{s:4:"file";s:59:"RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-232x300.png";s:5:"width";i:232;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";s:20:"ewww_image_optimizer";s:30:"Reduced by 7.2% (597.0&nbsp;B)";}s:12:"medium_large";a:5:{s:4:"file";s:59:"RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-768x994.png";s:5:"width";i:768;s:6:"height";i:994;s:9:"mime-type";s:9:"image/png";s:20:"ewww_image_optimizer";s:29:"Reduced by 3.3% (1.2&nbsp;kB)";}s:5:"large";a:5:{s:4:"file";s:60:"RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712-791x1024.png";s:5:"width";i:791;s:6:"height";i:1024;s:9:"mime-type";s:9:"image/png";s:20:"ewww_image_optimizer";s:29:"Reduced by 4.3% (1.8&nbsp;kB)";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}s:20:"ewww_image_optimizer";s:30:"Reduced by 8.5% (10.2&nbsp;kB)";}'),
(2246, 210, '_wp_attached_file', '2016/03/YE01079G_JAN-Monthly_Ent_60s_AGT_PostLaunch_REV151216.mov'),
(2247, 210, '_wp_attachment_metadata', 'a:12:{s:8:"lossless";b:0;s:8:"filesize";i:91462811;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:60;s:16:"length_formatted";s:4:"1:00";s:5:"width";i:1920;s:6:"height";i:1080;s:10:"fileformat";s:9:"quicktime";s:10:"dataformat";s:9:"quicktime";s:5:"codec";s:5:"H.264";s:5:"audio";a:6:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:0:"";s:11:"sample_rate";d:6400;s:8:"channels";i:0;s:15:"bits_per_sample";i:25;s:8:"lossless";b:0;}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2248, 211, '_wp_attached_file', '2016/03/YE01079H_JAN-Monthly_Ent_60s_AGT_Launch_REV151216.mov'),
(2249, 211, '_wp_attachment_metadata', 'a:12:{s:8:"lossless";b:0;s:8:"filesize";i:91451265;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:60;s:16:"length_formatted";s:4:"1:00";s:5:"width";i:1920;s:6:"height";i:1080;s:10:"fileformat";s:9:"quicktime";s:10:"dataformat";s:9:"quicktime";s:5:"codec";s:5:"H.264";s:5:"audio";a:6:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:0:"";s:11:"sample_rate";d:6400;s:8:"channels";i:0;s:15:"bits_per_sample";i:25;s:8:"lossless";b:0;}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2250, 212, '_wp_attached_file', '2016/03/YE01080H_JAN-Monthly_Ent_30s_Rev.mov'),
(2251, 212, '_wp_attachment_metadata', 'a:12:{s:8:"lossless";b:0;s:8:"filesize";i:45758670;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:30;s:16:"length_formatted";s:4:"0:30";s:5:"width";i:1920;s:6:"height";i:1080;s:10:"fileformat";s:9:"quicktime";s:10:"dataformat";s:9:"quicktime";s:5:"codec";s:5:"H.264";s:5:"audio";a:6:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:0:"";s:11:"sample_rate";d:6400;s:8:"channels";i:0;s:15:"bits_per_sample";i:25;s:8:"lossless";b:0;}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2253, 201, 'add_promo_files_0_category', 'On-Air'),
(2254, 201, '_add_promo_files_0_category', 'field_56bda97f2303e'),
(2255, 201, 'add_promo_files_0_upload_date', '20160329'),
(2256, 201, '_add_promo_files_0_upload_date', 'field_56bda9b52303f'),
(2257, 201, 'add_promo_files_0_id', 'YE01080H'),
(2258, 201, '_add_promo_files_0_id', 'field_56bda9eb23040'),
(2259, 201, 'add_promo_files_0_promo_start', '20160301'),
(2260, 201, '_add_promo_files_0_promo_start', 'field_56bda9fc23041'),
(2261, 201, 'add_promo_files_0_promo_end', '20160430'),
(2262, 201, '_add_promo_files_0_promo_end', 'field_56bdaa1123042'),
(2263, 201, 'add_promo_files_0_file_name', 'YE01080H_JAN Monthly_Ent_30s_Rev'),
(2264, 201, '_add_promo_files_0_file_name', 'field_56bdaa2523043'),
(2265, 201, 'add_promo_files_0_program_tx', 'Extreme'),
(2266, 201, '_add_promo_files_0_program_tx', 'field_56bdaa2e23044'),
(2267, 201, 'add_promo_files_0_prog_title_stunts', 'JAN Monthly'),
(2268, 201, '_add_promo_files_0_prog_title_stunts', 'field_56bdaa3923045'),
(2269, 201, 'add_promo_files_0_version', 'Rev'),
(2270, 201, '_add_promo_files_0_version', 'field_56bdaa4d23046'),
(2271, 201, 'add_promo_files_0_duration', '30s'),
(2272, 201, '_add_promo_files_0_duration', 'field_56bdaa5723047'),
(2273, 201, 'add_promo_files_0_notes', '44 MB'),
(2274, 201, '_add_promo_files_0_notes', 'field_56bdaa6223048'),
(2275, 201, 'add_promo_files_0_attached_file', '212'),
(2276, 201, '_add_promo_files_0_attached_file', 'field_56bdaa6e23049'),
(2277, 201, 'add_promo_files_0_thumbnail', ''),
(2278, 201, '_add_promo_files_0_thumbnail', 'field_56cc2f84bbefe'),
(2279, 201, 'add_promo_files_0_operator_group', 'all'),
(2280, 201, '_add_promo_files_0_operator_group', 'field_56de395d8068d'),
(2281, 201, 'add_promo_files_1_category', 'On-Air'),
(2282, 201, '_add_promo_files_1_category', 'field_56bda97f2303e'),
(2283, 201, 'add_promo_files_1_upload_date', '20160329'),
(2284, 201, '_add_promo_files_1_upload_date', 'field_56bda9b52303f'),
(2285, 201, 'add_promo_files_1_id', 'YE01079H'),
(2286, 201, '_add_promo_files_1_id', 'field_56bda9eb23040'),
(2287, 201, 'add_promo_files_1_promo_start', '20160301'),
(2288, 201, '_add_promo_files_1_promo_start', 'field_56bda9fc23041'),
(2289, 201, 'add_promo_files_1_promo_end', '20160430'),
(2290, 201, '_add_promo_files_1_promo_end', 'field_56bdaa1123042'),
(2291, 201, 'add_promo_files_1_file_name', 'YE01079H_JAN Monthly_Ent_60s_AGT_Launch_REV151216'),
(2292, 201, '_add_promo_files_1_file_name', 'field_56bdaa2523043'),
(2293, 201, 'add_promo_files_1_program_tx', 'Extreme'),
(2294, 201, '_add_promo_files_1_program_tx', 'field_56bdaa2e23044'),
(2295, 201, 'add_promo_files_1_prog_title_stunts', 'JAN Monthly'),
(2296, 201, '_add_promo_files_1_prog_title_stunts', 'field_56bdaa3923045'),
(2297, 201, 'add_promo_files_1_version', 'Rev151216'),
(2298, 201, '_add_promo_files_1_version', 'field_56bdaa4d23046'),
(2299, 201, 'add_promo_files_1_duration', '60s'),
(2300, 201, '_add_promo_files_1_duration', 'field_56bdaa5723047'),
(2301, 201, 'add_promo_files_1_notes', '87 MB'),
(2302, 201, '_add_promo_files_1_notes', 'field_56bdaa6223048'),
(2303, 201, 'add_promo_files_1_attached_file', '211'),
(2304, 201, '_add_promo_files_1_attached_file', 'field_56bdaa6e23049'),
(2305, 201, 'add_promo_files_1_thumbnail', ''),
(2306, 201, '_add_promo_files_1_thumbnail', 'field_56cc2f84bbefe'),
(2307, 201, 'add_promo_files_1_operator_group', 'all'),
(2308, 201, '_add_promo_files_1_operator_group', 'field_56de395d8068d'),
(2309, 201, 'add_promo_files_2_category', 'On-Air'),
(2310, 201, '_add_promo_files_2_category', 'field_56bda97f2303e'),
(2311, 201, 'add_promo_files_2_upload_date', '20160329'),
(2312, 201, '_add_promo_files_2_upload_date', 'field_56bda9b52303f'),
(2313, 201, 'add_promo_files_2_id', 'YE01079G'),
(2314, 201, '_add_promo_files_2_id', 'field_56bda9eb23040'),
(2315, 201, 'add_promo_files_2_promo_start', '20160301'),
(2316, 201, '_add_promo_files_2_promo_start', 'field_56bda9fc23041'),
(2317, 201, 'add_promo_files_2_promo_end', '20160430'),
(2318, 201, '_add_promo_files_2_promo_end', 'field_56bdaa1123042'),
(2319, 201, 'add_promo_files_2_file_name', 'YE01079G_JAN Monthly_Ent_60s_AGT_PostLaunch_REV151216'),
(2320, 201, '_add_promo_files_2_file_name', 'field_56bdaa2523043'),
(2321, 201, 'add_promo_files_2_program_tx', 'Extreme'),
(2322, 201, '_add_promo_files_2_program_tx', 'field_56bdaa2e23044'),
(2323, 201, 'add_promo_files_2_prog_title_stunts', 'JAN Monthly'),
(2324, 201, '_add_promo_files_2_prog_title_stunts', 'field_56bdaa3923045'),
(2325, 201, 'add_promo_files_2_version', 'Rev151216'),
(2326, 201, '_add_promo_files_2_version', 'field_56bdaa4d23046'),
(2327, 201, 'add_promo_files_2_duration', '60s'),
(2328, 201, '_add_promo_files_2_duration', 'field_56bdaa5723047'),
(2329, 201, 'add_promo_files_2_notes', '87 MB'),
(2330, 201, '_add_promo_files_2_notes', 'field_56bdaa6223048'),
(2331, 201, 'add_promo_files_2_attached_file', '210'),
(2332, 201, '_add_promo_files_2_attached_file', 'field_56bdaa6e23049'),
(2333, 201, 'add_promo_files_2_thumbnail', ''),
(2334, 201, '_add_promo_files_2_thumbnail', 'field_56cc2f84bbefe'),
(2335, 201, 'add_promo_files_2_operator_group', 'all'),
(2336, 201, '_add_promo_files_2_operator_group', 'field_56de395d8068d'),
(2338, 213, '_wp_attached_file', '2016/02/YE01134G_FEB_Monthly_Ent_60s.mov'),
(2339, 213, '_wp_attachment_metadata', 'a:12:{s:8:"lossless";b:0;s:8:"filesize";i:91863376;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:60;s:16:"length_formatted";s:4:"1:00";s:5:"width";i:1920;s:6:"height";i:1080;s:10:"fileformat";s:9:"quicktime";s:10:"dataformat";s:9:"quicktime";s:5:"codec";s:5:"H.264";s:5:"audio";a:6:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:0:"";s:11:"sample_rate";d:6400;s:8:"channels";i:0;s:15:"bits_per_sample";i:25;s:8:"lossless";b:0;}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2340, 214, '_wp_attached_file', '2016/02/YE01134H_FEB_Monthly_Ent_60s.mov'),
(2341, 214, '_wp_attachment_metadata', 'a:12:{s:8:"lossless";b:0;s:8:"filesize";i:91884118;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:60;s:16:"length_formatted";s:4:"1:00";s:5:"width";i:1920;s:6:"height";i:1080;s:10:"fileformat";s:9:"quicktime";s:10:"dataformat";s:9:"quicktime";s:5:"codec";s:5:"H.264";s:5:"audio";a:6:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:0:"";s:11:"sample_rate";d:6400;s:8:"channels";i:0;s:15:"bits_per_sample";i:25;s:8:"lossless";b:0;}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2342, 215, '_wp_attached_file', '2016/02/YE01135H_FEB_Monthly_Ent_30s.mov'),
(2343, 215, '_wp_attachment_metadata', 'a:12:{s:8:"lossless";b:0;s:8:"filesize";i:46040831;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:30;s:16:"length_formatted";s:4:"0:30";s:5:"width";i:1920;s:6:"height";i:1080;s:10:"fileformat";s:9:"quicktime";s:10:"dataformat";s:9:"quicktime";s:5:"codec";s:5:"H.264";s:5:"audio";a:6:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:0:"";s:11:"sample_rate";d:6400;s:8:"channels";i:0;s:15:"bits_per_sample";i:25;s:8:"lossless";b:0;}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2344, 98, 'add_promo_files_0_category', 'On-Air'),
(2345, 98, '_add_promo_files_0_category', 'field_56bda97f2303e'),
(2346, 98, 'add_promo_files_0_upload_date', '20160330'),
(2347, 98, '_add_promo_files_0_upload_date', 'field_56bda9b52303f'),
(2348, 98, 'add_promo_files_0_id', 'YE01134G'),
(2349, 98, '_add_promo_files_0_id', 'field_56bda9eb23040'),
(2350, 98, 'add_promo_files_0_promo_start', '20160302'),
(2351, 98, '_add_promo_files_0_promo_start', 'field_56bda9fc23041'),
(2352, 98, 'add_promo_files_0_promo_end', '20160430'),
(2353, 98, '_add_promo_files_0_promo_end', 'field_56bdaa1123042'),
(2354, 98, 'add_promo_files_0_file_name', 'YE01134G_FEB_Monthly_Ent_60s'),
(2355, 98, '_add_promo_files_0_file_name', 'field_56bdaa2523043'),
(2356, 98, 'add_promo_files_0_program_tx', 'Entertainment'),
(2357, 98, '_add_promo_files_0_program_tx', 'field_56bdaa2e23044'),
(2358, 98, 'add_promo_files_0_prog_title_stunts', 'FEB Monthly'),
(2359, 98, '_add_promo_files_0_prog_title_stunts', 'field_56bdaa3923045'),
(2360, 98, 'add_promo_files_0_version', '1'),
(2361, 98, '_add_promo_files_0_version', 'field_56bdaa4d23046'),
(2362, 98, 'add_promo_files_0_duration', '60s'),
(2363, 98, '_add_promo_files_0_duration', 'field_56bdaa5723047'),
(2364, 98, 'add_promo_files_0_notes', '88 MB'),
(2365, 98, '_add_promo_files_0_notes', 'field_56bdaa6223048'),
(2366, 98, 'add_promo_files_0_attached_file', '213'),
(2367, 98, '_add_promo_files_0_attached_file', 'field_56bdaa6e23049'),
(2368, 98, 'add_promo_files_0_thumbnail', ''),
(2369, 98, '_add_promo_files_0_thumbnail', 'field_56cc2f84bbefe'),
(2370, 98, 'add_promo_files_0_operator_group', 'all'),
(2371, 98, '_add_promo_files_0_operator_group', 'field_56de395d8068d'),
(2372, 98, 'add_promo_files_1_category', 'On-Air'),
(2373, 98, '_add_promo_files_1_category', 'field_56bda97f2303e'),
(2374, 98, 'add_promo_files_1_upload_date', '20160330'),
(2375, 98, '_add_promo_files_1_upload_date', 'field_56bda9b52303f'),
(2376, 98, 'add_promo_files_1_id', 'YE01134H'),
(2377, 98, '_add_promo_files_1_id', 'field_56bda9eb23040'),
(2378, 98, 'add_promo_files_1_promo_start', '20160301'),
(2379, 98, '_add_promo_files_1_promo_start', 'field_56bda9fc23041'),
(2380, 98, 'add_promo_files_1_promo_end', '20160430'),
(2381, 98, '_add_promo_files_1_promo_end', 'field_56bdaa1123042'),
(2382, 98, 'add_promo_files_1_file_name', 'YE01134H_FEB_Monthly_Ent_60s'),
(2383, 98, '_add_promo_files_1_file_name', 'field_56bdaa2523043'),
(2384, 98, 'add_promo_files_1_program_tx', 'Entertainment'),
(2385, 98, '_add_promo_files_1_program_tx', 'field_56bdaa2e23044'),
(2386, 98, 'add_promo_files_1_prog_title_stunts', 'FEB Monthly'),
(2387, 98, '_add_promo_files_1_prog_title_stunts', 'field_56bdaa3923045'),
(2388, 98, 'add_promo_files_1_version', '1'),
(2389, 98, '_add_promo_files_1_version', 'field_56bdaa4d23046'),
(2390, 98, 'add_promo_files_1_duration', '60s'),
(2391, 98, '_add_promo_files_1_duration', 'field_56bdaa5723047'),
(2392, 98, 'add_promo_files_1_notes', '88 MB'),
(2393, 98, '_add_promo_files_1_notes', 'field_56bdaa6223048'),
(2394, 98, 'add_promo_files_1_attached_file', '214'),
(2395, 98, '_add_promo_files_1_attached_file', 'field_56bdaa6e23049'),
(2396, 98, 'add_promo_files_1_thumbnail', ''),
(2397, 98, '_add_promo_files_1_thumbnail', 'field_56cc2f84bbefe'),
(2398, 98, 'add_promo_files_1_operator_group', 'all'),
(2399, 98, '_add_promo_files_1_operator_group', 'field_56de395d8068d'),
(2400, 98, 'add_promo_files_2_category', 'On-Air'),
(2401, 98, '_add_promo_files_2_category', 'field_56bda97f2303e'),
(2402, 98, 'add_promo_files_2_upload_date', '20160330'),
(2403, 98, '_add_promo_files_2_upload_date', 'field_56bda9b52303f'),
(2404, 98, 'add_promo_files_2_id', 'YE01135H'),
(2405, 98, '_add_promo_files_2_id', 'field_56bda9eb23040'),
(2406, 98, 'add_promo_files_2_promo_start', '20160301'),
(2407, 98, '_add_promo_files_2_promo_start', 'field_56bda9fc23041'),
(2408, 98, 'add_promo_files_2_promo_end', '20160430'),
(2409, 98, '_add_promo_files_2_promo_end', 'field_56bdaa1123042'),
(2410, 98, 'add_promo_files_2_file_name', 'YE01135H_FEB_Monthly_Ent_30s'),
(2411, 98, '_add_promo_files_2_file_name', 'field_56bdaa2523043'),
(2412, 98, 'add_promo_files_2_program_tx', 'Entertainment'),
(2413, 98, '_add_promo_files_2_program_tx', 'field_56bdaa2e23044'),
(2414, 98, 'add_promo_files_2_prog_title_stunts', 'FEB Monthly'),
(2415, 98, '_add_promo_files_2_prog_title_stunts', 'field_56bdaa3923045'),
(2416, 98, 'add_promo_files_2_version', '1'),
(2417, 98, '_add_promo_files_2_version', 'field_56bdaa4d23046'),
(2418, 98, 'add_promo_files_2_duration', '30s'),
(2419, 98, '_add_promo_files_2_duration', 'field_56bdaa5723047'),
(2420, 98, 'add_promo_files_2_notes', '44 MB'),
(2421, 98, '_add_promo_files_2_notes', 'field_56bdaa6223048'),
(2422, 98, 'add_promo_files_2_attached_file', '215'),
(2423, 98, '_add_promo_files_2_attached_file', 'field_56bdaa6e23049'),
(2424, 98, 'add_promo_files_2_thumbnail', ''),
(2425, 98, '_add_promo_files_2_thumbnail', 'field_56cc2f84bbefe'),
(2426, 98, 'add_promo_files_2_operator_group', 'all'),
(2427, 98, '_add_promo_files_2_operator_group', 'field_56de395d8068d'),
(2445, 218, '_edit_lock', '1459306764:1'),
(2446, 218, '_edit_last', '1'),
(2447, 218, '_wp_page_template', 'page-change-password.php'),
(2448, 221, '_edit_lock', '1459306807:1'),
(2449, 221, '_edit_last', '1'),
(2450, 221, '_wp_page_template', 'page-recover-password.php'),
(2458, 201, '__wpdm_files', 'a:19:{s:13:"1459315861845";s:52:"1459315861wpdm_Extreme - January 2016 Highlights.pdf";s:13:"1459315860940";s:53:"1459315860wpdm_Extreme - February 2016 Highlights.pdf";s:13:"1459315854847";s:56:"RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712_logo.png";s:13:"1459315853881";s:55:"RTLCBS_Extreme_PRINT_darkBG_ALPHA_PNG_20130712_logo.png";s:13:"1459315834143";s:53:"1459315834wpdm_16 01 05 Extreme February EPG TWN.xlsx";s:13:"1459315833303";s:57:"1459315833wpdm_16 01 03 Extreme February EPG Starhub.xlsx";s:13:"1459315832413";s:60:"1459315832wpdm_16 01 03 Extreme February EPG Affiliates.xlsx";s:13:"1459315829955";s:61:"1459315830wpdm_Brand and Advertising Guidelines - 11 Dec.pptx";s:13:"1459315828858";s:43:"1459315828wpdm_elements_xpress_us_white.png";s:13:"1459315827970";s:43:"1459315828wpdm_elements_xpress_us_black.png";s:13:"1459315827112";s:43:"1459315827wpdm_elements_xpress_uk_white.png";s:13:"1459315826229";s:43:"1459315826wpdm_elements_xpress_uk_black.png";s:13:"1459315825365";s:50:"1459315825wpdm_elements_horz_xpress_us_white_1.png";s:13:"1459315824506";s:50:"1459315824wpdm_elements_horz_xpress_us_black_1.png";s:13:"1459315823636";s:50:"1459315823wpdm_elements_horz_xpress_uk_white_1.png";s:13:"1459315822761";s:50:"1459315822wpdm_elements_horz_xpress_uk_black_1.png";s:13:"1459315821911";s:41:"1459315821wpdm_elements_FE_RedRibbon1.png";s:13:"1459315821041";s:42:"1459315821wpdm_elements_FE_FBlueRibbon.png";s:13:"1459315814555";s:72:"1459315814wpdm_Boilerplates - Network and channels - September 2015.docx";}'),
(2462, 98, '__wpdm_files', 'a:24:{s:13:"1459317043271";s:58:"1459317043wpdm_Entertainment - January 2016 Highlights.pdf";s:13:"1459317041843";s:59:"1459317041wpdm_Entertainment - February 2016 Highlights.pdf";s:13:"1459317037433";s:68:"1459317037wpdm_RTLCBS_LogoCorporate_PRINT_whiteBG_Alpha_20130724.png";s:13:"1459317036421";s:67:"1459317036wpdm_RTLCBS_LogoCorporate_PRINT_darkBG_Alpha_20130724.png";s:13:"1459317035489";s:58:"1459317035wpdm_RTLCBS_Entertainment_whiteBG_solid_logo.png";s:13:"1459317034464";s:57:"1459317034wpdm_RTLCBS_Entertainment_darkbg_solid_logo.png";s:13:"1459317032776";s:59:"1459317032wpdm_16 01 09 Entertainment EPG February TWN.xlsx";s:13:"1459317031596";s:62:"1459317031wpdm_16 01 09 Entertainment EPG February Now TV.xlsx";s:13:"1459317030496";s:60:"1459317030wpdm_16 01 09 Entertainment EPG February LeTV.xlsx";s:13:"1459317029552";s:69:"1459317029wpdm_16 01 04 Entertainment EPG February EPG Affiliate.xlsx";s:13:"1459317028424";s:63:"1459317028wpdm_16 01 03 Entertainment EPG February Starhub.xlsx";s:13:"1459317027028";s:63:"1459317027wpdm_15 12 29 Entertainment EPG February Singtel.xlsx";s:13:"1459317025660";s:61:"1459317025wpdm_Brand and Advertising Guidelines - 11 Dec.pptx";s:13:"1459317024327";s:43:"1459317024wpdm_elements_xpress_us_white.png";s:13:"1459317022895";s:43:"1459317022wpdm_elements_xpress_us_black.png";s:13:"1459317021663";s:43:"1459317021wpdm_elements_xpress_uk_white.png";s:13:"1459317020539";s:43:"1459317020wpdm_elements_xpress_uk_black.png";s:13:"1459317019515";s:50:"1459317019wpdm_elements_horz_xpress_us_white_1.png";s:13:"1459317018499";s:50:"1459317018wpdm_elements_horz_xpress_us_black_1.png";s:13:"1459317017467";s:50:"1459317017wpdm_elements_horz_xpress_uk_white_1.png";s:13:"1459317016451";s:50:"1459317016wpdm_elements_horz_xpress_uk_black_1.png";s:13:"1459317015503";s:41:"1459317015wpdm_elements_FE_RedRibbon1.png";s:13:"1459317014602";s:42:"1459317014wpdm_elements_FE_FBlueRibbon.png";s:13:"1459317009382";s:72:"1459317009wpdm_Boilerplates - Network and channels - September 2015.docx";}');
INSERT INTO `rtl21016_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2466, 175, '__wpdm_files', 'a:122:{s:13:"1459317574324";s:39:"1459317574wpdm_LIM-S01-Synopsis0110.pdf";s:13:"1459317573300";s:39:"1459317573wpdm_LIM-S01-Synopsis0109.pdf";s:13:"1459317572276";s:39:"1459317572wpdm_LIM-S01-Synopsis0108.pdf";s:13:"1459317571116";s:39:"1459317571wpdm_LIM-S01-Synopsis0107.pdf";s:13:"1459317569535";s:39:"1459317569wpdm_LIM-S01-Synopsis0106.pdf";s:13:"1459317568243";s:39:"1459317568wpdm_LIM-S01-Synopsis0105.pdf";s:13:"1459317567259";s:39:"1459317567wpdm_LIM-S01-Synopsis0104.pdf";s:13:"1459317566235";s:39:"1459317566wpdm_LIM-S01-Synopsis0103.pdf";s:13:"1459317565195";s:39:"1459317565wpdm_LIM-S01-Synopsis0102.pdf";s:13:"1459317564275";s:39:"1459317564wpdm_LIM-S01-Synopsis0101.pdf";s:13:"1459317563367";s:51:"1459317563wpdm_LIM-S01-SocialMedia_sideeffectsi.jpg";s:13:"1459317561531";s:44:"1459317561wpdm_LIM-S01-SocialMedia_Morra.jpg";s:13:"1459317560295";s:37:"1459317560wpdm_LIM-QuoteMeme-001i.psd";s:13:"1459317557226";s:37:"1459317557wpdm_LIM-QuoteMeme-001i.jpg";s:13:"1459317555502";s:45:"1459317555wpdm_LIM-JenCarpenter-Meme-107i.psd";s:13:"1459317553161";s:45:"1459317553wpdm_LIM-JenCarpenter-Meme-107i.jpg";s:13:"1459317552205";s:37:"1459317552wpdm_LIM-logo-white102i.png";s:13:"1459317551289";s:37:"1459317551wpdm_LIM-logo-white102i.eps";s:13:"1459317550161";s:37:"1459317550wpdm_LIM-logo-black101i.png";s:13:"1459317549235";s:37:"1459317549wpdm_LIM-logo-black101i.jpg";s:13:"1459317548215";s:37:"1459317548wpdm_LIM-logo-black101i.eps";s:13:"1459317547183";s:33:"1459317547wpdm_Limitless_logo.png";s:13:"1459317545549";s:37:"LIM-backplate_C242_clean101i_logo.psd";s:13:"1459317542448";s:37:"LIM-backplate_C242_clean101i_logo.jpg";s:13:"1459317541240";s:41:"1459317541wpdm_LIM-keyart-vert-TT105i.jpg";s:13:"1459317538416";s:38:"1459317538wpdm_LIM-keyart-vert104i.jpg";s:13:"1459317534796";s:46:"1459317534wpdm_LIM-keyart-horiz-TT-TAG103i.tif";s:13:"1459317529367";s:39:"1459317529wpdm_LIM-keyart-horiz101i.jpg";s:13:"1459317496503";s:39:"1459317496wpdm_LIM-epi0103-D_1498bi.jpg";s:13:"1459317494859";s:39:"1459317494wpdm_LIM-epi0103-D_1495bi.jpg";s:13:"1459317493015";s:39:"1459317493wpdm_LIM-epi0103-D_1437bi.jpg";s:13:"1459317490882";s:39:"1459317490wpdm_LIM-epi0103-D_1416bi.jpg";s:13:"1459317488722";s:39:"1459317488wpdm_LIM-epi0103-D_1015bi.jpg";s:13:"1459317486668";s:39:"1459317486wpdm_LIM-epi0103-D_0983bi.jpg";s:13:"1459317484822";s:39:"1459317484wpdm_LIM-epi0103-D_0952bi.jpg";s:13:"1459317482672";s:39:"1459317482wpdm_LIM-epi0103-D_0886bi.jpg";s:13:"1459317480728";s:39:"1459317480wpdm_LIM-epi0103-D_0861bi.jpg";s:13:"1459317478642";s:39:"1459317478wpdm_LIM-epi0103-D_0854bi.jpg";s:13:"1459317476498";s:39:"1459317476wpdm_LIM-epi0103-D_0848bi.jpg";s:13:"1459317474890";s:39:"1459317474wpdm_LIM-epi0103-D_0657bi.jpg";s:13:"1459317473462";s:39:"1459317473wpdm_LIM-epi0103-D_0608bi.jpg";s:13:"1459317471654";s:39:"1459317471wpdm_LIM-epi0103-D_0579bi.jpg";s:13:"1459317469610";s:40:"1459317469wpdm_LIM-epi0103-D_0551b2i.jpg";s:13:"1459317468342";s:39:"1459317468wpdm_LIM-epi0103-D_0545bi.jpg";s:13:"1459317467114";s:39:"1459317467wpdm_LIM-epi0103-D_0423bi.jpg";s:13:"1459317465762";s:39:"1459317465wpdm_LIM-epi0103-D_0019bi.jpg";s:13:"1459317464552";s:39:"1459317464wpdm_LIM-epi0103-D_0008bi.jpg";s:13:"1459317463432";s:39:"1459317463wpdm_LIM-epi0103-D_0004bi.jpg";s:13:"1459317462440";s:39:"1459317462wpdm_LIM-epi0103-D_0003bi.jpg";s:13:"1459317461268";s:37:"1459317461wpdm_LIM-epi0102-NAZ6bi.jpg";s:13:"1459317460160";s:39:"1459317460wpdm_LIM-epi0102-Image24i.jpg";s:13:"1459317459344";s:39:"1459317459wpdm_LIM-epi0102-Image19i.jpg";s:13:"1459317458456";s:39:"1459317458wpdm_LIM-epi0102-Image18i.jpg";s:13:"1459317457552";s:39:"1459317457wpdm_LIM-epi0102-Image17i.jpg";s:13:"1459317456612";s:39:"1459317456wpdm_LIM-epi0102-Image16i.jpg";s:13:"1459317455740";s:39:"1459317455wpdm_LIM-epi0102-Image15i.jpg";s:13:"1459317454772";s:39:"1459317454wpdm_LIM-epi0102-Image14i.jpg";s:13:"1459317453900";s:39:"1459317453wpdm_LIM-epi0102-Image12i.jpg";s:13:"1459317452804";s:38:"1459317452wpdm_LIM-epi0102-Image8i.jpg";s:13:"1459317451952";s:38:"1459317452wpdm_LIM-epi0102-Image6i.jpg";s:13:"1459317450692";s:38:"1459317450wpdm_LIM-epi0102-Image2i.jpg";s:13:"1459317449804";s:38:"1459317449wpdm_LIM-epi0102-Image1i.jpg";s:13:"1459317448784";s:39:"1459317448wpdm_LIM-epi0102-D_0357bi.jpg";s:13:"1459317447344";s:39:"1459317447wpdm_LIM-epi0102-D_0333bi.jpg";s:13:"1459317446012";s:39:"1459317445wpdm_LIM-epi0102-D_0305bi.jpg";s:13:"1459317444692";s:39:"1459317444wpdm_LIM-epi0102-D_0262bi.jpg";s:13:"1459317443508";s:39:"1459317443wpdm_LIM-epi0102-D_0251bi.jpg";s:13:"1459317442336";s:39:"1459317442wpdm_LIM-epi0102-D_0234bi.jpg";s:13:"1459317441208";s:39:"1459317441wpdm_LIM-epi0102-D_0230bi.jpg";s:13:"1459317440108";s:39:"1459317440wpdm_LIM-epi0102-D_0193bi.jpg";s:13:"1459317438639";s:39:"1459317438wpdm_LIM-epi0102-D_0149bi.jpg";s:13:"1459317436991";s:39:"1459317437wpdm_LIM-epi0102-D_0097bi.jpg";s:13:"1459317435587";s:39:"1459317435wpdm_LIM-epi0102-D_0092bi.jpg";s:13:"1459317434226";s:39:"1459317434wpdm_LIM-epi0102-D_0059bi.jpg";s:13:"1459317433006";s:39:"1459317432wpdm_LIM-epi0102-D_0040bi.jpg";s:13:"1459317431498";s:39:"1459317431wpdm_LIM-epi0102-D_0027bi.jpg";s:13:"1459317430270";s:39:"1459317430wpdm_LIM-epi0102-D_0020bi.jpg";s:13:"1459317429436";s:37:"1459317429wpdm_LIM-epi0102-0758bi.jpg";s:13:"1459317427996";s:37:"1459317427wpdm_LIM-epi0102-0670bi.jpg";s:13:"1459317426760";s:37:"1459317426wpdm_LIM-epi0102-0662bi.jpg";s:13:"1459317425433";s:37:"1459317425wpdm_LIM-epi0102-0634bi.jpg";s:13:"1459317424103";s:37:"1459317424wpdm_LIM-epi0102-0517bi.jpg";s:13:"1459317423107";s:37:"1459317423wpdm_LIM-epi0102-0511bi.jpg";s:13:"1459317422159";s:37:"1459317422wpdm_LIM-epi0102-0458bi.jpg";s:13:"1459317421003";s:37:"1459317421wpdm_LIM-epi0102-0429bi.jpg";s:13:"1459317419821";s:37:"1459317419wpdm_LIM-epi0102-0290bi.jpg";s:13:"1459317418677";s:37:"1459317418wpdm_LIM-epi0102-0266bi.jpg";s:13:"1459317417401";s:37:"1459317417wpdm_LIM-epi0102-0253bi.jpg";s:13:"1459317416501";s:37:"1459317416wpdm_LIM-epi0102-0243bi.jpg";s:13:"1459317415101";s:37:"1459317415wpdm_LIM-epi0102-0213bi.jpg";s:13:"1459317413396";s:37:"1459317413wpdm_LIM-epi0102-0159bi.jpg";s:13:"1459317411814";s:37:"1459317411wpdm_LIM-epi0102-0051bi.jpg";s:13:"1459317410686";s:37:"1459317410wpdm_LIM-epi0102-0044bi.jpg";s:13:"1459317409364";s:39:"1459317409wpdm_LIM-epi0101-Image14i.jpg";s:13:"1459317408124";s:39:"1459317408wpdm_LIM-epi0101-Image12i.jpg";s:13:"1459317407248";s:39:"1459317407wpdm_LIM-epi0101-Image11i.jpg";s:13:"1459317406400";s:38:"1459317406wpdm_LIM-epi0101-Image4i.jpg";s:13:"1459317405360";s:38:"1459317405wpdm_LIM-epi0101-Image2i.jpg";s:13:"1459317404435";s:38:"1459317404wpdm_LIM-epi0101-D1319bi.jpg";s:13:"1459317403547";s:38:"1459317403wpdm_LIM-epi0101-D1233bi.jpg";s:13:"1459317402095";s:38:"1459317402wpdm_LIM-epi0101-D1064bi.jpg";s:13:"1459317400603";s:38:"1459317400wpdm_LIM-epi0101-D0912bi.jpg";s:13:"1459317399011";s:38:"1459317399wpdm_LIM-epi0101-D0868bi.jpg";s:13:"1459317397491";s:38:"1459317397wpdm_LIM-epi0101-D0848bi.jpg";s:13:"1459317396143";s:38:"1459317396wpdm_LIM-epi0101-D0714bi.jpg";s:13:"1459317394381";s:38:"1459317394wpdm_LIM-epi0101-D0707bi.jpg";s:13:"1459317392869";s:38:"1459317392wpdm_LIM-epi0101-D0659bi.jpg";s:13:"1459317391645";s:38:"1459317391wpdm_LIM-epi0101-D0581bi.jpg";s:13:"1459317389797";s:38:"1459317389wpdm_LIM-epi0101-D0329bi.jpg";s:13:"1459317388501";s:38:"1459317388wpdm_LIM-epi0101-D0243bi.jpg";s:13:"1459317387337";s:38:"1459317387wpdm_LIM-epi0101-D0110bi.jpg";s:13:"1459317386009";s:37:"1459317386wpdm_LIM-epi0101-3518bi.jpg";s:13:"1459317384889";s:37:"1459317384wpdm_LIM-epi0101-3015bi.jpg";s:13:"1459317383244";s:37:"1459317383wpdm_LIM-epi0101-3007bi.jpg";s:13:"1459317381808";s:37:"1459317381wpdm_LIM-epi0101-2236bi.jpg";s:13:"1459317380476";s:37:"1459317380wpdm_LIM-epi0101-1358bi.jpg";s:13:"1459317378836";s:37:"1459317378wpdm_LIM-epi0101-1267Bi.jpg";s:13:"1459317377664";s:36:"1459317377wpdm_LIM-epi0101-472bi.jpg";s:13:"1459317376276";s:36:"1459317376wpdm_LIM-epi0101-338bi.jpg";s:13:"1459317374744";s:36:"1459317374wpdm_LIM-epi0101-141bi.jpg";s:13:"1459317373140";s:37:"1459317373wpdm_LIM-epi0101-38BWSi.jpg";s:13:"1459317356525";s:47:"1459317356wpdm_Limitless factsheet and bios.pdf";}'),
(2473, 223, '_wp_attached_file', '2016/03/YE01019G_Limitless_NewJ_Wed9pm_SWAG.mov'),
(2474, 223, '_wp_attachment_metadata', 'a:12:{s:8:"lossless";b:0;s:8:"filesize";i:45677924;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:30;s:16:"length_formatted";s:4:"0:30";s:5:"width";i:1920;s:6:"height";i:1080;s:10:"fileformat";s:9:"quicktime";s:10:"dataformat";s:9:"quicktime";s:5:"codec";s:5:"H.264";s:5:"audio";a:6:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:0:"";s:11:"sample_rate";d:6400;s:8:"channels";i:0;s:15:"bits_per_sample";i:25;s:8:"lossless";b:0;}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2475, 224, '_wp_attached_file', '2016/03/YE01045G-Limitless_RevJ_Wed9pm_SWAG_NoXpress.mov'),
(2476, 224, '_wp_attachment_metadata', 'a:12:{s:8:"lossless";b:0;s:8:"filesize";i:45905201;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:30;s:16:"length_formatted";s:4:"0:30";s:5:"width";i:1920;s:6:"height";i:1080;s:10:"fileformat";s:9:"quicktime";s:10:"dataformat";s:9:"quicktime";s:5:"codec";s:5:"H.264";s:5:"audio";a:6:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:0:"";s:11:"sample_rate";d:6400;s:8:"channels";i:0;s:15:"bits_per_sample";i:25;s:8:"lossless";b:0;}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2477, 225, '_wp_attached_file', '2016/03/YE01105G_Limitless_NewK_Wed9pm_Xpress_Bruce.mov'),
(2478, 225, '_wp_attachment_metadata', 'a:12:{s:8:"lossless";b:0;s:8:"filesize";i:45928131;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:30;s:16:"length_formatted";s:4:"0:30";s:5:"width";i:1920;s:6:"height";i:1080;s:10:"fileformat";s:9:"quicktime";s:10:"dataformat";s:9:"quicktime";s:5:"codec";s:5:"H.264";s:5:"audio";a:6:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:0:"";s:11:"sample_rate";d:6400;s:8:"channels";i:0;s:15:"bits_per_sample";i:25;s:8:"lossless";b:0;}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2479, 226, '_wp_attached_file', '2016/03/YE01106G_Limitless_NewK_Wed9pm_BrandNew_Bruce.mov'),
(2480, 226, '_wp_attachment_metadata', 'a:12:{s:8:"lossless";b:0;s:8:"filesize";i:45939175;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:30;s:16:"length_formatted";s:4:"0:30";s:5:"width";i:1920;s:6:"height";i:1080;s:10:"fileformat";s:9:"quicktime";s:10:"dataformat";s:9:"quicktime";s:5:"codec";s:5:"H.264";s:5:"audio";a:6:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:0:"";s:11:"sample_rate";d:6400;s:8:"channels";i:0;s:15:"bits_per_sample";i:25;s:8:"lossless";b:0;}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2481, 175, 'add_promo_files_2_category', 'On-Air'),
(2482, 175, '_add_promo_files_2_category', 'field_56bda97f2303e'),
(2483, 175, 'add_promo_files_2_upload_date', '20160330'),
(2484, 175, '_add_promo_files_2_upload_date', 'field_56bda9b52303f'),
(2485, 175, 'add_promo_files_2_id', 'YE01045G'),
(2486, 175, '_add_promo_files_2_id', 'field_56bda9eb23040'),
(2487, 175, 'add_promo_files_2_promo_start', '20160301'),
(2488, 175, '_add_promo_files_2_promo_start', 'field_56bda9fc23041'),
(2489, 175, 'add_promo_files_2_promo_end', '20160331'),
(2490, 175, '_add_promo_files_2_promo_end', 'field_56bdaa1123042'),
(2491, 175, 'add_promo_files_2_file_name', 'YE01045G Limitless_RevJ_Wed9pm_SWAG_NoXpress'),
(2492, 175, '_add_promo_files_2_file_name', 'field_56bdaa2523043'),
(2493, 175, 'add_promo_files_2_program_tx', 'Entertainment'),
(2494, 175, '_add_promo_files_2_program_tx', 'field_56bdaa2e23044'),
(2495, 175, 'add_promo_files_2_prog_title_stunts', 'Limitless'),
(2496, 175, '_add_promo_files_2_prog_title_stunts', 'field_56bdaa3923045'),
(2497, 175, 'add_promo_files_2_version', 'RevJ'),
(2498, 175, '_add_promo_files_2_version', 'field_56bdaa4d23046'),
(2499, 175, 'add_promo_files_2_duration', '30s'),
(2500, 175, '_add_promo_files_2_duration', 'field_56bdaa5723047'),
(2501, 175, 'add_promo_files_2_notes', '44 MB'),
(2502, 175, '_add_promo_files_2_notes', 'field_56bdaa6223048'),
(2503, 175, 'add_promo_files_2_attached_file', '224'),
(2504, 175, '_add_promo_files_2_attached_file', 'field_56bdaa6e23049'),
(2505, 175, 'add_promo_files_2_thumbnail', ''),
(2506, 175, '_add_promo_files_2_thumbnail', 'field_56cc2f84bbefe'),
(2507, 175, 'add_promo_files_2_operator_group', 'all'),
(2508, 175, '_add_promo_files_2_operator_group', 'field_56de395d8068d'),
(2509, 175, 'add_promo_files_3_category', 'On-Air'),
(2510, 175, '_add_promo_files_3_category', 'field_56bda97f2303e'),
(2511, 175, 'add_promo_files_3_upload_date', '20160330'),
(2512, 175, '_add_promo_files_3_upload_date', 'field_56bda9b52303f'),
(2513, 175, 'add_promo_files_3_id', 'YE01019G'),
(2514, 175, '_add_promo_files_3_id', 'field_56bda9eb23040'),
(2515, 175, 'add_promo_files_3_promo_start', '20160301'),
(2516, 175, '_add_promo_files_3_promo_start', 'field_56bda9fc23041'),
(2517, 175, 'add_promo_files_3_promo_end', '20160331'),
(2518, 175, '_add_promo_files_3_promo_end', 'field_56bdaa1123042'),
(2519, 175, 'add_promo_files_3_file_name', 'YE01019G_Limitless_NewJ_Wed9pm_SWAG'),
(2520, 175, '_add_promo_files_3_file_name', 'field_56bdaa2523043'),
(2521, 175, 'add_promo_files_3_program_tx', 'Entertainment'),
(2522, 175, '_add_promo_files_3_program_tx', 'field_56bdaa2e23044'),
(2523, 175, 'add_promo_files_3_prog_title_stunts', 'Limitless'),
(2524, 175, '_add_promo_files_3_prog_title_stunts', 'field_56bdaa3923045'),
(2525, 175, 'add_promo_files_3_version', 'RevJ'),
(2526, 175, '_add_promo_files_3_version', 'field_56bdaa4d23046'),
(2527, 175, 'add_promo_files_3_duration', '30s'),
(2528, 175, '_add_promo_files_3_duration', 'field_56bdaa5723047'),
(2529, 175, 'add_promo_files_3_notes', '44 MB'),
(2530, 175, '_add_promo_files_3_notes', 'field_56bdaa6223048'),
(2531, 175, 'add_promo_files_3_attached_file', '223'),
(2532, 175, '_add_promo_files_3_attached_file', 'field_56bdaa6e23049'),
(2533, 175, 'add_promo_files_3_thumbnail', ''),
(2534, 175, '_add_promo_files_3_thumbnail', 'field_56cc2f84bbefe'),
(2535, 175, 'add_promo_files_3_operator_group', 'all'),
(2536, 175, '_add_promo_files_3_operator_group', 'field_56de395d8068d'),
(2548, 201, '__wpdm_masterkey', '56fb736c90a5a'),
(2551, 227, '_wp_attached_file', '2016/02/XFUK12_TX18_Seann-Miley-Moore-Singoff_SunMon1030am.mp4'),
(2552, 227, '_wp_attachment_metadata', 'a:10:{s:8:"filesize";i:24799776;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:148;s:16:"length_formatted";s:4:"2:28";s:5:"width";i:640;s:6:"height";i:360;s:10:"fileformat";s:3:"mp4";s:10:"dataformat";s:9:"quicktime";s:5:"audio";a:7:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:19:"ISO/IEC 14496-3 AAC";s:11:"sample_rate";d:44100;s:8:"channels";i:2;s:15:"bits_per_sample";i:16;s:8:"lossless";b:0;s:11:"channelmode";s:6:"stereo";}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2553, 228, '_wp_attached_file', '2016/02/XFUK12_TX24_4th-Impact_SunMon1030am.mp4'),
(2554, 228, '_wp_attachment_metadata', 'a:10:{s:8:"filesize";i:113434937;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:680;s:16:"length_formatted";s:5:"11:20";s:5:"width";i:640;s:6:"height";i:360;s:10:"fileformat";s:3:"mp4";s:10:"dataformat";s:9:"quicktime";s:5:"audio";a:7:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:19:"ISO/IEC 14496-3 AAC";s:11:"sample_rate";d:44100;s:8:"channels";i:2;s:15:"bits_per_sample";i:16;s:8:"lossless";b:0;s:11:"channelmode";s:6:"stereo";}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2555, 229, '_wp_attached_file', '2016/02/XFUK12_TX28_FinalePerformance.mp4'),
(2556, 229, '_wp_attachment_metadata', 'a:10:{s:8:"filesize";i:34878756;s:9:"mime_type";s:15:"video/quicktime";s:6:"length";i:206;s:16:"length_formatted";s:4:"3:26";s:5:"width";i:640;s:6:"height";i:360;s:10:"fileformat";s:3:"mp4";s:10:"dataformat";s:9:"quicktime";s:5:"audio";a:7:{s:10:"dataformat";s:3:"mp4";s:5:"codec";s:19:"ISO/IEC 14496-3 AAC";s:11:"sample_rate";d:44100;s:8:"channels";i:2;s:15:"bits_per_sample";i:16;s:8:"lossless";b:0;s:11:"channelmode";s:6:"stereo";}s:20:"ewww_image_optimizer";s:14:"Unknown type: ";}'),
(2557, 98, 'add_promo_files_3_category', 'Social'),
(2558, 98, '_add_promo_files_3_category', 'field_56bda97f2303e'),
(2559, 98, 'add_promo_files_3_upload_date', '20160330'),
(2560, 98, '_add_promo_files_3_upload_date', 'field_56bda9b52303f'),
(2561, 98, 'add_promo_files_3_id', 'XFUK12_TX18'),
(2562, 98, '_add_promo_files_3_id', 'field_56bda9eb23040'),
(2563, 98, 'add_promo_files_3_promo_start', '20160301'),
(2564, 98, '_add_promo_files_3_promo_start', 'field_56bda9fc23041'),
(2565, 98, 'add_promo_files_3_promo_end', '20160430'),
(2566, 98, '_add_promo_files_3_promo_end', 'field_56bdaa1123042'),
(2567, 98, 'add_promo_files_3_file_name', 'XFUK12_TX18_Seann Miley Moore Singoff_Sun&Mon1030am'),
(2568, 98, '_add_promo_files_3_file_name', 'field_56bdaa2523043'),
(2569, 98, 'add_promo_files_3_program_tx', 'Entertainment'),
(2570, 98, '_add_promo_files_3_program_tx', 'field_56bdaa2e23044'),
(2571, 98, 'add_promo_files_3_prog_title_stunts', 'Seann Miley Moore Singoff'),
(2572, 98, '_add_promo_files_3_prog_title_stunts', 'field_56bdaa3923045'),
(2573, 98, 'add_promo_files_3_version', '1'),
(2574, 98, '_add_promo_files_3_version', 'field_56bdaa4d23046'),
(2575, 98, 'add_promo_files_3_duration', '30s'),
(2576, 98, '_add_promo_files_3_duration', 'field_56bdaa5723047'),
(2577, 98, 'add_promo_files_3_notes', '24 MB'),
(2578, 98, '_add_promo_files_3_notes', 'field_56bdaa6223048'),
(2579, 98, 'add_promo_files_3_attached_file', '227'),
(2580, 98, '_add_promo_files_3_attached_file', 'field_56bdaa6e23049'),
(2581, 98, 'add_promo_files_3_thumbnail', ''),
(2582, 98, '_add_promo_files_3_thumbnail', 'field_56cc2f84bbefe'),
(2583, 98, 'add_promo_files_3_operator_group', 'all'),
(2584, 98, '_add_promo_files_3_operator_group', 'field_56de395d8068d'),
(2585, 98, 'add_promo_files_4_category', 'Social'),
(2586, 98, '_add_promo_files_4_category', 'field_56bda97f2303e'),
(2587, 98, 'add_promo_files_4_upload_date', '20160330'),
(2588, 98, '_add_promo_files_4_upload_date', 'field_56bda9b52303f'),
(2589, 98, 'add_promo_files_4_id', 'XFUK12_TX24'),
(2590, 98, '_add_promo_files_4_id', 'field_56bda9eb23040'),
(2591, 98, 'add_promo_files_4_promo_start', '20160301'),
(2592, 98, '_add_promo_files_4_promo_start', 'field_56bda9fc23041'),
(2593, 98, 'add_promo_files_4_promo_end', '20160430'),
(2594, 98, '_add_promo_files_4_promo_end', 'field_56bdaa1123042'),
(2595, 98, 'add_promo_files_4_file_name', 'XFUK12_TX24_4th Impact_Sun&Mon1030am'),
(2596, 98, '_add_promo_files_4_file_name', 'field_56bdaa2523043'),
(2597, 98, 'add_promo_files_4_program_tx', 'Entertainment'),
(2598, 98, '_add_promo_files_4_program_tx', 'field_56bdaa2e23044'),
(2599, 98, 'add_promo_files_4_prog_title_stunts', '4th Impact'),
(2600, 98, '_add_promo_files_4_prog_title_stunts', 'field_56bdaa3923045'),
(2601, 98, 'add_promo_files_4_version', '1'),
(2602, 98, '_add_promo_files_4_version', 'field_56bdaa4d23046'),
(2603, 98, 'add_promo_files_4_duration', '30s'),
(2604, 98, '_add_promo_files_4_duration', 'field_56bdaa5723047'),
(2605, 98, 'add_promo_files_4_notes', '108 MB'),
(2606, 98, '_add_promo_files_4_notes', 'field_56bdaa6223048'),
(2607, 98, 'add_promo_files_4_attached_file', '228'),
(2608, 98, '_add_promo_files_4_attached_file', 'field_56bdaa6e23049'),
(2609, 98, 'add_promo_files_4_thumbnail', ''),
(2610, 98, '_add_promo_files_4_thumbnail', 'field_56cc2f84bbefe'),
(2611, 98, 'add_promo_files_4_operator_group', 'all'),
(2612, 98, '_add_promo_files_4_operator_group', 'field_56de395d8068d'),
(2613, 98, 'add_promo_files_5_category', 'Social'),
(2614, 98, '_add_promo_files_5_category', 'field_56bda97f2303e'),
(2615, 98, 'add_promo_files_5_upload_date', '20160330'),
(2616, 98, '_add_promo_files_5_upload_date', 'field_56bda9b52303f'),
(2617, 98, 'add_promo_files_5_id', 'XFUK12_TX28'),
(2618, 98, '_add_promo_files_5_id', 'field_56bda9eb23040'),
(2619, 98, 'add_promo_files_5_promo_start', '20160301'),
(2620, 98, '_add_promo_files_5_promo_start', 'field_56bda9fc23041'),
(2621, 98, 'add_promo_files_5_promo_end', '20160430'),
(2622, 98, '_add_promo_files_5_promo_end', 'field_56bdaa1123042'),
(2623, 98, 'add_promo_files_5_file_name', 'XFUK12_TX28_FinalePerformance'),
(2624, 98, '_add_promo_files_5_file_name', 'field_56bdaa2523043'),
(2625, 98, 'add_promo_files_5_program_tx', 'Entertainment'),
(2626, 98, '_add_promo_files_5_program_tx', 'field_56bdaa2e23044'),
(2627, 98, 'add_promo_files_5_prog_title_stunts', 'FinalePerformance'),
(2628, 98, '_add_promo_files_5_prog_title_stunts', 'field_56bdaa3923045'),
(2629, 98, 'add_promo_files_5_version', '1'),
(2630, 98, '_add_promo_files_5_version', 'field_56bdaa4d23046'),
(2631, 98, 'add_promo_files_5_duration', '30s'),
(2632, 98, '_add_promo_files_5_duration', 'field_56bdaa5723047'),
(2633, 98, 'add_promo_files_5_notes', '33 MB'),
(2634, 98, '_add_promo_files_5_notes', 'field_56bdaa6223048'),
(2635, 98, 'add_promo_files_5_attached_file', '229'),
(2636, 98, '_add_promo_files_5_attached_file', 'field_56bdaa6e23049'),
(2637, 98, 'add_promo_files_5_thumbnail', ''),
(2638, 98, '_add_promo_files_5_thumbnail', 'field_56cc2f84bbefe'),
(2639, 98, 'add_promo_files_5_operator_group', 'all'),
(2640, 98, '_add_promo_files_5_operator_group', 'field_56de395d8068d'),
(2649, 98, '__wpdm_masterkey', '56fc866a35f7e'),
(2657, 175, '__wpdm_masterkey', '56fc89b0e6ebb'),
(2658, 42, '__wpdm_masterkey', '56fc8d1848b3a'),
(2661, 231, '_edit_lock', '1459848840:1');

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_posts`
--

CREATE TABLE IF NOT EXISTS `rtl21016_posts` (
`ID` bigint(20) unsigned NOT NULL,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=233 ;

--
-- Dumping data for table `rtl21016_posts`
--

INSERT INTO `rtl21016_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2016-02-10 09:39:11', '2016-02-10 09:39:11', 'Welcome to WordPress. This is your first post. Edit or delete it, then start writing!', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2016-02-10 09:39:11', '2016-02-10 09:39:11', '', 0, 'http://localhost/rtlcbsasia/?p=1', 0, 'post', '', 1),
(8, 1, '2016-02-12 01:47:00', '2016-02-12 01:47:00', '', 'Cart', '', 'publish', 'closed', 'closed', '', 'cart', '', '', '2016-03-17 02:14:21', '2016-03-17 02:14:21', '', 0, 'http://localhost/rtlcbsasia/cart/', 0, 'page', '', 0),
(15, 1, '2016-02-12 03:44:40', '2016-02-12 03:44:40', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2016-03-15 06:38:57', '2016-03-15 06:38:57', '', 0, 'http://localhost/rtlcbsasia/?page_id=15', 0, 'page', '', 0),
(16, 1, '2016-02-12 03:44:40', '2016-02-12 03:44:40', '[wpdm_category]', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-12 03:44:40', '2016-02-12 03:44:40', '', 15, 'http://localhost/rtlcbsasia/2016/02/12/15-revision-v1/', 0, 'revision', '', 0),
(17, 1, '2016-02-12 03:48:12', '2016-02-12 03:48:12', '[wpdm_category id="Category Slug(s)" operator="IN" title="Custom Title Here or 1" desc="Custom Dscription or 1" toolbar="1" order_by="field name" order="asc or desc" item_per_page="10" template="temaplte name or ID" cols=4 colspad=2 colsphone=1]', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-12 03:48:12', '2016-02-12 03:48:12', '', 15, 'http://localhost/rtlcbsasia/2016/02/12/15-revision-v1/', 0, 'revision', '', 0),
(18, 1, '2016-02-12 03:51:04', '2016-02-12 03:51:04', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="field name" order="asc or desc" item_per_page="10" template="temaplte name or ID" cols=4 colspad=2 colsphone=1]', 'Home', '', 'inherit', 'closed', 'closed', '', '15-autosave-v1', '', '', '2016-02-12 03:51:04', '2016-02-12 03:51:04', '', 15, 'http://localhost/rtlcbsasia/2016/02/12/15-autosave-v1/', 0, 'revision', '', 0),
(19, 1, '2016-02-12 03:51:51', '2016-02-12 03:51:51', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="10" template="" cols=4 colspad=2 colsphone=1]', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-12 03:51:51', '2016-02-12 03:51:51', '', 15, 'http://localhost/rtlcbsasia/2016/02/12/15-revision-v1/', 0, 'revision', '', 0),
(20, 1, '2016-02-12 03:52:05', '2016-02-12 03:52:05', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="10" template="" cols=2 colspad=2 colsphone=1]', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-12 03:52:05', '2016-02-12 03:52:05', '', 15, 'http://localhost/rtlcbsasia/2016/02/12/15-revision-v1/', 0, 'revision', '', 0),
(21, 1, '2016-02-12 03:52:17', '2016-02-12 03:52:17', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="10" template="" cols=1 colspad=2 colsphone=1]', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-12 03:52:17', '2016-02-12 03:52:17', '', 15, 'http://localhost/rtlcbsasia/2016/02/12/15-revision-v1/', 0, 'revision', '', 0),
(22, 1, '2016-02-12 03:52:40', '2016-02-12 03:52:40', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="10" template="" cols=2 colspad=1 colsphone=1]', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-12 03:52:40', '2016-02-12 03:52:40', '', 15, 'http://localhost/rtlcbsasia/2016/02/12/15-revision-v1/', 0, 'revision', '', 0),
(23, 1, '2016-02-12 03:53:20', '2016-02-12 03:53:20', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="10" template="" cols=1 colspad=1 colsphone=1]', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-12 03:53:20', '2016-02-12 03:53:20', '', 15, 'http://localhost/rtlcbsasia/2016/02/12/15-revision-v1/', 0, 'revision', '', 0),
(42, 1, '2016-01-12 04:13:49', '2016-01-12 04:13:49', 'SCORPION, inspired by a true story, is a high-octane drama about eccentric genius Walter O’Brien (Elyes Gabel) and his team of brilliant misfits who comprise the last line of defense against complex, high-tech threats of the modern age. As Homeland Security’s new think tank, O’Brien’s “Scorpion” team includes Toby Curtis (Eddie Kaye Thomas), an expert behaviorist who can read anyone; Happy Quinn (Jadyn Wong), a mechanical prodigy; and Sylvester Dodd (Ari Stidham), a statistics guru. Pooling their extensive technological knowledge to solve mind-boggling predicaments amazes federal agent Cabe Gallo (Robert Patrick), who shares a harrowing history with O’Brien. However, while this socially awkward group is comfortable with each other’s humor and quirks, life outside their circle confounds them, so they rely on Paige Dineen (Katharine McPhee), who has a young, gifted son, to translate the world for them. At last, these nerdy masterminds have found the perfect job: a place where they can apply their exceptional brainpower to solve the nation’s crises, while also helping each other learn how to fit in. Nick Santora, Emmy Award winner Nicholas Wootton, Alex Kurtzman, Roberto Orci, Heather Kadin, Walter O’Brien, Scooter Braun and Justin Lin are the executive producers for CBS Television Studios. Justin Lin (“The Fast and the Furious”) directed the pilot.', 'Scorpion', 'SCORPION, inspired by a true story, is a high-octane drama <br>\r\nabout eccentric genius Walter O’Brien (Elyes Gabel) and his <br>\r\nteam of brilliant misfits who comprise the last line of defense <br>\r\nagainst complex, high-tech threats of the modern age. As Homeland', 'publish', 'open', 'closed', '', 'scorpion-2', '', '', '2016-03-31 02:36:08', '2016-03-31 02:36:08', '', 0, 'http://localhost/rtlcbsasia/?post_type=wpdmpro&#038;p=42', 0, 'wpdmpro', '', 0),
(46, 1, '2016-02-12 04:17:20', '2016-02-12 04:17:20', '', 'SCP-keyart-horiz-minilayers203i', '', 'inherit', 'open', 'closed', '', 'scp-keyart-horiz-minilayers203i', '', '', '2016-02-12 04:17:20', '2016-02-12 04:17:20', '', 0, 'http://localhost/rtlcbsasia/wp-content/uploads/2016/02/SCP-keyart-horiz-minilayers203i.jpg', 0, 'attachment', 'image/jpeg', 0),
(67, 1, '2016-02-12 09:49:16', '2016-02-12 09:49:16', '', 'Shows & Files', '', 'publish', 'closed', 'closed', '', 'acf_shows-files', '', '', '2016-03-29 07:07:40', '2016-03-29 07:07:40', '', 0, 'http://localhost/rtlcbsasia/?post_type=acf&#038;p=67', 0, 'acf', '', 0),
(79, 1, '2016-02-16 09:11:31', '2016-02-16 09:11:31', 'dianne\r\n[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="10" template="" cols=1 colspad=1 colsphone=1]\r\ndianne', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-16 09:11:31', '2016-02-16 09:11:31', '', 15, 'http://localhost/rtlcbsasia/2016/02/16/15-revision-v1/', 0, 'revision', '', 0),
(80, 1, '2016-02-16 09:36:55', '2016-02-16 09:36:55', 'dianne\r\n[wpdm_category]\r\ndianne', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-16 09:36:55', '2016-02-16 09:36:55', '', 15, 'http://localhost/rtlcbsasia/2016/02/16/15-revision-v1/', 0, 'revision', '', 0),
(81, 1, '2016-02-16 09:37:22', '2016-02-16 09:37:22', 'dianne\r\n[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="10" ]\r\ndianne', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-16 09:37:22', '2016-02-16 09:37:22', '', 15, 'http://localhost/rtlcbsasia/2016/02/16/15-revision-v1/', 0, 'revision', '', 0),
(85, 1, '2016-02-18 09:07:32', '2016-02-18 09:07:32', '[wpdm-pp-cart]', 'Cart', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2016-02-18 09:07:32', '2016-02-18 09:07:32', '', 8, 'http://localhost/rtlcbsasia/2016/02/18/8-revision-v1/', 0, 'revision', '', 0),
(87, 1, '2016-02-19 03:09:14', '2016-02-19 03:09:14', '<!-- [wpdm-pp-cart] -->', 'Cart', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2016-02-19 03:09:14', '2016-02-19 03:09:14', '', 8, 'http://localhost/rtlcbsasia/8-revision-v1/', 0, 'revision', '', 0),
(94, 1, '2016-02-25 02:38:36', '2016-02-25 02:38:36', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="2" ]\r\ndianne', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-25 02:38:36', '2016-02-25 02:38:36', '', 15, 'http://localhost/rtlcbsasia/15-revision-v1/', 0, 'revision', '', 0),
(95, 1, '2016-02-25 02:39:26', '2016-02-25 02:39:26', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="12" ]', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-25 02:39:26', '2016-02-25 02:39:26', '', 15, 'http://localhost/rtlcbsasia/15-revision-v1/', 0, 'revision', '', 0),
(98, 1, '2016-02-29 07:12:59', '2016-02-29 07:12:59', '', 'Channel Materials', '', 'publish', 'open', 'closed', '', 'channel-materials-entertainment', '', '', '2016-03-31 02:07:38', '2016-03-31 02:07:38', '', 0, 'http://localhost/rtlcbsasia/?post_type=wpdmpro&#038;p=98', 0, 'wpdmpro', '', 0),
(102, 1, '2016-02-29 09:10:42', '2016-02-29 09:10:42', '', 'Shows', '', 'publish', 'closed', 'closed', '', 'shows', '', '', '2016-03-02 03:48:02', '2016-03-02 03:48:02', '', 0, 'http://localhost/rtlcbsasia/?page_id=102', 0, 'page', '', 0),
(103, 1, '2016-02-29 09:10:38', '2016-02-29 09:10:38', '', 'Home', '', 'inherit', 'closed', 'closed', '', '15-revision-v1', '', '', '2016-02-29 09:10:38', '2016-02-29 09:10:38', '', 15, 'http://localhost/rtlcbsasia/15-revision-v1/', 0, 'revision', '', 0),
(104, 1, '2016-02-29 09:10:42', '2016-02-29 09:10:42', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="12" ]', 'Shows', '', 'inherit', 'closed', 'closed', '', '102-revision-v1', '', '', '2016-02-29 09:10:42', '2016-02-29 09:10:42', '', 102, 'http://localhost/rtlcbsasia/102-revision-v1/', 0, 'revision', '', 0),
(105, 1, '2016-03-01 05:41:59', '2016-03-01 05:41:59', '', 'Login', '', 'publish', 'closed', 'closed', '', 'login', '', '', '2016-03-30 02:19:15', '2016-03-30 02:19:15', '', 0, 'http://localhost/rtlcbsasia/?page_id=105', 0, 'page', '', 0),
(106, 1, '2016-03-01 05:41:59', '2016-03-01 05:41:59', '[wppb-login]', 'Login', '', 'inherit', 'closed', 'closed', '', '105-revision-v1', '', '', '2016-03-01 05:41:59', '2016-03-01 05:41:59', '', 105, 'http://localhost/rtlcbsasia/105-revision-v1/', 0, 'revision', '', 0),
(107, 1, '2016-03-01 05:45:04', '2016-03-01 05:45:04', '[wppb-edit-profile]', 'Edit Profile', '', 'publish', 'closed', 'closed', '', 'edit-profile', '', '', '2016-03-01 05:45:04', '2016-03-01 05:45:04', '', 0, 'http://localhost/rtlcbsasia/?page_id=107', 0, 'page', '', 0),
(108, 1, '2016-03-01 05:45:04', '2016-03-01 05:45:04', '[wppb-edit-profile]', 'Edit Profile', '', 'inherit', 'closed', 'closed', '', '107-revision-v1', '', '', '2016-03-01 05:45:04', '2016-03-01 05:45:04', '', 107, 'http://localhost/rtlcbsasia/107-revision-v1/', 0, 'revision', '', 0),
(111, 1, '2016-03-01 05:47:12', '2016-03-01 05:47:12', '[wppb-login lostpassword_url="http://localhost/rtlcbsasia/change-password/"]', 'Login', '', 'inherit', 'closed', 'closed', '', '105-revision-v1', '', '', '2016-03-01 05:47:12', '2016-03-01 05:47:12', '', 105, 'http://localhost/rtlcbsasia/105-revision-v1/', 0, 'revision', '', 0),
(112, 1, '2016-03-01 05:48:17', '2016-03-01 05:48:17', ' ', '', '', 'publish', 'closed', 'closed', '', '112', '', '', '2016-03-28 02:57:30', '2016-03-28 02:57:30', '', 0, 'http://localhost/rtlcbsasia/?p=112', 1, 'nav_menu_item', '', 0),
(118, 1, '2016-03-01 05:48:17', '2016-03-01 05:48:17', '', 'All Shows', '', 'publish', 'closed', 'closed', '', '118', '', '', '2016-03-28 02:57:30', '2016-03-28 02:57:30', '', 0, 'http://localhost/rtlcbsasia/?p=118', 2, 'nav_menu_item', '', 0),
(119, 1, '2016-03-02 02:42:54', '2016-03-02 02:42:54', '[wpdm_category id="extreme" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="12" ]', 'Shows', '', 'inherit', 'closed', 'closed', '', '102-revision-v1', '', '', '2016-03-02 02:42:54', '2016-03-02 02:42:54', '', 102, 'http://localhost/rtlcbsasia/102-revision-v1/', 0, 'revision', '', 0),
(120, 1, '2016-03-02 02:43:11', '2016-03-02 02:43:11', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="12" ]', 'Shows', '', 'inherit', 'closed', 'closed', '', '102-revision-v1', '', '', '2016-03-02 02:43:11', '2016-03-02 02:43:11', '', 102, 'http://localhost/rtlcbsasia/102-revision-v1/', 0, 'revision', '', 0),
(121, 1, '2016-03-02 03:29:03', '2016-03-02 03:29:03', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="3" ]', 'Shows', '', 'inherit', 'closed', 'closed', '', '102-revision-v1', '', '', '2016-03-02 03:29:03', '2016-03-02 03:29:03', '', 102, 'http://localhost/rtlcbsasia/102-revision-v1/', 0, 'revision', '', 0),
(122, 1, '2016-03-02 03:35:46', '2016-03-02 03:35:46', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="3"  ]', 'Shows', '', 'inherit', 'closed', 'closed', '', '102-autosave-v1', '', '', '2016-03-02 03:35:46', '2016-03-02 03:35:46', '', 102, 'http://localhost/rtlcbsasia/102-autosave-v1/', 0, 'revision', '', 0),
(123, 1, '2016-03-02 03:35:55', '2016-03-02 03:35:55', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="3" filter = "A" ]', 'Shows', '', 'inherit', 'closed', 'closed', '', '102-revision-v1', '', '', '2016-03-02 03:35:55', '2016-03-02 03:35:55', '', 102, 'http://localhost/rtlcbsasia/102-revision-v1/', 0, 'revision', '', 0),
(124, 1, '2016-03-02 03:36:30', '2016-03-02 03:36:30', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="12" filter = "A" ]', 'Shows', '', 'inherit', 'closed', 'closed', '', '102-revision-v1', '', '', '2016-03-02 03:36:30', '2016-03-02 03:36:30', '', 102, 'http://localhost/rtlcbsasia/102-revision-v1/', 0, 'revision', '', 0),
(125, 1, '2016-03-02 03:37:52', '2016-03-02 03:37:52', '[wpdm_category id="entertainment" operator="IN" title="Entertainment Shows" desc="all entertainment shows" toolbar="1" order_by="title" order="asc" item_per_page="12" filter = "L" ]', 'Shows', '', 'inherit', 'closed', 'closed', '', '102-revision-v1', '', '', '2016-03-02 03:37:52', '2016-03-02 03:37:52', '', 102, 'http://localhost/rtlcbsasia/102-revision-v1/', 0, 'revision', '', 0),
(126, 1, '2016-03-02 03:48:02', '2016-03-02 03:48:02', '', 'Shows', '', 'inherit', 'closed', 'closed', '', '102-revision-v1', '', '', '2016-03-02 03:48:02', '2016-03-02 03:48:02', '', 102, 'http://localhost/rtlcbsasia/102-revision-v1/', 0, 'revision', '', 0),
(131, 1, '2016-03-15 06:40:51', '2016-03-15 06:40:51', '', 'Channel Materials', '', 'publish', 'closed', 'closed', '', 'channel-materials', '', '', '2016-03-15 06:40:51', '2016-03-15 06:40:51', '', 0, 'http://localhost/rtlcbsasia/?page_id=131', 0, 'page', '', 0),
(132, 1, '2016-03-14 09:06:38', '2016-03-14 09:06:38', '', 'This Month''s Promos', '', 'publish', 'closed', 'closed', '', 'this-months-promos', '', '', '2016-03-17 07:33:05', '2016-03-17 07:33:05', '', 0, 'http://localhost/rtlcbsasia/?page_id=132', 0, 'page', '', 0),
(133, 1, '2016-03-14 09:06:38', '2016-03-14 09:06:38', '', 'This Month''s Promos', '', 'inherit', 'closed', 'closed', '', '132-revision-v1', '', '', '2016-03-14 09:06:38', '2016-03-14 09:06:38', '', 132, 'http://localhost/rtlcbsasia/132-revision-v1/', 0, 'revision', '', 0),
(134, 1, '2016-03-14 09:09:14', '2016-03-14 09:09:14', '', 'This Month''s Promos', '', 'publish', 'closed', 'closed', '', 'this-months-promos', '', '', '2016-03-28 02:57:30', '2016-03-28 02:57:30', '', 0, 'http://localhost/rtlcbsasia/?p=134', 4, 'nav_menu_item', '', 0),
(135, 1, '2016-03-15 06:40:01', '2016-03-15 06:40:01', '', 'Extreme', '', 'publish', 'closed', 'closed', '', 'extreme', '', '', '2016-03-15 06:40:01', '2016-03-15 06:40:01', '', 0, 'http://localhost/rtlcbsasia/?page_id=135', 0, 'page', '', 0),
(136, 1, '2016-03-15 06:40:01', '2016-03-15 06:40:01', '', 'Extreme', '', 'inherit', 'closed', 'closed', '', '135-revision-v1', '', '', '2016-03-15 06:40:01', '2016-03-15 06:40:01', '', 135, 'http://localhost/rtlcbsasia/135-revision-v1/', 0, 'revision', '', 0),
(138, 1, '2016-03-15 06:40:51', '2016-03-15 06:40:51', '', 'Channel Materials', '', 'inherit', 'closed', 'closed', '', '131-revision-v1', '', '', '2016-03-15 06:40:51', '2016-03-15 06:40:51', '', 131, 'http://localhost/rtlcbsasia/131-revision-v1/', 0, 'revision', '', 0),
(140, 1, '2016-03-16 10:03:44', '2016-03-16 10:03:44', '', 'asdasd', '', 'publish', 'open', 'open', '', 'asdasd', '', '', '2016-03-16 10:03:44', '2016-03-16 10:03:44', '', 0, 'http://localhost/rtlcbsasia/?p=140', 0, 'post', '', 0),
(141, 1, '2016-03-16 10:03:44', '2016-03-16 10:03:44', '', 'asdasd', '', 'inherit', 'closed', 'closed', '', '140-revision-v1', '', '', '2016-03-16 10:03:44', '2016-03-16 10:03:44', '', 140, 'http://localhost/rtlcbsasia/140-revision-v1/', 0, 'revision', '', 0),
(143, 1, '2016-03-16 11:16:52', '2016-03-16 11:16:52', '', 'Channel Materials', '', 'publish', 'closed', 'closed', '', 'channel-materials', '', '', '2016-03-28 02:57:30', '2016-03-28 02:57:30', '', 0, 'http://localhost/rtlcbsasia/?p=143', 3, 'nav_menu_item', '', 0),
(144, 1, '2016-03-17 02:14:09', '2016-03-17 02:14:09', '', 'Cart', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2016-03-17 02:14:09', '2016-03-17 02:14:09', '', 8, 'http://localhost/rtlcbsasia/8-revision-v1/', 0, 'revision', '', 0),
(155, 1, '2016-03-23 03:24:40', '2016-03-23 03:24:40', ' ', '', '', 'publish', 'closed', 'closed', '', '155', '', '', '2016-03-23 03:27:33', '2016-03-23 03:27:33', '', 0, 'http://192.168.1.167/rtlcbsasia/?p=155', 1, 'nav_menu_item', '', 0),
(156, 1, '2016-03-23 03:24:40', '2016-03-23 03:24:40', '', 'Downloads', '', 'publish', 'closed', 'closed', '', '156', '', '', '2016-03-23 03:27:34', '2016-03-23 03:27:34', '', 0, 'http://192.168.1.167/rtlcbsasia/?p=156', 2, 'nav_menu_item', '', 0),
(157, 1, '2016-03-23 03:25:34', '2016-03-23 03:25:34', '', 'Contact Us', '', 'publish', 'closed', 'closed', '', 'contact-us', '', '', '2016-03-23 03:25:34', '2016-03-23 03:25:34', '', 0, 'http://192.168.1.167/rtlcbsasia/?page_id=157', 0, 'page', '', 0),
(158, 1, '2016-03-23 03:25:34', '2016-03-23 03:25:34', '', 'Contact Us', '', 'inherit', 'closed', 'closed', '', '157-revision-v1', '', '', '2016-03-23 03:25:34', '2016-03-23 03:25:34', '', 157, 'http://192.168.1.167/rtlcbsasia/157-revision-v1/', 0, 'revision', '', 0),
(159, 1, '2016-03-23 03:25:53', '2016-03-23 03:25:53', ' ', '', '', 'publish', 'closed', 'closed', '', '159', '', '', '2016-03-23 03:27:34', '2016-03-23 03:27:34', '', 0, 'http://192.168.1.167/rtlcbsasia/?p=159', 3, 'nav_menu_item', '', 0),
(160, 1, '2016-03-23 03:26:39', '2016-03-23 03:26:39', '', 'RTL CBS Entertainment HD', '', 'publish', 'closed', 'closed', '', 'rtl-cbs-entertinment-hd', '', '', '2016-03-23 03:27:34', '2016-03-23 03:27:34', '', 0, 'http://192.168.1.167/rtlcbsasia/?p=160', 4, 'nav_menu_item', '', 0),
(161, 1, '2016-03-23 03:27:34', '2016-03-23 03:27:34', '', 'RTL CBS Extreme HD', '', 'publish', 'closed', 'closed', '', 'rtl-cbs-extreme-hd', '', '', '2016-03-23 03:27:34', '2016-03-23 03:27:34', '', 0, 'http://192.168.1.167/rtlcbsasia/?p=161', 5, 'nav_menu_item', '', 0),
(162, 1, '2016-03-23 03:29:59', '2016-03-23 03:29:59', '', 'RTLCBS_Entertainment_darkbg_solid', '', 'inherit', 'open', 'closed', '', 'rtlcbs_entertainment_darkbg_solid', '', '', '2016-03-23 03:29:59', '2016-03-23 03:29:59', '', 98, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/02/RTLCBS_Entertainment_darkbg_solid.png', 0, 'attachment', 'image/png', 0),
(163, 1, '2016-03-23 03:30:00', '2016-03-23 03:30:00', '', 'RTLCBS_Entertainment_whiteBG_solid', '', 'inherit', 'open', 'closed', '', 'rtlcbs_entertainment_whitebg_solid', '', '', '2016-03-23 03:30:00', '2016-03-23 03:30:00', '', 98, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/02/RTLCBS_Entertainment_whiteBG_solid.png', 0, 'attachment', 'image/png', 0),
(164, 1, '2016-03-28 06:53:06', '2016-03-28 06:53:06', 'SCORPION, inspired by a true story, is a high-octane drama about eccentric genius Walter O’Brien (Elyes Gabel) and his team of brilliant misfits who comprise the last line of defense against complex, high-tech threats of the modern age. As Homeland Security’s new think tank, O’Brien’s “Scorpion” team includes Toby Curtis (Eddie Kaye Thomas), an expert behaviorist who can read anyone; Happy Quinn (Jadyn Wong), a mechanical prodigy; and Sylvester Dodd (Ari Stidham), a statistics guru. Pooling their extensive technological knowledge to solve mind-boggling predicaments amazes federal agent Cabe Gallo (Robert Patrick), who shares a harrowing history with O’Brien. However, while this socially awkward group is comfortable with each other’s humor and quirks, life outside their circle confounds them, so they rely on Paige Dineen (Katharine McPhee), who has a young, gifted son, to translate the world for them. At last, these nerdy masterminds have found the perfect job: a place where they can apply their exceptional brainpower to solve the nation’s crises, while also helping each other learn how to fit in. Nick Santora, Emmy Award winner Nicholas Wootton, Alex Kurtzman, Roberto Orci, Heather Kadin, Walter O’Brien, Scooter Braun and Justin Lin are the executive producers for CBS Television Studios. Justin Lin (“The Fast and the Furious”) directed the pilot.', 'Scorpion', 'SCORPION, inspired by a true story, is a high-octane drama about eccentric genius Walter O’Brien (Elyes Gabel) and his team of brilliant misfits who comprise the last line of defense against complex, high-tech threats of the modern age. As Homeland Security’s new think tank, O’Brien’s “Scorpion” team includes Toby Curtis ', 'inherit', 'closed', 'closed', '', '42-autosave-v1', '', '', '2016-03-28 06:53:06', '2016-03-28 06:53:06', '', 42, 'http://192.168.1.167/rtlcbsasia/42-autosave-v1/', 0, 'revision', '', 0),
(167, 1, '2016-03-23 05:40:46', '2016-03-23 05:40:46', '', 'LIM-keyart-horiz101i', '', 'inherit', 'open', 'closed', '', 'lim-keyart-horiz101i', '', '', '2016-03-23 05:40:46', '2016-03-23 05:40:46', '', 0, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-horiz101i.jpg', 0, 'attachment', 'image/jpeg', 0),
(168, 1, '2016-03-23 05:41:16', '2016-03-23 05:41:16', '', 'LIM-keyart-vert-TT105i', '', 'inherit', 'open', 'closed', '', 'lim-keyart-vert-tt105i', '', '', '2016-03-23 05:41:16', '2016-03-23 05:41:16', '', 0, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/LIM-keyart-vert-TT105i.jpg', 0, 'attachment', 'image/jpeg', 0),
(175, 1, '2016-03-23 07:19:26', '2016-03-23 07:19:26', 'LIMITLESS is a fast-paced drama based on the feature film. Brian Finch (Jake McDorman) discovers the brainboosting power of the mysterious drug NZT. He is coerced by the FBI into using his extraordinary cognitive abilities to solve complex cases for them. Working closely with Brian in the major case squad in New York City is Special Agent Rebecca Harris (Jennifer Carpenter), a formidable investigator with a dark past, and Special Agent Boyle (Hill Harper), a former military officer and Rebecca’s confidant. They report to Special Agent in Charge Nasreen “Naz” Pouran (Mary Elizabeth Mastrantonio), a canny manipulator of the reins of power. Unbeknownst to the FBI, Brian also has a clandestine relationship with Senator Edward Mora (Academy Award® nominee Bradley Cooper, recurring), a presidential hopeful and regular user of NZT, who has plans of his own for his new protégé. Fueled now with a steady supply of NZT that enables him to use 100% of his brain capacity, Brian is more effective than all of the FBI agents combined, making him a criminal’s worst nightmare and the greatest asset the Bureau has ever possessed. Craig Sweeny, Marc Webb, Alex Kurtzman, Roberto Orci, Heather Kadin, Bradley Cooper, Todd Phillips, Ryan Kavanaugh, Tucker Tooley and Tom Forman are executive producers for CBS Television Studios in association with K/O Paper Products and Relativity Media. Webb directed the pilot.', 'Limitless', 'LIMITLESS is a fast-paced drama based on the feature film. <br>\r\nBrian Finch (Jake McDorman) discovers the brainboosting power <br>\r\nof the mysterious drug NZT. He is coerced by the FBI into using his <br>\r\nextraordinary cognitive abilities to solve complex cases for them. ', 'publish', 'open', 'closed', '', 'limitless-4', '', '', '2016-03-31 02:21:36', '2016-03-31 02:21:36', '', 0, 'http://192.168.1.167/rtlcbsasia/?post_type=wpdmpro&#038;p=175', 0, 'wpdmpro', '', 0),
(191, 1, '2016-03-28 02:49:10', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-03-28 02:49:10', '0000-00-00 00:00:00', '', 0, 'http://192.168.1.167/rtlcbsasia/?p=191', 1, 'nav_menu_item', '', 0),
(192, 1, '2016-03-28 02:49:10', '0000-00-00 00:00:00', ' ', '', '', 'draft', 'closed', 'closed', '', '', '', '', '2016-03-28 02:49:10', '0000-00-00 00:00:00', '', 2, 'http://192.168.1.167/rtlcbsasia/?p=192', 1, 'nav_menu_item', '', 0),
(195, 1, '2016-03-28 05:21:24', '2016-03-28 05:21:24', '', 'SCP-keyart-horiz201i', '', 'inherit', 'open', 'closed', '', 'scp-keyart-horiz201i', '', '', '2016-03-28 05:21:24', '2016-03-28 05:21:24', '', 42, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/01/SCP-keyart-horiz201i.jpg', 0, 'attachment', 'image/jpeg', 0),
(196, 1, '2016-03-28 05:46:35', '2016-03-28 05:46:35', 'LIMITLESS is a fast-paced drama based on the feature film. Brian Finch (Jake McDorman) discovers the brainboosting power of the mysterious drug NZT. He is coerced by the FBI into using his extraordinary cognitive abilities to solve complex cases for them. Working closely with Brian in the major case squad in New York City is Special Agent Rebecca Harris (Jennifer Carpenter), a formidable investigator with a dark past, and Special Agent Boyle (Hill Harper), a former military officer and Rebecca’s confidant. They report to Special Agent in Charge Nasreen “Naz” Pouran (Mary Elizabeth Mastrantonio), a canny manipulator of the reins of power. Unbeknownst to the FBI, Brian also has a clandestine relationship with Senator Edward Mora (Academy Award® nominee Bradley Cooper, recurring), a presidential hopeful and regular user of NZT, who has plans of his own for his new protégé. Fueled now with a steady supply of NZT that enables him to use 100% of his brain capacity, Brian is more effective than all of the FBI agents combined, making him a criminal’s worst nightmare and the greatest asset the Bureau has ever possessed. Craig Sweeny, Marc Webb, Alex Kurtzman, Roberto Orci, Heather Kadin, Bradley Cooper, Todd Phillips, Ryan Kavanaugh, Tucker Tooley and Tom Forman are executive producers for CBS Television Studios in association with K/O Paper Products and Relativity Media. Webb directed the pilot.', 'Limitless', 'LIMITLESS is a fast-paced drama based on the feature film. Brian Finch (Jake McDorman) discovers the brainboosting power of the mysterious drug NZT. He is coerced by the FBI into using his extraordinary cognitive abilities to solve complex cases for them. ', 'inherit', 'closed', 'closed', '', '175-autosave-v1', '', '', '2016-03-28 05:46:35', '2016-03-28 05:46:35', '', 175, 'http://192.168.1.167/rtlcbsasia/175-autosave-v1/', 0, 'revision', '', 0),
(197, 1, '2016-03-28 06:58:31', '2016-03-28 06:58:31', ' ', '', '', 'publish', 'closed', 'closed', '', '197', '', '', '2016-03-28 07:02:23', '2016-03-28 07:02:23', '', 0, 'http://192.168.1.167/rtlcbsasia/?p=197', 1, 'nav_menu_item', '', 0),
(198, 1, '2016-03-28 07:01:12', '2016-03-28 07:01:12', '', 'All Shows', '', 'publish', 'closed', 'closed', '', 'all-shows', '', '', '2016-03-28 07:02:23', '2016-03-28 07:02:23', '', 0, 'http://192.168.1.167/rtlcbsasia/?p=198', 2, 'nav_menu_item', '', 0),
(199, 1, '2016-03-28 07:01:12', '2016-03-28 07:01:12', '', 'Channel Materials', '', 'publish', 'closed', 'closed', '', 'channel-materials-2', '', '', '2016-03-28 07:02:23', '2016-03-28 07:02:23', '', 0, 'http://192.168.1.167/rtlcbsasia/?p=199', 3, 'nav_menu_item', '', 0),
(200, 1, '2016-03-28 07:01:12', '2016-03-28 07:01:12', '', 'This Month''s Promos', '', 'publish', 'closed', 'closed', '', 'this-months-promos-2', '', '', '2016-03-28 07:02:23', '2016-03-28 07:02:23', '', 0, 'http://192.168.1.167/rtlcbsasia/?p=200', 4, 'nav_menu_item', '', 0),
(201, 1, '2016-03-28 07:03:38', '2016-03-28 07:03:38', '', 'Channel Materials', '', 'publish', 'open', 'closed', '', 'channel-materials-extreme', '', '', '2016-03-30 06:34:20', '2016-03-30 06:34:20', '', 0, 'http://192.168.1.167/rtlcbsasia/?post_type=wpdmpro&#038;p=201', 0, 'wpdmpro', '', 0),
(206, 1, '2016-03-29 08:39:18', '2016-03-29 08:39:18', '', 'Channel Materials - Extreme', '', 'inherit', 'closed', 'closed', '', '201-autosave-v1', '', '', '2016-03-29 08:39:18', '2016-03-29 08:39:18', '', 201, 'http://192.168.1.167/rtlcbsasia/201-autosave-v1/', 0, 'revision', '', 0),
(208, 1, '2016-03-29 08:30:30', '2016-03-29 08:30:30', '', 'Channel Materials - Entertainment', '', 'inherit', 'closed', 'closed', '', '98-autosave-v1', '', '', '2016-03-29 08:30:30', '2016-03-29 08:30:30', '', 98, 'http://192.168.1.167/rtlcbsasia/98-autosave-v1/', 0, 'revision', '', 0),
(209, 1, '2016-03-29 08:32:58', '2016-03-29 08:32:58', '', 'RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712', '', 'inherit', 'open', 'closed', '', 'rtlcbs_extreme_print_whitebg_alpha_png_20130712', '', '', '2016-03-29 08:32:58', '2016-03-29 08:32:58', '', 201, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/RTLCBS_Extreme_PRINT_whiteBG_ALPHA_PNG_20130712.png', 0, 'attachment', 'image/png', 0),
(210, 1, '2016-03-29 08:36:42', '2016-03-29 08:36:42', '', 'YE01079G_JAN Monthly_Ent_60s_AGT_PostLaunch_REV151216', '', 'inherit', 'open', 'closed', '', 'ye01079g_jan-monthly_ent_60s_agt_postlaunch_rev151216', '', '', '2016-03-29 08:36:42', '2016-03-29 08:36:42', '', 201, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/YE01079G_JAN-Monthly_Ent_60s_AGT_PostLaunch_REV151216.mov', 0, 'attachment', 'video/quicktime', 0),
(211, 1, '2016-03-29 08:37:33', '2016-03-29 08:37:33', '', 'YE01079H_JAN Monthly_Ent_60s_AGT_Launch_REV151216', '', 'inherit', 'open', 'closed', '', 'ye01079h_jan-monthly_ent_60s_agt_launch_rev151216', '', '', '2016-03-29 08:37:33', '2016-03-29 08:37:33', '', 201, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/YE01079H_JAN-Monthly_Ent_60s_AGT_Launch_REV151216.mov', 0, 'attachment', 'video/quicktime', 0),
(212, 1, '2016-03-29 08:37:49', '2016-03-29 08:37:49', '', 'YE01080H_JAN Monthly_Ent_30s_Rev', '', 'inherit', 'open', 'closed', '', 'ye01080h_jan-monthly_ent_30s_rev', '', '', '2016-03-29 08:37:49', '2016-03-29 08:37:49', '', 201, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/YE01080H_JAN-Monthly_Ent_30s_Rev.mov', 0, 'attachment', 'video/quicktime', 0),
(213, 1, '2016-03-29 08:42:17', '2016-03-29 08:42:17', '', 'YE01134G_FEB_Monthly_Ent_60s', '', 'inherit', 'open', 'closed', '', 'ye01134g_feb_monthly_ent_60s', '', '', '2016-03-29 08:42:17', '2016-03-29 08:42:17', '', 98, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/02/YE01134G_FEB_Monthly_Ent_60s.mov', 0, 'attachment', 'video/quicktime', 0),
(214, 1, '2016-03-29 08:42:50', '2016-03-29 08:42:50', '', 'YE01134H_FEB_Monthly_Ent_60s', '', 'inherit', 'open', 'closed', '', 'ye01134h_feb_monthly_ent_60s', '', '', '2016-03-29 08:42:50', '2016-03-29 08:42:50', '', 98, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/02/YE01134H_FEB_Monthly_Ent_60s.mov', 0, 'attachment', 'video/quicktime', 0),
(215, 1, '2016-03-29 08:43:10', '2016-03-29 08:43:10', '', 'YE01135H_FEB_Monthly_Ent_30s', '', 'inherit', 'open', 'closed', '', 'ye01135h_feb_monthly_ent_30s', '', '', '2016-03-29 08:43:10', '2016-03-29 08:43:10', '', 98, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/02/YE01135H_FEB_Monthly_Ent_30s.mov', 0, 'attachment', 'video/quicktime', 0),
(216, 1, '2016-03-30 02:19:15', '2016-03-30 02:19:15', '', 'Login', '', 'inherit', 'closed', 'closed', '', '105-revision-v1', '', '', '2016-03-30 02:19:15', '2016-03-30 02:19:15', '', 105, 'http://192.168.1.167/rtlcbsasia/105-revision-v1/', 0, 'revision', '', 0),
(218, 1, '2016-03-30 02:56:37', '2016-03-30 02:56:37', '', 'Change Password', '', 'publish', 'closed', 'closed', '', 'change-password', '', '', '2016-03-30 02:59:23', '2016-03-30 02:59:23', '', 0, 'http://192.168.1.167/rtlcbsasia/change-password-2/', 0, 'page', '', 0),
(219, 1, '2016-03-30 02:58:46', '2016-03-30 02:58:46', '', 'Change Password', '', 'inherit', 'closed', 'closed', '', '218-autosave-v1', '', '', '2016-03-30 02:58:46', '2016-03-30 02:58:46', '', 218, 'http://192.168.1.167/rtlcbsasia/218-autosave-v1/', 0, 'revision', '', 0),
(220, 1, '2016-03-30 02:59:23', '2016-03-30 02:59:23', '', 'Change Password', '', 'inherit', 'closed', 'closed', '', '218-revision-v1', '', '', '2016-03-30 02:59:23', '2016-03-30 02:59:23', '', 218, 'http://192.168.1.167/rtlcbsasia/218-revision-v1/', 0, 'revision', '', 0),
(221, 1, '2016-03-30 02:59:46', '2016-03-30 02:59:46', '', 'Recover Password', '', 'publish', 'closed', 'closed', '', 'recover-password', '', '', '2016-03-30 02:59:46', '2016-03-30 02:59:46', '', 0, 'http://192.168.1.167/rtlcbsasia/?page_id=221', 0, 'page', '', 0),
(222, 1, '2016-03-30 02:59:46', '2016-03-30 02:59:46', '', 'Recover Password', '', 'inherit', 'closed', 'closed', '', '221-revision-v1', '', '', '2016-03-30 02:59:46', '2016-03-30 02:59:46', '', 221, 'http://192.168.1.167/rtlcbsasia/221-revision-v1/', 0, 'revision', '', 0),
(223, 1, '2016-03-30 06:15:36', '2016-03-30 06:15:36', '', 'YE01019G_Limitless_NewJ_Wed9pm_SWAG', '', 'inherit', 'open', 'closed', '', 'ye01019g_limitless_newj_wed9pm_swag', '', '', '2016-03-30 06:15:36', '2016-03-30 06:15:36', '', 0, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/YE01019G_Limitless_NewJ_Wed9pm_SWAG.mov', 0, 'attachment', 'video/quicktime', 0),
(224, 1, '2016-03-30 06:16:00', '2016-03-30 06:16:00', '', 'YE01045G Limitless_RevJ_Wed9pm_SWAG_NoXpress', '', 'inherit', 'open', 'closed', '', 'ye01045g-limitless_revj_wed9pm_swag_noxpress', '', '', '2016-03-30 06:16:00', '2016-03-30 06:16:00', '', 0, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/YE01045G-Limitless_RevJ_Wed9pm_SWAG_NoXpress.mov', 0, 'attachment', 'video/quicktime', 0),
(225, 1, '2016-03-30 06:16:18', '2016-03-30 06:16:18', '', 'YE01105G_Limitless_NewK_Wed9pm_Xpress_Bruce', '', 'inherit', 'open', 'closed', '', 'ye01105g_limitless_newk_wed9pm_xpress_bruce', '', '', '2016-03-30 06:16:18', '2016-03-30 06:16:18', '', 0, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/YE01105G_Limitless_NewK_Wed9pm_Xpress_Bruce.mov', 0, 'attachment', 'video/quicktime', 0),
(226, 1, '2016-03-30 06:16:32', '2016-03-30 06:16:32', '', 'YE01106G_Limitless_NewK_Wed9pm_BrandNew_Bruce', '', 'inherit', 'open', 'closed', '', 'ye01106g_limitless_newk_wed9pm_brandnew_bruce', '', '', '2016-03-30 06:16:32', '2016-03-30 06:16:32', '', 0, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/03/YE01106G_Limitless_NewK_Wed9pm_BrandNew_Bruce.mov', 0, 'attachment', 'video/quicktime', 0),
(227, 1, '2016-03-30 06:40:44', '2016-03-30 06:40:44', '', 'XFUK12_TX18_Seann Miley Moore Singoff_Sun&Mon1030am', '', 'inherit', 'open', 'closed', '', 'xfuk12_tx18_seann-miley-moore-singoff_sunmon1030am', '', '', '2016-03-30 06:40:44', '2016-03-30 06:40:44', '', 98, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/02/XFUK12_TX18_Seann-Miley-Moore-Singoff_SunMon1030am.mp4', 0, 'attachment', 'video/mp4', 0),
(228, 1, '2016-03-30 06:41:21', '2016-03-30 06:41:21', '', 'XFUK12_TX24_4th Impact_Sun&Mon1030am', '', 'inherit', 'open', 'closed', '', 'xfuk12_tx24_4th-impact_sunmon1030am', '', '', '2016-03-30 06:41:21', '2016-03-30 06:41:21', '', 98, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/02/XFUK12_TX24_4th-Impact_SunMon1030am.mp4', 0, 'attachment', 'video/mp4', 0),
(229, 1, '2016-03-30 06:41:45', '2016-03-30 06:41:45', '', 'XFUK12_TX28_FinalePerformance', '', 'inherit', 'open', 'closed', '', 'xfuk12_tx28_finaleperformance', '', '', '2016-03-30 06:41:45', '2016-03-30 06:41:45', '', 98, 'http://192.168.1.167/rtlcbsasia/wp-content/uploads/2016/02/XFUK12_TX28_FinalePerformance.mp4', 0, 'attachment', 'video/mp4', 0),
(230, 1, '2016-04-05 03:01:15', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2016-04-05 03:01:15', '0000-00-00 00:00:00', '', 0, 'http://192.168.1.167/rtlcbsasia/?p=230', 0, 'post', '', 0),
(231, 1, '2016-04-05 07:06:01', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'closed', '', '', '', '', '2016-04-05 07:06:01', '0000-00-00 00:00:00', '', 0, 'http://192.168.1.167/rtlcbsasia/?post_type=wpdmpro&p=231', 0, 'wpdmpro', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_termmeta`
--

CREATE TABLE IF NOT EXISTS `rtl21016_termmeta` (
`meta_id` bigint(20) unsigned NOT NULL,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_terms`
--

CREATE TABLE IF NOT EXISTS `rtl21016_terms` (
`term_id` bigint(20) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rtl21016_terms`
--

INSERT INTO `rtl21016_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'Entertainment', 'entertainment', 0),
(3, 'Extreme', 'extreme', 0),
(4, 'Shows', 'shows-extreme', 0),
(5, 'Shows', 'shows-entertainment', 0),
(6, 'Channel Materials', 'channel-materials-entertainment', 0),
(7, 'Channel Materials', 'channel-materials-extreme', 0),
(8, 'Main Menu', 'main-menu', 0),
(9, 'Footer Menu', 'footer-menu', 0),
(10, 'Secondary Menu', 'secondary-menu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_term_relationships`
--

CREATE TABLE IF NOT EXISTS `rtl21016_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rtl21016_term_relationships`
--

INSERT INTO `rtl21016_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(42, 2, 0),
(42, 3, 0),
(42, 4, 0),
(42, 5, 0),
(98, 2, 0),
(98, 6, 0),
(112, 8, 0),
(118, 8, 0),
(134, 8, 0),
(140, 1, 0),
(143, 8, 0),
(155, 9, 0),
(156, 9, 0),
(159, 9, 0),
(160, 9, 0),
(161, 9, 0),
(175, 2, 0),
(175, 5, 0),
(197, 10, 0),
(198, 10, 0),
(199, 10, 0),
(200, 10, 0),
(201, 3, 0),
(201, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `rtl21016_term_taxonomy` (
`term_taxonomy_id` bigint(20) unsigned NOT NULL,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rtl21016_term_taxonomy`
--

INSERT INTO `rtl21016_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 2),
(2, 2, 'wpdmcategory', '', 0, 3),
(3, 3, 'wpdmcategory', '', 0, 2),
(4, 4, 'wpdmcategory', '', 3, 1),
(5, 5, 'wpdmcategory', '', 2, 2),
(6, 6, 'wpdmcategory', '', 2, 1),
(7, 7, 'wpdmcategory', '', 3, 1),
(8, 8, 'nav_menu', '', 0, 4),
(9, 9, 'nav_menu', '', 0, 5),
(10, 10, 'nav_menu', '', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_usermeta`
--

CREATE TABLE IF NOT EXISTS `rtl21016_usermeta` (
`umeta_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=393 ;

--
-- Dumping data for table `rtl21016_usermeta`
--

INSERT INTO `rtl21016_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'rtlcbsasia_admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'rtl21016_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(11, 1, 'rtl21016_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', ''),
(13, 1, 'show_welcome_panel', '1'),
(14, 1, 'session_tokens', 'a:11:{s:64:"411685a5a3368152bbe94d0a51e6c2fa232b70367b9138c3257e51fa4e5d60e3";a:4:{s:10:"expiration";i:1459911941;s:2:"ip";s:13:"192.168.1.165";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36";s:5:"login";i:1458702341;}s:64:"0cbad16409fb87affb8e6ebd98d558fafb6d8a05a28bd56c0c9861e4e573e5e1";a:4:{s:10:"expiration";i:1459929342;s:2:"ip";s:13:"192.168.1.165";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36";s:5:"login";i:1458719742;}s:64:"71f5d0fa46391899563f5a2b58283ce41488ec4b4d7f58bd3b9c3cbc38f46f56";a:4:{s:10:"expiration";i:1460352206;s:2:"ip";s:13:"192.168.1.165";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36";s:5:"login";i:1459142606;}s:64:"fb5fe4fdbb8efc9764c4eba34bb64176a0a94b78c29c9705c4acf0e3414c3190";a:4:{s:10:"expiration";i:1460359105;s:2:"ip";s:13:"192.168.1.165";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36";s:5:"login";i:1459149505;}s:64:"d935f5e118fc9f7e935225dd3db312ba7928af6b794e7ca4f1acafa437742f23";a:4:{s:10:"expiration";i:1460367790;s:2:"ip";s:13:"192.168.1.165";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36";s:5:"login";i:1459158190;}s:64:"6e2aa394638faff70f1661b78dd65787eeab02db822176dac6cd76027ed22b38";a:4:{s:10:"expiration";i:1460426796;s:2:"ip";s:13:"192.168.1.165";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36";s:5:"login";i:1459217196;}s:64:"6158a8a3330deb847f68d56c21a34383d696d57332801c8fde483eb232473f46";a:4:{s:10:"expiration";i:1460449754;s:2:"ip";s:13:"192.168.1.165";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36";s:5:"login";i:1459240154;}s:64:"4adab7415e49b3254bd4ccc9c6229f11df9eb2b24c8c60e9ea62068d10140f4e";a:4:{s:10:"expiration";i:1460519196;s:2:"ip";s:13:"192.168.1.165";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36";s:5:"login";i:1459309596;}s:64:"138683a5e07c7a398d66b4e819bb2d125f90eb8bd4c4f72ac915cadae1688643";a:4:{s:10:"expiration";i:1460526549;s:2:"ip";s:13:"192.168.1.165";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36";s:5:"login";i:1459316949;}s:64:"83c0e87fe734cbcc98db49b567f9048b4493a4492c3aee219951310ce6f1f130";a:4:{s:10:"expiration";i:1459917373;s:2:"ip";s:13:"192.168.1.167";s:2:"ua";s:73:"Mozilla/5.0 (Windows NT 10.0; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0";s:5:"login";i:1459744573;}s:64:"dc60f2ffe3ff99208e5f904f7f2610b716d1a95fd4b356d6b7399ff614ef0666";a:4:{s:10:"expiration";i:1459996367;s:2:"ip";s:13:"192.168.1.167";s:2:"ua";s:115:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36";s:5:"login";i:1459823567;}}'),
(15, 1, 'rtl21016_user-settings', 'editor=tinymce&libraryContent=browse&posts_list_mode=list'),
(16, 1, 'rtl21016_user-settings-time', '1459391765'),
(17, 1, 'rtl21016_dashboard_quick_press_last_post_id', '230'),
(80, 1, 'wppb_pms_cross_promo_dismiss_notification', 'true'),
(81, 1, 'wppb_anyone_can_register_dismiss_notification', 'true'),
(82, 7, 'nickname', 'dianne'),
(83, 7, 'first_name', 'Dianne Katherinem'),
(84, 7, 'last_name', 'Delos Reyesm'),
(85, 7, 'description', ''),
(86, 7, 'rich_editing', 'true'),
(87, 7, 'comment_shortcuts', 'false'),
(88, 7, 'admin_color', 'fresh'),
(89, 7, 'use_ssl', '0'),
(90, 7, 'show_admin_bar_front', 'true'),
(91, 7, 'rtl21016_capabilities', 'a:1:{s:8:"operator";b:1;}'),
(92, 7, 'rtl21016_user_level', '0'),
(93, 7, 'dismissed_wp_pointers', ''),
(94, 7, 'country_group', 'PE'),
(95, 7, 'operator_group', 'skycable'),
(96, 8, 'nickname', 'qwe'),
(97, 8, 'first_name', '123'),
(98, 8, 'last_name', '123123'),
(99, 8, 'description', ''),
(100, 8, 'rich_editing', 'true'),
(101, 8, 'comment_shortcuts', 'false'),
(102, 8, 'admin_color', 'fresh'),
(103, 8, 'use_ssl', '0'),
(104, 8, 'show_admin_bar_front', 'true'),
(105, 8, 'rtl21016_capabilities', 'a:1:{s:8:"operator";b:1;}'),
(106, 8, 'rtl21016_user_level', '0'),
(107, 8, 'dismissed_wp_pointers', ''),
(108, 8, 'country_group', 'US'),
(109, 8, 'operator_group', 'skycable'),
(110, 9, 'nickname', 'zxc'),
(111, 9, 'first_name', 'zxc'),
(112, 9, 'last_name', 'zxc'),
(113, 9, 'description', ''),
(114, 9, 'rich_editing', 'true'),
(115, 9, 'comment_shortcuts', 'false'),
(116, 9, 'admin_color', 'fresh'),
(117, 9, 'use_ssl', '0'),
(118, 9, 'show_admin_bar_front', 'true'),
(119, 9, 'rtl21016_capabilities', 'a:1:{s:8:"operator";b:1;}'),
(120, 9, 'rtl21016_user_level', '0'),
(121, 9, 'dismissed_wp_pointers', ''),
(122, 9, 'country_group', 'US'),
(123, 9, 'operator_group', 'skycable'),
(125, 10, 'nickname', 'diane'),
(126, 10, 'first_name', '11'),
(127, 10, 'last_name', '1'),
(128, 10, 'description', ''),
(129, 10, 'rich_editing', 'true'),
(130, 10, 'comment_shortcuts', 'false'),
(131, 10, 'admin_color', 'fresh'),
(132, 10, 'use_ssl', '0'),
(133, 10, 'show_admin_bar_front', 'true'),
(134, 10, 'rtl21016_capabilities', 'a:1:{s:8:"operator";b:1;}'),
(135, 10, 'rtl21016_user_level', '0'),
(136, 10, 'dismissed_wp_pointers', ''),
(137, 10, 'country_group', 'US'),
(138, 10, 'operator_group', 'skycable'),
(140, 11, 'nickname', 'z'),
(141, 11, 'first_name', 'z'),
(142, 11, 'last_name', 'z'),
(143, 11, 'description', ''),
(144, 11, 'rich_editing', 'true'),
(145, 11, 'comment_shortcuts', 'false'),
(146, 11, 'admin_color', 'fresh'),
(147, 11, 'use_ssl', '0'),
(148, 11, 'show_admin_bar_front', 'true'),
(149, 11, 'rtl21016_capabilities', 'a:1:{s:8:"operator";b:1;}'),
(150, 11, 'rtl21016_user_level', '0'),
(151, 11, 'dismissed_wp_pointers', ''),
(152, 11, 'country_group', 'US'),
(153, 11, 'operator_group', 'skycable'),
(154, 12, 'nickname', 'Dianne'),
(155, 12, 'first_name', 'Dianne'),
(156, 12, 'last_name', 'Delos Reyes'),
(157, 12, 'description', ''),
(158, 12, 'rich_editing', 'true'),
(159, 12, 'comment_shortcuts', 'false'),
(160, 12, 'admin_color', 'fresh'),
(161, 12, 'use_ssl', '0'),
(162, 12, 'show_admin_bar_front', 'true'),
(163, 12, 'rtl21016_capabilities', 'a:1:{s:8:"operator";b:1;}'),
(164, 12, 'rtl21016_user_level', '0'),
(165, 12, 'dismissed_wp_pointers', ''),
(166, 12, 'country_group', 'SG'),
(167, 12, 'operator_group', 'Singtel'),
(184, 1, 'user_billing_shipping', 's:192:"a:1:{s:7:"billing";a:4:{s:10:"first_name";s:5:"adsad";s:11:"order_email";s:35:"diannekatherinedelosreyes@gmail.com";s:5:"email";s:35:"diannekatherinedelosreyes@gmail.com";s:5:"phone";s:0:"";}}";'),
(185, 1, 'closedpostboxes_wpdmpro', 'a:3:{i:0;s:17:"wpdm-attached-dir";i:1;s:13:"wpdm-settings";i:2;s:10:"postcustom";}'),
(186, 1, 'metaboxhidden_wpdmpro', 'a:8:{i:0;s:16:"tagsdiv-post_tag";i:1;s:3:"apv";i:2;s:17:"wpdm-attached-dir";i:3;s:10:"postcustom";i:4;s:16:"commentstatusdiv";i:5;s:7:"slugdiv";i:6;s:9:"authordiv";i:7;s:11:"commentsdiv";}'),
(187, 1, 'meta-box-order_wpdmpro', 'a:4:{s:15:"acf_after_title";s:0:"";s:4:"side";s:20:"tagsdiv-post_tag,apv";s:6:"normal";s:184:"wpdm-attached-dir,submitdiv,acf_67,postimagediv,wpdm-upload-file,wpdm-attached-files,wpdm-settings,postexcerpt,postcustom,wpdmcategorydiv,commentstatusdiv,slugdiv,authordiv,commentsdiv";s:8:"advanced";s:0:"";}'),
(188, 1, 'screen_layout_wpdmpro', '1'),
(189, 1, 'manageedit-wpdmprocolumnshidden', 'a:5:{i:0;s:11:"wpdmsaleqty";i:1;s:11:"wpdmsaleamt";i:2;s:6:"author";i:3;s:4:"tags";i:4;s:8:"comments";}'),
(190, 1, 'edit_wpdmpro_per_page', '50'),
(206, 15, 'nickname', 'dana@skycable.com'),
(207, 15, 'first_name', 'Dana'),
(208, 15, 'last_name', 'Roxas'),
(209, 15, 'description', ''),
(210, 15, 'rich_editing', 'true'),
(211, 15, 'comment_shortcuts', 'false'),
(212, 15, 'admin_color', 'fresh'),
(213, 15, 'use_ssl', '0'),
(214, 15, 'show_admin_bar_front', 'true'),
(215, 15, 'rtl21016_capabilities', 'a:1:{s:8:"operator";b:1;}'),
(216, 15, 'rtl21016_user_level', '0'),
(217, 15, 'dismissed_wp_pointers', ''),
(218, 15, 'country_group', 'US'),
(219, 15, 'operator_group', 'skycable'),
(251, 1, 'closedpostboxes_page', 'a:0:{}'),
(252, 1, 'metaboxhidden_page', 'a:1:{i:0;s:6:"acf_67";}'),
(253, 18, 'nickname', 'dianne4@yahoo.com'),
(254, 18, 'first_name', ''),
(255, 18, 'last_name', ''),
(256, 18, 'description', ''),
(257, 18, 'rich_editing', 'true'),
(258, 18, 'comment_shortcuts', 'false'),
(259, 18, 'admin_color', 'fresh'),
(260, 18, 'use_ssl', '0'),
(261, 18, 'show_admin_bar_front', 'true'),
(262, 18, 'rtl21016_capabilities', 'a:1:{s:8:"operator";b:1;}'),
(263, 18, 'rtl21016_user_level', '0'),
(264, 18, 'dismissed_wp_pointers', ''),
(265, 18, 'country_group', 'PH'),
(266, 18, 'operator_group', 'Singtel'),
(282, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";i:4;s:15:"title-attribute";}'),
(283, 1, 'metaboxhidden_nav-menus', 'a:3:{i:0;s:21:"add-post-type-wpdmpro";i:1;s:12:"add-post_tag";i:2;s:15:"add-post_format";}'),
(284, 1, 'nav_menu_recently_edited', '10'),
(297, 1, 'manageuserscolumnshidden', 'a:1:{i:0;s:5:"posts";}'),
(298, 1, 'users_per_page', '20'),
(329, 18, 'rtl21016_user-settings', 'mfold=o'),
(330, 18, 'rtl21016_user-settings-time', '1457920410'),
(331, 1, 'closedpostboxes_nav-menus', 'a:0:{}'),
(333, 23, 'nickname', 'aaron.chavez@singtel.com'),
(334, 23, 'first_name', ''),
(335, 23, 'last_name', ''),
(336, 23, 'description', ''),
(337, 23, 'rich_editing', 'true'),
(338, 23, 'comment_shortcuts', 'false'),
(339, 23, 'admin_color', 'fresh'),
(340, 23, 'use_ssl', '0'),
(341, 23, 'show_admin_bar_front', 'true'),
(342, 23, 'rtl21016_capabilities', 'a:1:{s:8:"operator";b:1;}'),
(343, 23, 'rtl21016_user_level', '0'),
(344, 23, 'dismissed_wp_pointers', ''),
(345, 23, 'country_group', 'SG'),
(346, 23, 'operator_group', 'Singtel'),
(347, 24, 'nickname', 'dana_admin'),
(348, 24, 'first_name', 'Dana'),
(349, 24, 'last_name', 'Roxas'),
(350, 24, 'description', ''),
(351, 24, 'rich_editing', 'true'),
(352, 24, 'comment_shortcuts', 'false'),
(353, 24, 'admin_color', 'fresh'),
(354, 24, 'use_ssl', '0'),
(355, 24, 'show_admin_bar_front', 'true'),
(356, 24, 'rtl21016_capabilities', 'a:1:{s:8:"operator";b:1;}'),
(357, 24, 'rtl21016_user_level', '0'),
(358, 24, 'dismissed_wp_pointers', ''),
(372, 25, 'nickname', 'dianne@skycable.com'),
(373, 25, 'first_name', ''),
(374, 25, 'last_name', ''),
(375, 25, 'description', ''),
(376, 25, 'rich_editing', 'true'),
(377, 25, 'comment_shortcuts', 'false'),
(378, 25, 'admin_color', 'fresh'),
(379, 25, 'use_ssl', '0'),
(380, 25, 'show_admin_bar_front', 'true'),
(381, 25, 'rtl21016_capabilities', 'a:1:{s:8:"operator";b:1;}'),
(382, 25, 'rtl21016_user_level', '0'),
(383, 25, 'dismissed_wp_pointers', ''),
(384, 25, 'country_group', 'PH'),
(385, 25, 'operator_group', 'SKYCable'),
(387, 1, 'rtl21016_media_library_mode', 'list'),
(391, 25, 'session_tokens', 'a:3:{s:64:"18a6a978449dd9e59c2f433276e1d985b251b9e41e47d6f0fe4801fe6c43fe30";a:4:{s:10:"expiration";i:1459479645;s:2:"ip";s:13:"192.168.1.167";s:2:"ua";s:127:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586";s:5:"login";i:1459306845;}s:64:"b5cdeb3960dc75a1e49ef2e206c8567823aafe3d397f204a6feb58816b137f2a";a:4:{s:10:"expiration";i:1459480088;s:2:"ip";s:13:"192.168.1.167";s:2:"ua";s:127:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586";s:5:"login";i:1459307288;}s:64:"2993b14460f775d1561a96d14db37f5fc1e3f0f67320c1829068188b0083c3aa";a:4:{s:10:"expiration";i:1459564153;s:2:"ip";s:13:"192.168.1.167";s:2:"ua";s:114:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36";s:5:"login";i:1459391353;}}'),
(392, 12, 'session_tokens', 'a:1:{s:64:"1577c50178677cd5617be5e95a23c177449005888a566d2709cb3d367cb39322";a:4:{s:10:"expiration";i:1459998822;s:2:"ip";s:13:"192.168.1.167";s:2:"ua";s:127:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586";s:5:"login";i:1459826022;}}');

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_users`
--

CREATE TABLE IF NOT EXISTS `rtl21016_users` (
`ID` bigint(20) unsigned NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `rtl21016_users`
--

INSERT INTO `rtl21016_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'rtlcbsasia_admin', '$P$BFWSaDZSG9Vav7iXJIvUttdn0AEBZ3.', 'rtlcbsasia_admin', 'diannekatherinedelosreyes@gmail.com', '', '2016-02-10 09:39:11', '', 0, 'rtlcbsasia_admin'),
(12, 'dianne', '$P$BoeD3aMkYTLJejoAUTt1aVbtnqKWhK0', 'dianne', 'dianne@singtel.com', '', '2016-02-11 09:59:42', '', 0, 'Dianne Delos Reyes'),
(15, 'dana@skycable.com', '$P$BeTwjphduzon9t5K2lR3/vA3wVhcdV1', 'danaskycable-com', 'dana@skycable.com', '', '2016-02-12 06:00:43', '', 0, 'Dana Roxas'),
(18, 'dianne4@yahoo.com', '$P$BvQA1XYjvFZYzTvVdvV43ejdxJejpd1', 'dianne4yahoo-com', 'dianne4@yahoo.com', '', '2016-03-01 04:07:17', '', 0, 'dianne4@yahoo.com'),
(23, 'aaron.chavez@singtel.com', '$P$BucxmkFWdqNobpITbytj5myyKweiDD.', 'aaron-chavezsingtel-com', 'aaron.chavez@singtel.com', '', '2016-03-15 07:09:54', '', 0, 'aaron.chavez@singtel.com'),
(24, 'dana_admin', '$P$BC6EXwnibQSl0sCnFu8QOma6cVI95G1', 'dana_admin', 'dana.roxas@7thmedia.com', '', '2016-03-15 07:11:03', '1458025864:$P$BkbOidPCC0/j3eucmAMtACU2RAGRSz0', 0, 'Dana Roxas'),
(25, 'dianne@skycable.com', '$P$BmZJF.DyoRCslYTTQAQThkOM765VPh/', 'dianneskycable-com', 'dianne@skycable.com', '', '2016-03-23 02:11:07', '', 0, 'dianne@skycable.com');

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_wpfront_ure_login_redirect`
--

CREATE TABLE IF NOT EXISTS `rtl21016_wpfront_ure_login_redirect` (
`id` bigint(20) NOT NULL,
  `role` varchar(250) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `url` varchar(2000) DEFAULT NULL,
  `deny_wpadmin` tinyint(1) DEFAULT NULL,
  `disable_toolbar` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rtl21016_wpfront_ure_options`
--

CREATE TABLE IF NOT EXISTS `rtl21016_wpfront_ure_options` (
`id` bigint(20) NOT NULL,
  `option_name` varchar(250) DEFAULT NULL,
  `option_value` longtext
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rtl21016_wpfront_ure_options`
--

INSERT INTO `rtl21016_wpfront_ure_options` (`id`, `option_name`, `option_value`) VALUES
(1, 'rtl21016_wpfront_ure_options-db-version', '2.12.4'),
(2, 'attachment_capabilities_processed', '1'),
(3, 'user_permission_capabilities_processed', '1'),
(4, 'rtl21016_wpfront_ure_login_redirect-db-version', '2.12.4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rtl21016_ahm_country`
--
ALTER TABLE `rtl21016_ahm_country`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_ahm_download_stats`
--
ALTER TABLE `rtl21016_ahm_download_stats`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_ahm_emails`
--
ALTER TABLE `rtl21016_ahm_emails`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_ahm_feature_products`
--
ALTER TABLE `rtl21016_ahm_feature_products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_ahm_licenses`
--
ALTER TABLE `rtl21016_ahm_licenses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_ahm_orders`
--
ALTER TABLE `rtl21016_ahm_orders`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `rtl21016_ahm_order_items`
--
ALTER TABLE `rtl21016_ahm_order_items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_ahm_payment_methods`
--
ALTER TABLE `rtl21016_ahm_payment_methods`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_ahm_withdraws`
--
ALTER TABLE `rtl21016_ahm_withdraws`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_commentmeta`
--
ALTER TABLE `rtl21016_commentmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `comment_id` (`comment_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `rtl21016_comments`
--
ALTER TABLE `rtl21016_comments`
 ADD PRIMARY KEY (`comment_ID`), ADD KEY `comment_post_ID` (`comment_post_ID`), ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`), ADD KEY `comment_date_gmt` (`comment_date_gmt`), ADD KEY `comment_parent` (`comment_parent`), ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `rtl21016_custom_cart`
--
ALTER TABLE `rtl21016_custom_cart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_custom_reports`
--
ALTER TABLE `rtl21016_custom_reports`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_ewwwio_images`
--
ALTER TABLE `rtl21016_ewwwio_images`
 ADD UNIQUE KEY `id` (`id`), ADD KEY `path_image_size` (`path`(191),`image_size`);

--
-- Indexes for table `rtl21016_exportsreports_groups`
--
ALTER TABLE `rtl21016_exportsreports_groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_exportsreports_log`
--
ALTER TABLE `rtl21016_exportsreports_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_exportsreports_reports`
--
ALTER TABLE `rtl21016_exportsreports_reports`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_links`
--
ALTER TABLE `rtl21016_links`
 ADD PRIMARY KEY (`link_id`), ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `rtl21016_operator_access`
--
ALTER TABLE `rtl21016_operator_access`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_options`
--
ALTER TABLE `rtl21016_options`
 ADD PRIMARY KEY (`option_id`), ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `rtl21016_pmxe_exports`
--
ALTER TABLE `rtl21016_pmxe_exports`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_pmxe_posts`
--
ALTER TABLE `rtl21016_pmxe_posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_pmxe_templates`
--
ALTER TABLE `rtl21016_pmxe_templates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rtl21016_postmeta`
--
ALTER TABLE `rtl21016_postmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `post_id` (`post_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `rtl21016_posts`
--
ALTER TABLE `rtl21016_posts`
 ADD PRIMARY KEY (`ID`), ADD KEY `post_name` (`post_name`(191)), ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`), ADD KEY `post_parent` (`post_parent`), ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `rtl21016_termmeta`
--
ALTER TABLE `rtl21016_termmeta`
 ADD PRIMARY KEY (`meta_id`), ADD KEY `term_id` (`term_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `rtl21016_terms`
--
ALTER TABLE `rtl21016_terms`
 ADD PRIMARY KEY (`term_id`), ADD KEY `slug` (`slug`(191)), ADD KEY `name` (`name`(191));

--
-- Indexes for table `rtl21016_term_relationships`
--
ALTER TABLE `rtl21016_term_relationships`
 ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`), ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `rtl21016_term_taxonomy`
--
ALTER TABLE `rtl21016_term_taxonomy`
 ADD PRIMARY KEY (`term_taxonomy_id`), ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`), ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `rtl21016_usermeta`
--
ALTER TABLE `rtl21016_usermeta`
 ADD PRIMARY KEY (`umeta_id`), ADD KEY `user_id` (`user_id`), ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `rtl21016_users`
--
ALTER TABLE `rtl21016_users`
 ADD PRIMARY KEY (`ID`), ADD KEY `user_login_key` (`user_login`), ADD KEY `user_nicename` (`user_nicename`);

--
-- Indexes for table `rtl21016_wpfront_ure_login_redirect`
--
ALTER TABLE `rtl21016_wpfront_ure_login_redirect`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rtl21016_wpfront_ure_options`
--
ALTER TABLE `rtl21016_wpfront_ure_options`
 ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rtl21016_ahm_country`
--
ALTER TABLE `rtl21016_ahm_country`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `rtl21016_ahm_download_stats`
--
ALTER TABLE `rtl21016_ahm_download_stats`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rtl21016_ahm_emails`
--
ALTER TABLE `rtl21016_ahm_emails`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rtl21016_ahm_feature_products`
--
ALTER TABLE `rtl21016_ahm_feature_products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rtl21016_ahm_licenses`
--
ALTER TABLE `rtl21016_ahm_licenses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rtl21016_ahm_order_items`
--
ALTER TABLE `rtl21016_ahm_order_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rtl21016_ahm_payment_methods`
--
ALTER TABLE `rtl21016_ahm_payment_methods`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rtl21016_ahm_withdraws`
--
ALTER TABLE `rtl21016_ahm_withdraws`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rtl21016_commentmeta`
--
ALTER TABLE `rtl21016_commentmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rtl21016_comments`
--
ALTER TABLE `rtl21016_comments`
MODIFY `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rtl21016_custom_cart`
--
ALTER TABLE `rtl21016_custom_cart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `rtl21016_custom_reports`
--
ALTER TABLE `rtl21016_custom_reports`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=334;
--
-- AUTO_INCREMENT for table `rtl21016_ewwwio_images`
--
ALTER TABLE `rtl21016_ewwwio_images`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=598;
--
-- AUTO_INCREMENT for table `rtl21016_exportsreports_groups`
--
ALTER TABLE `rtl21016_exportsreports_groups`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rtl21016_exportsreports_log`
--
ALTER TABLE `rtl21016_exportsreports_log`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `rtl21016_exportsreports_reports`
--
ALTER TABLE `rtl21016_exportsreports_reports`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rtl21016_links`
--
ALTER TABLE `rtl21016_links`
MODIFY `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rtl21016_operator_access`
--
ALTER TABLE `rtl21016_operator_access`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `rtl21016_options`
--
ALTER TABLE `rtl21016_options`
MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1866;
--
-- AUTO_INCREMENT for table `rtl21016_pmxe_exports`
--
ALTER TABLE `rtl21016_pmxe_exports`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rtl21016_pmxe_posts`
--
ALTER TABLE `rtl21016_pmxe_posts`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rtl21016_pmxe_templates`
--
ALTER TABLE `rtl21016_pmxe_templates`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rtl21016_postmeta`
--
ALTER TABLE `rtl21016_postmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2662;
--
-- AUTO_INCREMENT for table `rtl21016_posts`
--
ALTER TABLE `rtl21016_posts`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `rtl21016_termmeta`
--
ALTER TABLE `rtl21016_termmeta`
MODIFY `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rtl21016_terms`
--
ALTER TABLE `rtl21016_terms`
MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rtl21016_term_taxonomy`
--
ALTER TABLE `rtl21016_term_taxonomy`
MODIFY `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rtl21016_usermeta`
--
ALTER TABLE `rtl21016_usermeta`
MODIFY `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=393;
--
-- AUTO_INCREMENT for table `rtl21016_users`
--
ALTER TABLE `rtl21016_users`
MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `rtl21016_wpfront_ure_login_redirect`
--
ALTER TABLE `rtl21016_wpfront_ure_login_redirect`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rtl21016_wpfront_ure_options`
--
ALTER TABLE `rtl21016_wpfront_ure_options`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

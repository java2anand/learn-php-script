-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Mar 11, 2022 at 11:59 AM
-- Server version: 10.4.19-MariaDB-1:10.4.19+maria~focal
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prod_tjweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries_master`
--

CREATE TABLE `tbl_countries_master` (
  `countries_id` int(11) NOT NULL,
  `countries_name` varchar(100) NOT NULL DEFAULT '',
  `countries_iso_code_2` char(2) NOT NULL DEFAULT '',
  `countries_iso_code_3` char(3) NOT NULL DEFAULT '',
  `countries_zone_for_dox` char(1) NOT NULL DEFAULT 'D',
  `countries_zone_for_jumbo` char(1) NOT NULL DEFAULT 'D',
  `emoji` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_countries_master`
--

INSERT INTO `tbl_countries_master` (`countries_id`, `countries_name`, `countries_iso_code_2`, `countries_iso_code_3`, `countries_zone_for_dox`, `countries_zone_for_jumbo`, `emoji`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 'A', 'D', '🇦🇫'),
(2, 'Albania', 'AL', 'ALB', 'G', 'D', '🇦🇱'),
(3, 'Algeria', 'DZ', 'DZA', 'G', 'D', '🇩🇿'),
(4, 'American Samoa', 'AS', 'ASM', 'G', 'D', '🇦🇸'),
(5, 'Andorra', 'AD', 'AND', 'F', 'D', '🇦🇩'),
(6, 'Angola', 'AO', 'AGO', 'G', 'D', '🇦🇴'),
(7, 'Anguilla', 'AI', 'AIA', 'G', 'D', '🇦🇮'),
(8, 'Antarctica', 'AQ', 'ATA', 'G', 'D', '🇦🇶'),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 'G', 'D', '🇦🇬'),
(10, 'Argentina', 'AR', 'ARG', 'G', 'D', '🇦🇷'),
(11, 'Armenia', 'AM', 'ARM', 'G', 'D', '🇦🇲'),
(12, 'Aruba', 'AW', 'ABW', 'G', 'D', '🇦🇼'),
(13, 'Australia', 'AU', 'AUS', 'F', 'D', '🇦🇺'),
(14, 'Austria', 'AT', 'AUT', 'F', 'D', '🇦🇹'),
(15, 'Azerbaijan', 'AZ', 'AZE', 'G', 'D', '🇦🇿'),
(16, 'Bahamas', 'BS', 'BHS', 'G', 'D', '🇧🇸'),
(17, 'Bahrain', 'BH', 'BHR', 'B', 'D', '🇧🇭'),
(18, 'Bangladesh', 'BD', 'BGD', 'A', 'D', '🇧🇩'),
(19, 'Barbados', 'BB', 'BRB', 'G', 'D', '🇧🇧'),
(20, 'Belarus', 'BY', 'BLR', 'G', 'D', '🇧🇾'),
(21, 'Belgium', 'BE', 'BEL', 'D', 'D', '🇧🇪'),
(22, 'Belize', 'BZ', 'BLZ', 'G', 'D', '🇧🇿'),
(23, 'Benin', 'BJ', 'BEN', 'G', 'D', '🇧🇯'),
(24, 'Bermuda', 'BM', 'BMU', 'G', 'D', '🇧🇲'),
(25, 'Bhutan', 'BT', 'BTN', 'A', 'D', '🇧🇹'),
(26, 'Bolivia', 'BO', 'BOL', 'G', 'D', '🇧🇴'),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 'H', 'D', '🇧🇦'),
(28, 'Botswana', 'BW', 'BWA', 'G', 'D', '🇧🇼'),
(29, 'Bouvet Island', 'BV', 'BVT', 'G', 'D', '🇧🇻'),
(30, 'Brazil', 'BR', 'BRA', 'G', 'D', '🇧🇷'),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 'G', 'D', '🇮🇴'),
(32, 'Brunei Darussalam', 'BN', 'BRN', 'B', 'D', '🇧🇳'),
(33, 'Bulgaria', 'BG', 'BGR', 'F', 'D', '🇧🇬'),
(34, 'Burkina Faso', 'BF', 'BFA', 'G', 'D', '🇧🇫'),
(35, 'Burundi', 'BI', 'BDI', 'G', 'D', '🇧🇮'),
(36, 'Cambodia', 'KH', 'KHM', 'C', 'D', '🇰🇭'),
(37, 'Cameroon', 'CM', 'CMR', 'G', 'D', '🇨🇲'),
(38, 'Canada', 'CA', 'CAN', 'E', 'D', '🇨🇦'),
(39, 'Cape Verde', 'CV', 'CPV', 'G', 'D', '🇨🇻'),
(40, 'Cayman Islands', 'KY', 'CYM', 'G', 'D', '🇰🇾'),
(41, 'Central African Republic', 'CF', 'CAF', 'G', 'D', '🇨🇫'),
(42, 'Chad', 'TD', 'TCD', 'G', 'D', '🇹🇩'),
(43, 'Chile', 'CL', 'CHL', 'G', 'D', '🇨🇱'),
(44, 'China', 'CN', 'CHN', 'C', 'D', '🇨🇳'),
(45, 'Christmas Island', 'CX', 'CXR', 'G', 'D', '🇨🇽'),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 'G', 'D', '🇨🇨'),
(47, 'Colombia', 'CO', 'COL', 'G', 'D', '🇨🇴'),
(48, 'Comoros', 'KM', 'COM', 'G', 'D', '🇰🇲'),
(49, 'Congo', 'CG', 'COG', 'G', 'D', '🇨🇬'),
(50, 'Cook Islands', 'CK', 'COK', 'G', 'D', '🇨🇰'),
(51, 'Costa Rica', 'CR', 'CRI', 'G', 'D', '🇨🇷'),
(52, 'Cote D\'Ivoire', 'CI', 'CIV', 'G', 'D', '🇨🇮'),
(53, 'Croatia', 'HR', 'HRV', 'G', 'D', '🇭🇷'),
(54, 'Cuba', 'CU', 'CUB', 'G', 'D', '🇨🇺'),
(55, 'Cyprus', 'CY', 'CYP', 'C', 'D', '🇨🇾'),
(56, 'Czech Republic', 'CZ', 'CZE', 'F', 'D', '🇨🇿'),
(57, 'Denmark', 'DK', 'DNK', 'D', 'D', '🇩🇰'),
(58, 'Djibouti', 'DJ', 'DJI', 'G', 'D', '🇩🇯'),
(59, 'Dominica', 'DM', 'DMA', 'G', 'D', '🇩🇲'),
(60, 'Dominican Republic', 'DO', 'DOM', 'G', 'D', '🇩🇴'),
(61, 'East Timor', 'TP', 'TMP', 'G', 'D', '🇹🇱'),
(62, 'Ecuador', 'EC', 'ECU', 'G', 'D', '🇪🇨'),
(63, 'Egypt', 'EG', 'EGY', 'C', 'D', '🇪🇬'),
(64, 'El Salvador', 'SV', 'SLV', 'G', 'D', '🇸🇻'),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 'G', 'D', '🇬🇶'),
(66, 'Eritrea', 'ER', 'ERI', 'G', 'D', '🇪🇷'),
(67, 'Estonia', 'EE', 'EST', 'G', 'D', '🇪🇪'),
(68, 'Ethiopia', 'ET', 'ETH', 'G', 'D', '🇪🇹'),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 'G', 'D', '🇫🇰'),
(70, 'Faroe Islands', 'FO', 'FRO', 'G', 'D', '🇫🇴'),
(71, 'Fiji', 'FJ', 'FJI', 'G', 'D', '🇫🇯'),
(72, 'Finland', 'FI', 'FIN', 'F', 'D', '🇫🇮'),
(73, 'France', 'FR', 'FRA', 'D', 'D', '🇫🇷'),
(74, 'France,Metropolitan', 'FX', 'FXX', 'G', 'D', '🇫🇷'),
(75, 'French Guiana', 'GF', 'GUF', 'G', 'D', '🇬🇫'),
(76, 'French Polynesia', 'PF', 'PYF', 'G', 'D', '🇵🇫'),
(77, 'French Southern Territories', 'TF', 'ATF', 'G', 'D', '🇹🇫'),
(78, 'Gabon', 'GA', 'GAB', 'G', 'D', '🇬🇦'),
(79, 'Gambia', 'GM', 'GMB', 'G', 'D', '🇬🇲'),
(80, 'Georgia', 'GE', 'GEO', 'G', 'D', '🇬🇪'),
(81, 'Germany', 'DE', 'DEU', 'D', 'D', '🇩🇪'),
(82, 'Ghana', 'GH', 'GHA', 'G', 'D', '🇬🇭'),
(83, 'Gibraltar', 'GI', 'GIB', 'F', 'D', '🇬🇮'),
(84, 'Greece', 'GR', 'GRC', 'F', 'D', '🇬🇷'),
(85, 'Greenland', 'GL', 'GRL', 'D', 'D', '🇬🇱'),
(86, 'Grenada', 'GD', 'GRD', 'G', 'D', '🇬🇩'),
(87, 'Guadeloupe', 'GP', 'GLP', 'G', 'D', '🇬🇵'),
(88, 'Guam', 'GU', 'GUM', 'G', 'D', '🇬🇺'),
(89, 'Guatemala', 'GT', 'GTM', 'G', 'D', '🇬🇹'),
(90, 'Guinea', 'GN', 'GIN', 'G', 'D', '🇬🇳'),
(91, 'Guinea-bissau', 'GW', 'GNB', 'G', 'D', '🇬🇼'),
(92, 'Guyana', 'GY', 'GUY', 'G', 'D', '🇬🇾'),
(93, 'Haiti', 'HT', 'HTI', 'G', 'D', '🇭🇹'),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 'G', 'D', '🇭🇲'),
(95, 'Honduras', 'HN', 'HND', 'G', 'D', '🇭🇳'),
(96, 'Hong Kong', 'HK', 'HKG', 'C', 'D', '🇭🇰'),
(97, 'Hungary', 'HU', 'HUN', 'F', 'D', '🇭🇺'),
(98, 'Iceland', 'IS', 'ISL', 'F', 'D', '🇮🇸'),
(99, 'India', 'IN', 'IND', 'H', 'D', '🇮🇳'),
(100, 'Indonesia', 'ID', 'IDN', 'C', 'D', '🇮🇩'),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 'C', 'D', '🇮🇷'),
(102, 'Iraq', 'IQ', 'IRQ', 'C', 'D', '🇮🇶'),
(103, 'Ireland', 'IE', 'IRL', 'F', 'D', '🇮🇪'),
(104, 'Israel', 'IL', 'ISR', 'F', 'D', '🇮🇱'),
(105, 'Italy', 'IT', 'ITA', 'D', 'D', '🇮🇹'),
(106, 'Jamaica', 'JM', 'JAM', 'G', 'D', '🇯🇲'),
(107, 'Japan', 'JP', 'JPN', 'F', 'D', '🇯🇵'),
(108, 'Jordan', 'JO', 'JOR', 'C', 'D', '🇯🇴'),
(109, 'Kazakhstan', 'KZ', 'KAZ', 'G', 'D', '🇰🇿'),
(110, 'Kenya', 'KE', 'KEN', 'G', 'D', '🇰🇪'),
(111, 'Kiribati', 'KI', 'KIR', 'G', 'D', '🇰🇮'),
(112, 'Korea,Democratic People\'s Republic of', 'KP', 'PRK', 'C', 'D', '🇰🇵'),
(113, 'Korea,Republic of', 'KR', 'KOR', 'C', 'D', '🇰🇷'),
(114, 'Kuwait', 'KW', 'KWT', 'B', 'D', '🇰🇼'),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 'G', 'D', '🇰🇬'),
(116, 'Lao People\'s Democratic Republic', 'LA', 'LAO', 'C', 'D', '🇱🇦'),
(117, 'Latvia', 'LV', 'LVA', 'G', 'D', '🇱🇻'),
(118, 'Lebanon', 'LB', 'LBN', 'C', 'D', '🇱🇧'),
(119, 'Lesotho', 'LS', 'LSO', 'G', 'D', '🇱🇸'),
(120, 'Liberia', 'LR', 'LBR', 'G', 'D', '🇱🇷'),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 'G', 'D', '🇱🇾'),
(122, 'Liechtenstein', 'LI', 'LIE', 'D', 'D', '🇱🇮'),
(123, 'Lithuania', 'LT', 'LTU', 'G', 'D', '🇱🇹'),
(124, 'Luxembourg', 'LU', 'LUX', 'D', 'D', '🇱🇺'),
(125, 'Macau', 'MO', 'MAC', 'G', 'D', '🇲🇴'),
(126, 'Macedonia,The Former Yugoslav Republic of', 'MK', 'MKD', 'G', 'D', '🇲🇰'),
(127, 'Madagascar', 'MG', 'MDG', 'G', 'D', '🇲🇬'),
(128, 'Malawi', 'MW', 'MWI', 'G', 'D', '🇲🇼'),
(129, 'Malaysia', 'MY', 'MYS', 'C', 'D', '🇲🇾'),
(130, 'Maldives', 'MV', 'MDV', 'D', 'D', '🇲🇻'),
(131, 'Mali', 'ML', 'MLI', 'G', 'D', '🇲🇱'),
(132, 'Malta', 'MT', 'MLT', 'F', 'D', '🇲🇹'),
(133, 'Marshall Islands', 'MH', 'MHL', 'G', 'D', '🇲🇭'),
(134, 'Martinique', 'MQ', 'MTQ', 'G', 'D', '🇲🇶'),
(135, 'Mauritania', 'MR', 'MRT', 'G', 'D', '🇲🇷'),
(136, 'Mauritius', 'MU', 'MUS', 'G', 'D', '🇲🇺'),
(137, 'Mayotte', 'YT', 'MYT', 'G', 'D', '🇾🇹'),
(138, 'Mexico', 'MX', 'MEX', 'F', 'D', '🇲🇽'),
(139, 'Micronesia,Federated States of', 'FM', 'FSM', 'G', 'D', '🇫🇲'),
(140, 'Moldova,Republic of', 'MD', 'MDA', 'G', 'D', '🇲🇩'),
(141, 'Monaco', 'MC', 'MCO', 'F', 'D', '🇲🇨'),
(142, 'Mongolia', 'MN', 'MNG', 'G', 'D', '🇲🇳'),
(143, 'Montserrat', 'MS', 'MSR', 'G', 'D', '🇲🇸'),
(144, 'Morocco', 'MA', 'MAR', 'G', 'D', '🇲🇦'),
(145, 'Mozambique', 'MZ', 'MOZ', 'G', 'D', '🇲🇿'),
(146, 'Myanmar', 'MM', 'MMR', 'C', 'D', '🇲🇲'),
(147, 'Namibia', 'NA', 'NAM', 'G', 'D', '🇳🇦'),
(148, 'Nauru', 'NR', 'NRU', 'G', 'D', '🇳🇷'),
(149, 'Nepal', 'NP', 'NPL', 'A', 'D', '🇳🇵'),
(150, 'Netherlands', 'NL', 'NLD', 'D', 'D', '🇳🇱'),
(151, 'Netherlands Antilles', 'AN', 'ANT', 'G', 'D', '🇨🇼'),
(152, 'New Caledonia', 'NC', 'NCL', 'G', 'D', '🇳🇨'),
(153, 'New Zealand', 'NZ', 'NZL', 'F', 'D', '🇳🇿'),
(154, 'Nicaragua', 'NI', 'NIC', 'G', 'D', '🇳🇮'),
(155, 'Niger', 'NE', 'NER', 'G', 'D', '🇳🇪'),
(156, 'Nigeria', 'NG', 'NGA', 'G', 'D', '🇳🇬'),
(157, 'Niue', 'NU', 'NIU', 'F', 'D', '🇳🇺'),
(158, 'Norfolk Island', 'NF', 'NFK', 'F', 'D', '🇳🇫'),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 'B', 'D', '🇲🇵'),
(160, 'Norway', 'NO', 'NOR', 'F', 'D', '🇳🇴'),
(161, 'Oman', 'OM', 'OMN', 'C', 'D', '🇴🇲'),
(162, 'Pakistan', 'PK', 'PAK', 'B', 'D', '🇵🇰'),
(163, 'Palau', 'PW', 'PLW', 'G', 'D', '🇵🇼'),
(164, 'Panama', 'PA', 'PAN', 'G', 'D', '🇵🇦'),
(165, 'Papua New Guinea', 'PG', 'PNG', 'G', 'D', '🇵🇬'),
(166, 'Paraguay', 'PY', 'PRY', 'G', 'D', '🇵🇾'),
(167, 'Peru', 'PE', 'PER', 'G', 'D', '🇵🇪'),
(168, 'Philippines', 'PH', 'PHL', 'B', 'D', '🇵🇭'),
(169, 'Pitcairn', 'PN', 'PCN', 'D', 'D', '🇵🇳'),
(170, 'Poland', 'PL', 'POL', 'F', 'D', '🇵🇱'),
(171, 'Portugal', 'PT', 'PRT', 'F', 'D', '🇵🇹'),
(172, 'Puerto Rico', 'PR', 'PRI', 'E', 'D', '🇵🇷'),
(173, 'Qatar', 'QA', 'QAT', 'B', 'D', '🇶🇦'),
(174, 'Reunion', 'RE', 'REU', 'G', 'D', '🇷🇪'),
(175, 'Romania', 'RO', 'ROM', 'F', 'D', '🇷🇴'),
(176, 'Russian Federation', 'RU', 'RUS', 'G', 'D', '🇷🇺'),
(177, 'Rwanda', 'RW', 'RWA', 'G', 'D', '🇷🇼'),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 'G', 'D', '🇰🇳'),
(179, 'Saint Lucia', 'LC', 'LCA', 'G', 'D', '🇱🇨'),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 'G', 'D', '🇻🇨'),
(181, 'Samoa', 'WS', 'WSM', 'F', 'D', '🇼🇸'),
(182, 'San Marino', 'SM', 'SMR', 'E', 'D', '🇸🇲'),
(183, 'Sao Tome and Principe', 'ST', 'STP', 'G', 'D', '🇸🇹'),
(184, 'Saudi Arabia', 'SA', 'SAU', 'F', 'D', '🇸🇦'),
(185, 'Senegal', 'SN', 'SEN', 'G', 'D', '🇸🇳'),
(186, 'Seychelles', 'SC', 'SYC', 'G', 'D', '🇸🇨'),
(187, 'Sierra Leone', 'SL', 'SLE', 'G', 'D', '🇸🇱'),
(188, 'Singapore', 'SG', 'SGP', 'B', 'D', '🇸🇬'),
(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 'G', 'D', '🇸🇰'),
(190, 'Slovenia', 'SI', 'SVN', 'G', 'D', '🇸🇮'),
(191, 'Solomon Islands', 'SB', 'SLB', 'G', 'D', '🇸🇧'),
(192, 'Somalia', 'SO', 'SOM', 'G', 'D', '🇸🇴'),
(193, 'Botswana', 'ZA', 'ZAF', 'G', 'D', '🇿🇦'),
(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 'G', 'D', '🇬🇸'),
(195, 'Spain', 'ES', 'ESP', 'F', 'D', '🇪🇸'),
(196, 'Sri Lanka', 'LK', 'LKA', 'A', 'D', '🇱🇰'),
(197, 'St. Helena', 'SH', 'SHN', 'G', 'D', '🇸🇭'),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 'G', 'D', '🇵🇲'),
(199, 'Sudan', 'SD', 'SDN', 'G', 'D', '🇸🇩'),
(200, 'Suriname', 'SR', 'SUR', 'E', 'D', '🇸🇷'),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 'D', 'D', '🇸🇯'),
(202, 'Swaziland', 'SZ', 'SWZ', 'G', 'D', '🇸🇿'),
(203, 'Sweden', 'SE', 'SWE', 'F', 'D', '🇸🇪'),
(204, 'Switzerland', 'CH', 'CHE', 'D', 'D', '🇨🇭'),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 'C', 'D', '🇸🇾'),
(206, 'Taiwan', 'TW', 'TWN', 'C', 'D', '🇹🇼'),
(207, 'Tajikistan', 'TJ', 'TJK', 'G', 'D', '🇹🇯'),
(208, 'Tanzania,United Republic of', 'TZ', 'TZA', 'G', 'D', '🇹🇿'),
(209, 'Thailand', 'TH', 'THA', 'B', 'D', '🇹🇭'),
(210, 'Togo', 'TG', 'TGO', 'G', 'D', '🇹🇬'),
(211, 'Tokelau', 'TK', 'TKL', 'G', 'D', '🇹🇰'),
(212, 'Tonga', 'TO', 'TON', 'G', 'D', '🇹🇴'),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 'G', 'D', '🇹🇹'),
(214, 'Tunisia', 'TN', 'TUN', 'G', 'D', '🇹🇳'),
(215, 'Turkey', 'TR', 'TUR', 'F', 'D', '🇹🇷'),
(216, 'Turkmenistan', 'TM', 'TKM', 'G', 'D', '🇹🇲'),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 'G', 'D', '🇹🇨'),
(218, 'Tuvalu', 'TV', 'TUV', 'F', 'D', '🇹🇻'),
(219, 'Uganda', 'UG', 'UGA', 'G', 'D', '🇺🇬'),
(220, 'Ukraine', 'UA', 'UKR', 'G', 'D', '🇺🇦'),
(221, 'United Arab Emirates', 'AE', 'ARE', 'A', 'D', '🇦🇪'),
(222, 'United Kingdom', 'GB', 'GBR', 'D', 'D', '🇬🇧'),
(223, 'United States', 'US', 'USA', 'E', 'D', '🇺🇸'),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 'G', 'D', '🇺🇲'),
(225, 'Uruguay', 'UY', 'URY', 'G', 'D', '🇺🇾'),
(226, 'Uzbekistan', 'UZ', 'UZB', 'G', 'D', '🇺🇿'),
(227, 'Vanuatu', 'VU', 'VUT', 'G', 'D', '🇻🇺'),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 'G', 'D', '🇻🇦'),
(229, 'Venezuela', 'VE', 'VEN', 'G', 'D', '🇻🇪'),
(230, 'Viet Nam', 'VN', 'VNM', 'C', 'D', '🇻🇳'),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 'G', 'D', '🇻🇬'),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 'G', 'D', '🇻🇮'),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 'G', 'D', '🇼🇫'),
(234, 'Western Sahara', 'EH', 'ESH', 'G', 'D', '🇪🇭'),
(235, 'Yemen', 'YE', 'YEM', 'B', 'D', '🇾🇪'),
(236, 'Yugoslavia', 'YU', 'YUG', 'G', 'D', ''),
(237, 'Zaire', 'ZR', 'ZAR', 'G', 'D', '🇿🇦'),
(238, 'Zambia', 'ZM', 'ZMB', 'G', 'D', '🇿🇲'),
(239, 'Zimbabwe', 'ZW', 'ZWE', 'G', 'D', '🇿🇼'),
(240, 'Kosovo', 'XK', 'XKX', 'D', 'D', '🇽🇰');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_countries_master`
--
ALTER TABLE `tbl_countries_master`
  ADD PRIMARY KEY (`countries_id`),
  ADD KEY `IDX_COUNTRIES_NAME` (`countries_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_countries_master`
--
ALTER TABLE `tbl_countries_master`
  MODIFY `countries_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

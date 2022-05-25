-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 03:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryid` varchar(255) NOT NULL,
  `countryname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryid`, `countryname`) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AN', 'Netherlands Antilles'),
('AO', 'Angola'),
('AQ', 'Antarctica'),
('AR', 'Argentina'),
('AS', 'American Samoa'),
('AT', 'Austria'),
('ATG', 'FRANCE'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AX', 'Aland Islands'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BL', 'Saint Barthelemy'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia'),
('BQ', 'Bonaire, Sint Eustatius and Saba'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BV', 'Bouvet Island'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CD', 'Congo, Democratic Republic of the Congo'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Cote D\'Ivoire'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CS', 'Serbia and Montenegro'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CW', 'Curacao'),
('CX', 'Christmas Island'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('EH', 'Western Sahara'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands (Malvinas)'),
('FM', 'Micronesia, Federated States of'),
('FO', 'Faroe Islands'),
('FR', 'France'),
('GA', 'Gabon'),
('GB', 'United Kingdom'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GG', 'Guernsey'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GS', 'South Georgia and the South Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HM', 'Heard Island and Mcdonald Islands'),
('HN', 'Honduras'),
('HR', 'Croatia'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IM', 'Isle of Man'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Iran, Islamic Republic of'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JE', 'Jersey'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'Korea, Democratic People\'s Republic of'),
('KR', 'Korea, Republic of'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People\'s Democratic Republic'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libyan Arab Jamahiriya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova, Republic of'),
('ME', 'Montenegro'),
('MF', 'Saint Martin'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia, the Former Yugoslav Republic of'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macao'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'Saint Pierre and Miquelon'),
('PN', 'Pitcairn'),
('PR', 'Puerto Rico'),
('PS', 'Palestinian Territory, Occupied'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SH', 'Saint Helena'),
('SI', 'Slovenia'),
('SJ', 'Svalbard and Jan Mayen'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('SS', 'South Sudan'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SX', 'Sint Maarten'),
('SY', 'Syrian Arab Republic'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TF', 'French Southern Territories'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TL', 'Timor-Leste'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan, Province of China'),
('TZ', 'Tanzania, United Republic of'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UM', 'United States Minor Outlying Islands'),
('US', 'United States'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Holy See (Vatican City State)'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VG', 'Virgin Islands, British'),
('VI', 'Virgin Islands, U.s.'),
('VN', 'Viet Nam'),
('VU', 'Vanuatu'),
('WF', 'Wallis and Futuna'),
('WS', 'Samoa'),
('XK', 'Kosovo'),
('YE', 'Yemen'),
('YT', 'Mayotte'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(9) NOT NULL,
  `user_id` int(9) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `countryid` varchar(3) NOT NULL,
  `profiletext` varchar(500) NOT NULL,
  `position` varchar(50) NOT NULL,
  `positiontext` varchar(500) NOT NULL,
  `video` varchar(11) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `contactpersoon` varchar(50) NOT NULL,
  `email_contactpersoon` varchar(50) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `user_id`, `name`, `street_address`, `postal_code`, `city`, `countryid`, `profiletext`, `position`, `positiontext`, `video`, `logo`, `contactpersoon`, `email_contactpersoon`, `website`) VALUES
(1, 1, 'Oxford', 'street', 'postcode', 'city', 'NL', 'profile text', 'position', 'Cambridge', 'Cambridge', 'Cambridge', 'Cambridge', 'alex@gmail.com', 'www.roc.nl'),
(15, NULL, 'Cambridge', 'Bolivia', '2090EE', 'London', 'GB', 'University', 'Head Leader', 'Chief', 'Video', 'Logo', 'Martin Stewart', 'martin@gmail.com', 'www.uk.com'),
(18, 1, 'Oxford', 'street', 'postcode', 'city', 'NL', 'profile text', 'position', 'Cambridge', 'Cambridge', 'Cambridge', 'Cambridge', 'alex@gmail.com', 'www.roc.nl'),
(21, 75, 'Rituals', 'ricardo', 'ricardo', 'ricardo', 'AW', 'r', 'r', 'r', 'r', 'r', 'r', 'ricardo@mail.com', 'ricardo.com'),
(22, 76, 'n', 'n', 'n', 'nero', 'MQ', 'n', 'n', 'n', 'nnnnn', 'n', 'n', 'n@n.c', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE `entity` (
  `company_id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `companyname` varchar(120) NOT NULL,
  `street_address` varchar(60) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `city` varchar(60) NOT NULL,
  `countryid` varchar(3) NOT NULL,
  `profiletext` varchar(500) NOT NULL,
  `position` varchar(50) NOT NULL,
  `positiontext` varchar(1000) NOT NULL,
  `video` varchar(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `contactpersoon` varchar(50) NOT NULL,
  `email_contactpersoon` varchar(50) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`company_id`, `user_id`, `companyname`, `street_address`, `postal_code`, `city`, `countryid`, `profiletext`, `position`, `positiontext`, `video`, `logo`, `contactpersoon`, `email_contactpersoon`, `website`) VALUES
(1, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(2, 0, 'Mercedes', 'Zuil', '6641MG', 'Beuningen Gld', 'NL', 's', 'ss', 's', 'ss', 's', 'Assad Mustafa', 'mr.assad@live.fr', 'ss'),
(4, 0, 'Mercedes', 'Zuil', '6641MG', 'Beuningen Gld', 'NL', 'q', 'q', 'q', 'q', 'q', 'Assad Mustafa', 'mr.assad@live.fr', 'q'),
(5, 0, 'Mercedes', 'Zuil', '6641MG', 'Beuningen Gld', 'NL', 'q', 'q', 'q', 'q', 'q', 'q', 'mr.assad@live.fr', 'q'),
(7, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(8, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(12, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(13, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(14, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(15, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(16, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(17, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(18, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(19, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(20, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(21, 1, 'Mercedes', 'Martenstreet', '6641BM', 'Los Angelos', 'AR', 'TEXT', 'Director', 'Head office', 'VIDEO', 'LOGO', 'Hendrik Mayer', 'hendrik@gmail.com', 'www.facebook.com'),
(23, 0, 'Cambridge', 'Wellhampton', '5644RX', 'London', 'GB', 'n', 'n', 'n', 'n', 'n', 'gigi Adam', 'adam@gmail.com', 'n'),
(27, 1, 'Mercedes', 'Zuil', '6641MG', 'Beuningen Gld', 'NL', 'mmm', 'mmm', 'mmm', 'mmm', 'mmmm', 'm', 'mr.assad@live.fr', 'mmmmmm'),
(28, 62, 'Mercedes', 'Zuil', '6641MG', 'Beuningen Gld', 'NL', 'jj', 'kkk', 'kkk', 'ikikik', 'iiii', 'q', 'mr.assad@live.fr', 'kkkk'),
(29, 63, 'mmmmmmmmmm', 'mmmmmmm', 'mmmmmmm', 'mmmmmm', 'MO', 'mmmm', 'mmm', 'mmm', 'mmm', 'mm', 'Marwan Abdalrazeq', 'mariorazeq@gmail.com', 'mmm'),
(30, 64, 'mmmmmmmmmm', 'mmmmmmm', 'mmmmmmm', 'mmmmmm', 'MO', 'm', 'm', 'm', 'm', 'm', 'Marwan Abdalrazeq', 'mariorazeq@gmail.com', 'm'),
(31, 65, 'student', 'n', 'n', 'nero', 'AT', 'n', 'n', 'n', 'n', 'n', 'nero nero', 'n@n.c', 'n'),
(32, 74, 'Apple', 'Apple', 'Apple', 'Apple', 'NL', 'Apple', 'Apple', 'Apple', 'Apple', 'Apple', 'Apple', 'adam@gmail.com', 'www.gucci.com'),
(33, 77, 'Cambridge', 'Wellhampton', '5644RX', 'London', 'GB', 'm', 'm', 'm', 'm', 'm', 'Marwan Abdalrazeq', 'adam@gmail.com', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `intern`
--

CREATE TABLE `intern` (
  `intern_id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `dateofbirth` date NOT NULL,
  `countryid` varchar(255) DEFAULT NULL,
  `profiletext` varchar(500) NOT NULL,
  `study` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `profileimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`intern_id`, `user_id`, `email`, `firstname`, `surname`, `street_address`, `postal_code`, `city`, `dateofbirth`, `countryid`, `profiletext`, `study`, `video`, `profileimage`) VALUES
(1, 26, 'samir@gmail.com', 'Kermit', 'Winters', 'P.O. Box 994, 4764 Feugiat. Rd.', '15-921', 'Cagliari', '0000-00-00', 'AI', 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', 'sapien. Aenean', 'MJL21PJV4FD', 'FWQ38WKH3UY'),
(2, 33, 'ramon@gmail.com', 'Kermit', 'Winters', 'P.O. Box 994, 4764 Feugiat. Rd.', '15-921', 'Cagliari', '0000-00-00', 'AW', 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', 'sapien. Aenean', 'MJL21PJV4FD', 'FWQ38WKH3UY'),
(3, 34, 'adam@gmail.com', 'Kermit', 'Winters', 'P.O. Box 994, 4764 Feugiat. Rd.', '15-921', 'Cagliari', '0000-00-00', 'CN', 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', 'sapien. Aenean', 'MJL21PJV4FD', 'FWQ38WKH3UY'),
(4, 36, 'samer@gmail.com', 'Kermit', 'Winters', 'P.O. Box 994, 4764 Feugiat. Rd.', '15-921', 'Cagliari', '0000-00-00', 'DZ', 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', 'sapien. Aenean', 'MJL21PJV4FD', 'FWQ38WKH3UY'),
(5, 37, 'farid@gmail.com', 'Kermit', 'Winters', 'P.O. Box 994, 4764 Feugiat. Rd.', '15-921', 'Cagliari', '0000-00-00', 'DZ', 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', 'sapien. Aenean', 'MJL21PJV4FD', 'FWQ38WKH3UY'),
(6, 38, 'nero@gmail.com', 'Kermit', 'Winters', 'P.O. Box 994, 4764 Feugiat. Rd.', '15-921', 'Cagliari', '0000-00-00', 'DZ', 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', 'sapien. Aenean', 'MJL21PJV4FD', 'FWQ38WKH3UY'),
(7, 39, 'ricardo@gmail.com', 'Kermit', 'Winters', 'P.O. Box 994, 4764 Feugiat. Rd.', '15-921', 'Cagliari', '0000-00-00', 'DZ', 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', 'sapien. Aenean', 'MJL21PJV4FD', 'FWQ38WKH3UY'),
(8, 40, 'tony@gmail.com', 'Kermit', 'Winters', 'P.O. Box 994, 4764 Feugiat. Rd.', '15-921', 'Cagliari', '0000-00-00', 'DZ', 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', 'sapien. Aenean', 'MJL21PJV4FD', 'FWQ38WKH3UY'),
(9, 35, 'sam@gmail.com', 'Sam', 'Davidson', 'P.O. Box 994, 4764 Feugiat. Rd.', '15-921', 'Cagliari', '0000-00-00', 'AM', 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', 'sapien. Aenean', 'MJL21PJV4FD', 'FWQ38WKH3UY'),
(10, 31, 'david@gmail.com', 'Kermit', 'Winters', 'P.O. Box 994, 4764 Feugiat. Rd.', '15-921', 'Cagliari', '0000-00-00', 'DZ', 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', 'sapien. Aenean', 'MJL21PJV4FD', 'FWQ38WKH3UY'),
(23, 78, 'intern@roc.nl', 'x', 'x', 'x', 'x', 'x', '1111-11-11', 'NA', 'x', 'x', 'x', 'x'),
(24, 79, 'alkomet.005@gmail.com', 'ameer', 'abo lahab', 'kaisar', '2090EE', 'Dummar', '1111-11-11', 'NL', 'x', 'x', 'x', 'x'),
(25, 80, 'intern@roc.nl', 'Assad', 'Mustafa', 'Maartenstraat', '8888BB', 'Nijmegen', '1995-08-27', 'NL', 'im a student', 'Software Developer', 'Youtube', 'Image'),
(27, 82, 'mr.assad@live.fr', 'Assad', 'Mustafa', 'Zuil, 32', '6641MG', 'Beuningen Gld', '2000-09-09', 'PL', 'im a student', 'Software Developer', 'Youtube', 'Image'),
(29, 84, 'intern@gmail.com', 'Assad', 'Mustafa', 'Zuil, 32', '6641MG', 'Beuningen Gld', '2021-06-17', 'CN', 'about', 'programmeren', 'video link', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(9) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`, `email`) VALUES
(1, 'admin', '12345678', 'admin', 'mr.assad@live.fr'),
(10, 'intern', '$2y$10$nUnjqAV40IjDnfu4CEABHedtt/aBGotCD.7HUA0h23a7xlaAJ80Dq', 'intern', 'student@roc.nl'),
(11, 'entity', '$2y$10$zwTuHcOqvpJ629EWikSCYe.3zCYb/kP3K4oL1L6OVtMrP/1epczh6', 'entity', 'cvucvw@live.fr'),
(12, 'education', '$2y$10$mjSujgDhDUOWQBCmWJcZyO9u10GckvsxH5GmQdADwsr4uhDrROphW', 'education', 'cuevb@cc.cc'),
(20, 'bchiebci', 'adminvuevneu9ve', 'education', 'bciuebce@cece.cec'),
(21, 'samir', 'samir2020', 'education', 'samir@gmail.com'),
(22, 'ayman', 'ayman2020', 'intern', 'ayman@gmail.com'),
(23, 'omar', 'omar2020', 'intern', 'omar@gmail.com'),
(24, 'hvur9vhru9', 'ameer1010', 'intern', 'ameer@gmail.com'),
(25, 'jad', 'jad202020', 'intern', 'jad@gmail.com'),
(26, 'samir', 'samir2020', 'intern', 'samir@gmail.com'),
(27, 'entity', 'entity2020', 'entity', 'entity@gmail.com'),
(28, 'student', 'student2020', 'education', 'student@roc.nl'),
(29, 'register', 'register2020', 'education', 'register@gmail.com'),
(30, 'bueor', '12341234', 'entity', 'vbuv@vur.cc'),
(31, 'viui', 'asdfasdf', 'entity', 'fc6wc@tuft.com'),
(32, 'assad', '12341234', 'entity', 'assad@live.com'),
(33, 'ramon', 'ramon2020', 'intern', 'ramon@gmail.com'),
(34, 'adam', 'adam2020', 'intern', 'adam@gmail.com'),
(35, 'adam', 'adam2020', 'intern', 'adam@gmail.com'),
(36, 'samer', 'samer2020', 'intern', 'samer@gmail.com'),
(37, 'farid', 'farid2020', 'entity', 'farid@gmail.com'),
(38, 'nero', 'nero2020', 'intern', 'nero@gmail.com'),
(39, 'ricardo', 'ricardo2020', 'intern', 'ricardo@gmail.com'),
(40, 'vbuoebvwi', 'vbruvbruivbirwebv', 'intern', 'bhbhb@bhbh.com'),
(41, 'vbruivbi', 'beuipgviugvyye2', 'intern', 'bivbuvy@byive.com'),
(42, 'admbfin', 'maan2020', 'intern', 'bin@mail.com'),
(43, 'a', '78907890', 'intern', 'a@gmail.com'),
(44, 'b', '78907890', 'entity', 'b@gmail.com'),
(45, 'student', 'student2020', 'education', 'student@roc.nl'),
(46, 'vbrivb', 'uciwebciuewb', 'education', 'ceiuce@cneuvc.com'),
(47, 'eniiiii', 'enienieni', 'entity', 'eni@eni.com'),
(48, 'edu', 'edueduedu', 'education', 'edu@rum.com'),
(49, 'adminvbiuvri', 'bceyiveyvi', 'entity', 'vbreivbe@vubrv.vbuv'),
(50, 'interno', 'intern2020', 'intern', 'intern@roc.nl'),
(51, 'vuoewv', 'bviwpvbiywevcpiyw', 'entity', 'ceiuce@cneuvc.com'),
(52, 'cbeuovbueo', 'bui[b[iu[iugb[ih[ib', 'education', 'ceiuce@cneuvc.com'),
(53, 'cjbcb', 'buigiugiugiugiu', 'intern', 'ceiuce@cneuvc.com'),
(54, 'fbehfb', 'fyw7evf7wyv', 'intern', 'bfyeb@dd.c'),
(55, 'intern', 'mkl;mkl;', 'intern', 'intern@roc.nl'),
(56, 'entity', 'mkmkmkmkmkmk', 'entity', 'entity@gmail.com'),
(57, 'student', 'student', 'education', 'farid2@hotmail.com'),
(58, 'newuser', '12341234', 'entity', 'new@gmail.com'),
(59, 'new', '12341234', 'entity', 'new@gmail.com'),
(60, 'oooo', 'ooooooo', 'entity', 'ooo@gmail.com'),
(61, 'oooo', 'ooooooo', 'entity', 'ooo@gmail.com'),
(62, 'oooo', 'ooooooo', 'entity', 'ooo@gmail.com'),
(63, 'mmmmm', 'mmmmmmmmmmmm', 'entity', 'mmm@mm.com'),
(64, 'zzzzz', 'zzzzzzzzzzzzzzzzzzzz', 'entity', 'z@z.com'),
(65, 'student', 'student', 'entity', 'student@roc.nl'),
(66, 'darkspell', 'dark2020', 'intern', 'dark@gmail.com'),
(67, 'darkspell', 'dark2020', 'intern', 'dark@gmail.com'),
(68, 'darkspell', 'dark2020', 'intern', 'dark@gmail.com'),
(69, 'darkspell', 'dark2020', 'intern', 'dark@gmail.com'),
(70, 'darkspell', 'dark2020', 'intern', 'dark@gmail.com'),
(71, 'darkspell', 'dark2020', 'intern', 'dark@gmail.com'),
(72, 'darkspell', 'dark2020', 'intern', 'dark@gmail.com'),
(73, 'darkspell', 'dark2020', 'intern', 'dark@gmail.com'),
(74, 'malik', '12341234', 'entity', 'malik@gmail.com'),
(75, 'kloklo', 'klokloklo', 'education', 'kloklo@mail.com'),
(76, 'eduuuuu', 'edueduedu', 'education', 'eduuu@mail.com'),
(77, 'vbeibve', 'bviwubvuiwwvb', 'entity', 'ceiuce@cneuvc.com'),
(78, 'intern', 'intern2020', 'intern', 'intern@roc.nl'),
(79, 'ahmad', 'alkomet2020', 'intern', 'alkomet.005@gmail.com'),
(80, 'intern', 'intern2020', 'intern', 'intern@roc.nl'),
(81, 'username', '20202020', 'intern', 'intern@mail.com'),
(82, 'intern', '123456', 'intern', 'intern@mail.com'),
(83, 'student', '12345678', 'intern', 'student@mail.com'),
(84, 'intern', 'intern2020', 'intern', 'intern@gmail.com'),
(85, 'new', '12341234', 'intern', 'new@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryid`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `countryid` (`countryid`);

--
-- Indexes for table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `countryid` (`countryid`);

--
-- Indexes for table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`intern_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `countryid` (`countryid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `entity`
--
ALTER TABLE `entity`
  MODIFY `company_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `intern`
--
ALTER TABLE `intern`
  MODIFY `intern_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `education_ibfk_2` FOREIGN KEY (`countryid`) REFERENCES `country` (`countryid`);

--
-- Constraints for table `entity`
--
ALTER TABLE `entity`
  ADD CONSTRAINT `entity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `entity_ibfk_2` FOREIGN KEY (`countryid`) REFERENCES `country` (`countryid`);

--
-- Constraints for table `intern`
--
ALTER TABLE `intern`
  ADD CONSTRAINT `intern_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `intern_ibfk_2` FOREIGN KEY (`countryid`) REFERENCES `country` (`countryid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

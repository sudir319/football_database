-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2021 at 10:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `FB_COUNTRY`
--

CREATE TABLE `FB_COUNTRY` (
  `COUNTRY_ID` int(11) NOT NULL,
  `COUNTRY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FB_COUNTRY`
--

INSERT INTO `FB_COUNTRY` (`COUNTRY_ID`, `COUNTRY`) VALUES
(1, 'Albania'),
(50, 'Algeria'),
(31, 'Argentina'),
(32, 'Australia'),
(2, 'Austria'),
(74, 'Bahrain'),
(3, 'Belgium'),
(51, 'Bosnia and Herzegovina'),
(33, 'Brazil'),
(52, 'Cameroon'),
(53, 'Chile'),
(68, 'China PR'),
(34, 'Colombia'),
(35, 'Costa Rica'),
(4, 'Croatia'),
(5, 'Czech Republic'),
(36, 'Denmark'),
(54, 'Ecuador'),
(37, 'Egypt'),
(6, 'England'),
(60, 'Finland'),
(7, 'France'),
(8, 'Germany'),
(55, 'Ghana'),
(56, 'Greece'),
(57, 'Honduras'),
(9, 'Hungary'),
(10, 'Iceland'),
(30, 'India'),
(38, 'Iran'),
(67, 'Iraq'),
(11, 'Italy'),
(58, 'Ivory Coast'),
(39, 'Japan'),
(73, 'Jordan'),
(76, 'Kyrgyzstan'),
(71, 'Lebanon'),
(40, 'Mexico'),
(41, 'Morocco'),
(26, 'Netherlands'),
(42, 'Nigeria'),
(77, 'North Korea'),
(61, 'North Macedonia'),
(12, 'Northern Ireland'),
(29, 'Norway'),
(70, 'Oman'),
(69, 'Palestine'),
(43, 'Panama'),
(44, 'Peru'),
(78, 'Philippines'),
(13, 'Poland'),
(14, 'Portugal'),
(63, 'Qatar'),
(15, 'Republic of Ireland'),
(16, 'Romania'),
(17, 'Russia'),
(45, 'Saudi Arabia'),
(28, 'Scotland'),
(46, 'Senegal'),
(27, 'Serbia'),
(18, 'Slovakia'),
(25, 'Slovenia'),
(47, 'South Korea'),
(19, 'Spain'),
(20, 'Sweden'),
(21, 'Switzerland'),
(66, 'Syria'),
(64, 'Thailand'),
(48, 'Tunisia'),
(22, 'Turkey'),
(72, 'Turkmenistan'),
(23, 'Ukraine'),
(62, 'United Arab Emirates'),
(59, 'United States'),
(49, 'Uruguay'),
(65, 'Uzbekistan'),
(75, 'Vietnam'),
(24, 'Wales'),
(79, 'Yemen');

-- --------------------------------------------------------

--
-- Table structure for table `FB_LEAGUE`
--

CREATE TABLE `FB_LEAGUE` (
  `LEAGUE_ID` int(11) NOT NULL,
  `LEAGUE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FB_LEAGUE`
--

INSERT INTO `FB_LEAGUE` (`LEAGUE_ID`, `LEAGUE`) VALUES
(6, 'Asian Cup 2015'),
(5, 'Asian Cup 2019'),
(4, 'European Championship 2016'),
(3, 'European Championship 2020'),
(2, 'FIFA World Cup 2014'),
(1, 'FIFA World Cup 2018');

-- --------------------------------------------------------

--
-- Table structure for table `FB_LEAGUE_TEAM`
--

CREATE TABLE `FB_LEAGUE_TEAM` (
  `LEAGUE_TEAM_ID` int(11) NOT NULL,
  `LEAGUE_ID` int(11) NOT NULL,
  `TEAM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FB_LEAGUE_TEAM`
--

INSERT INTO `FB_LEAGUE_TEAM` (`LEAGUE_TEAM_ID`, `LEAGUE_ID`, `TEAM_ID`) VALUES
(1, 1, 31),
(2, 1, 32),
(3, 1, 3),
(4, 1, 33),
(5, 1, 34),
(6, 1, 35),
(7, 1, 4),
(8, 1, 36),
(9, 1, 37),
(10, 1, 6),
(11, 1, 7),
(12, 1, 8),
(13, 1, 10),
(14, 1, 38),
(15, 1, 39),
(16, 1, 40),
(17, 1, 41),
(18, 1, 42),
(19, 1, 43),
(20, 1, 44),
(21, 1, 13),
(22, 1, 14),
(23, 1, 17),
(24, 1, 45),
(25, 1, 46),
(26, 1, 27),
(27, 1, 47),
(28, 1, 19),
(29, 1, 20),
(30, 1, 21),
(31, 1, 48),
(32, 1, 49),
(33, 2, 50),
(34, 2, 31),
(35, 2, 32),
(36, 2, 3),
(37, 2, 51),
(38, 2, 33),
(39, 2, 52),
(40, 2, 34),
(41, 2, 53),
(42, 2, 35),
(43, 2, 4),
(44, 2, 6),
(45, 2, 54),
(46, 2, 7),
(47, 2, 8),
(48, 2, 55),
(49, 2, 56),
(50, 2, 57),
(51, 2, 11),
(52, 2, 38),
(53, 2, 39),
(54, 2, 58),
(55, 2, 40),
(56, 2, 26),
(57, 2, 42),
(58, 2, 14),
(59, 2, 17),
(60, 2, 19),
(61, 2, 47),
(62, 2, 21),
(63, 2, 49),
(64, 2, 59),
(65, 3, 3),
(66, 3, 4),
(67, 3, 36),
(68, 3, 2),
(69, 3, 11),
(70, 3, 17),
(71, 3, 13),
(72, 3, 7),
(73, 3, 19),
(74, 3, 22),
(75, 3, 6),
(76, 3, 9),
(77, 3, 5),
(78, 3, 60),
(79, 3, 61),
(80, 3, 28),
(81, 3, 20),
(82, 3, 26),
(83, 3, 8),
(84, 3, 14),
(85, 3, 21),
(86, 3, 18),
(87, 3, 23),
(88, 3, 24),
(89, 5, 62),
(90, 5, 63),
(91, 5, 47),
(92, 5, 39),
(93, 5, 64),
(94, 5, 45),
(95, 5, 32),
(96, 5, 65),
(97, 5, 38),
(98, 5, 66),
(99, 5, 67),
(100, 5, 68),
(101, 5, 69),
(102, 5, 70),
(103, 5, 30),
(104, 5, 71),
(105, 5, 72),
(106, 5, 73),
(107, 5, 74),
(108, 5, 75),
(109, 5, 76),
(110, 5, 77),
(111, 5, 78),
(112, 5, 79);

-- --------------------------------------------------------

--
-- Table structure for table `FB_PERSONNEL`
--

CREATE TABLE `FB_PERSONNEL` (
  `PERSONNEL_ID` int(11) NOT NULL,
  `PERSONNEL` varchar(50) NOT NULL,
  `HEIGHT` int(11) NOT NULL,
  `COUNTRY_ID` int(11) NOT NULL,
  `ROLE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FB_PERSONNEL`
--

INSERT INTO `FB_PERSONNEL` (`PERSONNEL_ID`, `PERSONNEL`, `HEIGHT`, `COUNTRY_ID`, `ROLE_ID`) VALUES
(1, 'Sunil Chhetri', 180, 30, 1),
(2, 'Bhaichung Bhutia', 180, 30, 1),
(3, 'Shabbir Ali', 180, 30, 1),
(4, 'Climax Lawrence', 180, 30, 1),
(5, 'Gouramangi Singh', 180, 30, 1),
(6, 'Subrata Pal', 180, 30, 1),
(7, 'I. M. Vijayan', 180, 30, 1),
(8, 'Mahesh Gawli', 180, 30, 1),
(9, 'Syed Rahim Nabi', 180, 30, 1),
(10, 'Renedy Singh', 180, 30, 1),
(11, 'Jeje Lalpekhlua', 180, 30, 1),
(12, 'Surkumar Singh', 180, 30, 1),
(13, 'Steven Dias', 180, 30, 1),
(14, 'Deepak Mondal', 180, 30, 1),
(15, 'Clifford Miranda', 180, 30, 1),
(16, 'N. P. Pradeep', 180, 30, 1),
(17, 'Gurpreet Singh Sandhu', 180, 30, 1),
(18, 'Sandesh Jhingan', 180, 30, 1),
(19, 'Pritam Kotal', 180, 30, 1),
(20, 'Samir Subash Naik', 180, 30, 1),
(21, 'P. K. Banerjee', 180, 30, 1),
(22, 'Abhishek Yadav', 180, 30, 1),
(23, 'Rowllin Borges', 180, 30, 1),
(24, 'Jo Paul Ancheri', 180, 30, 1),
(25, 'Anwar Ali', 180, 30, 1),
(26, 'Mehrajuddin Wadoo', 180, 30, 1),
(27, 'Udanta Singh', 180, 30, 1),
(28, 'Anirudh Thapa', 180, 30, 1),
(29, 'Mehtab Hossain', 180, 30, 1),
(30, 'Francis Fernandes', 180, 30, 1),
(31, 'Robin Singh', 180, 30, 1),
(32, 'Narayan Das', 180, 30, 1),
(33, 'Anthony Pereira', 180, 30, 1),
(34, 'Jewel Raja', 180, 30, 1),
(35, 'Sushil Kumar Singh', 180, 30, 1),
(36, 'Arnab Mondal', 180, 30, 1),
(37, 'Halicharan Narzary', 180, 30, 1),
(38, 'Raju Gaikwad', 180, 30, 1),
(39, 'Eugeneson Lyngdoh', 180, 30, 1),
(40, 'Lenny Rodrigues', 180, 30, 1),
(41, 'Anas Edathodika', 180, 30, 1),
(42, 'Pronay Halder', 180, 30, 1),
(43, 'Manvir Singh', 180, 30, 1),
(44, 'Subhasish Bose', 180, 30, 1),
(45, 'Franco Armani', 175, 31, 1),
(46, 'Juan Musso', 175, 31, 1),
(47, 'Emiliano Martinez', 175, 31, 1),
(48, 'Lisandro Martinez', 175, 31, 1),
(49, 'Nicolas Tagliafico', 175, 31, 1),
(50, 'Gonzalo Montiel', 175, 31, 1),
(51, 'German Pezzella', 175, 31, 1),
(52, 'Marcos Acuna', 175, 31, 1),
(53, 'Cristian Romero', 175, 31, 1),
(54, 'Nicolas Otamendi', 175, 31, 1),
(55, 'Nahuel Molina', 175, 31, 1),
(56, 'Leandro Paredes', 175, 31, 1),
(57, 'Rodrigo De Paul', 175, 31, 1),
(58, 'Angel Di Maria', 175, 31, 1),
(59, 'Exequiel Palacios', 175, 31, 1),
(60, 'Nicolas Dominguez', 175, 31, 1),
(61, 'Guido Rodriguez', 175, 31, 1),
(62, 'Giovani Lo Celso', 175, 31, 1),
(63, 'Angel Correa', 175, 31, 1),
(64, 'Lionel Messi', 175, 31, 1),
(65, 'Julian Alvarez', 175, 31, 1),
(66, 'Joaquin Correa', 175, 31, 1),
(67, 'Lautaro Martinez', 175, 31, 1),
(68, 'Alisson', 175, 33, 1),
(69, 'Gabriel Chapeco', 175, 33, 1),
(70, 'Ederson', 175, 33, 1),
(71, 'Danilo', 175, 33, 1),
(72, 'Thiago Silva', 175, 33, 1),
(73, 'Marquinhos', 175, 33, 1),
(74, 'Alex Sandro', 175, 33, 1),
(75, 'Emerson', 175, 33, 1),
(76, 'Eder Militao', 175, 33, 1),
(77, 'Renan Lodi', 175, 33, 1),
(78, 'Gabriel', 175, 33, 1),
(79, 'Fabinho', 175, 33, 1),
(80, 'Gerson', 175, 33, 1),
(81, 'Fred', 175, 33, 1),
(82, 'Philippe Coutinho', 175, 33, 1),
(83, 'Edenilson', 175, 33, 1),
(84, 'Lucas Paqueta', 175, 33, 1),
(85, 'Gabriel Jesus', 175, 33, 1),
(86, 'Antony', 175, 33, 1),
(87, 'Raphinha', 175, 33, 1),
(88, 'Vinícius Junior', 175, 33, 1),
(89, 'Matheus Cunha', 175, 33, 1),
(90, 'Lautaro Martinez', 175, 33, 1),
(91, 'Mathew Ryan', 175, 32, 1),
(92, 'Danny Vukovic', 175, 32, 1),
(93, 'Lawrence Thomas', 175, 32, 1),
(94, 'Trent Sainsbury', 175, 32, 1),
(95, 'Aziz Behich', 175, 32, 1),
(96, 'Milos Degenek', 175, 32, 1),
(97, 'Bailey Wright', 175, 32, 1),
(98, 'Ryan McGowan', 175, 32, 1),
(99, 'Rhyan Grant', 175, 32, 1),
(100, 'Fran Karacic', 175, 32, 1),
(101, 'Callum Elder', 175, 32, 1),
(102, 'Jackson Irvine', 175, 32, 1),
(103, 'Ajdin Hrustic', 175, 32, 1),
(104, 'James Jeggo', 175, 32, 1),
(105, 'Riley McGree', 175, 32, 1),
(106, 'Kenny Dougall', 175, 32, 1),
(107, 'Denis Genreau', 175, 32, 1),
(108, 'Gianni Stensness', 175, 32, 1),
(109, 'Mathew Leckie', 175, 32, 1),
(110, 'Awer Mabil', 175, 32, 1),
(111, 'Nikita Rukavytsya', 175, 32, 1),
(112, 'Jamie Maclaren', 175, 32, 1),
(113, 'Mitchell Duke', 175, 32, 1),
(114, 'Martin Boyle', 175, 32, 1),
(115, 'Hugo Lloris', 175, 7, 1),
(116, 'Benoit Costil', 175, 7, 1),
(117, 'Alphonse Areola', 175, 7, 1),
(118, 'Benjamin Pavard', 175, 7, 1),
(119, 'Jules Kounde', 175, 7, 1),
(120, 'Dayot Upamecano', 175, 7, 1),
(121, 'Clement Lenglet', 175, 7, 1),
(122, 'Leo Dubois', 175, 7, 1),
(123, 'Kurt Zouma', 175, 7, 1),
(124, 'Lucas Digne', 175, 7, 1),
(125, 'Lucas Hernandez', 175, 7, 1),
(126, 'Theo Hernandez', 175, 7, 1),
(127, 'Jordan Veretout', 175, 7, 1),
(128, 'Aurelien Tchouaméni', 175, 7, 1),
(129, 'N Golo Kante', 175, 7, 1),
(130, 'Adrien Rabiot', 175, 7, 1),
(131, 'Matteo Guendouzi', 175, 7, 1),
(132, 'Antoine Griezmann', 175, 7, 1),
(133, 'Wissam Ben Yedder', 175, 7, 1),
(134, 'Kylian Mbappe', 175, 7, 1),
(135, 'Kingsley Coman', 175, 7, 1),
(136, 'Karim Benzema', 175, 7, 1),
(137, 'Moussa Diaby', 175, 7, 1),
(138, 'Martin Boyle', 175, 7, 1),
(139, 'Igor Stimac', 180, 30, 2),
(140, 'Tite', 180, 33, 2),
(141, 'Lionel Scaloni', 180, 31, 2),
(142, 'Didier Deschamps', 180, 7, 2),
(143, 'Graham Arnold', 180, 32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `FB_ROLE`
--

CREATE TABLE `FB_ROLE` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FB_ROLE`
--

INSERT INTO `FB_ROLE` (`ROLE_ID`, `ROLE`) VALUES
(2, 'Manager'),
(1, 'Player');

-- --------------------------------------------------------

--
-- Table structure for table `FB_TEAM`
--

CREATE TABLE `FB_TEAM` (
  `TEAM_ID` int(11) NOT NULL,
  `TEAM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FB_TEAM`
--

INSERT INTO `FB_TEAM` (`TEAM_ID`, `TEAM`) VALUES
(1, 'Albania'),
(50, 'Algeria'),
(31, 'Argentina'),
(32, 'Australia'),
(2, 'Austria'),
(74, 'Bahrain'),
(3, 'Belgium'),
(51, 'Bosnia and Herzegovina'),
(33, 'Brazil'),
(52, 'Cameroon'),
(53, 'Chile'),
(68, 'China PR'),
(34, 'Colombia'),
(35, 'Costa Rica'),
(4, 'Croatia'),
(5, 'Czech Republic'),
(36, 'Denmark'),
(54, 'Ecuador'),
(37, 'Egypt'),
(6, 'England'),
(60, 'Finland'),
(7, 'France'),
(8, 'Germany'),
(55, 'Ghana'),
(56, 'Greece'),
(57, 'Honduras'),
(9, 'Hungary'),
(10, 'Iceland'),
(30, 'India'),
(38, 'Iran'),
(67, 'Iraq'),
(11, 'Italy'),
(58, 'Ivory Coast'),
(39, 'Japan'),
(73, 'Jordan'),
(76, 'Kyrgyzstan'),
(71, 'Lebanon'),
(40, 'Mexico'),
(41, 'Morocco'),
(26, 'Netherlands'),
(42, 'Nigeria'),
(77, 'North Korea'),
(61, 'North Macedonia'),
(12, 'Northern Ireland'),
(29, 'Norway'),
(70, 'Oman'),
(69, 'Palestine'),
(43, 'Panama'),
(44, 'Peru'),
(78, 'Philippines'),
(13, 'Poland'),
(14, 'Portugal'),
(63, 'Qatar'),
(15, 'Republic of Ireland'),
(16, 'Romania'),
(17, 'Russia'),
(45, 'Saudi Arabia'),
(28, 'Scotland'),
(46, 'Senegal'),
(27, 'Serbia'),
(18, 'Slovakia'),
(25, 'Slovenia'),
(47, 'South Korea'),
(19, 'Spain'),
(20, 'Sweden'),
(21, 'Switzerland'),
(66, 'Syria'),
(64, 'Thailand'),
(48, 'Tunisia'),
(22, 'Turkey'),
(72, 'Turkmenistan'),
(23, 'Ukraine'),
(62, 'United Arab Emirates'),
(59, 'United States'),
(49, 'Uruguay'),
(65, 'Uzbekistan'),
(75, 'Vietnam'),
(24, 'Wales'),
(79, 'Yemen');

-- --------------------------------------------------------

--
-- Table structure for table `FB_TEAM_PERSONNEL`
--

CREATE TABLE `FB_TEAM_PERSONNEL` (
  `TEAM_PERSONNEL_ID` int(11) NOT NULL,
  `TEAM_ID` int(11) NOT NULL,
  `PERSONNEL_ID` int(11) NOT NULL,
  `FROM_DATE` date NOT NULL DEFAULT current_timestamp(),
  `TO_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FB_TEAM_PERSONNEL`
--

INSERT INTO `FB_TEAM_PERSONNEL` (`TEAM_PERSONNEL_ID`, `TEAM_ID`, `PERSONNEL_ID`, `FROM_DATE`, `TO_DATE`) VALUES
(1, 7, 115, '2017-05-10', NULL),
(2, 7, 116, '2017-05-10', NULL),
(3, 7, 117, '2017-05-10', NULL),
(4, 7, 118, '2017-05-10', NULL),
(5, 7, 119, '2017-05-10', NULL),
(6, 7, 120, '2017-05-10', NULL),
(7, 7, 121, '2017-05-10', NULL),
(8, 7, 122, '2017-05-10', NULL),
(9, 7, 123, '2017-05-10', NULL),
(10, 7, 124, '2017-05-10', NULL),
(11, 7, 125, '2017-05-10', NULL),
(12, 7, 126, '2017-05-10', NULL),
(13, 7, 127, '2017-05-10', NULL),
(14, 7, 128, '2017-05-10', NULL),
(15, 7, 129, '2017-05-10', NULL),
(16, 7, 130, '2017-05-10', NULL),
(17, 7, 131, '2017-05-10', NULL),
(18, 7, 132, '2017-05-10', NULL),
(19, 7, 133, '2017-05-10', NULL),
(20, 7, 134, '2017-05-10', NULL),
(21, 7, 135, '2017-05-10', NULL),
(22, 7, 136, '2017-05-10', NULL),
(23, 7, 137, '2017-05-10', NULL),
(24, 7, 138, '2017-05-10', NULL),
(25, 30, 1, '2017-05-10', NULL),
(26, 30, 2, '2017-05-10', NULL),
(27, 30, 3, '2017-05-10', NULL),
(28, 30, 4, '2017-05-10', NULL),
(29, 30, 5, '2017-05-10', NULL),
(30, 30, 6, '2017-05-10', NULL),
(31, 30, 7, '2017-05-10', NULL),
(32, 30, 8, '2017-05-10', NULL),
(33, 30, 9, '2017-05-10', NULL),
(34, 30, 10, '2017-05-10', NULL),
(35, 30, 11, '2017-05-10', NULL),
(36, 30, 12, '2017-05-10', NULL),
(37, 30, 13, '2017-05-10', NULL),
(38, 30, 14, '2017-05-10', NULL),
(39, 30, 15, '2017-05-10', NULL),
(40, 30, 16, '2017-05-10', NULL),
(41, 30, 17, '2017-05-10', NULL),
(42, 30, 18, '2017-05-10', NULL),
(43, 30, 19, '2017-05-10', NULL),
(44, 30, 20, '2017-05-10', NULL),
(45, 30, 21, '2017-05-10', NULL),
(46, 30, 22, '2017-05-10', NULL),
(47, 30, 23, '2017-05-10', NULL),
(48, 30, 24, '2017-05-10', NULL),
(49, 30, 25, '2017-05-10', NULL),
(50, 30, 26, '2017-05-10', NULL),
(51, 30, 27, '2017-05-10', NULL),
(52, 30, 28, '2017-05-10', NULL),
(53, 30, 29, '2017-05-10', NULL),
(54, 30, 30, '2017-05-10', NULL),
(55, 30, 31, '2017-05-10', NULL),
(56, 30, 32, '2017-05-10', NULL),
(57, 30, 33, '2017-05-10', NULL),
(58, 30, 34, '2017-05-10', NULL),
(59, 30, 35, '2017-05-10', NULL),
(60, 30, 36, '2017-05-10', NULL),
(61, 30, 37, '2017-05-10', NULL),
(62, 30, 38, '2017-05-10', NULL),
(63, 30, 39, '2017-05-10', NULL),
(64, 30, 40, '2017-05-10', NULL),
(65, 30, 41, '2017-05-10', NULL),
(66, 30, 42, '2017-05-10', NULL),
(67, 30, 43, '2017-05-10', NULL),
(68, 30, 44, '2017-05-10', NULL),
(69, 31, 45, '2017-05-10', NULL),
(70, 31, 46, '2017-05-10', NULL),
(71, 31, 47, '2017-05-10', NULL),
(72, 31, 48, '2017-05-10', NULL),
(73, 31, 49, '2017-05-10', NULL),
(74, 31, 50, '2017-05-10', NULL),
(75, 31, 51, '2017-05-10', NULL),
(76, 31, 52, '2017-05-10', NULL),
(77, 31, 53, '2017-05-10', NULL),
(78, 31, 54, '2017-05-10', NULL),
(79, 31, 55, '2017-05-10', NULL),
(80, 31, 56, '2017-05-10', NULL),
(81, 31, 57, '2017-05-10', NULL),
(82, 31, 58, '2017-05-10', NULL),
(83, 31, 59, '2017-05-10', NULL),
(84, 31, 60, '2017-05-10', NULL),
(85, 31, 61, '2017-05-10', NULL),
(86, 31, 62, '2017-05-10', NULL),
(87, 31, 63, '2017-05-10', NULL),
(88, 31, 64, '2017-05-10', NULL),
(89, 31, 65, '2017-05-10', NULL),
(90, 31, 66, '2017-05-10', NULL),
(91, 31, 67, '2017-05-10', NULL),
(92, 32, 91, '2017-05-10', NULL),
(93, 32, 92, '2017-05-10', NULL),
(94, 32, 93, '2017-05-10', NULL),
(95, 32, 94, '2017-05-10', NULL),
(96, 32, 95, '2017-05-10', NULL),
(97, 32, 96, '2017-05-10', NULL),
(98, 32, 97, '2017-05-10', NULL),
(99, 32, 98, '2017-05-10', NULL),
(100, 32, 99, '2017-05-10', NULL),
(101, 32, 100, '2017-05-10', NULL),
(102, 32, 101, '2017-05-10', NULL),
(103, 32, 102, '2017-05-10', NULL),
(104, 32, 103, '2017-05-10', NULL),
(105, 32, 104, '2017-05-10', NULL),
(106, 32, 105, '2017-05-10', NULL),
(107, 32, 106, '2017-05-10', NULL),
(108, 32, 107, '2017-05-10', NULL),
(109, 32, 108, '2017-05-10', NULL),
(110, 32, 109, '2017-05-10', NULL),
(111, 32, 110, '2017-05-10', NULL),
(112, 32, 111, '2017-05-10', NULL),
(113, 32, 112, '2017-05-10', NULL),
(114, 32, 113, '2017-05-10', NULL),
(115, 32, 114, '2017-05-10', NULL),
(116, 33, 68, '2017-05-10', NULL),
(117, 33, 69, '2017-05-10', NULL),
(118, 33, 70, '2017-05-10', NULL),
(119, 33, 71, '2017-05-10', NULL),
(120, 33, 72, '2017-05-10', NULL),
(121, 33, 73, '2017-05-10', NULL),
(122, 33, 74, '2017-05-10', NULL),
(123, 33, 75, '2017-05-10', NULL),
(124, 33, 76, '2017-05-10', NULL),
(125, 33, 77, '2017-05-10', NULL),
(126, 33, 78, '2017-05-10', NULL),
(127, 33, 79, '2017-05-10', NULL),
(128, 33, 80, '2017-05-10', NULL),
(129, 33, 81, '2017-05-10', NULL),
(130, 33, 82, '2017-05-10', NULL),
(131, 33, 83, '2017-05-10', NULL),
(132, 33, 84, '2017-05-10', NULL),
(133, 33, 85, '2017-05-10', NULL),
(134, 33, 86, '2017-05-10', NULL),
(135, 33, 87, '2017-05-10', NULL),
(136, 33, 88, '2017-05-10', NULL),
(137, 33, 89, '2017-05-10', NULL),
(138, 33, 90, '2017-05-10', NULL),
(139, 32, 143, '2017-05-10', NULL),
(140, 7, 142, '2017-05-10', NULL),
(141, 31, 141, '2017-05-10', NULL),
(142, 33, 140, '2017-05-10', NULL),
(143, 30, 139, '2017-05-10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FB_COUNTRY`
--
ALTER TABLE `FB_COUNTRY`
  ADD PRIMARY KEY (`COUNTRY_ID`),
  ADD UNIQUE KEY `COUNTRY_NAME` (`COUNTRY`);

--
-- Indexes for table `FB_LEAGUE`
--
ALTER TABLE `FB_LEAGUE`
  ADD PRIMARY KEY (`LEAGUE_ID`),
  ADD UNIQUE KEY `LEAGUE` (`LEAGUE`);

--
-- Indexes for table `FB_LEAGUE_TEAM`
--
ALTER TABLE `FB_LEAGUE_TEAM`
  ADD PRIMARY KEY (`LEAGUE_TEAM_ID`),
  ADD KEY `FB_LEAGUE_TEAM_LEAGUE_FK` (`LEAGUE_ID`),
  ADD KEY `FB_LEAGUE_TEAM_TEAM_FK` (`TEAM_ID`);

--
-- Indexes for table `FB_PERSONNEL`
--
ALTER TABLE `FB_PERSONNEL`
  ADD PRIMARY KEY (`PERSONNEL_ID`),
  ADD KEY `FB_PERSONNEL_COUNTRY_ID_FK` (`COUNTRY_ID`),
  ADD KEY `FB_PERSONNEL_ROLE_ID_FK` (`ROLE_ID`);

--
-- Indexes for table `FB_ROLE`
--
ALTER TABLE `FB_ROLE`
  ADD PRIMARY KEY (`ROLE_ID`),
  ADD UNIQUE KEY `ROLE` (`ROLE`);

--
-- Indexes for table `FB_TEAM`
--
ALTER TABLE `FB_TEAM`
  ADD PRIMARY KEY (`TEAM_ID`),
  ADD UNIQUE KEY `TEAM` (`TEAM`);

--
-- Indexes for table `FB_TEAM_PERSONNEL`
--
ALTER TABLE `FB_TEAM_PERSONNEL`
  ADD PRIMARY KEY (`TEAM_PERSONNEL_ID`),
  ADD KEY `FB_TEAM_PESONNEL_TEAM_ID_FK` (`TEAM_ID`),
  ADD KEY `FB_TEAM_PESONNEL_PERSONNEL_ID_FK` (`PERSONNEL_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `FB_LEAGUE_TEAM`
--
ALTER TABLE `FB_LEAGUE_TEAM`
  ADD CONSTRAINT `FB_LEAGUE_TEAM_LEAGUE_FK` FOREIGN KEY (`LEAGUE_ID`) REFERENCES `FB_LEAGUE` (`LEAGUE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FB_LEAGUE_TEAM_TEAM_FK` FOREIGN KEY (`TEAM_ID`) REFERENCES `FB_TEAM` (`TEAM_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `FB_PERSONNEL`
--
ALTER TABLE `FB_PERSONNEL`
  ADD CONSTRAINT `FB_PERSONNEL_COUNTRY_ID_FK` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `FB_COUNTRY` (`COUNTRY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FB_PERSONNEL_ROLE_ID_FK` FOREIGN KEY (`ROLE_ID`) REFERENCES `FB_ROLE` (`ROLE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `FB_TEAM_PERSONNEL`
--
ALTER TABLE `FB_TEAM_PERSONNEL`
  ADD CONSTRAINT `FB_TEAM_PESONNEL_PERSONNEL_ID_FK` FOREIGN KEY (`PERSONNEL_ID`) REFERENCES `FB_PERSONNEL` (`PERSONNEL_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FB_TEAM_PESONNEL_TEAM_ID_FK` FOREIGN KEY (`TEAM_ID`) REFERENCES `FB_TEAM` (`TEAM_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

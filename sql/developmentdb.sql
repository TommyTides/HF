-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: thefestival.mysql.database.azure.com
-- Generation Time: Apr 12, 2023 at 09:25 AM
-- Server version: 5.7.40-log
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `festival`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `biography` text,
  `member_description` text,
  `event_type` int(11) DEFAULT NULL,
  `music_sample_1` varchar(255) DEFAULT NULL,
  `music_sample_2` varchar(255) DEFAULT NULL,
  `music_sample_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `artist_name`, `first_name`, `last_name`, `biography`, `member_description`, `event_type`, `music_sample_1`, `music_sample_2`, `music_sample_3`) VALUES
(1, 'Gumbo Kings', NULL, NULL, 'Meet Gumbo Kings: a five-headed alligator crawlin’ straight out of the Dutch swamps. Ever since Gumbo Kings started out they’ve been touring relentlessly, from bars to the biggest festivals. Their first self-titled record Gumbo Kings was critically acclaimed in their homebase of the Netherlands, and led to a growing and loyal fanbase. In their sound you can hear their love for the likes of Nathaniel Rateliff & The Night Sweats and Lee Fields & The Expressions. \n\nOn top of that the boys come up with their very own modern take on Soul and Rhythm \'n Blues. They\'re not afraid to throw some 70s Soul-Funk, 80s drum computers, synth soundscapes and fuzzy guitar in the mix too. And then there\'s that Swamp-Rock sound from the Blues harmonica.', 'Steve Howard (Trumpet), <br>\r\nBobby Breaux (Drums), <br>\r\nBrian Piper (Piano), <br>\r\nMike Sizer (Clarinet), <br>\r\nCarl Hillman (Bass), <br>\r\nTony Baker (Trombone)', NULL, '514hjpdqFvFg2Eg5rJZbyW', '7t1nlRmH5G2xaCECVURkEQ', '34yzUoOhOllu2HgZzlmcb5'),
(2, 'Evolve', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Ntjam Rosie', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Wicked Jazz Sounds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Tom Thomsom Assemble', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Jonna Frazer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Fox & The Mayors', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Uncle Sue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Chris Allen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Myles Sanko', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Ruis Soundsystem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'The Family XL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Gare du Nord', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Rilan & The Bombadiers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Soul Six', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Han Bennink', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'The Nordanians', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Lilith Merlot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Martin Garrix', '', '', 'Martin Garrix, also known as Ytram and GRX, is a Dutch DJ and record producer, who was ranked number one on DJ Mag\'s Top 100 DJs list for three consecutive years- 2016, 2017, and 2018. He is best known for his singles \"Animals\", \"In the Name of Love\", and \"Scared to Be Lonely\".', '', 1, NULL, NULL, NULL),
(20, 'Tiesto', '', '', 'Taste man kitchen shefdw ad awd awdaÂ ', '', 1, NULL, NULL, NULL),
(22, 'Armin Van Buuren', '', NULL, 'Very Cool duderino', '', 1, NULL, NULL, NULL),
(23, 'Nicky Romero', '', '', 'Nicky Minaj HAncancancac', '', 1, NULL, NULL, NULL),
(24, 'Afrojack', '', '', 'Afroman 1234', '', 1, NULL, NULL, NULL),
(25, 'Hardwell', NULL, NULL, 'Robbert van de Corput , known professionally as Hardwell, is a Dutch DJ and music producer from Breda. He was voted the world\'s number one DJ by DJ Mag in 2013 and again in 2014. In 202. he was also ranked at number 43 in the top 100 DJs poll by DJ Mag.', NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artist_image`
--

CREATE TABLE `artist_image` (
  `artist_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist_image`
--

INSERT INTO `artist_image` (`artist_id`, `image_id`) VALUES
(19, 11),
(24, 12),
(19, 11),
(24, 12),
(22, 13),
(25, 16),
(20, 15),
(23, 14),
(1, 88),
(1, 89);

-- --------------------------------------------------------

--
-- Table structure for table `artist_page`
--

CREATE TABLE `artist_page` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `artist_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist_page`
--

INSERT INTO `artist_page` (`id`, `name`, `artist_description`) VALUES
(1, 'Martin Garrix', 'Martin Garrix, also known as Ytram and GRX, is a Dutch DJ and record producer, who was ranked number one on DJ Mag\'s Top 100 DJs list for three consecutive years- 2016, 2017, and 2018. He is best known for his singles \"Animals\", \"In the Name of Love\", and \"Scared to Be Lonely\".\n'),
(2, 'Hardwell', 'Robbert van de Corput , known professionally as Hardwell, is a Dutch DJ and music producer from Breda. He was voted the world\'s number one DJ by DJ Mag in 2013 and again in 2014. In 202. he was also ranked at number 43 in the top 100 DJs poll by DJ Mag.');

-- --------------------------------------------------------

--
-- Table structure for table `artist_slide`
--

CREATE TABLE `artist_slide` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `artist_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist_slide`
--

INSERT INTO `artist_slide` (`id`, `title`, `sub_title`, `content`, `artist_id`) VALUES
(1, 'The Breakthrough', '2013', 'Garrix gained fame through his solo release, \"Animals\", which was released on 16 June 2013. The single became a hit in several countries in Europe, and allowed Garrix to become the youngest person to reach number one on Beatport.', 19),
(2, ' A PHILANTROPIST', '2016', 'In November 2016, Garrix started his India tour with a special charity show in Mumbai with over 62,000 in attendance. With the proceeds from the show being donated to Magic Bus, the organization paid for the education of 10,000 children across the country.', 19),
(3, ' STMPD RECORDS', ' 2016', 'Garrix launched his own record label called Stmpd Rcrds in the first quarter of 2016. On 26 July of the very same year, it was announced that Garrix signed a worldwide contract with Sony Music International.', 19),
(4, 'THE BEGGINING', '2002', 'HARDWELL started BY producing remixes and uploadING them TO the Internet. At the age of 14 HARDWELL was offered a record deal with the Digidance record label. Three weeks later he made a first official release with the two-disc-record \"Bubbling Beats 1, WHICH HE FOLLOWED BY A NETHERLANDS TOUR.', 25),
(5, 'HARDWELL ON AIR', '2011', 'In March 2011, Hardwell launched his own podcast, Hardwell On Air, a one-hour selection of songs by various artists. The podcast is broadcast by a number of radio stations, including Slam! in the Netherlands as well as Sirius XM in the United States.', 25),
(6, 'PHILANTROPy', '2017', 'In 2017 HARDWELL PARTICIPATED IN A CHARITY CONCERT SUCCEEDING in drawing a capacity crowd of NEARLY 75,000 people. THROUGHOUT THE EVENT HARDWELL SECURED enough donations to SPONSOR THE education OF more than 100,000 young children.', 25);

-- --------------------------------------------------------

--
-- Table structure for table `dance_locations`
--

CREATE TABLE `dance_locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `wheelchair_access` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dance_locations`
--

INSERT INTO `dance_locations` (`id`, `name`, `address`, `wheelchair_access`, `image`, `opening_time`, `closing_time`) VALUES
(1, 'CLUB RUIS', 'Smedestraat 31', 1, 'thumbnail-ClubRuis.png', '18:00:00', '04:00:00'),
(2, 'CARPERA', 'Hoge Duin En Daalsweg 2', 1, 'thumbnail-CarperaOpenluchttheater.png', '10:00:00', '03:00:00'),
(3, 'JOPENKERK', 'Gedempte Voldersgracht 2', 0, 'thumbnail-Jopenkerk.png', '10:00:00', '23:30:00'),
(4, 'LICHT-FABRIEK', 'Minckelersweg 2', 1, 'thumbnail-LichtFabriek.png', '09:00:00', '00:00:00'),
(5, 'CLUB STALKER', 'Kromme Elleboogsteeg 20 ', 0, 'thumbnail-ClubStalker.png', '19:00:00', '04:00:00'),
(6, 'XO THE CLUB', 'Grote Markt 8', 0, 'thumbnail-XoTheClub.png', '09:30:00', '01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_type` int(4) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `sub_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_type`, `name`, `description`, `start_time`, `end_time`, `sub_description`) VALUES
(1, 2, 'A Stroll Through History', 'In this event, we take a tour around some of the most historical musems in Haarlem. Participants get to see and learn about the historical sites and how they come to be. \r\n\r\nThe tour starts at the Church of St. Bavo and ends at the Hof van Bakenes. There will be a break in between, at the Jopenkerk, where the tourists can enjoy some beer!', '2023-07-27 10:00:00', '2023-07-30 18:00:00', 'Visiting Haarlem\'s Hisotoric Locations\r\n'),
(2, 3, 'Gumbo Kings', 'Test', '2023-07-27 18:00:00', '2023-07-27 19:00:00', ''),
(3, 3, 'Evolve', 'Test', '2023-07-27 19:30:00', '2023-07-27 20:30:00', ''),
(4, 3, 'Ntjam Rosie', 'Test', '2023-07-27 21:00:00', '2023-07-27 22:00:00', ''),
(5, 3, 'Wicked Jazz Sounds', 'Test', '2023-07-27 18:00:00', '2023-07-27 19:00:00', ''),
(6, 3, 'Tom Thomsom Assemble', 'Test', '2023-07-27 19:30:00', '2023-07-27 20:30:00', ''),
(7, 3, 'Jonna Frazer', 'Test', '2023-07-27 21:00:00', '2023-07-27 22:00:00', ''),
(8, 3, 'Fox & The Mayors', 'Test', '2023-07-28 18:00:00', '2023-07-28 19:00:00', ''),
(9, 3, 'Uncle Sue', 'Test', '2023-07-28 19:30:00', '2023-07-28 20:30:00', ''),
(10, 3, 'Chris Allen', 'Test', '2023-07-28 21:00:00', '2023-07-28 22:00:00', ''),
(11, 3, 'Myles Sanko', 'Test', '2023-07-28 18:00:00', '2023-07-28 19:00:00', ''),
(12, 3, 'Ruis Soundsystem', 'Test', '2023-07-28 19:30:00', '2023-07-28 20:30:00', ''),
(13, 3, 'The Family XL', 'Test', '2023-07-28 21:00:00', '2023-07-28 22:00:00', ''),
(14, 3, 'Gare Du Nord', 'Test', '2023-07-29 18:00:00', '2023-07-29 19:00:00', ''),
(15, 3, 'Rilan & The Bombadiers', 'Test', '2023-07-29 19:30:00', '2023-07-29 20:30:00', ''),
(16, 3, 'Soul Six', 'Test', '2023-07-29 21:00:00', '2023-07-29 22:00:00', ''),
(17, 3, 'Han Bennink', 'Test', '2023-07-29 18:00:00', '2023-07-29 19:00:00', ''),
(18, 3, 'The Nordanians', 'Test', '2023-07-29 19:30:00', '2023-07-29 20:30:00', ''),
(19, 3, 'Lilith Merlot', 'Test', '2023-07-29 21:00:00', '2023-07-29 22:00:00', ''),
(20, 3, 'Ruis Soundsystem', 'Test', '2023-07-30 15:00:00', '2023-07-30 16:00:00', ''),
(21, 3, 'Wicked Jazz Sounds', 'Test', '2023-07-30 16:00:00', '2023-07-30 17:00:00', ''),
(22, 3, 'Evolve', 'Test', '2023-07-30 17:00:00', '2023-07-30 18:00:00', ''),
(23, 3, 'The Nordanians', 'Test', '2023-07-30 18:00:00', '2023-07-30 19:00:00', ''),
(24, 3, 'Gumbo Kings', 'Test', '2023-07-30 19:00:00', '2023-07-30 20:00:00', ''),
(25, 3, 'Gare du Nord', 'Test', '2023-07-30 20:00:00', '2023-07-30 21:00:00', ''),
(26, 4, 'Mr. & Mrs. Restaurant', 'Mr. & Mrs. offers an ambience where you feel comfortable. Mr. creates delicious taste explosions with honest products and Mrs. complements the dishes with the best suitable wines.\r\nEnjoy luxurious dishes and we would be happy to advise you on a matching glass of wine. No large portions with us, the dishes have the size of an appetizer. This way you can experience the different combinations and enjoy different flavors. You can choose from hot and cold dishes and you can finish with a sweet dessert or a cheese board.', '2023-07-01 18:00:00', '2023-07-03 19:00:00', 'DUTCH, FISH AND SEAFOOD, EUROPEAN'),
(27, 4, 'Ratatouille Restaurant', 'Chef Joshua Jaring \'s successful Michelin restaurant in Haarlem is  just like Ratatouille; a mix of French cuisine in today\'s reality with an excellent price-quality ratio in an accessible environment in Haarlem. We started our restaurant in Haarlem in 2013 in the Lange Veerstraat and after the move in 2015, we will continue at our unique monumental location on Het Spaarne with our restaurant in Haarlem .', '2023-05-05 18:44:30', '2023-06-16 18:44:30', 'FRENCH, FISH AND SEAFOOD, EUROPEAN'),
(28, 1, 'Martin Garrix', 'CLUB RUIS', '2023-07-27 22:00:00', '2023-07-27 23:30:00', 'GROTE MARKT 8'),
(29, 1, 'Martin Garrix', 'CARPERA OPENLUCHTTHEATER', '2023-07-28 14:00:00', '2023-07-28 23:00:00', 'HOGE DUIN EN DAALSSWEG 2'),
(30, 4, 'ML Restaurant', 'ML Restaurant offers an ambience where you feel comfortable. Mr. creates delicious taste explosions with honest products and Mrs. complements the dishes with the best suitable wines.\r\nEnjoy luxurious dishes and we would be happy to advise you on a matching glass of wine. No large portions with us, the dishes have the size of an appetizer. This way you can experience the different combinations and enjoy different flavors. You can choose from hot and cold dishes and you can finish with a sweet dessert or a cheese board.', '2023-03-07 13:51:55', '2023-03-07 14:59:55', 'FRENCH, FISH AND SEAFOOD, EUROPEAN'),
(31, 4, 'Fris Restaurant', 'Fris restaurant offers an ambience where you feel comfortable. \r\nThe chef creates delicious taste explosions with honest products and \r\nEnjoy luxurious dishes and we would be happy to advise you on a matching glass of wine. No large portions with us, the dishes have the size of an appetizer. This way you can experience the different combinations and enjoy different flavors. You can choose from hot and cold dishes and you can finish with a sweet dessert or a cheese board.', '2023-03-07 13:52:31', '2023-03-07 13:52:31', 'DUTCH, FRENCH, EUROPEAN'),
(32, 4, 'Specktakel Restaurant', 'test', '2023-03-07 13:52:31', '2023-03-07 13:52:31', 'test'),
(33, 4, 'Grand Cafe Brinkman', 'test', '2023-03-07 13:53:09', '2023-03-07 13:53:09', 'test'),
(34, 4, 'Urban Frency Bistro Toujours', 'test', '2023-03-07 13:53:09', '2023-03-07 13:53:09', 'test'),
(35, 1, 'Martin Garrix', 'CLUB STALKER', '2023-07-29 18:00:00', '2023-07-29 19:30:00', 'KROMME \nELLEBOOGSTEEG 14'),
(37, 1, 'Hardwell', 'JOPENKERK', '2023-07-27 23:00:00', '2023-07-28 00:30:00', 'GEDEMPTE VOLDERSGRACHT 2'),
(38, 1, 'Hardwell', 'CARPERA OPENLUCHTTHEATER', '2023-07-28 14:00:00', '2023-07-28 23:00:00', 'Hoge Duin en Daalseweg 2'),
(39, 1, 'Hardwell', 'XO THE CLUB', '2023-07-29 18:00:00', '2023-07-29 19:30:00', 'Grote Markt 8'),
(45, 1, 'teset3', 'test desc', '2023-04-01 14:15:00', '2023-04-08 14:16:00', 'asdgasd'),
(46, 3, 'Jazz', 'Start your summer with favourite bands and artists, who will be performing at the Haarlem festival from Thursday (July 27, 2023) through Sunday (July 30, 2023)! Featuring Gumbo Kings, Uncle Sue, Ntjam Rosie, Myles Sanko and plenty more. Get your tickets today!', '2023-07-27 11:35:14', '2023-07-30 11:35:14', ''),
(47, 1, 'Dance', 'Get ready to ignite the dance floor to the rhythm of electronic music. Our lineup features the world\'s most renowned DJs. So grab your friends or come solo and join us for an experience that you\'ll never forget!', '2023-07-27 11:38:01', '2023-07-30 11:38:01', ''),
(48, 4, 'Yummy', 'The Culinary section of the Haarlem presents a multitude of restaurants located all over in this beautiful city in the Netherlands. Haarlem is only 20 minutes away from Amsterdam. Haarlem offers both local and international delicacies. If you are in a hurry, or want to enjoy a nice meal, Haarlem restaurants have you covered. More information about the restaurants and their menus can be found on this page.  ', '2023-08-27 11:42:15', '2023-07-30 11:42:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_artist`
--

CREATE TABLE `event_artist` (
  `event_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_artist`
--

INSERT INTO `event_artist` (`event_id`, `artist_id`) VALUES
(2, 1),
(3, 2),
(4, 3),
(5, 4),
(6, 5),
(7, 6),
(8, 7),
(9, 8),
(10, 9),
(11, 10),
(12, 11),
(13, 12),
(14, 13),
(15, 14),
(16, 15),
(17, 16),
(18, 17),
(19, 18),
(20, 11),
(21, 4),
(22, 2),
(23, 17),
(24, 1),
(25, 13);

-- --------------------------------------------------------

--
-- Table structure for table `event_image`
--

CREATE TABLE `event_image` (
  `event_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_image`
--

INSERT INTO `event_image` (`event_id`, `image_id`) VALUES
(1, 1),
(28, 11),
(28, 11),
(29, 11),
(35, 11),
(2, 88),
(24, 88),
(45, 102),
(46, 103),
(48, 104),
(47, 105),
(47, 105);

-- --------------------------------------------------------

--
-- Table structure for table `event_information`
--

CREATE TABLE `event_information` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_information`
--

INSERT INTO `event_information` (`id`, `event_id`, `information`) VALUES
(1, 1, 'The tour is given in 3 languages: English, Dutch and German.'),
(2, 1, 'Groups will consist of 12 Participants.'),
(3, 1, 'A giant flag will mark the starting location.'),
(5, 1, 'Due to the nature of the walk, participants must be a minimum of 12 years old and no strollers are allowed.'),
(6, 1, 'Every participant can enjoy one drink with the ticket.');

-- --------------------------------------------------------

--
-- Table structure for table `event_location`
--

CREATE TABLE `event_location` (
  `event_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_location`
--

INSERT INTO `event_location` (`event_id`, `location_id`) VALUES
(1, 2),
(1, 4),
(1, 3),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 10),
(3, 10),
(4, 10),
(5, 11),
(6, 11),
(7, 11),
(8, 10),
(9, 10),
(10, 10),
(11, 11),
(12, 11),
(13, 11),
(14, 10),
(15, 10),
(16, 10),
(17, 12),
(18, 12),
(19, 12),
(1, 2),
(1, 2),
(1, 2),
(1, 2),
(1, 2),
(1, 2),
(1, 1),
(28, 13),
(26, 14),
(27, 15),
(30, 16),
(31, 17),
(32, 18),
(33, 19),
(34, 20),
(1, 1),
(1, 9),
(28, 13),
(29, 21),
(35, 22),
(1, 30),
(1, 39),
(1, 59),
(1, 60),
(1, 61),
(1, 64),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(1, 66),
(45, 22);

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `event_type_id` int(11) NOT NULL,
  `event_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`event_type_id`, `event_type`) VALUES
(1, 'Dance'),
(2, 'Historic'),
(3, 'Jazz'),
(4, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `history_event_language`
--

CREATE TABLE `history_event_language` (
  `id` int(11) NOT NULL,
  `language` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_event_language`
--

INSERT INTO `history_event_language` (`id`, `language`) VALUES
(1, 'English\r\n'),
(2, 'Chinese'),
(3, 'Nederlands');

-- --------------------------------------------------------

--
-- Table structure for table `history_event_schedule`
--

CREATE TABLE `history_event_schedule` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_event_schedule`
--

INSERT INTO `history_event_schedule` (`id`, `date`, `time`, `language_id`) VALUES
(1, '2023-07-27', '10:00:00', 1),
(2, '2023-07-27', '13:00:00', 1),
(3, '2023-07-27', '16:00:00', 1),
(4, '2023-07-27', '10:00:00', 3),
(5, '2023-07-27', '13:00:00', 3),
(6, '2023-07-27', '16:00:00', 3),
(7, '2023-07-28', '10:00:00', 1),
(8, '2023-07-28', '13:00:00', 1),
(9, '2023-07-28', '16:00:00', 1),
(10, '2023-07-28', '10:00:00', 3),
(11, '2023-07-28', '13:00:00', 3),
(12, '2023-07-28', '16:00:00', 3),
(13, '2023-07-29', '10:00:00', 1),
(14, '2023-07-29', '13:00:00', 1),
(15, '2023-07-29', '16:00:00', 1),
(16, '2023-07-29', '10:00:00', 3),
(17, '2023-07-29', '13:00:00', 3),
(18, '2023-07-29', '16:00:00', 3),
(19, '2023-07-30', '10:00:00', 3),
(20, '2023-07-30', '13:00:00', 3),
(21, '2023-07-30', '16:00:00', 3),
(22, '2023-07-30', '10:00:00', 1),
(23, '2023-07-30', '13:00:00', 1),
(24, '2023-07-30', '16:00:00', 1),
(25, '2023-07-29', '13:00:00', 2),
(26, '2023-07-29', '16:00:00', 2),
(27, '2023-07-30', '10:00:00', 2),
(28, '2023-07-30', '13:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image`) VALUES
(1, 'strollthoughhistorybanner.png'),
(2, '/historyimages/grote-markt-primary.png'),
(3, '/historyimages/de-hallen-primary.jpg'),
(4, '/historyimages/proveniershof-primary.jpg'),
(5, '/historyimages/jopenkerk-primary.jpg'),
(6, '/historyimages/waalse-kerk-primary.jpg'),
(7, '/historyimages/molen-de-adriaan-primary.jpg'),
(8, '/historyimages/amsterdamse-poort-primary.jpg'),
(9, '/historyimages/hof-van-bakenes-primary.jpg\n'),
(10, 'waalse-kerk-interior-1.jpg'),
(11, 'thumbnail-MartinGarrix.PNG'),
(12, 'thumbnail-Afrojack.PNG'),
(13, 'thumbnail-ArminVanBuuren.PNG'),
(14, 'thumbnail-NickyRomero.PNG'),
(15, 'thumbnail-Tiesto.PNG'),
(16, 'thumbnail-Hardwell.PNG'),
(17, 'Ratatouille_Restaurant.png'),
(18, '/historyimages/st-bavo-primary.jpg'),
(19, '/historyimages/st bavo detail 1.jpg\n'),
(20, '/historyimages/st bavo detail 2.jpg'),
(21, '/historyimages/st bavo detail 3.jpg'),
(22, '/historyimages/st bavo detail 4.jpg'),
(23, '/historyimages/st bavo detail 5.jpg'),
(25, 'thumbnail-CapreraOpenluchttheater.png'),
(26, '/no-image-primary.png'),
(27, '64197cc065f84-primary.png'),
(28, '641980b3bc942-primary.'),
(29, '641987b182914-primary.'),
(30, '64198840b8be2-primary.'),
(31, '64198caf53eee-primary.png'),
(32, '64198d10ca906-primary.png'),
(33, '6419995b1ba25-primary.png'),
(34, '6428753fd366f-primary.png'),
(35, '6428753fd366f-primary.png'),
(36, '6428753fd366f-primary.png'),
(37, '6428753fd366f-primary.png'),
(38, '6428753fd366f-primary.png'),
(39, '6428753fd366f-primary.png'),
(40, ''),
(41, ''),
(42, '6428753fd366f-primary.png'),
(43, '6428753fd366f-primary.png'),
(44, '6428753fd366f-primary.png'),
(45, '6428753fd366f-primary.png'),
(46, '6428753fd366f-primary.png'),
(47, '642098282c25f-detail.png'),
(48, '642098282e70d-detail.png'),
(49, '6420986f04771-detail.png'),
(50, '642098ef0ce82-detail.png'),
(51, '6420992b9e77d-detail.png'),
(52, '64209a6c1749e-detail.png'),
(53, '64209a8b15961-detail.png'),
(54, '64209d9bbb491-detail.png'),
(55, '64209db16dc31-detail.png'),
(56, '64209e230e4fc-detail.png'),
(57, '64209e4d03831-primary.png'),
(58, '6420a21bce66d-primary.png'),
(59, '6420a2557f70a-primary.png'),
(60, '6420a424b26a3-primary.png'),
(61, '6420a424b4395-detail.png'),
(62, '6420a424b638e-detail.png'),
(63, '6420a424b7804-detail.png'),
(64, '6420a424b8635-detail.png'),
(65, '6420aad77623d-primary.png'),
(66, '6420aad7794b7-detail.png'),
(67, '6420aad77a7ae-detail.png'),
(68, '6420ac85c9ebf-primary.png'),
(69, '6420ac85ccecd-detail.png'),
(70, '6420ac85cdf05-detail.png'),
(71, '6420ae7cdb6e2-primary.png'),
(72, '6420ae7cdede2-detail.png'),
(73, '6420ae7ce0299-detail.png'),
(74, '6420c17d5afb6-primary.png'),
(75, '6420c17d5d2af-detail.png'),
(76, '6420c24093c5a-primary.png'),
(77, '6420c2409520a-detail.png'),
(78, '6420c2b35f544-primary.png'),
(79, '6420c2b3624b7-detail.png'),
(80, '6420c2b3639cc-detail.png'),
(81, '6420c2b3657e5-detail.png'),
(82, '6420c2b369874-detail.png'),
(83, '6420c2d7671e7-primary.png'),
(84, '6420c2d76aa57-detail.png'),
(85, '6420c2d76b7fa-detail.png'),
(86, '6420c2d76d73d-detail.png'),
(87, '6420c2d76f73c-detail.png'),
(88, 'jazz/gumbo-kings-banner.png'),
(89, 'jazz/gumbo-kings-primary.png'),
(90, 'locations/patronaat-primary.png'),
(91, '6423684085155-primary.png'),
(92, '6423684086bd4-detail.png'),
(93, '6423ecbe1fc9f-primary.png'),
(94, '6423ecbe24a28-detail.png'),
(95, '6423ecbe29c41-detail.png'),
(96, '6423ecbe2e7f0-detail.png'),
(97, '6423ecbe338b8-detail.png'),
(98, '64281b348900f-primary.png'),
(99, '64281b3bb0bb9-primary.png'),
(100, '6428209977f5c-primary.png'),
(101, '6428209a135aa-primary.png'),
(102, '6429c98346a99-primary.png'),
(103, 'jazz_index_header.png'),
(104, 'yummy_index_main.jpg'),
(105, 'Dance-Home-Image.png'),
(106, '64356105a9e1c-primary.png'),
(107, '64356105ace4d-detail.png');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sublocation` varchar(255) DEFAULT NULL,
  `description` text,
  `motto` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `phone_number_2` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) NOT NULL,
  `postal_code` varchar(32) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `schedule` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `name`, `sublocation`, `description`, `motto`, `email`, `phone_number`, `phone_number_2`, `website`, `address_1`, `postal_code`, `city`, `schedule`) VALUES
(1, 'Church of St. Bavo 222', '', '                                                                                The St Bavo church was built in 1895ï¿½1930 and dedicated in 1948, named for the city&#039;s patron saint.                                                                ', 'Motto!!!', 'info@bavo.nl', '023-5532040', '', 'https://www.bavo.nl/', 'Grote Markt 22', '2011 RD Haarlem', 'Haarlem', '                                                                                Mon - Sat: 10:00-17:00 &lt;br&gt;\r\nSun : 13:00-17:00\r\n\r\n                                                                '),
(2, 'Grote Markt', '', '                    This is the city centre of Haarlem. Located in this centre, are some of the most historical buildings of Haarlem, the most obvious St Bavo church.                ', '', 'info@grotemarkt.nl', '02330303', '', 'https://grotemarkt.nl', 'Grote Markt 1', '2011 RD Haarlem', 'Haarlem', '                                    '),
(3, 'De Hallen', NULL, 'The Frans Hals Museum in Haarlem, Netherlands features the works of Dutch Golden Age painter Frans Hals, along with other Old Dutch Masters from the 16th and 17th centuries, and contemporary art exhibitions. The museum is located in two buildings, and is a must-visit destination for art lovers interested in Dutch painting history.', NULL, 'info@franshalsmuseum.nl', '+31(0)235115775', NULL, 'https://www.franshalsmuseum.nl/en/', 'Groot Heiligland 62', '2011 ES Haarlem', NULL, 'Tuesday - Saturday: 11:00 - 17:00<br> Sunday: 12:00 - 17:00Tuesday - Saturday: 11:00 - 17:00<br> Sunday and public holidays: 12:00 - 17:00'),
(4, 'Proveniershof', NULL, 'Proveniershof is a historic museum in Haarlem, Netherlands that was originally a home for elderly men in the 17th century. The museum displays exhibits about the history of the community and its residents, and features antique furniture and artwork from the 18th-century Dutch Golden Age. The building\'s courtyards and gardens are also worth exploring.', NULL, 'info@proveniershof.nl', '+31 (0)23 534 0584', NULL, 'https://www.proveniershof.nl/en/home-en/', 'Proveniersplein 28', '2011 RK Haarlem3', NULL, 'Mon - Sun: 24 Hours Open'),
(5, 'Jopenkerk', NULL, 'Jopenkerk in Haarlem, Netherlands is a unique brewery and restaurant housed in a historic church. Enjoy locally crafted beer and delicious food made with fresh ingredients in a warm and welcoming atmosphere. The brewery also offers tours and tastings. A must-visit destination for an unforgettable dining experience.', NULL, 'info@jopenkerk.nl', '+31 (0)23 533 4114', NULL, '\r\nhttps://www.jopenkerk.nl', 'Gedempte Voldersgracht 2', '2011 WD Haarlem', NULL, 'Sunday - Thursday: 11:00 - 23:00 <br> Friday, Saturday: 11:00 - 12:00 '),
(6, 'Waalse Kerk', NULL, 'Waalse Kerk is a beautiful, historic church in the heart of Haarlem, Netherlands. Originally built in the 17th century, the church is known for its stunning architecture and beautiful stained glass windows. Today, the church is used for a variety of events, including concerts, exhibitions, and religious services.', NULL, 'kerkrentmeester@waalsekerkhaarlem.nl', '+31 (0)23 531 5924\r\n', NULL, 'https://www.waalsekerkhaarlem.nl/', 'Begijnhof 30', '2011 HE Haarlem', NULL, 'Wednesday: 11:00 - 15:00 <br> Saturday: 11:00 - 15:00'),
(7, 'Molen Adriaan', '', '                                        The Adriaan windmill is one of Haarlemï¿½s iconic structures. As you make your way into the city, this attraction greets you near the train station, making it one of the first things you&#039;ll notice.  It was built in the year 1779 and has since been a recognizable part of Haarlemï¿½s skyline.\r\nYou can visit it for a  tour around the place and experience how life used to be in the 18th century.                                ', '', 'info@molenadriaan.nl', '+31 (0)23 535 7890', '', 'https://www.molenadriaan.nl/', 'Papentorenvest 1A', '2011 AV Haarlem', 'Haarlem', '                                        Monday - Saturday: 10:00  - 17:00 &lt;br&gt; Sunday: 12:00  - 17:00                                '),
(8, 'Amsterdamse Poort', NULL, 'Amsterdamse Poort is a stunning medieval gatehouse that dates back to the 14th century. Located in the heart of Haarlem, Netherlands, the gatehouse is an important historical landmark and one of the most recognizable symbols of the city. Today, Amsterdamse Poort is used for a variety of events and exhibitions, including art shows, cultural events, and historical exhibitions.', NULL, 'info@amsterdamsepoort.nl', '+31 (0)23 542 3723', NULL, 'https://www.amsterdamsepoort.nl/', 'Zijlvest 39', '2011 VB Haarlem', NULL, 'Tuesday - Sunday : 13:00 - 17:00'),
(9, 'Hof van Bakenes', NULL, 'Hof van Bakenes is a charming courtyard located in the heart of Haarlem\'s historic Bakenes neighborhood. The courtyard dates back to the 14th century and features a number of beautifully restored historic buildings, including a former almshouse and a brewery. Today, Hof van Bakenes is a popular spot for visitors to explore the city\'s rich history and architecture.', NULL, 'info@hofvanbakenes.nl', '+31 (0)23 532 2120', NULL, 'https://www.hofvanbakenes.nl/', 'Bakenessergracht 67', '2011 JS Haarlem', NULL, 'Mon - Sun: 24 Hours Open'),
(10, 'Patronaat', 'Main Hall', 'What started as a Catholic boys\' school has grown since 1984 into a Dutch core stage with hundreds of activities and 130,000 visitors per year, more than 300 club members and dozens of partners in the city. \r\n\r\nWith four halls, rehearsal rooms, festivals and productions at nine external locations, Patronaat is much more than just a stage: it fulfills multiple roles in the chain of talent development and pop culture.', 'The pop stage of Haarlem', 'info@patronaat.nl', '+31 (0)23-5175850', '+31 (0)23-5175858', 'https://www.patronaat.nl', 'Zijlsingel 2', '2013 DN', 'Haarlem', ''),
(11, 'Patronaat', 'Second Hall', 'What started as a Catholic boys\' school has grown since 1984 into a Dutch core stage with hundreds of activities and 130,000 visitors per year, more than 300 club members and dozens of partners in the city. \r\n\r\nWith four halls, rehearsal rooms, festivals and productions at nine external locations, Patronaat is much more than just a stage: it fulfills multiple roles in the chain of talent development and pop culture.', 'The pop stage of Haarlem', 'info@patronaat.nl', '+31 (0)23-5175850', '+31 (0)23-5175858', 'https://www.patronaat.nl', 'Zijlsingel 2', '2013 DN', 'Haarlem', ''),
(12, 'Patronaat', 'Third Hall', 'What started as a Catholic boys\' school has grown since 1984 into a Dutch core stage with hundreds of activities and 130,000 visitors per year, more than 300 club members and dozens of partners in the city. \r\n\r\nWith four halls, rehearsal rooms, festivals and productions at nine external locations, Patronaat is much more than just a stage: it fulfills multiple roles in the chain of talent development and pop culture.', 'The pop stage of Haarlem', 'info@patronaat.nl', '+31 (0)23-5175850', '+31 (0)23-5175858', 'https://www.patronaat.nl', 'Zijlsingel 2', '2013 DN', 'Haarlem', ''),
(13, 'Club Ruis', NULL, 'Welcome to Club Ruis. Club Ruis has been one of the coolest clubs in Haarlem for years! At Club Ruis we strive to go the extra mile with every night to guarantee the best night of your life. We offer the best music, the most relaxed atmosphere, cool events and of course, not unimportantly, the highest quality drinks!', 'Club Ruis is a temporary disturbance of the ideal, it is unstructured and irrelevant. It is a temporary phase, betwixt and between, neither one nor the other.', 'club.ruis@gmail.com', '+31 (0)23 524 6718\r\n', NULL, 'clubruis.com', 'Smedestraat 31', '2011 RE', 'Haarlem', ''),
(14, 'Mr.&Mrs. Restaurant', NULL, '5 starts', NULL, 'mrmrs@restaurant.com', '+31(0)23 531 5935', NULL, 'https://www.restaurantmrandmrs.nl/', ' Lange Veerstraat 4', '2011 DB', 'Haarlem', ''),
(15, 'Ratatouille Restaurant', NULL, '5 stars', NULL, 'info@ratatouillefoodandwine.nl', '+31(0)23 542 7270', NULL, 'https://ratatouillefoodandwine.nl/', 'Spaarne 96', '2011 CL', 'Haarlem', ''),
(16, 'ML Restaurant', NULL, '5 stars', NULL, 'welkom@mlinhaarlem.nl', '+31 (0)23 512 3910', NULL, 'https://www.mlinhaarlem.nl/en/', 'Klokhuisplein 5', '2011 HK', 'Haarlem', ''),
(17, 'Fris Restaurant', NULL, '4 stars', NULL, 'info@restaurantfris.nl', '+31(0)23 53 10 717', NULL, 'https://www.restaurantfris.nl/', 'Twijnderslaan 7', '2012 BG', 'Haarlem', ''),
(18, 'Spectakel Restaurant', NULL, '4 stars', NULL, 'info@specktakel.nl', '+31(0)23 - 532 38 41', NULL, 'https://specktakel.nl/', 'Spekstraat 4', '2011 HM', 'Haarlem', ''),
(19, 'Grand Cafe Brinkman', NULL, 'Dutch, European, Modern', NULL, 'cafebrinkman@restaurant.nl', '+31(0)23 532 3111', NULL, 'https://www.grandcafebrinkmann.nl/', 'Grote Markt 13', ' 2011 RC', 'Haarlem', ''),
(20, 'Urban Frency Bistro Toujours', NULL, 'Dutch, Fish and Seafood, European', NULL, 'info@restauranttoujours.nl', '+31(0)23 532 1699', NULL, 'https://restauranttoujours.nl/', 'Oude Groenmarkt 10', '2011 HL', 'Haarlem', ''),
(21, 'Caprera Openluchttheater', NULL, 'Between the dunes and the forest of Bloemendaal lies the attractive open-air theater Caprera. Here you can enjoy cabaret, pop music, classical, opera, film, and (youth) theater every summer.', 'Celebrate summer in Caprera', 'info@caprera.nu', '023 525 0050', NULL, 'https://caprera.nu/', 'Hoge Duin and Daalseweg 2', '2061 AG', 'Bloemendaal', NULL),
(22, 'Club Stalker', NULL, 'Club Stalker was a nightclub at Kromme Elleboogsteeg 20 in the old center of Haarlem . The business opened in 1983. Almost all types of electronic music are played in the club: it starting with New Wave and Postpunk , then House , Hip hop , UK Garage and Drum and bass and later mainly Minimal and Techno.', NULL, 'clubStalker@gmail.com', '023 531 4652', NULL, NULL, 'Kromme Elleboogsteeg 20', '2011 TS', 'Haarlem', NULL),
(30, 'Wolfhound', 'The best place', '                                        Place to drink drinks and eat food                                ', 'eat and drink ', 'wolfhound@email.com', '012323462334', '', 'https://wolfhound.com', 'Inholland 1', '1076 DE', 'Amsterdam', '                                        Mon - Fri :10-6                                '),
(39, 'Wolfhound', 'The best place', 'For food and drinks ', '', 'wolfhound@email.com', '2938483943', '', 'https://wolfhound.com', 'Wolfhound 1', '1234SX', 'Haarlem', ''),
(59, 'New location2', '', 'Description', '', 'wolfhound@email.com', '2938483943', '', 'https://wolfhound.com', 'Wolfhound 1', '1104TX', 'Amsterdam', 'a'),
(60, 'New location3', '', 'Description', '', 'wolfhound@email.com', '2938483943', '', 'https://wolfhound.com', 'Wolfhound 1', '1104TX', 'Amsterdam', 'a'),
(61, 'New location with all pics', '', '                                                                                                                                                                Description                                                                                                                                ', '', 'wolfhound@email.com', '2938483943', '', 'https://wolfhound.com', 'Wolfhound 1', '1104TX', 'Amsterdam', '                                                                                                                                                                a                                                                                                                                '),
(62, 'new location 3', '', 'descriptiion1', 'motto', 'email@email.com', '023235253', '', 'https://wolfhound.com', 'Inholland 1', '1104TX', 'Amsterdam', ''),
(63, 'new location 5', '', 'descriptiion1', 'motto', 'email@email.com', '023235253', '', 'https://wolfhound.com', 'Inholland 1', '1104TX', 'Amsterdam', ''),
(64, 'new location 5', '', '                    descriptiion1                ', 'motto', 'email@email.com', '023235253', '', 'https://wolfhound.com', 'Inholland 1', '1104TX', 'Amsterdam', '                                    '),
(66, 'new location 4', '', '                    asdfasd                ', 'asdfasd', 'location@email.com', '28352938752893', '', 'https://location.com', 'Inholland 2', '1076 DE', 'Amsterdam', '                    asdfa                ');

-- --------------------------------------------------------

--
-- Table structure for table `location_image`
--

CREATE TABLE `location_image` (
  `location_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_image`
--

INSERT INTO `location_image` (`location_id`, `image_id`) VALUES
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(6, 10),
(1, 18),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 19),
(30, 26),
(39, 34),
(59, 58),
(60, 59),
(61, 60),
(61, 61),
(61, 62),
(61, 63),
(61, 64),
(63, 68),
(63, 69),
(63, 70),
(64, 71),
(64, 72),
(64, 73),
(10, 90),
(11, 90),
(12, 90),
(66, 93),
(66, 94),
(66, 95),
(66, 96),
(66, 97);

-- --------------------------------------------------------

--
-- Table structure for table `main_events`
--

CREATE TABLE `main_events` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `description_heading` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_events`
--

INSERT INTO `main_events` (`id`, `event_id`, `description_heading`) VALUES
(1, 1, 'Visiting Haarlem\'s Historic Landmarks!'),
(2, 46, 'Swing into the rhythm of Jazz!'),
(3, 47, 'Lose yourself in DANCE!'),
(4, 48, 'Satisfy your appetite!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `date` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`id`, `email`, `token`, `expiration`) VALUES
(16, 'tommy@email.com', '228990c1df33df8c82186b17188179006dd500e0', '2023-03-15 11:59:24'),
(17, 'escumicrazvan@yahoo.com', '2484f5221f9bc03533aa9d8675fc669506dafc8d', '2023-03-28 16:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `mollie_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `billing_first_name` varchar(255) NOT NULL,
  `billing_last_name` varchar(255) NOT NULL,
  `billing_street` varchar(255) NOT NULL,
  `billing_house_number` int(16) NOT NULL,
  `billing_postal_code` varchar(32) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_state` varchar(255) NOT NULL,
  `billing_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `mollie_id`, `email`, `billing_first_name`, `billing_last_name`, `billing_street`, `billing_house_number`, `billing_postal_code`, `billing_city`, `billing_state`, `billing_country`) VALUES
(1, 'tr_WSnj7viDpZ', 'rodrigo@gmail.com', 'Rodrigo', 'Bange', 'My street 123', 123, '1234ABC', 'Velserbroek', 'Noord-Holland', 'Netherlands'),
(2, 'tr_bMSJnsCAfH', 'rodrigo@gmail.com', 'Rodrigo', 'Bange', 'My street 123', 123, '1234ABC', 'Velserbroek', 'Noord-Holland', 'Netherlands'),
(3, 'tr_YNSt3XNdUc', 'rodrigo@gmail.com', 'Rodrigo', 'Bange', 'My street 123', 123, '1234ABC', 'Velserbroek', 'Noord-Holland', 'Netherlands'),
(4, 'tr_2nArdVtnKx', 'philiptsaglo@gmail.com', 'Philip', 'Tsagli', 'Olympisch Stadion 2', 2, '1104TX', 'Amsterdam', 'Amsterdam', 'Netherlands');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_type` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `price_exc_vat` double(10,2) NOT NULL,
  `vat` int(2) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_type`, `event_id`, `name`, `description`, `price_exc_vat`, `vat`, `date`, `time`, `language`) VALUES
(1, 2, 2, 'Gumbo Kings', 'Description here', 15.00, 9, NULL, NULL, NULL),
(2, 2, 3, 'Evolve', 'Description here', 15.00, 9, NULL, NULL, NULL),
(3, 2, 4, 'Ntjam Rosie', 'Description here', 15.00, 9, NULL, NULL, NULL),
(4, 2, 5, 'Wicked Jazz Sounds', 'Description here', 10.00, 9, NULL, NULL, NULL),
(5, 2, 6, 'Tom Thomsom Assemble', 'Description here', 10.00, 9, NULL, NULL, NULL),
(6, 2, 7, 'Jonna Frazer', 'Description here', 10.00, 9, NULL, NULL, NULL),
(7, 2, 8, 'Fox & The Mayors', 'Description here', 15.00, 9, NULL, NULL, NULL),
(8, 2, 9, 'Uncle Sue', 'Description here', 15.00, 9, NULL, NULL, NULL),
(9, 2, 10, 'Chris Allen', 'Description here', 15.00, 9, NULL, NULL, NULL),
(10, 2, 11, 'Myles Sanko', 'Description here', 10.00, 9, NULL, NULL, NULL),
(11, 2, 12, 'Ruis Soundsystem', 'Description here', 10.00, 9, NULL, NULL, NULL),
(12, 2, 13, 'The Family XL', 'Description here', 10.00, 9, NULL, NULL, NULL),
(13, 2, 14, 'Gare du Nord', 'Description here', 15.00, 9, NULL, NULL, NULL),
(14, 2, 15, 'Rilan & The Bombadiers', 'Description here', 15.00, 9, NULL, NULL, NULL),
(15, 2, 16, 'Soul Six', 'Description here', 15.00, 9, NULL, NULL, NULL),
(16, 2, 17, 'Han Bennink', 'Description here', 10.00, 9, NULL, NULL, NULL),
(17, 2, 18, 'The Nordanians', 'Description here', 10.00, 9, NULL, NULL, NULL),
(18, 2, 19, 'Lilith Merlot ', 'Description here', 10.00, 9, NULL, NULL, NULL),
(19, 3, 46, 'Jazz All-Day Ticket', 'Valid for 27/07/2023', 35.00, 9, NULL, NULL, NULL),
(20, 3, 46, 'Jazz All-Day Ticket', 'Valid for 28/07/2023', 35.00, 9, NULL, NULL, NULL),
(21, 3, 46, 'Jazz All-Day Ticket', 'Valid for 29/07/2023', 35.00, 9, NULL, NULL, NULL),
(22, 4, 46, 'Jazz All-Access Ticket', 'Valid from 27/07/2023 to 29/07/2023', 80.00, 9, NULL, NULL, NULL),
(23, 1, 26, 'Mr. & Mrs. Restaurant', 'test', 10.00, 21, NULL, NULL, NULL),
(24, 1, 27, 'Ratatouille Restaurant', 'test', 10.00, 21, NULL, NULL, NULL),
(25, 1, 30, 'ML Restaurant', 'test', 10.00, 21, NULL, NULL, NULL),
(26, 1, 31, 'Fris Restaurant', 'test', 10.00, 21, NULL, NULL, NULL),
(27, 1, 32, 'Specktakel Restaurant', 'test', 10.00, 21, NULL, NULL, NULL),
(28, 1, 34, 'Urban Frency Bistro Toujours', 'test', 10.00, 21, NULL, NULL, NULL),
(29, 1, 33, 'Grand Cafe Brinkman', 'test', 10.00, 21, NULL, NULL, NULL),
(30, 5, 20, 'Ruis Soundsystem', 'Free Event', 0.00, 9, NULL, NULL, NULL),
(31, 5, 21, 'Wicked Jazz Sounds', 'Free Event', 0.00, 9, NULL, NULL, NULL),
(32, 5, 22, 'Evolve', 'Free Event', 0.00, 9, NULL, NULL, NULL),
(33, 5, 23, 'The Nordanians', 'Free Event', 0.00, 9, NULL, NULL, NULL),
(34, 5, 24, 'Gumbo Kings', 'Free Event', 0.00, 9, NULL, NULL, NULL),
(35, 5, 25, 'Gare du Nord', 'Free Event', 0.00, 9, NULL, NULL, NULL),
(36, 2, 28, 'Martin Garrix', 'Club Ruis', 60.00, 9, NULL, NULL, NULL),
(37, 2, 29, 'Martin Garrix / Van Buuren / Hardwell', 'Carpera Openluchttheater', 110.00, 9, NULL, NULL, NULL),
(38, 2, 35, 'Martin Garrix', 'CLUB STALKER', 60.00, 9, NULL, NULL, NULL),
(40, 2, 1, 'A Stroll through History', 'Date: 27 July 2023\nTime: 10:00\nLanguage: English\n', 17.50, 21, '2023-07-27', '10:00:00', 'English'),
(41, 2, 1, 'A Stroll through History', 'Date: 27 July 2023\nTime: 13:00\nLanguage: English', 17.50, 21, '2023-07-27', '13:00:00', 'English'),
(42, 2, 1, 'A Stroll through History', 'Date: 27 July 2023\nTime: 16:00\nLanguage: English\n', 17.50, 21, '2023-07-27', '16:00:00', 'English'),
(43, 2, 1, 'A Stroll through History', 'Date: 28 July 2023\nTime: 13:00\nLanguage: English', 17.50, 21, '2023-07-28', '13:00:00', 'English'),
(44, 2, 1, 'A Stroll through History', 'Date: 28 July 2023\nTime: 16:00\nLanguage: English', 17.50, 21, '2023-07-28', '16:00:00', 'English'),
(45, 2, 1, 'A Stroll through History', 'Date: 28 July 2023\nTime: 10:00\nLanguage: English', 17.50, 21, '2023-07-28', '10:00:00', 'English'),
(46, 2, 1, 'A Stroll through History', 'Date: 29July 2023\nTime: 13:00\nLanguage: English', 17.50, 21, '2023-07-29', '13:00:00', 'English'),
(47, 2, 1, 'A Stroll through History', 'Date: 29 July 2023\nTime: 16:00\nLanguage: English', 17.50, 21, '2023-07-29', '16:00:00', 'English'),
(48, 2, 1, 'A Stroll through History', 'Date: 29 July 2023\nTime: 10:00\nLanguage: English', 17.50, 21, '2023-07-29', '10:00:00', 'English'),
(49, 2, 1, 'A Stroll through History', 'Date: 30 July 2023\nTime: 13:00\nLanguage: English', 17.50, 21, '2023-07-30', '13:00:00', 'English'),
(50, 2, 1, 'A Stroll through History', 'Date: 30 July 2023\nTime: 16:00\nLanguage: English', 17.50, 21, '2023-07-30', '16:00:00', 'English'),
(51, 2, 1, 'A Stroll through History', 'Date: 30 July 2023\nTime: 10:00\nLanguage: English', 17.50, 21, '2023-07-30', '10:00:00', 'English'),
(52, 2, 1, 'A Stroll through History', 'Date: 30 July 2023\nTime: 10:00\nLanguage: Nederlands', 17.50, 21, '2023-07-30', '10:00:00', 'Nederlands'),
(53, 2, 1, 'A Stroll through History', 'Date: 30 July 2023\nTime: 13:00\nLanguage: Nederlands', 17.50, 21, '2023-07-30', '13:00:00', 'Nederlands'),
(54, 2, 1, 'A Stroll through History', 'Date: 30 July 2023\r\nTime: 16:00\r\nLanguage: Nederlands', 17.50, 21, '2023-07-30', '16:00:00', 'Nederlands'),
(55, 2, 1, 'A Stroll through History', 'Date: 29 July 2023\nTime: 10:00\nLanguage: Nederlands', 17.50, 21, '2023-07-29', '10:00:00', 'Nederlands'),
(56, 2, 1, 'A Stroll through History', 'Date: 29 July 2023\nTime: 13:00\nLanguage: Nederlands', 17.50, 21, '2023-07-29', '13:00:00', 'Nederlands'),
(57, 2, 1, 'A Stroll through History', 'Date: 29 July 2023\r\nTime: 16:00\r\nLanguage: Nederlands', 17.50, 21, '2023-07-29', '16:00:00', 'Nederlands'),
(58, 2, 1, 'A Stroll through History', 'Date: 28 July 2023\nTime: 10:00\nLanguage: Nederlands', 17.50, 21, '2023-07-28', '10:00:00', 'Nederlands'),
(59, 2, 1, 'A Stroll through History', 'Date: 28 July 2023\nTime: 13:00\nLanguage: Nederlands', 17.50, 21, '2023-07-28', '13:00:00', 'Nederlands'),
(60, 2, 1, 'A Stroll through History', 'Date: 28 July 2023\r\nTime: 16:00\r\nLanguage: Nederlands', 17.50, 21, '2023-07-28', '16:00:00', 'Nederlands'),
(61, 2, 1, 'A Stroll through History', 'Date: 27 July 2023\nTime: 10:00\nLanguage: Nederlands', 17.50, 21, '2023-07-27', '10:00:00', 'Nederlands'),
(62, 2, 1, 'A Stroll through History', 'Date: 27 July 2023\nTime: 13:00\nLanguage: Nederlands', 17.50, 21, '2023-07-27', '13:00:00', 'Nederlands'),
(63, 2, 1, 'A Stroll through History', 'Date: 27 July 2023\r\nTime: 16:00\r\nLanguage: Nederlands', 17.50, 21, '2023-07-27', '16:00:00', 'Nederlands'),
(64, 2, 1, 'A Stroll through History', 'Date: 27 July 2023\r\nTime: 16:00\r\nLanguage: Chinese', 17.50, 21, '2023-07-27', '16:00:00', 'Chinese'),
(65, 2, 1, 'A Stroll through History', 'Date: 27 July 2023\nTime: 13:00\nLanguage: Chinese', 17.50, 21, '2023-07-27', '13:00:00', 'Chinese'),
(66, 2, 1, 'A Stroll through History', 'Date: 27 July 2023\nTime: 10:00\nLanguage: Chinese', 17.50, 21, '2023-07-27', '10:00:00', 'Chinese'),
(67, 2, 1, 'A Stroll through History', 'Date: 28 July 2023\nTime: 10:00\nLanguage: Chinese', 17.50, 21, '2023-07-28', '10:00:00', 'Chinese'),
(68, 2, 1, 'A Stroll through History', 'Date: 28 July 2023\nTime: 13:00\nLanguage: Chinese', 17.50, 21, '2023-07-28', '13:00:00', 'Chinese'),
(69, 2, 1, 'A Stroll through History', 'Date: 28 July 2023\r\nTime: 16:00\r\nLanguage: Chinese', 17.50, 21, '2023-07-28', '16:00:00', 'Chinese'),
(70, 2, 1, 'A Stroll through History', 'Date: 29 July 2023\nTime: 10:00\nLanguage: Chinese', 17.50, 21, '2023-07-29', '10:00:00', 'Chinese'),
(71, 2, 1, 'A Stroll through History', 'Date: 29 July 2023\nTime: 13:00\nLanguage: Chinese', 17.50, 21, '2023-07-29', '13:00:00', 'Chinese'),
(72, 2, 1, 'A Stroll through History', 'Date: 29 July 2023\r\nTime: 16:00\r\nLanguage: Chinese', 17.50, 21, '2023-07-29', '16:00:00', 'Chinese'),
(73, 2, 1, 'A Stroll through History', 'Date: 30 July 2023\nTime: 10:00\nLanguage: Chinese', 17.50, 21, '2023-07-30', '10:00:00', 'Chinese'),
(74, 2, 1, 'A Stroll through History', 'Date: 30 July 2023\nTime: 13:00\nLanguage: Chinese', 17.50, 21, '2023-07-30', '13:00:00', 'Chinese'),
(75, 2, 1, 'A Stroll through History', 'Date: 30 July 2023\r\nTime: 16:00\r\nLanguage: Chinese', 17.50, 21, '2023-07-30', '16:00:00', 'Chinese');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type`) VALUES
(1, 'Restaurant Reservation'),
(2, 'Regular Ticket'),
(3, 'All-Day Ticket'),
(4, 'All-Access Ticket'),
(5, 'Free Access'),
(6, 'Family Ticket');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adults` int(20) NOT NULL,
  `kids` int(20) DEFAULT NULL,
  `date` int(20) NOT NULL,
  `session` int(20) NOT NULL,
  `custom_message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `employee_number` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house_number` int(16) NOT NULL,
  `postal_code` varchar(32) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `employee_number`, `email`, `password`, `first_name`, `last_name`, `street`, `house_number`, `postal_code`, `city`, `state`, `country`, `phone_number`, `created_at`) VALUES
(1, 3, 1, 'phil@email.com', 'password', 'phil', 'phil', 'inholland', 123, '1234AB', 'amsterdam', 'amsterdam', 'netherlands', NULL, '2023-04-04 10:26:06'),
(7, 3, NULL, 'philiptsaglo@gmail.com', '$2y$10$qNIxofOXq1dwbNIIJgmHOOumnpSzk7yCIgVdhUyXyxIFaA92zdtma', 'Philip', 'Tsagli', 'Olympisch Stadion', 2, '1104TX', 'Amsterdam', 'Amsterdam', 'Netherlands', NULL, '2023-04-04 10:26:06'),
(22, 1, NULL, 'philiptsagli2@email.com', '$2y$10$mcdmkOG98vx3Y2So/yYQHe/X/b9aPLouYKUlWfSYi9ukNFp9zkfP.', 'Philip', 'Tsagli', 'Olympisch Stadion', 2, '1104TX', 'Amsterdam', 'Amsterdam', 'Netherlands', NULL, '2023-04-04 10:26:06'),
(23, 1, NULL, 'philiptsagli@email.com', '$2y$10$NFmCx2boDzcakoKgmRQGeOQN4UTxVs2oiilmdE2fzFgtj2OCxOscm', 'Philip', 'Tsagli', 'Olympisch Stadion', 2, '1104TX', 'Amsterdam', 'Amsterdam', 'Netherlands', NULL, '2023-04-04 10:26:06'),
(24, 1, NULL, 'escumicrazvan@yahoo.com', '$2y$10$FzqeEQpzXnJNq8L.pzu2IuXJYQFz5r64a6y8pYCFYmhYYZYtq34GK', 'Razvan', 'Dragoescu', 'Markelerbergpad', 1, '0001LL', 'AMSTERDAM', 'Noord-Holland', 'Netherlands', NULL, '2023-04-04 10:26:06'),
(28, 1, NULL, 'rodrigo@gmail.com', '$2y$10$W7Uce71BsxBzmjZkWw2.UeeBRu9ApwP.zXDwhTlpbhjH/EBC3A5Em', 'Rodrigo', 'Bange', 'My street', 123, '1234ABC', 'Velserbroek', 'Noord-Holland', 'Netherlands', '12334593054', '2023-04-09 18:17:44'),
(29, 1, NULL, 'philiptsagli@fakeemail.com', '$2y$10$F.L4EIkr581hubh0ZAxJqeNU4FURwMyUvMoEKe8H36xKSQk5MH5sC', 'Philip', 'Tsagli', 'Olympisch Stadion', 2, '1104TX', 'Amsterdam', 'Amsterdam', 'Netherlands', NULL, '2023-04-09 18:18:47'),
(31, 1, NULL, 'User@gmai.com', '$2y$10$TmSE281teyw.3fjGIZpLROnGgurnqsnUfkzoSrvNM8f73E4C5pzEG', 'User', 'User', 'User', 2, 'User', 'User', 'Userstate', 'Userland', NULL, '2023-04-09 18:28:39'),
(32, 1, NULL, 'philiptsagli3@gmail.com', '$2y$10$SpPWwOW5XOdStBpFLXwz/e6NtKMUlbsix9kovEyhyVfb2OpBw4Gf2', 'Philip', 'Tsagli', 'Olympisch Stadion', 2, '1104TX', 'Amsterdam', 'Amsterdam', 'Netherlands', NULL, '2023-04-11 13:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type`) VALUES
(1, 'Customer'),
(2, 'Employee'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `webpages`
--

CREATE TABLE `webpages` (
  `id` int(11) NOT NULL,
  `path` varchar(64) DEFAULT NULL,
  `container` varchar(255) DEFAULT NULL,
  `html` longtext,
  `home` varchar(255) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webpages`
--

INSERT INTO `webpages` (`id`, `path`, `container`, `html`) VALUES
(4, '/home/activities', '#data-container', '<header>\n<div class=\"p-5 text-center bg-image header-image\" style=\"background-image: url(\'../images/jazz_index_header.png\');\">\n<div class=\"d-flex justify-content-center align-items-center h-100\">\n<div class=\"text-white\">\n<h1 class=\"mb-3 fw-bold header-title\">ACTIVITIES</h1>\n<h4 class=\"mb-3 fw-semibold header-subtitle\">TEST</h4>\n<a class=\"btn btn-outline-light btn-lg rounded-0\" role=\"button\" href=\"#!\">BOOK YOUR TICKETS</a></div>\n</div>\n</div>\n</header>\n<section class=\"container d-flex mt-4 mb-4 flex-column\">\n<div class=\"row text-center\">\n<h2 class=\"fw-bold jazz-intro-title\">July 27th - July 30th</h2>\n</div>\n<div class=\"row jazz-intro-description justify-content-center\">\n<h5 class=\"w-75\">Start your summer with favourite bands and artists, who will be performing at the Haarlem festival from <strong>Thursday (July 27, 2023)</strong> through <strong>Sunday (July 30, 2023)</strong>! Featuring Gumbo Kings, Uncle Sue, Ntjam Rosie, Myles Sanko and plenty more. Get your tickets today!</h5>\n</div>\n</section>\n<section id=\"featured-artists\" class=\"d-flex justify-content-center flex-column\">\n<div class=\"container mt-4 d-inline-flex flex-column justify-content-center\">\n<div id=\"featured-artists-title\" class=\"d-inline-flex justify-content-center\">\n<p class=\"h1 text-white fw-bold mb-1\">FEATURED&nbsp;</p>\n<p class=\"h1 text-gold fw-bold mb-1\">ARTISTS</p>\n</div>\n<div class=\"d-inline-flex flex-column justify-content-center\">\n<div id=\"featured-artists-first-line\" class=\"mb-2 mx-auto\"></div>\n<div id=\"featured-artists-last-line\" class=\"mb-2 mx-auto\"></div>\n</div>\n</div>\n<div class=\"container d-flex flex-row mt-3\">\n<div class=\"container d-flex mt-0 mb-0 flex-row justify-content-center\">\n<div class=\"card m-4 mt-2 mb-3 bg-transparent border-0\" style=\"max-width: 300px;\"><img class=\"card-img-top rounded-0\" src=\"../images/gumbo_kings_1.png\">\n<div class=\"card-body p-0 pt-3 pb-3\">\n<p class=\"h4 card-text text-center text-white fw-bold\">GUMBO KINGS</p>\n</div>\n</div>\n<div class=\"card m-4 mt-2 mb-3 bg-transparent border-0\" style=\"max-width: 300px;\"><img class=\"card-img-top rounded-0\" src=\"../images/ntjam_rosie_1.png\">\n<div class=\"card-body p-0 pt-3 pb-3\">\n<p class=\"h4 card-text text-center text-white fw-bold\">NTJAM ROSIE</p>\n</div>\n</div>\n<div class=\"card m-4 mt-2 mb-3 bg-transparent border-0\" style=\"max-width: 300px;\"><img class=\"card-img-top rounded-0\" src=\"../images/myles_sanko_1.png\">\n<div class=\"card-body p-0 pt-3 pb-3\">\n<p class=\"h4 text-center text-white fw-bold\">MYLES SANKO</p>\n</div>\n</div>\n</div>\n</div>\n</section>'),
(5, '/history/index', '#featured-locations', '<div class=\"container mt-4 d-inline-flex flex-column justify-content-center\">\n<div class=\"d-inline-flex mt-5 justify-content-center\">\n<p class=\"h1 text-black mt fw-bold mb-1\">FEATURED&nbsp;</p>\n<p class=\"h1 text-danger fw-bold mb-1\">LOCATIONS</p>\n</div>\n<div class=\"d-inline-flex flex-column justify-content-center\">\n<div id=\"featured-locations-first-line\" class=\"mb-2 mx-auto\"></div>\n<div id=\"featured-locations-last-line\" class=\"mb-2 mx-auto\"></div>\n</div>\n</div>\n<div class=\"container mt-3 mb-3\"><a class=\"custom-card\" href=\"../history/location?id=1\"> </a>\n<div class=\"card bg-light border-0 p-4 m-4\" style=\"max-width: 70vw;\"><a class=\"custom-card\" href=\"../history/location?id=1\"> </a>\n<div class=\"row\"><a class=\"custom-card\" href=\"../history/location?id=1\"> </a>\n<div class=\"col-md-6\"><a class=\"custom-card\" href=\"../history/location?id=1\">\n<ul>\n<li class=\"mb-3\">Church of St. Bavo</li>\n</ul>\n<p class=\"p-3 text-truncate\">The St Bavo church was built in 1895ï¿½1930 and dedicated in 1948, named for the city\'s patron saint.</p>\n</a>\n<div class=\"col-md-12 \"><a class=\"custom-card\" href=\"../history/location?id=1\"> </a>\n<h5 class=\"p-2 m-4 mt-5\"><a class=\"custom-card\" href=\"../history/location?id=1\">Learn more </a><i class=\"fa fa-chevron-right\"></i></h5>\n</div>\n</div>\n<div class=\"col-md-5\"><img src=\"../images/historyimages/st-bavo-primary.jpg\" class=\"img-fluid\" style=\"width: 100%; height: 80%;\"></div>\n</div>\n</div>\n<a class=\"custom-card\" href=\"../history/location?id=2\"> </a>\n<div class=\"card bg-light border-0 p-4 m-4\" style=\"max-width: 70vw;\"><a class=\"custom-card\" href=\"../history/location?id=2\"> </a>\n<div class=\"row\"><a class=\"custom-card\" href=\"../history/location?id=2\"> </a>\n<div class=\"col-md-6\"><a class=\"custom-card\" href=\"../history/location?id=2\">\n<ul>\n<li class=\"mb-3\">Grote Markt</li>\n</ul>\n<p class=\"p-3 text-truncate\">This is the city centre of Haarlem. Located in this centre, are some of the most historical buildings of Haarlem, the most obvious St Bavo church.</p>\n</a>\n<div class=\"col-md-12 \"><a class=\"custom-card\" href=\"../history/location?id=2\"> </a>\n<h5 class=\"p-2 m-4 mt-5\"><a class=\"custom-card\" href=\"../history/location?id=2\">Learn more </a><i class=\"fa fa-chevron-right\"></i></h5>\n</div>\n</div>\n<div class=\"col-md-5\"><img src=\"../images/historyimages/grote-markt-primary.png\" class=\"img-fluid\" style=\"width: 100%; height: 80%;\"></div>\n</div>\n</div>\n<a class=\"custom-card\" href=\"../history/location?id=3\"> </a>\n<div class=\"card bg-light border-0 p-4 m-4\" style=\"max-width: 70vw;\"><a class=\"custom-card\" href=\"../history/location?id=3\"> </a>\n<div class=\"row\"><a class=\"custom-card\" href=\"../history/location?id=3\"> </a>\n<div class=\"col-md-6\"><a class=\"custom-card\" href=\"../history/location?id=3\">\n<ul>\n<li class=\"mb-3\">De Hallen</li>\n</ul>\n<p class=\"p-3 text-truncate\">The Frans Hals Museum in Haarlem, Netherlands features the works of Dutch Golden Age painter Frans Hals, along with other Old Dutch Masters from the 16th and 17th centuries, and contemporary art exhibitions. The museum is located in two buildings, and is a must-visit destination for art lovers interested in Dutch painting history.</p>\n</a>\n<div class=\"col-md-12 \"><a class=\"custom-card\" href=\"../history/location?id=3\"> </a>\n<h5 class=\"p-2 m-4 mt-5\"><a class=\"custom-card\" href=\"../history/location?id=3\">Learn more </a><i class=\"fa fa-chevron-right\"></i></h5>\n</div>\n</div>\n<div class=\"col-md-5\"><img src=\"../images/historyimages/de-hallen-primary.jpg\" class=\"img-fluid\" style=\"width: 100%; height: 80%;\"></div>\n</div>\n</div>\n<a class=\"custom-card\" href=\"../history/location?id=4\"> </a>\n<div class=\"card bg-light border-0 p-4 m-4\" style=\"max-width: 70vw;\"><a class=\"custom-card\" href=\"../history/location?id=4\"> </a>\n<div class=\"row\"><a class=\"custom-card\" href=\"../history/location?id=4\"> </a>\n<div class=\"col-md-6\"><a class=\"custom-card\" href=\"../history/location?id=4\">\n<ul>\n<li class=\"mb-3\">Proveniershof</li>\n</ul>\n<p class=\"p-3 text-truncate\">Proveniershof is a historic museum in Haarlem, Netherlands that was originally a home for elderly men in the 17th century. The museum displays exhibits about the history of the community and its residents, and features antique furniture and artwork from the 18th-century Dutch Golden Age. The building\'s courtyards and gardens are also worth exploring.</p>\n</a>\n<div class=\"col-md-12 \"><a class=\"custom-card\" href=\"../history/location?id=4\"> </a>\n<h5 class=\"p-2 m-4 mt-5\"><a class=\"custom-card\" href=\"../history/location?id=4\">Learn more </a><i class=\"fa fa-chevron-right\"></i></h5>\n</div>\n</div>\n<div class=\"col-md-5\"><img src=\"../images/historyimages/proveniershof-primary.jpg\" class=\"img-fluid\" style=\"width: 100%; height: 80%;\"></div>\n</div>\n</div>\n<a class=\"custom-card\" href=\"../history/location?id=5\"> </a>\n<div class=\"card bg-light border-0 p-4 m-4\" style=\"max-width: 70vw;\"><a class=\"custom-card\" href=\"../history/location?id=5\"> </a>\n<div class=\"row\"><a class=\"custom-card\" href=\"../history/location?id=5\"> </a>\n<div class=\"col-md-6\"><a class=\"custom-card\" href=\"../history/location?id=5\">\n<ul>\n<li class=\"mb-3\">Jopenkerk</li>\n</ul>\n<p class=\"p-3 text-truncate\">Jopenkerk in Haarlem, Netherlands is a unique brewery and restaurant housed in a historic church. Enjoy locally crafted beer and delicious food made with fresh ingredients in a warm and welcoming atmosphere. The brewery also offers tours and tastings. A must-visit destination for an unforgettable dining experience.</p>\n</a>\n<div class=\"col-md-12 \"><a class=\"custom-card\" href=\"../history/location?id=5\"> </a>\n<h5 class=\"p-2 m-4 mt-5\"><a class=\"custom-card\" href=\"../history/location?id=5\">Learn more </a><i class=\"fa fa-chevron-right\"></i></h5>\n</div>\n</div>\n<div class=\"col-md-5\"><img src=\"../images/historyimages/jopenkerk-primary.jpg\" class=\"img-fluid\" style=\"width: 100%; height: 80%;\"></div>\n</div>\n</div>\n<a class=\"custom-card\" href=\"../history/location?id=6\"> </a>\n<div class=\"card bg-light border-0 p-4 m-4\" style=\"max-width: 70vw;\"><a class=\"custom-card\" href=\"../history/location?id=6\"> </a>\n<div class=\"row\"><a class=\"custom-card\" href=\"../history/location?id=6\"> </a>\n<div class=\"col-md-6\"><a class=\"custom-card\" href=\"../history/location?id=6\">\n<ul>\n<li class=\"mb-3\">Waalse Kerk</li>\n</ul>\n<p class=\"p-3 text-truncate\">Waalse Kerk is a beautiful, historic church in the heart of Haarlem, Netherlands. Originally built in the 17th century, the church is known for its stunning architecture and beautiful stained glass windows. Today, the church is used for a variety of events, including concerts, exhibitions, and religious services.</p>\n</a>\n<div class=\"col-md-12 \"><a class=\"custom-card\" href=\"../history/location?id=6\"> </a>\n<h5 class=\"p-2 m-4 mt-5\"><a class=\"custom-card\" href=\"../history/location?id=6\">Learn more </a><i class=\"fa fa-chevron-right\"></i></h5>\n</div>\n</div>\n<div class=\"col-md-5\"><img src=\"../images/historyimages/waalse-kerk-primary.jpg\" class=\"img-fluid\" style=\"width: 100%; height: 80%;\"></div>\n</div>\n</div>\n<a class=\"custom-card\" href=\"../history/location?id=7\"> </a>\n<div class=\"card bg-light border-0 p-4 m-4\" style=\"max-width: 70vw;\"><a class=\"custom-card\" href=\"../history/location?id=7\"> </a>\n<div class=\"row\"><a class=\"custom-card\" href=\"../history/location?id=7\"> </a>\n<div class=\"col-md-6\"><a class=\"custom-card\" href=\"../history/location?id=7\">\n<ul>\n<li class=\"mb-3\">Molen Adriaan</li>\n</ul>\n<p class=\"p-3 text-truncate\">The Adriaan windmill is one of Haarlemï¿½s iconic structures. As you make your way into the city, this attraction greets you near the train station, making it one of the first things you\'ll notice. It was built in the year 1779 and has since been a recognizable part of Haarlemï¿½s skyline. You can visit it for a tour around the place and experience how life used to be in the 18th century.</p>\n</a>\n<div class=\"col-md-12 \"><a class=\"custom-card\" href=\"../history/location?id=7\"> </a>\n<h5 class=\"p-2 m-4 mt-5\"><a class=\"custom-card\" href=\"../history/location?id=7\">Learn more </a><i class=\"fa fa-chevron-right\"></i></h5>\n</div>\n</div>\n<div class=\"col-md-5\"><img src=\"../images/historyimages/molen-de-adriaan-primary.jpg\" class=\"img-fluid\" style=\"width: 100%; height: 80%;\"></div>\n</div>\n</div>\n<a class=\"custom-card\" href=\"../history/location?id=8\"> </a>\n<div class=\"card bg-light border-0 p-4 m-4\" style=\"max-width: 70vw;\"><a class=\"custom-card\" href=\"../history/location?id=8\"> </a>\n<div class=\"row\"><a class=\"custom-card\" href=\"../history/location?id=8\"> </a>\n<div class=\"col-md-6\"><a class=\"custom-card\" href=\"../history/location?id=8\">\n<ul>\n<li class=\"mb-3\">Amsterdamse Poort</li>\n</ul>\n<p class=\"p-3 text-truncate\">Amsterdamse Poort is a stunning medieval gatehouse that dates back to the 14th century. Located in the heart of Haarlem, Netherlands, the gatehouse is an important historical landmark and one of the most recognizable symbols of the city. Today, Amsterdamse Poort is used for a variety of events and exhibitions, including art shows, cultural events, and historical exhibitions.</p>\n</a>\n<div class=\"col-md-12 \"><a class=\"custom-card\" href=\"../history/location?id=8\"> </a>\n<h5 class=\"p-2 m-4 mt-5\"><a class=\"custom-card\" href=\"../history/location?id=8\">Learn more </a><i class=\"fa fa-chevron-right\"></i></h5>\n</div>\n</div>\n<div class=\"col-md-5\"><img src=\"../images/historyimages/amsterdamse-poort-primary.jpg\" class=\"img-fluid\" style=\"width: 100%; height: 80%;\"></div>\n</div>\n</div>\n<a class=\"custom-card\" href=\"../history/location?id=30\"> </a>\n<div class=\"card bg-light border-0 p-4 m-4\" style=\"max-width: 70vw;\"><a class=\"custom-card\" href=\"../history/location?id=30\"> </a>\n<div class=\"row\"><a class=\"custom-card\" href=\"../history/location?id=30\"> </a>\n<div class=\"col-md-6\"><a class=\"custom-card\" href=\"../history/location?id=30\">\n<ul>\n<li class=\"mb-3\">Wolfhound</li>\n</ul>\n<p class=\"p-3 text-truncate\">Place to drink drinks and eat food</p>\n</a>\n<div class=\"col-md-12 \"><a class=\"custom-card\" href=\"../history/location?id=30\"> </a>\n<h5 class=\"p-2 m-4 mt-5\"><a class=\"custom-card\" href=\"../history/location?id=30\">Learn more </a><i class=\"fa fa-chevron-right\"></i></h5>\n</div>\n</div>\n<div class=\"col-md-5\"><img src=\"../images/no-image-primary.png\" class=\"img-fluid\" style=\"width: 100%; height: 80%;\"></div>\n</div>\n</div>\n</div>'),
(6, '/home/index', '#data-container', '<section class=\"intro-bg \">\n<div class=\"container text-white w-75 py-5\">\n<div class=\"row\">\n<div class=\"col-md-4\">\n<h3 class=\"inline-text\">Visit <span class=\"text-gold\">Haarlem</span>,</h3>\n<h5>a journey to remember</h5>\n</div>\n<div class=\"col-md-8\">\n<p class=\"small text-justify\">Haarlem: a cozy historic center, famous museums, stores, restaurants and the beach around the corner. Welcome to the city that has everything. On the one hand, the hidden streets of bygone days and trendy concept stores. On the other hand, the medieval church and waterfront cafes. From Dutch masters to French star chefs. From antique market to pop concert. <br><br>So, fancy an unforgettable day out? Visit Haarlem and thus be surprised by the sights, boutiques and picturesque squares, by the old and contemporary artists, the burgundian atmosphere and the rich history. In Haarlem you have everything together.</p>\n</div>\n</div>\n</div>\n</section>\n<section class=\"pt-3\">\n<div class=\"bg-image festival-banner-picture\" style=\"background-image: url(\'../images/festival-banner.png\');\">\n<div class=\"text-white text-center py-5 shadow\">\n<h1>HAARLEM FESTIVAL!!</h1>\n<h4 class=\"pb-1\">Jazz, Dance, History, Cuisines and Activities</h4>\n<a class=\"btn btn-outline-light btn-lg rounded-0\" role=\"button\" href=\"../festival/index\">START YOUR SUMMER HERE</a></div>\n</div>\n</section>\n<section class=\"container-bg\">\n<div class=\"container w-75 py-3\">\n<div class=\"row py-2\">\n<h3>Discover Haarlem</h3>\n</div>\n<div class=\"row g-0\">\n<div class=\"col-md-3\">\n<div class=\"position-relative h-100\"><img src=\"../images/history.png\" class=\"img-fluid h-100\" alt=\"\">\n<div class=\"position-absolute bottom-0 w-100 text-center\"><i class=\"fa fa-book-open\"></i>\n<h5 class=\"text-white p-3\">History &amp; Culture</h5>\n</div>\n</div>\n</div>\n<div class=\"col-md-3\"><a href=\"../history/index\">\n<div class=\"position-relative h-100\"><img src=\"../images/music-theatre.png\" class=\"img-fluid h-100\" alt=\"\">\n<div class=\"position-absolute bottom-0 w-100 text-center\"><i class=\"fa fa-music fa-inverse\"></i>\n<h5 class=\"text-white p-3 m-0\">Music &amp; Theatre</h5>\n</div>\n</div>\n</a></div>\n<div class=\"col-md-3\">\n<div class=\"position-relative h-100\"><img src=\"../images/Cuisine.png\" class=\"img-fluid h-100\" alt=\"\">\n<div class=\"position-absolute bottom-0 w-100 text-center\"><i class=\"fa fa-cutlery fa-inverse\"></i>\n<h5 class=\"text-white p-3 m-0\">Cuisine</h5>\n</div>\n</div>\n</div>\n<div class=\"col-md-3\">\n<div class=\"position-relative h-100\"><img src=\"../images/Activity.png\" class=\"img-fluid h-100\" alt=\"\">\n<div class=\"position-absolute bottom-0 w-100 text-center\"><i class=\"fa fa-bicycle fa-inverse\"></i>\n<h5 class=\"text-white p-3 m-0\">Activities</h5>\n</div>\n</div>\n</div>\n</div>\n</div>\n</section>\n<section style=\"padding: 100px;\"></section>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `artist_image`
--
ALTER TABLE `artist_image`
  ADD KEY `FK_image_artist_id` (`artist_id`),
  ADD KEY `FK_artist_image_id` (`image_id`);

--
-- Indexes for table `artist_page`
--
ALTER TABLE `artist_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_slide`
--
ALTER TABLE `artist_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dance_locations`
--
ALTER TABLE `dance_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `FK_event_type` (`event_type`);

--
-- Indexes for table `event_artist`
--
ALTER TABLE `event_artist`
  ADD KEY `FK_artist` (`artist_id`),
  ADD KEY `FK_event_artist` (`event_id`);

--
-- Indexes for table `event_image`
--
ALTER TABLE `event_image`
  ADD KEY `FK_image_event_id` (`event_id`),
  ADD KEY `FK_event_image_id` (`image_id`);

--
-- Indexes for table `event_information`
--
ALTER TABLE `event_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `event_location`
--
ALTER TABLE `event_location`
  ADD KEY `event_location_ibfk_1` (`event_id`),
  ADD KEY `event_location_ibfk_2` (`location_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`event_type_id`);

--
-- Indexes for table `history_event_language`
--
ALTER TABLE `history_event_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_event_schedule`
--
ALTER TABLE `history_event_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `location_image`
--
ALTER TABLE `location_image`
  ADD KEY `FK_image_location_id` (`location_id`),
  ADD KEY `FK_location_image_id` (`image_id`);

--
-- Indexes for table `main_events`
--
ALTER TABLE `main_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_payment_id` (`payment_id`),
  ADD KEY `FK_order_user` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `FK_order` (`order_id`),
  ADD KEY `FK_order_product` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_product_type` (`product_type`),
  ADD KEY `FK_product_event` (`event_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD KEY `FK_stock_product` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FK_user_type` (`user_type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `webpages`
--
ALTER TABLE `webpages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `artist_page`
--
ALTER TABLE `artist_page`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artist_slide`
--
ALTER TABLE `artist_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dance_locations`
--
ALTER TABLE `dance_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `event_information`
--
ALTER TABLE `event_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `event_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history_event_language`
--
ALTER TABLE `history_event_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history_event_schedule`
--
ALTER TABLE `history_event_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `main_events`
--
ALTER TABLE `main_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webpages`
--
ALTER TABLE `webpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artist_image`
--
ALTER TABLE `artist_image`
  ADD CONSTRAINT `FK_artist_image_id` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_image_artist_id` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `FK_event_type` FOREIGN KEY (`event_type`) REFERENCES `event_type` (`event_type_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `event_artist`
--
ALTER TABLE `event_artist`
  ADD CONSTRAINT `FK_artist` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_event_artist` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_image`
--
ALTER TABLE `event_image`
  ADD CONSTRAINT `FK_event_image_id` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_image_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_information`
--
ALTER TABLE `event_information`
  ADD CONSTRAINT `event_information_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);

--
-- Constraints for table `event_location`
--
ALTER TABLE `event_location`
  ADD CONSTRAINT `event_location_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_location_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history_event_schedule`
--
ALTER TABLE `history_event_schedule`
  ADD CONSTRAINT `history_event_schedule_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `history_event_language` (`id`);

--
-- Constraints for table `location_image`
--
ALTER TABLE `location_image`
  ADD CONSTRAINT `FK_image_location_id` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_location_image_id` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_events`
--
ALTER TABLE `main_events`
  ADD CONSTRAINT `main_events_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_payment_id` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `FK_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_order_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_product_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_product_type` FOREIGN KEY (`product_type`) REFERENCES `product_type` (`product_type_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `FK_stock_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user_type` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`user_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

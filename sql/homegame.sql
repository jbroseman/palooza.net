-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2015 at 10:09 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cdcol`
--
CREATE DATABASE IF NOT EXISTS `cdcol` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `cdcol`;

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
  `titel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `interpret` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cds`
--
ALTER TABLE `cds`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;--
-- Database: `homegame`
--
CREATE DATABASE IF NOT EXISTS `homegame` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `homegame`;

-- --------------------------------------------------------

--
-- Table structure for table `blindincrement`
--

CREATE TABLE IF NOT EXISTS `blindincrement` (
  `BlindIncrementID` int(11) NOT NULL,
  `Length` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTableID` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blindincrement`
--

INSERT INTO `blindincrement` (`BlindIncrementID`, `Length`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(1, 10, 1, 1, '2015-04-06'),
(2, 15, 1, 1, '2015-04-06'),
(3, 20, 1, 1, '2015-04-06'),
(4, 25, 1, 1, '2015-04-06'),
(5, 30, 1, 1, '2015-04-06'),
(6, 45, 1, 1, '2015-04-06'),
(7, 60, 1, 1, '2015-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `blinds`
--

CREATE TABLE IF NOT EXISTS `blinds` (
  `BlindID` int(11) NOT NULL,
  `SmallBlind` bigint(20) NOT NULL,
  `LargeBlind` bigint(20) NOT NULL,
  `ChipUpID` int(11) DEFAULT NULL,
  `EndOfRebuy` tinyint(1) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTableID` int(11) NOT NULL,
  `StatusDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blinds`
--

INSERT INTO `blinds` (`BlindID`, `SmallBlind`, `LargeBlind`, `ChipUpID`, `EndOfRebuy`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(1, 100, 200, NULL, 0, 1, 1, '2015-04-06'),
(2, 200, 400, NULL, 0, 1, 1, '2015-04-06'),
(3, 300, 600, NULL, 0, 1, 1, '2015-04-06'),
(4, 400, 800, 1, 0, 1, 1, '2015-04-06'),
(5, 500, 1000, NULL, 0, 1, 1, '2015-04-06'),
(6, 1000, 2000, NULL, 0, 1, 1, '2015-04-06'),
(7, 1500, 3000, 2, 1, 1, 1, '2015-04-06'),
(8, 2000, 4000, NULL, 0, 1, 1, '2015-04-06'),
(9, 3000, 6000, NULL, 0, 1, 1, '2015-04-06'),
(10, 4000, 8000, 3, 0, 1, 1, '2015-04-06'),
(11, 5000, 10000, NULL, 0, 1, 1, '2015-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `buyins`
--

CREATE TABLE IF NOT EXISTS `buyins` (
  `BuyinID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Bounty` int(11) DEFAULT NULL,
  `Code` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTable` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyins`
--

INSERT INTO `buyins` (`BuyinID`, `Amount`, `Bounty`, `Code`, `Status`, `StatusTable`, `StatusDate`) VALUES
(1, 5, NULL, '5', 1, 1, '2015-04-06'),
(2, 10, NULL, '10', 1, 1, '2015-04-06'),
(3, 15, NULL, '15', 1, 1, '2015-04-06'),
(4, 20, NULL, '20', 1, 1, '2015-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `chips`
--

CREATE TABLE IF NOT EXISTS `chips` (
  `ChipID` int(11) NOT NULL,
  `PrimaryColor` varchar(100) NOT NULL,
  `SecondaryColor` varchar(100) DEFAULT NULL,
  `Denomination` bigint(20) NOT NULL,
  `ImageFilename` text,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTableID` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chips`
--

INSERT INTO `chips` (`ChipID`, `PrimaryColor`, `SecondaryColor`, `Denomination`, `ImageFilename`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(1, 'White', 'black', 100, 'chip_blue_yellow_white.png', 1, 1, '2015-04-06'),
(2, 'red', 'white', 500, 'chip_orange_blue_white.png', 1, 1, '2015-04-06'),
(3, 'green', 'white', 1000, 'chip_green_blue_white.png', 1, 1, '2015-04-06'),
(4, 'black', 'white', 5000, 'chip_black_white.png', 0, 1, '2015-04-06'),
(5, 'black', 'white', 5000, 'chip_black_purp_white.png', 1, 1, '2015-04-06'),
(6, 'blue', 'white', 10000, 'chip_pink_black_white.png', 1, 1, '2015-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `completedblinds`
--

CREATE TABLE IF NOT EXISTS `completedblinds` (
  `CompletedBlindID` int(11) NOT NULL,
  `GameID` int(11) NOT NULL,
  `BlindID` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTableID` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completedblinds`
--

INSERT INTO `completedblinds` (`CompletedBlindID`, `GameID`, `BlindID`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(11, 9, 1, 1, 1, '0000-00-00'),
(12, 9, 2, 1, 1, '0000-00-00'),
(13, 9, 3, 1, 1, '0000-00-00'),
(14, 9, 4, 1, 1, '0000-00-00'),
(15, 9, 5, 1, 1, '0000-00-00'),
(16, 9, 6, 1, 1, '0000-00-00'),
(17, 9, 7, 1, 1, '0000-00-00'),
(18, 9, 8, 1, 1, '0000-00-00'),
(19, 9, 9, 1, 1, '0000-00-00'),
(20, 9, 10, 1, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `gamebounties`
--

CREATE TABLE IF NOT EXISTS `gamebounties` (
  `GameBountyID` int(11) NOT NULL,
  `LosingPlayerID` int(11) NOT NULL,
  `WinningPlayerID` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTableID` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gameplayerbuyin`
--

CREATE TABLE IF NOT EXISTS `gameplayerbuyin` (
  `GamePlayerBuyinID` int(11) NOT NULL,
  `GamePlayerID` int(11) NOT NULL,
  `IsRebuy` tinyint(1) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTableID` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gameplayerbuyin`
--

INSERT INTO `gameplayerbuyin` (`GamePlayerBuyinID`, `GamePlayerID`, `IsRebuy`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(1, 1, 0, 1, 1, '2015-04-11'),
(2, 2, 0, 1, 1, '2015-04-11'),
(3, 3, 0, 1, 1, '2015-04-11'),
(4, 4, 0, 1, 1, '2015-04-11'),
(6, 5, 0, 1, 1, '2015-04-11'),
(7, 6, 0, 1, 1, '2015-04-11'),
(8, 7, 0, 1, 1, '2015-04-11'),
(9, 8, 0, 1, 1, '2015-04-11'),
(10, 9, 0, 1, 1, '2015-04-11'),
(11, 10, 0, 1, 1, '2015-04-11'),
(12, 11, 0, 1, 1, '2015-04-11'),
(13, 12, 0, 1, 1, '2015-04-11'),
(15, 2, 1, 1, 1, '2015-04-11'),
(22, 20, 0, 1, 1, '0000-00-00'),
(23, 21, 0, 1, 1, '0000-00-00'),
(24, 22, 0, 1, 1, '0000-00-00'),
(25, 23, 0, 1, 1, '0000-00-00'),
(26, 24, 0, 1, 1, '0000-00-00'),
(27, 25, 0, 1, 1, '0000-00-00'),
(28, 26, 0, 1, 1, '0000-00-00'),
(29, 27, 0, 1, 1, '0000-00-00'),
(30, 28, 0, 1, 1, '0000-00-00'),
(31, 29, 0, 1, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `gameplayers`
--

CREATE TABLE IF NOT EXISTS `gameplayers` (
  `GamePlayerID` int(11) NOT NULL,
  `GameID` int(11) NOT NULL,
  `PlayerID` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTableID` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gameplayers`
--

INSERT INTO `gameplayers` (`GamePlayerID`, `GameID`, `PlayerID`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(1, 1, 1, 1, 1, '0000-00-00'),
(2, 1, 2, 1, 1, '2015-04-11'),
(3, 1, 3, 1, 1, '2015-04-11'),
(4, 1, 4, 1, 1, '2015-04-11'),
(5, 1, 5, 1, 1, '2015-04-11'),
(6, 1, 6, 1, 1, '2015-04-11'),
(7, 1, 7, 1, 1, '2015-04-11'),
(8, 1, 8, 1, 1, '2015-04-11'),
(9, 1, 9, 1, 1, '2015-04-11'),
(10, 1, 10, 1, 1, '2015-04-11'),
(11, 1, 11, 1, 1, '2015-04-11'),
(12, 1, 12, 1, 1, '2015-04-11'),
(20, 8, 2, 1, 1, '0000-00-00'),
(21, 8, 9, 1, 1, '0000-00-00'),
(22, 9, 1, 1, 1, '0000-00-00'),
(23, 9, 2, 1, 1, '0000-00-00'),
(24, 9, 4, 1, 1, '0000-00-00'),
(25, 9, 6, 1, 1, '0000-00-00'),
(26, 9, 7, 1, 1, '0000-00-00'),
(27, 9, 8, 1, 1, '0000-00-00'),
(28, 9, 12, 1, 1, '0000-00-00'),
(29, 9, 19, 1, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `GameID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `BlindIncrementID` int(11) NOT NULL,
  `BuyInID` int(11) NOT NULL,
  `EndOfRebuy` time DEFAULT NULL,
  `BeginningStack` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTableID` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`GameID`, `Date`, `BlindIncrementID`, `BuyInID`, `EndOfRebuy`, `BeginningStack`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(1, '2015-04-08', 2, 2, NULL, 0, 0, 1, '2015-04-08'),
(8, '2015-05-02', 2, 2, NULL, 41500, 0, 1, '0000-00-00'),
(9, '2015-05-02', 2, 2, NULL, 41500, 1, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `placings`
--

CREATE TABLE IF NOT EXISTS `placings` (
  `PlacingID` int(11) NOT NULL,
  `PlaceValue` int(11) DEFAULT NULL,
  `Code` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Description` text NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTableID` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placings`
--

INSERT INTO `placings` (`PlacingID`, `PlaceValue`, `Code`, `Description`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(1, 1, '1ST', 'first place', 1, 1, '2015-04-06'),
(2, 2, '2ND', 'Second Place', 1, 1, '2015-04-06'),
(3, 3, '3RD', 'Third Place', 1, 1, '2015-04-06'),
(4, 4, '4TH', 'Fourth Place', 1, 1, '2015-04-06'),
(5, 5, '5TH', 'Fifth Place', 1, 1, '2015-04-06'),
(6, 6, '6TH', 'Sixth Place', 1, 1, '2015-04-06'),
(7, NULL, 'CHOP2', 'Split pot between two people', 1, 1, '2015-04-06'),
(8, NULL, 'CHOP3', 'Split pot between three people', 1, 1, '2015-04-06'),
(9, NULL, 'CHOP4', 'Split pot between four people', 1, 1, '2015-04-06'),
(10, NULL, 'CHOP5', 'Split pot between five people', 1, 1, '2015-04-06'),
(11, NULL, 'CHOP6', 'Split pot between six people', 1, 1, '2015-04-06'),
(12, 7, '7TH', 'Seventh Place', 1, 1, '2015-04-06'),
(13, 8, '8TH', 'Eighth Place', 1, 1, '2015-04-06'),
(14, 9, '9TH', 'Ninth Place', 1, 1, '2015-04-06'),
(15, 10, '10TH', 'Tenth Place', 1, 1, '2015-04-06'),
(16, 11, '11TH', 'Eleventh Place', 1, 1, '2015-04-06'),
(17, 12, '12TH', 'Twelfth Place', 1, 1, '2015-04-06'),
(18, 13, '13TH', 'Thirteenth Place', 1, 1, '2015-04-06'),
(19, 14, '14TH', 'Fourteenth Place', 1, 1, '2015-04-06'),
(20, 15, '15TH', 'Fifteenth Place', 1, 1, '2015-04-06'),
(21, 16, '16TH', 'Sixteenth Place', 1, 1, '2015-04-06'),
(22, 17, '17TH', 'Seventeenth Place', 1, 1, '2015-04-06'),
(23, 18, '18TH', 'Eighteenth Place', 1, 1, '2015-04-06'),
(24, 19, '19TH', 'Nineteenth Place', 1, 1, '2015-04-06'),
(25, 20, '20TH', 'Twentieth Place', 1, 1, '2015-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `playerplacings`
--

CREATE TABLE IF NOT EXISTS `playerplacings` (
  `PlayerPlacingID` int(11) NOT NULL,
  `GamePlayerID` int(11) NOT NULL,
  `PlacingID` int(11) NOT NULL,
  `PotWinnings` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTableID` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `PlayerID` int(11) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `FacebookLink` text,
  `Email` varchar(200) DEFAULT NULL,
  `ImageFilename` text,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusTableID` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`PlayerID`, `FirstName`, `LastName`, `Phone`, `FacebookLink`, `Email`, `ImageFilename`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(1, 'Jake', 'Henry', '2532283416', 'https://www.facebook.com/jake.henry.319', 'amadday@hotmail.com', NULL, 1, 1, '2015-04-06'),
(2, 'Jaime', 'Broseman', '2533507428', 'https://www.facebook.com/jaime.broseman', 'jbroseman@gmail.com', NULL, 1, 1, '2015-04-06'),
(3, 'Sara', 'Henry', NULL, NULL, NULL, NULL, 1, 1, '2015-04-11'),
(4, 'Pappers', 'Henry', NULL, NULL, NULL, NULL, 1, 1, '2015-04-11'),
(5, 'Scooter', 'Stephenson', NULL, NULL, NULL, NULL, 1, 1, '2015-04-11'),
(6, 'Timber', 'Fehrenbach', NULL, NULL, NULL, NULL, 1, 1, '2015-04-11'),
(7, 'Shelley', NULL, NULL, NULL, NULL, NULL, 1, 1, '2015-04-11'),
(8, 'Guy', NULL, NULL, NULL, NULL, NULL, 1, 1, '2015-04-11'),
(9, 'Lee', NULL, NULL, NULL, NULL, NULL, 1, 1, '2015-04-11'),
(10, 'Bjorn', NULL, NULL, NULL, NULL, NULL, 1, 1, '2015-04-11'),
(11, 'Mountain', NULL, NULL, NULL, NULL, NULL, 1, 1, '2015-04-11'),
(12, 'Miker', 'Oshea', NULL, NULL, NULL, NULL, 1, 1, '2015-04-11'),
(13, 'Leeeeeroy', 'Jenkins', '11111111', NULL, 'hghg@cdwe.com', NULL, 1, 1, '0000-00-00'),
(15, 'Deez', 'Nutzes', '11111111', NULL, 'oo@oo.com', NULL, 1, 1, '0000-00-00'),
(16, 'Phillip', 'Fry', '10109110', NULL, 'ic@wiener.com', NULL, 1, 1, '0000-00-00'),
(17, 'NEW DUDE', 'McBride', '00000', NULL, '876856', NULL, 1, 1, '0000-00-00'),
(18, 'test 2', '', '', NULL, '', NULL, 1, 1, '0000-00-00'),
(19, 'Matt', 'Tucker', '', NULL, '', NULL, 1, 1, '0000-00-00'),
(20, 'Jeff', '', '', NULL, '', NULL, 1, 1, '0000-00-00'),
(21, 'Mikey', '', '', NULL, '', NULL, 1, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `StatusID` int(11) NOT NULL,
  `StatusTableID` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `StatusInt` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`StatusID`, `StatusTableID`, `Description`, `StatusInt`) VALUES
(1, 1, 'Active', 1),
(2, 3, 'Pending', 0),
(3, 3, 'In Progress', 1),
(4, 3, 'Finished', 2),
(5, 1, 'Active', 1),
(6, 4, 'No Contact', 0),
(7, 4, 'Phone Only', 1),
(8, 4, 'Facebook Only', 2),
(9, 4, 'Any Contact', 3);

-- --------------------------------------------------------

--
-- Table structure for table `statustable`
--

CREATE TABLE IF NOT EXISTS `statustable` (
  `StatusTableID` int(11) NOT NULL,
  `TableName` varchar(100) NOT NULL DEFAULT 'Default',
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statustable`
--

INSERT INTO `statustable` (`StatusTableID`, `TableName`, `Status`, `StatusDate`) VALUES
(1, 'Default', 1, '2015-04-06'),
(3, 'Games', 1, '2015-04-06'),
(4, 'players', 1, '2015-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `timervalues`
--

CREATE TABLE IF NOT EXISTS `timervalues` (
  `TimerValueID` int(11) NOT NULL,
  `GameID` int(11) NOT NULL,
  `Minutes` int(2) NOT NULL,
  `Seconds` int(2) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `StatusDate` date NOT NULL,
  `StatusTableID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timervalues`
--

INSERT INTO `timervalues` (`TimerValueID`, `GameID`, `Minutes`, `Seconds`, `Status`, `StatusDate`, `StatusTableID`) VALUES
(8, 8, 14, 1, 0, '0000-00-00', 0),
(9, 9, 14, 56, 0, '0000-00-00', 0),
(10, 9, 14, 24, 0, '0000-00-00', 0),
(11, 9, 14, 58, 0, '0000-00-00', 0),
(12, 9, 14, 55, 0, '0000-00-00', 0),
(13, 9, 13, 18, 0, '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blindincrement`
--
ALTER TABLE `blindincrement`
  ADD PRIMARY KEY (`BlindIncrementID`);

--
-- Indexes for table `blinds`
--
ALTER TABLE `blinds`
  ADD PRIMARY KEY (`BlindID`);

--
-- Indexes for table `buyins`
--
ALTER TABLE `buyins`
  ADD PRIMARY KEY (`BuyinID`);

--
-- Indexes for table `chips`
--
ALTER TABLE `chips`
  ADD PRIMARY KEY (`ChipID`);

--
-- Indexes for table `completedblinds`
--
ALTER TABLE `completedblinds`
  ADD PRIMARY KEY (`CompletedBlindID`);

--
-- Indexes for table `gamebounties`
--
ALTER TABLE `gamebounties`
  ADD PRIMARY KEY (`GameBountyID`);

--
-- Indexes for table `gameplayerbuyin`
--
ALTER TABLE `gameplayerbuyin`
  ADD PRIMARY KEY (`GamePlayerBuyinID`);

--
-- Indexes for table `gameplayers`
--
ALTER TABLE `gameplayers`
  ADD PRIMARY KEY (`GamePlayerID`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`GameID`);

--
-- Indexes for table `placings`
--
ALTER TABLE `placings`
  ADD PRIMARY KEY (`PlacingID`);

--
-- Indexes for table `playerplacings`
--
ALTER TABLE `playerplacings`
  ADD PRIMARY KEY (`PlayerPlacingID`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`PlayerID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `statustable`
--
ALTER TABLE `statustable`
  ADD PRIMARY KEY (`StatusTableID`);

--
-- Indexes for table `timervalues`
--
ALTER TABLE `timervalues`
  ADD PRIMARY KEY (`TimerValueID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blindincrement`
--
ALTER TABLE `blindincrement`
  MODIFY `BlindIncrementID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `blinds`
--
ALTER TABLE `blinds`
  MODIFY `BlindID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `buyins`
--
ALTER TABLE `buyins`
  MODIFY `BuyinID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `chips`
--
ALTER TABLE `chips`
  MODIFY `ChipID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `completedblinds`
--
ALTER TABLE `completedblinds`
  MODIFY `CompletedBlindID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `gamebounties`
--
ALTER TABLE `gamebounties`
  MODIFY `GameBountyID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gameplayerbuyin`
--
ALTER TABLE `gameplayerbuyin`
  MODIFY `GamePlayerBuyinID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `gameplayers`
--
ALTER TABLE `gameplayers`
  MODIFY `GamePlayerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `placings`
--
ALTER TABLE `placings`
  MODIFY `PlacingID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `playerplacings`
--
ALTER TABLE `playerplacings`
  MODIFY `PlayerPlacingID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `PlayerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `statustable`
--
ALTER TABLE `statustable`
  MODIFY `StatusTableID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `timervalues`
--
ALTER TABLE `timervalues`
  MODIFY `TimerValueID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma_bookmark`
--

CREATE TABLE IF NOT EXISTS `pma_bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma_column_info`
--

CREATE TABLE IF NOT EXISTS `pma_column_info` (
  `id` int(5) unsigned NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma_history`
--

CREATE TABLE IF NOT EXISTS `pma_history` (
  `id` bigint(20) unsigned NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_navigationhiding`
--

CREATE TABLE IF NOT EXISTS `pma_navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma_pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_recent`
--

CREATE TABLE IF NOT EXISTS `pma_recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma_recent`
--

INSERT INTO `pma_recent` (`username`, `tables`) VALUES
('root', '[{"db":"homegame","table":"gameplayers"},{"db":"homegame","table":"completedblinds"},{"db":"homegame","table":"games"},{"db":"homegame","table":"blindincrement"},{"db":"homegame","table":"timervalues"},{"db":"homegame","table":"playerplacings"},{"db":"homegame","table":"gameplayerbuyin"},{"db":"homegame","table":"players"},{"db":"homegame","table":"placings"},{"db":"homegame","table":"blinds"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma_relation`
--

CREATE TABLE IF NOT EXISTS `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma_savedsearches`
--

CREATE TABLE IF NOT EXISTS `pma_savedsearches` (
  `id` int(5) unsigned NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_coords`
--

CREATE TABLE IF NOT EXISTS `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_info`
--

CREATE TABLE IF NOT EXISTS `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma_table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma_tracking`
--

CREATE TABLE IF NOT EXISTS `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_userconfig`
--

CREATE TABLE IF NOT EXISTS `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma_userconfig`
--

INSERT INTO `pma_userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2015-05-01 04:02:39', '{"collation_connection":"utf8mb4_unicode_ci"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma_usergroups`
--

CREATE TABLE IF NOT EXISTS `pma_usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma_users`
--

CREATE TABLE IF NOT EXISTS `pma_users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma_bookmark`
--
ALTER TABLE `pma_bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma_column_info`
--
ALTER TABLE `pma_column_info`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma_designer_coords`
--
ALTER TABLE `pma_designer_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma_history`
--
ALTER TABLE `pma_history`
  ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma_navigationhiding`
--
ALTER TABLE `pma_navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma_pdf_pages`
--
ALTER TABLE `pma_pdf_pages`
  ADD PRIMARY KEY (`page_nr`), ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma_recent`
--
ALTER TABLE `pma_recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma_relation`
--
ALTER TABLE `pma_relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`), ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma_savedsearches`
--
ALTER TABLE `pma_savedsearches`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma_table_coords`
--
ALTER TABLE `pma_table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma_table_info`
--
ALTER TABLE `pma_table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma_table_uiprefs`
--
ALTER TABLE `pma_table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma_tracking`
--
ALTER TABLE `pma_tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma_userconfig`
--
ALTER TABLE `pma_userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma_usergroups`
--
ALTER TABLE `pma_usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma_users`
--
ALTER TABLE `pma_users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma_bookmark`
--
ALTER TABLE `pma_bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma_column_info`
--
ALTER TABLE `pma_column_info`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma_history`
--
ALTER TABLE `pma_history`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma_pdf_pages`
--
ALTER TABLE `pma_pdf_pages`
  MODIFY `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma_savedsearches`
--
ALTER TABLE `pma_savedsearches`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `webauth`
--
CREATE DATABASE IF NOT EXISTS `webauth` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `webauth`;

-- --------------------------------------------------------

--
-- Table structure for table `user_pwd`
--

CREATE TABLE IF NOT EXISTS `user_pwd` (
  `name` char(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pass` char(32) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_pwd`
--

INSERT INTO `user_pwd` (`name`, `pass`) VALUES
('xampp', 'wampp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_pwd`
--
ALTER TABLE `user_pwd`
  ADD PRIMARY KEY (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

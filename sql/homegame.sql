-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2015 at 10:01 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `homegame`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gameplayerbuyin`
--

INSERT INTO `gameplayerbuyin` (`GamePlayerBuyinID`, `GamePlayerID`, `IsRebuy`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(16, 16, 0, 1, 1, '0000-00-00'),
(17, 14, 0, 1, 1, '0000-00-00'),
(18, 17, 0, 1, 1, '0000-00-00'),
(19, 15, 0, 1, 1, '0000-00-00'),
(20, 13, 0, 1, 1, '0000-00-00'),
(21, 15, 1, 1, 1, '0000-00-00'),
(22, 15, 1, 1, 1, '0000-00-00'),
(23, 15, 1, 1, 1, '0000-00-00');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gameplayers`
--

INSERT INTO `gameplayers` (`GamePlayerID`, `GameID`, `PlayerID`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(13, 2, 2, 1, 1, '0000-00-00'),
(14, 2, 4, 1, 1, '0000-00-00'),
(15, 2, 5, 1, 1, '0000-00-00'),
(16, 2, 12, 1, 1, '0000-00-00'),
(17, 2, 6, 1, 1, '0000-00-00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`GameID`, `Date`, `BlindIncrementID`, `BuyInID`, `EndOfRebuy`, `BeginningStack`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(2, '2015-05-04', 2, 2, NULL, 41500, 1, 1, '0000-00-00');

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
(1, 1, '1ST', '1st', 1, 1, '2015-04-06'),
(2, 2, '2ND', '2nd', 1, 1, '2015-04-06'),
(3, 3, '3RD', '3rd', 1, 1, '2015-04-06'),
(4, 4, '4TH', '4th', 1, 1, '2015-04-06'),
(5, 5, '5TH', '5th', 1, 1, '2015-04-06'),
(6, 6, '6TH', '6th', 1, 1, '2015-04-06'),
(7, NULL, 'CHOP2', 'Split pot between two people', 1, 1, '2015-04-06'),
(8, NULL, 'CHOP3', 'Split pot between three people', 1, 1, '2015-04-06'),
(9, NULL, 'CHOP4', 'Split pot between four people', 1, 1, '2015-04-06'),
(10, NULL, 'CHOP5', 'Split pot between five people', 1, 1, '2015-04-06'),
(11, NULL, 'CHOP6', 'Split pot between six people', 1, 1, '2015-04-06'),
(12, 7, '7TH', '7th', 1, 1, '2015-04-06'),
(13, 8, '8TH', '8th', 1, 1, '2015-04-06'),
(14, 9, '9TH', '9th', 1, 1, '2015-04-06'),
(15, 10, '10TH', '10th', 1, 1, '2015-04-06'),
(16, 11, '11TH', '11th', 1, 1, '2015-04-06'),
(17, 12, '12TH', '12th', 1, 1, '2015-04-06'),
(18, 13, '13TH', '13th', 1, 1, '2015-04-06'),
(19, 14, '14TH', '14th', 1, 1, '2015-04-06'),
(20, 15, '15TH', '15th', 1, 1, '2015-04-06'),
(21, 16, '16TH', '16th', 1, 1, '2015-04-06'),
(22, 17, '17TH', '17th', 1, 1, '2015-04-06'),
(23, 18, '18TH', '18th', 1, 1, '2015-04-06'),
(24, 19, '19TH', '19th', 1, 1, '2015-04-06'),
(25, 20, '20TH', '20th', 1, 1, '2015-04-06');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playerplacings`
--

INSERT INTO `playerplacings` (`PlayerPlacingID`, `GamePlayerID`, `PlacingID`, `PotWinnings`, `Status`, `StatusTableID`, `StatusDate`) VALUES
(1, 16, 5, 0, 1, 1, '0000-00-00'),
(2, 17, 4, 0, 1, 1, '0000-00-00'),
(3, 14, 3, 0, 1, 1, '0000-00-00'),
(4, 15, 2, 0, 1, 1, '0000-00-00'),
(5, 13, 1, 0, 1, 1, '0000-00-00');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
(12, 'Miker', 'Oshea', NULL, NULL, NULL, NULL, 1, 1, '2015-04-11');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
MODIFY `CompletedBlindID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gamebounties`
--
ALTER TABLE `gamebounties`
MODIFY `GameBountyID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gameplayerbuyin`
--
ALTER TABLE `gameplayerbuyin`
MODIFY `GamePlayerBuyinID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `gameplayers`
--
ALTER TABLE `gameplayers`
MODIFY `GamePlayerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `placings`
--
ALTER TABLE `placings`
MODIFY `PlacingID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `playerplacings`
--
ALTER TABLE `playerplacings`
MODIFY `PlayerPlacingID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
MODIFY `PlayerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

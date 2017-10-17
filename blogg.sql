-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 17 okt 2017 kl 15:59
-- Serverversion: 10.1.19-MariaDB
-- PHP-version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `blogg`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `blogg`
--

CREATE TABLE `blogg` (
  `ID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `blogg`
--

INSERT INTO `blogg` (`ID`, `Name`, `UserID`) VALUES
(1, 'maikarma', 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `BloggID` int(100) NOT NULL,
  `PostID` int(11) NOT NULL,
  `IP` int(11) NOT NULL,
  `Message` varchar(256) NOT NULL,
  `Dates` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `comment`
--

INSERT INTO `comment` (`ID`, `BloggID`, `PostID`, `IP`, `Message`, `Dates`) VALUES
(1, 0, 1, 6220, 'banana', '2017-10-13 09:10:21');

-- --------------------------------------------------------

--
-- Tabellstruktur `editcomment`
--

CREATE TABLE `editcomment` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `BloggID` int(11) NOT NULL,
  `Dates` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TextBefore` varchar(256) NOT NULL,
  `TextNew` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `editcomment`
--

INSERT INTO `editcomment` (`ID`, `UserID`, `CommentID`, `BloggID`, `Dates`, `TextBefore`, `TextNew`) VALUES
(1, 2, 1, 1, '2017-10-13 12:11:35', 'test', 'banana');

-- --------------------------------------------------------

--
-- Tabellstruktur `editpost`
--

CREATE TABLE `editpost` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `BloggID` int(11) NOT NULL,
  `Dates` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TextBefore` varchar(256) NOT NULL,
  `TextAfter` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `editpost`
--

INSERT INTO `editpost` (`ID`, `UserID`, `PostID`, `BloggID`, `Dates`, `TextBefore`, `TextAfter`) VALUES
(1, 2, 1, 1, '2017-10-13 10:54:34', 'test', 'herror'),
(2, 2, 1, 1, '2017-10-13 10:56:17', 'herror', 'test'),
(3, 2, 1, 1, '2017-10-13 13:16:01', 'banan', 'test'),
(4, 2, 1, 1, '2017-10-13 13:16:55', '123', 'test'),
(5, 2, 1, 1, '2017-10-13 13:17:12', '123', 'test'),
(6, 2, 1, 1, '2017-10-13 13:19:01', 'testing', 'test'),
(7, 2, 1, 1, '2017-10-13 13:19:26', 'testing', 'test'),
(8, 2, 1, 1, '2017-10-13 13:19:48', 'testing', 'test'),
(9, 2, 1, 1, '2017-10-13 13:19:51', 'testing', 'test'),
(10, 2, 1, 1, '2017-10-13 13:21:08', 'test', 'testing');

-- --------------------------------------------------------

--
-- Tabellstruktur `permission`
--

CREATE TABLE `permission` (
  `BloggID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Post` int(11) NOT NULL,
  `Comment` int(11) NOT NULL,
  `Edit` int(11) NOT NULL,
  `Del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `permission`
--

INSERT INTO `permission` (`BloggID`, `UserID`, `Post`, `Comment`, `Edit`, `Del`) VALUES
(1, 2, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `BloggID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Post` varchar(256) NOT NULL,
  `Dates` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `post`
--

INSERT INTO `post` (`ID`, `BloggID`, `UserID`, `Post`, `Dates`) VALUES
(1, 1, 2, 'testing', '2017-10-13 09:10:15');

-- --------------------------------------------------------

--
-- Tabellstruktur `report`
--

CREATE TABLE `report` (
  `ID` int(11) NOT NULL,
  `BloggID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Prio` int(11) NOT NULL,
  `Url` varchar(256) NOT NULL,
  `Dates` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `report`
--

INSERT INTO `report` (`ID`, `BloggID`, `PostID`, `CommentID`, `UserID`, `Prio`, `Url`, `Dates`) VALUES
(5, 1, 1, 0, 2, 1, 'http://localhost/blogg/blogg/CreateBlogg/Blogg/2/Index.php?bloggID=1', '2017-10-13 13:15:42'),
(6, 1, 1, 1, 2, 1, 'http://localhost/blogg/blogg/CreateBlogg/Blogg/2/Index.php?bloggID=1', '2017-10-13 13:15:55');

-- --------------------------------------------------------

--
-- Tabellstruktur `userinfo`
--

CREATE TABLE `userinfo` (
  `ID` int(11) NOT NULL,
  `IP` varchar(256) NOT NULL,
  `PublicIP` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Username` varchar(256) NOT NULL,
  `Avatar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `userinfo`
--

INSERT INTO `userinfo` (`ID`, `IP`, `PublicIP`, `Email`, `Password`, `Username`, `Avatar`) VALUES
(2, '62.20.62.211', '192.168.216.99', 'test@gmail.com', '$2y$10$UkjaiY103KCst/fQzC2HW.yk9.mYCF7ZpXyUVm6wyuByutPtvmcMu', 'fredan', ''),
(3, '123.456', '654.321', 'hello@gmail.se', 'test', 'test', '');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `blogg`
--
ALTER TABLE `blogg`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `editcomment`
--
ALTER TABLE `editcomment`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `editpost`
--
ALTER TABLE `editpost`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `blogg`
--
ALTER TABLE `blogg`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `editcomment`
--
ALTER TABLE `editcomment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `editpost`
--
ALTER TABLE `editpost`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT för tabell `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `report`
--
ALTER TABLE `report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT för tabell `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

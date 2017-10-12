-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 12 okt 2017 kl 10:23
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

-- --------------------------------------------------------

--
-- Tabellstruktur `editcomment`
--

CREATE TABLE `editcomment` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `Dates` int(11) NOT NULL,
  `TextBefore` varchar(256) NOT NULL,
  `TextNew` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `editpost`
--

CREATE TABLE `editpost` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `Dates` datetime NOT NULL,
  `TextBefore` varchar(256) NOT NULL,
  `TextAfter` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `permission`
--

CREATE TABLE `permission` (
  `BloggID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Message` int(11) NOT NULL,
  `Comment` int(11) NOT NULL,
  `Edit` int(11) NOT NULL,
  `Del` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `test` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `editcomment`
--
ALTER TABLE `editcomment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `editpost`
--
ALTER TABLE `editpost`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `report`
--
ALTER TABLE `report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

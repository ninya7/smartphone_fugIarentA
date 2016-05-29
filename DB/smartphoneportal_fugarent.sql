-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Mai 2016 um 16:44
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `smartphoneportal_fugarent`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertung`
--

CREATE TABLE `bewertung` (
  `idBewertung` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL,
  `Smartphone_idSmartphone` int(11) NOT NULL,
  `Bewertungstext` varchar(255) DEFAULT NULL,
  `Sterne` int(11) DEFAULT NULL,
  `Hilfreich` int(11) DEFAULT NULL,
  `ErstellDatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bewertung`
--

INSERT INTO `bewertung` (`idBewertung`, `User_idUser`, `Smartphone_idSmartphone`, `Bewertungstext`, `Sterne`, `Hilfreich`, `ErstellDatum`) VALUES
(1, 1, 3, 'test bewertungstext', 5, 9, '2016-05-26 11:24:37'),
(2, 1, 3, 'zweiter test', 1, 8, '2016-05-26 11:24:37'),
(3, 1, 4, '4444', 3, 6, '2016-05-28 18:21:42'),
(4, 1, 3, 'TestBewertung number5000', 4, 1, '2016-05-29 12:35:06'),
(5, 1, 3, 'testtt', 0, 0, '2016-05-29 13:17:54'),
(6, 1, 3, 'super handy :)', 0, 0, '2016-05-29 13:18:17'),
(25, 1, 3, 'rrr', 5, 0, '2016-05-29 13:37:31'),
(26, 1, 3, 'rrr', 5, 0, '2016-05-29 13:37:31'),
(27, 1, 3, '333444', 5, 0, '2016-05-29 13:38:34'),
(28, 1, 4, 'suupperr', 4, 0, '2016-05-29 13:49:01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertungs_bewertung`
--

CREATE TABLE `bewertungs_bewertung` (
  `idBewertungs_Bewertung` int(11) NOT NULL,
  `idBewertung` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL,
  `Smartphone_idSmartphone` int(11) NOT NULL,
  `Bewertungstext` varchar(255) NOT NULL,
  `Hilfreich` int(11) NOT NULL,
  `ErstellDatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bewertungs_bewertung`
--

INSERT INTO `bewertungs_bewertung` (`idBewertungs_Bewertung`, `idBewertung`, `User_idUser`, `Smartphone_idSmartphone`, `Bewertungstext`, `Hilfreich`, `ErstellDatum`) VALUES
(1, 1, 1, 3, 'bewertungs_tttt', 6, '2016-05-28 18:05:06'),
(2, 2, 1, 3, 'bewertungs_zweiter', 1, '2016-05-28 18:05:06'),
(3, 1, 1, 3, 'beweertung_ttt3', 3, '2016-05-28 18:09:57'),
(4, 3, 1, 4, 'bewertungstext_ tee', 3, '2016-05-28 18:22:37'),
(19, 3, 1, 4, 'testttjo', 0, '2016-05-29 13:47:45'),
(20, 3, 1, 4, 'dfdfdf', 0, '2016-05-29 13:48:48');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilder`
--

CREATE TABLE `bilder` (
  `idBilder` int(11) NOT NULL,
  `Pfad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bilder`
--

INSERT INTO `bilder` (`idBilder`, `Pfad`) VALUES
(3, './img/bildSmartphone1.jpg'),
(15, './img/bg.jpg'),
(16, './img/bg_164584988.jpg'),
(17, './img/bg_1027631052.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilder_has_smartphone`
--

CREATE TABLE `bilder_has_smartphone` (
  `Bilder_idBilder` int(11) NOT NULL,
  `Smartphone_idSmartphone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bilder_has_smartphone`
--

INSERT INTO `bilder_has_smartphone` (`Bilder_idBilder`, `Smartphone_idSmartphone`) VALUES
(3, 3),
(3, 5),
(15, 46),
(16, 46),
(17, 46),
(15, 46);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `funktypen`
--

CREATE TABLE `funktypen` (
  `idFunktypen` int(11) NOT NULL,
  `Funktypen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `funktypen`
--

INSERT INTO `funktypen` (`idFunktypen`, `Funktypen`) VALUES
(1, '802.11ac'),
(2, '802.11a');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hersteller`
--

CREATE TABLE `hersteller` (
  `idHersteller` int(11) NOT NULL,
  `Hersteller` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `hersteller`
--

INSERT INTO `hersteller` (`idHersteller`, `Hersteller`) VALUES
(1, 'Apple'),
(2, 'Microsoft'),
(5, 'Samsung'),
(6, 'Nokia'),
(7, 'HTC');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `idKategorie` int(11) NOT NULL,
  `Kategorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`idKategorie`, `Kategorie`) VALUES
(3, 'Einsteiger'),
(4, 'Mittelklasse'),
(5, 'High_End');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `session`
--

CREATE TABLE `session` (
  `idSession` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `smartphone`
--

CREATE TABLE `smartphone` (
  `idSmartphone` int(11) NOT NULL,
  `Kategorie_idKategorie` int(11) NOT NULL,
  `Hersteller_idHersteller` int(11) NOT NULL,
  `Bezeichnung` varchar(255) DEFAULT NULL,
  `Beschreibung` varchar(255) NOT NULL,
  `Betriebssystem` varchar(255) DEFAULT NULL,
  `Prozessor` varchar(255) DEFAULT NULL,
  `Sprechzeit` double DEFAULT NULL,
  `Gewicht` double DEFAULT NULL,
  `Displaygroesse` double DEFAULT NULL,
  `Megapixel` double DEFAULT NULL,
  `Preis` double NOT NULL,
  `ErstellDatum` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `smartphone`
--

INSERT INTO `smartphone` (`idSmartphone`, `Kategorie_idKategorie`, `Hersteller_idHersteller`, `Bezeichnung`, `Beschreibung`, `Betriebssystem`, `Prozessor`, `Sprechzeit`, `Gewicht`, `Displaygroesse`, `Megapixel`, `Preis`, `ErstellDatum`) VALUES
(3, 3, 1, 'test bezeichnung', 'test Beschreibung', 'test OS', 'test prozessor', 8, 300, 3, 5, 300, '2016-05-26 11:19:07'),
(4, 4, 7, 'Z3', 'Super Zustand', 'Android', 'iOS', 5, 350, 3, 7, 100, '2016-05-26 14:54:35'),
(5, 5, 1, 'IPHONE S6', 'Das neue IPHONE S6', 'iOS', 'Intel Penitum 3', 9, 400, 3, 8, 9000, '2016-05-26 14:54:35'),
(10, 5, 1, 'e', '1,1,1,1\r\n1,1,1,1,1,1,1,\r\n33333333333333333333\r\n44444444444444444444444444\r\n', 'e', 'e', 1.1, 1.1, 1.1, 1.1, 1.1, '2016-05-28 11:33:20'),
(11, 4, 1, 'r', 'dddd', 'r', 'r', 4, 4, 4, 4, 4, '2016-05-28 11:44:34'),
(12, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 11:45:52'),
(13, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 11:49:04'),
(14, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 11:49:45'),
(15, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 11:51:45'),
(16, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 11:54:48'),
(17, 3, 1, '2', '2', '2', '2', 2, 2, 2, 2, 2, '2016-05-28 11:59:37'),
(18, 3, 1, '2', '2', '2', '2', 2, 2, 2, 2, 2, '2016-05-28 13:30:36'),
(19, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 13:33:34'),
(20, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 13:34:23'),
(21, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 13:51:20'),
(22, 3, 1, '1', '1\r\n1\r\n1\r\n1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 13:53:31'),
(23, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 13:57:57'),
(24, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:00:54'),
(25, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:03:14'),
(26, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:03:34'),
(27, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:13:48'),
(28, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:15:17'),
(29, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:16:43'),
(30, 3, 1, '1', '1\r\n\r\n11\r\n', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:17:04'),
(31, 3, 1, '1', '\r\n11\r\n\r\n\r\n\r\n\r\n', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:18:11'),
(32, 3, 1, '1', '\r\n11\r\n\r\n\r\n\r\n\r\n', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:21:38'),
(33, 3, 1, '1', '1\r\n', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:22:02'),
(34, 3, 1, '1', '1\r\n', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:23:14'),
(35, 3, 1, '1', '1\r\n', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:24:04'),
(36, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:28:49'),
(37, 3, 1, '1', '1\r\n1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:32:11'),
(38, 3, 1, '1', '1\r\n1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:35:13'),
(39, 3, 1, '1', '1\r\n1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:36:39'),
(40, 3, 1, '1', '1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:36:55'),
(41, 3, 1, '1', '1\r\n1', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:42:47'),
(42, 3, 1, '1', '1\r\n1\r\n1\r\n', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 14:44:57'),
(43, 3, 1, '1', '2', '2', '2', 2, 2, 2, 2, 2, '2016-05-28 15:00:19'),
(44, 3, 1, '22', '2\r\n2\r\n2', '2', '2', 2, 2, 2, 2, 2, '2016-05-28 15:03:04'),
(45, 3, 1, '22', '2\r\n2\r\n2', '2', '2', 2, 2, 2, 2, 2, '2016-05-28 15:04:02'),
(46, 3, 1, '1', '1\r\n1\r\n1\r\n', '1', '1', 1, 1, 1, 1, 1, '2016-05-28 15:06:50');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `smartphone_has_funktypen`
--

CREATE TABLE `smartphone_has_funktypen` (
  `Smartphone_idSmartphone` int(11) NOT NULL,
  `Funktypen_idFunktypen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `smartphone_has_funktypen`
--

INSERT INTO `smartphone_has_funktypen` (`Smartphone_idSmartphone`, `Funktypen_idFunktypen`) VALUES
(3, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(44, 1),
(45, 1),
(46, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `Vorname` varchar(255) DEFAULT NULL,
  `Nachname` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Login` varchar(255) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `RegistrierDatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`idUser`, `Vorname`, `Nachname`, `Email`, `Login`, `Password`, `RegistrierDatum`, `Admin`) VALUES
(1, 'testVorname', 'testNachname', 'testmail@mail.de', 'test', 'test', '2016-05-26 11:10:48', NULL),
(2, 'llala', 'lalaaaa', 'lalal', 'lalala', 'lalala', '2016-05-29 14:37:15', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  ADD PRIMARY KEY (`idBewertung`),
  ADD UNIQUE KEY `idBewertung_UNIQUE` (`idBewertung`),
  ADD KEY `fk_Bewertung_User_idx` (`User_idUser`),
  ADD KEY `fk_Bewertung_Smartphone1_idx` (`Smartphone_idSmartphone`);

--
-- Indizes für die Tabelle `bewertungs_bewertung`
--
ALTER TABLE `bewertungs_bewertung`
  ADD PRIMARY KEY (`idBewertungs_Bewertung`),
  ADD UNIQUE KEY `idBewertungs_Bewertung` (`idBewertungs_Bewertung`),
  ADD KEY `fk_Bewertung_User_idx` (`User_idUser`),
  ADD KEY `fk_Bewertung_Smartphone1_idx` (`Smartphone_idSmartphone`);

--
-- Indizes für die Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`idBilder`),
  ADD UNIQUE KEY `idBilder_UNIQUE` (`idBilder`);

--
-- Indizes für die Tabelle `bilder_has_smartphone`
--
ALTER TABLE `bilder_has_smartphone`
  ADD KEY `fk_Bilder_has_Smartphone_Smartphone1_idx` (`Smartphone_idSmartphone`),
  ADD KEY `fk_Bilder_has_Smartphone_Bilder1_idx` (`Bilder_idBilder`);

--
-- Indizes für die Tabelle `funktypen`
--
ALTER TABLE `funktypen`
  ADD PRIMARY KEY (`idFunktypen`),
  ADD UNIQUE KEY `idFunktypen_UNIQUE` (`idFunktypen`);

--
-- Indizes für die Tabelle `hersteller`
--
ALTER TABLE `hersteller`
  ADD PRIMARY KEY (`idHersteller`),
  ADD UNIQUE KEY `idHersteller_UNIQUE` (`idHersteller`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`idKategorie`);

--
-- Indizes für die Tabelle `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`idSession`),
  ADD UNIQUE KEY `idUser_UNIQUE` (`idSession`),
  ADD KEY `fk_Session_User1_idx` (`idUser`);

--
-- Indizes für die Tabelle `smartphone`
--
ALTER TABLE `smartphone`
  ADD PRIMARY KEY (`idSmartphone`),
  ADD UNIQUE KEY `idSmartphone_UNIQUE` (`idSmartphone`),
  ADD KEY `fk_Smartphone_Kategorie1_idx` (`Kategorie_idKategorie`),
  ADD KEY `fk_Smartphone_Hersteller1_idx` (`Hersteller_idHersteller`);

--
-- Indizes für die Tabelle `smartphone_has_funktypen`
--
ALTER TABLE `smartphone_has_funktypen`
  ADD KEY `fk_Smartphone_has_Funktypen_Funktypen1_idx` (`Funktypen_idFunktypen`),
  ADD KEY `fk_Smartphone_has_Funktypen_Smartphone1_idx` (`Smartphone_idSmartphone`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `idUser_UNIQUE` (`idUser`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  MODIFY `idBewertung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT für Tabelle `bewertungs_bewertung`
--
ALTER TABLE `bewertungs_bewertung`
  MODIFY `idBewertungs_Bewertung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `idBilder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT für Tabelle `funktypen`
--
ALTER TABLE `funktypen`
  MODIFY `idFunktypen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `hersteller`
--
ALTER TABLE `hersteller`
  MODIFY `idHersteller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `idKategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `session`
--
ALTER TABLE `session`
  MODIFY `idSession` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `smartphone`
--
ALTER TABLE `smartphone`
  MODIFY `idSmartphone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  ADD CONSTRAINT `fk_Bewertung_Smartphone1` FOREIGN KEY (`Smartphone_idSmartphone`) REFERENCES `smartphone` (`idSmartphone`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bewertung_User` FOREIGN KEY (`User_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `bilder_has_smartphone`
--
ALTER TABLE `bilder_has_smartphone`
  ADD CONSTRAINT `fk_Bilder_has_Smartphone_Bilder1` FOREIGN KEY (`Bilder_idBilder`) REFERENCES `bilder` (`idBilder`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bilder_has_Smartphone_Smartphone1` FOREIGN KEY (`Smartphone_idSmartphone`) REFERENCES `smartphone` (`idSmartphone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `fk_Session_User1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `smartphone`
--
ALTER TABLE `smartphone`
  ADD CONSTRAINT `fk_Smartphone_Hersteller1` FOREIGN KEY (`Hersteller_idHersteller`) REFERENCES `hersteller` (`idHersteller`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Smartphone_Kategorie1` FOREIGN KEY (`Kategorie_idKategorie`) REFERENCES `kategorie` (`idKategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `smartphone_has_funktypen`
--
ALTER TABLE `smartphone_has_funktypen`
  ADD CONSTRAINT `fk_Smartphone_has_Funktypen_Funktypen1` FOREIGN KEY (`Funktypen_idFunktypen`) REFERENCES `funktypen` (`idFunktypen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Smartphone_has_Funktypen_Smartphone1` FOREIGN KEY (`Smartphone_idSmartphone`) REFERENCES `smartphone` (`idSmartphone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

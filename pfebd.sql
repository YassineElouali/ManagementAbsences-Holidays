-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Juillet 2015 à 17:14
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pfebd`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE IF NOT EXISTS `absence` (
  `AID` int(11) NOT NULL,
  `EID` int(11) NOT NULL,
  `AJOUR` date DEFAULT NULL,
  `AMOTIF` varchar(1024) DEFAULT NULL,
  `AETAT` varchar(1024) DEFAULT NULL,
  `ADDA` date DEFAULT NULL,
  PRIMARY KEY (`AID`),
  KEY `FK_ABSENCE_DEMANDEA_EMPLOYE` (`EID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `absence`
--

INSERT INTO `absence` (`AID`, `EID`, `AJOUR`, `AMOTIF`, `AETAT`, `ADDA`) VALUES
(49, 3, '2015-12-30', 'dsqkdjq', 'Justifie', '2015-06-25'),
(50, 3, '2015-12-30', 'dzaedza', 'Justifie', '2015-06-25'),
(54, 3, '2015-06-27', 'dsd', 'Non Justife', '2015-06-27'),
(55, 2, '2015-06-28', 'izei', 'Justifie', '2015-06-27'),
(56, 3, '2015-06-30', 'dk', 'Justifie', '2015-06-27'),
(57, 1, '2015-06-05', 'zi', 'Justifie', '2015-06-27'),
(58, 3, '2015-06-26', 'fdsdhj', 'Justifie', '2015-06-27'),
(59, 3, '2015-07-04', 'cdksjdq', 'Justifie', '2015-06-27'),
(60, 3, '2015-05-07', '8-9', 'Justifie', '2015-06-28'),
(61, 4, '2015-04-08', 'matin', 'Justifie', '2015-06-28'),
(62, 3, '2015-05-20', 'madsqdsq', 'Justifie', '2015-06-28'),
(63, 3, '2015-01-08', 'jdjj', 'Justifie', '2015-06-28'),
(64, 4, '2015-01-07', '1455', 'Justifie', '2015-06-28'),
(65, 3, '2015-01-09', 'ssd', 'Justifie', '2015-06-28'),
(66, 3, '2015-06-17', '4555', 'Non Justifie', '2015-06-28'),
(67, 4, '2015-06-10', 'ldks', 'Non Justifie', '2015-06-28'),
(68, 3, '2015-06-12', 'djsd', 'Non Justifie', '2015-06-29'),
(69, 3, '0000-00-00', 'djdj', 'Justifie', '2015-06-29'),
(70, 3, '2015-06-18', 'fk', 'Non Justifie', '2015-06-29'),
(71, 1, '2015-06-19', '', 'Justifie', '2015-06-29'),
(72, 3, '2015-06-18', 'fk', 'Justifie', '2015-06-29'),
(73, 3, '2015-06-24', 'jgjgjkh', 'Non Justifie', '2015-06-29'),
(74, 3, '2015-06-17', 'klj', 'Non Justifie', '2015-06-29'),
(75, 3, '2015-06-18', 'klj', 'Justifie', '2015-06-29'),
(76, 3, '2015-06-18', 'klj', 'Justifie', '2015-06-29'),
(77, 3, '2015-06-03', 'klj', 'Justifie', '2015-06-29'),
(78, 3, '2015-06-03', 'klj', 'Justifie', '2015-06-29'),
(79, 3, '2015-06-03', '', 'Justifie', '2015-06-29'),
(80, 3, '2015-06-30', '', 'Justifie', '2015-06-30'),
(81, 3, '2015-01-07', 'kszq', 'Non Justifie', '2015-06-30'),
(82, 3, '2015-03-04', 'dsqkjh', 'Non Justifie', '2015-06-30'),
(83, 2, '2015-07-16', '', 'Non Justifie', '2015-06-30'),
(84, 2, '2015-07-25', 'kjhijg', 'Non Justifie', '2015-06-30'),
(85, 2, '2015-07-18', '', 'Non Justifie', '2015-06-30'),
(86, 4, '2015-07-24', 'jhjk', 'Non Justifie', '2015-06-30'),
(87, 3, '2015-06-30', '', 'Justifie', '2015-06-30'),
(88, 3, '2015-06-29', 'kjk', 'Non Justifie', '2015-06-30'),
(89, 2, '2015-08-13', 'jhih', 'Non Justifie', '2015-06-30'),
(90, 3, '2015-06-30', 'malade', 'Justifie', '2015-06-30'),
(91, 1, '2015-10-01', 'hh', 'Non Justifie', '2015-06-30');

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

CREATE TABLE IF NOT EXISTS `conge` (
  `CID` int(11) NOT NULL,
  `EID` int(11) NOT NULL,
  `TCID` int(11) NOT NULL,
  `CJOURD` date DEFAULT NULL,
  `CJOURF` date DEFAULT NULL,
  `CETAT` varchar(1024) DEFAULT NULL,
  `CDDC` date DEFAULT NULL,
  PRIMARY KEY (`CID`),
  KEY `FK_CONGE_DEMANDEC_EMPLOYE` (`EID`),
  KEY `FK_CONGE_ETRE_TYPECONG` (`TCID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `conge`
--

INSERT INTO `conge` (`CID`, `EID`, `TCID`, `CJOURD`, `CJOURF`, `CETAT`, `CDDC`) VALUES
(1, 1, 1, '2020-01-06', '0000-00-00', 'ok', '0000-00-00'),
(4, 1, 1, '0000-00-00', '0000-00-00', 'En Attente', '0000-00-00'),
(29, 1, 1, '2015-06-02', '2015-06-30', 'En attente', '2015-06-02'),
(30, 1, 1, '2015-06-02', '2015-06-30', 'En attente', '2015-06-02'),
(31, 1, 1, '2015-06-03', '2015-06-18', 'En attente', '2015-06-02'),
(32, 1, 12, '2015-06-04', '2015-06-06', 'Refuser', '2015-06-02'),
(33, 1, 12, '2015-06-04', '2015-06-06', 'Refuser', '2015-06-02'),
(34, 1, 1, '2015-06-04', '2015-06-13', 'En attente', '2015-06-03'),
(35, 1, 1, '2015-06-04', '2015-06-19', 'En attente', '2015-06-03'),
(36, 1, 1, '2015-06-04', '2015-06-19', 'En attente', '2015-06-06'),
(38, 1, 11, '2015-06-04', '2015-06-27', 'En attente', '2015-06-08'),
(39, 1, 1, '2015-06-02', '2015-06-18', 'Refuser', '2015-06-09'),
(40, 1, 1, '2015-06-26', '2015-07-24', 'Refuser', '2015-06-09'),
(41, 1, 1, '2015-06-03', '2015-06-25', 'En attente', '2015-06-09'),
(42, 1, 1, '2015-06-04', '2015-06-06', 'Refuser', '2015-06-09'),
(43, 1, 1, '2015-06-03', '2015-07-25', 'En attente', '2015-06-09'),
(44, 1, 1, '2015-06-03', '2015-06-26', 'Refuser', '2015-06-09'),
(45, 1, 1, '2015-06-03', '2015-06-04', 'En attente', '2015-06-09'),
(46, 3, 3, '2015-06-17', '2015-06-26', 'En attente', '2015-06-10'),
(47, 3, 1, '2015-06-03', '2015-06-25', 'Accepter', '2015-06-11'),
(48, 3, 7, '2015-06-03', '2015-06-30', 'Accepter', '2015-06-11'),
(50, 3, 1, '2015-06-03', '2015-07-26', 'Refuser', '2015-06-11'),
(66, 1, 2, '2015-06-10', '2015-06-13', 'Accepter', '2015-06-26'),
(67, 3, 1, '2015-06-03', '2015-06-04', 'Refuser', '2015-06-28'),
(68, 3, 1, '2015-06-03', '2015-06-19', 'Accepter', '2015-06-29'),
(69, 3, 3, '2015-06-10', '2015-06-19', 'Accepter', '2015-06-29'),
(70, 3, 2, '2015-06-04', '2015-06-07', 'Accepter', '2015-06-29'),
(71, 3, 1, '2015-04-28', '2015-05-05', 'En attente', '2015-06-29'),
(72, 3, 2, '2015-07-15', '2015-07-31', 'Accepter', '2015-06-29'),
(73, 3, 1, '2015-04-30', '2015-05-03', 'Accepter', '2015-06-29'),
(74, 1, 1, '2015-06-04', '2015-06-06', 'En attente', '2015-06-29'),
(75, 3, 3, '2015-06-03', '2015-06-04', 'En attente', '2015-06-29'),
(76, 3, 1, '2015-06-03', '2015-06-07', 'Accepter', '2015-06-30');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `EID` int(11) NOT NULL,
  `GID` int(11) NOT NULL,
  `RESID` int(11) DEFAULT NULL,
  `ENOM` varchar(1024) DEFAULT NULL,
  `EPRENOM` varchar(1024) DEFAULT NULL,
  `ETEL` varchar(1024) DEFAULT NULL,
  `EADRESSE` varchar(1024) DEFAULT NULL,
  `EEMAIL` varchar(1024) DEFAULT NULL,
  `EMDP` varchar(1024) DEFAULT NULL,
  `ESALAIRE` decimal(8,2) DEFAULT NULL,
  `EDATER` date DEFAULT NULL,
  `ESOLDE` int(11) DEFAULT NULL,
  PRIMARY KEY (`EID`),
  KEY `FK_EMPLOYE_AVOIR_GRADE` (`GID`),
  KEY `FK_EMPLOYE_AVOIRRR_EMPLOYE` (`RESID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`EID`, `GID`, `RESID`, `ENOM`, `EPRENOM`, `ETEL`, `EADRESSE`, `EEMAIL`, `EMDP`, `ESALAIRE`, `EDATER`, `ESOLDE`) VALUES
(1, 1, NULL, 'ayssami', 'Mahmoud', '066', '92i', 'admin', 'admin', '1500.00', '2015-05-25', 26),
(2, 2, NULL, 'Louriqua', 'Amine', '06666', 'barcelona ', 'chef', 'chef', '50000.00', '2015-06-01', 6),
(3, 3, NULL, 'Omar', 'Omari', '06645', 'Torino', 'employe', 'employe', '15500.00', '2015-05-03', 12),
(4, 2, NULL, 'Ahmed', 'Ali', '0695', 'Rabat', 'jhj', '11', '66.00', '0000-00-00', 1),
(5, 3, NULL, 'Ahmed', 'Omari', '066666', 'Casablanca', 'email@hotmail.com', '145387', '15000.00', '0000-00-00', 0),
(6, 2, NULL, 'nom', 'prenom', '06666', 'adresse', 'email', '0000', '150000.00', '2015-06-30', 30);

-- --------------------------------------------------------

--
-- Structure de la table `empserv`
--

CREATE TABLE IF NOT EXISTS `empserv` (
  `SID` int(11) NOT NULL,
  `EID` int(11) NOT NULL,
  `DATED` date DEFAULT NULL,
  `DATEF` date DEFAULT NULL,
  PRIMARY KEY (`SID`,`EID`),
  KEY `FK_EMPSERV_EMPSERV_EMPLOYE` (`EID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `GID` int(11) NOT NULL,
  `GLIBELLE` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`GID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `grade`
--

INSERT INTO `grade` (`GID`, `GLIBELLE`) VALUES
(1, 'Admin'),
(2, 'Chef de service'),
(3, 'Employe');

-- --------------------------------------------------------

--
-- Structure de la table `jourferier`
--

CREATE TABLE IF NOT EXISTS `jourferier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dat` date NOT NULL,
  `libelle` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `jourferier`
--

INSERT INTO `jourferier` (`id`, `dat`, `libelle`) VALUES
(1, '2015-05-01', 'Fête du travail'),
(2, '2015-01-01', 'Jour de l''an'),
(3, '2015-07-18', 'Aid EL-Fitr'),
(4, '2015-07-30', 'Fête du trône');

-- --------------------------------------------------------

--
-- Structure de la table `notifa`
--

CREATE TABLE IF NOT EXISTS `notifa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ide` int(11) NOT NULL,
  `libelle` varchar(1024) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `notifd`
--

CREATE TABLE IF NOT EXISTS `notifd` (
  `NID` int(11) NOT NULL AUTO_INCREMENT,
  `IDD` int(11) NOT NULL,
  `LIBELLE` varchar(1024) DEFAULT NULL,
  `NTYPE` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`NID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Contenu de la table `notifd`
--

INSERT INTO `notifd` (`NID`, `IDD`, `LIBELLE`, `NTYPE`) VALUES
(9, 0, 'Demande Refuser', 'Conge'),
(11, 1, 'Demande Refuser', 'Conge'),
(12, 1, 'Demande Refuser', 'Conge'),
(13, 1, 'Demande Accepter', 'Conge'),
(14, 2, 'Demande Accepter', 'Absence'),
(15, 2, 'Demande Accepter', 'Absence'),
(16, 2, 'Non Justifie', 'Absence'),
(17, 1, 'Non Justifie', 'Absence'),
(20, 1, 'Justifie', 'Absence'),
(22, 2, 'Justifie', 'Absence'),
(27, 4, 'Non Justifie', 'Absence'),
(28, 4, 'Non Justifie', 'Absence'),
(29, 4, 'Non Justifie', 'Absence'),
(35, 1, 'Justifie', 'Absence'),
(38, 0, '', 'Absence'),
(48, 4, 'Justifie', 'Absence'),
(50, 4, 'Justifie', 'Absence'),
(53, 2, 'Non Justifie', 'Absence'),
(54, 2, 'Non Justifie', 'Absence'),
(55, 2, 'Non Justifie', 'Absence'),
(56, 4, 'Non Justifie', 'Absence'),
(60, 2, 'Non Justifie', 'Absence'),
(61, 3, 'Non Justifie', 'Absence'),
(62, 1, 'Non Justifie', 'Absence');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `NID` int(11) NOT NULL,
  `IDS` int(11) NOT NULL,
  `LIBELLE` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`NID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `SID` int(11) NOT NULL,
  `SLIBELLE` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`SID`, `SLIBELLE`) VALUES
(1, 'eco'),
(2, 'math'),
(3, 'informatqiue'),
(4, 'haha'),
(5, 'hjkjkj'),
(6, 'haha'),
(7, 'haha');

-- --------------------------------------------------------

--
-- Structure de la table `typeconge`
--

CREATE TABLE IF NOT EXISTS `typeconge` (
  `TCID` int(11) NOT NULL,
  `TCLIBELLE` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`TCID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typeconge`
--

INSERT INTO `typeconge` (`TCID`, `TCLIBELLE`) VALUES
(1, 'conge maternite'),
(2, 'conge maladie'),
(3, 'conge annuel'),
(7, 'conge paternite'),
(11, 'conge de longue maladie'),
(12, 'conge pour formation '),
(16, 'conge pour raisons familiales');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `FK_ABSENCE_DEMANDEA_EMPLOYE` FOREIGN KEY (`EID`) REFERENCES `employe` (`EID`);

--
-- Contraintes pour la table `conge`
--
ALTER TABLE `conge`
  ADD CONSTRAINT `FK_CONGE_DEMANDEC_EMPLOYE` FOREIGN KEY (`EID`) REFERENCES `employe` (`EID`),
  ADD CONSTRAINT `FK_CONGE_ETRE_TYPECONG` FOREIGN KEY (`TCID`) REFERENCES `typeconge` (`TCID`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `FK_EMPLOYE_AVOIRRR_EMPLOYE` FOREIGN KEY (`RESID`) REFERENCES `employe` (`EID`),
  ADD CONSTRAINT `FK_EMPLOYE_AVOIR_GRADE` FOREIGN KEY (`GID`) REFERENCES `grade` (`GID`);

--
-- Contraintes pour la table `empserv`
--
ALTER TABLE `empserv`
  ADD CONSTRAINT `FK_EMPSERV_EMPSERV2_SERVICE` FOREIGN KEY (`SID`) REFERENCES `service` (`SID`),
  ADD CONSTRAINT `FK_EMPSERV_EMPSERV_EMPLOYE` FOREIGN KEY (`EID`) REFERENCES `employe` (`EID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

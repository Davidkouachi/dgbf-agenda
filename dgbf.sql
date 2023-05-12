-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 mai 2023 à 21:43
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dgbf`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `id_agent` int NOT NULL AUTO_INCREMENT,
  `np_agent` varchar(300) NOT NULL,
  `tel_agent` varchar(10) NOT NULL,
  `email_agent` text NOT NULL,
  `mdp_agent` text NOT NULL,
  `dirige_agent` varchar(300) DEFAULT NULL,
  `id_hira` int NOT NULL,
  `assiste_agent` varchar(300) DEFAULT NULL,
  `admin_agent` text,
  PRIMARY KEY (`id_agent`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`id_agent`, `np_agent`, `tel_agent`, `email_agent`, `mdp_agent`, `dirige_agent`, `id_hira`, `assiste_agent`, `admin_agent`) VALUES
(14, 'SEKA 2', '123', 'seka2@gmail.com', '202cb962ac59075b964b07152d234b70', 'non', 4, 'oui', 'non'),
(13, 'JUNIOR', '123', 'junior@gmail.com', '202cb962ac59075b964b07152d234b70', 'oui', 4, 'non', 'non'),
(12, 'SEKA', '123', 'seka@gmail.com', '202cb962ac59075b964b07152d234b70', 'non', 2, 'oui', 'non'),
(11, 'KEITA', '123', 'keita@gmail.com', '202cb962ac59075b964b07152d234b70', 'oui', 2, 'non', 'non'),
(10, 'DAVID', '123', 'davidkouachi01@gmail.com', '202cb962ac59075b964b07152d234b70', 'non', 5, 'non', 'non'),
(15, 'CHRIS', '8562', 'chris@gmail.com', '202cb962ac59075b964b07152d234b70', 'oui', 5, 'non', 'oui'),
(16, 'STEV', '12345', 'dav@gmail.com', '202cb962ac59075b964b07152d234b70', 'oui', 3, 'non', 'non'),
(17, 'TTYUYIU', '1234565678', 'KOU@gmail.com', '202cb962ac59075b964b07152d234b70', 'non', 5, 'non', 'non'),
(19, 'CHISTIAN', '9876543', 'chris2@gmail.com', '202cb962ac59075b964b07152d234b70', 'oui', 10, 'non', 'non'),
(20, 'JUNIOR2', '675446', 'junior2@gmail.com', '202cb962ac59075b964b07152d234b70', 'oui', 11, 'non', 'non'),
(21, 'MARKETING', '55564', 'mar@gmail.com', '202cb962ac59075b964b07152d234b70', 'non', 12, 'non', 'non'),
(22, 'EMMANUEL', '3276', 'emma@gmail.com', '202cb962ac59075b964b07152d234b70', 'oui', 6, 'non', 'non'),
(23, 'SOUMAHORO', '123', 'soumsmith1@gmail.com', '202cb962ac59075b964b07152d234b70', 'non', 5, 'non', 'non'),
(24, 'GBANE', '213456', 'gbanedahoud@gmail.com', '202cb962ac59075b964b07152d234b70', 'non', 5, 'non', 'non');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int NOT NULL AUTO_INCREMENT,
  `title_event` varchar(300) NOT NULL,
  `start_event` date NOT NULL,
  `heure_event` time NOT NULL,
  `end_event` date DEFAULT NULL,
  `fin_event` time NOT NULL,
  `color_event` text NOT NULL,
  `id_type_even` int NOT NULL,
  `id_agent` int NOT NULL,
  `description_event` text,
  `ordre_event` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `lieu_event` text NOT NULL,
  `statut_event` varchar(300) NOT NULL,
  `id_hira` int NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_type_even` (`id_type_even`),
  KEY `id_agent` (`id_agent`),
  KEY `id_hira` (`id_hira`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id_event`, `title_event`, `start_event`, `heure_event`, `end_event`, `fin_event`, `color_event`, `id_type_even`, `id_agent`, `description_event`, `ordre_event`, `lieu_event`, `statut_event`, `id_hira`) VALUES
(69, 'AVANCER DE TRAVAIL', '2023-05-05', '14:00:00', '2023-05-05', '16:00:00', 'green', 10, 15, 'EFZAFZEQ', 'AZREAZRFZE', 'ZAFEFGZE', 'en attente', 4),
(68, 'SIGOBE', '2023-05-04', '10:30:00', '2023-05-06', '12:00:00', 'orange', 10, 15, 'rien', 'AVANCER DU TRAVAIL', 'SALLE DE REUNION 20 eime', 'en attente', 11),
(70, 'CcQC', '2023-05-19', '10:00:00', '2023-05-19', '09:30:00', 'orange', 13, 15, 'Cqcq', 'cCcQ', 'Cqc', 'annuler', 5),
(71, 'ffqfq', '2023-05-19', '09:00:00', '2023-05-19', '09:00:00', 'orange', 12, 15, 'fsqfsq', 'fqsfsq', 'fsqfsq', 'annuler', 5),
(72, 'zdadaz', '2023-05-25', '09:30:00', '2023-05-25', '10:00:00', 'orange', 12, 15, 'daz', 'dza', 'daz', 'annuler', 5),
(73, 'szccq', '2023-05-08', '08:30:00', '2023-05-08', '10:00:00', 'orange', 12, 11, 'czzzzz', 'zcZ', 'czCQ', 'annuler', 2),
(74, 'a', '2023-05-06', '10:00:00', '2023-05-06', '10:30:00', 'orange', 12, 15, 'a', 'a', 'a', 'annuler', 5),
(75, 'caze', '2023-05-06', '08:30:00', '2023-05-06', '09:30:00', 'orange', 11, 15, 'azc', 'za', 'cza', 'en attente', 5),
(76, 'azdza', '2023-05-09', '10:00:00', '2023-05-09', '10:00:00', 'orange', 12, 15, 'dza', 'dza', 'dza', 'en attente', 5),
(77, 'dqscq', '2023-05-10', '09:00:00', '2023-05-10', '09:30:00', 'orange', 12, 13, 'cdqs', 'cqd', 'qdc', 'en attente', 4);

-- --------------------------------------------------------

--
-- Structure de la table `heure`
--

DROP TABLE IF EXISTS `heure`;
CREATE TABLE IF NOT EXISTS `heure` (
  `id_heure` int NOT NULL AUTO_INCREMENT,
  `n_heure` time NOT NULL,
  PRIMARY KEY (`id_heure`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `heure`
--

INSERT INTO `heure` (`id_heure`, `n_heure`) VALUES
(1, '08:30:00'),
(2, '09:00:00'),
(3, '09:30:00'),
(4, '10:00:00'),
(5, '10:30:00'),
(6, '11:00:00'),
(7, '11:30:00'),
(8, '12:00:00'),
(9, '14:00:00'),
(10, '14:30:00'),
(11, '15:00:00'),
(12, '15:30:00'),
(13, '16:00:00'),
(14, '16:30:00'),
(18, '13:00:00'),
(17, '12:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

DROP TABLE IF EXISTS `participe`;
CREATE TABLE IF NOT EXISTS `participe` (
  `id_convo` int NOT NULL AUTO_INCREMENT,
  `id_agent` int NOT NULL,
  `id_event` int NOT NULL,
  PRIMARY KEY (`id_convo`),
  KEY `id_agent` (`id_agent`),
  KEY `id_event` (`id_event`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `participe`
--

INSERT INTO `participe` (`id_convo`, `id_agent`, `id_event`) VALUES
(108, 13, 57),
(107, 14, 57),
(106, 11, 57),
(105, 12, 57),
(104, 18, 56),
(103, 17, 56),
(102, 15, 56),
(101, 10, 56),
(100, 10, 55),
(99, 20, 55),
(98, 13, 55),
(97, 14, 55),
(96, 15, 54),
(95, 20, 54),
(94, 13, 54),
(93, 14, 54),
(92, 19, 53),
(91, 15, 53),
(90, 20, 53),
(89, 13, 53),
(88, 14, 53),
(87, 11, 53),
(86, 12, 53),
(109, 10, 59),
(110, 15, 59),
(111, 10, 60),
(112, 15, 60),
(113, 12, 61),
(114, 11, 61),
(115, 14, 61),
(116, 13, 61),
(117, 12, 62),
(118, 11, 62),
(119, 14, 62),
(120, 13, 62),
(121, 20, 62),
(122, 13, 63),
(123, 20, 63),
(124, 15, 63),
(125, 19, 63),
(126, 10, 64),
(127, 10, 65),
(128, 23, 66),
(129, 23, 67),
(130, 10, 68),
(131, 15, 69),
(132, 10, 70),
(133, 15, 70),
(134, 10, 71),
(135, 23, 71),
(136, 10, 72),
(137, 23, 72),
(138, 12, 73),
(139, 15, 73),
(140, 10, 74),
(141, 15, 74),
(142, 10, 75),
(143, 24, 75),
(144, 10, 76),
(145, 24, 76),
(146, 20, 77),
(147, 10, 77);

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

DROP TABLE IF EXISTS `prestation`;
CREATE TABLE IF NOT EXISTS `prestation` (
  `id_pres` int NOT NULL AUTO_INCREMENT,
  `n_pres` text NOT NULL,
  `d_pres` text NOT NULL,
  `id_hira` int NOT NULL,
  `id_heure` int NOT NULL,
  PRIMARY KEY (`id_pres`),
  KEY `id_hira` (`id_hira`),
  KEY `id_heure` (`id_heure`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`id_pres`, `n_pres`, `d_pres`, `id_hira`, `id_heure`) VALUES
(9, 'ECOUTE', 'CNI', 5, 0),
(7, 'CONCEPTION BD', 'cahier de charge', 10, 0),
(8, 'DEVELOPPEMENT DE SITE WEB', 'cahier de charge, 50% du budget', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `prevue`
--

DROP TABLE IF EXISTS `prevue`;
CREATE TABLE IF NOT EXISTS `prevue` (
  `id_pre` int NOT NULL AUTO_INCREMENT,
  `id_heure` int NOT NULL,
  `id_pres` int NOT NULL,
  PRIMARY KEY (`id_pre`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `prevue`
--

INSERT INTO `prevue` (`id_pre`, `id_heure`, `id_pres`) VALUES
(29, 9, 9),
(28, 18, 9),
(5, 1, 7),
(6, 4, 7),
(7, 8, 7),
(8, 1, 8),
(9, 2, 8),
(10, 3, 8),
(11, 4, 8),
(12, 5, 8),
(13, 6, 8),
(27, 17, 9),
(26, 8, 9),
(25, 7, 9),
(30, 10, 9);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id_rdv` int NOT NULL AUTO_INCREMENT,
  `date_rdv` date NOT NULL,
  `heure_rdv` time NOT NULL,
  `date_crea_rdv` datetime NOT NULL,
  `statut_rdv` varchar(300) NOT NULL,
  `id_usager` int NOT NULL,
  `id_pres` int DEFAULT NULL,
  `motif_rdv` text,
  `id_hira` int DEFAULT NULL,
  PRIMARY KEY (`id_rdv`),
  KEY `id_usager` (`id_usager`),
  KEY `id_agent` (`id_pres`),
  KEY `id_heure` (`heure_rdv`),
  KEY `id_hira` (`id_hira`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id_rdv`, `date_rdv`, `heure_rdv`, `date_crea_rdv`, `statut_rdv`, `id_usager`, `id_pres`, `motif_rdv`, `id_hira`) VALUES
(89, '2023-05-09', '11:30:00', '2023-05-08 16:27:55', 'absent', 114, 9, NULL, 5),
(88, '2023-05-09', '12:00:00', '2023-05-08 16:25:04', 'absent', 114, 9, NULL, 5),
(87, '2023-05-07', '12:00:00', '2023-05-05 18:39:46', 'absent', 114, 9, NULL, 5),
(86, '2023-05-06', '08:30:00', '2023-05-05 18:38:26', 'absent', 120, 8, NULL, 5),
(85, '2023-05-07', '09:00:00', '2023-05-05 11:46:45', 'absent', 119, 8, NULL, 5);

-- --------------------------------------------------------

--
-- Structure de la table `structure_administrative`
--

DROP TABLE IF EXISTS `structure_administrative`;
CREATE TABLE IF NOT EXISTS `structure_administrative` (
  `id_hira` int NOT NULL AUTO_INCREMENT,
  `n_hira` text NOT NULL,
  `fax_hira` varchar(300) NOT NULL,
  `tel_hira` varchar(300) NOT NULL,
  `email_hira` varchar(300) NOT NULL,
  `etage_hira` int NOT NULL,
  `porte_hira` int NOT NULL,
  `id_parent` int DEFAULT NULL,
  `id_type_hira` int NOT NULL,
  PRIMARY KEY (`id_hira`),
  KEY `id_parent` (`id_parent`),
  KEY `id_type_hira` (`id_type_hira`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `structure_administrative`
--

INSERT INTO `structure_administrative` (`id_hira`, `n_hira`, `fax_hira`, `tel_hira`, `email_hira`, `etage_hira`, `porte_hira`, `id_parent`, `id_type_hira`) VALUES
(1, 'DIRECTION GENERALE DU BUDGETS ET DES FINANCES', '12345', '12345', 'dgbf.@gmail.com', 0, 0, NULL, 1),
(2, 'DIRECTION DES SYSTEME D\'INFORMATION BUDGETAIRES', '123', '123', 'dsib.@gmail.com', 0, 0, 1, 2),
(3, 'DIRECTION DES TRAITEMENTS INFORMATIQUE', '1234', '1234', 'dti.@gmail.com', 0, 0, 1, 2),
(4, 'SOUS-DIRECTION D\'ETUDE ET DE DEVELOPPEMENT', '12345', '12345', 'sded.@gmail.com', 0, 0, 2, 3),
(5, 'SERVICE DEVELOPPEMENT', '123456', '123456', 'sd.@gmail.com', 19, 11, 4, 4),
(6, 'DIRECTION DES RESOURCES HUMAINES', '1234567', '1234567', 'drh.@gmail.com', 0, 0, 1, 2),
(7, 'SOUS-DIRECTION AFFAIRES ADMINISTRATIF', '12345678', '12345678', 'dsaa.@gmail.com', 0, 0, 6, 3),
(8, 'SERVICE ADMINISTRATIF', '1231', '1231', 'dsa.@gmail.com', 0, 0, 7, 4),
(9, 'SOUS-DIRECTION D\'ETUDE ', '1234', '7845165984612', 'sde.@gmail.com', 0, 0, 3, 3),
(10, 'SERVICE BASE DE DONNEES', '1234567890', '1234567890', 'sbd@gmail.com', 0, 0, 9, 4),
(11, 'SOUS-DIRECTION DES AFFAIRE', '4565765765', '876544', 'sDd@gmail.com', 0, 0, 2, 3),
(12, 'SERVICE MARKETING', '45657657', '76348', 'sm@gmail.com', 0, 0, 11, 4),
(13, 'DIRECTION DE LA SOLDE', '74+9811', '64746', 'ds@gmail.com', 0, 0, 1, 2),
(14, 'DIRECTION DES RESSOURCES HUMAINES', '89654', '789456', 'drh@gmail.com', 1, 5, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_even`
--

DROP TABLE IF EXISTS `type_even`;
CREATE TABLE IF NOT EXISTS `type_even` (
  `id_type_even` int NOT NULL AUTO_INCREMENT,
  `libelle_type_even` varchar(300) NOT NULL,
  PRIMARY KEY (`id_type_even`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_even`
--

INSERT INTO `type_even` (`id_type_even`, `libelle_type_even`) VALUES
(13, 'sortis'),
(12, 'conference'),
(11, 'seminaire'),
(10, 'reunion');

-- --------------------------------------------------------

--
-- Structure de la table `type_hirachie`
--

DROP TABLE IF EXISTS `type_hirachie`;
CREATE TABLE IF NOT EXISTS `type_hirachie` (
  `id_type_hira` int NOT NULL AUTO_INCREMENT,
  `libelle_type_hira` text NOT NULL,
  PRIMARY KEY (`id_type_hira`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_hirachie`
--

INSERT INTO `type_hirachie` (`id_type_hira`, `libelle_type_hira`) VALUES
(1, 'DIRECTION GENERALE'),
(2, 'DIRECTION'),
(3, 'SOUS-DIRECTION'),
(4, 'SERVICE');

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

DROP TABLE IF EXISTS `usager`;
CREATE TABLE IF NOT EXISTS `usager` (
  `id_usager` int NOT NULL AUTO_INCREMENT,
  `np_usager` varchar(300) NOT NULL,
  `email_usager` varchar(300) NOT NULL,
  `tel_usager` varchar(10) NOT NULL,
  `mdp_usager` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id_usager`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `usager`
--

INSERT INTO `usager` (`id_usager`, `np_usager`, `email_usager`, `tel_usager`, `mdp_usager`) VALUES
(92, 'DSQDF', 'david@gmail.com', 'zarzarz', ''),
(91, 'DAVID2', 'davidkouachi01@gmail.com', '123456', ''),
(90, 'DAVID', 'david@gmail.com', '123456', ''),
(89, 'DAVID', 'davidkouachi01@gmail.com', '123456', ''),
(88, 'DAVID2', 'david@gmail.com', 'zarzarz', ''),
(87, 'ZADZA', 'david@gmail.com', 'zarzarz', ''),
(86, 'DAVID2', 'david@gmail.com', 'zarzarz', ''),
(85, 'AAAA', 'david@gmail.com', 'zarzarz', ''),
(84, 'DAVID2', 'david@gmail.com', 'zarzarz', ''),
(83, 'DAVID2', 'david@gmail.com', 'zarzarz', ''),
(82, 'DSQDF', 'david@gmail.com', '123456GR', ''),
(81, 'SASDQDQS', 'davidkouachi01@gmail.com', '123456', ''),
(80, 'AAAA', 'david@gmail.com', 'azert', ''),
(79, 'AAAA', 'david@gmail.com', 'azert', ''),
(78, 'AAAA', 'david@gmail.com', 'azert', ''),
(77, 'ZADZA', 'david@gmail.com', 'zarzarz', ''),
(76, 'AAAA', 'david@gmail.com', 'zarzarz', ''),
(75, 'DAVID', 'davidkouachi01@gmail.com', '123456', ''),
(93, 'DA', 'zda@gmail.com', '43453', ''),
(94, 'DA', 'zda@gmail.com', '43453', ''),
(95, 'DA', 'zda@gmail.com', '43453', ''),
(96, 'DAECF', 'zda@gmail.com', '43453', ''),
(98, 'DAECF', 'zda@gmail.com', '43453', ''),
(99, 'DAECF', 'zda@gmail.com', '43453', ''),
(100, 'DAECF', 'zda@gmail.com', '43453', ''),
(101, 'DAECF', 'zda@gmail.com', '43453', ''),
(102, 'DA', 'zda@gmail.com', '43453', ''),
(103, 'DAECF', 'zda@gmail.com', '43453', ''),
(104, 'DAECF', 'zda@gmail.com', '43453', ''),
(105, 'DA', 'zda@gmail.com', '43453', ''),
(106, 'DAVID KOUACHI', 'david@gmail.com', '0885782723', ''),
(107, 'DAVID KOUACHI', 'zda@gmail.com', '0885782723', ''),
(108, 'DAVIDKOUACHI01@GMAIL.COM', 'davidkouachi01@gmail.com', '43453', ''),
(109, 'DAVID KOUACHI', 'davidkouachi01@gmail.com', '43453', ''),
(110, 'DAVID KOUACHI', 'davidkouachi01@gmail.com', '0885782723', ''),
(111, 'DAVID', 'davidkouachi01@gmail.com', '21645', ''),
(112, 'DAVID', 'davidkouachi01@gmail.com', '21645', ''),
(113, 'DAVID', 'davidkouachi01@gmail.com', '21645', ''),
(114, 'd', 'davidkouachi01@gmail.com', '54+6', '202cb962ac59075b964b07152d234b70'),
(115, 'd', 'd@gmail.com', '546', '202cb962ac59075b964b07152d234b70'),
(116, 'DAVID', 'davidkouachi01@gmail.com', '21645', NULL),
(117, 'DAVID', 'davidkouachi01@gmail.com', '21645', NULL),
(118, 'DAVID', 'davidkouachi01@gmail.com', '21645', NULL),
(119, 'DAVID', 'davidkouachi01@gmail.com', '21645', NULL),
(120, 'DAVID', 'davidkouachi01@gmail.com', '21645', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

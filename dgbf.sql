-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 26 mai 2023 à 05:49
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

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
(10, 'DAVID', '123', 'davidkouachi01@gmail.com', '202cb962ac59075b964b07152d234b70', 'non', 5, 'non', 'oui'),
(15, 'CHRIS', '8562', 'chris@gmail.com', '202cb962ac59075b964b07152d234b70', 'oui', 5, 'non', 'oui'),
(16, 'STEV', '12345', 'dav@gmail.com', '202cb962ac59075b964b07152d234b70', 'oui', 3, 'non', 'non'),
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
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id_event`, `title_event`, `start_event`, `heure_event`, `end_event`, `fin_event`, `color_event`, `id_type_even`, `id_agent`, `description_event`, `ordre_event`, `lieu_event`, `statut_event`, `id_hira`) VALUES
(79, 'SIGOBE', '2023-05-25', '08:30:00', '2023-05-27', '10:00:00', 'green', 12, 15, 'RIEN', 'AVANCER DU TRAVAI QUI A ETE DEMANDER', 'SALLE DE REUNION 18', 'en attente', 5),
(78, 'SIGOBE', '2023-05-24', '11:00:00', '2023-05-24', '12:00:00', 'orange', 10, 15, 'rien', 'Avancer du travail ', 'salle de reunion', 'en attente', 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `participe`
--

INSERT INTO `participe` (`id_convo`, `id_agent`, `id_event`) VALUES
(151, 15, 79),
(150, 10, 79),
(149, 15, 78),
(148, 10, 78),
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
  PRIMARY KEY (`id_pres`),
  KEY `id_hira` (`id_hira`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `usager`
--

INSERT INTO `usager` (`id_usager`, `np_usager`, `email_usager`, `tel_usager`, `mdp_usager`) VALUES
(127, 'DAVID KOUACHI', 'davidkouachi01@gmail.com', '0585782723', NULL),
(126, 'DAVID KOUACHI', 'davidkouachi01@gmail.com', '0585782723', NULL),
(125, 'DAVID KOUACHI', 'davidkouachi01@gmail.com', '0585782723', NULL),
(124, 'DAVID KOUACHI', 'davidkouachi01@gmail.com', '0585782723', NULL),
(123, 'david kouachi', 'davidkouachi01@gmail.com', '0585782723', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

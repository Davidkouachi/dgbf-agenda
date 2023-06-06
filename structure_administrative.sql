-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 15 mai 2023 à 21:33
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

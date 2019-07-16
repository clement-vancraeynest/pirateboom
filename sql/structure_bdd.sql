-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 16 juil. 2019 à 16:44
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pirateboom`
--

-- --------------------------------------------------------

--
-- Structure de la table `pb_game`
--

DROP TABLE IF EXISTS `pb_game`;
CREATE TABLE IF NOT EXISTS `pb_game` (
  `id_game` int(11) NOT NULL AUTO_INCREMENT,
  `board_game` varchar(100) NOT NULL DEFAULT '0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000',
  `order_game` int(11) DEFAULT NULL,
  `state_game` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_game`),
  KEY `order_game` (`order_game`),
  KEY `state_game` (`state_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pb_player`
--

DROP TABLE IF EXISTS `pb_player`;
CREATE TABLE IF NOT EXISTS `pb_player` (
  `id_player` int(11) NOT NULL AUTO_INCREMENT,
  `life_player` int(11) NOT NULL DEFAULT '0',
  `energy_player` int(11) NOT NULL DEFAULT '0',
  `position_player` int(11) NOT NULL DEFAULT '0',
  `order_player` int(11) DEFAULT NULL,
  `idgame_player` int(11) DEFAULT NULL,
  `iduser_player` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_player`),
  KEY `life_player` (`life_player`),
  KEY `energy_player` (`energy_player`),
  KEY `position_player` (`position_player`),
  KEY `order_player` (`order_player`),
  KEY `iduser_player` (`iduser_player`),
  KEY `idgame_player` (`idgame_player`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pb_user`
--

DROP TABLE IF EXISTS `pb_user`;
CREATE TABLE IF NOT EXISTS `pb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(300) NOT NULL DEFAULT '',
  `email_user` varchar(300) NOT NULL DEFAULT '',
  `password_user` varchar(512) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `name_user` (`name_user`),
  UNIQUE KEY `email_user` (`email_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pb_player`
--
ALTER TABLE `pb_player`
  ADD CONSTRAINT `pb_player_ibfk_1` FOREIGN KEY (`iduser_player`) REFERENCES `pb_user` (`id_user`),
  ADD CONSTRAINT `pb_player_ibfk_2` FOREIGN KEY (`idgame_player`) REFERENCES `pb_game` (`id_game`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

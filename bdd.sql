-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Décembre 2016 à 15:31
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `siteutilisateur`
--
CREATE DATABASE IF NOT EXISTS `siteutilisateur` DEFAULT CHARACTER SET latin1 COLLATE latin1_bin;
USE `siteutilisateur`;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `nom` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mail` varchar(70) COLLATE latin1_bin NOT NULL,
  `telephone` varchar(15) COLLATE latin1_bin NOT NULL,
  `motDePasse` varchar(50) COLLATE latin1_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`nom`, `prenom`, `mail`, `telephone`, `motDePasse`) VALUES
('lantonnetm', 'david', 'david.lantonnet@viacesi.fr', '0643578056', 'motdepasse'),
('personne', 'personne', 'jemappelpersonne@orange.fr', '0240505608', 'personne'),
('JeanPierre', 'Cristian', 'cjeanpierre@aol.com', '0203040506', 'motdepasse'),
('GunBlow', 'Maxime', 'mlantonnet@hotmail.fr', '0643807090', 'motdepasse');
--
-- Base de données :  `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

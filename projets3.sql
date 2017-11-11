-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 11 nov. 2017 à 18:22
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projets3`
--

-- --------------------------------------------------------

--
-- Structure de la table `enigme`
--

CREATE TABLE `enigme` (
  `enigme_id` int(11) NOT NULL,
  `enigme_nom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `enigme_description` text COLLATE utf8_bin,
  `enigme_image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `enigme_response` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `enigme`
--

INSERT INTO `enigme` (`enigme_id`, `enigme_nom`, `enigme_description`, `enigme_image`, `enigme_response`) VALUES
(1, 'enigme1', 'desc1', 'enigme1', 'completed'),
(2, 'enigme2', 'desc2', 'enigme2', 'completed'),
(3, 'enigme3', 'desc3', 'enigme3', 'completed'),
(4, 'enigme4', 'desc4', 'enigme4', 'completed'),
(5, 'enigme5', 'desc5', 'enigme5', 'completed'),
(6, 'enigme6', 'desc6', 'enigme6', 'completed'),
(7, 'enigme7', 'desc7', 'enigme7', 'completed'),
(8, 'enigme8', 'desc8', 'enigme8', 'completed'),
(9, 'enigme9', 'desc9', 'enigme9', 'completed'),
(10, 'enigme10', 'desc10', 'enigme10', 'completed'),
(11, 'enigme11', 'desc11', 'image11', 'completed');

-- --------------------------------------------------------

--
-- Structure de la table `resoudre`
--

CREATE TABLE `resoudre` (
  `user_id` int(11) NOT NULL,
  `enigme_id` int(11) NOT NULL,
  `user_score` int(11) DEFAULT NULL,
  `user_attempts` int(11) DEFAULT NULL,
  `user_spentime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_mail` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_blocked` tinyint(1) DEFAULT '0',
  `user_bantil` datetime DEFAULT NULL,
  `user_admin` tinyint(1) DEFAULT '0',
  `user_coattempts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_mail`, `user_blocked`, `user_bantil`, `user_admin`, `user_coattempts`) VALUES
(6, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin@fermededidier.fr', 0, NULL, 2, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `enigme`
--
ALTER TABLE `enigme`
  ADD PRIMARY KEY (`enigme_id`);

--
-- Index pour la table `resoudre`
--
ALTER TABLE `resoudre`
  ADD PRIMARY KEY (`user_id`,`enigme_id`),
  ADD KEY `FK_resoudre_enigme_id` (`enigme_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `enigme`
--
ALTER TABLE `enigme`
  MODIFY `enigme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `resoudre`
--
ALTER TABLE `resoudre`
  ADD CONSTRAINT `FK_resoudre_enigme_id` FOREIGN KEY (`enigme_id`) REFERENCES `enigme` (`enigme_id`),
  ADD CONSTRAINT `FK_resoudre_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

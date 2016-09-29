-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 29 Septembre 2016 à 10:28
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boatdatabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `boats`
--

CREATE TABLE `boats` (
  `id_boat` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `user_id_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `boats`
--

INSERT INTO `boats` (`id_boat`, `name`, `type`, `user_id_FK`) VALUES
(16, 'toto', 'toto', 4),
(56, 'Post Tenebras Luxury', 'Luxury yacht', 1),
(59, 'NoEscape', 'Langschiff', 2),
(64, 'Wind', 'Motorboat', 2),
(66, 'Tuna Boat', 'Fishing boat', 1),
(67, 'Speedo', 'Catamaran', 2),
(69, 'Hover my Lover', 'Hovercraft', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user_PK` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user_PK`, `username`, `password`) VALUES
(1, 'Davyjones666', '$2y$10$nBfLpgDkKCJG7hcLisLvHuAlG3el6nox/XjjIEBt84gq14fbtdT4m'),
(2, 'Lechuck2016', '$2y$12$Eb0WjTXX/GREcp8Q3l61GO0RFzKD7P5.NHKW8MGUe8TYvup8FjXtC');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `boats`
--
ALTER TABLE `boats`
  ADD PRIMARY KEY (`id_boat`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user_PK`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `boats`
--
ALTER TABLE `boats`
  MODIFY `id_boat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

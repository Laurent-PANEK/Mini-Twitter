-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 19 Novembre 2017 à 18:20
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mini_twitter`
--

-- --------------------------------------------------------

--
-- Structure de la table `tweets`
--

CREATE TABLE `tweets` (
  `id` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `value` varchar(280) NOT NULL,
  `published_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `tweets`
--

INSERT INTO `tweets` (`id`, `id_user`, `value`, `published_at`) VALUES
(1, 1, 'Mon premier mini-tweet !', '2017-11-19 19:14:43'),
(2, 2, 'Je suis un admin pas trÃ¨s secu !', '2017-11-19 19:15:21'),
(3, 3, 'Les identifiants sont identiques au nom d\'utilisateur !\r\n', '2017-11-19 19:16:44'),
(4, 2, 'Trouver le miens !', '2017-11-19 19:17:32'),
(5, 2, 'Je suis un admin donc je suis pas la rÃ¨gle des utilisateurs !', '2017-11-19 19:18:17'),
(6, 1, 'Mais c\'est quand mÃªme facile Ã  trouver =)', '2017-11-19 19:19:03'),
(7, 3, 'Bonne chance !', '2017-11-19 19:19:22');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES
(1, 'Toto', '$2y$10$sOcl0CvCZ.8/TNfuk9enMOxfswt73d8d3oinwE0Rf.DFVnqrAPlnO', 'toto@gmail.com'),
(2, 'Admin', '$2y$10$RmXyvpoa0kPpFRi4lofe5uwc6CgyargFzrokVnMnEdJlsJ1cjx/Di', 'adel@gmail.com'),
(3, 'Lambda', '$2y$10$0MHfhjcnQfkCVcFRKWDe6.7apSFkZFP5bsNbUKX0w/bLI53MWQzn6', 'a@a.fr');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

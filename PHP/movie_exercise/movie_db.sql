-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 05 mai 2022 à 11:13
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `movie_db`
--
CREATE DATABASE IF NOT EXISTS `movie_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `movie_db`;

-- --------------------------------------------------------

--
-- Structure de la table `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nationality` enum('USA','Luxembourg','France','Italy') DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `directors`
--

INSERT INTO `directors` (`id`, `name`, `nationality`, `birth_date`, `picture`) VALUES
(1, 'David Fincher', 'USA', '1971-07-07', 'https://m.media-amazon.com/images/M/MV5BMTc1NDkwMTQ2MF5BMl5BanBnXkFtZTcwMzY0ODkyMg@@._V1_.jpg'),
(2, 'George Lucas', 'USA', '1962-07-18', 'https://fr.web.img6.acsta.net/pictures/15/12/18/10/51/568937.jpg'),
(4, 'Steven Spielberg', 'USA', '2010-07-16', 'https://fr.web.img5.acsta.net/pictures/16/05/17/11/39/453609.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `director_id` int(11) NOT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `views`, `director_id`, `poster`) VALUES
(4, 'Star Wars 2', 42345234, 2, 'https://cdn.europosters.eu/image/1300/posters/star-wars-classic-i97850.jpg'),
(13, 'Indiana Jones', 234923, 4, 'https://m.media-amazon.com/images/I/81UOBSDQh0L._AC_SL1500_.jpg'),
(15, 'Jaws', 45000, 4, 'https://media.services.cinergy.ch/media/box1600/41a9eb14ac3de95520510ef0d3c750c578f8c89c.jpg'),
(18, 'Fight Club', 87878797, 1, 'https://img.fruugo.com/product/0/08/14290080_max.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `picture`) VALUES
(2, 'simoon', 'simon@gmail.com', '$2y$10$Tf9VtM7/JBUJ0WCNVyeQDeYxyyl9S2O7AHDtuKbLRnU2jlq1ikyk2', ''),
(3, 'peteer', 'peter@gmail.com', '$2y$10$AJJMtcmILbQGzG1mDzowE.DgID12QYtr0DhtBFobL5dAJapuy7U.6', 'peteer.png'),
(4, 'banana', 'banana@gmail.com', '$2y$10$iYSAqP8ahAGNO2Qxje.vfOscg0B9aE8hFStIlFOpbXhoa2Yf31xqq', 'banana.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `director_id` (`director_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

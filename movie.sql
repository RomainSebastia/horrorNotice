-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 avr. 2023 à 22:51
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `movie`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `profile_picture_url` varchar(255) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_movie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_users`, `id_movie`) VALUES
(33, 14, 16),
(35, 14, 15);

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `release_date` date NOT NULL,
  `actors_actresses` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `title`, `release_date`, `actors_actresses`, `duration`, `image_url`, `genre`, `description`, `created_at`) VALUES
(9, 'g', '2023-04-15', 'sdqfdsqf', 123, 'data/uploadsImgFilm/6442ccfd01393.jpg', 'sqdfsdf', 'sdfsdfdsfdsf', '2023-04-20 13:47:38'),
(15, 'patate', '2023-04-14', 'swdfvcx', 132, 'data/uploadsImgFilm/64419939d3662.png', 'xwcvxcvx', 'wxcvcxwv', '2023-04-20 19:10:02'),
(16, 'chucky', '2023-04-21', 'dfgdf', 123, 'data/uploadsImgFilm/64419982699df.jpg', 'gsdfg', 'sdfgdsfg', '2023-04-20 19:11:09'),
(18, 'eee', '2023-04-07', 'gg', 1, 'data/uploadsImgFilm/6442be224f4ae.jpg', 'rrr', 'GGG', '2023-04-21 16:47:30'),
(19, 'ff', '2023-04-20', 'eee', 1, 'data/uploadsImgFilm/6442c9be95891.jpg', 'eee', 'HH', '2023-04-21 17:37:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_picture_url` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_picture_url`, `is_admin`, `password`) VALUES
(2, 'Zaza', 'za@hotmail.com', 'data/uploadsImgUser/643fbf5736c5f.jpg', 0, '$2y$10$nufR.EOHGNV.VZ3VI7Wh9eAQ1q00hM2F2MZa1aR1a1N.9o3ytN3dG'),
(3, 'Romain', '', NULL, 0, ''),
(4, 'romain', 'ro@hotmail.com', NULL, 0, '$2y$10$G.pbxuZ8FXCjrWCMvuM8F.6CTFXAFV9gslvhrXRl9JynNJcEHGrMe'),
(5, 'ZAZA', 'zaza@hotmail.fr', NULL, 0, '$2y$10$HVNFAU9PDLSCIB67RN/REeeQw/iYHRUSpWsT7AMQpngHQ/UNn8tm2'),
(8, 'hydra le chat', 'hydra@hotmail.com', NULL, 0, '$2y$10$Bl0/CBoLjCcIAItd5vn4VO2NbK5446hyKriNShADVT3eHRzZVv/j.'),
(14, 'plop', 'plop@plop.com', 'data/uploadsImgUser/64426559b8e94.jpg', 1, '$2y$10$zN6jg9M0DN6G8zZIvZZ9IOIW9P0SztNCm8M.w0ud0nEdlG1KuJ.Y6'),
(15, 'zazaza', 'ra@hotmail.com', 'data/uploadsImgUser/6442b3f5c05a3.jpg', 1, '$2y$10$ZMSLEcC.nGbVUTzJgG.q4eNQCz9VW5.d8QjJ/dloAHeZlmeHJUbjm'),
(16, 'saza', 'xs@hotmail.com', '', 0, '$2y$10$Xm8wfVL02anUDaIcCpJSie.Cd8IRhObhorTV87dAqAk08NXbmAoZq'),
(17, 'de', 'saka@hotmail.com', '', 0, '$2y$10$7cQg2ahrgfdUMH9GL5972.tMQvMpz9zeVpKithSFOCcrlcE79TfIm');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_ibfk_1` (`id_users`),
  ADD KEY `likes_ibfk_2` (`id_movie`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

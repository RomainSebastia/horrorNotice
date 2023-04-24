-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 avr. 2023 à 22:53
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
  `surname` varchar(50) DEFAULT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `surname`, `message`) VALUES
(1, 'robert', 'robert@hotmail.com', 'lafondue', 'Aujourd&#039;hui il fais beau j&#039;aime bien le beau temps bonne journée aurevoir ! '),
(2, 'z', 'robert@hotmail.com', 'z', '&lt;script&gt;alert(&#039;hello)&lt;/script&gt;'),
(3, 'za', 'z@hotmail.com', 'z', 'aujourd&#039;hui il fais beau! &lt;br&gt;'),
(4, 'za', 'sa@hotmail.com', 'za', 'aujourd&#039;hui'),
(5, 'a', 'r@hotmail.com', 's', 'aujourd\'hui'),
(6, 'a', 'r@hotmail.com', 's', 'aujourd\'hui <script>console.log(\'hello)</script'),
(7, 'yoyo', 'plop@plop.com', 'prg', 'ksdpokfhsqdljflkdsfldsqmlfjdsf'),
(8, 'rr', 'e@hotmail.com', 'rrr', '{');

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
(50, 15, 22),
(51, 15, 23),
(52, 18, 21),
(53, 18, 22),
(54, 18, 23),
(55, 18, 24),
(58, 15, 32),
(59, 15, 28),
(60, 15, 24),
(61, 15, 27),
(62, 15, 21),
(63, 2, 21);

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
(21, 'La Poupée du mal', '2019-06-21', 'Gabriel Bateman, Audrey Plaza, Mark Hamill, Brian Tyree Henry,Tim Matheson', 90, 'data/uploadsImgFilm/64454a74c7351.jpg', 'Slasher/Action ', 'Chucky est un film d\'horreur américain réalisé par Lars Klevberg. Il s\'agit d\'un remake du film de 1988 \"Jeu d\'enfant\". L\'histoire suit une mère célibataire qui offre une poupée Buddi à son fils pour son anniversaire. La poupée est dotée d\'une intelligence artificielle avancée, mais elle commence à se comporter de manière violente et à terroriser la famille. Le film met en vedette Aubrey Plaza, Gabriel Bateman, Brian Tyree Henry et Mark Hamill en tant que voix de Chucky.', '2023-04-22 19:38:50'),
(22, 'Smile', '2022-09-28', 'Sosie Bacon, Caitlin Stasey, Kyle Gallner, Jessie Usher', 115, 'data/uploadsImgFilm/644473367a5dc.jpeg', 'Horreur/Horreur psychologique', 'Après avoir été témoin d\'un incident étrange et traumatisant impliquant un patient, la Dr Rose Cotter commence à vivre des événements effrayants qu\'elle ne peut expliquer. Alors qu\'une terreur écrasante commence à s\'emparer de sa vie, Rose doit affronter son passé troublant afin de survivre et d\'échapper à sa nouvelle réalité horrifiante.', '2023-04-22 19:53:16'),
(23, 'Amytyville', '2017-09-20', 'Bella Thorne, Jennifer Jason Leigh, Cameron Monaghan, Mckenna Grace', 85, 'data/uploadsImgFilm/644473ea0c3df.jpg', 'Horreur/Thriller', 'L\'histoire suit une mère, Joan, qui emménage avec ses enfants, Belle et Juliet, dans une nouvelle maison à Amityville, dans l\'espoir de donner un nouveau départ à leur vie. Cependant, ils découvrent rapidement que leur maison est hantée par des forces maléfiques qui ont causé la mort de la famille précédente.\r\n\r\nLe film met en vedette Jennifer Jason Leigh dans le rôle de Joan, Bella Thorne dans le rôle de Belle et Cameron Monaghan dans le rôle de James. Il a reçu des critiques mitigées de la part des critiques de cinéma et n\'a pas été un succès commercial.', '2023-04-22 19:58:27'),
(24, 'Evil Dead Rise', '2023-04-19', 'Allysa Sutherland, Lily Sullivan, Morgana Davies, Mia Challis', 96, 'data/uploadsImgFilm/6444740ed1df6.jpg', 'Horreur/Fantasy', 'Le film est le quatrième volet de la franchise Evil Dead et se déroule dans une ville américaine contemporaine. L\'histoire suit deux sœurs, interprétées par Alyssa Sutherland et Lily Sullivan, qui se retrouvent piégées dans un immeuble abandonné où elles doivent affronter une horde de démons assoiffés de sang. Le film promet d\'être une expérience intense et terrifiante pour les fans de la franchise.', '2023-04-22 20:04:03'),
(25, 'Hérédité', '2018-06-08', 'Toni Collette, Alex Wolff, Milly Shapiro, Gabriel Byrne, Ann Dowd', 126, 'data/uploadsImgFilm/6444744109904.jpg', 'Horreur/Drame', 'L\'histoire suit la famille Graham, qui commence à découvrir des secrets sombres sur leur arbre généalogique après la mort de leur grand-mère solitaire. Alors que la famille plonge dans le deuil, des événements étranges et effrayants commencent à se produire autour d\'eux, et ils commencent à réaliser que leur mère et grand-mère décédée leur a légué un héritage diabolique.\r\n\r\nLe film explore les thèmes de l\'hérédité, de la folie et du deuil, et est connu pour ses scènes choquantes, ses images graphiques et sa tension psychologique constante. Les performances des acteurs, en particulier celle de Toni Collette, qui joue le rôle de la mère, ont été largement saluées. Le film a reçu des critiques élogieuses de la part des critiques pour sa narration complexe et sa mise en scène impressionnante, en faisant l\'un des films d\'horreur les plus acclamés des dernières années.', '2023-04-22 20:13:58'),
(26, 'Conjuring 3', '2021-06-09', 'Vera Farminga, Patrick Wilson, Sarah Catherine, Ruairi Connor', 112, 'data/uploadsImgFilm/64445c2602900.jpg', 'Horreur/Thriller', 'The Conjuring 3: The Devil Made Me Do est le troisième film de la franchise \"Conjuring\". Il suit Ed et Lorraine Warren alors qu\'ils enquêtent sur un cas de possession et de meurtre présumé. Le film est basé sur une histoire vraie, connue sous le nom d\'affaire d\'Arne Cheyenne Johnson.\r\n\r\nLe film se concentre sur l\'affaire judiciaire d\'Arne Johnson, qui a affirmé avoir été possédé par un démon au moment où il a tué son propriétaire. Les Warrens ont été impliqués dans l\'affaire pour prouver la possession démoniaque et pour aider à défendre Johnson au tribunal.\r\nComme les autres films de la franchise, \"The Conjuring 3\" est connu pour ses scènes d\'horreur efficaces et ses personnages bien développés. Il a été réalisé par Michael Chaves et est sorti en juin 2021.', '2023-04-22 20:21:50'),
(27, 'The Grudge', '2004-02-05', 'Sarah Michelle, Jason Behr, Clea Duvall, Bill Pullman', 92, 'data/uploadsImgFilm/6444747410623.jpg', 'Horreur/Thriller', 'Le film d\'horreur américain intitulé \"The Grudge\" a été réalisé par Takashi Shimizu. Il est également connu sous le nom de \"Ju-On\" au Japon, pays d\'origine du réalisateur.\r\n\r\nL\'histoire tourne autour d\'une malédiction qui hante une maison après qu\'un homme ait tué sa famille dans des circonstances horribles. Les personnes qui entrent dans la maison sont confrontées à des manifestations surnaturelles terrifiantes qui les poursuivent et les tourmentent jusqu\'à leur mort.\r\n\r\nLe titre en français est \"The Grudge : L\'Héritage\" et il est sorti en 2020. Ce film est une suite de la série de films \"The Grudge\", qui est basée sur la même histoire de la malédiction.', '2023-04-22 20:38:07'),
(28, 'Scream 6', '2023-03-08', 'Jenna Ortega, Melissa Barrera, Jack Champion, Hayden Panettiere', 123, 'data/uploadsImgFilm/644474afe749d.jpg', 'Horreur/Slasher', 'Après des années de calme relatif, la petite ville de Woodsboro est une fois de plus secouée par une série de meurtres brutaux. Les victimes semblent toutes liées à l\'histoire tragique de la ville, qui remonte à plusieurs décennies.\r\n\r\nL\'enquête est confiée à une nouvelle équipe de policiers, dirigée par la détective Joanne Park. Mais rapidement, elle réalise que l\'assassin est déterminé à suivre les mêmes schémas que les précédents tueurs, en s\'attaquant notamment aux membres de la famille Prescott, qui ont déjà été visés dans les précédents volets de la saga.', '2023-04-22 20:43:37'),
(31, 'Us', '2019-06-22', 'Jordan Peele, Lupita Nyongo Winston Duke Evan Alex', 121, 'data/uploadsImgFilm/64465894f382e.png', 'Horreur/Thriller', 'Le film Us est un film thriller américain réalisé par Jordan Peele, sorti en 2019. Le film met en vedette Lupita Nyongo, Winston Duke, Elisabeth Moss et Tim Heidecker.\r\n\r\nL&#039;histoire suit une famille américaine qui part en vacances dans une maison près de la plage. Lorsque la nuit tombe, une autre famille, identique à la leur, mais en version maléfique et sinistre, apparaît mystérieusement devant eux. Les doubles maléfiques commencent alors à terroriser la famille, les forçant à lutter pour leur survie.\r\n\r\nLe film aborde des thèmes comme la dualité, l&#039;identité et la classe sociale, tout en offrant des scènes d&#039;horreur viscérales et des moments de tension intenses. &quot;Us&quot; a été acclamé par la critique et a été un succès au box-office, devenant l&#039;un des films d&#039;horreur les plus rentables de l&#039;histoire', '2023-04-22 21:43:00'),
(32, 'Dans les hautes herbes', '2019-06-14', 'Patrick Wilson, Laysla De Oliveira, Avery Whitted', 101, 'data/uploadsImgFilm/64447674244cc.jpg', 'Horreur/Drame', 'Dans les hautes herbes est un film d\'horreur canadien sorti en 2019, réalisé par Vincenzo Natali et basé sur la nouvelle éponyme de Stephen King et son fils Joe Hill.\r\n\r\nL\'histoire suit un frère et une sœur qui entrent dans un champ d\'herbes hautes pour aider un enfant perdu, mais ils se retrouvent rapidement perdus eux-mêmes dans le labyrinthe de végétation. Ils découvrent alors que quelque chose de sinistre se cache dans les herbes et que le temps et l\'espace semblent se comporter de manière étrange.\r\n\r\nLe film met en vedette Patrick Wilson, Laysla De Oliveira, Avery Whitted et Will Buie Jr. Il a été diffusé sur Netflix en octobre 2019.', '2023-04-23 00:06:12'),
(37, 'Sinister', '2012-06-23', 'Ethan Hawke, James Ransone, Nicolas King, Clare Foley', 110, 'data/uploadsImgFilm/6445ac47e7a90.jpg', 'Horreur/Thriller', 'Sinister\" est un film d\'horreur américain sorti en 2012. Le film raconte l\'histoire d\'un écrivain de romans policiers, Ellison Oswalt (joué par Ethan Hawke), qui emménage avec sa famille dans une maison où un crime atroce a été commis. Ellison espère trouver de l\'inspiration pour son prochain livre en enquêtant sur le meurtre mystérieux.\r\n\r\nCependant, les choses prennent une tournure sinistre lorsqu\'Ellison découvre un coffre rempli de bobines de films qui révèlent des images de meurtres rituels horribles. Bientôt, Ellison commence à avoir des visions terrifiantes et son obsession pour l\'enquête met sa famille en danger.\r\nLe film est connu pour son atmosphère angoissante et sa bande-son effrayante, ainsi que pour ses scènes de meurtres graphiques et dérangeantes. \"Sinister\" a été un succès commercial et a reçu des critiques globalement positives pour ses performances d\'acteurs, son scénario et sa réalisation.', '2023-04-23 22:08:07');

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
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_picture_url`, `is_admin`, `password`) VALUES
(2, 'Zaza', 'za@hotmail.com', 'data/uploadsImgUser/643fbf5736c5f.jpg', 0, '$2y$10$nufR.EOHGNV.VZ3VI7Wh9eAQ1q00hM2F2MZa1aR1a1N.9o3ytN3dG'),
(14, 'plop', 'plop@plop.com', 'data/uploadsImgUser/64426559b8e94.jpg', 1, '$2y$10$zN6jg9M0DN6G8zZIvZZ9IOIW9P0SztNCm8M.w0ud0nEdlG1KuJ.Y6'),
(15, 'Kerco', 'ra@hotmail.com', 'data/uploadsImgUser/6445a4dfc3dfb.png', 0, '$2y$10$ZMSLEcC.nGbVUTzJgG.q4eNQCz9VW5.d8QjJ/dloAHeZlmeHJUbjm'),
(16, 'saza', 'xs@hotmail.com', '', 0, '$2y$10$Xm8wfVL02anUDaIcCpJSie.Cd8IRhObhorTV87dAqAk08NXbmAoZq'),
(17, 'de', 'saka@hotmail.com', '', 0, '$2y$10$7cQg2ahrgfdUMH9GL5972.tMQvMpz9zeVpKithSFOCcrlcE79TfIm'),
(18, 'Romain', 'horrornotice@hotmail.fr', 'data/uploadsImgUser/64454b6ef39cc.jpg', 0, '$2y$10$Y9QTXh4ochdcsmdkJ654/.OuLQjdDJIKlMIVKgHoGZcJcDm3.6/3G'),
(19, 'gg@gg.com', 'gg@gg.com', '', 0, '$2y$10$.4IFeB1bcApSWnzEDqrUSuq/Vn.JFipjFdfBlA5nfW3Haw1w0GYte'),
(20, 'jsp', 'jsp@jsp.com', '', 0, '$2y$10$Z.eb1hiwN3LBSIypJtrmXep/makLQwdQAVOVzFjkKHZL1nnLxq05m');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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

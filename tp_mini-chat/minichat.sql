-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 23 mai 2020 à 13:28
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `minichat`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(39) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `ip_address`, `created_at`) VALUES
(1, 1, ' Salut! ça va?', '::1', '2020-05-06 13:05:27'),
(2, 2, ' Bien, et toi?', '::1', '2020-05-06 13:05:43'),
(3, 1, ' Super!', '::1', '2020-05-06 13:05:52'),
(4, 3, ' Salut tout le monde!', '::1', '2020-05-06 13:31:08'),
(5, 1, ' Super!', '::1', '2020-05-06 13:45:31'),
(6, 1, 'Coucou!', '::1', '2020-05-06 15:16:02'),
(7, 4, ' ça va!', '::1', '2020-05-06 15:16:23'),
(8, 4, ' Bien', '::1', '2020-05-07 12:11:14'),
(9, 5, 'gg', '::1', '2020-05-07 12:17:06');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `ip_address` varchar(39) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `created_at`, `ip_address`, `color`) VALUES
(1, 'Stef', '2020-05-06 13:05:27', '::1', NULL),
(2, 'Soso', '2020-05-06 13:05:43', '::1', NULL),
(3, 'Juju', '2020-05-06 13:30:56', '::1', NULL),
(4, 'Lulu', '2020-05-06 15:16:23', '::1', NULL),
(5, 'dodo', '2020-05-07 12:17:06', '::1', NULL),
(26, 'Lucie', '2020-05-12 07:01:35', NULL, NULL),
(27, 'dodo', '2020-05-12 07:05:50', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

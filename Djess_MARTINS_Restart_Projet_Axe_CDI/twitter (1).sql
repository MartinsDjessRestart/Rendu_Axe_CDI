-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 17 juin 2023 à 14:50
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `twitter`
--

-- --------------------------------------------------------

--
-- Structure de la table `home`
--

CREATE TABLE `home` (
  `id` int NOT NULL,
  `titre` text COLLATE utf8mb4_general_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_general_ci NOT NULL,
  `hashtag` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `publish_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `home`
--

INSERT INTO `home` (`id`, `titre`, `contenu`, `hashtag`, `auteur`, `publish_date`) VALUES
(107, 'Game Art', 'wow', '#IIM', 'starcraf1t', '2023-06-08 14:49:18'),
(113, 'test', 'c\'est un test', '#Code', 'starcraf1t', '2023-06-08 15:03:21'),
(123, 'Mon 3e tweet', 'c\'est un test', '#TwitTos', 'starcraf1t', '2023-06-08 18:58:44'),
(130, 'cool', 'c\'est un test', '#Random', 'starcraf1t', '2023-06-09 10:57:53'),
(133, 'Game Art', 'mais non', '#IIM', 'starcraf1t', '2023-06-09 11:05:34'),
(134, 'Mon 3e tweet', 'wow', '#CD', 'starcraf1t', '2023-06-09 11:06:03'),
(135, 'Game Art', 'c\'est un test', '#GA', 'starcraf1t', '2023-06-09 11:06:20'),
(136, 'Mon 3e tweet', 'wow', '#TwitTos', 'starcraf1t', '2023-06-09 11:18:35'),
(139, 'woooooooooooooooooooooooooooow', 'c\'est un test', '#Random', 'starcraf1t', '2023-06-09 17:13:02'),
(179, 'Test bouton', 'wow', '#CDI', 'starcraf1t', '2023-06-10 17:34:07');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `user` int NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `user`, `nom`, `email`, `mdp`) VALUES
(18, 4, 'starcraf1t', 'machin@gmail.com', 'ok_tiers');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `home`
--
ALTER TABLE `home`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
